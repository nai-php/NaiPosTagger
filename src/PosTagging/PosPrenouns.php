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
 * Rileva e tagga i pronomi es "lo, la, le, gli, li, si, loro, cosa"
 * dando per scontato che se sono seguiti da un verbo sono PRO invece che ART
 * Es. "lo porto domani" o "cosa devo comunicare"
 
 * Rileva anche situazioni come "il proprio appartamento"
 * 
 * @todo mah, sarebbe anche qua da usare i patterns...
 */
 
class PosPrenouns
{

    public static $dbgme = false;   // true false

    
    /**
     * @param array $pos_arr
     * @return array $pos_arr (updated)
     */
    public static function transform($pos_arr)
    {
	// cerco i termini indicati come possibili pronomi
	foreach ($pos_arr as $n => $pos_part)
	{

	    if (preg_match('/^(loro|lo|la|le|gli|li|si|cosa)$/i', $pos_part[0]['form']) && ($pos_arr[$n + 1][0]['sh-feat'] == 'VER' || $pos_arr[$n + 1][0]['sh-feat'] == 'AUX'))
	    {
		if (self::$dbgme)
		    echox('- trovato possibile PRO su form <b>'.$pos_part[0]['form']. '</b> seguito da '.$pos_arr[$n + 1][0]['features']);

		
		// eccezione: "ciao, si confermo che arrivo" evidentemente il "si" pronome và solo su 3+s e 3+p
		if($pos_part[0]['form'] == 'si' && instr($pos_arr[$n + 1][0]['features'], '+3+s') > 0)
		{
		    $pos_arr[$n][0]['features'] = 'PRO-PERS-3-M-S';
		    $pos_arr[$n][0]['sh-feat'] = 'PRO';
		    
		    if (self::$dbgme)
			echox('- da INT a PRO perchè è seguito da 3+s');
		    
		} else if($pos_part[0]['form'] == 'si' && instr($pos_arr[$n + 1][0]['features'], '+3+p') > 0)
		{
		    $pos_arr[$n][0]['features'] = 'PRO-PERS-3-M-P';
		    $pos_arr[$n][0]['sh-feat'] = 'PRO';
		    
		    if (self::$dbgme)
			echox('- da INT a PRO perchè è seguito da 3+p');
		    
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
		    echox('- trovato possibile PRO su form <b>'.$pos_part[0]['form']. '</b> seguito da '.$pos_arr[$n + 1][0]['features']);

		$pos_arr[$n][0]['features'] = 'PRO-WH';
		$pos_arr[$n][0]['sh-feat'] = 'PRO';
	    }
	}

//	diex($pos_arr);
	return $pos_arr;

    }

}
