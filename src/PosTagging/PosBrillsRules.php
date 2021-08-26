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

/**
 * Pos tagging by Brills rules
 */
class PosBrillsRules
{
    /** Default language */
    public static $language = 'en';

    /** Class debugger flag */
    public static $dbgme = false;  // true false
    
    /** Flag to turn on save for statistics in db brill_rules */
    public static $update_brill_hits = true;
    
    // se applicata regola con 2 caratteri, l'affidabilità è leggermente minore dei 3
    public static $score_two_terms =  .7;
    
    // se applicata regola con 3 caratteri, l'affidabilità è leggermente superiore a 2
    public static $score_three_terms =  .8;

    // l'array di ritorno con i vari score assegnati tra tutti i passaggi
    public static $subscores = [];
    
    // se applyRules lanciato più di una volta, colleziona le string_matrix per capire se
    // tra un passaggio e l'altro ci sono termini abbastanza votati da ritenersi affidabili
    public static $matrix_log = [];

    
    /**
     * Sequenza di applicazione regole per POS tagging.
     * @param array $pos_arr
     * @param float $score_threshold il valore di score oltre il quale considerare 
     * una data variante come quella più probabile.
     * @return array $subscores
     */
    public static function applyRules($pos_arr, $score_threshold = 0, $_language = null)
    {
	self::$subscores = [];
	
	if(!is_null($_language))
	    self::$language = $_language;
	
	// rilevo la situazione tra sicuri e incerti
	$string_matrix = self::set_matrix_pos($pos_arr, $score_threshold);

	// se ho già verificato questa matrice o se tutto è 1, ignoro
	if(isset(self::$matrix_log[$string_matrix]) || instr($string_matrix, '0') == 0)
	    return self::$subscores;
	
	// altrimenti segno nel log
	self::$matrix_log[$string_matrix] = true;
	
	if (self::$dbgme)
	    echox('<br>- Brill applyRules applicazione '.count(self::$matrix_log).' lanciato su '.$string_matrix);
	
	$matches = [];
	
	// solo se nel pos ci sono le combinazioni indicate sotto di 'sicuri' e 'incerti' vado avanti
	$re = '/(1110|1011|1101|101|110|011|01|10)/';
	preg_match_all($re, $string_matrix, $matches, PREG_OFFSET_CAPTURE);
	
	if (count($matches[0]) == 0)
	    return self::$subscores;


	// Brill Rules da includere dinamicamente in base alla lingua
	$PosBrillsClass = "\\NaiPosTagger\\PosTagging\\NaiBrillsRulesTrait";
	
	
	
	// 4 TERMS CHUNKS

	// pattern 1 1 1 0
	$re = '/(?=1110)/';
	preg_match_all($re, $string_matrix, $matches, PREG_OFFSET_CAPTURE);
	
	if (count($matches[0]) > 0)
	{
	    // loop per ogni pattern trovato
	    foreach ($matches[0] as $match)
	    {
		$sure_key1 = $match[1];
		$sure_key2 = $sure_key1 + 1;
		$sure_key3 = $sure_key1 + 2;
		$target_index = $sure_key1 + 3;

		$prev_word1 = $pos_arr[$sure_key1][0];  // unica 1	(da sx a dx)
		$prev_word2 = $pos_arr[$sure_key2][0]; // unica 4
		$prev_word3 = $pos_arr[$sure_key3][0];  // unica 2	(da sx a dx)


		if (self::$dbgme)
		    echox("<br>-- 1110 found pattern " . $match[0] . " to try solving <b>" . $pos_arr[$target_index][0]['form'] . "</b> posizionato dopo sicuri <b>".$prev_word1['form']."</b> and <b>".$prev_word2['form']."</b> and <b>".$prev_word3['form']."</b>");

		// e loop tra tutte le feats della pos_part combinata con i vicini
		for ($n2 = 0; $n2 < count($pos_arr[$target_index]); $n2++)
		    $PosBrillsClass::rulesPattern1110($target_index, $prev_word1, $prev_word2, $prev_word3, $pos_arr[$target_index][$n2], self::$dbgme);

	    } //end loop match

	} //end pattern 
	
	
	// pattern 1 0 1 1
	$re = '/(?=1011)/';
	preg_match_all($re, $string_matrix, $matches, PREG_OFFSET_CAPTURE);
	
	if (count($matches[0]) > 0)
	{
	    // loop per ogni pattern trovato
	    foreach ($matches[0] as $match)
	    {
		$sure_key1 = $match[1];
		$target_index = $sure_key1 + 1;
		$sure_key2 = $sure_key1 + 2;
		$sure_key3 = $sure_key1 + 3;

		$prev_word1 = $pos_arr[$sure_key1][0];  // unica 1	(da sx a dx)
		$nextword1 = $pos_arr[$sure_key2][0]; // unica 4
		$nextword2 = $pos_arr[$sure_key3][0];  // unica 2	(da sx a dx)


		if (self::$dbgme)
		    echox("<br>-- 1011 found pattern " . $match[0] . " to try solving <b>" . $pos_arr[$target_index][0]['form'] . "</b> between <b>".$prev_word1['form']."</b> and <b>".$nextword1['form']."</b>  e <b>".$nextword2['form']."</b>");

		// e loop tra tutte le feats della pos_part combinata con i vicini
		for ($n2 = 0; $n2 < count($pos_arr[$target_index]); $n2++)
		    $PosBrillsClass::rulesPattern1011($target_index, $prev_word1, $pos_arr[$target_index][$n2], $nextword1, $nextword2, self::$dbgme);

	    } //end loop match

	} //end pattern 
	
	
	// pattern 1 1 0 1
	$re = '/(?=1101)/';
	preg_match_all($re, $string_matrix, $matches, PREG_OFFSET_CAPTURE);
	
	if (count($matches[0]) > 0)
	{
	    // loop per ogni pattern trovato
	    foreach ($matches[0] as $match)
	    {
		$sure_key1 = $match[1];
		$sure_key2 = $sure_key1 + 1;
		$target_index = $sure_key1 + 2;
		$sure_key3 = $sure_key1 + 3;

		$prev_word1 = $pos_arr[$sure_key1][0];  // unica 1	(da sx a dx)
		$prev_word2 = $pos_arr[$sure_key2][0];  // unica 2	(da sx a dx)
		$nextword1 = $pos_arr[$sure_key3][0]; // unica 4


		if (self::$dbgme)
		    echox("<br>-- 1101 found pattern " . $match[0] . " to try solving <b>" . $pos_arr[$target_index][0]['form'] . "</b> between <b>".$prev_word1['form']."</b> and <b>".$prev_word2['form']."</b>  e <b>".$nextword1['form']."</b>");

		// e loop tra tutte le feats della pos_part combinata con i vicini
		for ($n2 = 0; $n2 < count($pos_arr[$target_index]); $n2++)
		    $PosBrillsClass::rulesPattern1101($target_index, $prev_word1, $prev_word2, $pos_arr[$target_index][$n2], $nextword1, self::$dbgme);

	    } //end loop match

	} //end pattern 101

	
	// 3 TERMS CHUNKS
	
	// pattern 1 0 1
	$re = '/(?=101)/';
	preg_match_all($re, $string_matrix, $matches, PREG_OFFSET_CAPTURE);
	
	if (count($matches[0]) > 0)
	{
	    // loop per ogni pattern trovato
	    foreach ($matches[0] as $match)
	    {
		$sure_key1 = $match[1];
		$target_index = $sure_key1 + 1;
		$sure_key2 = $sure_key1 + 2;

		$prev_word1 = $pos_arr[$sure_key1][0];  // unica 1	(da sx a dx)
		$nextword1 = $pos_arr[$sure_key2][0]; // unica 2


		if (self::$dbgme)
		    echox("<br>-- 101 found pattern " . $match[0] . " to try solving <b>" . $pos_arr[$target_index][0]['form'] . "</b> between <b>".$prev_word1['form']."</b> and <b>".$nextword1['form']."</b>");

		// e loop tra tutte le feats della pos_part combinata con i vicini
		for ($n2 = 0; $n2 < count($pos_arr[$target_index]); $n2++)
		    $PosBrillsClass::rulesPattern101($target_index, $prev_word1, $pos_arr[$target_index][$n2], $nextword1, self::$dbgme);
//		    self::rulesPattern101($target_index, $prev_word1, $pos_arr[$target_index][$n2], $nextword1, self::$dbgme);

	    } //end loop match

	} //end pattern


	// pattern 1 1 0
	$re = '/(?=110)/';
	preg_match_all($re, $string_matrix, $matches, PREG_OFFSET_CAPTURE);
	
	if (count($matches[0]) > 0)
	{

	    foreach ($matches[0] as $match)
	    {
		$sure_key = $match[1];
		$target_index = $sure_key + 2;

		$prev_word2 = $pos_arr[$sure_key][0]; // unica 1	(da sx a dx)
		$prev_word1 = $pos_arr[$sure_key + 1][0]; // unica 2

		if (self::$dbgme)
		    echox("<br>- 110 found pattern " . $match[0] . " to try solving <b>" . $pos_arr[$target_index][0]['form'] . "</b> preceduto da due sicuri ".$prev_word2['form']." e ".$prev_word1['form']);

		// e loop tra tutte le feats della pos_part combinata con i vicini
		for ($n2 = 0; $n2 < count($pos_arr[$target_index]); $n2++)
		    $PosBrillsClass::rulesPattern110($target_index, $prev_word2, $prev_word1, $pos_arr[$target_index][$n2], self::$dbgme);

	    } //end loop match

	} //end pattern


	// pattern 0 1 1
	$re = '/(?=011)/';
	preg_match_all($re, $string_matrix, $matches, PREG_OFFSET_CAPTURE);
	
	if (count($matches[0]) > 0)
	{
	    foreach ($matches[0] as $match)
	    {
		$sure_key = $match[1];
		$target_index = $sure_key;

		$nextword1 = $pos_arr[$sure_key + 1][0];
		$nextword2 = $pos_arr[$sure_key + 2][0];

		if (self::$dbgme)
		    echox("<br>-- 011 found pattern " . $match[0] . " a indice " . $match[1] . " to try solving <b>" . $pos_arr[$target_index][0]['form'] . "</b> seguito da due sicuri ".$nextword1['form']." e ".$nextword2['form']);

		// e loop tra tutte le feats della pos_part combinata con i vicini
		for ($n2 = 0; $n2 < count($pos_arr[$target_index]); $n2++)
		    $PosBrillsClass::rulesPattern011($target_index, $pos_arr[$target_index][$n2], $nextword1, $nextword2, self::$dbgme);

	    } //end loop match

	} //end pattern



	// 2 TERMS CHUNKS

	// pattern 1 0
	$re = '/(?=10)/';
	preg_match_all($re, $string_matrix, $matches, PREG_OFFSET_CAPTURE);

	if (count($matches[0]) > 0)
	{
	    foreach ($matches[0] as $match)
	    {
		$sure_key = $match[1];
		$target_index = $sure_key + 1;

		$prev_word1 = $pos_arr[$sure_key][0]; // unica 1

		if (self::$dbgme)
		    echox("<br>-- 10 found pattern " . $match[0] . " to try solving <b>" . $pos_arr[$target_index][0]['form'] . "</b> preceduto da sicuro <b>".$prev_word1['form']."</b>");

		// e loop tra tutte le feats della pos_part combinata con i vicini
		for ($n2 = 0; $n2 < count($pos_arr[$target_index]); $n2++)
		    $PosBrillsClass::rulesPattern10($target_index, $prev_word1, $pos_arr[$target_index][$n2], self::$dbgme);

	    } //end loop match

	} //end match


	// pattern 0 1
	$re = '/(?=01)/';
	preg_match_all($re, $string_matrix, $matches, PREG_OFFSET_CAPTURE);

	if (count($matches[0]) > 0)
	{
	    foreach ($matches[0] as $match)
	    {
		$target_index = $match[1];
		$sure_key = $match[1] + 1;

		$nextword1 = $pos_arr[$sure_key][0]; // unica 1

		if (self::$dbgme)
		    echox("<br>-- 01 found pattern " . $match[0] . " to try solving <b>" . $pos_arr[$target_index][0]['form'] . "</b> seguito da sicuro <b>".$nextword1['form']."</b>");

		// e loop tra tutte le feats della pos_part combinata con i vicini
		for ($n2 = 0; $n2 < count($pos_arr[$target_index]); $n2++)
		    $PosBrillsClass::rulesPattern01($target_index, $pos_arr[$target_index][$n2], $nextword1, self::$dbgme);

	    } //end loop match

	} //end match


	// important reset!
	self::$matrix_log = [];
	unset($PosBrillsClass);
	
	return self::$subscores;
    }


