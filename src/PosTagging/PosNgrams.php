<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace NaiPosTagger\PosTagging;

use NaiPosTagger\Models\NaiPosArr;
use NaiPosTagger\Models\NaiNgrams;
use NaiPosTagger\Models\NaiTermsMetadata;

/**
 * Tokens can be connected to form one or more ngrams. 
 * Informations on how to join them are inside metadata e.g. 
 * {"ngs":{"130":{"pos":1,"tag":"VER:ind+pres+2+s","len":2}}}
 * 
 */
class PosNgrams
{
    /** Default language */
    public static $language = 'it';
    
    /** Class debugging */
    public static $dbgme = false;
    
    /** For debugging/testing, ids of ngrams to ignore */
    public static $id_temporary_excluded = [];


    /**
     * Looks for all metadata 'ngs' and apply
     *
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    public static function transform($pos_arr)
    {

	// working on original $pos_arr
	$pos_arr = self::expandChangingNgrams($pos_arr);
	
	// working on original $pos_arr
	$pos_arr = self::expandDynamicNgrams($pos_arr);

	// now working to a clone
	$pos_arr_tmp = self::isolateGoodNgrams($pos_arr);
//	diex($pos_arr_tmp);

	// not enthusiasmating but need to launch twice
	$pos_arr_tmp = self::isolateGoodNgrams($pos_arr_tmp);


	// delete overlapping ngrams
	$pos_arr_tmp = self::removeOverlappingNgrams($pos_arr_tmp);

	// estract for each ngram sequences of indexes for the pos_arr to join
	$ngrams_map = self::extractFinalIndexes($pos_arr_tmp);
//	echox($ngrams_map);

	// apply modifies required by the ngram configuration for each pos_part
	$pos_arr = self::applyNgrams($pos_arr, $ngrams_map);

	// join pos_part of an ngram where features are the same
	$pos_arr = self::joinNgrams($pos_arr, $ngrams_map);

//	diex($pos_arr);
	return $pos_arr;

    }

    
    /**
     * Some tokens e.g. "contrattuale" became more useful if converted as
     * "di contratto". The ngram looks like {"ngs":{"782":{"chg":"di contratto",
     * "tag":"PRE: of NOUN-m:s"}}}
     * 
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    private static function expandChangingNgrams($pos_arr)
    {
	$n_parts = count($pos_arr);
	
	for($index = 0; $index < $n_parts; $index ++)
	{
	    $pos_part = $pos_arr[$index];
	    $metadata = $pos_part[0]['metadata'];

	    if (!isset($metadata['ngs']))
		continue;

	    /**
	     * But, in some cases e.g. 'fiscale' needed for further operations.
	     * Check if is connected to some other ngram.
	     */
	    if(isset($pos_arr[$index - 1][0]['metadata']['ngs']))
	    {
		$is_connected_with_prev = array_intersect_key($metadata['ngs'], $pos_arr[$index - 1][0]['metadata']['ngs']);
		
		if(!empty($is_connected_with_prev))
		    continue;
//		echox($is_connected_with_prev, ' between '.$pos_arr[$index - 1][0]['form']. ' and ' .$pos_part[0]['form']);
	    }

