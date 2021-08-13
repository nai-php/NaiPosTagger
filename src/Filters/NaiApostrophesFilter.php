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
 * Detect all terms that contains apostrophes and return the uncontracted form,
 * without apostrophes by reading from the DB "apostrophes".
 *
 * Replace/format also some other characters. Useful also to convert things like "c/c" to
 * a readable form "conto corrente".
 *
 */
class NaiApostrophesFilter
{
    /** Default language */
    public static $language = 'it';
    
    /** Class debugger flag */
    public static $dbgme = false;
    
    /** Db/table containing conversions */
    public static $table = 'apostrophes';
    
    
    /** Public array if needed elsewhere */
    public static $apostrophes_terms = [];
    
    
    /**
     * Terms with apostrophes are in memories_[ln] db "apostrophes" with unused
     * tag "APC".
     * @set $apostrophes_terms
     * @return nothing
     */
    public static function loadDataset()
    {

	// get pairs form-lemma from apostrophes DB
	$stm = "SELECT form, lemma FROM " . self::$table;

	try
	{
	    $pdo = new \Aura\Sql\ExtendedPdo("sqlite:" . DICTIONARIES_PATH.self::$language.'/' . self::$table);
	    
	    $results = $pdo->fetchAll($stm);
	} catch (\Exception $exc)
	{
	    throw new \Exception($exc->getMessage());
	}
	
	$pdo->disconnect();
	
	if(self::$dbgme)
	    echox('- found in db '.count($results).' substitutions');	
	
	// inside lemmas spaces are represented with "_", restore " "
	foreach ($results as $result)
	    self::$apostrophes_terms[$result['form']] = str_replace('_', ' ', $result['lemma']);

    }


    /**
     * Search substitutions to apply until inside sentence are present apostrophes.
     *
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence)
    {
	if (is_null($sentence) || !is_string($sentence) || trim($sentence) == '')
	    return $sentence;

	self::loadDataset();
	
	$sentence = ' ' . clear_double_spaces($sentence) . ' ';

	// misc
	$sentence = str_replace('""', ' ', $sentence);
	$sentence = str_replace("''", ' ', $sentence);
	$sentence = str_replace('||', ' || ', $sentence);
	$sentence = str_replace('“', '"', $sentence);
	$sentence = str_replace('”', '"', $sentence);

	$sentence = str_replace('â‚¬', '€', $sentence);
	$sentence = str_replace('à©', 'è', $sentence);
	$sentence = str_replace('º', '', $sentence);
	$sentence = str_replace('^', '', $sentence);
	
	// for english gerund like "repeatin'"
	$sentence = preg_replace("/in\s?\'\s/iu", 'ing ', $sentence);

	// some cleaning of chars unuseful, eg. single " 
	if (substr_count($sentence, '"') == 1)
	    $sentence = str_replace('"', ' ', $sentence);

	$sentence = str_replace("’", "'", $sentence);

	// unwanted chars at the begin
	if (preg_match('/(\.|,)/', left($sentence, 1)))
	    $sentence = substr($sentence, 1);


	// other apostrophes already escaped
	$sentence = str_replace("\\'", "'", $sentence);

	
	// standardize other things
	
	// but this one NO for english!
	if(self::$language != 'en')
	{
	    $sentence = strtr($sentence, [
		"a'" => "à",
		"e'" => "è",
		"i'" => "ì",
		"o'" => "ò",
		"u'" => "ù",
	    ]);
	}
	   
	$sentence = strtr($sentence, [
	    'á' => 'à',
	    'é' => 'è',
	    'í' => 'ì',
	    'ó' => 'ò',
	    'ú' => 'ù',
	    '°' => ' '
	]);

	// apply transform
	$sentence = self::applyTransform($sentence);

	// try guess article sex
	$sentence = self::fixArtApostrophes($sentence);


	return clear_double_spaces($sentence);

    }

    
    /**
     * Apply the replace.
     * @param string $sentence
     * @return string $sentence updated
     */
    protected static function applyTransform($sentence)
    {
	foreach (self::$apostrophes_terms as $find => $replace)
	{
	    // loops until there are no more apostrophes
	    if (!preg_match("/('|\/)/", $sentence))
		break;

	    if(self::$dbgme)
		$tmp = $sentence;
		
	    $sentence = preg_replace($find, $replace, $sentence);
	    
	    if(self::$dbgme)
		if($tmp != $sentence) echox('- changed from '.$find. ' to '.$replace);
		
	}

	return $sentence;

    }


    /**
     * Try to guess the sex of the article by looking the next term.
     * (unuseful for english of course)
     * @param string $sentence
     * @return string $sentence updated
     */
    protected static function fixArtApostrophes($sentence)
    {
	// get first and last char of next term
	preg_match_all('/\bl\s?\'\s?(\w+)/i', $sentence, $matches);

	if(isset($matches) && count($matches[0]) > 0)
	{
	    foreach ($matches[1] as $match)
	    {
		$first_term = left($match, 1);
		$last_term = right($match, 1);

		// male singular: l'apriscatole, l'eroinomane, l'inceneritore, l'obiettivo, l'uovo
		if (preg_match('/[haeiou]/i', $first_term) && ($last_term == 'e' || $last_term == 'o'))
		    $sentence = preg_replace('/\bl\s?\'\s?' . $match . '/i', 'lo ' . $match, $sentence);

		// male plural: l'uomini
		if (($first_term == 'o' || $first_term == 'u') && ($last_term == 'e' || $last_term == 'i'))
		    $sentence = preg_replace('/\bl\s?\'\s?' . $match . '/i', 'gli ' . $match, $sentence);

		// female singular: l'aquila, l'eroina, l'ora, l'uva
		if (preg_match('/[haeiou]/i', $first_term) && $last_term == 'a')
		    $sentence = preg_replace('/\bl\s?\'\s?' . $match . '/i', 'la ' . $match, $sentence);
	    }
	}
	
	// if something goes wrong, set to "lo"
	$sentence =  preg_replace('/\bl\s?\'\s?/i', 'lo ', $sentence);
	
	return $sentence;
    }

}