    /**
     * Chiamata in ogni regola, permette di rilevare la riga della regola trovata.
     * Salva anche le statistiche di utilizzo delle regole!
     */
    public static function returnRule($index, $rule_id, $tag, $score = null)
    {
	if (self::$dbgme)
	    echox("<span style=\"color:red\">------ applicata regola ID $rule_id per tag $tag </span>");
	
        if(is_null($score))
            $score = self::$score_three_terms;
        
	self::setSubScore($index, $tag, $score);

	if(self::$update_brill_hits)
	    self::updateBrillsStats($rule_id);
	
	return $tag;
    }


    /**
     * Dato un pos_arr genera una matrice di 0 e 1 che indicano se un termine ha più di una
     * feature.
     * 0 = più varianti
     * 1 = solo una variante
     * @param array $pos_arr
     * @param int $score_threshold
     * @return string $string_matrix  es. 01101101
     */
    private static function set_matrix_pos($pos_arr, $score_threshold = 0)
    {
       $feats_matrix = [];

       // punteggi con valore >= x sono da considerare risolti con certezza.
       $is_shure_threshold = 25;	// a lungo tenuto a 50, poi 123/06/2019 portato a 25

       // loop nell'intero pos_arr
       foreach ($pos_arr as $n => $pos_part)
       {
	   // diverse condizioni

	   if (count($pos_part) == 1 && $pos_part[0]['sh-feat'] != 'UNK')
	   {
	       // tag già identificati con unica variante, valore 1
	       $feats_matrix[$n] = 1;
	   } else if (count($pos_part) == 1 && $pos_part[0]['sh-feat'] == 'UNK')
	   {
	       // termini sconosciuti, li lascio come problematici con valore 0
	       $feats_matrix[$n] = 0;
	   } else
	   {
	       // tutti gli altri già identificati ma con multiple varianti

	       // come da regola, segno come non risolto
	       $feats_matrix[$n] = 0;

	       // ma se tra gli score delle prime due varianti (che ci sono sempre) c'è
	       // una diff > di $score_threshold allora segno come risolto
	       if($score_threshold > 0 && ($pos_part[0]['pos_score'] >= $score_threshold || ($pos_part[0]['pos_score'] - $pos_part[1]['pos_score']) >= $is_shure_threshold))
		   $feats_matrix[$n] = 1;

	   }
       }

       $string_matrix = implode('', $feats_matrix);

       return $string_matrix;

    }


