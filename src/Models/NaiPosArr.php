<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

namespace NaiPosTagger\Models;

use NaiPosTagger\PosTagging\PosParticiples;
use NaiPosTagger\Models\NaiTerms;
use NaiPosTagger\Models\NaiTermsMetadata;

/**
 * Model with various methods for the pos array.
 * 
 */
class NaiPosArr
{
    /** Default language */
    public static $language = 'it';

    /** Class debugger flag */
    public static $dbgme = false; // false true

    private static $removed_parts = [];
    

    /**
     * Given a string, generate a pos array.
     * 
     * @param string $sentence
     * @return array $pos_arr
     */
    public static function sentenceToPosArray($sentence)
    {
	$sentence = clear_double_spaces($sentence);

	$tokens = explode(' ', trim($sentence));

	$pos_arr = [];

	foreach ($tokens as $token)
	    array_push($pos_arr, [self::bulkPosPart($token)]);

	return $pos_arr;

    }


    /**
     * Given a pos_arr, fill it with informations retrieved from memories DB.
     * 
     * @param array $pos_arr
     * @param array $pos_dictionary
     * @return array $pos_arr (updated)
     */
    public static function populateFromDictionary($pos_arr, $pos_dictionary)
    {
	foreach ($pos_arr as $n => $pos_part)
	{
	    $pos_arr[$n][0]['form'] = trim($pos_arr[$n][0]['form']);
	    $pos_arr[$n][0]['lemma'] = trim($pos_arr[$n][0]['lemma']);
	    
	    foreach ($pos_dictionary as $dict_part)
	    {
		if (!isset($dict_part[0]))
		    continue;

		if (strtolower($dict_part[0]['form']) == strtolower($pos_part[0]['form']))
		{
		    $pos_arr[$n] = $dict_part;

		    $pos_arr[$n] = PosParticiples::transformPartPast($pos_arr[$n]);

		    break;
		}
	    }
	}
	
	return $pos_arr;

    }


    /**
     * Search a given form inside dictionaries.
     * 
     * @param array $pos_part with a single feat.
     * @return array $new_pos_part
     */
    public static function identifyToken($pos_part)
    {
	$new_pos_part = [];

	if (self::$dbgme)
	    echox('- search in memories for <b>' . $pos_part[0]['form'] . '</b>');

	// use NaiTerms for search in DB
	NaiTerms::$language = self::$language;

	$results = NaiTerms::searchInDictionaries($pos_part[0]['form']);


	// token unknown, tag as UNK and return
	if (!$results || count($results) == 0)
	{
	    $pos_part[0]['lemma'] = $pos_part[0]['form'];
	    $pos_part[0]['features'] = 'UNK';
	    $pos_part[0]['sh-feat'] = 'UNK';
	    
//	    $results = null;
	    return $pos_part;
	}


	// token known, append informations from DB to the pos_part


	/**
	 * In some terms with features like VER:part+pres+f+s and VER:part+pres+m+s 
	 * the 'ignore_always' could be still not indicated. Go with a quick filter
	 */
	foreach ($results as $subindex => $result)
	{
	    if ($subindex > 0 && $result['features'] == 'VER:part+pres+m+s' && $results[$subindex - 1]['features'] == 'VER:part+pres+f+s')
		unset($results[$subindex - 1]);
	}

	// second loop through remaining features
	foreach ($results as $subindex => $result)
	{
	    // excluding terms with rule = ignore_always
	    if ($result['rule'] == 'ignore_always')
		continue;

	    // clone the first element
	    $new_pos_part[$subindex] = $pos_part[0];

	    // and fill other features
	    $new_pos_part[$subindex] = self::fillPosPart($new_pos_part[$subindex], $result);
	}   // end results loop
	// just to be sure
	$new_pos_part = array_values($new_pos_part);


	// to avoid another loop, here also fix present and past participles
	$new_pos_part = PosParticiples::transformPartPast($new_pos_part);

	$results = null;
	
	return $new_pos_part;

    }


