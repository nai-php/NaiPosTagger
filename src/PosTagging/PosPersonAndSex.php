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
 * Elimina varianti non corrette confrontando sesso e tempi di verbi e noun dei termini
 * prima e dopo di un dato termine.
 * Per es. con "domani sono previsti sei seminari" il sei dovrebbe essere numero.
 * E' evidente che il verbo "sei" si riferisce al singolare (tu) mentre il 
 * numero si riferisce a qualcosa di plurale.
 *
 * E' importante l'ordine! Prima quello prev, poi quello next!
 *
 * @todo sinceramente, penso che con le regole Brill da 312 a 319 faccio la stessa
 * cosa, ma sicuramente meglio.
 * Dovrei provare a sospendere questo e ripassare le 'finali' e vedere che
 * succede...
 *
 */
class PosPersonAndSex
{

    public static $dbgme = false;   // true false
    public static $score_prev = - .6;   // il termine prima forse è più sicuro
    public static $safe_score_prev = - 15;   // le regole CERTISSIME
    public static $score_next = - .7;   // quello dopo assegno un goccio di meno
    // segna le coppie this-prev e this-next per evitare di farle mille volte
    private static $done_index = [];
    
    // in italian language after the ART "lo" cannot have nouns that begins with those initial
    // @todo vedere se si sono altri casi...
    private static $impossible_nouns_before_lo = '(b|c|d|f|g|l|m|n|p|q|r|t|v)';


    /**
     * Da chiamare sempre prima dei passaggi!
     */
    public static function resetDoneIndex()
    {
	self::$done_index = [];
    }


    /**
     * @param array $pos_arr
     * @return array $pos_arr (updated)
     */
    public static function exclude($pos_arr)
    {
	// GUARDANDO 1 TERMINE PRIMA
	$pos_arr = self::checkPrevToken($pos_arr, 1);

	// GUARDANDO 1 TERMINE DOPO
	$pos_arr = self::checkNextToken($pos_arr, 1);

	return $pos_arr;
    }


