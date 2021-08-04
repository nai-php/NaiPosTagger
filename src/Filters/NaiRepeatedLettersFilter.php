<?php

/*
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace NaiPosTagger\Filters;


/**
 * Try to fix typos on unwanted repeated vowels and consonants.
 * 
 */
class NaiRepeatedLettersFilter
{
    /** Class debugger flag */
    public static $dbgme = false;

    
    /**
     * Main method
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence)
    {
	$tokens = explode(' ',$sentence);
	foreach ($tokens as $n => $token)
	    $tokens[$n] = self::transformDo($token);
	
	$sentence = implode(' ', $tokens);
	
	return $sentence;
    }
    

    /**
     * Algorithm pipeline
     * @param string $string
     * @return string $string updated
     */
    public static function transformDo($string)
    {
	$string = strtolower($string);
	
	// we need at least a couple of repeated letters... easy to catch
	preg_match_all('/(.)\1+/u', $string, $matches);
	
	// this should be better for english...
	//preg_match_all('/(.)\1{2,}/u', $string, $matches);

	// no repeated chars? return
	if (empty($matches[0][0]))
	    return $string;

	
	// in the string ends with 1 letter or is numeric, return
	if (strlen($string) < 2 || is_numeric($string))
	    return $string;
	

	$impossible_doubles = explode(' ', NaiRepeatedLettersFilterTrait::$impossible_doubles_raw);

	$excluded_suffixes = explode(',', NaiRepeatedLettersFilterTrait::$excluded_suffixes_raw);

	if (self::$dbgme)
	    echox('- checking unknown term "' . $string. '"');
	
	/**
	 * I've found about 150 combinations vowel-consonant-consonant-vowel that generally
	 * inside normal terms aren't present e.g. ivvi, ovvo etc. Let's try to correct them
	 * @todo these considerations are tested for italian language... don't know for english...
	 */
	foreach ($impossible_doubles as $impossible_double)
	{
	    if (instr($string, $impossible_double) > 0)
	    {
		if (self::$dbgme)
		    echox("found $impossible_double in $string");

		$correct_form = substr($impossible_double, 0, 1) . substr($impossible_double, 1, 1) . substr($impossible_double, 3, 1);

		$string = str_replace($impossible_double, $correct_form, $string);
	    }
	}

	
	// if last three letters are in the ones indicated as to ignore (e.g. zii, venii etc.), return
	if (in_array(right($string, 3), $excluded_suffixes))
	    return $string;


	// IF PASSED PREVIOUS CONTROLS, APPLY ALGORITHM FOR CLEANING

	$string = self::fixVowels($string);


	// cleaning consonants
	// @todo for english better consider > 3 recurrences?
	$string = self::fixConsonants($string);
	

	/**
	 * Looking for sequences with two consonants equals preceeded by another consonant
	 * and followed by a vowel e.g. dmma 
	 * In that case we remove the duplicate
	 */
	preg_match_all('/([^aeiou](bb|cc|dd|ff|gg|hh|jj|kk|ll|mm|nn|pp|qq|rr|ss|tt|vv|ww|xx|yy|zz))([aeiou])/i', $string, $matches);
	
	if (isset($matches[1]) && count($matches[1]) > 0)
	    $string = str_replace($matches[1][0], left($matches[1][0], 2), $string);


	// finished, return the cleaned string
	return $string;

    }
    
    
    /**
     * Remove from a string more than n vowels duplicated
     * @param string $string
     * @return string $clean_word
     */
    public static function fixVowels($string)
    {
	// keep unavoidably the first letter 
	$clean_word = substr($string, 0, 1);

	// cleaning vowels. Starting from the second letter
	for ($i = 1; $i <= strlen($string); $i ++)
	{
	    $char_before = mb_substr($string, $i - 1, 1);
	    $char_this = mb_substr($string, $i, 1);

	    if (in_array($char_this, NaiRepeatedLettersFilterTrait::$vowels) && $char_this == $char_before)
	    {
		// double vowel, ignoring
	    } else
	    {
		// to the one remaining, append to clean_word
		$clean_word .= $char_this;
	    }
	}

	if (self::$dbgme)
	    echox('-- result after filter vowels: '.$clean_word);
	
	return $clean_word;
    }
    
    
    /**
     * Remove from a string more than n consonants repeated
     * @param string $clean_word
     * @return string $clean_word
     */
    public static function fixConsonants($string, $min = 2)
    {
	$matches = null;
	
	preg_match_all('/(.)\1+/', $string, $matches);
	
	$repeatedConsonants = array_combine($matches[1], array_map('strlen', $matches[0]));

	if ($repeatedConsonants)
	{
	    foreach ($repeatedConsonants as $key => $value)
	    {
		if (in_array($key, NaiRepeatedLettersFilterTrait::$consonants) && $value > $min)
		    $string = str_replace(str_repeat($key, $value), str_repeat($key, $min), $string);
	    }
	}
	
	unset($repeatedConsonants, $matches);
	
	if (self::$dbgme)
	    echox('-- result after filter consonants: '.$string);

	return $string;
    }

}
