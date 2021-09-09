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

use NaiPosTagger\Models\NaiMyThoughts;

/**
 * Rules for english language.
 *
 */
trait BrillsRulesTrait
{

    /**
     * 1110 first, second and third well defined, fourth to define
     * @param int $target_index
     * @param array $prev_pp_1
     * @param array $prev_pp_2
     * @param array $prev_pp_3
     * @param array $this_pp
     * @param boolean $dbgme
     */
    public static function rulesPattern1110($target_index, $prev_pp_1, $prev_pp_2, $prev_pp_3, $this_pp, $dbgme = false)
    {
	$prev_word1 = $prev_pp_1['form'];
	$prev_tag1 = $prev_pp_1['sh-feat']; // unica 1

	$prev_word2 = $prev_pp_2['form'];
	$prev_tag2 = $prev_pp_2['sh-feat']; // unica 2	

	$prev_word3 = $prev_pp_3['form'];
	$prev_tag3 = $prev_pp_3['sh-feat']; // unica 2	

	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];

	if ($dbgme)
	    echox("----- " . __LINE__ . " rulesPattern 1110 with $prev_word1 ($prev_tag1), $prev_word2 ($prev_tag2), $prev_word3 ($prev_tag3), $this_word ($this_tag dubious)");

	NaiMyThoughts::collect(__CLASS__, __METHOD__, "with $prev_word1 ($prev_tag1), $prev_word2 ($prev_tag2), $prev_word3 ($prev_tag3), $this_word ($this_tag dubious)");

	// added 15/06/2019
	if ($prev_tag1 == 'VER' && $prev_tag2 == 'PPAST' && ($prev_tag3 == 'ART') && $this_tag == 'NOUN')
	    self::returnRule($target_index, '1110-10', 'NOUN');

	if ($prev_tag1 == 'PRO' && $prev_pp_2['features'] == 'VER:inf+pres' && $prev_word3 == 'been' && $this_tag == 'VER')
	    self::returnRule($target_index, '1110-15', 'VER');

	if ($prev_word1 == 'by' && $prev_pp_2['features'] == 'VER:ger+pres' && $prev_tag3 == 'NOUN' && $this_tag == 'NOUN')
	    self::returnRule($target_index, '1110-20', 'NOUN', 1);

	if ($prev_tag1 == 'PRE' && $prev_tag2 == 'NUM' && $prev_tag3 == 'ADJ' && $this_tag == 'NOUN')
	    self::returnRule($target_index, '1110-25', 'NOUN', 1);

	// added 25/09/2019
	if ($prev_tag1 == 'NUM' && $prev_tag2 == 'NOUN' && $prev_tag3 == 'ADV' && $this_tag == 'ADJ')
	    self::returnRule($target_index, '1110-30', 'ADJ', 1);

	if ($prev_tag1 == 'PRO' && $prev_tag2 == 'VER' && $prev_tag3 == 'ADV' && $this_tag == 'NOUN')
	    self::returnRule($target_index, '1110-35', 'NOUN', 1);

	if ($prev_tag1 == 'PRO' && $prev_tag2 == 'VER' && $prev_tag3 == 'CON' && $this_tag == 'PPAST')
	    self::returnRule($target_index, '1110-40', 'PPAST');

	if ($prev_tag1 == 'VER' && $prev_tag2 == 'ART' && $prev_tag3 == 'NOUN' && $this_tag == 'ADJ')
	    self::returnRule($target_index, '1110-45', 'ADJ', .9);

	if ($prev_word1 == 'by' && $prev_tag2 == 'ART' && $prev_tag3 == 'ADJ' && $this_tag == 'NOUN')
	    self::returnRule($target_index, '1110-50', 'NOUN', 1);

	if ($prev_tag1 == 'PRO' && $prev_tag2 == 'VER' && $prev_tag3 == 'PPAST' && $this_tag == 'PPAST')
	    self::returnRule($target_index, '1110-55', 'PPAST');

