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
 * Identifies and tag combinations of AUX and VER, AUX AUX VER, AUX VER VER etc.
 *
 */
class PosAuxVerbs
{
    /** Default language */
    public $language = 'it';
    
    /** Class debugger flag */
    private $dbgme = false;
    
    /** Verbs that can be auxiliary (en) */
    public $common_inf_en = 'have|be|do|came|want|stay|can|must|dare';

    /** Verbs that can be auxiliary (it) */
    public $common_inf_it = 'avere|essere|fare|venire|volere|stare|potere|dovere|osare|bisognare';

    
    /**
     * By joining sh-feat for a given $pos_arr, search for patterns with VER and PPAST.
     * If found, modify the tags assigning AUX tags.
     * @todo exists some other pattern?
     * @param array $pos_arr
     * @return array $pos_arr (updated)
     */
    public function preserveAuxPatterns($pos_arr)
    {
	$patterns = [
	    ['from' => 'VER PPAST PPAST', 'to' => 'AUX AUX VER'], 
	    ['from' => 'VER VER', 'to' => 'AUX VER'], 
	    ['from' => 'VER PPAST', 'to' => 'AUX VER'], 
	    ['from' => 'VER ADV PPAST', 'to' => 'AUX ADV VER'], 
	    ['from' => 'VER ADV VER', 'to' => 'AUX ADV VER']
	];


	foreach ($patterns as $pattern)
	{
	    // needs to relaunch for every pattern
	    $feats = PosTools::joinPosForms($pos_arr, 'sh-feat', []);

	    if($this->dbgme)
		echox('<hr>- searching pattern '.$pattern['from']. ' on '.$feats);

	    $matches = [];
	    preg_match_all('/((?=' . $pattern['from'] . '))/', $feats, $matches, PREG_OFFSET_CAPTURE);


	    if (count($matches[0]) == 0)
		continue;

	    // if match found, $matches can be more than one
	    foreach ($matches[0] as $match)
	    {
		$start_from = $match[1];

		$part_left = left($feats, $start_from);

		$parts_left = explode(' ', trim($part_left));
		// echox($parts_left);

		$is_aux_index = count($parts_left);

		if ($this->dbgme)
		    echox('<hr>- found pattern ' . $pattern['from'] . ' at index ' . $is_aux_index . ' for token <b>' . $pos_arr[$is_aux_index][0]['form'] . '</b>');

		$pos_arr = $this->applyTags($pos_arr, $is_aux_index, $pattern);
	    }
	}

	$feats = null; $matches = null; $start_from = null; $part_left = null;
	$parts_left = null; $is_aux_index = null;
	
	return $pos_arr;

    }


    /**
     * Replace tags that matches with a pattern starting from $is_aux_index
     * @param array $pos_arr
     * @param int $is_aux_index
     * @param string $pattern
     * @return array $pos_arr (updated)
     */
    private function applyTags($pos_arr, $is_aux_index, $pattern)
    {
	$patterns_to = explode(' ', $pattern['to']);

	// search for pos arr parts at indexes that matches with the pattern
	foreach ($pos_arr as $n => $pos_part)
	{
	    // starting from the indicated index
	    if ($n != $is_aux_index)
		continue;

	    // if the first VER cannot be AUX, skip
	    if (!preg_match('/(' . $this->{'common_inf_'.$this->language} . ')/i', $pos_arr[$is_aux_index][0]['lemma']))
		continue;
	    
	    // loop through patterns parts
	    foreach ($patterns_to as $n2 => $substitute)
	    {
		if ($this->dbgme)
		    echox('---- apply replacement ' . $pattern['to'] . ' on tag ' . $pos_arr[$is_aux_index + $n2][0]['sh-feat']);

		// and modify each pos_arr part as indicated by the pattern
		$pos_arr[$is_aux_index + $n2][0]['sh-feat'] = $substitute;
		$pos_arr[$is_aux_index + $n2][0]['features'] = preg_replace('/(VER|PPAST)/', $substitute, $pos_arr[$is_aux_index + $n2][0]['features']);

	    }
	}
//diex($pos_arr);
	return $pos_arr;

    }

}