    /**
     * Chiamata dal metodo sopra, esegue i controlli tra il termine incerto 
     * e il precedente, e imposta lo score
     * @param array $pos_arr
     * @param int $until
     * @return array $pos_arr;
     */
    private static function checkPrevToken($pos_arr, $until = 1)
    {
	foreach ($pos_arr as $n => $pos_part)
	{

	    if (count($pos_part) > 1 && isset($pos_arr[$n - $until]))
	    {
		// per forza ci vuole un loop che incroci ogni pos_part con quelle della precedente
		foreach ($pos_part as $feats)
		{
		    $_form = $feats['form'];
		    $_feat = strtolower($feats['features']);

		    // leggo le feats del termine precedente
		    // @todo dovrei poter essere in grado di saltare eventuali CON
		    $_prev_feats = self::checkNearbyFeats($pos_arr[$n - $until][0], 'prev');

		    // se combo già verificato, lo salto
		    if (in_array($_form . $_feat . $_prev_feats, self::$done_index))
			break;

		    if (self::$dbgme)
			echox('- PREV confronto "' . $_form . '"/' . $_feat . ' col precedente ' . $_prev_feats);


		    // aggiungo all'indice delle verifiche già fatte
		    array_push(self::$done_index, $_form . $_feat . $_prev_feats);


		    // PREV 1.1 confronto sing. e plur.
		    if (instr($_feat, 'art') == 0 && instr($_feat, 'num') == 0 && self::isSingular($_feat) && self::isPlural($_prev_feats))
		    {
			if (self::$dbgme)
			    echox('- PREV 1.1 penalizzo "' . $_form . '" come ' . $_feat . ' a fronte del precedente termine con 1 feat ' . right($_prev_feats, 2));

			// setto lo score di questo passaggio
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-1', $pos_arr[$n], $feats['features'], self::$score_prev);

			$pos_arr = self::exclude($pos_arr);
		    }


		    // PREV 1.2 confronto plur e sing.
		    // @note 19/09/2019 mi veniva voglia di sospenderlo perchè mi sembra abbastanza 
		    // una stupidaggine... troppo generico, per es. con 
		    // "produce interessi" mi esclude "interessi", che è in realtà quello corretto...
		    // provo ad escluderlo se prima c'è un verbo qualsiasi... vediamo
		    if (instr($_prev_feats, 'ver') == 0 && instr($_feat, 'art') == 0 && instr($_feat, 'num') == 0 && self::isPlural($_feat) && self::isSingular($_prev_feats))
		    {
			if (self::$dbgme)
			    echox('- PREV 1.2 penalizzo "' . $_form . '" come ' . $_feat . ' a fronte del precedente termine con 1 feat ' . right($_prev_feats, 2));


			// setto lo score negativo di questa feat
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-2', $pos_arr[$n], $feats['features'], self::$score_next);
			$pos_arr = self::exclude($pos_arr);
		    }


		    // PREV 1.3 confronto persone tra due verbi 
		    // es. "vorrei 1+s conferma 3+s ", non sono possibili
		    if (instr($_prev_feats, '1') > 0 && (instr($_feat, '2') > 0 || instr($_feat, '3') > 0))
		    {
			if (self::$dbgme)
			    echox('- PREV 1.3 penalizzo "' . $_form . '" come ' . $_feat . ' a fronte del precedente termine con 1 feat ' . right($_prev_feats, 2));

			// setto lo score negativo di questa feat
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-3', $pos_arr[$n], $feats['features'], self::$score_prev);
			$pos_arr = self::exclude($pos_arr);
		    }


		    // PREV 1.4 confronto persone tra due verbi  13/06/2019
		    // es. "ha ind+pres+3+s ancora ind+pres+3+s ", non sono possibili
		    // però è possibile "ha vista", che differenza c'è????
		    if (instr($_prev_feats, 'ind+pres+3+s') > 0 && instr($_feat, 'ind+pres+3+s') > 0)
		    {
			if (self::$dbgme)
			    echox('- PREV 1.4 penalizzo "' . $_form . '" come ' . $_feat . ' a fronte del precedente termine con 1 feat ' . $_prev_feats);

			// setto lo score negativo di questa feat
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-4', $pos_arr[$n], $feats['features'], self::$safe_score_prev);
			$pos_arr = self::exclude($pos_arr);
		    }
		    
		    		    		    
		    // più specifico quando ho due verbi con tempo diversi es. "andava ancora" dove "ancora" non può essere VER
		    if (instr($_prev_feats, 'ind+impf+3+s') > 0 && instr($_feat, 'ind+pres+3+s') > 0)
		    {
			if (self::$dbgme)
			    echox('- NEXT 5 penalizzo "' . $_form . '" come ' . $_feat . ' a fronte del precedente termine con 1 feat ' . $_prev_feats);

			// setto lo score negativo di questa feat
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-5', $pos_arr[$n], $feats['features'], self::$safe_score_prev);
			$pos_arr = self::exclude($pos_arr);
		    }

		    /**
		     * "la blocco" o "le ritrovo" è ovvio che non sono NOUN ma sicuramente VER.
		     * E anche "lo controllo" non può essere noun!
		     */
		    if (
			(($pos_arr[$n - 1][0]['form'] == 'la' || $pos_arr[$n - 1][0]['form'] == 'le') && $_feat == 'noun-m:s')
			|| ($pos_arr[$n - 1][0]['form'] == 'lo' && ($_feat == 'noun-m:s' && preg_match('/'.self::$impossible_nouns_before_lo.'/i', left($_form, 1))))
		    )
		    {
			if (self::$dbgme)
			    echox('- PREV 1.5 penalizzo "' . $_form . '" come NOUN a favore del VER');
			// setto lo score negativo del noun
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-6', $pos_arr[$n], $feats['features'], self::$safe_score_prev);

			$pos_arr = self::exclude($pos_arr);
		    }

		    $pos_arr = self::exclude($pos_arr);

		}   // end loop feats
	    }
	}   // end loop pos_arr

	return $pos_arr;

    }


