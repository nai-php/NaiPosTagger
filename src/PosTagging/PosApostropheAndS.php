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
use NaiPosTagger\Models\NaiTermsMetadata;

/**
 * Pos tagging for token chunk that have NOUNS followed by apostrophe and "s", for 
 * english genitives and "be" verb abbreviations.
 */
class PosApostropheAndS
{
    /** Class debugger flag true false */
    public static $dbgme = false;
    
    
    /**
     * 1: possessive genitives are applied to NOUN or NPR that refer to
     * persons, places or animals. Also to PRO-INDEF-M-S
     * This class should convert e.g. "John's car" to "the car of John"
     * So here are fundamentally metadatas that identify the 3 categories cited above.
     * 
     * 2: abbreviations of verb "to be" e.g. "Susie's been nice"
     * 
     * @param array $pos_arr
     * @return array $pos_arr updated
     */
    public static function detect($pos_arr)
    {
//	diex($pos_arr);
	// if the sentence does not contains " ' " return immediately
	if(!NaiPosArr::searchInPosArr($pos_arr, "'"))
	{
	    return $pos_arr;
	}

	$NaiTermsMetadata = new NaiTermsMetadata();
	
	if(self::$dbgme)
	    echox('- start detecting');
	
	foreach ($pos_arr as $index => $pos_part)
	{
	    foreach ($pos_part as $feature)
	    {
		
		// check the first part for genitives
		if (($feature['sh-feat'] == 'NPR' || ($feature['sh-feat'] == 'NOUN' && ($NaiTermsMetadata->contains($feature['metadata'], 'ref', 'pers') || $NaiTermsMetadata->contains($feature['metadata'], 'ref', 'anim') || $NaiTermsMetadata->contains($feature['metadata'], 'ref', 'plc')))))
		{
		    
		    // check the next 3 parts
		    if(isset($pos_arr[$index + 1]) && isset($pos_arr[$index + 2]))
		    {
			// part 2 must be ' and part 3 must be s
			if($pos_arr[$index + 1][0]['form'] == "'" && $pos_arr[$index + 2][0]['form'] == "s")
			{
			    if(self::$dbgme)
				echox('- found possible genitive');
			    
			    // for genitive part 4 must be have a NOUN
			    foreach ($pos_arr[$index + 3] as $feature4)
			    {
				if($feature4['sh-feat'] == 'NOUN')
				{
				    $pos_arr = self::transformGenitive($pos_arr, $index);
				}
			    }
			}

		    }
		}
		
		// check for verb
		if ($feature['sh-feat'] == 'NPR' || $feature['features'] == 'PRO-INDEF-M-S' || $feature['sh-feat'] == 'ADV' || $feature['sh-feat'] == 'NOUN')
		{
		    
		    // check the next 3 parts
		    if(isset($pos_arr[$index + 1]) && isset($pos_arr[$index + 2]))
		    {
			// part 2 must be ' and part 3 must be s
			if($pos_arr[$index + 1][0]['form'] == "'" && $pos_arr[$index + 2][0]['form'] == "s")
			{
			    if(self::$dbgme)
				echox('- found possible abbreviation');
			    
			    foreach ($pos_arr[$index + 3] as $feature4)
			    {
				if(self::$dbgme)
					echox('- look feature4 '.$feature4['sh-feat']);
				
				// for abbreviations of verb to be part 4 must be ADJ, ADV, NUM or PRE
				if(preg_match('/(ADJ|ADV|NUM|PRE|VER|PPAST)/i', $feature4['sh-feat']))
				{
				    if(self::$dbgme)
					echox('- is abbreviation');
				    
				    $pos_arr = self::transformBe($pos_arr, $index);
				}
			    }
			}
		    }
		}
	    }
	}

	return $pos_arr;
    }

    
    /**
     * Change the positions of genitive elements.
     * @param type $pos_arr
     * @param type $fromindex
     * @return type
     */
    private static function transformGenitive($pos_arr, $fromindex)
    {
	// index 1 ' became "of"
	$pos_arr[$fromindex + 1][0]['form'] = 'of';
	$pos_arr[$fromindex + 1][0]['lemma'] = 'of';
	$pos_arr[$fromindex + 1][0]['features'] = 'PRE';
	$pos_arr[$fromindex + 1][0]['sh-feat'] = 'PRE';
	$pos_arr[$fromindex + 1][0]['metadata'] = [];
	$pos_arr[$fromindex + 1][0]['label'] = '';
	$pos_arr[$fromindex + 1][0]['rule'] = '';
	$pos_arr[$fromindex + 1][0]['pos_score'] = 0;
	
	// index 3 move to part 0 and safely tag as NOUN
	$tmp_part_1 = $pos_arr[$fromindex];
	$pos_arr[$fromindex] = $pos_arr[$fromindex + 3];
	foreach ($pos_arr[$fromindex] as $key => $subpart)
	{
	    if($subpart['sh-feat'] != 'NOUN')
	    {
		unset($pos_arr[$fromindex][$key]);
	    }
	}
	$pos_arr[$fromindex] = array_values($pos_arr[$fromindex]);
	
	// index 0 move to part 3 and safely tag as NOUN or NPR
	$pos_arr[$fromindex + 3] = $tmp_part_1;
	foreach ($pos_arr[$fromindex + 3] as $key => $subpart)
	{
	    if($subpart['sh-feat'] != 'NOUN' && $subpart['sh-feat'] != 'NPR')
	    {
		unset($pos_arr[$fromindex + 3][$key]);
	    }
	}
	$pos_arr[$fromindex + 3] = array_values($pos_arr[$fromindex + 3]);
	
	// remove the s in index 2
	unset($pos_arr[$fromindex + 2]);
	
	// and reindex the array
	$pos_arr = array_values($pos_arr);
	
	return self::detect($pos_arr);

    }


    private static function transformBe($pos_arr, $fromindex)
    {
	// index 2 ' became "is"
	$pos_arr[$fromindex + 2][0]['form'] = 'is';
	$pos_arr[$fromindex + 2][0]['lemma'] = 'be';
	$pos_arr[$fromindex + 2][0]['features'] = 'VER:ind+pres+3+s';
	$pos_arr[$fromindex + 2][0]['sh-feat'] = 'VER';
	$pos_arr[$fromindex + 2][0]['metadata'] = [];
	$pos_arr[$fromindex + 2][0]['label'] = '';
	$pos_arr[$fromindex + 2][0]['rule'] = '';
	$pos_arr[$fromindex + 2][0]['pos_score'] = 0;
	
	// remove the 's' in index 1
	unset($pos_arr[$fromindex + 1]);
	
	// and reindex the array
	$pos_arr = array_values($pos_arr);
	
	return self::detect($pos_arr);
    }
}
