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

use NaiPosTagger\Models\NaiSentence;

/**
 * Preserve as "NUM" numeric values with up to 4 digits after separators
 * (and possible % signs)
 *
 */
class NaiNumbersFilter extends ApplyFiltersManager
{

    /**
     * Main method
     * @param string $sentence
     * @return string $sentence
     */
    public static function transform1($sentence)
    {
	
	$sentences = NaiSentence::explodeSentences($sentence);

	$matches = [];
	
	$new_sentences = [];

	foreach ($sentences as $sentence)
	{
	    $sentence = ' ' . $sentence . ' ';
	    
	    $sentence = self::preserveDecimal($sentence);
	    
	    $sentence = self::preserveShortYears($sentence);
	    
	    // PERFECT. Note the ?: for each one, that avoid troublesome submatch
	    preg_match_all('/(?![\p{L}]+)((?:\d*(?![\p{L}]+)(?:\.|\,|\-|\/|\:|\%)?)(?:\d*(?![\p{L}]+)(?:\.|\,|\-|\/|\:|\%)?)?(?:\d*(?![\p{L}]+)(?:\.|\,|\-|\/|\:|\%)?)?(?:\d*(?![\p{L}]+)(?:\.|\,|\-|\/|\:|\%)?)?)(?![\p{L}]+)/', $sentence, $matches, PREG_PATTERN_ORDER);

	    $final = [];
	    
	    // first loop
	    foreach ($matches as $match)
	    {
		foreach ($match as $submatch)
		{
		    // excluding empty matches
		    if ($submatch == '' || $submatch == '.')
			continue;

		    array_push($final, $submatch);
		}
	    }

	    // final clean
	    $final = array_unique($final);
	    $final = array_values($final);
	    

	    foreach ($final as $n => $final_check)
	    {

		// remain just some things like "-" after "1 -" and some commas e.g. "001, 002, 003"
		if (!is_numeric(right(trim($final_check), 1)))
		    $final[$n] = rtrim(trim($final_check), right(trim($final_check), 1));

		if ($final[$n] == '' || (strlen($final[$n]) == 1 && !is_numeric($final[$n])))
		{
		} else
		{
		    if(strlen($final[$n]) == 1)
			continue;
		    
		    $preserved_id = NaiSentence::preserveString('NUM', $final[$n]);
// echox($n.': '.$final[$n]. ' -> '.$preserved_id);		    
		    
		    $tmp = $sentence;
		    $sentence = str_replace(' '.$final[$n].' ', ' '.$preserved_id.' ', $sentence);
		    
		   
		    // if no results found playing with spaces, try without :(
		    if(trim($tmp) == trim($sentence))
			$sentence = str_replace($final[$n], ' '.$preserved_id.' ', $sentence);
		}
	    }

	    $new_sentences[] = trim($sentence);
	}
//	diex($new_sentences);
	
	return NaiSentence::implodeSentences($new_sentences);

    }


    /**
     * Preserve numbers with float and percentages, not considered before
     * e.g. 3% , 2%, 653.6%
     *
     * @param string $sentence
     * @return string $sentence
     */
    public static function preserveDecimal($sentence)
    {
	$matches = [];
	
	preg_match_all('/\d+\s?(?:\,|\.)?\s?\d?\s?\%?/', $sentence, $matches, PREG_PATTERN_ORDER);
	
	foreach ($matches[0] as $match)
	{
	    $preserved_id = NaiSentence::preserveString('NUM', $match);
	    $sentence = str_replace(' '.$match.' ', ' '.$preserved_id.' ', $sentence);
	}
	    
	return $sentence;
    }

    
    /**
     * Preserve short years e.g. ' 97. They are only tagged as NUM, without controls
     * if they are real dates, and for which millennium/century.
     *
     * @param string $sentence
     * @return string $sentence
     */
    public static function preserveShortYears($sentence)
    {
	$matches = [];
	
	preg_match_all('/\'\s?\d+/', $sentence, $matches, PREG_PATTERN_ORDER);
	
	foreach ($matches[0] as $match)
	{
	    $preserved_id = NaiSentence::preserveString('NUM', trim($match));
	    
	    $sentence = str_replace(trim($match), ' '.$preserved_id.' ', $sentence);
	}
	    
	return $sentence;
    }
    
    
	/**
	 * And for numbers with only one digit
	 *
     * @param string $sentence
     * @return string $sentence
	 */
    public static function transform2($sentence)
    {
	$tokens = explode(' ', $sentence);

	foreach ($tokens as $n => $token)
	{
	    // they could be something like 2.1, 2.2 etc. 
	    if (right($token, 1) == ',')
			$token = rtrim($token, ',');

	    if (is_numeric($token))
		$tokens[$n] = NaiSentence::preserveString('NUM', $token);
	}

	$sentence = implode(' ', $tokens);

	return trim($sentence);

    }

}
