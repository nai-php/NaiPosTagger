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
 * Preserve as "PLACE" physical addresses and terms with a "plc" ref metadata
 * 
 */
class NaiAddressesFilter extends ApplyFiltersManager
{
    
    /** Default language */
    public static $language = 'it';

    /** Class debugger flag */
    public static $dbgme = false;
    
    /** Regexp pattern IT */
    public static $re_type_it = '(?:viale|via|piazza|corso|largo|strada|piazzale|borgo|frazione|contrada|località|strada statale|vicolo|piazzetta|vico|quartiere|circonvallazione|galleria|traversa|campo|sestriere|cannaregio|lungomare|stradone|calata|portici|lungolago|salita|calle|c\.\s?so)';
    
    /** Regexp pattern EN */
    public static $re_type_en = '(?:alley|street|avenue|boulevard|byway|causeway|corniche|court|highway|lane|place|plaza|road|route|stravenue|way|woonerf)';
    
    /**
     * Road name
     * @note important set a limit length otherwise it exceeds the sentences_separator!
     */
    public static $re_name = '\s[a-zàèìòù\s\.\']{4,30}\,?';
    
    /** House number, with possible more than one number separated by / o - */
    public static $re_number = '\s[0-9\/]{1,7}';
    
    /** Postal address */
    public static $re_cap = '\s[0-9]{4,5}';
    
    /** Country capitals e.g. Rome */
    public static $re_cap_capitals = '\s[0-9]{2}';
    
    /** Municipality */
    public static $re_municipality = '\s[a-zàèìòù\'\s]{3,15}';
    
    /** Province */
    public static $re_province = '\s[a-z]{2}';
    
    /** Step 7 is only type + name but can be problematic. Activate and use with care. */
    public static $do_step_7 = false;

    
    /**
     * Main method.
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence)
    {
	$sentence = ' ' . $sentence . ' ';

	$re_type = self::setLanguage();
	
	// trigger term is the type. If found go ahead
	if (!preg_match('/\s' . $re_type . '\s/i', $sentence))
	    return $sentence;

	// complete addresses
	$re = '/\s(' .
		$re_type .
		self::$re_name .
		self::$re_number .
		self::$re_municipality .
		self::$re_cap .
		self::$re_province .
		')\s/iu';


	if (preg_match($re, $sentence))
	    $sentence = self::applyFilter($re, $sentence, 'PLACE', 'attr');

	if (self::$dbgme)
	    echox('1 ' . $sentence);

	// ************************************


	// as before but with municipality and Postal address swapped
	$re = '/\s(' .
		$re_type .
		self::$re_name .
		self::$re_number .
		self::$re_cap .
		self::$re_municipality .
		self::$re_province .
		')\s/iu';

	if (preg_match($re, $sentence))
	    $sentence = self::applyFilter($re, $sentence, 'PLACE', 'attr');

	if (self::$dbgme)
	    echox('2 ' . $sentence);


	// ************************************
	// capitals Postal address in some countries can have 2 digit

	$re = '/\s(' .
		$re_type .
		self::$re_name .
		self::$re_number .
		self::$re_municipality .
		self::$re_cap_capitals .
		self::$re_province .
		')\s/iu';

	if (preg_match($re, $sentence))
	    $sentence = self::applyFilter($re, $sentence, 'PLACE', 'attr');

	if (self::$dbgme)
	    echox('3 ' . $sentence);


	// ************************************
	// addresses without province e.g. viale Europa 190 00144 Roma

	$re = '/\s(' .
		$re_type .
		self::$re_name .
		self::$re_number .
		self::$re_cap .
		self::$re_municipality .
		')\s/iu';

	if (preg_match($re, $sentence))
	    $sentence = self::applyFilter($re, $sentence, 'PLACE', 'attr');

	if (self::$dbgme)
	    echox('4 ' . $sentence);


	// ************************************
	// addresses without municipality

	$re = '/\s(' .
		$re_type .
		self::$re_name .
		self::$re_number .
		self::$re_cap .
		self::$re_province .
		')\s/iu';

	if (preg_match($re, $sentence))
	    $sentence = self::applyFilter($re, $sentence, 'PLACE', 'attr');


	// ************************************
	// type + city name + house number + municipality e.g. c.so Italia 4 Genova

	$re = '/\s(' .
		$re_type .
		self::$re_name .
		self::$re_number .
		self::$re_municipality .
		')\s/iu';

	if (preg_match($re, $sentence))
	    $sentence = self::applyFilter($re, $sentence, 'PLACE', 'attr');

	if (self::$dbgme)
	    echox('6 ' . $sentence);


	// ************************************
	// type + city name + house number e.g. c.so Italia 4

	$re = '/\s(' .
		$re_type .
		self::$re_name .
		self::$re_number .
		')\s/iu';

	if (preg_match($re, $sentence))
	    $sentence = self::applyFilter($re, $sentence, 'PLACE', 'attr');

	if (self::$dbgme)
	    echox('6 ' . $sentence);


	// ************************************
	// only type + city name e.g. c.so Italia
	if(self::$do_step_7)
	{

	    $re = '/\s(' .
		    $re_type .
		    self::$re_name .
		    ')\s/iu';

	    if (preg_match($re, $sentence))
		$sentence = self::applyFilter($re, $sentence, 'PLACE', 'attr');

	    if (self::$dbgme)
		echox('7 ' . $sentence);
	}
	
	return trim($sentence);

    }

    
    /**
     * Tag as PLACE terms with a ref "plc" inside metadata
     * @unused @todo maybe can be used in actions...
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    public static function tagPlaces($pos_arr)
    {
	foreach ($pos_arr as $index => $pos_part)
	{
	    if(count($pos_part) > 1)
		continue;
	    
	    if(isset($pos_part[0]['metadata']['ref']) && in_array('plc', $pos_part[0]['metadata']['ref']))
	    {
		$pos_arr[$index][0]['features'] = 'PLACE';
		$pos_arr[$index][0]['sh-feat'] = $pos_arr[$index][0]['features'];
	    }
	}
	
	return $pos_arr;
    }


    /**
     * Set the regexp "type" by the language.
     * @return string $re_type_[language]
     */
    private static function setLanguage()
    {
	switch (self::$language)
	{
	    case 'it':
		return self::$re_type_it;
	    
	    case 'en':
		return self::$re_type_en;

	    default:
		return self::$re_type_en;
	}
    }
    
}
