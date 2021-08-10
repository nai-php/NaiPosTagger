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


/**
 * Simplify tokens with repeated patterns eg. "ahahahah"
 * 
 */
class NaiRepeatedPatternsFilter extends ApplyFiltersManager
{
    /** Main regex */
    public static $re = '/([a-z]{2}?)\1+/i';
	
    /**
     * Main method
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence) 
    {
	return trim(preg_replace(self::$re, '\\1\\1', $sentence));
    
    }

}
