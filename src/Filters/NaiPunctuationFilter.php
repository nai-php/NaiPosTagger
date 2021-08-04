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
 * Preserve as PON punctuation and some other characters
 */
class NaiPunctuationFilter extends ApplyFiltersManager
{

    protected static $re = '/[\/\?\.\,\;\·\:\>\<\!\'\"@\$%&\-\_\=\^\*\[\]\(\)\{\}\:\،、\–\—\᠁\‹\›\«\»\‐\-\^\†\‡\°\¡\¿\※\#\№\÷\×\º\ª\%\‰\+\−\=‱§\~\_\|\‖\¦\©\℗\®\℠\™\‘\’\“\”\"\&\*\@\•\¶\′\″\‴\¤\​₠\​€​\ƒ\​£\​⁂\⸮\◊\⁀\…\\\]/u';
    
    /**
     * Main method
     * @param string sentence $sentence
     * @return string sentence updated
     */
    public static function transform($sentence) 
    {

	$tokens = explode(' ', $sentence);
	
	foreach ($tokens as $n => $token)
	{
	    if(! isset(NaiSentence::$preserved_kart[$token]) && preg_match(self::$re, $token))
	    {
//		echox('- '.$replace_with);    
		$tokens[$n] = NaiSentence::preserveString('PON', $token);
		
	    }
	}

	$sentence = implode(' ', $tokens);
	
	return trim($sentence);
    }
}