    /**
     * The base model of a pos part. Can set only the FORM value or the complete values set.
     * @param string $word
     * @param boolean $reduced used in pretagging to save resources with empty tags
     * @return array $pos_part
     */
    public static function bulkPosPart($word, $reduced = false)
    {
	$pos_part = [];

	$pos_part['form'] = $word;

	if ($reduced)
	    return $pos_part;

	$pos_part['lemma'] = '';
	$pos_part['features'] = '';
	$pos_part['sh-feat'] = '';
	$pos_part['metadata'] = [];
	$pos_part['label'] = '';
	$pos_part['rule'] = '';
	$pos_part['pos_score'] = 0;

	return $pos_part;

    }


    /**
     * From the resulting array of memories query, fill a single pos_part.
     * @param array $pos_part
     * @param array $result resulting array from DB query
     * @return array $pos_part (updated)
     */
    public static function fillPosPart($pos_part, $result)
    {
	$pos_part['form'] = $result['form'];

	$pos_part['lemma'] = $result['lemma'];


	if ($pos_part['features'] == '')
	    $pos_part['features'] = $result['features'];

	$pos_part['sh-feat'] = self::featToShortFeat($pos_part['features']);
//echox($pos_part);
	// setup metadata. Di default vuoti, ma se li trovo nel loro DB li appplico
	$pos_part['metadata'] = [];


	// unico punto in cui i metadata da json nel DB diventano un array
	if (isset($result['metadata']) && $result['metadata'] != '')
	{
	    if(is_string($result['metadata']))
		$pos_part['metadata'] = json_decode($result['metadata'], true);
	    if(is_array($result['metadata']))
		$pos_part['metadata'] = $result['metadata'];
	}


	// altri setup
	$pos_part['label'] = '';


	$pos_part['rule'] = '';
	if (isset($result['rule']) && $pos_part['features'] == '')
	    $pos_part['rule'] = $result['rule'];

	$pos_part['pos_score'] = 0;


	return $pos_part;

    }


    /**
     * Search a tag inside the multiple features of a given pos_part.
     * @param array $pos_part (result dei dati dal db del singolo termine)
     * @return boolean true if found, otherwise false
     */
    public static function isInSet($pos_part, $tag)
    {
	foreach ($pos_part as $feat)
	{
	    // by using instr we can retrieve also eventually short tags
	    if (instr($feat['features'], $tag) > 0)
		return true;
	}

	return false;

    }


    /**
     * Sort the features of each pos part by pos_score values.
     * @param array $pos_arr
     * @return array $pos_arr
     */
    public static function sortByScore($pos_arr)
    {
	foreach ($pos_arr as $n => $pos_part)
	    $pos_arr[$n] = sort2dArray($pos_part, 'pos_score', 'DESC');

	return $pos_arr;

    }


    /**
     * Remove initial SENT tag inserted by the algorithm
     * @param array $pos_arr
     * @return array $pos_arr
     */
    public static function removeInitialSent($pos_arr)
    {
	array_splice($pos_arr, 0, 1);

	return $pos_arr;

    }


    /**
     * Adds the tail SENT tag if is missing.
     * @param array $pos_arr
     * @return array $pos_arr
     */
    public static function addTailSent($pos_arr)
    {
	$last_pos_part = last($pos_arr)[0]['form'];

	if (!preg_match('/^(\.|\!|\?|\:)$/', $last_pos_part))
	{
	    $sent_part = self::bulkPosPart('.');
	    $sent_part['lemma'] = '.';
	    $sent_part['features'] = 'SENT';
	    $sent_part['sh-feat'] = 'SENT';

	    array_push($pos_arr, [$sent_part]);
	}

	$last_pos_part = null;
	
	return $pos_arr;

    }