	if ($prev_tag1 == 'PRO' && $prev_tag2 == 'VER' && $prev_word3 == 'not' && $this_pp['features'] == 'VER:ger+pres')
	    self::returnRule($target_index, '1110-60', 'VER');	
    }


    /**
     * 1011 first, third and fourth well defined, second to define
     * @param int $target_index
     * @param array $prev_pp_1
     * @param array $this_pp
     * @param array $next_pp_1
     * @param array $next_pp_2
     * @param boolean $dbgme
     */
    public static function rulesPattern1011($target_index, $prev_pp_1, $this_pp, $next_pp_1, $next_pp_2, $dbgme = false)
    {

	$prev_word1 = $prev_pp_1['form'];
	$prev_tag1 = $prev_pp_1['sh-feat'];

	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];

	$nextword1 = $next_pp_1['form'];
	$next_tag1 = $next_pp_1['sh-feat'];

	$nextword2 = $next_pp_2['form'];
	$next_tag2 = $next_pp_2['sh-feat'];

	if ($dbgme)
	    echox("----- " . __LINE__ . " rulesPattern 1011 with $prev_word1 ($prev_tag1), $this_word ($this_tag dubious), $nextword1 ($next_tag1), $nextword2 ($next_tag2)");

	NaiMyThoughts::collect(__CLASS__, __METHOD__, "with $prev_word1 ($prev_tag1), $this_word ($this_tag dubious), $nextword1 ($next_tag1), $nextword2 ($next_tag2)");

	if ($prev_tag1 == 'NPR' && $this_tag == 'VER' && $next_tag1 == 'ART' && $next_tag2 == 'NOUN')
	    self::returnRule($target_index, '1011-15', 'VER');

	if ($prev_tag1 == 'PRO' && $this_tag == 'VER' && $next_tag1 == 'ADJ' && $next_tag2 == 'NOUN')
	    self::returnRule($target_index, '1011-20', 'VER');

	if ($prev_tag1 == 'PRO' && $this_tag == 'VER' && $next_tag1 == 'ADV' && $next_tag2 == 'PRE')
	    self::returnRule($target_index, '1011-25', 'VER');

	if ($prev_tag1 == 'ART' && $this_tag == 'NOUN' && $next_tag1 == 'ARTPRE' && $next_tag2 == 'NOUN')
	    self::returnRule($target_index, '1011-30', 'NOUN');

	if (preg_match('/(ART|PRE)/', $prev_tag1) && $this_tag == 'ADJ' && $next_tag1 == 'ADJ' && $next_tag2 == 'NOUN')
	    self::returnRule($target_index, '1011-35', 'ADJ');

	if ($prev_tag1 == 'PRE' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN' && $next_tag2 == 'VER')
	    self::returnRule($target_index, '1011-40', 'ADJ');

	if ($prev_tag1 == 'VER' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN' && $next_tag2 == 'SENT')
	    self::returnRule($target_index, '1011-45', 'ADJ', .2);

	if ($prev_tag1 == 'SENT' && $this_pp['features'] == 'VER:ger+pres' && $next_tag1 == 'NOUN' && $next_tag2 == 'PRE')
	    self::returnRule($target_index, '1011-45', 'VER');
    }


    /**
     * 1101 first, second and fourth well defined, third to define
     * @param int $target_index
     * @param array $prev_pp_1
     * @param array $prev_pp_2
     * @param array $this_pp
     * @param array $next_pp_1
     * @param boolean $dbgme
     */
    public static function rulesPattern1101($target_index, $prev_pp_1, $prev_pp_2, $this_pp, $next_pp_1, $dbgme = false)
    {
	$prev_word1 = $prev_pp_1['form'];
	$prev_tag1 = $prev_pp_1['sh-feat']; // unica 1

	$prev_word2 = $prev_pp_2['form'];
	$prev_tag2 = $prev_pp_2['sh-feat']; // unica 2	

	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];

	$nextword1 = $next_pp_1['form'];
	$next_tag1 = $next_pp_1['sh-feat']; // unica 4

	if ($dbgme)
	    echox("----- " . __LINE__ . " rulesPattern 1101 with $prev_word1 ($prev_tag1), $prev_word2 ($prev_tag2), $this_word ($this_tag dubious), $nextword1 ($next_tag1)");

	NaiMyThoughts::collect(__CLASS__, __METHOD__, "with $prev_word1 ($prev_tag1), $prev_word2 ($prev_tag2), $this_word ($this_tag dubious), $nextword1 ($next_tag1)");

	if (($prev_tag1 == 'ART' || $prev_tag1 == 'PRO') && $prev_tag2 == 'VER' && $this_word == 'subito' && $next_pp_1['features'] == 'VER:ger+pres')
	    self::returnRule($target_index, '1101-5', 'ADV');

	if ($prev_tag1 == 'ART' && $prev_tag2 == 'NOUN' && $this_word == 'fa' && $next_tag1 == 'NOUN')
	    self::returnRule($target_index, '1101-10', 'VER');

	if ($prev_pp_1['features'] == 'VER:ind+pres+3+s' && $prev_word2 == 'to' && $this_tag == 'VER' && $nextword1 == 'a')
	    self::returnRule($target_index, '1101-15', 'VER', 5);

	// added 06/08/2019
	if ($prev_tag1 == 'ART' && $prev_tag2 == 'NOUN' && $this_tag == 'VER' && $next_tag1 == 'ADV')
	    self::returnRule($target_index, '1101-20', 'VER');

	if ($prev_tag1 == 'ARTPRE' && $prev_tag2 == 'NOUN' && $this_tag == 'PPAST' && $next_tag1 == 'PRE')
	    self::returnRule($target_index, '1101-25', 'PPAST');

	if ($prev_tag1 == 'ART' && $prev_tag2 == 'NOUN' && $this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'NUM')
	    self::returnRule($target_index, '1101-30', 'VER');

	if ($prev_tag1 == 'ARTPRE' && $prev_tag2 == 'PRO' && $this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'ART')
	    self::returnRule($target_index, '1101-35', 'VER');

	if ($prev_tag1 == 'VER' && $prev_pp_2['features'] == 'VER:inf+pres' && $this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'PRE')
	    self::returnRule($target_index, '1101-40', 'NOUN');

	if ($prev_tag1 == 'ART' && $prev_tag2 == 'NOUN' && $this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'ADJ')
	    self::returnRule($target_index, '1101-50', 'VER', -.5);

	if ($prev_tag1 == 'ADV' && $prev_tag2 == 'ADJ' && $this_pp['sh-feat'] == 'NOUN' && $next_tag1 == 'SENT')
	    self::returnRule($target_index, '1101-55', 'NOUN');

	if ($prev_tag1 == 'ART' && $prev_tag2 == 'NOUN' && $this_pp['features'] == 'VER:inf+pres' && $next_tag1 == 'ADJ')
	    self::returnRule($target_index, '1101-60', 'VER');

	if ($prev_tag1 == 'ADV' && $prev_tag2 == 'ART' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN')
	    self::returnRule($target_index, '1101-65', 'ADJ');

	if ($prev_tag1 == 'CON' && $prev_tag2 == 'NUM' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN')
	    self::returnRule($target_index, '1101-70', 'ADJ');

	if ($prev_tag1 == 'ADJ' && $prev_tag2 == 'ADJ' && $this_tag == 'NOUN' && $next_tag1 == 'PRE')
	    self::returnRule($target_index, '1101-75', 'NOUN');

	if ($prev_tag1 == 'NUM' && $prev_tag2 == 'ADJ' && $this_tag == 'NOUN' && $next_tag1 == 'PRE')
	    self::returnRule($target_index, '1101-80', 'NOUN');

	if ($prev_tag1 == 'PRE' && $prev_tag2 == 'ADJ' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN')
	    self::returnRule($target_index, '1101-85', 'ADJ');

	if ($prev_tag1 == 'PRO' && $prev_word2 == 'did' && ($this_pp['features'] == 'VER:inf+pres' || $this_tag == 'UNK') && $next_tag1 == 'PRE')
	    self::returnRule($target_index, '1101-90', 'VER');

	if ($prev_tag1 == 'VER' && $prev_tag2 == 'ADJ' && $this_tag == 'NOUN' && $next_tag1 == 'SENT')
	    self::returnRule($target_index, '1101-95', 'NOUN');

	if ($prev_tag1 == 'PRO' && $prev_tag2 == 'VER' && ($this_pp['features'] == 'VER:inf+pres' || $this_tag == 'UNK') && $next_tag1 == 'PRO')
	    self::returnRule($target_index, '1101-95', 'VER');
    }


    /**
     * 101 first and third well defined, middle to define
     * @param int $target_index
     * @param array $prev_pp_1
     * @param array $this_pp
     * @param array $next_pp_1
     * @param boolean $dbgme
     */
    public static function rulesPattern101($target_index, $prev_pp_1, $this_pp, $next_pp_1, $dbgme = false)
    {
	$prev_word1 = $prev_pp_1['form'];
	$prev_tag1 = $prev_pp_1['sh-feat']; // unica 1

	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];

	$nextword1 = $next_pp_1['form'];
	$next_tag1 = $next_pp_1['sh-feat']; // unica 2

	if ($dbgme)
	    echox("----- " . __LINE__ . " rulesPattern101 101 with $prev_word1 ($prev_tag1), $this_word ($this_tag dubious), $nextword1 ($next_tag1)");

	NaiMyThoughts::collect(__CLASS__, __METHOD__, "with $prev_word1 ($prev_tag1), $this_word ($this_tag dubious), $nextword1 ($next_tag1)");

	if ($prev_word1 == 'is' && ($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'a')
	    self::returnRule($target_index, '101-2', 'VER');

	if ($prev_word1 == 'gonna' && ($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PRO')
	    self::returnRule($target_index, '101-120', 'VER');

	if ($prev_word1 == 'is' && $this_pp['features'] == 'VER:ger+pres' && $next_tag1 == 'ADV')
	    self::returnRule($target_index, '101-126', 'VER');

	if ($prev_word1 == 'for' && ($this_tag == 'VER' && $this_pp['features'] != 'VER:ger+pres') && $next_tag1 == 'NOUN')
	    self::returnRule($target_index, '101-130', 'NOUN');
	
	if (instr($prev_pp_1['features'], 'VER:ind+pres') > 0 && ($this_tag == 'PPAST' || $this_tag == 'UNK') && $next_tag1 == 'PRO')
	    self::returnRule($target_index, '101-135', 'PPAST', 3);

	if ($prev_pp_1['features'] == 'VER:ind+pres+3+s' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN')
	    self::returnRule($target_index, '101-136', 'ADJ');

	if ($prev_tag1 == 'ADJ')
	{
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')
		self::returnRule($target_index, '101-150', 'VER');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ADJ')
		self::returnRule($target_index, '101-155', 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')
		self::returnRule($target_index, '101-160', 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')
		self::returnRule($target_index, '101-165', 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == "PON")
		self::returnRule($target_index, '101-175', 'NOUN');
	}

	if ($prev_tag1 == 'ADV')
	{

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'che')
		self::returnRule($target_index, '101-210', 'VER');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'DET')
		self::returnRule($target_index, '101-215', 'VER');

	    if ($next_tag1 == 'VER')
		self::returnRule($target_index, '101-220', 'NOUN');
	}

	if ($prev_pp_1['features'] == 'ADV:tim')
	{
	    if (($this_tag == 'VER' || $this_tag == 'UNK') && ($next_tag1 == 'ART' || $next_tag1 == 'ARTPRE'))
		self::returnRule($target_index, '101-225', 'VER');
	}

	if ($prev_tag1 == 'ART')
	{
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ADJ')
		self::returnRule($target_index, '101-230', 'ADJ');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'VER')
		self::returnRule($target_index, '101-235', 'NOUN');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')
		self::returnRule($target_index, '101-240', 'ADJ');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NUM')
		self::returnRule($target_index, '101-245', 'ADJ');
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'AMOUNT')
		self::returnRule($target_index, '101-250', 'ADJ');
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'DET')
		self::returnRule($target_index, '101-255', 'ADJ');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'VER')
		self::returnRule($target_index, '101-260', 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ADJ')
		self::returnRule($target_index, '101-265', 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ART')
		self::returnRule($target_index, '101-275', 'NOUN');

	    if (($this_tag == 'PRO' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')
		self::returnRule($target_index, '101-280', 'DET');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PRE')
		self::returnRule($target_index, '101-285', 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')
		self::returnRule($target_index, '101-290', 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ART')
		self::returnRule($target_index, '101-295', 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'CON')
		self::returnRule($target_index, '101-300', 'NOUN');
	}

	if ($prev_tag1 == 'ARTPRE')
	{
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')
		self::returnRule($target_index, '101-310', 'ADJ');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')
		self::returnRule($target_index, '101-315', 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')
		self::returnRule($target_index, '101-325', 'NOUN');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ART')
		self::returnRule($target_index, '101-330', 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ART')
		self::returnRule($target_index, '101-335', 'NOUN');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PON')
		self::returnRule($target_index, '101-340', 'NOUN');
	}

	if ($prev_tag1 == 'CON')
	{
	    if ($next_tag1 == 'VER')
		self::returnRule($target_index, '101-360', 'NOUN');

	    if ($next_tag1 == 'VER')
		self::returnRule($target_index, '101-365', 'PRO');

	    if (instr($this_pp['features'], 'part+past') > 0 && $next_tag1 == 'ART')
		self::returnRule($target_index, '101-370', 'VER');

	    if ($this_tag == 'VER' && $next_tag1 == 'NUM')
		self::returnRule($target_index, '101-371', 'VER');

	    if ($this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'ADV')
		self::returnRule($target_index, '101-372', 'VER');
	}

	if ($prev_tag1 == 'DET')
	{

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'DET')
		self::returnRule($target_index, '101-415', 'VER');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ADJ')
		self::returnRule($target_index, '101-420', 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == "PRE")
		self::returnRule($target_index, '101-425', 'NOUN');

	    if ($next_tag1 == 'NOUN')
		self::returnRule($target_index, '101-430', 'VER');

	    if ($next_tag1 == 'ADV')
		self::returnRule($target_index, '101-435', 'NOUN');

	    if ($next_tag1 == 'NOUN')
		self::returnRule($target_index, '101-440', 'ADJ');

	    if ($next_tag1 == 'DET')
		self::returnRule($target_index, '101-445', 'NOUN');

	    if ($next_tag1 == 'PRO')
		self::returnRule($target_index, '101-450', 'NOUN');

	    if ($next_tag1 == 'VER')
		self::returnRule($target_index, '101-455', 'NOUN');
	}

	if ($prev_tag1 == 'INT')
	{
	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PRO')
		self::returnRule($target_index, '101-460', 'VER');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PON')
		self::returnRule($target_index, '101-465', 'VER');
	}

	if ($prev_tag1 == 'NOUN')
	{

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == "PRE")
		self::returnRule($target_index, '101-490', 'ADJ');

	    if (($this_tag == 'NPR' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')
		self::returnRule($target_index, '101-495', 'ARTPRE');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PRO')
		self::returnRule($target_index, '101-500', 'ADJ');

	    if ($next_tag1 == 'DET')
		self::returnRule($target_index, '101-505', 'VER');
	}

	if ($prev_tag1 == 'NPR')
	{
	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ADV')
		self::returnRule($target_index, '101-520', 'VER');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')
		self::returnRule($target_index, '101-525', 'VER');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PON')
		self::returnRule($target_index, '101-530', 'NOUN', 0.1);

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'SENT')
		self::returnRule($target_index, '101-535', 'VER');

	    if ($next_tag1 == 'PON')
		self::returnRule($target_index, '101-540', 'NPR');

	    if ($next_tag1 == "NPR")
		self::returnRule($target_index, '101-545', 'NPR');

	    if ($next_tag1 == "NPR")
		self::returnRule($target_index, '101-550', 'NPR');

	    if ($next_tag1 == 'DET')
		self::returnRule($target_index, '101-555', 'VER');

	    if ($this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'NUM')
		self::returnRule($target_index, '101-556', 'VER');

	    if ($this_word == 'will' && $nextword1 == 'be')
		self::returnRule($target_index, '101-557', 'VER');	    
	}

	if ($prev_tag1 == 'NUM' || $prev_tag1 == 'DET' || $prev_tag1 == 'AMOUNT')
	{
	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'CON')
		self::returnRule($target_index, '101-560', 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')
		self::returnRule($target_index, '101-565', 'NOUN');
	}

	if ($prev_tag1 == 'PRE')
	{

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NPR')
		self::returnRule($target_index, '101-600', 'ADJ');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PRE')
		self::returnRule($target_index, '101-610', 'NOUN');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PRO')
		self::returnRule($target_index, '101-615', 'VER');

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'VER')
		self::returnRule($target_index, '101-620', 'ADV');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')
		self::returnRule($target_index, '101-625', 'ADJ');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'NPR')
		self::returnRule($target_index, '101-630', 'ADJ');
	    
//	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')
//		self::returnRule($target_index, '101-631', 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'it')
		self::returnRule($target_index, '101-635', 'VER', 3);

	    if (($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK') && $nextword1 == 'me')
		self::returnRule($target_index, '101-636', 'VER');
	}

	if ($prev_tag1 == 'PON')
	{
	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'VER')
		self::returnRule($target_index, '101-640', 'ADV');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')
		self::returnRule($target_index, '101-645', 'NOUN');
	}

	if ($prev_tag1 == 'PRO')
	{
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')
		self::returnRule($target_index, '101-655', 'VER');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'VER')
		self::returnRule($target_index, '101-660', 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRO')
		self::returnRule($target_index, '101-665', 'NOUN');

	    if ($next_tag1 == 'DET')
		self::returnRule($target_index, '101-670', 'VER');

	    if ($this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'NUM')
		self::returnRule($target_index, '101-671', 'VER');

	    if ($this_tag == 'VER' && $next_tag1 == 'PRO')
		self::returnRule($target_index, '101-672', 'VER', 2.5);

	    if ($this_tag == 'PPAST' && $nextword1 == 'me')
		self::returnRule($target_index, '101-673', 'PPAST');

	    if ($this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'PRO')
		self::returnRule($target_index, '101-674', 'VER');
	    if ($this_word == 'still' && $next_tag1 == 'VER')
		self::returnRule($target_index, '101-675', 'ADV');
	}

	if ($prev_tag1 == 'SENT')
	{
	    if ($this_word == 'till' && $next_tag1 == 'PRO')
		self::returnRule($target_index, '101-696', 'ADV');

	    if ($this_tag == 'VER' && ($next_tag1 == 'ART' || $next_tag1 == 'PRO'))
		self::returnRule($target_index, '101-700', 'VER');


//	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PON')
//		self::returnRule($target_index, '101-701', 'VER');
	}

	if ($prev_tag1 == 'VER')
	{
	    if ($next_tag1 == 'ADJ')
		self::returnRule($target_index, '101-750', 'ARTPRE');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ART')
		self::returnRule($target_index, '101-760', 'VER');

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'VER')
		self::returnRule($target_index, '101-765', 'ADV');

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'ART')
		self::returnRule($target_index, '101-770', 'ADV');

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'PRE')
		self::returnRule($target_index, '101-775', 'ADV');

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')
		self::returnRule($target_index, '101-780', 'VER');

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'SMI')
		self::returnRule($target_index, '101-785', 'ADV');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ART')
		self::returnRule($target_index, '101-790', 'VER');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ART')
		self::returnRule($target_index, '101-795', 'PPAST');

	    if ($next_tag1 == 'NOUN')
		self::returnRule($target_index, '101-805', 'ADV');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'al')
		self::returnRule($target_index, '101-810', 'VER');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ADJ')
		self::returnRule($target_index, '101-815', 'ARTPRE');

	    if ($prev_pp_1['features'] == 'VER:ind+pres+3+s' && $this_tag == 'NOUN' && $next_tag1 == 'SENT')
		self::returnRule($target_index, '101-820', 'NOUN');
	}

    }


    /**
     * 110 first and second well defined, third to define
     * @param int $target_index
     * @param array $prev_pp_2
     * @param array $prev_pp_1
     * @param array $this_pp
     * @param boolean $dbgme
     */
    public static function rulesPattern110($target_index, $prev_pp_2, $prev_pp_1, $this_pp, $dbgme = false)
    {
	$prev_word1 = $prev_pp_1['form'];
	$prev_tag1 = $prev_pp_1['sh-feat']; // unica 1

	$prev_word2 = $prev_pp_2['form'];
	$prev_tag2 = $prev_pp_2['sh-feat']; // unica 2

	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];

	if ($dbgme)
	    echox("----- " . __LINE__ . " rulesPattern 110 with $prev_word2 ($prev_tag2), $prev_word1 ($prev_tag1), $this_word ($this_tag dubious)");

	NaiMyThoughts::collect(__CLASS__, __METHOD__, "with $prev_word2 ($prev_tag2), $prev_word1 ($prev_tag1), $this_word ($this_tag dubious)");

	// ENGLISH
	if (instr($prev_pp_2['features'], 'VER:cond') > 0 && $prev_word1 == 'already' && instr($this_pp['features'], 'PPAST:pos+s+m') > 0)
	    self::returnRule($target_index, '110-0', 'PPAST');

	if ($prev_pp_2['lemma'] == 'have' && $prev_word1 == 'to' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-5', 'VER', 5);

	if ($prev_word2 == 'I' && $prev_word1 == 'do' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-6', 'VER', 5);

	if ($prev_word2 == 'and' && $prev_tag1 == 'ADV' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-10', 'VER');

	if ($prev_word2 == 'how' && $prev_word1 == 'to' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-15', 'VER', 3);

	if ($prev_word2 == 'and' && $prev_word1 == 'the' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-20', 'NOUN');

	if ($prev_word2 == 'for' && $prev_word1 == 'your' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-25', 'NOUN');

	if ($prev_word2 == 'do' && $prev_word1 == 'not' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-30', 'VER');

	if ($prev_word2 == 'to' && $prev_word1 == 'be' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-35', 'ADJ');

	if ($prev_word2 == 'is' && $prev_word1 == 'it' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-36', 'ADJ', 3);

	if ($prev_word2 == 'get' && $prev_tag1 == 'PRO' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-37', 'ADJ', 1);

	if ($prev_word2 == 'and' && $prev_word1 == 'if' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-40', 'VER');


	if ($prev_tag2 == 'PRO' && $prev_word1 == 'could' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-41', 'VER');
	if ($prev_tag2 == 'PRO' && $prev_word1 == 'would' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-41', 'VER');
	if ($prev_tag2 == 'PRO' && $prev_word1 == 'should' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-41', 'VER');

	if ($prev_word2 == 'can' && $prev_word1 == 'I' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-44', 'VER', 10);

	if ($prev_tag2 == 'PRO' && $prev_word1 == 'will' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-45', 'VER');

	if ($prev_word2 == 'I' && $prev_word1 == 'am' && $this_tag == 'ADJ')
	    self::returnRule($target_index, '110-46', 'ADJ');
	if ($prev_word2 == 'you' && $prev_word1 == 'are' && $this_tag == 'ADJ')
	    self::returnRule($target_index, '110-46', 'VER');
	if ($prev_word2 == 'he' && $prev_word1 == 'is' && $this_tag == 'ADJ')
	    self::returnRule($target_index, '110-46', 'VER');
	if ($prev_word2 == 'she' && $prev_word1 == 'is' && $this_tag == 'ADJ')
	    self::returnRule($target_index, '110-46', 'VER');
	if ($prev_word2 == 'we' && $prev_word1 == 'are' && $this_tag == 'ADJ')
	    self::returnRule($target_index, '110-46', 'VER');
	if ($prev_word2 == 'they' && $prev_word1 == 'are' && $this_tag == 'ADJ')
	    self::returnRule($target_index, '110-46', 'VER');

	if ($prev_word2 == 'I' && $prev_word1 == 'am' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-46', 'VER');
	if ($prev_word2 == 'you' && $prev_word1 == 'are' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-46', 'VER');
	if ($prev_word2 == 'he' && $prev_word1 == 'is' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-46', 'VER');
	if ($prev_word2 == 'she' && $prev_word1 == 'is' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-46', 'VER');
	if ($prev_word2 == 'we' && $prev_word1 == 'are' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-46', 'VER');
	if ($prev_word2 == 'they' && $prev_word1 == 'are' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-46', 'VER');

	if ($prev_word2 == 'may' && $prev_word1 == 'be' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-47', 'VER');

	if ($prev_tag2 == 'PRO' && $prev_word1 == 'wanna' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    self::returnRule($target_index, '110-48', 'VER');

	if ($prev_word2 == 'keep' && $prev_word1 == 'on' && $this_tag == 'NOUN')
	    self::returnRule($target_index, '110-49', 'VER', 5);
	if ($prev_word2 == 'no' && $prev_word1 == 'one' && $this_tag == 'VER')
	    self::returnRule($target_index, '110-49', 'VER', 2);

	if (instr($prev_pp_2['features'], 'PRO-PERS-CLI') > 0 && instr($prev_pp_1['features'], 'VER:ind+pres') > 0 && $this_tag == 'NPR')
	    self::returnRule($target_index, '110-55', 'NPR');

	if ($prev_tag2 == 'ADJ')
	{
	    if ($prev_tag1 == 'PON' && $this_word == 'what')
		self::returnRule($target_index, '110-255', 'PRO');

	    if ($prev_tag1 == 'VER')
		self::returnRule($target_index, '110-265', 'VER');

	    if ($prev_pp_1['form'] == '/' && $this_tag == 'ADJ')
		self::returnRule($target_index, '110-266', 'ADJ');
	}


	if ($prev_tag2 == 'ADV')
	{
	    if ($prev_tag1 == 'PRO' && $this_word == 'what')
		self::returnRule($target_index, '110-275', 'PRO');

	    if ($prev_tag1 == 'VER' && ($this_tag == 'ADV' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-295', 'ADV');

	    if ($prev_tag1 == 'ADV' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-300', 'ARTPRE');

	    if ($prev_tag1 == 'ART' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-305', 'NOUN');

	    if ($prev_tag1 == 'PRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-310', 'NOUN');

	    if ($prev_tag1 == 'ARTPRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-315', 'NOUN');

	    if ($prev_tag1 == 'DET')
		self::returnRule($target_index, '110-320', 'NOUN');

	    if ($prev_tag1 == 'NOUN')
		self::returnRule($target_index, '110-325', 'DET');
	}

	if ($prev_tag2 == 'ART')
	{
	    if ($prev_tag1 == 'VER' && instr($this_pp['features'], 'PPAST') > 0)
		self::returnRule($target_index, '110-355', 'PPAST');

	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-360', 'NOUN', .5);

	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-365', 'NOUN', .2);

	    if ($prev_tag1 == 'DET' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-370', 'NOUN');


	    if (left($prev_pp_1['features'], 2) == ':s' && left($this_pp['features'], 2) == '+p')
		self::returnRule($target_index, '110-375', $this_tag, -20);

	    if (left($prev_pp_1['features'], 2) == ':p' && left($this_pp['features'], 2) == '+s')
		self::returnRule($target_index, '110-380', $this_tag, -20);

	    if ($prev_tag1 == 'VER' && ($this_tag == 'ADV' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-385', 'ADV');

	    if ($prev_tag1 == 'NPR' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-386', 'VER');

	    if ($prev_tag1 == 'NOUN' && ($this_pp['features'] == 'VER:ind+pres+3+s' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-387', 'VER');
	}

	if ($prev_tag2 == 'CON')
	{
	    if ($prev_tag1 == 'ADV' && ($this_pp['features'] == 'VER:ind+pres+3+s' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-388', 'VER', -1);
	}
	
	if ($prev_tag2 == 'ARTPRE')
	{
	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-390', 'NOUN');
	}

	if ($prev_tag2 == 'DET')
	{
	    if ($prev_tag1 == 'VER')
		self::returnRule($target_index, '110-395', 'NOUN');

	    if ($prev_tag1 == 'NOUN' && instr($this_pp['features'], 'PPAST') > 0)
		self::returnRule($target_index, '110-415', 'PPAST');

	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-420', 'NOUN');

	    if ($prev_tag1 == 'PRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-425', 'NOUN');

	    if ($prev_tag1 == 'NOUN' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-430', 'ADJ');
	}

	if ($prev_tag2 == 'PRE')
	{
	    if ($prev_tag1 == 'ART' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-435', 'NOUN');

	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-440', 'NOUN');

	    if ($prev_tag1 == 'NOUN' && ($this_tag == 'ARTPRE' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-445', 'ARTPRE');

	    if ($prev_tag1 == 'PRO' && ($this_tag == 'ADV' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-450', 'NOUN');

	    if ($prev_word2 == 'to' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-455', 'VER');

	    if ($prev_word2 == 'to' && $this_pp['features'] == 'VER:ind+pres+3+s')
		self::returnRule($target_index, '110-456', 'VER', - self::$score_three_terms);
	}

	if ($prev_tag2 == 'PPAST')
	{
	    if ($prev_pp_1['features'] == 'PRO-INDEF-M-S' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-605', 'VER');
	}

	if ($prev_tag2 == 'PRO')
	{
	    if ($prev_tag1 == 'ART' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-461', 'VER');
	    if ($prev_tag1 == 'ARTPRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-465', 'NOUN');

	    if ($prev_tag1 == 'DET' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-470', 'NOUN');

//	    if ($prev_tag1 == 'NOUN' && ($this_tag == 'VER' || $this_tag == 'UNK'))
	    if ($prev_tag1 == 'NOUN' && ($this_pp['features'] == 'VER:ind+pres+3+s' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-475', 'VER');

	    if ($prev_tag1 == 'VER' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-480', 'VER');

	    if ($prev_tag1 == 'DET')
		self::returnRule($target_index, '110-485', 'VER');

	    if ($prev_tag1 == 'VER' && $this_pp['features'] == 'VER:ger+pres')
		self::returnRule($target_index, '110-486', 'VER');	    
	}

	if ($prev_tag2 == 'NOUN')
	{
	    if ($prev_tag1 == 'PRE' && ($this_tag == 'NPR' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-490', 'NPR');

	    if ($prev_tag1 == 'PRE' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-495', 'NOUN');

	    if ($prev_tag1 == 'PRO' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-500', 'VER');

	    if ($prev_tag1 == 'ADJ')
		self::returnRule($target_index, '110-505', 'PRO');

	    if ($prev_pp_1['form'] == '/' && $this_tag == 'NOUN')
		self::returnRule($target_index, '110-507', 'NOUN');
	}

	if ($prev_tag2 == 'NPR')
	{
	    if ($prev_pp_1['features'] == 'PON:sep' && $this_tag == 'NPR')
		self::returnRule($target_index, '110-509', 'NPR');
	}

	if ($prev_tag2 == 'VER')
	{
	    if ($prev_word1 == 'already' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-525', 'VER');

	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-530', 'NOUN');

	    if ($prev_pp_1['features'] != 'ADV:qty')
	    {
		if ($prev_tag1 == 'ADV' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		{
		    self::returnRule($target_index, '110-540', 'VER');
		}
	    }

	    if ($prev_tag1 == 'ADV' && $this_tag == 'NPR')
		self::returnRule($target_index, '110-546', 'NPR', -1);

	    if ($prev_tag1 == 'ART' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-550', 'NOUN');

	    if ($prev_tag1 == 'ART' && ($this_tag == 'UNK' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-555', 'NOUN');

	    if ($prev_tag1 == 'ART' && ($this_tag == 'ADV' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-560', 'ADJ');

	    if ($prev_tag1 == 'ARTPRE' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-565', 'NOUN');

	    if ($prev_tag1 == 'DET' && ($this_tag == 'ADV' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-570', 'ADV');

	    if ($prev_tag1 == 'DET' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-575', 'NOUN');

	    if ($prev_tag1 == 'PRE' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-580', 'NOUN');

	    if ($prev_tag1 == 'PRO' && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-585', 'VER');

	    if ($prev_tag1 == "PRE" && ($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-590', 'NOUN');

	    if ($prev_tag1 == 'VER' && ($this_tag == 'ART' || $this_tag == 'UNK'))
		self::returnRule($target_index, '110-595', 'ART');

	    if ($prev_tag1 == 'NPR')
		self::returnRule($target_index, '110-600', 'NPR');
	    
	    if ($prev_pp_2['features'] == 'VER:ger+pres' && $prev_word1 == 'it' && $this_tag == 'ADJ')
		self::returnRule($target_index, '110-605', 'ADJ');
	}

    }


    /**
     * 011 the first one to define, second and third well defined
     * @param int $target_index
     * @param array $this_pp
     * @param array $next_pp_1
     * @param array $next_pp_2
     * @param boolean $dbgme
     */
    public static function rulesPattern011($target_index, $this_pp, $next_pp_1, $next_pp_2, $dbgme = false)
    {

	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];

	$nextword1 = $next_pp_1['form'];
	$next_tag1 = $next_pp_1['sh-feat']; // unica 2

	$nextword2 = $next_pp_2['form'];
	$next_tag2 = $next_pp_2['sh-feat']; // unica 2

	if ($dbgme)
	    echox("----- " . __LINE__ . " rulesPattern011 011 with $this_word ($this_tag dubious), $nextword1 ($next_tag1), $nextword2 ($next_tag2)");

	NaiMyThoughts::collect(__CLASS__, __METHOD__, "with $this_word ($this_tag dubious), $nextword1 ($next_tag1), $nextword2 ($next_tag2)");

	if ($next_tag2 == 'ADJ')
	{
	    if ($next_tag1 == 'ADJ')
		self::returnRule($target_index, '011-20', 'NOUN');

	    if ($next_tag1 == 'CON')
		self::returnRule($target_index, '011-25', 'ADJ');

	    if ($next_tag1 == 'DET')
		self::returnRule($target_index, '011-30', 'VER');
	}

	if ($next_tag2 == 'ADV')
	{
	    if ($this_word == '1' && $next_tag1 == 'VER')
		self::returnRule($target_index, '011-35', 'DET');

	    if ($this_word == '1' && $next_tag1 == 'CON')
		self::returnRule($target_index, '011-40', 'DET');

	    if ($this_word == 'stata' && $next_tag1 == 'NOUN')
		self::returnRule($target_index, '011-45', 'VER');

	    if ($next_tag1 == 'VER')
		self::returnRule($target_index, '011-50', 'PRO');
	}

	if ($next_tag2 == 'DET')
	{
	    if ($next_tag1 == 'NOUN')
		self::returnRule($target_index, '011-85', 'PRO');

	    // 12/05/2019 try to exclude part past like 'fatto', 'dato' etc.
	    if ($next_tag1 == 'VER' && !preg_match('/to$/i', $this_word))
		self::returnRule($target_index, '011-90', 'NOUN');

	    if ($next_tag1 == 'ADV')
		self::returnRule($target_index, '011-95', 'PRO');

	    if ($next_tag1 == 'ADV')
		self::returnRule($target_index, '011-100', 'VER');

	    if (($this_tag == 'DET' || $this_tag == 'UNK') && $next_tag1 == 'CON')
		self::returnRule($target_index, '011-105', 'DET');
	}

	if ($next_tag2 == 'NOUN')
	{
	    if ($this_word == 'that' && $next_tag1 == 'DET')
		self::returnRule($target_index, '011-120', 'PRO');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'on')
		self::returnRule($target_index, '011-125', 'VER');

	    if (instr($this_pp['features'], 'part+past') > 0 && $nextword1 == 'for')
		self::returnRule($target_index, '011-130', 'VER');


	    if ($target_index == 0 && ($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ART')
		self::returnRule($target_index, '011-160', 'VER');

	    if (isset($next_pp_2['metadata']['ref']) && in_array('occup', $next_pp_2['metadata']['ref']))
		self::returnRule($target_index, '011-265', 'NPR');
	}

	if ($next_tag2 == 'PON')
	{
	    if ($next_tag1 == 'NOUN')
		self::returnRule($target_index, '011-165', 'DET');

	    if ($next_tag1 == 'NPR')
		self::returnRule($target_index, '011-170', 'NPR');
	}

	if ($next_tag2 == 'PRO')
	{
	    if ($next_tag1 == 'ADV')
		self::returnRule($target_index, '011-195', 'PRO');

	    if ($nextword1 == 'at')
		self::returnRule($target_index, '011-196', 'VER');
	}

	if ($next_tag2 == 'VER')
	{
	    if ($this_pp['features'] == 'VER:ind+pres+3+s' && ($nextword1 == 'to'))
		self::returnRule($target_index, '011-260', 'VER');
	}

    }


    /**
     * 10 the first one well defined, second to define
     * @param int $target_index
     * @param array $prev_pp_1
     * @param array $this_pp
     * @param boolean $dbgme
     */
    public static function rulesPattern10($target_index, $prev_pp_1, $this_pp, $dbgme = false)
    {
	//prevTag1 è la parola unica, this_word quella precedente che viene ripulita

	$prev_word1 = $prev_pp_1['form'];
	$prev_tag1 = $prev_pp_1['sh-feat'];

	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];

	if ($dbgme)
	    echox("----- " . __LINE__ . " rulesPattern10 10 with $prev_word1 ($prev_tag1), $this_word ($this_tag dubious)");

	NaiMyThoughts::collect(__CLASS__, __METHOD__, "with $prev_word1 ($prev_tag1), $this_word ($this_tag dubious)");

	// formulo le combinazioni BASILARI ART-NOUN tra stessi sessi. SONO
	if ($prev_pp_1['features'] == 'ART-M:s' && $this_pp['features'] == 'NOUN-m:s')
	    self::returnRule($target_index, '10-0', 'NOUN-m:s');
	if ($prev_pp_1['features'] == 'ART-M:p' && $this_pp['features'] == 'NOUN-m:p')
	    self::returnRule($target_index, '10-5', 'NOUN-m:p');
	if ($prev_pp_1['features'] == 'ART-F:s' && $this_pp['features'] == 'NOUN-f:s')
	    self::returnRule($target_index, '10-10', 'NOUN-f:s');
	if ($prev_pp_1['features'] == 'ART-F:p' && $this_pp['features'] == 'NOUN-f:p')
	    self::returnRule($target_index, '10-15', 'NOUN-f:p');

	// formulo le combinazioni BASILARI di esclusione ART-NOUN tra maschili e femminili
	if ($prev_pp_1['features'] == 'ART-M:s' && $this_pp['features'] == 'NOUN-f:s')
	    self::returnRule($target_index, '10-30', 'NOUN-f:s', - 2);
	if ($prev_pp_1['features'] == 'ART-M:p' && $this_pp['features'] == 'NOUN-f:s')
	    self::returnRule($target_index, '10-35', 'NOUN-f:s', - 2);

	if ($prev_pp_1['features'] == 'ART-M:s' && $this_pp['features'] == 'NOUN-f:p')
	    self::returnRule($target_index, '10-40', 'NOUN-f:p', - 2);
	if ($prev_pp_1['features'] == 'ART-M:p' && $this_pp['features'] == 'NOUN-f:p')
	    self::returnRule($target_index, '10-45', 'NOUN-f:p', - 2);

	if ($prev_pp_1['features'] == 'ART-F:s' && $this_pp['features'] == 'NOUN-m:s')
	    self::returnRule($target_index, '10-50', 'NOUN-m:s', - 2);
	if ($prev_pp_1['features'] == 'ART-F:p' && $this_pp['features'] == 'NOUN-m:s')
	    self::returnRule($target_index, '10-55', 'NOUN-m:s', - 2);

	if ($prev_pp_1['features'] == 'ART-F:s' && $this_pp['features'] == 'NOUN-m:p')
	    self::returnRule($target_index, '10-60', 'NOUN-m:p', - 2);
	if ($prev_pp_1['features'] == 'ART-F:p' && $this_pp['features'] == 'NOUN-m:p')
	    self::returnRule($target_index, '10-65', 'NOUN-m:p', - 2);

	if (instr($prev_pp_1['features'], 'VER:impr+pres+2') > 0 && instr($this_pp['features'], 'PPAST:part+past') > 0)
	    self::returnRule($target_index, '10-70', 'PPAST:part+past+m+s', - 2);

	if ($prev_word1 == 'going' && $this_tag == 'NOUN')
	    self::returnRule($target_index, '10-85', 'NOUN', - 1);

	if ($prev_word1 == 'into' && $this_tag == 'NOUN')
	    self::returnRule($target_index, '10-86', 'NOUN', 1);

	if ($prev_word1 == 'are' && $this_pp['features'] == 'VER:ger+pres')
	    self::returnRule($target_index, '10-90', 'VER');

	if (preg_match('/^(the|this|those|her)$/i', $prev_word1) && ($this_tag == 'VER' || $this_tag == 'PPAST'))
	    self::returnRule($target_index, '10-95', 'VER', -2);

	if (preg_match('/^(the|this|that|those)$/i', $prev_word1) && ($this_tag == 'UNK'))
	    self::returnRule($target_index, '10-100', 'NOUN');

	if (preg_match('/^(may|might|can|gonna|wanna)$/i', $prev_word1) && ($this_tag == 'VER' || $this_tag == 'PPAST'))
	    self::returnRule($target_index, '10-105', 'VER', 3);

	if ($prev_word1 == 'of' && ($this_tag == 'VER' || $this_tag == 'PPAST'))
	    self::returnRule($target_index, '10-110', 'VER', - self::$score_two_terms);


	if ($prev_word1 == 'a' && ($this_tag == 'VER' || $this_tag == 'PPAST'))
	    self::returnRule($target_index, '10-115', 'VER', - self::$score_two_terms);

	if (preg_match('/^(the|my|your|him|them)$/i', $prev_word1) && ($this_tag == 'VER' || $this_tag == 'PPAST'))
	    self::returnRule($target_index, '10-120', 'VER', - self::$score_two_terms);

	if ($prev_word1 == 'in' && ($this_tag == 'VER' || $this_tag == 'PPAST'))
	    self::returnRule($target_index, '10-125', 'VER', - self::$score_two_terms);

	if (preg_match('/^(gonna|could|should|would)$/i', $prev_word1) && $this_tag == 'VER')
	    self::returnRule($target_index, '10-127', 'VER');
	if (preg_match('/^(was)$/i', $prev_word1) && $this_pp['features'] == 'VER:ger+pres')
	    self::returnRule($target_index, '10-128', 'VER');

	if ($prev_word1 == 'inside' && ($this_tag == 'VER' || $this_tag == 'PPAST'))
	    self::returnRule($target_index, '10-130', 'VER', -50);

	if (preg_match('/^(good|nice)$/i', $prev_word1))
	    self::returnRule($target_index, '10-135', 'VER', -3);

	if ($prev_word1 == 'i')
	    self::returnRule($target_index, '10-140', 'VER', 3);

	if ($prev_word1 == 'you')
	    self::returnRule($target_index, '10-145', 'VER');

	if ($prev_word1 == 'he')
	    self::returnRule($target_index, '10-150', 'VER');

	if ($prev_word1 == 'she')
	    self::returnRule($target_index, '10-155', 'VER');

	if ($prev_word1 == 'it' && $this_pp['features'] != 'VER:inf+pres')
	    self::returnRule($target_index, '10-160', 'VER');

	if ($prev_word1 == 'it' && $this_pp['features'] != 'VER:inf+pres')
	    self::returnRule($target_index, '10-161', 'ADJ');
	
	if ($prev_word1 == 'with')
	    self::returnRule($target_index, '10-165', 'VER', - 3);

	if ($prev_word1 == 'every')
	    self::returnRule($target_index, '10-170', 'VER', - 3);

	if ($prev_word1 == 'each')
	    self::returnRule($target_index, '10-175', 'VER', - 3);

	if ($prev_word1 == 'in')
	    self::returnRule($target_index, '10-180', 'VER', - 3);

	if ($prev_word1 == 'enough')
	    self::returnRule($target_index, '10-185', 'VER', - 3);

	if ($prev_word1 == 'who')
	    self::returnRule($target_index, '10-190', 'VER', self::$score_three_terms);
	if ($prev_word1 == 'who')
	    self::returnRule($target_index, '10-191', 'PPAST', self::$score_three_terms);

	if ($prev_word1 == 'to')
	    self::returnRule($target_index, '10-195', 'VER', 5);

//	if ($prev_word1 == 'be')    self::returnRule($target_index, '10-200', 'VER');

	if ($prev_word1 == 'we')
	    self::returnRule($target_index, '10-205', 'VER');

	if ($prev_word1 == 'us')
	    self::returnRule($target_index, '10-210', 'VER');

	if ($prev_word1 == 'they')
	    self::returnRule($target_index, '10-215', 'VER');

	if ($prev_word1 == 'wanna')
	    self::returnRule($target_index, '10-217', 'VER');


	if ($prev_word1 == 'without')
	    self::returnRule($target_index, '10-220', 'VER', -10);

	if ($prev_word1 == 'without')
	    self::returnRule($target_index, '10-225', 'PPAST', -10);

	if (($this_tag == 'ADJ' || $this_tag == 'UNK'))
	{
	    if ($prev_word1 == 'all')
		self::returnRule($target_index, '10-230', 'ADJ');
	}

	if (($this_tag == 'NOUN' || $this_tag == 'UNK'))
	{
	    if ($prev_word1 == 'this')
		self::returnRule($target_index, '10-235', 'NOUN');

	    if ($prev_word1 == 'that')
		self::returnRule($target_index, '10-240', 'NOUN');

	    if ($prev_word1 == 'those')
		self::returnRule($target_index, '10-245', 'NOUN');
	}

	if (($this_tag == 'VER' || $this_tag == 'UNK'))
	{
	    if ($prev_word1 == 'non')
		self::returnRule($target_index, '10-250', 'VER');

	    if ($prev_word1 == 'already')
		self::returnRule($target_index, '10-255', 'VER');

	    if ($prev_word1 == 'had')
		self::returnRule($target_index, '10-265', 'VER');

	    if ($prev_word1 == 'if')
		self::returnRule($target_index, '10-270', 'VER');

	    if ($prev_word1 == 'more')
		self::returnRule($target_index, '10-275', 'VER', - 2);

	    if ($prev_word1 == 'less')
		self::returnRule($target_index, '10-280', 'VER', - 2);

	    if ($prev_word1 == 'is')
		self::returnRule($target_index, '10-281', 'ADJ', 3);
	}

	if (instr($prev_pp_1['features'], 'impr+pres+2+p') > 0 && $this_tag == 'VER')
	    self::returnRule($target_index, '10-290', 'VER');

	if ($prev_pp_1['features'] == 'PRO-INDEF-M-S' && $this_tag == 'VER')
	    self::returnRule($target_index, '10-295', 'VER');
	
	if ($prev_word1 == 'in')
	    self::returnRule($target_index, '10-385', 'VER', - 3);

	if ($prev_word1 == 'I')
	    self::returnRule($target_index, '10-406', 'VER');

	if ($prev_word1 == 'you')
	    self::returnRule($target_index, '10-411', 'VER');

	if ($prev_word1 == 'she')
	    self::returnRule($target_index, '10-416', 'VER');

	if ($prev_word1 == 'we')
	    self::returnRule($target_index, '10-421', 'VER');

	if ($prev_word1 == 'they')
	    self::returnRule($target_index, '10-431', 'VER');

	if ($prev_word1 == 'in')
	    self::returnRule($target_index, '10-435', 'NOUN');

	if ($prev_word1 == 'keep' && ($this_pp['features'] == 'VER:ger+pres'))
	    self::returnRule($target_index, '10-466', 'VER');

	if (instr($this_pp['features'], 'ind+pres') == 0 && instr($this_pp['features'], 'sub+pres') == 0)
	{
	    if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+2+s') > 0)
		self::returnRule($target_index, '10-470', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+3+s') > 0)
		self::returnRule($target_index, '10-475', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+1+p') > 0)
		self::returnRule($target_index, '10-480', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+2+p') > 0)
		self::returnRule($target_index, '10-485', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+3+p') > 0)
		self::returnRule($target_index, '10-490', 'VER', -10);

	    if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+1+s') > 0)
		self::returnRule($target_index, '10-500', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+3+s') > 0)
		self::returnRule($target_index, '10-505', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+1+p') > 0)
		self::returnRule($target_index, '10-510', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+2+p') > 0)
		self::returnRule($target_index, '10-515', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+3+p') > 0)
		self::returnRule($target_index, '10-520', 'VER', -10);

	    if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+1+s') > 0)
		self::returnRule($target_index, '10-525', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+2+s') > 0)
		self::returnRule($target_index, '10-530', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+1+p') > 0)
		self::returnRule($target_index, '10-535', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+2+p') > 0)
		self::returnRule($target_index, '10-540', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+3+p') > 0)
		self::returnRule($target_index, '10-545', 'VER', -10);


	    if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+2+p') > 0)
		self::returnRule($target_index, '10-550', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+3+p') > 0)
		self::returnRule($target_index, '10-555', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+1+s') > 0)
		self::returnRule($target_index, '10-560', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+2+s') > 0)
		self::returnRule($target_index, '10-565', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+3+s') > 0)
		self::returnRule($target_index, '10-570', 'VER', -10);

	    if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+1+p') > 0)
		self::returnRule($target_index, '10-575', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+3+p') > 0)
		self::returnRule($target_index, '10-580', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+1+s') > 0)
		self::returnRule($target_index, '10-585', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+2+s') > 0)
		self::returnRule($target_index, '10-590', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+3+s') > 0)
		self::returnRule($target_index, '10-595', 'VER', -10);

	    if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+1+p') > 0)
		self::returnRule($target_index, '10-600', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+2+p') > 0)
		self::returnRule($target_index, '10-605', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+1+s') > 0)
		self::returnRule($target_index, '10-610', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+2+s') > 0)
		self::returnRule($target_index, '10-615', 'VER', -10);
	    if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+3+s') > 0)
		self::returnRule($target_index, '10-620', 'VER', -10);
	}

	if ($prev_tag1 == 'ADJ')
	{
	    if ($this_pp['features'] == 'VER:ind+pres+3+s')
		self::returnRule($target_index, '10-726', 'NOUN', 2);
	}

	if ($prev_tag1 == 'ADV')
	{
	    if ($prev_pp_1['features'] != 'ADV:qty' && $prev_pp_1['features'] != 'ADV:how')
		if ($this_tag == 'NOUN')
		    self::returnRule($target_index, '10-785', 'NOUN', - self::$score_two_terms);
	}

	if ($prev_tag1 == 'ART')
	{
	    if ($this_tag == 'UNK')
		self::returnRule($target_index, '10-795', 'NOUN');

	    if ($this_tag == 'DET')
		self::returnRule($target_index, '10-800', 'DET');

	    if ($this_tag == 'NUM')
		self::returnRule($target_index, '10-802', 'NUM');
	}

	if ($prev_tag1 == 'ARTPRE')
	{
	    if ($this_tag == 'NOUN')
		self::returnRule($target_index, '10-805', 'NOUN', 1);
	}

	if ($prev_tag1 == 'NUM' || $prev_tag1 == 'DET' || $prev_tag1 == 'AMOUNT')
	{
	    if ($this_tag == 'NOUN')
		self::returnRule($target_index, '10-910', 'NOUN');

	    // dopo di un numero generalmente non può esserci un ver!
	    if ($this_tag == 'PPAST' || $this_tag == 'UNK')
		self::returnRule($target_index, '10-915', 'NOUN');
	}

	if ($prev_tag1 == 'PRO')
	{
	    if (($this_tag == 'VER' || $this_tag == 'UNK'))
		self::returnRule($target_index, '10-1010', 'ADV');
	}

	if ($prev_tag1 == 'VER')
	{
	    if (!preg_match('/(can|be)/ui', $prev_word1) && $prev_pp_1['features'] == 'VER:inf+pres' && $this_tag == 'NOUN')
		self::returnRule($target_index, '10-1056', 'NOUN', .4);
	}

    }


    /**
     * 01 the first one to define, second well defined
     * @param int $target_index
     * @param array $this_pp
     * @param array $next_pp_1
     * @param boolean $dbgme
     */
    public static function rulesPattern01($target_index, $this_pp, $next_pp_1, $dbgme = false)
    {
	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];

	$nextword1 = $next_pp_1['form'];
	$next_tag1 = $next_pp_1['sh-feat']; // unica 2
	// nextTag1 è la parola unica, this_word quella precedente che viene ripulita
	if ($dbgme)
	    echox("----- " . __LINE__ . " rulesPattern01 01 with $this_word ($this_tag dubious), $nextword1 ($next_tag1)");

	NaiMyThoughts::collect(__CLASS__, __METHOD__, "with $this_word ($this_tag dubious), $nextword1 ($next_tag1)");

	if ($this_word == 'may' && $nextword1 == 'be')
	    self::returnRule($target_index, '01-5', 'VER');

	if ($next_tag1 == 'PRE')
	{
	    if ($this_pp['features'] == 'VER:ger+pres')
		self::returnRule($target_index, '01-10', 'VER');
	}

//	if ($next_tag1 == 'PRO')
//	{
//	    if ($this_tag == 'VER')
//		self::returnRule($target_index, '01-15', 'VER');
//	}
	
	if ($next_tag1 == 'NOUN')
	{
	    if (isset($next_pp_1['metadata']['ref']) && in_array('occup', $next_pp_1['metadata']['ref']))
		self::returnRule($target_index, '01-20', 'NPR');
	}

	if ($next_tag1 == 'VER')
	{
	    if ($this_word == 'can')
		self::returnRule($target_index, '01-25', 'VER', 5);
	}

	if ($nextword1 == 'it')
	    self::returnRule($target_index, '01-30', 'VER', .1);

    }

}

// and class definition
if (!class_exists('NaiPosTagger\\PosTagging\\NaiBrillsRulesTrait'))
{

    class NaiBrillsRulesTrait extends PosBrillsRules
    {

	use BrillsRulesTrait;

    }

}

