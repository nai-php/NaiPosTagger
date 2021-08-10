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

use NaiPosTagger\Models\NaiSentence;

/**
 * Preserve as "CODE" alphanumeric codes
 */
class NaiCodesFilter extends ApplyFiltersManager
{

    /**
     * First step, codes eg. 285003_bis, contracts_2016_1
     * @param string $sentence
     * @return string $sentence with imploded tokens
     */
    public static function transform1($sentence)
    {
	$tokens = explode(' ', $sentence);
	
	foreach ($tokens as $n => $token)
	{
	    if(isset(NaiSentence::$preserved_kart[$token]))
		continue;
	    
	    if(preg_match('/([a-z0-9]+_[a-z0-9]+(?:_[a-z0-9]+)?(?:_[a-z0-9]+)?)/i', $token))
		$tokens[$n] = NaiSentence::preserveString('CODE', $token, 'attr');
	}
	
	return trim(implode(' ', $tokens));
    }
    
    
    /**
     * Second step, mixed alphanumeric 
     * @param string $sentence
     * @return string $sentence with imploded tokens
     */   
    public static function transform2($sentence)
    {
	if (!preg_match('/[0-9]/', $sentence))
	    return $sentence;

	$tokens = explode(' ', $sentence);
	
	foreach ($tokens as $n => $token)
	{
	    if(isset(NaiSentence::$preserved_kart[$token]))
		continue;
	    
	    if(preg_match('/[0-9]/', $token) && preg_match('/[a-z]/i', $token))
		$tokens[$n] = NaiSentence::preserveString('CODE', $token, 'attr');
	}
	
	return trim(implode(' ', $tokens));
	
    }


}
