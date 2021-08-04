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
 * Remove repeated base punctuations like ? ! and . 
 * @todo some other PON chars to add?
 */
class NaiRepeatedPonsFilter
{

    /** Most common pon chars ? ! . , */
    public static $basic_pon_chars = [
	'\?+' => ' ? ',
	'\!+' => ' ! ',
	'\.+' => ' . ',
	'\,+' => ' , ',
	'\.\.\.' => ' ... '
    ];
    
    /** Main regexp */
    public static $advanced_re = "/([^\w\s\.]|_){2,}/iu";


    /**
     * Main method
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence)
    {
	foreach (self::$basic_pon_chars as $find => $replace)
	    $sentence = preg_replace('/' . $find . '/u', $replace, $sentence);

	return clear_double_spaces($sentence);

    }

}
