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
 * Preserve as "DATE" date values
 * 
 */

class NaiDatesFilter extends ApplyFiltersManager
{

    private static $tag = 'DATE';

    
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
	
	$sentence = self::applyFilter(NaiDatesFilterTrait::$re_1, $sentence, self::$tag);
	
	$sentence = self::applyFilter(NaiDatesFilterTrait::$re_2, $sentence, self::$tag);
	
	$sentence = self::applyFilter(NaiDatesFilterTrait::$re_3, $sentence, self::$tag);
	
	return trim($sentence);
    }

    
    /**
     * Second step to fix possible wrong assignements
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function fix($sentence)
    {
	$tokens = explode(' ', $sentence);
	
	$new_sentence = [];
	
	// consider only DATE tag
	foreach ($tokens as $token)
	{
	    if(! isset(NaiSentence::$preserved_kart[$token]))
	    {
		array_push($new_sentence, $token);
		continue;
	    }
	    
	    // get back unpreserved value
	    $pos_part = NaiSentence::$preserved_kart[$token];

	    // form contains the value to verify
	    $new_pos_part = $pos_part;

	    
	    // verify if is valid
	    $is_valid = self::isValidFullDate($new_pos_part['form']);
//	    dumpx($is_valid);
	    
	    // if it is not a date (e.g. 99/100) let's trasform to CODE
	    if(!$is_valid)
		array_push($new_sentence, NaiSentence::preserveString('CODE', hex_to_str($new_pos_part['form'])));
	    
	}

	// echox($new_sentence);	
	
	return implode(' ', $new_sentence);	
    }

    
    /**
     * Verify if can be numbers related to days and months
     *
     * @todo english formatted dates
     * @param string $date 31/10/1980 or 31/10/80
     * @return boolean $valid_date
     */
    public static function isValidFullDate($date)
    {
	$daysinmonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	
	$valid_date = false;

	preg_match($re_valid_1, $date, $matches);
	
	if ($matches)
	{
	    $day = $matches[1];
	    $month = $matches[2];
	    $year = $matches[3];

	    // if is a short year 
	    if ($year < 50) $year += 2000;
	    if ($year < 100) $year += 1900;

	    // february bissextile year
	    if ($month == 2 && $year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0))
	    {
		if ($day >= 1 && $day <= 29) $valid_date = true;
	    } else if ($month >= 1 && $month <= 12)
	    {
		// not bissextile year
		if ($day >= 1 && $day <= $daysinmonth[$month-1]) $valid_date = true;
	    }

	}
	    
	return $valid_date;
    }
    
    
    /**
     * Verify if can be numbers related to days and months in short dates
     *
     * @todo english formatted dates
     * @param string $date 31/10 or 31/10
     * @return boolean $valid_date
     */
    public static function isValidShortDate($date)
    {
	$daysinmonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	
	$valid_date = false;

	preg_match('/([0-3][0-9])\/([0-3]?[0-9])/', $date, $matches);
	
	if ($matches)
	{
	    $day = $matches[1];
	    $month = $matches[2];

	    if ($day >= 1 && $day <= $daysinmonth[$month-1]) $valid_date = true;

	}
	    
	return $valid_date;
    }

}
