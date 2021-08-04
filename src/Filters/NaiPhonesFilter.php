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

use NaiPosTagger\Models\NaiTermsMetadata;

/**
 * Detect phone numbers from sequences of NUM and tag them as PHONE
 * 
 * @todo in transformOld there is something still to consider/implements
 * @todo if there is international prefix it miss tail numbers. Needs test/check
 * @todo with 36633801190185756390185730290 they remain joined :(
 * @todo with multiple numbers separated by comma, something goes wrong
 * @todo clean up
 */
class NaiPhonesFilter
{
    /** Default language */
    public static $language = 'it';
    
    /** Class debugger flag */
    public static $dbgme = false;
    
    public static $countries_prefixes = '(\(?\+\s?[0-9]{2}\)\s?)?';
    
    public static $local_prefixes = '(0[1-9]{2,3})';
    
    // but they seems okay also for international numbers
    public static $mobile_prefixes = '(320|328|329|330|331|333|334|335|336|337|338|339|340|345|346|347|348|349|360|366|371|373|388|391|392|393|800|0066|0039)';
    
    // all italian home phone numbers
    public static $re1 = '0[0-9]{1,3}\s?[0-9]{6,7}';
    
    // cell phone without whitespaces
    public static $re10 = '[0-9]{6,8}';
    
	
    /**
     * Operations on pos arr to identify NUM tags
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    public static function transform($pos_arr)
    {
	if(self::$dbgme)
	    echox('- transform');
	
	// retrieve all sequences of nearby numbers
	$numbers_seqs = self::collectNumTags($pos_arr);
// 	echox($numbers_seqs);

	// examining each number separately
	if(isset($numbers_seqs[0]))
	{
	    if(self::$dbgme)
		echox('-- examining '.$numbers_seqs[0]['number']);
	    
	    $pos_arr = self::pipeline($pos_arr, $numbers_seqs[0]);
	}
	
	$pos_arr = self::fix($pos_arr);
	
	return $pos_arr;
    }

    
    /**
     * Pipeline of operations
     * @param array $pos_arr
     * @param int $number_seq
     * @return array $pos_arr updated
     */
    public static function pipeline($pos_arr, $number_seq)
    {
	$number = ' ' . $number_seq['number'] . ' ';

	// search on non problematic numbers
	$is_phone_number = NaiPhonesFilter::searchSecures($number);
	
	if(self::$dbgme)
	    echox('-- after searchSecures '.$is_phone_number);
	
	// if true join pos parts in only one
	if($is_phone_number)
	{
	    $pos_arr = self::joinPosParts($pos_arr, $number_seq);

	    if(self::$dbgme)
		echox('-- after searchSeparated 2: '.$number);
	    
	    return self::transform($pos_arr);
	}

	
	// search on problematic numbers separated by whitespaces or characters
	$is_phone_number = NaiPhonesFilter::searchSeparated($number);

	if(self::$dbgme)
	    echox('-- after searchSeparated '.$is_phone_number);
	
	if($is_phone_number)
	{
	    $pos_arr = self::joinPosParts($pos_arr, $number_seq);
	    
	    if(self::$dbgme)
		echox('-- after searchSeparated 3: '.$number);
		
	    return self::transform($pos_arr);
	}

	if(self::$dbgme)
	    echox('-- after searchSeparated 4: '.$number);
	
	return $pos_arr;
 
    }
    

    /**
     * Given a pos arr return an array with all the sequences of NUM and the number 
     * of parts that were joined
     * @param array $pos_arr
     * @return array $numbers_seqs
     */
    private static function collectNumTags($pos_arr)
    {
	$numbers_seqs = [];
	$numb = '';
	$n_parts = 0;
	
	for($index = 0; $index < count($pos_arr); $index ++)
	{
	    $pos_part = $pos_arr[$index];
	    
	    if($pos_part[0]['sh-feat'] == 'NUM')
	    {
		$numb .= $pos_part[0]['lemma'];
		$n_parts ++;

	    } else
	    {

		if($numb != '' && strlen($numb) > 2)
		    $numbers_seqs[] = ['index' => ($index - $n_parts), 'number' => $numb, 'parts' => $n_parts];
		
		$numb = '';
		$n_parts = 0;
	    }
	}
	
	return $numbers_seqs;
    }
    
  
    /**
     * Cerca prefissi internazionali es. +39 prima del resto delle operazioni
     * @param type $number
     */
    private static function searchInternationalPrefixes($number)
    {
	$number = preg_replace('/\s(' . self::$countries_prefixes . self::$mobile_prefixes . self::$re10 . ')\s/', ' <b class="x">PHONE 10: $1</b> ', $number);
    }
    
    
    /**
     * Dato un numero SENZA Spazi all'interno, cerca di 
     * capire se è un numero di telefono.
     * @param int $number
     * @return boolean true se il numero è stato riconosciuto
     * come numero di telefono o false.
     */
    private static function searchSecures($number)
    {
	//  tutti i fissi italiani senza spazi
	preg_match_all('/\s(' . self::$re1 . ')\s/', $number, $matches, PREG_PATTERN_ORDER);
//	echox($matches[0]);

	if(self::$dbgme)
	    echox('-- searchSecures 1 '.$number);
		
	if(isset($matches[0][0]) && $matches[0][0] != '')
	    return true;

	// cell senza spazi
	preg_match_all('/(' . self::$mobile_prefixes . '\.?' . self::$re10 . ')/', $number, $matches, PREG_PATTERN_ORDER);
// 		echox($matches[0]);

	if(isset($matches[0][0]) && $matches[0][0] != '')
	    return true;

	return false;
    }


