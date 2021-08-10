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
use NaiPosTagger\PosTagging\PosPersonAndSex;
use NaiPosTagger\PosTagging\PosTools;

/**
 * Layer di ottimizzazione participi presenti e passati.
 * 
 */
class PosParticiples
{

    public static $dbgme = false;   // true false


    /**
     * NOTE: 09/2019 nei db ho eliminato gli ADJ lasciando i part-pres.
     * Se c'è anche il noun questo doppione se lo smazza poi il noun-adj
     *
     * Poi, prima uso il lemma del VER per ottenere sinonimi etc. e
     * poi per le keys userò il form.
     *
     * Il participio presente viene utilizzato soprattutto come attributo di un nome 
     * perciò come ADJ.
     * Sono tutti termini che finiscono con "ante" "ente" etc. es. abbondante"
     * Nella sua funzione di aggettivo, può anche essere sostantivato e quindi usato come nome.
     * 
     * @param array $pos_part
     * @return array $new_pos_part con ADJ, NOUN e VER al maschile singolare
     */
    public static function transformPartPresent($pos_part)
    {
	// if only one feature, return
	if(count($pos_part) == 1)
	    return $pos_part;
	
	$feats_set = implode(', ', array_column($pos_part, 'features'));
	
	// if not present a part pres, return
	if (instr($feats_set, 'VER:part+pres') == 0)
	    return $pos_part;
// 	echox($pos_part);
	
	// first, convert past-pres to adj, most frequent
	$new_pos_part[0] = NaiPosArr::bulkPosPart($pos_part[0]['form']);
	$new_pos_part[0]['lemma'] = $pos_part[0]['form'];
	$new_pos_part[0]['features'] = 'ADJ:pos+m+s';
	$new_pos_part[0]['sh-feat'] = NaiPosArr::featToShortFeat($new_pos_part[0]['features']);
	$new_pos_part[0]['pos_score'] = 0.5;
	
	// then clone to NOUN, little bit less frequent
	$new_pos_part[1] = NaiPosArr::bulkPosPart($pos_part[0]['form']);
	$new_pos_part[1]['lemma'] = $pos_part[0]['form'];
	$new_pos_part[1]['features'] = 'NOUN-m:s';
	$new_pos_part[1]['sh-feat'] = NaiPosArr::featToShortFeat($new_pos_part[1]['features']);
	$new_pos_part[1]['pos_score'] = 0.1;
	
	return $new_pos_part;
    }
    

    /**
     * Crea solamente le varianti di tag richieste: ADJ e VER al maschile singolare, 
     * e lascia inalterati eventuali noun con form uguale. Non assegno score.
     * 
     * Il participio passato viene largamente usato sia con la funzione di aggettivo 
     * che con quella di verbo.
     * Ma più come verbo dopo avere e essere chiaramente nelle combo AUX VER.
     * https://library.weschool.com/lezione/participio-passato-presente-italiano-frasi-11017.html
     * 
     * Con alcuni termini es. "contenuto", c'è anche il sostantivo.
     */
    public static function transformPartPast($pos_part)
    {
	$feats_set = implode(', ', array_column($pos_part, 'features'));

	/**
	 * Possible situations: 
	 * 1 the token is not a part past, ignore
	 * 2 the token have part past but doesn't have the flex form adj
	 * 3 the token have part past + flex form adj + possible other functions
	 */

	// 1:
	if(instr($feats_set, 'VER:part+past') == 0)
	{
//	    if (self::$dbgme)
//		echox('- case #1 token <b>'.$pos_part[0]['form'].'</b> NON è ver past ');
	    
	    return $pos_part;
	}
	
	
	// 2:
	if (instr($feats_set, 'VER:part+past') > 0 && instr($feats_set, 'ADJ:') == 0)
	{
	    if (self::$dbgme)
		echox('- case #2 token <b>'.$pos_part[0]['form'].'</b> è ver past senza adj');
	    
	    // cerco la feat giusta
	    foreach ($pos_part as $n => $result)
	    {
		if (instr($result['features'], 'VER:part+past') > 0)
		{
		    $new_adj = NaiPosArr::bulkPosPart($result['form']);
		    
		    // il lemma è quello del ver, uso il form e provo così
		    $new_adj['lemma'] = $pos_part[$n]['lemma'];
		    
		    // da VER diventa ADJ
		    $new_adj['features'] = str_replace('VER:part+past', 'ADJ:pos', $pos_part[$n]['features']);

		    $new_adj['sh-feat'] = NaiPosArr::featToShortFeat($new_adj['features']);

		    // sistemo anche le frequency. Le " sono importanti per non fare casini negli ngs!
                    if($pos_part[$n]['metadata'] != '')
                        $new_adj['metadata'] = str_replace('"VER"', '"ADJ"', $pos_part[$n]['metadata']);
		    
		    array_push($pos_part, $new_adj);
	
		        
		    /**
		     * Seguo la teoria che VER e ADJ rappresentano lo stesso concetto.
		     * Tengo solo l' ADJ. Ai fini delle keywords a me basta che ci sia qualcosa
		     * di concreto, senza incasinarsi nel pos tagging. 
		     * E anche i sinonimi ci staranno bene.
		     * @param type $results
		     */
		    unset($pos_part[$n]);
		    $pos_part = array_values($pos_part);
		    
		    // da ADJ diventa PPAST
		    $pos_part[$n]['features'] = str_replace('ADJ:pos', 'PPAST:part+past', $pos_part[$n]['features']);
		    $pos_part[$n]['sh-feat'] = 'PPAST';

		    break;
		}
	    }
	}
	
	
	// 3:	ADJ FORME FLESSE ELIMINATE DAI DB IL 08/08/2019, QUESTO CODICE NON SERVE PIù!

//	 echox($pos_part);
	
	return $pos_part;
    }
    