    /**
     * Chiamata dal metodo sopra, esegue i controlli tra il termine incerto 
     * e il successivo, e imposta lo score
     * @param array $pos_arr
     * @param int $until  1 o 2
     * @return array $pos_arr;
     */
    private static function checkNextToken($pos_arr, $until = 1)
    {
	foreach ($pos_arr as $n => $pos_part)
	{
	    if (count($pos_part) > 1 && isset($pos_arr[$n + $until]))
	    {
		// per forza ci vuole un loop che incroci ogni pos_part con quelle della successiva
		foreach ($pos_part as $feats)
		{
		    $_form = $feats['form'];
		    $_feat = strtolower($feats['features']);

		    // leggo le feats del termine successivo
		    // TODO: dovrei poter essere in grado di saltare eventuali CON
		    $_next_feats = self::checkNearbyFeats($pos_arr[$n + $until][0]);

		    // se combo già verificato, lo salto
		    if (in_array($_form . $_feat . $_next_feats, self::$done_index))
			break;

		    // aggiungo all'indice delle verifiche già fatte
		    array_push(self::$done_index, $_form . $_feat . $_next_feats);


		    // if (self::$dbgme)
		    // echox('- NEXT confronto "' . $_form . '" come ' . $_feat.' ('.self::isSingular($_feat).') con il successivo '.self::isPlural($_next_feats));
		    // 03/18 sperimentale: se una feat è un numero e dopo c'è un singolare, non può essere plurale
		    if (instr($_feat, 'num') > 0 && self::isSingular($_next_feats))
		    {
			if (self::$dbgme)
			    echox('- NEXT 1 penalizzo "' . $_form . '" come ' . $_feat . ' a fronte del successivo termine con 1 feat ' . right($_next_feats, 2));

			// setto lo score negativo di questa feat
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-next-1', $pos_arr[$n], $feats['features'], self::$score_next);
			$pos_arr = self::exclude($pos_arr);
		    }

		    // e viceversa, se ho "uno una un" la parola dopo deve essere singolare
		    if (($_form == 'uno' || $_form == 'una' || $_form == 'un') && self::isPlural($_next_feats))
		    {
			if (self::$dbgme)
			    echox('- NEXT 2 penalizzo "' . $_form . '" come ' . $_feat . ' a fronte del successivo termine con 1 feat ' . right($_next_feats, 2));

			// setto lo score negativo di questa feat
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-next-2', $pos_arr[$n], $feats['features'], self::$score_next);
			$pos_arr = self::exclude($pos_arr);
		    }


		    // confronto sing e plur @todo se ci sono altri tag next da non considerare...

		    if (instr($_next_feats, 'art') == 0 && instr($_next_feats, 'pro') == 0 && instr($_feat, 'num') == 0 && self::isSingular($_feat) && self::isPlural($_next_feats))
		    {
			if (self::$dbgme)
			    echox('- NEXT 3 penalizzo "' . $_form . '" come ' . $_feat . ' a fronte del successivo termine con 1 feat ' . right($_next_feats, 2));

			// setto lo score negativo di questa feat
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-next-3', $pos_arr[$n], $feats['features'], self::$score_next);
			$pos_arr = self::exclude($pos_arr);
		    }


		    // confronto plur e sing. con qualche filtro per evitare casini...
		    if (instr($_next_feats, 'art') == 0 && instr($_next_feats, 'adj') == 0 && instr($_next_feats, 'num') == 0 && instr($_feat, 'num') == 0 && self::isPlural($_feat) && self::isSingular($_next_feats))
		    {
			if (self::$dbgme)
			    echox('- NEXT 4 penalizzo "' . $_form . '" come ' . $_feat . ' a fronte del successivo termine con 1 feat ' . right($_next_feats, 2));

			// setto lo score negativo di questa feat
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-next-4', $pos_arr[$n], $feats['features'], self::$score_next);
			$pos_arr = self::exclude($pos_arr);
		    }
		    
		} // end loop pos_arr
	    }
	}


	return $pos_arr;

    }


    /**
     * Ritorna la feat di un dato pos_part successivo o precedente
     * @todo vedo che next e prev sono uguali... verificare
     * @todo dovrebbe forse ignorare determinati tag? uhm forse non serve...
     * @param array $pos_part
     * @param string $direction prev o next
     * @return string $the_feat;
     */
    private static function checkNearbyFeats($pos_part, $direction = 'next')
    {
	$the_feat = '';

	if ($direction == 'next')
	{
	    $the_feat = strtolower($pos_part['features']);
	} else
	{
	    $the_feat = strtolower($pos_part['features']);
	}

	return $the_feat;

    }


    /**
     * boolean se un tag ha indicazioni di singolare
     */
    public static function isSingular($_feat)
    {
	if (right($_feat, 2) == '+s' || right($_feat, 2) == ':s' || right($_feat, 2) == '-s' || right($_feat, 2) == '-S')
	    return true;

	return false;

    }

    /**
     * boolean se un tag ha indicazioni di plurale
     */
    public static function isPlural($_feat)
    {
	if (right($_feat, 2) == '+p' || right($_feat, 2) == ':p' || right($_feat, 2) == '-p' || right($_feat, 2) == '-P')
	    return true;

	return false;

    }


}
