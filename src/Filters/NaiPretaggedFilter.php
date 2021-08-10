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
 * Preserve as "POS" tokens that already contains pos tags
 * 
 * @note created in a previous generation, for future expansions.
 */
class NaiPretaggedFilter extends ApplyFiltersManager
{

    /** 
     * We consider only these tags.
     * Cannot use all because some like "con" should be wrongly confused with real words.
     */
    public static $pos_tags_pretagged = ['ADJ', 'ADV', 'PRE', 'ART', 'CON', 'DET', 'NOUN', 'NPR', 'PRO-WH', 'PROPERS', 'PRO', 'VER', 'SMI', 'SYM'];


	
    /**
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence) 
    {
	$sentence = preg_replace_callback('/^(' . preg_quote(implode('|', self::$pos_tags_pretagged)) . ')$/', function ($matches) {
	    return NaiSentence::preserveString(" POS", $matches[1]) . " ";
	}, $sentence);

	return $sentence;	
    }

}