    /**
     * Assegna il punteggio al singolo tag indicato da ogni regola
     * 
     * @param int $index
     * @param string $tag
     * @param float $points
     * @modify self::$subscores
     */
    private static function setSubScore($index, $tag, $points)
    {
	if (self::$dbgme)
	    echox('- setSubScore: $index '.$index.' $tag <b>'.$tag.'</b> $points '.$points);
	
	if(isset(self::$subscores[$index][$tag]))
	{
	    self::$subscores[$index][$tag]['score'] += $points;
	} else
	{
	    self::$subscores[$index][$tag]['index'] = $index;
	    self::$subscores[$index][$tag]['tag'] = $tag;
	    self::$subscores[$index][$tag]['score'] = $points;
	}

    }

 
    /**
     * Looking scores collected from the rules, applica al pos_arr i punteggi di questo step.
     * @param array $pos_arr
     * @param array $brill_subscores where the index is the same of the term to score, and
     * inside two or more possible pos tags with the scores.
     * @return array $pos_arr (updated)
     */
    public static function applyScore($pos_arr, $brill_subscores)
    {
	// loop through one or more terms to fix
	foreach ($brill_subscores as $index => $subscores)
	{
	    // sort by scores
	    usort($subscores, 'self::sortByScore');
	    
	    // loop through one or more pos tags, with the scores
	    foreach ($subscores as $subscore)
	    {
		$tag = $subscore['tag'];
		// loop through pos feats of token indicated by the index
		foreach ($pos_arr[$index] as $n2 => $feat)
		{
		    // choosing the feature to score by looking for a full or a short pos tag
		    if($feat['sh-feat'] == $tag || $feat['features'] == $tag)
			$pos_arr[$index][$n2]['pos_score'] += $subscore['score'];
		    
		    /** 
		     * With UNK terms there's only one element. Tag it with highest score
		     */
		    if($feat['sh-feat'] == 'UNK')
		    { 
			// for NOUN we need to give a default person and number
			if($subscore['tag'] == 'NOUN')
			    $subscore['tag'] = 'NOUN-m:s';

			if($subscore['tag'] == 'VER')
			    $subscore['tag'] = 'VER:inf+pres';			
			
			$pos_arr[$index][$n2]['features'] = $subscore['tag'];
			$pos_arr[$index][$n2]['sh-feat'] = NaiPosArr::featToShortFeat($subscore['tag']);
			$pos_arr[$index][$n2]['pos_score'] += $subscore['score'];
		    }
		}
	    }
	}

	return $pos_arr;
    }

    
    /**
     * Sort by score
     */
    private static function sortByScore($a,$b) { return ($a["score"] >= $b["score"]) ? -1 : 1; }


    /** 
     * If $update_brill_hits = true, we can save in a db each rule applied, for statistical purposes.
     * UPDATE brillrules SET hits = 0; // for reset
     */
    public static function updateBrillsStats($rule_id)
    {
	$sql = "SELECT id FROM brillrules WHERE id = $rule_id";
	
	$db = new \PDO('sqlite:' . INTERNALS_DB_PATH.'stats/brill_rules_'. self::$language.'.db');
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

	if(count($results) == 0)
	{
	    // if rule still not in db, add
	    $sql = "INSERT INTO brillrules (id,hits,data_start) VALUES(";
	    $sql .= $rule_id;
	    $sql .= ", 1";
	    $sql .= ", ".date('Ymd');
	    $sql .= ");";
	} else
	{
	    // if already present, increment
	    $sql = "UPDATE brillrules  SET hits = hits +1 WHERE id = $rule_id";
	}

	$db->exec($sql);

	$db = null;
    }

}