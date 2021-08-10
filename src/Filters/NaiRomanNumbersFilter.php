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
 * Preserve roman numbers.
 * @note @todo unused and unfinished
 */
class NaiRomanNumbersFilter extends ApplyFiltersManager
{

    /**
     * Main method
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence)
    {
	return trim($sentence);
    }


    /**
     * @todo a lot of problems with the italian language. May be more easy with english...
     *
     * Conflicts with italian common words: I VI LI CI MI DI (501) e maybe something else :(
     * Maybe it is necessary to use pattern that consider nearby words like "i capitoli MCXXX e XV"
     *
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    public static function convertRomanNumbers($pos_arr)
    {
	foreach ($pos_arr as $n => $word)
	{
	    // being already tagged as ROMAN, we limit analysis only to these tags
	    if ($word[0]['sh-feat'] == 'ROMAN')
	    {

		// by now, only if they are uppercase...
		preg_match_all("/(M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3}))/u", $word[0]['form'], $matches);

		// if is a token to consider
		if (!empty($matches[0][0]))
		{
		    // @todo preserve hard things like I VI LI CI MI DI
		    
		    // loop trough all features previous or next
		    // to convert in numbers integer
		    $roman2int = self::convertToNumbers($matches[0][0]);
		    $pos_arr[$n][0]['form'] = $roman2int;
		    $pos_arr[$n][0]['lemma'] = $roman2int;
		    $pos_arr[$n][0]['features'] = 'NUM';
		    $pos_arr[$n][0]['sh-feat'] = 'NUM';
		}
	    }
	}

	return $pos_arr;

    }


    /**
     * Convert a roman number to the respective int
     * @param string $sentence
     * @return string $sentence updated
     */
    private static function convertToNumbers($sentence)
    {
	$romans = array(
	    'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
	    'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);

	$result = 0;

	foreach ($romans as $key => $value)
	{
	    while (strpos($sentence, $key) === 0)
	    {
		$result += $value;
		$sentence = mb_substr($sentence, strlen($key));
	    }
	}
	return $result;

    }

}
