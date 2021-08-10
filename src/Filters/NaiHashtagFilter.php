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
 * Preserve as "HSTAG" Twitter hashtag
 *
 */
class NaiHashtagFilter extends ApplyFiltersManager
{
    /** Regex for hashtags */
    public static $re = '/(#[a-zA-Z]\w*)/iu';
	
    /**
     * Main method
     * @param string $sentence
     * @return string $sentence
     */
    public static function transform($sentence) 
    {
	if(!instr($sentence, '#'))
	    return $sentence;

	$sentence = ' ' . $sentence . ' ';

	return trim(self::applyFilter(self::$re, $sentence, 'HSTAG'));

    }

}
