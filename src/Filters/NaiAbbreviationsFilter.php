<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

namespace NaiPosTagger\Filters;

use NaiPosTagger\Models\NaiSentence;

/**
 * Preserve as "ABL" abbreviated locutions like etc. c.a.p. c.p. c.t.
 * Primarily are the ones with "." inside.
 * Others ABL but without "." are inside the dictionary, but tagged NOUN.
 * 
 * @note in this early step they are tagged with a generic ABL, then, if found in dictionary
 * with another specific or better tag, become retagged.
 * 
 * @todo do not transform if is the last term of a sentence? eg. "my post." maybe is not an abbreviation...
 * 
 */
class NaiAbbreviationsFilter
{
    /** Default language */
//    public static $language = 'it';
    
    public static $abbreviations = [];

    /**
     * Main method.
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence)
    {
	// load the localized list of abbreviations from the externals localized .php trait
	self::$abbreviations = NaiAbbreviationsFilterTrait::$locale_abbreviations;

	$sentence = ' '.$sentence.' ';

	// temporary
	$lowercase_string = strtolower($sentence);
	
	foreach(self::$abbreviations as $abbreviation)
	{

	    // case insensitive!
	    if(instr($lowercase_string, strtolower($abbreviation)) == 0)
		continue;
	    

	    // str_ireplace is case insentive!!!! and remove "." if present
	    $sentence = str_ireplace($abbreviation, ' '.NaiSentence::preserveString('ABL', preg_replace('/(\.|\s)$/', '', $abbreviation)).' ', $sentence);

	    
	    // if no more "." to consider, return
	    if(substr_count($sentence, '.') == 0)
		return trim($sentence);
	}

	$lowercase_string = null;
	
	// tail sent could be deleted, if so it must be restored
	if(! preg_match('/(\.|\!|\?)$/', trim($sentence)))
	    $sentence .= '.';
		

	return trim($sentence);
    }


    /**
     * If in pos_arr found ABL + "." remove the "."
     * 
     * @param array $pos_arr
     * @return array $pos_arr
     */
    public static function fix($pos_arr)
    {
	$n_parts = count($pos_arr) - 2;
	
	for ($index = 0; $index < $n_parts; $index ++)
	{
	    if(!isset($pos_arr[$index]))
		continue;
	    
	    if($pos_arr[$index][0]['sh-feat'] == 'ABL' && $pos_arr[$index + 1][0]['form'] == '.')
	    {
		unset($pos_arr[$index + 1]);
	    }
	}
	
	$pos_arr = array_values($pos_arr);
	
	return $pos_arr;
    }
    
}

