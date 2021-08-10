<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

namespace NaiPosTagger\PosTagging;

use NaiPosTagger\Models\NaiPosArr;
use NaiPosTagger\Models\NaiTerms;
use NaiPosTagger\Filters\NaiRepeatedLettersFilter;
use NaiPosTagger\Filters\NaiRepeatedPatternsFilter;

/**
 * Terms not found inside dictionaries are tagged as UNK.
 * This class try to guess what they are.
 */
class UnknownWords
{
    /** Default language */
    public static $language = 'it';
    
    /** Class debugger flag */
    public static $dbgme = false;


    /**
     * Main method, look inside the pos array for UNK tags and on NPR 
     * e anche sugli NPR dove stabilisco arbitrariamente che non ci possono essere
     * ripetizioni.
     * 
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    public static function solveUnknownWorks($pos_arr)
    {
	$pos_arr_len = count($pos_arr);
	
	for($index = 0; $index < $pos_arr_len; $index ++)
	{
	    $pos_part = $pos_arr[$index];
	    
	    if ($pos_part[0]['features'] == 'UNK' || $pos_part[0]['features'] == 'NPR')
	    {
		// se presente parte successiva provo a passarla
		$next_pos_part = (isset($pos_arr[$index + 1])) ? $pos_arr[$index + 1][0] : null;
		
		$pos_parts_fixed = self::manageUnknownWords($pos_part[0], $next_pos_part);
		
		if(!isset($pos_parts_fixed['fixLastChar']))
		{
		    $pos_arr[$index][0] = $pos_parts_fixed;
		} else
		{
		    $pos_arr[$index][0] = $pos_parts_fixed['fixLastChar'][0];
		    $pos_arr[$index + 1][0] = $pos_parts_fixed['fixLastChar'][1];
		}
		    
	    }
	}

	return $pos_arr;
    }

    
    /**
     * Pipeline with solutions to correct/recognize an unknown term
     * @param array $pos_part il pos of unknown term
     * @param array $next_pos_part the next pos part 
     * @return array $pos_part (updated)
     */
    public static function manageUnknownWords($pos_part, $next_pos_part = null)
    {
	if (self::$dbgme)
	    echox('- analysing unknown term "' . $pos_part['form'] . '"');

	// @todo non standard characters?
	
	$prev_form = strtolower($pos_part['form']);
	
	require_once(TRAITS_PATH.'Filters/NaiRepeatedLettersTrait_'.self::$language.'.php');
	$new_form = NaiRepeatedLettersFilter::transform($prev_form);
	
		
	// if return with some changes, try to search inside dictionaries
	if($new_form != $prev_form)
	{
	    $is_found = self::retrySearch($new_form, $pos_part);
	    
	    if($is_found) return $is_found;
	}
	
	// repeatedPatterns
	$prev_form = $pos_part['form'];
	
	if (self::$dbgme)
	    echox('--- after retrySearch "' . $pos_part['form'] . '"');
	
	$new_form = NaiRepeatedPatternsFilter::transform($pos_part['form']);
	
	if (self::$dbgme)
	    echox('--- after NaiRepeatedPatternsFilter "' . $new_form . '"');
	
	// if return with some changes, try to search inside dictionaries
	if($new_form != $prev_form)
	{
	    $is_found = self::retrySearch($new_form, $pos_part);
	    if($is_found) return $is_found;
	}

	
	if($pos_part['sh-feat'] != 'NPR' && !is_null($next_pos_part))
	{
	    $pos_parts_fixed = self::fixLastChar($pos_part, $next_pos_part);
	    
	    if(isset($pos_parts_fixed['fixLastChar']))
	    {
		// if return an array is because it has found something, let's update the pos arr
		$pos_part = $pos_parts_fixed['fixLastChar'][0];
		$next_pos_part = $pos_parts_fixed['fixLastChar'][1];
		
		return ['fixLastChar' => [$pos_part, $next_pos_part]];
	    }
	}
	
	// vowels accented by mistake
	if(preg_match('/(à|è|ì|ò|ù)$/iu', $pos_part['form']))
	{
	    $new_form = strtr($pos_part['form'], [
	    "à" => "a",
	    "è" => "e",
	    "ì" => "i",
	    "ò" => "o",
	    "ù" => "u"
	    ]);
	    
	    $is_found = self::retrySearch($new_form, $pos_part);
	    if($is_found) return $is_found;
	}
	    
	// searchReVerb ?

	// searchByRegex ?

	// searchByLevensthein ?

	
	// if nothing changed, return unmodified
	return $pos_part;
    }
    
    
    /**
     * Try to solve typing errors where a letter of the next term remained
     * attached to the previous term e.g. "nothingc hange"
     * @param array $pos_part
     * @param array $next_pos_part
     * @return false if not found the first term, or array if both found and replaced
     */
    public static function fixLastChar($pos_part, $next_pos_part)
    {
	// detach last letter of first term
	$last_char = right($pos_part['form'], 1);
	
	// remove it
	$new_form = rtrim($pos_part['form'], $last_char);
	
	// append at the beninning of next term
	$new_next_form = $last_char . $next_pos_part['form'];
	
	if (self::$dbgme)
	    echox('-- in fixLastChar examine '.$new_form. ' and '.$new_next_form);
	
	// look if first term exists in dictionaries
	$is_found = self::retrySearch($new_form, $pos_part);
	
	// if not found, return false
	if(! $is_found) return false;
	
	// if found, replace
	$pos_part = $is_found;
	
	// and try to search also the second term
	$is_found = self::retrySearch($new_next_form, $next_pos_part);
	
	// if not found, return false
	if(! $is_found) return false;
	
	// if found, replace
	$next_pos_part = $is_found;
	
	// and return both
	return ['fixLastChar' => [$pos_part, $next_pos_part]];
    }

    
    /**
     * Search inside dictionaries if an attempt to correct a term give some good result.
     * 
     * @param string $term_corrected
     * @param array $pos_part
     * @return array $pos_part updated if term_corrected found, or false
     */
    private static function retrySearch($term_corrected, $pos_part)
    {
	if (self::$dbgme)
	    echox('-- in retrySearch for "' . $term_corrected . '"');

	NaiTerms::$language = self::$language;
	$result = NaiTerms::searchInDictionaries($term_corrected, null, null, true);
	
	// if nothing found
	if(empty($result))
	    return false;
	
	// if found, replace
	$pos_part['form'] = $term_corrected;
	$pos_part['lemma'] = $result[0]['lemma'];
	$pos_part['features'] = $result[0]['features'];
	$pos_part['sh-feat'] = NaiPosArr::featToShortFeat($pos_part['features']);
	
	if($result[0]['metadata'] != '')
	    $pos_part['metadata'] = better_decode_json($result[0]['metadata']);
	
	return $pos_part;
    }

    
    /**
     * Look if the unknown term is a verb with "ri" before
     * @unused - weak
     */
    public static function searchReVerb($pos_part)
    {
	if (strlen($pos_part['form']) > 2 && strtolower(left($pos_part['form'], 2)) == 'ri')
	{
	    $tmp = right($pos_part['form'], (strlen($pos_part['form']) - 2));

	    // formulo la query per cercare nel dizionario il termine
	    $sql = "SELECT * FROM `" . NaiTerms::set_table_by_initial($tmp) . "` WHERE lower(form) = '" . insert_ap(strtolower($tmp)) . "'";

	    $sql .= " ORDER BY features ASC;";

	    $results = false;
//	    $results = $CI->generic_model->read($sql, 'local', 'sqlite');

	    // SE TOGLIENDO IL "RI-" L'HO TROVATO, SISTEMO E RITORNO
	    if ($results)
	    {
		// devo togliere unk come feat
		$pos_part['features'] = '';

		$unknowSolved = [];

		// e appendo le features tornate dal db
		foreach ($results as $result)
		{
		    $pos_part = NaiPosArr::fillPosPart($pos_part, $result);

		    array_push($unknowSolved, $pos_part);
		}

		return $pos_part;
	    }
	}
    }

    
    /**
     * Search a term by generating queries using a series of REGEXP.
     * Prima cosa da considerare è la lunghezza della parola,
     * diciamo che possiamo considerare:
     * parole tra 1 e 3 caratteri una lettera sbagliata
     * parole tra 4 e 8 caratteri max due lettere sbagliate
     * parole tra 9 e oltre caratteri max tre lettere sbagliate
     * @unused - weak
     */
    public static function searchByRegex($pos_part)
    {
	$pos_part_len = strlen($pos_part['form']);

	if ($pos_part_len < 4)
	{
	    $min_char_diff = 1;
	    $required_len = ($pos_part_len) . " AND " . ($pos_part_len + 1);
	    //perciò tra 3 e 4
	}
	
	if ($pos_part_len > 3 && $pos_part_len < 9)
	{
	    $min_char_diff = 2;
	    $required_len = ($pos_part_len - 1) . " AND " . ($pos_part_len + 1);
	}
	
	if ($pos_part_len > 8)
	{
	    $min_char_diff = 3;
	    $required_len = ($pos_part_len - 2) . " AND " . ($pos_part_len + 2);
	}

	// creo un regexp per ogni lettera seguita dal .* (ovvero qualsiasi cosa) del regexp
	$reg_unknow_word_arr = preg_split('//u', preg_quote($pos_part['form']), -1, PREG_SPLIT_NO_EMPTY);

	$n_chars = count($reg_unknow_word_arr);

	//con .? ignora un solo singolo carattere sbagliato
	$sql_multi_regex = '';

	for ($n = 0; $n < $n_chars; $n ++)
	{
	    $this_unknow_word = '';

	    // uhm questa sotto elimina il char dopo il ?
	    //$this_unknow_word = substr_replace ($pos_part['form'], $reg_unknow_word_arr[$n].".?",$n,$n + 1);
	    //e qua sperim lo rimetto...
	    if (isset($reg_unknow_word_arr[$n + 1]))
		$this_unknow_word = substr_replace($pos_part['form'], $reg_unknow_word_arr[$n] . ".?" . $reg_unknow_word_arr[$n + 1], $n, $n + 1);

	    $sql_multi_regex .= "lower(form) = '" . $this_unknow_word . "'";

	    if ($n < $n_chars - 1)
		$sql_multi_regex .= " OR ";
	}


	// con ? ignora un solo singolo carattere mancante
	$sql_multi_regex .= " OR ";

	for ($n = 0; $n < $n_chars; $n ++)
	{
	    $this_unknow_word = '';

	    $this_unknow_word = substr_replace($pos_part['form'], $reg_unknow_word_arr[$n] . "?", $n, $n + 1);

	    $sql_multi_regex .= "lower(form) ='" . $this_unknow_word . "'";
	    if ($n < $n_chars - 1)
		$sql_multi_regex .= " OR ";
	}
	unset($this_unknow_word);
    }


