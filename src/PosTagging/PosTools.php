<?php

/*
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace NaiPosTagger\PosTagging;


/**
 * Some useful method
 */
class PosTools
{

    /** Class debugger flag true false */
    public static $dbgme = false;


    /**
     * Set scores value inside a given pos part
     * @param int $from (unused)
     * @param array $pos_part
     * @param string $feat
     * @param string $value
     * @return array $pos_part with score updated
     */
    public static function setSubScorePos($from, $pos_part, $feat, $value)
    {
	if($value == 0)
	    return $pos_part;
	
	if(self::$dbgme)
	    echox('- setSubScorePos: in step '.$from.' for token <b>'.$pos_part[0]['form'].'</b> with feat '.$feat.' += '.$value);
	
	foreach ($pos_part as $n => $part)
	{
	    // if needed to exclude precise feats, just like time or sex
	    if($part['sh-feat'] == $feat || $part['features'] == $feat)
		$pos_part[$n]['pos_score'] += $value;
	}
	
	return $pos_part;
    }
  
    
    /**
     * Join indicated parts of a $pos_arr
     * A sort of array_column but on multidimensional arrays
     * @param array $pos_arr
     * @param string $apply_on which part of pos_arr must be joined (form, lemma etc.)
     * @param array $exclude wich kind of pos part must be excluded by the fusion
     * @param string $separator because sometimes we need to use "_" and not whitespaces
     * @return string $string
     */
    public static function joinPosForms($pos_arr, $apply_on = '', $exclude = ['PON'], $separator = ' ')
    {

	$string = '';

	if (! \is_array($pos_arr) || count($pos_arr) == 0)
	    return $string;

	foreach ($pos_arr as $pos_part)
	{
	    // filter by $exclude
	    if (!in_array($pos_part[0]['sh-feat'], $exclude))
	    {
		if ($apply_on == 'lemma')
		{
		    $string .= $pos_part[0]['lemma'] . $separator;
		} else if ($apply_on == 'form')
		{
		    $string .= $pos_part[0]['form'] . $separator;
		} else if ($apply_on == 'sh-feat')
		{
		    $string .= $pos_part[0]['sh-feat'] . $separator;
		} else if ($apply_on == 'features')
		{
		    $string .= $pos_part[0]['features'] . $separator;
		} else if ($apply_on == 'label')
		{
		    $string .= $pos_part[0]['label'] . $separator;
		} else
		{
		    if ($pos_part[0]['features'] == '')
			$string .= $pos_part[0]['form'] . $separator;
		}
	    }
	}

	$string = rtrim($string, $separator);

	$string = clear_double_spaces($string);

	return $string;

    }

   
    /**
     * Convert a pos tag from PPAST to NOUN
     * @param string $from e.g. PPAST:part+past+m+s
     * @return string e.g. NOUN-m:s
     */
    public static function ppast2Noun($from)
    {
	preg_match('/PPAST\:part\+past\+(m|f)\+(s|p)/i', $from, $matches);
	
	if(!isset($matches[1]) || !isset($matches[2]))
	    return $from;
		
	if($matches[1] == 'm') $sex = 'M';
	if($matches[1] == 'f') $sex = 'F';
	
	$number = $matches[2];
	
	return "NOUN-$sex:$number";
	
    }
    
    
    /**
     * Convert a pos tag from ART to PRO
     * @param string $from
     * @return string
     */
    public static function art2Pro($from)
    {
	preg_match('/ART\-(M|F)\:(s|p)/i', $from, $matches);

	if(!isset($matches[1]) || !isset($matches[2]))
	    return $from;
		
	$sex = $matches[1];
	
	$number = $matches[2];
	
	return "PRO-PERS-CLI-1-$sex-".strtoupper($number);
	
    }

}
