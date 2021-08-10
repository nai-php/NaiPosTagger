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
 * Preserve as "VAT" italian VAT numbers
 */
class NaiVATFilter extends ApplyFiltersManager
{
    /** Regex pattern */
    public static $re = '/((?:partita iva|part\.\s?iva|p\.\s?iva|piva|pi|vat number)\s[0-9]{11})/i';

    
    /**
     * Main method
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence) 
    {
	$sentence = ' ' . $sentence . ' ';
	
	return trim(self::applyFilter(self::$re, $sentence, 'VAT', 'attr'));
    
    }

}
