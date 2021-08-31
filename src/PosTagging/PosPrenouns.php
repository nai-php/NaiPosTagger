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

use NaiPosTagger\PosTagging\PosTools;

/**
 * Prenouns eg. "lo, la, le, gli, li, si, loro, cosa" followed by verbs are PRO instead ART
 * Eg. "lo porto domani" or "cosa devo comunicare"
 */
 
class PosPrenouns
{
    /** Class debugger flag true false */
    public static $dbgme = false;

    
    /**
     * @param array $pos_arr
     * @return array $pos_arr (updated)
     */
    public static function transform($pos_arr)
    {
	// search for terms flagged as possible prenouns
	foreach ($pos_arr as $n => $pos_part)
	{

	    if (preg_match('/^(loro|lo|la|le|gli|li|si|cosa)$/i', $pos_part[0]['form']) && ($pos_arr[$n + 1][0]['sh-feat'] == 'VER' || $pos_arr[$n + 1][0]['sh-feat'] == 'AUX'))
	    {
		if (self::$dbgme)
		    echox('- found possible PRO on form <b>'.$pos_part[0]['form']. '</b> followed by '.$pos_arr[$n + 1][0]['features']);

		
		// in "ciao, si confermo che arrivo" word "si" as prenoun is used only on 3+s e 3+p
		if($pos_part[0]['form'] == 'si' && instr($pos_arr[$n + 1][0]['features'], '+3+s') > 0)
		{
		    $pos_arr[$n][0]['features'] = 'PRO-PERS-3-M-S';
		    $pos_arr[$n][0]['sh-feat'] = 'PRO';
		    
		    if (self::$dbgme)
			echox('- from INT to PRO because is followed by 3+s');
		    
		} else if($pos_part[0]['form'] == 'si' && instr($pos_arr[$n + 1][0]['features'], '+3+p') > 0)
		{
		    $pos_arr[$n][0]['features'] = 'PRO-PERS-3-M-P';
		    $pos_arr[$n][0]['sh-feat'] = 'PRO';
		    
		    if (self::$dbgme)
			echox('- from INT to PRO because is followed by 3+p');
		    
		} else if($pos_part[0]['form'] == 'cosa')
		{
		    $pos_arr[$n][0]['features'] = 'PRO-PERS-3-M-S';
		    $pos_arr[$n][0]['sh-feat'] = 'PRO';
		} else if($pos_part[0]['form'] == 'loro')
		{
		    $pos_arr[$n][0]['features'] = 'PRO-PERS-3-M-S';
		    $pos_arr[$n][0]['sh-feat'] = 'PRO';		    
		} else if($pos_part[0]['form'] != 'si')
		{
		    $pos_arr[$n][0]['features'] = PosTools::art2Pro($pos_arr[$n][0]['features']);

		    $pos_arr[$n][0]['sh-feat'] = 'PRO';
		}
	    }
	    
	    if (preg_match('/^(proprio|propria|propri)$/i', $pos_part[0]['form']) && ($pos_arr[$n + 1][0]['sh-feat'] == 'NOUN'))
	    {
		if (self::$dbgme)
		    echox('- found possible PRO on form <b>'.$pos_part[0]['form']. '</b> followed by '.$pos_arr[$n + 1][0]['features']);

		$pos_arr[$n][0]['features'] = 'PRO-WH';
		$pos_arr[$n][0]['sh-feat'] = 'PRO';
	    }
	}

	return $pos_arr;

    }

}