    /**
     * Dove form != lemma legge dai dizionari e ne prende i metadata.
     * 
     * @todo segnare quelli già letti dal db, per evitare doppie letture
     * @param array $pos_arr
     * @return array $pos_arr
     */
    public static function getLemmasNgrams($pos_arr)
    {
	$NaiTermsMetadata = new NaiTermsMetadata();
	$NaiTermsMetadata->language = self::$language;
	NaiTerms::$language = self::$language;
	
	foreach ($pos_arr as $index => $pos_partx)
	{
	    $pos_part = $pos_partx[0];
	    
	    if ($pos_part['form'] == $pos_part['lemma'])
		continue;


	    if(self::$dbgme)
		echox('-- searching lemma for '.$pos_part['form']);

		// consider aux as ver
	    if ($pos_part['sh-feat'] == 'AUX')
	    {
		$pos_part['sh-feat'] = 'VER';
	    }

	    // get from dictionaries where lemma = lemma
	    $result = NaiTerms::searchInDictionaries($pos_part['lemma'], $pos_part['lemma'], $pos_part['sh-feat']);

	    if (!isset($result[0]['metadata']))
		continue;

	    if(self::$dbgme)
		echox('--- found lemma for '.$pos_part['form']);

	    $pos_arr[$index][0]['metadata'] = $NaiTermsMetadata->mergeMetadata($pos_part['metadata'], $result[0]['metadata']);
	}

	$NaiTermsMetadata = null;

	return $pos_arr;

    }

    
    /**
     * Draw a pos_arr inside a table, for debugging purposes
     * @param array $pos_arr
     * @return string $table_result
     */
    public static function posarrx($pos_arr)
    {
	$table_result = '<table class="table table-sm" style="border:1px solid #999; font-size:12px;">';

	foreach ($pos_arr as $pos_part)
	{
	    $table_result .= '<tr>';

	    // form unico
	    $table_result .= '<td style="border:1px solid #999; min-width:80px">' . $pos_part[0]['form'] . '</td>';

	    // lemma multiplo
	    $table_result .= '<td style="border:1px solid #999; min-width:80px">';

	    foreach ($pos_part as $feature)
	    {
		$table_result .= $feature['lemma'];
		$table_result .= '<br>';
	    }
	    $table_result .= '</td>';

	    // feats multiple
	    $table_result .= '<td style="border:1px solid #999; min-width:80px">';

	    foreach ($pos_part as $feature)
	    {
		$table_result .= $feature['features'];
		$table_result .= '<br>';
	    }
	    $table_result .= '</td>';
	    $table_result .= '<td style="border:1px solid #999; min-width:80px">';

	    foreach ($pos_part as $feature)
	    {
		$table_result .= $feature['sh-feat'];
		$table_result .= '<br>';
	    }
	    $table_result .= '</td>';

	    // metadata 
	    $table_result .= '<td style="border:1px solid #999; min-width:80px">';

	    $table_result .= json_encode($pos_part[0]['metadata']);
	    $table_result .= '<br>';
	    $table_result .= '</td>';

	    // rule multiple
	    $table_result .= '<td style="border:1px solid #999; min-width:80px">';

	    foreach ($pos_part as $feature)
	    {
		$table_result .= $feature['rule'];
		$table_result .= '<br>';
	    }
	    $table_result .= '</td>';

	    // score multiple
	    $table_result .= '<td style="border:1px solid #999; min-width:80px">';

	    foreach ($pos_part as $feature)
	    {
		$table_result .= $feature['pos_score'];
		$table_result .= '<br>';
	    }
	    $table_result .= '</td>';

	    //echox($pos_part);

	    $table_result .= '</tr>';
	}

	$table_result .= '</table>';

	return $table_result;

    }


    /**
     * Remove from the pos_arr certain tags or chars and save them in another array.
     * Eg. hide quote chars unuseful for Brill's rules
     * 
     * @param array $pos_arr
     * @param array $tags
     * @return array $pos_arr (modified) , populate array self::removed_parts with
     * removed pos parts
     */
    public static function hideUnwantedTags($pos_arr, $tags = [], $tokens = [])
    {

	if ($tags == [] && $tokens == [])
	    return $pos_arr;

	self::$removed_parts = [];

	foreach ($pos_arr as $index => $pos_part)
	{
	    // if find a token inside form, remove it and collect apart
	    if (in_array($pos_part[0]['form'], $tokens))
	    {
		self::$removed_parts[$index] = $pos_arr[$index];
		unset($pos_arr[$index]);
	    }

	    // if find a tag, remove it and collect apart
	    if (in_array($pos_part[0]['features'], $tags))
	    {
		self::$removed_parts[$index] = $pos_arr[$index];
		unset($pos_arr[$index]);
	    }
	    
	    /** 
	     * Sperimentale 01/2020 su quei sostantivi che secondo me possono essere
	     * sostituiti da dei verbi es. "odio" che va benissimo sostituito da "odiare"
	     * Ha un tag ref "act", provo a eliminare il noun quando ho la coppia col ver.
	     * E @note porto il verbo all'infinito, più impersonale :)
	     */
	    if(
		$pos_part[0]['sh-feat'] == 'NOUN' && 
		isset($pos_part[0]['metadata']['ref']) && in_array('act', $pos_part[0]['metadata']['ref']) && 
		(isset($pos_part[1]) && $pos_part[1]['sh-feat'] == 'VER')
	    )
	    {
		unset($pos_arr[$index][0]);
		$pos_arr[$index][1]['features'] = 'VER:inf+pres';
		$pos_arr[$index][1]['metadata']['ref'] = ['act'];
//		echox($pos_part);
	    }
	}

	$pos_arr = rebuildArrayIndex($pos_arr);

	return $pos_arr;

    }


