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

/**
 * Rules for english language.
 *
 */


if (!trait_exists('NaiPosTagger\\PosTagging\\BrillsRulesTrait', FALSE)) {
trait BrillsRulesTrait {
    
    // 101 first and third well defined, middle to define
    public static function rulesPattern101($target_index, $prev_pp_1, $this_pp, $next_pp_1, $dbgme = false)
    {
	$prev_word1 = $prev_pp_1['form'];
	$prev_tag1 = $prev_pp_1['sh-feat']; // unica 1
		
	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];
	
	$nextword1 = $next_pp_1['form'];
	$next_tag1 = $next_pp_1['sh-feat']; // unica 2

	if ($dbgme)
	    echox("----- ".__LINE__." rulesPattern101 with $prev_word1 ($prev_tag1), $this_word ($this_tag to define), $nextword1 ($next_tag1)");

	if ($prev_word1 == 'also' && ($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'PRE')    self::returnRule($target_index, 1, 'ADV');
	
	if ($prev_word1 == 'also' && ($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')    self::returnRule($target_index, 2, 'ADV');
	
	
	if ($prev_word1 == 'in' && ($this_tag == 'NOUN' || $this_tag == 'UNK') && $nextword1 == 'un')    self::returnRule($target_index, 3, 'NOUN');
	if ($prev_word1 == 'wich' && ($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')    self::returnRule($target_index, 4, 'NOUN');
	
	if ($prev_word1 == 'if' && ($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'PRO')    self::returnRule($target_index, 5, 'ADV');
	
	if ($prev_tag1 == 'SENT' && $this_word == 'this' && $next_tag1 == 'VER')    self::returnRule($target_index, 6, 'PRO');


	if ($prev_word1 == 'as' && ($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'NOUN') self::returnRule($target_index, 7, 'NOUN');
	

	if ($prev_tag1 == 'ADJ')
	{

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')   self::returnRule($target_index, 8, 'VER');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ADJ')   self::returnRule($target_index, 9, 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')   self::returnRule($target_index, 10, 'NOUN');
	    
	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')   self::returnRule($target_index, 11, 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRO')   self::returnRule($target_index, 12, 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PON') self::returnRule($target_index, 13, 'NOUN');
	}

	if ($prev_tag1 == 'ADV')
	{
	    if ($this_word == 'new' && $next_tag1 == 'DET')    self::returnRule($target_index, 14, 'ADJ');

	    if ($this_word == 'too' && $next_tag1 == 'ADJ')    self::returnRule($target_index, 15, 'DET');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'DET') self::returnRule($target_index, 16, 'VER');
	    
	    if ($next_tag1 == 'VER')	    self::returnRule($target_index, 17, 'NOUN');

	}
        
	if ($prev_tag1 == 'ART')
	{
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ADJ')    self::returnRule($target_index, 18, 'ADJ');
	
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'VER') self::returnRule($target_index, 19, 'NOUN');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NOUN') self::returnRule($target_index, 20, 'ADJ');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NUM') self::returnRule($target_index, 21, 'ADJ');
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'AMOUNT') self::returnRule($target_index, 22, 'ADJ');
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'DET') self::returnRule($target_index, 23, 'ADJ');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'VER') self::returnRule($target_index, 24, 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ADJ') self::returnRule($target_index, 25, 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ART')  self::returnRule($target_index, 26, 'NOUN');

	    if (($this_tag == 'PRO' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')   self::returnRule($target_index, 27, 'DET');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PRE')  self::returnRule($target_index, 28, 'NOUN');
	    
	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')  self::returnRule($target_index, 29, 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ART')   self::returnRule($target_index, 30, 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'CON')   self::returnRule($target_index, 31, 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ADV')   self::returnRule($target_index, 32, 'VER');
	}
	
	if ($prev_tag1 == 'ARTPRE')
	{
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NOUN') self::returnRule($target_index, 33, 'ADJ');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE') self::returnRule($target_index, 34, 'NOUN');
	    
	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE') self::returnRule($target_index, 35, 'NOUN');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, 36, 'NOUN');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ART')   self::returnRule($target_index, 37, 'NOUN');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PON')   self::returnRule($target_index, 38, 'NOUN');

	}
		
	if ($prev_tag1 == 'CON')
	{
	    if ($nextword1 == 'it')	    self::returnRule($target_index, 39, 'VER');
	
	    if ($next_tag1 == 'VER')	    self::returnRule($target_index, 40, 'PRO');

	    if (instr($this_pp['features'], 'part+past') > 0 && $next_tag1 == 'ART')   self::returnRule($target_index, 41, 'VER');
	    
	}

	if ($prev_tag1 == 'DET')
	{
	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'DET') self::returnRule($target_index, 42, 'VER');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ADJ') self::returnRule($target_index, 43, 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == "PRE")   self::returnRule($target_index, 44, 'NOUN');

	    if ($next_tag1 == 'NOUN')	    self::returnRule($target_index, 45, 'VER');

	    if ($next_tag1 == 'ADV')	    self::returnRule($target_index, 46, 'NOUN');

	    if ($next_tag1 == 'NOUN')	    self::returnRule($target_index, 47, 'ADJ');

	    if ($next_tag1 == 'DET')	    self::returnRule($target_index, 48, 'NOUN');

	    if ($next_tag1 == 'PRO')	    self::returnRule($target_index, 49, 'NOUN');

	    if ($next_tag1 == 'VER')	    self::returnRule($target_index, 50, 'NOUN');
	    
	}

	if ($prev_tag1 == 'INT')
	{
	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PRO')    self::returnRule($target_index, 51, 'VER');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PON')   self::returnRule($target_index, 52, 'VER');
	
	}
	
	if ($prev_tag1 == 'NOUN')
	{
	    if ($this_word == 'x' && $next_tag1 == 'NOUN')    self::returnRule($target_index, 53, 'ADV');

	    if ($this_word == 'for' && $next_tag1 == 'ART')    self::returnRule($target_index, 54, 'PRE');
	    
	    if ($this_word == 'may' && $next_tag1 == 'VER')    self::returnRule($target_index, 55, 'VER');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PRE')  self::returnRule($target_index, 56, 'ADJ');

	    if (($this_tag == 'NPR' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')   self::returnRule($target_index, 57, 'ARTPRE');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PRO')   self::returnRule($target_index, 58, 'ADJ');

	    if ($next_tag1 == 'DET')	    self::returnRule($target_index, 59, 'VER');
	}
	
	if ($prev_tag1 == 'NPR')
	{
	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ADV') self::returnRule($target_index, 60, 'VER');
            
	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE') self::returnRule($target_index, 61, 'VER');
	    
            if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PON') self::returnRule($target_index, 62, 'NOUN', 0.1);
	    
            if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'SENT') self::returnRule($target_index, 63, 'VER');
	    
	    if ($next_tag1 == 'PON')	    self::returnRule($target_index, 64, 'NPR');

	    if ($next_tag1 == 'NPR')	    self::returnRule($target_index, 65, 'NPR');

	    if ($next_tag1 == 'NPR')	    self::returnRule($target_index, 66, 'NPR');

	    if ($next_tag1 == 'DET')	    self::returnRule($target_index, 67, 'VER');

	}

	if ($prev_tag1 == 'NUM' || $prev_tag1 == 'DET' || $prev_tag1 == 'AMOUNT')
	{
	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'CON')   self::returnRule($target_index, 68, 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')   self::returnRule($target_index, 69, 'NOUN');

	}
	
	if ($prev_tag1 == 'PON')
	{
	    
	}
	
	if ($prev_tag1 == 'PRE')
	{
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NPR')  self::returnRule($target_index, 70, 'ADJ');

	    if (($this_tag == 'NPR' || $this_tag == 'UNK') && $next_tag1 == "SENT")  self::returnRule($target_index, 71, 'NPR');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == "PRE")  self::returnRule($target_index, 72, 'NOUN');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == "PRO")  self::returnRule($target_index, 73, 'VER');

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'VER')  self::returnRule($target_index, 74, 'ADV');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')  self::returnRule($target_index, 75, 'ADJ');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'NPR')  self::returnRule($target_index, 76, 'ADJ');
	    
	}

	if ($prev_tag1 == 'PON')
	{
	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'VER')   self::returnRule($target_index, 77, 'ADV');
	
	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')   self::returnRule($target_index, 78, 'NOUN');

	}
	
	if ($prev_tag1 == 'PRO')
	{
	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')  self::returnRule($target_index, 79, 'VER');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'VER')  self::returnRule($target_index, 80, 'NOUN');
	    
	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRO')  self::returnRule($target_index, 81, 'NOUN');
	   
	    if ($next_tag1 == 'DET')	    self::returnRule($target_index, 82, 'VER');

	}
	
	if ($prev_tag1 == 'SMI')
	{
	    
	}
	
	if ($prev_tag1 == 'VER')
	{
	    if ($next_tag1 == 'ADJ')	    self::returnRule($target_index, 83, 'ARTPRE');

	    if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, 84, 'VER');
	
	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'VER')   self::returnRule($target_index, 85, 'ADV');

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, 86, 'ADV');

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'PRE')   self::returnRule($target_index, 87, 'ADV');
	   
	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')   self::returnRule($target_index, 88, 'VER');

	    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'SMI')   self::returnRule($target_index, 89, 'ADV');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'SENT') self::returnRule($target_index, 90, 'NOUN');

	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, 91, 'VER');
	    
	    if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, 92, 'PPAST');

	    if ($next_tag1 == 'NOUN')	    self::returnRule($target_index, 93, 'ADV');
	    
	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ADJ') self::returnRule($target_index, 94, 'ARTPRE');
	}

    }


    
    // 110 first and second well defined, third to define
    public static function rulesPattern110($target_index, $prev_pp_2, $prev_pp_1, $this_pp, $dbgme = false)
    {
	$prev_word1 = $prev_pp_1['form'];
	$prev_tag1 = $prev_pp_1['sh-feat'];
	
	$prev_word2 = $prev_pp_2['form'];
	$prev_tag2 = $prev_pp_2['sh-feat'];
		
	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];
	
	if ($dbgme)
	    echox("----- ".__LINE__." rulesPattern 110 with $prev_word2 ($prev_tag2), $prev_word1 ($prev_tag1), $this_word ($this_tag to define)");
	

	if (instr($prev_pp_2['features'], 'PRO-PERS-CLI') > 0 && instr($prev_pp_1['features'], 'VER:ind+pres') > 0 && $this_tag == 'NPR')    self::returnRule($target_index, 95, 'NPR');
	
	if (instr($prev_pp_2['features'], 'VER:cond') > 0 && $prev_word1 == 'already' && instr($this_pp['features'], 'PPAST:pos+s+m') > 0)    self::returnRule($target_index, 96, 'PPAST');
	
	if ($prev_pp_2['lemma'] == 'have' && $prev_word1 == 'to' && ($this_tag == 'VER' || $this_tag == 'UNK'))    self::returnRule($target_index, 97, 'VER',5);
	
	if ($prev_word2 == 'and' && $prev_tag1 == 'ADV' && ($this_tag == 'VER' || $this_tag == 'UNK'))    self::returnRule($target_index, 98, 'VER');
	
	if ($prev_word2 == 'how' && $prev_word1 == 'to' && ($this_tag == 'VER' || $this_tag == 'UNK'))    self::returnRule($target_index, 99, 'VER', 3);
	
	if ($prev_word2 == 'and' && $prev_word1 == 'the' && ($this_tag == 'VER' || $this_tag == 'UNK'))    self::returnRule($target_index, 100, 'NOUN');
	
	if ($prev_word2 == 'for' && $prev_word1 == 'your' && ($this_tag == 'VER' || $this_tag == 'UNK'))    self::returnRule($target_index, 361, 'NOUN');
        
	
	
	if ($prev_word2 == 'do' && $prev_word1 == 'not' && ($this_tag == 'VER' || $this_tag == 'UNK'))    self::returnRule($target_index, 101, 'VER');
	
	if ($prev_word2 == 'and' && $prev_word1 == 'if' && ($this_tag == 'VER' || $this_tag == 'UNK'))    self::returnRule($target_index, 102, 'VER');
	
	  
	if ($prev_tag2 == 'ADJ')
	{
	    if ($prev_tag1 == 'PON' && $this_word == 'what')    self::returnRule($target_index, 103, 'PRO');

	    if ($prev_tag1 == 'PRO')    self::returnRule($target_index, 104, 'VER');
	    
	    if ($prev_tag1 == 'VER')	    self::returnRule($target_index, 105, 'VER');
	}
	
	if ($prev_tag2 == 'ADV')
	{
	    if ($prev_tag1 == 'PRO' && $this_word == 'what')    self::returnRule($target_index, 106, 'PRO');

	    if ($prev_tag1 == 'VER' && ($this_tag == 'ADV' || $this_tag == 'UNK'))   self::returnRule($target_index, 107, 'ADV');

	    if ($prev_tag1 == 'ADV' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, 108, 'ARTPRE');

	    if ($prev_tag1 == 'ART' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, 109, 'NOUN');

	    if ($prev_tag1 == 'PRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, 110, 'NOUN');	
	    
	    if ($prev_tag1 == 'ARTPRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, 111, 'NOUN');	

	    if ($prev_tag1 == 'DET')    self::returnRule($target_index, 112, 'NOUN');

	    if ($prev_tag1 == 'NOUN')   self::returnRule($target_index, 113, 'DET');
	
	}
	
	if ($prev_tag2 == 'ART')
	{
	    if ($prev_tag1 == 'VER' && instr($this_pp['features'], 'PPAST') > 0)	    self::returnRule($target_index, 114, 'PPAST');

	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, 115, 'NOUN');

	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))   self::returnRule($target_index, 116, 'NOUN');

	    if ($prev_tag1 == 'DET' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, 117, 'NOUN');

	    
	    if (left($prev_pp_1['features'], 2) == ':s' && left($this_pp['features'], 2) == '+p')   self::returnRule($target_index, 118, $this_tag,-20);
	    
	    if (left($prev_pp_1['features'], 2) == ':p' && left($this_pp['features'], 2) == '+s')   self::returnRule($target_index, 119, $this_tag,-20);
	    

	    if ($prev_tag1 == 'VER' && ($this_tag == 'ADV' || $this_tag == 'UNK'))   self::returnRule($target_index, 120, 'ADV');
	}

	if ($prev_tag2 == 'CON')
	{

	}
	
	if ($prev_tag2 == 'DET')
	{
	    if ($prev_tag1 == 'VER')	 self::returnRule($target_index, 121, 'NOUN');

	    if ($prev_tag1 == 'NOUN' && instr($this_pp['features'], 'PPAST') > 0)	    self::returnRule($target_index, 122, 'PPAST');

	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, 123, 'NOUN');

	    if ($prev_tag1 == 'PRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, 124, 'NOUN');

	    if ($prev_tag1 == 'NOUN' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, 125, 'ADJ');

	}	
	
	if ($prev_tag2 == 'PRE')
	{
	    if ($prev_tag1 == 'ART' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, 126, 'NOUN');

	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, 127, 'NOUN');

	    if ($prev_tag1 == 'NOUN' && ($this_tag == 'ARTPRE' || $this_tag == 'UNK'))   self::returnRule($target_index, 128, 'ARTPRE');

	    if ($prev_tag1 == "PRO" && ($this_tag == 'ADV' || $this_tag == 'UNK'))   self::returnRule($target_index, 129, 'NOUN');

	    if ($prev_tag1 == 'VER' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, 130, 'NOUN');
	}
	
	if ($prev_tag2 == 'PRO')
	{
	    if ($prev_tag1 == 'ARTPRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, 131, 'NOUN');

	    if ($prev_tag1 == 'DET' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, 132, 'NOUN');

	    if ($prev_tag1 == 'NOUN' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, 133, 'VER');

	    if ($prev_tag1 == 'VER' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))   self::returnRule($target_index, 134, 'VER');
	    
	    if ($prev_tag1 == 'DET')	    self::returnRule($target_index, 135, 'VER');
	}
	
	if ($prev_tag2 == 'NOUN')
	{
	    if ($prev_tag1 == 'PRE' && ($this_tag == 'NPR' || $this_tag == 'UNK'))    self::returnRule($target_index, 136, 'NPR');

	    if ($prev_tag1 == 'PRE' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))    self::returnRule($target_index, 137, 'NOUN');

	    if ($prev_tag1 == 'PRO' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))	self::returnRule($target_index, 138, 'VER');
	    
	    if ($prev_tag1 == 'ADJ')   self::returnRule($target_index, 139, 'PRO');
	
	}
	
	if ($prev_tag2 == 'VER')
	{
	    if ($prev_word1 == 'already' && ($this_tag == 'VER' || $this_tag == 'UNK'))    self::returnRule($target_index, 140, 'VER');

	    if ($prev_tag1 == 'ADJ' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, 141, 'NOUN');
	    
	    if ($prev_tag1 == 'ADV' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))    self::returnRule($target_index, 142, 'VER');

	    if ($prev_tag1 == 'ADV' && ($this_tag == 'VER' || $this_tag == 'UNK'))    self::returnRule($target_index, 143, 'ADJ');

	    if ($prev_tag1 == 'ART' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, 144, 'NOUN');

	    if ($prev_tag1 == 'ART' && ($this_tag == 'UNK' || $this_tag == 'UNK'))   self::returnRule($target_index, 145, 'NOUN');

	    if ($prev_tag1 == 'ART' && ($this_tag == 'ADV' || $this_tag == 'UNK'))   self::returnRule($target_index, 146, 'ADJ');

	    if ($prev_tag1 == 'ARTPRE' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, 147, 'NOUN');

	    if ($prev_tag1 == 'DET' && ($this_tag == 'ADV' || $this_tag == 'UNK'))    self::returnRule($target_index, 148, 'ADV');

	    if ($prev_tag1 == 'DET' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))    self::returnRule($target_index, 149, 'NOUN');

	    if ($prev_tag1 == 'PRE' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, 150, 'NOUN');

	    if ($prev_tag1 == 'PRO' && ($this_tag == 'VER' || $this_tag == 'UNK'))    self::returnRule($target_index, 151, 'VER');

	    if ($prev_tag1 == "PRE" && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, 152, 'NOUN');	    

	    if ($prev_tag1 == 'VER' && ($this_tag == 'ART' || $this_tag == 'UNK'))    self::returnRule($target_index, 153, 'ART');

	    if ($prev_tag1 == 'NPR')    self::returnRule($target_index, 154, 'NPR');

	}

    }

    
    // 011 first to define, second and third well defined
    public static function rulesPattern011($target_index, $this_pp, $next_pp_1, $next_pp_2, $dbgme = false)
    {
		
	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];
	
	$nextword1 = $next_pp_1['form'];
	$next_tag1 = $next_pp_1['sh-feat']; // unica 2
	
	$nextword2 = $next_pp_2['form'];
	$next_tag2 = $next_pp_2['sh-feat']; // unica 2

	if ($dbgme)
	    echox("----- ".__LINE__." rulesPattern011 011 with $this_word ($this_tag to define), $nextword1 ($next_tag1), $nextword2 ($next_tag2)");


	if($next_tag2 == 'ADJ')
	{
	    if ($next_tag1 == 'ADJ')	    self::returnRule($target_index, 155, 'NOUN');

	    if ($next_tag1 == 'CON')	    self::returnRule($target_index, 156, 'ADJ');

	    if ($next_tag1 == 'DET')	    self::returnRule($target_index, 157, 'VER');	    
	}
	
	if($next_tag2 == 'ADV')
	{
	    if ($this_word == '1' && $next_tag1 == 'VER')	    self::returnRule($target_index, 158, 'DET');

	    if ($this_word == '1' && $next_tag1 == 'CON')	    self::returnRule($target_index, 159, 'DET');

	    if ($next_tag1 == 'VER')	    self::returnRule($target_index, 160, 'PRO');
	}
	
	if($next_tag2 == 'ART')
	{
	    
	}
	
	if($next_tag2 == 'CON')
	{
	    
	}
	
	if($next_tag2 == 'DET')
	{

	    if ($next_tag1 == 'NOUN')	    self::returnRule($target_index, 161, 'PRO');

	    if ($next_tag1 == 'ADV')	    self::returnRule($target_index, 162, 'PRO');

	    if ($next_tag1 == 'ADV')	    self::returnRule($target_index, 163, 'VER');
	    
	    if (($this_tag == 'DET' || $this_tag == 'UNK') && $next_tag1 == 'CON')	    self::returnRule($target_index, 164, 'DET');
	}

	if($next_tag2 == 'NOUN')
	{
	    if ($this_word == 'that' && $next_tag1 == 'DET')    self::returnRule($target_index, 165, 'PRO');

	    if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'on')	    self::returnRule($target_index, 166, 'VER');

	    if (instr($this_pp['features'], 'part+past') > 0 && $nextword1 == 'for')   self::returnRule($target_index, 167, 'VER');

	    if ($target_index == 0 && ($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ART')	    self::returnRule($target_index, 168, 'VER');
	 
	}
	
	if($next_tag2 == 'PON')
	{
	    if ($next_tag1 == 'NOUN')	    self::returnRule($target_index, 169, 'DET');

	    if ($next_tag1 == 'NPR')	    self::returnRule($target_index, 170, 'NPR');
	
	}
	
	if($next_tag2 == 'PRE')
	{
	}
	
	if($next_tag2 == 'PRO')
	{
	    if ($next_tag1 == 'ADV')	    self::returnRule($target_index, 171, 'PRO');
	}
	
	if($next_tag2 == 'VER')
	{
	    if ($this_pp['features'] == 'VER:ind+pres+3+s' && ($nextword1 == 'to'))	    self::returnRule($target_index, 172, 'VER');

	}

    }


    // 10 first well defined, second to define
    public static function rulesPattern10($target_index, $prev_pp_1, $this_pp, $dbgme = false)
    {
	$prev_word1 = $prev_pp_1['form'];
	$prev_tag1 = $prev_pp_1['sh-feat'];
	
	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];
	
	if ($dbgme)
	    echox("----- ".__LINE__." rulesPattern10 10 with $prev_word1 ($prev_tag1), $this_word ($this_tag to define)");
	
	if (preg_match('/^(the|this|that|those)$/i', $prev_word1) && ($this_tag == 'VER' || $this_tag == 'PPAST'))	    self::returnRule($target_index, 173, 'VER', -50);
	
	if (preg_match('/^(the|this|that|those)$/i', $prev_word1) && ($this_tag == 'UNK'))	    self::returnRule($target_index, 174, 'NOUN');
	
	
	if (preg_match('/^(may|might)$/i', $prev_word1) && ($this_tag == 'VER' || $this_tag == 'PPAST'))	    self::returnRule($target_index, 175, 'VER', 3);
	
	if ($prev_word1 == 'of' && ($this_tag == 'VER' || $this_tag == 'PPAST'))	    self::returnRule($target_index, 176, 'VER', - self::$score_two_terms);
	
	if ($prev_word1 == 'a' && ($this_tag == 'VER' || $this_tag == 'PPAST'))	    self::returnRule($target_index, 260, 'VER', - 5);
	
	if ($prev_word1 == 'the' && ($this_tag == 'VER' || $this_tag == 'PPAST'))	    self::returnRule($target_index, 254, 'VER', - self::$score_two_terms);
	
	if ($prev_word1 == 'inside' && ($this_tag == 'VER' || $this_tag == 'PPAST'))	    self::returnRule($target_index, 177, 'VER', -50);
	
	if ($prev_word1 == 'in' && ($this_tag == 'VER' || $this_tag == 'PPAST'))	    self::returnRule($target_index, 178, 'VER', -50);
	
	
	if (preg_match('/^(good|nice)$/i', $prev_word1))	    self::returnRule($target_index, 179, 'VER', -3);
	
	
	if (instr($prev_pp_1['features'], 'PRO-DEMO') > 0)	    self::returnRule($target_index, 180, 'VER', - 30);


	if (instr($prev_pp_1['features'], 'PRO-PERS') > 0)	    self::returnRule($target_index, 181, 'VER', 30);

        
	if ($prev_word1 == 'i')             self::returnRule($target_index, 181, 'VER', 3);

	if ($prev_word1 == 'you')             self::returnRule($target_index, 183, 'VER');

	if ($prev_word1 == 'he')	    self::returnRule($target_index, 184, 'VER');
	
	if ($prev_word1 == 'she')	    self::returnRule($target_index, 185, 'VER');
	
	if ($prev_word1 == 'it')	    self::returnRule($target_index, 186, 'VER');
        
	if ($prev_word1 == 'with')          self::returnRule($target_index, 187, 'VER', - 3);
	
	if ($prev_word1 == 'every')          self::returnRule($target_index, 188, 'VER', - 3);
	if ($prev_word1 == 'each')          self::returnRule($target_index, 189, 'VER', - 3);
	
	if ($prev_word1 == 'in')          self::returnRule($target_index, 190, 'VER', - 3);

	if ($prev_word1 == 'enough')          self::returnRule($target_index, 191, 'VER', - 3);
	
	if ($prev_word1 == 'who')          self::returnRule($target_index, 192, 'VER', self::$score_three_terms);
	
	if ($prev_word1 == 'to')             self::returnRule($target_index, 193, 'VER',5);
	
	if ($prev_word1 == 'be')             self::returnRule($target_index, 194, 'VER');

	if ($prev_word1 == 'we')	    self::returnRule($target_index, 195, 'VER');
	if ($prev_word1 == 'us')	    self::returnRule($target_index, 196, 'VER');

	if ($prev_word1 == 'they')	    self::returnRule($target_index, 197, 'VER');


	if ($prev_word1 == 'without')          self::returnRule($target_index, 198, 'VER', -10);
	if ($prev_word1 == 'without')          self::returnRule($target_index, 200, 'PPAST', -10);
	

	
	// added 01/18, a me sembra che da qua non si scappi. $prev_pp_1 dovrebbero essere solo i VER
	if(instr($this_pp['features'], 'ind+pres') == 0 && instr($this_pp['features'], 'sub+pres') == 0)
	{
	if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+2+s') > 0)		    self::returnRule($target_index, 201, 'VER', -10);
	if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+3+s') > 0)		    self::returnRule($target_index, 201, 'VER', -10);
	if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+1+p') > 0)		    self::returnRule($target_index, 202, 'VER', -10);
	if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+2+p') > 0)		    self::returnRule($target_index, 203, 'VER', -10);
	if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+3+p') > 0)		    self::returnRule($target_index, 204, 'VER', -10);
	
	if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+1+s') > 0)		    self::returnRule($target_index, 205, 'VER', -10);
	if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+3+s') > 0)		    self::returnRule($target_index, 206, 'VER', -10);
	if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+1+p') > 0)		    self::returnRule($target_index, 207, 'VER', -10);
	if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+2+p') > 0)		    self::returnRule($target_index, 208, 'VER', -10);
	if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+3+p') > 0)		    self::returnRule($target_index, 209, 'VER', -10);
	
	if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+1+s') > 0)		    self::returnRule($target_index, 210, 'VER', -10);
	if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+2+s') > 0)		    self::returnRule($target_index, 211, 'VER', -10);
	if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+1+p') > 0)		    self::returnRule($target_index, 212, 'VER', -10);
	if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+2+p') > 0)		    self::returnRule($target_index, 213, 'VER', -10);
	if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+3+p') > 0)		    self::returnRule($target_index, 214, 'VER', -10);

	
	if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+2+p') > 0)		    self::returnRule($target_index, 215, 'VER', -10);
	if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+3+p') > 0)		    self::returnRule($target_index, 216, 'VER', -10);
	if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+1+s') > 0)		    self::returnRule($target_index, 217, 'VER', -10);
	if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+2+s') > 0)		    self::returnRule($target_index, 218, 'VER', -10);
	if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+3+s') > 0)		    self::returnRule($target_index, 219, 'VER', -10);
	
	if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+1+p') > 0)		    self::returnRule($target_index, 220, 'VER', -10);
	if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+3+p') > 0)		    self::returnRule($target_index, 221, 'VER', -10);
	if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+1+s') > 0)		    self::returnRule($target_index, 222, 'VER', -10);
	if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+2+s') > 0)		    self::returnRule($target_index, 223, 'VER', -10);
	if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+3+s') > 0)		    self::returnRule($target_index, 224, 'VER', -10);
	
	if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+1+p') > 0)		    self::returnRule($target_index, 225, 'VER', -10);
	if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+2+p') > 0)		    self::returnRule($target_index, 226, 'VER', -10);
	if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+1+s') > 0)		    self::returnRule($target_index, 227, 'VER', -10);
	if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+2+s') > 0)		    self::returnRule($target_index, 228, 'VER', -10);
	if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+3+s') > 0)		    self::returnRule($target_index, 229, 'VER', -10);
	}

	if(($this_tag == 'ADJ' || $this_tag == 'UNK'))
	{
	    if ($prev_word1 == 'all')	    self::returnRule($target_index, 230, 'ADJ');
	
	}
	
	if(($this_tag == 'NOUN' || $this_tag == 'UNK'))
	{
	    if ($prev_word1 == 'this')	    self::returnRule($target_index, 231, 'NOUN');

	    if ($prev_word1 == 'that')	    self::returnRule($target_index, 232, 'NOUN');

	    if ($prev_word1 == 'those')	    self::returnRule($target_index, 233, 'NOUN');

	}
	
	if(($this_tag == 'VER' || $this_tag == 'UNK'))
	{
	    if ($prev_word1 == 'non')	    self::returnRule($target_index, 234, 'VER');
	    
	    if ($prev_word1 == 'already')	    self::returnRule($target_index, 235, 'VER');

	    if ($prev_word1 == 'have')	    self::returnRule($target_index, 236, 'VER');

	    if ($prev_word1 == 'had')	    self::returnRule($target_index, 237, 'VER');

	    if ($prev_word1 == 'if')	    self::returnRule($target_index, 238, 'VER');
	    
	    if ($prev_word1 == 'more')	    self::returnRule($target_index, 239, 'VER', - 2);
	    
	    if ($prev_word1 == 'less')	    self::returnRule($target_index, 240, 'VER', - 2);
	    
	}
	
	if ($prev_tag1 == 'ADJ')
	{
	}
	
	if ($prev_tag1 == 'ADV')
	{
            if ($this_tag == 'NOUN') self::returnRule($target_index, 241, 'NOUN', - self::$score_two_terms);
	}
	
	if ($prev_tag1 == 'ART')
	{
	    if ($this_tag == 'UNK')	    self::returnRule($target_index, 242, 'NOUN');
	
	    if ($this_tag == 'DET')	    self::returnRule($target_index, 243, 'DET');
	    
	}
	
	if ($prev_tag1 == 'ARTPRE')
	{
	    if ($this_tag == 'NOUN')	    self::returnRule($target_index, 244, 'NOUN');
	}
	
	if ($prev_tag1 == 'CON')
	{
	}
	
	if ($prev_tag1 == 'NUM' || $prev_tag1 == 'DET' || $prev_tag1 == 'AMOUNT')
	{
	    if ($this_word == 'second')	    self::returnRule($target_index, 245, 'PRO');

	    if ($this_tag == 'NOUN')	    self::returnRule($target_index, 246, 'NOUN');
	     
	    if ($this_tag == 'PPAST')	    self::returnRule($target_index, 247, 'NOUN');
	}
	
	if ($prev_tag1 == 'NOUN')
	{
	    
	    /**
	     * present participle, used as attribute of a noun (ADJ).
	     */
	    if ($prev_tag1 == 'NOUN' && instr($this_pp['features'], 'PPAST') > 0)    { self::returnRule($target_index, 248, 'PPAST');}	    
	}

	if ($prev_tag1 == 'NPR')
	{
	}
	
	if ($prev_tag1 == 'PON')
	{
	}

	if ($prev_tag1 == 'PRE')
	{
	    if (($this_tag == 'NOUN' || $this_tag == 'UNK'))	    self::returnRule($target_index, 249, 'NOUN');

	    if (($this_tag == 'NPR' || $this_tag == 'UNK'))	    self::returnRule($target_index, 250, 'NPR');

	    if (($this_tag == 'VER' || $this_tag == 'UNK'))	    self::returnRule($target_index, 251, 'NOUN');
	    
	}
	
	if ($prev_tag1 == 'PRO')
	{
            if (($this_tag == 'VER' || $this_tag == 'UNK'))	    self::returnRule($target_index, 252, 'ADV');
	}

	if ($prev_tag1 == 'SMI' || $prev_tag1 == 'INT')
	{
	}
	
	if ($prev_tag1 == 'VER')
	{
	}
	
	
	/**
	 * Part past
	 */