    /**
     * Secondo passaggio di fixing. Considerazioni:
     * più frequente come VER/ADJ. 
     * Il casino è quando il termine ha anche funzione di NOUN es. 
     * "in elenco contratti" "contratti" è un NOUN. 
     * @param array $pos_arr
     * @return array $pos_arr (updated)
     */
    public static function fixPartPast($pos_arr)
    {
        foreach ($pos_arr as $n => $pos_part)
	{
            // inizio a distinguere i NOUN se davanti hanno un ART o DET/NUM
	    if ($pos_part[0]['sh-feat'] == 'PPAST' && preg_match('/(ART|DET|NUM)/i', $pos_arr[$n - 1][0]['sh-feat']))
	    {
		if (self::$dbgme)
		    echox('- fixPartPast trovato possibile NOUN su '.$pos_part[0]['form']);
	
		// ovviamente devo essere sicuro che può essere un NOUN !
		if(NaiPosArr::isInSet($pos_part, 'NOUN'))
		{
		    $pos_arr[$n][0]['features'] = PosTools::ppast2Noun($pos_arr[$n][0]['features']);
		    $pos_arr[$n][0]['sh-feat'] = 'NOUN';
		} else
		{
//		    echox('- 2 trovato possibile NOUN su '.$pos_part[0]['form']);
		    $pos_arr[$n][0]['features'] = str_replace('PPAST', 'VER', $pos_arr[$n][0]['features']);
		    $pos_arr[$n][0]['sh-feat'] = 'VER';
		}
		
	    } else if ($pos_part[0]['sh-feat'] == 'PPAST' && 
                    ((PosPersonAndSex::isPlural($pos_part[0]['features']) && 
                    PosPersonAndSex::isSingular($pos_arr[$n - 1][0]['features'])) || (PosPersonAndSex::isSingular($pos_part[0]['features']) && 
                    PosPersonAndSex::isPlural($pos_arr[$n - 1][0]['features']))))
            {
                // se prima c'è un singolare, non può esserci un plurale

                $part_feats = implode(' ', array_column($pos_part, 'sh-feat'));
                
                if (self::$dbgme)
                    echox('- 2 trovato possibile NOUN su '.$pos_part[0]['form']);
                
                // diventa noun SOLO se ha il tag disponibile!
                if(instr($part_feats, 'NOUN') > 0)
                {
		    $pos_arr[$n][0]['features'] = PosTools::ppast2Noun($pos_arr[$n][0]['features']);
                    $pos_arr[$n][0]['sh-feat'] = 'NOUN';
                }
            }

	}

//	diex($pos_arr);
        return $pos_arr;
    }

}
