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
 * Preserve as "AMOUNT" numeric values
 * 
 */
class NaiAmountsFilter extends ApplyFiltersManager
{
    /** Solve e.g. 22 euro. */
    public static $re_1 = '/\s(\d+(?:\.\d+)?\s?(?:euro|euri|dollaro|dollari|dollars?|bitcoins?|€|\$))/iu';
    
    /** Solve e.g. euro 22 */
    public static $re_2 = '/\s((?:euro|euri|dollaro|dollari|dollars?|bitcoins?|€|\$)\s?\d+(?:\.\d+)?)/iu';
	
    /**
     * Main method.
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence) 
    {
	if(!preg_match('/[0-9]/', $sentence))
	    return $sentence;

	$sentence = ' ' . $sentence . ' ';
	
	$sentence = self::applyFilter(self::$re_1, $sentence, 'AMOUNT');

	$sentence = self::applyFilter(self::$re_2, $sentence, 'AMOUNT');
	 
	return trim($sentence);	
    }

}