    /**
     * Questo ci avevo lavorato un  pò e non era per niente male... ma richiede che legga
     * dai dizionari termini simili... tieniamolo qua per ora 
     * $tests = ['assciugacappelli', 'asciugacapelli','asiugacapelli', 'asiugacazzola', 'aggiughine', 'forza', 'sforza	'];
     *  
     * foreach($tests as $test)
     * {
     * 	    echox($test . ': ' . soundexIt($test, 6));
     * }
     * @todo SOLO PER ITALIANO?
     * 
     * https://www.excelvba.it/Forum/story/Visual_Basic_for_Applications/Soundex.html
     * @unused - weak
     */
    public static function searchBySoundexIt($s, $digits = 4, $show_raw = false)
    {
	$m = ''; $i = 0; $t = ''; $raw = ''; $char = '';

	// se la lunghezza di caratteri da restituire è un numero fuori limite
	// (negativo oppure > 100 restituisce il valore di errore "#VALORE!")
	if($digits < 0 || $digits > 100)
	{
	    $soundex = "#VALORE!";
	    return $soundex;
	}

	// trasforma la stringa in tutto maiuscolo
	$s = strtoupper($s);

	// elimina i caratteri non ASCII (accentate e simboli)
	$s2 = str_split($s);
	$s3 = '';

	for($i = 1; $i < count($s2); $i ++)
	{
	    if (preg_match("/[A-Z]/", $s2[$i]))
		$s3 .= $s2[$i];
	}

	// conserva il primo carattere della stringa che ne rappresenta una specie
	// di impronta digitale
	$soundex = left($s, 1);

	// scorre l'intero contenuto della stringa dal secondo carattere in poi
	for($i = 2; $i < strlen($s3); $i ++)
	{
	    // considera carattere per carattere
	    $char = mid($s3, $i, 1);

	    // non tiene conto delle lettere doppie, che vengono ignorate
	    if ($char == mid($s3, $i - 1, 1))
		continue;

	    //assegna il codice numerico ad ogni lettera in base allo schema
	    if(preg_match('/(B|P|F|V)/', $char))
	    {
		    $m = $m . "1";
    // 			} else if(preg_match('/(C|G|J|K|Q|S|X|Z)/', $char))
	    } else if(preg_match('/(C|G|J|K|Q)/', $char))
	    {
		    $m = $m . "2";
	    } else if(preg_match('/(D|T)/', $char))
	    {
		    $m = $m . "3";
	    } else if(preg_match('/(L)/', $char))
	    {
		    $m = $m . "4";
	    } else if(preg_match('/(M|N)/', $char))
	    {
		    $m = $m . "5";
	    } else if(preg_match('/(R)/', $char))
	    {
		    $m = $m . "6";
	    } else if(preg_match('/(S|X|Z)/', $char))
	    {
		    $m = $m . "7";
	    } else
	    {
    // 			$m = $m . $char;
	    }
	}


	// compone la stringa codificata considerando solo il numero di caratteri
	// passato in argomento quando la funzione è stata chiamata
	$soundex = left($soundex . $m, $digits);

	$soundex = str_pad($soundex, $digits, 0, STR_PAD_RIGHT);

	return $soundex;
    }
    

    /**
     * A levensthein more precise
     * @unused - weak
     */
    public static function searchByLevensthein($pos_part)
    {
	//echox ($results);

	/** $lev è un array di tre valori:
	  a. numero di lettere diverse
	  b. differenza di lunghezza tra le due stringhe
	  c. numero di lettere che hanno una posizione differente
	 */
//	echox ("levensthein tra ".$pos_part['form'] ." e ". $result['form']);

//	$lev = better_levenshtein($pos_part['form'], strtolower($result['form']));
	// echox ($lev);
	// ora qua in base ai tre valori di $lev posso selezionare il best match

	/** il num di lettere diverse deve essere minore o uguale
	 * a quello permesso che def. sopra
	 * e la differenza di lunghezza deve essere minore o
	 * uguale a quello permesso che def. sopra
	 */
//	if ($lev[0] <= $min_char_diff && $lev[1] <= $min_char_diff)
//	{
//	    //echox("buono ".$result['form']);
//	    $pos_part['lemma'] = $result['lemma'];
//	    $pos_part['features'] = $result['features'];
//	    $pos_part['sh-feat'] = NaiPosArr::featToShortFeat($result['features']);
//
//
//	    return $pos_part;
//	}
    }

}