    /**
     * Rileva numeri dove i prefissi sia domestici che mobile sono staccati da spazio
     * @param string $number
     * @return string
     */
    private static function searchSeparated($number)
    {
	// raccolgo tutti i gruppi di uno o più numeri che trovo tra testi
	preg_match_all('/\b(\d+)\b/', $number, $matches, PREG_PATTERN_ORDER);

	if(self::$dbgme)
	    echox('-- searchSeparated 1: '.$number);
	
// 		echox($matches[0]);
	// colleziono gli indici di partenza del regex indicato
	$prefix_start = [];
	foreach ($matches[0] as $index => $match)
	{
	    if (preg_match('/^' . self::$local_prefixes . '$/', $match) || preg_match('/^' . self::$mobile_prefixes . '$/', $match))
		$prefix_start[] = $index;
	}

// 		echox($prefix_start);
	// ora comandano i prefissi. Prendo tutti i gruppi tra uno e l'altro
	foreach ($prefix_start as $key => $start)
	{
	    $len = (isset($prefix_start[$key + 1])) ? ($prefix_start[$key + 1] - $start) : (count($matches[0]) - $start);

	    $chunks = array_slice($matches[0], $start, $len);

	    // intanto, se $chunks = $matches è filotto!
	    if ($chunks == $matches[0])
		return true;


	    // @todo restano alcuni prefissi internazionali davanti...
	    // length minimum tolerance
	    $chunk_length = implode('', $chunks);

	    // @todo uhm pensare bene
	    if (strlen($chunk_length) > 6)
		return true;

	}

	// @todo in alcuni casi mi restano due numeri uniti es. 373720877902366316979 ...

	return false;

    }


    /**
     * Unused
     */
    private static function transformOld($number)
    {

	$number = preg_replace('/\s(' . self::$re1 . ')\s?/', ' <b class="x">PHONE 1: $1</b> ', $number);

	$number = preg_replace('/\s(' . self::$countries_prefixes . self::$mobile_prefixes . self::$re10 . ')\s/', ' <b class="x">PHONE 10: $1</b> ', $number);

    }

  
    /**
     * Come ultimo passaggio unisco le pos part rilevate come
     * componenti di un numero di telefono.
     * 
     * @param array $pos_arr
     * @param array $number_seq
     * @return array $pos_arr
     */
    private static function joinPosParts($pos_arr, $number_seq)
    {
	$index = $number_seq['index'];
	$n_parts = $number_seq['parts'];
	
	if(self::$dbgme)
	    echox('--- joinPosParts '.$number_seq['parts'].' parts starting from '.$index);
	
	$complete_num = '';
	$tmp = $pos_arr[$index];
	
	for($n = $index; $n < ($index + $n_parts); $n ++)
	{
	    $complete_num .= $pos_arr[$n][0]['form'];
	    if($n > $index)
		unset($pos_arr[$n]);
	}
	
	$tmp[0]['form'] = $complete_num;
	$tmp[0]['lemma'] = $complete_num;
	$tmp[0]['features'] = 'PHONE';
	$tmp[0]['sh-feat'] = 'PHONE';
	
	$NaiTermsMetadata = new NaiTermsMetadata();
	$NaiTermsMetadata->language = self::$language;
	
	$tmp[0]['metadata']['ref'] = $NaiTermsMetadata->setMetadata([], 'ref', 'attr');
	
	$pos_arr[$index] = $tmp;
	
	$pos_arr = array_values($pos_arr);
	
	return $pos_arr;
    }

    
    /**
     * Fix possible wrong assignements following some simple rule.
     * @param array $pos_arr
     * @return array $pos_arr
     */
    private static function fix($pos_arr)
    {
		foreach($pos_arr as $index => $pos_part)
		{
			if($pos_part[0]['features'] != 'PHONE')
				continue;
			
			if(strlen($pos_part[0]['form']) < 7)
			{
				$pos_arr[$index][0]['features'] = 'NUM';
				$pos_arr[$index][0]['sh-feat'] = 'NUM';
			}
		}
		
		return $pos_arr;
    }
    
}
