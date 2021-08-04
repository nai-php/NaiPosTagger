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
 * Transform genitive eg. John's car to the car of John
 *
 */
class NaiGenitiveFilter extends ApplyFiltersManager
{
    /** Regex  */
    public static $re = '/\b([a-z]{2,}\s?\'s?)\s([a-z]+)/iu';
    
    
    /**
     * Main method
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence) 
    {
	$sentence = ' ' . $sentence . ' ';
	
	preg_match_all(self::$re, $sentence, $matches, PREG_PATTERN_ORDER);
	//echox($matches);
	
	if(empty($matches[1]) || empty($matches[2]))
	{
		return $sentence;
	}
	
	// remove the genitive
	$matches[1][0] = preg_replace("/'\s?s?/iu", '', $matches[1][0]);
	
	// and transform
	$sentence = preg_replace('/'.$matches[0][0].'/iu', 'the '.$matches[2][0]. ' of '.trim($matches[1][0]), $sentence);
	
	// finally remove "the the" if presente
	
	$sentence = str_replace(" the the ", " the ", $sentence);
	
	return trim($sentence);
    
    }

}
