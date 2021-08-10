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
 * Preserve as "SENT" characters that che show the end of a sentence.
 */
class NaiSentFilter extends ApplyFiltersManager
{
    /** Regex */
    public static $re = '/(\.|\!|\?)/iu';

    
    /**
     * Main method
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence) 
    {
	$sentence = ' ' . $sentence . ' ';
	
	return trim(self::applyFilter(self::$re, $sentence, 'SENT'));
    
    }

}