    /**
     * Restore in pos_arr tags or chars from removed_parts array.
     * 
     * @param array $pos_arr
     * @return array [$pos_arr (modified)
     */
    public static function unhideUnwantedTags($pos_arr)
    {
	foreach (self::$removed_parts as $index => $removed_part)
	    array_splice($pos_arr, $index, 0, [$removed_part]);

	return $pos_arr;

    }


    /**
     * Al termine di tutti i passaggi dove bisogna considerare tutte le feats dei token,
     * 'porta su' di un livello le pos_part restanti
     * @param array $pos_arr
     * @return array $pos_arr
     */
    public static function flatPosArr($pos_arr)
    {
	foreach ($pos_arr as $index => $pos_part)
	    $pos_arr[$index] = $pos_part[0];

	return $pos_arr;

    }


    /**
     * Visualize a pos array with colors and other info for each pos_part.
     * 
     * @param array $pos_arr
     * @param string $what can be 'form' or 'lemma'
     * @param string $separator
     * @return string $colored_sentence
     */
    public static function visualizePosArr($pos_arr, $what = 'form', $separator = ' ')
    {
	if (! \is_array($pos_arr))
	    return '';

	$colored_sentence = [];

	foreach ($pos_arr as $pos_part)
	{
	    // di default aspetto una sola feature
	    $tag = $pos_part[0]['sh-feat'];

	    $n_feats = count($pos_part);

	    $token = '<span class="nlp-token nlp-tag-' . $tag . '" rel="' . $pos_part[0]['features'] . '" >';

	    $token .= '<span class="tag-label">' . $tag . '</span> ';

	    $token .= '<span class="tag-content">' . $pos_part[0][$what] . '</span> ';
//	    $token .= $pos_part[0][$what];

	    if ($n_feats > 1)
		$token .= '<sup><small>(' . $n_feats . ')</small></sup>';

	    $token .= '</span>';

	    array_push($colored_sentence, $token);

	}

	return implode($separator, $colored_sentence);

    }


    /**
    * usata nel inputParser per ricavare il valore del sh-feats riducendo e semplificando la feat.
    * @param string $feature
    * @return string $short_feature
    */
    public static function featToShortFeat($feature)
    {
	if (instr($feature, ':') > 0)
	{
	    //per la maggior parte
	    $_tmp = explode(':', $feature);
	    if (instr($feature, '-') > 0)
	    {
		$_tmp2 = explode('-', $feature);
		$short_feature = $_tmp2[0];
	    } else
	    {
		$short_feature = $_tmp[0];
	    }
	} else if (instr($feature, '-') > 0)
	{
	    //per i pro pers
	    $_tmp = explode('-', $feature);
	    $short_feature = $_tmp[0]; //."-".$_tmp[1]."-".$_tmp[2];    17:36 30/09/2016 perchè proprio rompevano i PRO
	} else
	{
	    $short_feature = $feature;
	}

	return $short_feature;

    }


    /**
    * Remove contents of metadata values, when not necessary.
    * @param array $pos_arr
    * @return array $pos_arr updated
    */
	public static function clearMetadata($pos_arr)
    {
		foreach($pos_arr as $n1 => $pos_part)
		{
			foreach($pos_part as $n2 => $sub_part)
			{
			if(isset($sub_part['metadata']))
			{
				unset($pos_arr[$n1][$n2]['metadata']);
			}
			}
		}
		
		return $pos_arr;
    }

    
}