	    // looking for ngram configurations with "chg" info
	    foreach ($metadata['ngs'] as $ngram_set)
	    {
	        if (!isset($ngram_set['chg']))
		    continue;
		
		// I have n parts in both chg and in tag. Split
		$lemmas = explode(' ', $ngram_set['chg']);
		$tags = explode(' ', $ngram_set['tag']);
		
		if(self::$dbgme)
		    echox('-- apply chg head from '.$pos_part[0]['form'].' to '.$ngram_set['chg'].' at index '.$index);
		
		// apply transformations required to first pos part
		$new_part = NaiPosArr::bulkPosPart($lemmas[0]);
		$new_part['lemma'] = $lemmas[0];
		$new_part['features'] = $tags[0];
		$new_part['sh-feat'] = NaiPosArr::featToShortFeat($tags[0]);
//		diex([$new_part]);
		$pos_arr[$index] = [$new_part];
		
		// and add a new pos part for each other required by the chg config
		for($n = 1; $n < count($tags); $n ++)
		{
		    $new_part = NaiPosArr::bulkPosPart($lemmas[$n]);
		    $new_part['lemma'] = $lemmas[$n];
		    $new_part['features'] = $tags[$n];
		    $new_part['sh-feat'] = NaiPosArr::featToShortFeat($tags[$n]);
		    
		    if(self::$dbgme)
			echox('-- apply chg part from '.$pos_part[0]['form'].' to '.$ngram_set['chg'].' at index '.($index + $n));
		    
		    array_splice($pos_arr, ($index + $n), 0, [[$new_part]]);

		}
		break;
	    }
	}	

	return $pos_arr;
    }
    

    /**
     * Ngrams can consider e.g. "cosa indica", "cosa significa" etc. with the configuration
     * ['forms' => 'cosa', 'tags' => 'INT:qst*VER:impr+pres+2+s'] or
     * ['forms' => 'sai cosa', 'tags' => 'INT:qst INT:qst*VER:impr+pres+2+s'] 
     * This method search them by "*" and look if after the classic features exists the one
     * required after the "*". If is found it change the pos_part so that results part of the ngram,
     * so it is not necessary change nothing in next methods.
     * 
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    private static function expandDynamicNgrams($pos_arr)
    {
	foreach ($pos_arr as $index => $pos_part)
	{
	    $metadata = $pos_part[0]['metadata'];

	    if (!isset($metadata['ngs']))
		continue;

	    // looking for metadata with "*" inside
	    foreach ($metadata['ngs'] as $ngram_id => $ngram_set)
	    {
		if (! isset($ngram_set['tag']))
		    throw new \Exception('in token '.$pos_part[0]['form'].' ngram id '.$ngram_id. ' tag not set?');
		
		if (instr($ngram_set['tag'], '*') == 0)
		    continue;
		
		// a check to avoid incomplete ngrams!
		if ($ngram_set['pos'] != 1)
		    continue;	

		// exploding by whitespaces because tags could be more than one
		$tags = explode(' ', $ngram_set['tag']);

		// loop through complessive tags
		foreach ($tags as $indextag => $tag)
		{
		    $tag_dyn_found = false;

		    // browse each one until found the dynamic to apply
		    if (instr($tag, '*') == 0)
			continue;

		    if(self::$dbgme)
			echox('- try apply ngram dyn # '.$ngram_id.' '.$ngram_set['tag'].' on <b>'.$pos_part[0]['form'].'</b> at index '.$index);
		    
		    // explode the two values. The first remain linked to previous tag
		    $dyn_parts = explode('*', $tag);

		    // remove from tag part the dynamic part
		    $tags[$indextag] = $dyn_parts[0];

		    // and in the second part we have the tag to search in the next pos_part
		    foreach ($pos_arr[$index + 1] as $subpos_part)
		    {
			// we look for an exact match
			if ($subpos_part['features'] != $dyn_parts[1] && $subpos_part['sh-feat'] != $dyn_parts[1])
			    continue;
//			echox('--- '.$subpos_part['features']. ' vs '.$dyn_parts[1]);

			if(self::$dbgme)
			echox('--- ngram dyn # '.$ngram_id.' for '.$dyn_parts[1]);

			$tag_dyn_found = true;
			
			if(self::$dbgme)
			    echox('--- apply ngram dyn # '.$ngram_id.' for '.$dyn_parts[1]);
			
			// if found a subpos_part, treat the ngram just like the 'normal' ones
			$submetadata = $subpos_part['metadata'];

			if (!isset($submetadata['ngs']))
			    $submetadata['ngs'] = [];

			$submetadata['ngs'][$ngram_id] = [
			    // the position of the dynamic is simply the one of the previous + 1, olè
			    'pos' => $ngram_set['pos'] + 1,
			    'tag' => $dyn_parts[1],
			    'len' => $ngram_set['len']
			];


//			echox($submetadata);	
			foreach ($pos_arr[$index + 1] as $index3 => $xsubpos_part)
			    $pos_arr[$index + 1][$index3]['metadata'] = $submetadata;

			break;
		    } // end loop pos_parts next token


		    // and transform the ngram config
		    if ($tag_dyn_found)
		    {
			// the length
			$metadata['ngs'][$ngram_id]['len'] += 1;
			$metadata['ngs'][$ngram_id]['tag'] = implode(' ', $tags);
			
			// and by removing the dynamic part
			foreach ($pos_arr[$index] as $index4 => $xxsubpos_part)
			    $pos_arr[$index][$index4]['metadata'] = $metadata;
		    } else
		    {
			// if cannot apply it must be destroyed!
			$pos_arr = NaiNgrams::removeByIdFromPosarr($pos_arr, $ngram_id);
		    }
		} // end loop tags config this ngram
	    
	    } // end loop all ngrams for this token
	
	} // end loop pos_arr

	return $pos_arr;

    }


    /**
     * Destroy not applicable ngrams
     * @param array $pos_arr_tmp
     * @return array $pos_arr_tmp updated
     */
    private static function isolateGoodNgrams($pos_arr_tmp)
    {
	$n_pos_parts = count($pos_arr_tmp);

	
	for ($index = 0; $index < $n_pos_parts; $index ++)
	{
	    // surely must take care of tokens previous and next
	    if (isset($pos_arr_tmp[$index - 1]) && is_string($pos_arr_tmp[$index - 1][0]['metadata']))
		$pos_arr_tmp[$index - 1][0]['metadata'] = $pos_arr_tmp[$index - 1][0]['metadata'];

	    if (is_string($pos_arr_tmp[$index][0]['metadata']))
		$pos_arr_tmp[$index][0]['metadata'] = $pos_arr_tmp[$index][0]['metadata'];

	    if (isset($pos_arr_tmp[$index + 1]) && is_string($pos_arr_tmp[$index + 1][0]['metadata']))
		$pos_arr_tmp[$index + 1][0]['metadata'] = $pos_arr_tmp[$index + 1][0]['metadata'];

	    if (!isset($pos_arr_tmp[$index][0]['metadata']['ngs']))
		continue;

	    // for each one by looking pos and lenght detect if it is to remove
	    foreach ($pos_arr_tmp[$index][0]['metadata']['ngs'] as $ngram_id => $ngram)
	    {
		if(! isset($ngram['pos']))
		    continue;

		if (
		    // if at the first place and after have agap, ignore
		    ($ngram['pos'] == 1 &&
		    (empty($pos_arr_tmp[$index + 1][0]['metadata']) || !isset($pos_arr_tmp[$index + 1][0]['metadata']['ngs'][$ngram_id]) || ($pos_arr_tmp[$index + 1][0]['metadata']['ngs'][$ngram_id]['pos'] > $ngram['pos'] + 1))
		    )
		    // if in the middle but before the last and after have a gap, ignore
		    || ($ngram['pos'] > 1 && $ngram['pos'] < $ngram['len'] && (empty($pos_arr_tmp[$index + 1][0]['metadata']) || !isset($pos_arr_tmp[$index + 1][0]['metadata']['ngs'][$ngram_id])))

		    // if in the middle but before the last and before have a gap, ignore
		    || ($ngram['pos'] > 1 && $ngram['pos'] < $ngram['len'] && (empty($pos_arr_tmp[$index - 1][0]['metadata']) || !isset($pos_arr_tmp[$index - 1][0]['metadata']['ngs'][$ngram_id])))

		    // if at the last place but before haven't othe ngram parts ()the one before), ignore
		    || ($ngram['pos'] == $ngram['len'] &&
		    (empty($pos_arr_tmp[$index - 1][0]['metadata']) || !isset($pos_arr_tmp[$index - 1][0]['metadata']['ngs'][$ngram_id]) || ($pos_arr_tmp[$index - 1][0]['metadata']['ngs'][$ngram_id]['pos'] < $ngram['pos'] - 1))
		    )
		)
		{
		    
		    unset($pos_arr_tmp[$index][0]['metadata']['ngs'][$ngram_id]);

		    /**
		     * Vitally: we need to remove traces of previus incomplete ngrams
		     */
		    for ($t = 1; $t < $ngram['pos']; $t ++)
		    {
			// but only if they are set and not in the last part!
			if(
			    ! isset($pos_arr_tmp[$index - $t][0]['metadata']['ngs'][$ngram_id]) ||
			    $pos_arr_tmp[$index - $t][0]['metadata']['ngs'][$ngram_id]['pos'] > $ngram['pos']
			)
			    break;

			foreach ($pos_arr_tmp[$index - $t] as $subindex => $subpart)
			    unset($pos_arr_tmp[$index - $t][$subindex]['metadata']['ngs'][$ngram_id]);
		    }
		}
	    } // end loop throug ngrams

	} // end loop pos_parts

	return $pos_arr_tmp;

    }


    /**
     * Destroy the shortest when overlap
     * @param array $pos_arr_tmp
     * @return array $pos_arr_tmp updated
     */
    private static function removeOverlappingNgrams($pos_arr_tmp)
    {
	$n_pos_parts = count($pos_arr_tmp);

	for ($index = 0; $index < $n_pos_parts; $index ++)
	{
	    if (!isset($pos_arr_tmp[$index][0]['metadata']['ngs']) || count($pos_arr_tmp[$index][0]['metadata']['ngs']) < 2)
		continue;

	    // ordering by lenght, with the longest for first
	    $highest_id = -1;
	    $highest_len = -1;
	    foreach ($pos_arr_tmp[$index][0]['metadata']['ngs'] as $ngram_id => $ngram)
	    {
		if(!isset($ngram['len']))
		    continue;
		
		if ($ngram['len'] > $highest_len)
		{
		    $highest_len = $ngram['len'];
		    $highest_id = $ngram_id;
		}
	    }

	    foreach ($pos_arr_tmp[$index][0]['metadata']['ngs'] as $ngram_id => $ngram)
	    {
		if ($ngram_id != $highest_id)
		    unset($pos_arr_tmp[$index][0]['metadata']['ngs'][$ngram_id]);
	    }
	}

	return $pos_arr_tmp;

    }


    /**
     * Given a $pos_arr_tmp return an array with ngrams id and the indexes where to apply them
     * @param array $pos_arr_tmp
     * @return array $ngrams_map
     */
    private static function extractFinalIndexes($pos_arr_tmp)
    {
	$ngrams_map = [];
	foreach ($pos_arr_tmp as $index => $pos_part)
	{
	    
	    if (empty($pos_part[0]['metadata']['ngs']))
		continue;
	
	    foreach ($pos_part[0]['metadata']['ngs'] as $ngram_id => $ngram)
	    {
		if (!isset($ngrams_map[$ngram_id]))
		    $ngrams_map[$ngram_id] = [];

		array_push($ngrams_map[$ngram_id], $index);
	    }
	}

	if(self::$dbgme)
	{
	    echox('---- in extractFinalIndexes found initial ngrams:');
	    echox($ngrams_map);
	}
	
	return $ngrams_map;

    }


    /**
     * Keep only one pos_part by informations inside applicables ngrams
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    private static function applyNgrams($pos_arr, $ngrams_map)
    {
	// loop through chunks of ngrams to apply
	foreach ($ngrams_map as $ngram_id => $ngram_set)
	{
	    // each one have the index of pos_arr where to working on
	    foreach ($ngram_set as $index)
	    {
		if(self::$dbgme)
		    echox('----- in applyNgrams applyNgrams '.$ngram_id);
		
		$unique_pos_part = [];
		$unique_pos_part[0] = self::setPosPart($pos_arr[$index], $ngram_id);
		$pos_arr[$index] = $unique_pos_part;
	    }
	}

	return $pos_arr;

    }


    /**
     * For each pos part single or multiple, apply modifies required by the ngram.
     * @param array $pos_parts
     * @param int $ngram_id
     */
    private static function setPosPart($pos_parts, $ngram_id)
    {
	// looks in metadata for the other required informations
	$metadata = $pos_parts[0]['metadata'];

	/**
	 * Cases:
	 * 1 one or more pos part with one that have the feature as indicated in the ngram
	 * 2 one or more pos part but without features as indicated in the ngram
	 * Let's assign the one indicated in the ngram
	 */
	$feature_found = false;
	foreach ($pos_parts as $pos_part)
	{
	    if(self::$dbgme)
		echox('------ in setPosPart ngram # '.$ngram_id.' looking '.$pos_part['features'].' vs '.$metadata['ngs'][$ngram_id]['tag']);
	    
	    /**
	     * If found required feature, set and return.
	     * @note but consider also the SH_FEAT because if in the ngram I put e.g.
	     * VER, it means that is okay any conjugation/person/number
	     */

	    if ($pos_part['features'] == $metadata['ngs'][$ngram_id]['tag'] || $pos_part['sh-feat'] == $metadata['ngs'][$ngram_id]['tag'])
	    {
		// if need to modify also the lemma
		if (isset($metadata['ngs'][$ngram_id]['lemma']))
		    $pos_part['lemma'] = $metadata['ngs'][$ngram_id]['lemma'];
		
		// important, otherwise later we loose the ngram!
		if(isset($pos_part['metadata']['nnadj']))
		    unset($pos_part['metadata']['nnadj']);
		
		// if indicated a synonym, apply
		if (isset($metadata['ngs'][$ngram_id]['synof']))
		    $pos_part['metadata']['synof'] = $metadata['ngs'][$ngram_id]['synof'];
		
		// if indicated one or more refs, apply
		if (isset($metadata['ngs'][$ngram_id]['refs']))
		{
		    if(self::$dbgme)
			echox('------- set metadata REFS '.$metadata['ngs'][$ngram_id]['refs']);
		    
		    $NaiTermsMetadata = new NaiTermsMetadata();
		    $NaiTermsMetadata->language = self::$language;
		    
		    $pos_part['metadata']['ref'] = $NaiTermsMetadata->setMetadata($metadata, 'ref', $metadata['ngs'][$ngram_id]['refs']);		
		}
		
		return $pos_part;
	    }
	}
	
	// if not found required feature, force and return
	if (!$feature_found)
	{

	    if(self::$dbgme)
		echox('--- loop finished trough the pos parts, feat required not found, force');
	    
	    if (isset($metadata['ngs'][$ngram_id]['lemma']))
		$pos_part['lemma'] = $metadata['ngs'][$ngram_id]['lemma'];

	    $pos_part['features'] = $metadata['ngs'][$ngram_id]['tag'];
	    $pos_part['sh-feat'] = NaiPosArr::featToShortFeat($pos_part['features']);

	    // if indicated a synonym, apply
	    if (isset($metadata['ngs'][$ngram_id]['synof']))
		$pos_part['metadata']['synof'] = $metadata['ngs'][$ngram_id]['synof'];
	    
	    // if indicated one or more refs, apply
	    if (isset($metadata['ngs'][$ngram_id]['refs']))
	    {
		if(self::$dbgme)
		    echox('------- set metadata REFS '.$metadata['ngs'][$ngram_id]['refs']);

		$NaiTermsMetadata = new NaiTermsMetadata();
		$NaiTermsMetadata->language = self::$language;
		$pos_part['metadata']['ref'] = $NaiTermsMetadata->setMetadata($metadata, 'ref', $metadata['ngs'][$ngram_id]['refs']);		
	    }
		
	    return $pos_part;
	}

	return $pos_part;

    }


    /**
     * Apply the join on the pos_arr where features are the SAME.
     * Supplementary parts are not deleted immediately, otherwise the pos_arr have problems.
     * Let's flag them with a value "to_delete" e go with another loop :)
     */
    private static function joinNgrams($pos_arr, $ngrams_map, $separator = '_')
    {
	// loop through chunks of ngrams to apply
	foreach ($ngrams_map as $ngram_set)
	{
	    // first loop and check if they are all the same or not
	    $tags_seq = [];
	    foreach ($ngram_set as $index)
		$tags_seq[] = $pos_arr[$index][0]['features'];
	    
	    // if needed to ignore some ngrams
	    if(in_array(array_keys($ngrams_map)[0], self::$id_temporary_excluded)) return $pos_arr;

	    $tags_seq = array_unique($tags_seq);

	    if (count($tags_seq) > 1)
		continue;

	    $counter = 0;
	    $first_index = -1;

	    // each one indicates the index of pos_arr where to work
	    foreach ($ngram_set as $index)
	    {
		// keep the first pos_part and remove the remainings
		if ($counter == 0)
		{
		    $new_forms = $pos_arr[$index][0]['form'];
		    $new_lemmas = $pos_arr[$index][0]['lemma'];
		    
		    $first_index = $index;
		}

		if ($counter > 0)
		{
		    $new_forms .= $separator . $pos_arr[$index][0]['form'];

		    // by this way if they are the same remains only one :)
		    $new_lemmas .= $separator . $pos_arr[$index][0]['lemma'];

		    if(self::$dbgme)
			echox('--- joinNgrams removing pos_part '.$index);
		    
		    unset($pos_arr[$index]);
		}

		$counter ++;
	    }

	    // reopens metadata to delete other informations on the ngrams
	    $metadata = $pos_arr[$first_index][0]['metadata'];

	    // completing the unique pos_part that remains
	    $pos_arr[$first_index][0]['form'] = $new_forms;

	    // if lemmas that replaces are the same stessi, keep only one
	    $pos_arr[$first_index][0]['lemma'] = self::clearLemmas($new_lemmas);

	    // but for NPR the lemma is like the form!
	    if($pos_arr[$first_index][0]['sh-feat'] == 'NPR')
		$pos_arr[$first_index][0]['lemma'] = $pos_arr[$first_index][0]['form'];

	    /**
	     * Clear othe values, that remain untouched,
	     * by removing traces of this ngrams, don't need to be considered again
	     */
	    
	    unset($metadata['ngs']);
	    unset($metadata['nnadj']);
	    
	    // @todo when it is safe to remove metadata tmx? everytime?
	    unset($metadata['tmx']);
	    
	    $pos_arr[$first_index][0]['metadata'] = [];

	    // if remain some othe metadata needs to keep
	    if (!empty($metadata))
		$pos_arr[$first_index][0]['metadata'] = $metadata;
	}

	$pos_arr = array_values($pos_arr);
//diex($pos_arr);
	return $pos_arr;

    }
    
    
    /**
     * Where the ngram substitute lemmas with tokens equals keep only one
     * @param string $new_lemmas
     * @return string $new_lemmas
     */
    private static function clearLemmas($new_lemmas)
    {
	$tmp = explode('_', $new_lemmas);
	
	$n_tokens = count($tmp);
	
	// if found the same token with the same number count, then clear
	$rec = array_count_values($tmp);
	
	foreach ($rec as $hits)
	{
	    if($hits == $n_tokens)
	    {
		$new_lemmas = $tmp[0];
		break;
	    }
	    
	}
	return $new_lemmas;
    }

}
