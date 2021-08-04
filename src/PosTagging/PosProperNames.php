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

use NaiPosTagger\PosTagging\PosTools;

/**
 * Try to identify proper names.
 * Assign a score float from 0 and up. Eg. 1.2 is a good score.
 * Token are tagged as NPR if the score is >= 0.7.
 *
  @todo
  - a small NN ?
  - to manage other languages, put in external file
 */
class PosProperNames
{

    /** Class debugger flag true false */
    private static $subdbg = false;
    
    private static $indexes;
    
    private static $possible_names;
    
    private static $scores;
    
    private static $tokens;
    
    // il punteggio minimo, qua dovrebbe venire segnato un punteggio
    private static $minimum_accepted_score;
    
    // un punteggio oltre 1.1 per me è sicurissimo, preservo
    private static $absolutely_secure_score;
    
    private static $pos_arr;


    /**
     * Analizza ogni token della frase alla ricerca di NPR.
     *
     * @param array $pos_arr
     * @param float $minimum_accepted_score la soglia sopra la quale segno il posscore
     * @param float $absolutely_secure_score soglia dove sono sicuro che sia un NPR
     * @return string $sentence con NPR sicuri preservati, e segna pos score
     */
    public static function transform($pos_arr, $minimum_accepted_score = 0.7, $absolutely_secure_score = 0.9)
    {
	self::$tokens = PosTools::joinPosForms($pos_arr, 'form', ['SENT']);
	self::$minimum_accepted_score = $minimum_accepted_score;
	self::$absolutely_secure_score = $absolutely_secure_score;
	self::$indexes = [];
	self::$possible_names = [];
	self::$scores = [];
	self::$pos_arr = $pos_arr;

	foreach ($pos_arr as $index => $pos_part)
	{
	    if($pos_part[0]['sh-feat'] == 'UNK')
		self::firstAnalysis ($pos_part[0]['form'], $index);
	}
	
	self::secondAnalysis();
	
	
	$pos_arr = self::applyProbablyTag($pos_arr);
	
	if (self::$subdbg)
	{
	    echox('----- solutions found: ');
	    echox(self::$indexes);
	    echox(self::$possible_names);
	    echox(self::$scores);
	}
	
	return $pos_arr;
    }


    /**
     * La prima parte di analisi ma SOLO sugli UNK
     * @param array $token il singolo termine
     * @param int $index l'indice del token
     * @return array composto da indici, termini e punteggio assegnato
     */
    private static function firstAnalysis($token, $index)
    {
	$token_score = 0;
	
	if (self::$subdbg)
	    echox('- analyze token: '.$token);

	// if only 3 letters penalyze [a-zàèìòù]{2,}
	if (strlen($token) < 3)
	    $token_score -= 10;

	// if more than 1 
	if (strlen($token) > 1)
	    $token_score += 0.1;

	// se più di n lettere un piccolo vantaggio
	if (strlen($token) > 3)
	    $token_score += 0.1;

	// ma non più, diciamo, di 15 lettere
	if (strlen($token) > 15)
	    $token_score -= 10;


	// first letter uppercase
	if (substr($token, 0, 1) == strtoupper(substr($token, 0, 1)) && self::countCapitalLetters($token) == 1)
	{
	    if (self::$subdbg)
		echox('-- first letter uppercase for token '.$token);
	    
	    if ($index == 1)
	    {
		// but if is the first in a sentence little bit less
		$token_score += 0.2;
	    } else
	    {
		$token_score += 0.5;
	    }
	}


	// if ends with "a" o "o" o "i" (for surnames)
	if (right(strtolower($token), 1) == 'a' || right(strtolower($token), 1) == 'o' || right(strtolower($token), 1) == 'i')
	{
	    $token_score += 0.2;
	}

	// if is numeric, - 10
	if (preg_match('/[0-9,\?]/', $token))
	{
	    $token_score -= 10;
	}

	// recurrent terms before names  @todo add more
	if (isset(self::$tokens[$index - 1]) && preg_match('/\b(per|di|è|era|sono|la|a|alla|ciao|buongiorno|su|sono)\b/i', self::$tokens[$index - 1]))
	{
	    $token_score += 0.3;
	}
	
	// recurrent terms after names  @todo add more
	if (isset(self::$tokens[$index + 1]) && preg_match('/\b(è|is)\b/i', self::$tokens[$index + 1]))
	{
	    $token_score += 0.2;
	}
	
	// if preceded by a token with metadata ref=pers
	if (isset(self::$tokens[$index - 1]) && (isset(self::$pos_arr[$index - 1][0]['metadata']['ref']) && in_array('pers', self::$pos_arr[$index - 1][0]['metadata']['ref'])))
	{
	    $token_score += 0.8;
	}
	
	// if followed by token like srl, spa etc.
	if (isset(self::$tokens[$index + 1]) && preg_match('/\b(spa|srl|snc)\b/i', self::$tokens[$index + 1]))
	{
	    $token_score += 0.4;
	}
	
	if (self::$subdbg)
	    echox('---- firstAnalysis for ' . $token . ' assigned score ' . $token_score);

	// and collect to avoid useless duplicates
	if ($token_score >= self::$minimum_accepted_score && !in_array($token, self::$possible_names))
	{
	    array_push(self::$indexes, ($index));
	    array_push(self::$possible_names, $token);
	    array_push(self::$scores, $token_score);
	}

    }

     
    /**
     * Seconda valutazione.
     * Tra quelli papabili guardo se ci sono possibili accoppiate nome-cognome.
     */
    private static function secondAnalysis()
    {
	foreach (self::$indexes as $n => $index)
	{
	    // guardo sempre il termine precedente, perciò 
	    if(! isset(self::$indexes[$n - 1]))
		continue;
	    
	    // se sono in un termine papabile e quelle precedente pure, li premio
	    if (
		self::$indexes[$n - 1] == ($index - 1) &&
		self::$scores[$n] > self::$minimum_accepted_score &&
		self::$scores[$n - 1] > self::$minimum_accepted_score
	    )
	    {
//		echox('----- confronto precedente '.$index);
		self::$scores[$n] += .3;
		self::$scores[$n] += .3;
	    }
	}
    }
    
    
    private static function countCapitalLetters($string)
    {
	$lowerCase = strtolower($string);

	return strlen($lowerCase) - similar_text($string, $lowerCase);

    }

    
    /**
     * Arriva qua solo se ci sono termini che hanno superato la soglia.
     * Per ora provo a taggarli sia come NPR che come NOUN
     * 
     * @param array $pos_arr
     * @return array $pos_arr (updated)
     */
    public static function applyProbablyTag($pos_arr)
    {
	foreach (self::$indexes as $n => $index)
	{
//		echox($subscores);
	    $pos_arr[$index][0]['features'] = 'NPR';
	    $pos_arr[$index][0]['sh-feat'] = 'NPR';
	    $pos_arr[$index][0]['pos_score'] = self::$scores[$n];

	    $pos_arr[$index][1] = $pos_arr[$index][0];
	    $pos_arr[$index][1]['features'] = 'NOUN-m:s';
	    $pos_arr[$index][1]['sh-feat'] = 'NOUN';
	    $pos_arr[$index][1]['pos_score'] = self::$scores[$n] / 2;
	}
	
	return $pos_arr;
    }
}
