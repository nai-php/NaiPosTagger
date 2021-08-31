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
 * Exclude features comparing person and time of verbs and nouns of terms
 * previous and next of a given dubious term.
 *
 */
class PosPersonAndSex
{
    
    /** Class debugger flag true false */
    public static $dbgme = false;
    
    /** Negative score to assign a improbable previous token */
    public static $score_prev = - .6;
    
    /** Negative score to assign a really improbable previous token */
    public static $safe_score_prev = - 15;
    
    /** Negative score to assign a improbable next token */
    public static $score_next = - .7;   // quello dopo assegno un goccio di meno
    
    /** Save combinations this-prev and this-next to reduce loops */
    private static $done_index = [];
    
    /** in italian language after the ART "lo" cannot have nouns that begins with those initial
     * @todo other cases?
     */
    private static $impossible_nouns_before_lo = '(b|c|d|f|g|l|m|n|p|q|r|t|v)';


    /**
     * Reset the index of considered terms
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
	$pos_arr = self::checkPrevToken($pos_arr, 1);

	$pos_arr = self::checkNextToken($pos_arr, 1);

	return $pos_arr;
    }


    /**
     * Apply rules between dubious terms and the previous one or two terms
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
		// loop between each pos part with the next pos part
		foreach ($pos_part as $feats)
		{
		    $_form = $feats['form'];
		    $_feat = strtolower($feats['features']);

		    // get feature of previous term
		    $_prev_feats = self::checkNearbyFeats($pos_arr[$n - $until][0], 'prev');

		    // if already verified, skip
		    if (in_array($_form . $_feat . $_prev_feats, self::$done_index))
			break;

		    // add to the index of already verified
		    array_push(self::$done_index, $_form . $_feat . $_prev_feats);


		    // PREV 1.1 compare singular and plural
		    if (instr($_feat, 'art') == 0 && instr($_feat, 'num') == 0 && self::isSingular($_feat) && self::isPlural($_prev_feats))
		    {
			if (self::$dbgme)
			    echox('- PREV step 1 penalyze "' . $_form . '" as ' . $_feat . ' against previous term with 1 feat ' . right($_prev_feats, 2));

			// set score
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-1', $pos_arr[$n], $feats['features'], self::$score_prev);

			$pos_arr = self::exclude($pos_arr);
		    }


		    // PREV 1.2 compare plural and singular
		    if (instr($_prev_feats, 'ver') == 0 && instr($_feat, 'art') == 0 && instr($_feat, 'num') == 0 && self::isPlural($_feat) && self::isSingular($_prev_feats))
		    {
			if (self::$dbgme)
			    echox('- PREV step 2 penalyze "' . $_form . '" as ' . $_feat . ' against previous term with 1 feat ' . right($_prev_feats, 2));


			// assign a negative score
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-2', $pos_arr[$n], $feats['features'], self::$score_next);
			$pos_arr = self::exclude($pos_arr);
		    }


		    // PREV 1.3 compare persons of two verbs
		    // eg. "vorrei 1+s conferma 3+s ", can't be possible
		    if (instr($_prev_feats, '1') > 0 && (instr($_feat, '2') > 0 || instr($_feat, '3') > 0))
		    {
			if (self::$dbgme)
			    echox('- PREV step 3 penalyze "' . $_form . '" as ' . $_feat . ' against previous term with 1 feat ' . right($_prev_feats, 2));

			// assign a negative score
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-3', $pos_arr[$n], $feats['features'], self::$score_prev);
			$pos_arr = self::exclude($pos_arr);
		    }


		    // PREV 1.4 compare persons of two verbs
		    // eg. "ha ind+pres+3+s ancora ind+pres+3+s ", can't be possible
		    if (instr($_prev_feats, 'ind+pres+3+s') > 0 && instr($_feat, 'ind+pres+3+s') > 0)
		    {
			if (self::$dbgme)
			    echox('- PREV step 4 penalyze "' . $_form . '" as ' . $_feat . ' against previous term with 1 feat ' . $_prev_feats);

			// assign a negative score
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-4', $pos_arr[$n], $feats['features'], self::$safe_score_prev);
			$pos_arr = self::exclude($pos_arr);
		    }
		    
		    		    		    
		    // more specific when we have two verbs with time differents eg. "andava ancora" where "ancora" cannot be VER
		    if (instr($_prev_feats, 'ind+impf+3+s') > 0 && instr($_feat, 'ind+pres+3+s') > 0)
		    {
			if (self::$dbgme)
			    echox('- PREV step 5 penalyze "' . $_form . '" as ' . $_feat . ' against previous term with 1 feat ' . $_prev_feats);

			// assign a negative score
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-prev-5', $pos_arr[$n], $feats['features'], self::$safe_score_prev);
			$pos_arr = self::exclude($pos_arr);
		    }

		    /**
		     * "la blocco" or "le ritrovo" cannot be NOUN but definitely VER.
		     */
		    if (
			(($pos_arr[$n - 1][0]['form'] == 'la' || $pos_arr[$n - 1][0]['form'] == 'le') && $_feat == 'noun-m:s')
			|| ($pos_arr[$n - 1][0]['form'] == 'lo' && ($_feat == 'noun-m:s' && preg_match('/'.self::$impossible_nouns_before_lo.'/i', left($_form, 1))))
		    )
		    {
			if (self::$dbgme)
			    echox('- PREV step 6 penalyze "' . $_form . '" as NOUN in favor of VER');
			
			// assign a negative score to noun
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
     * Apply rules between dubious terms and the next one or two terms
     * @param array $pos_arr
     * @param int $until  1 or 2
     * @return array $pos_arr;
     */
    private static function checkNextToken($pos_arr, $until = 1)
    {
	foreach ($pos_arr as $n => $pos_part)
	{
	    if (count($pos_part) > 1 && isset($pos_arr[$n + $until]))
	    {
		// loop between each pos part with the next pos part
		foreach ($pos_part as $feats)
		{
		    $_form = $feats['form'];
		    $_feat = strtolower($feats['features']);

		    // get feature of next term
		    $_next_feats = self::checkNearbyFeats($pos_arr[$n + $until][0]);

		    // if already verified, skip
		    if (in_array($_form . $_feat . $_next_feats, self::$done_index))
			break;

		    // add to the index of already verified
		    array_push(self::$done_index, $_form . $_feat . $_next_feats);


		    // if a feat is a number and next word is singular, this cannot be plural
		    if (instr($_feat, 'num') > 0 && self::isSingular($_next_feats))
		    {
			if (self::$dbgme)
			    echox('- NEXT step 1 penalyze "' . $_form . '" as ' . $_feat . ' against of successive term with 1 feat ' . right($_next_feats, 2));

			// assign a negative score
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-next-1', $pos_arr[$n], $feats['features'], self::$score_next);
			$pos_arr = self::exclude($pos_arr);
		    }

		    // and vice-versa, if "uno una un" the next word must be singular
		    if (($_form == 'uno' || $_form == 'una' || $_form == 'un') && self::isPlural($_next_feats))
		    {
			if (self::$dbgme)
			    echox('- NEXT step 2 penalyze "' . $_form . '" as ' . $_feat . ' against of successive term with 1 feat ' . right($_next_feats, 2));

			// assign a negative score
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-next-2', $pos_arr[$n], $feats['features'], self::$score_next);
			$pos_arr = self::exclude($pos_arr);
		    }


		    // compare singular and $_next_feats @todo other tags to ignore?

		    if (instr($_next_feats, 'art') == 0 && instr($_next_feats, 'pro') == 0 && instr($_feat, 'num') == 0 && self::isSingular($_feat) && self::isPlural($_next_feats))
		    {
			if (self::$dbgme)
			    echox('- NEXT step 3 penalyze "' . $_form . '" as ' . $_feat . ' against of successive term with 1 feat ' . right($_next_feats, 2));

			// assign a negative score
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-next-3', $pos_arr[$n], $feats['features'], self::$score_next);
			$pos_arr = self::exclude($pos_arr);
		    }


		    // compare plural and singular
		    if (instr($_next_feats, 'art') == 0 && instr($_next_feats, 'adj') == 0 && instr($_next_feats, 'num') == 0 && instr($_feat, 'num') == 0 && self::isPlural($_feat) && self::isSingular($_next_feats))
		    {
			if (self::$dbgme)
			    echox('- NEXT step 4 penalyze "' . $_form . '" as ' . $_feat . ' against of successive term with 1 feat ' . right($_next_feats, 2));

			// assign a negative score
			$pos_arr[$n] = PosTools::setSubScorePos('times-exclusion-next-4', $pos_arr[$n], $feats['features'], self::$score_next);
			$pos_arr = self::exclude($pos_arr);
		    }
		    
		} // end loop pos_arr
	    }
	}

	return $pos_arr;

    }


    /**
     * Return the feature of the previous or next pos part
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
     * Return boolean if a tag is singular
     * @param string $_feat
     * @return boolean
     */
    public static function isSingular($_feat)
    {
	if (right($_feat, 2) == '+s' || right($_feat, 2) == ':s' || right($_feat, 2) == '-s' || right($_feat, 2) == '-S')
	    return true;

	return false;

    }

    
    /**
     * Return boolean if a tag is plural
     * @param string $_feat
     * @return boolean
     */
    public static function isPlural($_feat)
    {
	if (right($_feat, 2) == '+p' || right($_feat, 2) == ':p' || right($_feat, 2) == '-p' || right($_feat, 2) == '-P')
	    return true;

	return false;

    }


}
