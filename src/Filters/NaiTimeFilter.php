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
 * Preserve as "TIME" time values e.g. 22:45:31
 */
class NaiTimeFilter extends ApplyFiltersManager
{

    /** Regex for 00:00:00:00 */
    public static $re_1 = '/\s([0-9]{2}\s?:\s?[0-9]{2}\s?:\s?[0-9]{2}\s?:\s?[0-9]{2})\s/';
    
    /** Regex for 00:00:00 */
    public static $re_2 = '/\s([0-9]{2}\s?:\s?[0-9]{2}\s?:\s?[0-9]{2})\s/';

    /** Regex for 00:00 */
    public static $re_3 = '/\s(alle|le|ore)\s[0-9]{1,2}(\:|\.|\,)\s?[0-9]{2}\s/';
    
    /** Regex for 'alle 11' etc. */
    public static $re_4 = '/\s(alle|le|ore)\s[0-9]{1,2}\s/';

    
    /**
     * Main method
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence)
    {
	if (!preg_match('/[0-9]/', $sentence))
	    return $sentence;

	$sentence = ' ' . $sentence . ' ';
	
//	$sentence = self::applyFilter(self::$re_1, $sentence, 'TIME');
	
//	$sentence = self::applyFilter(self::$re_2, $sentence, 'TIME');
	
	$sentence = self::applyFilter(self::$re_3, $sentence, 'TIME');
	
	$sentence = self::applyFilter(self::$re_4, $sentence, 'TIME');

	return trim($sentence);
    }

    public static function fix($pos_arr)
    {
	foreach ($pos_arr as $index => $pos_part)
	{
	    if($pos_part[0]['sh-feat'] == 'TIME')
	    {
		$pos_arr[$index][0]['form'] = str_replace(' ', '_', $pos_part[0]['form']);
		$pos_arr[$index][0]['lemma'] = str_replace(' ', '_', $pos_part[0]['lemma']);
		
	    }
	}
	
	return $pos_arr;	
    }
    
}
