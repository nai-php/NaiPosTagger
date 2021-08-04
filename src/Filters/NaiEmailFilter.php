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
 * Preserve as "EML" email address
 *
 */
class NaiEmailFilter extends ApplyFiltersManager
{
    // complete address
    public static $re_1 = '/([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,10})/iu';
    
    // address with missing extension
    public static $re_2 = '/([a-z0-9._%+-]+@[a-z0-9.-]+)/iu';

    
    /**
     * Main method
     * @param string $sentence
     * @return string $sentence
     */
    public static function transform($sentence) 
    {
	if(!instr($sentence, '@'))
	    return $sentence;

	$sentence = ' ' . $sentence . ' ';

	$sentence = self::applyFilter(self::$re_1, $sentence, 'EML', 'attr');

	$sentence = self::applyFilter(self::$re_2, $sentence, 'EML', 'attr');
	
	return trim($sentence);

    }

}
