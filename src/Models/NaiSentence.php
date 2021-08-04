<?php

/*
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

namespace NaiPosTagger\Models;

use NaiPosTagger\Models\NaiPosArr;
use NaiPosTagger\Models\NaiTermsMetadata;

/**
 * Methods on early steps on sentences and pos array.
 */
class NaiSentence
{
    /** Collector of preserved tokens */
    public static $preserved_kart = [];
    
    /** When testing multiple sentences, this is the separator between them */
    public static $sentences_separator = ' awphfpnqcozchgxoeifdhmsjkwybjdfkqhsldlqr ';
    

    /**
     * Initial setup for the sentence with some op.
     * 
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function prepareSentence($sentence)
    {
	// let's add a SENT also in the head of sentence

	// we need this stupid thing when test multiple sentences :(
	$tmp = explode(' ', $sentence);

	if (! isset(self::$preserved_kart[$tmp[0]]))
	    $sentence = '. ' . trim($sentence);

	$tmp = null;
	
	 
	// @todo move somewhere else, maybe in UnknowWords
	// if wrong typing the character near Enter key.
	// suspended-weak
//	if(instr(right($sentence, 3), 'ù') > 0) 
//	    $sentence =	rtrim($sentence, 'ù');

	if (instr(right($sentence, 3), '\\') > 0)
	    $sentence = rtrim($sentence, '\\');

	if (instr(right($sentence, 3), '^') > 0)
	    $sentence = rtrim($sentence, '^');

	// if wrong typing "1" instead "!"
	$sentence = ' ' . $sentence . ' ';
	$sentence = preg_replace('/(\!+1)\s/', ' ', $sentence);
	$sentence = preg_replace('/(1\!+)\s/', ' ', $sentence);
	
	// really really really important!
	$sentence = preg_replace('/È/u', 'è', $sentence);


	return clear_double_spaces($sentence);

    }


    /**
     * Explode more than one sentences by a given separator
     * @param array splitted $sentences
     * @return string sentence
     */
    public static function implodeSentences($sentences)
    {
	return implode(self::$sentences_separator, $sentences);
    }

    
    /**
     * Explode more than one sentences by a given separator
     * @param string $sentences
     * @return array splitted sentence
     */
    public static function explodeSentences($sentences)
    {
	return explode(trim(self::$sentences_separator), $sentences);
    }


    /**
     * If not present, add at the end of a sentence a SENT char "."
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function closeSentence($sentence)
    {
	if (!preg_match('/(\.|\!|\?|\:)/', right(trim($sentence), 1)))
	    $sentence = trim($sentence) . ' .';

	return $sentence;
    }


    /**
     * When a string is tagged from filters o similar, this method generate a pos_part 
     * and preserve it from others elaborations.
     * 
     * @param string $tag eg. "DATE", "TIME" etc.
     * @param string $string can be and intere sentence, or only a token
     * @param string|string|array $refs
     * @return string $preserved_id a unique random id used later to restore the pos_part
     */
    public static function preserveString($tag, $string, $refs = null)
    {
	if (trim($string) == '')
	    return '';

	$new_pos_part = NaiPosArr::bulkPosPart($string, true);
	$new_pos_part['lemma'] = $new_pos_part['form'];
	$new_pos_part['features'] = ($tag);
	$new_pos_part['sh-feat'] = $new_pos_part['features'];

	// if required, add also informations to 'ref' metadata
	if(!is_null($refs))
	{
	    $NaiTermsMetadata = new NaiTermsMetadata();
	    
	    $new_pos_part['metadata']['ref'] = $NaiTermsMetadata->setMetadata([], 'ref', 'attr');

	}
	$preserved_id = self::generateRandomString();
	self::$preserved_kart[$preserved_id] = $new_pos_part;
	
	// @note keep the whitespace!
	return ' '.$preserved_id;

    }

    
    /**
     * Unserialize/restore preserved parts of a given pos_arr.
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    public static function unpreservePosArr($pos_arr)
    {
	foreach ($pos_arr as $index => $pos_part)
	{
	    if (isset(self::$preserved_kart[$pos_part[0]['form']]))
	    {
		$tmp = self::$preserved_kart[$pos_part[0]['form']];
		
		$new_pos_part = [];
		$new_pos_part[0] = $tmp;
		$new_pos_part[0]['form'] = $tmp['form'];
		$new_pos_part[0]['lemma'] = $tmp['lemma'];
		$new_pos_part[0]['features'] = $tmp['features'];
		
		if(isset($tmp['metadata']))
		    $new_pos_part[0]['metadata'] = $tmp['metadata'];

		$new_pos_part[0] = NaiPosArr::fillPosPart($new_pos_part[0], $new_pos_part[0]);
		
		$pos_arr[$index] = $new_pos_part;
	    }

	}

	return $pos_arr;
    }

    
    /**
     * To preserve tokens the forms are replaced by a long random string.
     * @param int $length
     * @return string $random_string
     */
    public static function generateRandomString($length = 24)
    {
	$characters = 'abcdefghijklmnopqrstuvwxyz';
	$random_string = '';

	for ($i = 0; $i < $length; $i++) {

	    $rand_char = $characters[mt_rand(0, strlen($characters) - 1)];

	    if(instr($random_string, $rand_char) > 0)
	    {
		$i --;
		continue;
	    }

	    $random_string .= $rand_char;
	}

	return $random_string;
    }


}