//	if (preg_match('/(avere|essere|venire|volere|stare|potere|dovere|osare)/i', $prev_pp_1['lemma']) && instr($this_pp['features'], 'PPAST') > 0)	    self::returnRule($target_index, 813, 'PPAST');
	
	if (preg_match('/(DET|NOUN|NUM|AMOUNT)/', $prev_tag1) && instr($this_pp['features'], 'PPAST') > 0)	    self::returnRule($target_index, 253, 'PPAST');
	
    }


    // 01 first to define, second well defined
    public static function rulesPattern01($target_index, $this_pp, $next_pp_1, $dbgme = false)
    {
		
	$this_word = $this_pp['form'];
	$this_tag = $this_pp['sh-feat'];
	
	$nextword1 = $next_pp_1['form'];
	$next_tag1 = $next_pp_1['sh-feat']; // unica 2

	if ($dbgme)
	    echox("----- ".__LINE__." rulesPattern01 01 with $this_word ($this_tag to define), $nextword1 ($next_tag1)");
	
	// considering the starting default SENT
	if ($target_index == 1 && ($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'at')	    self::returnRule($target_index, 254, 'VER');
	
	if ($target_index == 1 && $this_word == 'mm')	    self::returnRule($target_index, 255, 'INT');
	
	
	if ($this_word == 'near' && $nextword1 == 'to')	    self::returnRule($target_index, 256, 'ADV');
	
	
	if($next_tag1 == 'ADV')
	{

	}

	if($next_tag1 == 'ADJ')
	{
	    if ($this_word == '1')	    self::returnRule($target_index, 257, 'DET');

	}
	
	if($next_tag1 == 'ART')
	{
	    
	}
	
	if($next_tag1 == 'DATE')
	{
	    
	}
	
	if($next_tag1 == 'DET')
	{
	}

	if($next_tag1 == 'NPR')
	{

	}
	
	if($next_tag1 == 'PON')
	{
	}
	
	if($next_tag1 == 'PRO')
	{
	    if ($this_word == 'second')	    self::returnRule($target_index, 258, 'ADV');
	}
	
	if($next_tag1 == 'NOUN')
	{

	}

	if($next_tag1 == 'VER')
	{
	    if ($this_word == 'can')	    self::returnRule($target_index, 259, 'VER',5);
	}

    }

    
}
}

// class definition
if (!class_exists('NaiPosTagger\\PosTagging\\NaiBrillsRulesTrait')) {
class NaiBrillsRulesTrait extends PosBrillsRules {
    use BrillsRulesTrait;
}
}
