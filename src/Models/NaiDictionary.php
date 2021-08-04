<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

namespace NaiPosTagger\Models;

use NaiPosTagger\Models\NaiSentence;
use NaiPosTagger\Models\NaiPosArr;

/**
 * Dictionaries model
 *
 */
class NaiDictionary
{
    /** Default language */
    public static $language = 'it';
    
    /** Public dictionary array */
    public static $pos_dictionary = [];

    /** Pos tags of token that cannot be present into a dictionary */
    public static $tag_excluded = ['CODE', 'PON', 'SENT', 'HSTAG', 'AMOUNT', 'DATE', 'EML', 'FILE', 'IPADR', 'NUM', 'SMI', 'TIME', 'URL'];

    
    /**
     * Given a string sentence, return a dictionary array with unique terms.
     * @param string $sentence
     * @return array self::$pos_dictionary
     */
    public static function generateDictionary($sentence)
    {
        self::$pos_dictionary = [];

	/**
	 * Some chars like ", ? . -" can be found inside ngrams so we need to read them
	 * from the dictionaries. Add them to token list.
	 */
        $tokens = [',', '?', '.', '"', '-', '(', ')', '[', ']', '{', '}', '/', '|', '!'];

        
	NaiPosArr::$language = self::$language;
	
        $pos_arr = [];
	
        // first instance of pos_arr
        $pos_arr = NaiPosArr::sentenceToPosArray($sentence);

 
	// remove unwanted tags and add forms to list
        foreach ($pos_arr as $pos_part)
        {
            if (!preg_match('/^(' . implode('|', self::$tag_excluded) . ')/i', $pos_part[0]['features']))
                array_push($tokens, trim($pos_part[0]['form']));
        }

        // remove duplicates
        $tokens = array_unique($tokens);

        // alphabetic sort
        sort($tokens);


        // pass tokens to an empty pos array
        $pos_arr = NaiPosArr::sentenceToPosArray(implode(' ', $tokens));


        // fill dictionary with contents from  dictionaries
        self::$pos_dictionary = self::posDictionary($pos_arr);

//        diex(self::$pos_dictionary);

	$tokens = null;
	
        return self::$pos_dictionary;
    }

    
    /**
     * Return the number of (unique) tokens inside the dictionary.
     * @return int $tokens_number
     */
    public static function getTokensNumber()
    {
	return count(self::$pos_dictionary);
    }


    /**
     * Return the pos_arr populated from the dictionary of unique terms.
     * Here is the call to identifyToken
     * 
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    private static function posDictionary($pos_arr)
    {
	NaiPosArr::$language = self::$language;
        
        $tokens = [];

        foreach ($pos_arr as $pos_part)
        {
            if ($pos_part[0]['sh-feat'] == '' || (instr($pos_part[0]['form'], ' ') == 0 && $pos_part[0]['sh-feat'] == 'ABL'))
                $tokens[] = $pos_part[0]['form'];
        }

        // just to be sure
        $tokens = array_unique($tokens);

        // alphabetic sort
        sort($tokens);

        // generate and populate from memories DB each pos part
        foreach ($tokens as $token)
        {
	    // ignore already tagged tokens
	    if (isset(NaiSentence::$preserved_kart[$token]))
		continue;

	    // assign base model to every pos part
            $pos_part[0] = NaiPosArr::bulkPosPart($token);

	    // search in DB
            $termset = NaiPosArr::identifyToken($pos_part);
	    

            // first loop and apply to pos arr the db results
            foreach ($pos_arr as $index => $pos_part)
            {
                if (!isset($pos_part[0]))
                    continue;
		
		if(isset(NaiSentence::$preserved_kart[$token]) || $pos_part[0]['form'] == NaiSentence::$sentences_separator || $token == NaiSentence::$sentences_separator)
		    continue;
                    
                if ($pos_part[0]['form'] == $token)
                    $pos_arr[$index] = $termset;

            }
	    

	    /**
	     * If inside the lemma is found a '_' will be created a new pos part
	     * for each token indicated. The number of token must be the same in
	     * the features !
	     */
	    $new_pos_arr = [];
	    foreach ($pos_arr as $index => $pos_part)
            {
		if(isset($pos_part[0]['lemma']) && instr($pos_part[0]['lemma'], '_') > 0)
		{
		    $splitted_lemma = self::splitTerm($pos_part[0]);
		    
		    if(! $splitted_lemma)
		    {
			$new_pos_arr[] = $pos_part;
			continue;
		    }
			
		    foreach ($splitted_lemma as $split_part)
			$new_pos_arr[] = $split_part;
		    
		} else
		{
		    $new_pos_arr[] = $pos_part;
		}
	    }

        }

	if(isset($new_pos_arr))
	    $pos_arr = $new_pos_arr;

	$termset = null; $tokens = null; $new_pos_arr = null; $splitted_lemma = null;
	$pos_part = null; 
	
        return $pos_arr;
    }

    
    /**
     * Given a pos_part with '_' inside the lemma, returns a pos_part for each token.
     * @param array $pos_part
     * @param array $pos_part (updated)
     */
    private static function splitTerm($pos_part)
    {
	NaiPosArr::$language = self::$language;
	
	// tokens in lemma are separated by '_'
	$lemma_parts = explode('_', $pos_part['lemma']);
	
	// features by ' '
	$feature_parts = explode(' ', $pos_part['features']);
	
	// here can be an error or a POS like CODE with "_" inside
	if(count($lemma_parts) != count($feature_parts))
	    return false;
	
	$pos_part = [];

	
	foreach ($lemma_parts as $index => $lemma)
	{
	    $pos_part[$index] = NaiPosArr::bulkPosPart($lemma);
	    $pos_part[$index]['lemma'] = $lemma;
	    $pos_part[$index]['features'] = $feature_parts[$index];
	    $pos_part[$index]['sh-feat'] = NaiPosArr::featToShortFeat($feature_parts[$index]);
	}

	$lemma_parts = null; $feature_parts = null; 

	return $pos_part;
    }
    
}
