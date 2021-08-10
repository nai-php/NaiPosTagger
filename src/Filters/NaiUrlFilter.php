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
 * Preserve as "URL" URL address
 */
class NaiUrlFilter extends ApplyFiltersManager
{
    public static $re_1 = '/((?:https?|ftps?|www)[a-z0-9:\/\?_\-\.=#&]+)(?:\b|\s)/iu';
    
    public static $re_2 = '/\s([a-z]+\.(it|com|net|eu|cloud))\b/iu';
	
    /**
     * Main method
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence) 
    {
	if(substr_count($sentence, '.') == 1)
	    return $sentence;
	
	$sentence = ' ' . $sentence . ' ';
	
	$sentence = trim(self::applyFilter(self::$re_1, $sentence, 'URL'));
	
	
	// @todo simple foo.com
//	$sentence = trim(self::applyFilter(self::$re_2, $sentence, 'URL'));
	
	return $sentence;
    }
    
    // @todo fix of possible imprecisions e.g. https 
    public static function fix($sentence) 
    {
//	if(strlen($result) > 6)
//	    $sentence = $result;
    }

}
