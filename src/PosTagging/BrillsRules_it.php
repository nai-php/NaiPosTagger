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

/**
 * Rules for italian language. I guess some rule can be work also on other
 * languages like french, spanish and english.
 *
 */


trait BrillsRulesTrait {
 
 // 1110
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
     echox("----- ".__LINE__." rulesPattern 1110 con $prev_word1 ($prev_tag1), $prev_word2 ($prev_tag2), $prev_word3 ($prev_tag3), $this_word ($this_tag dubious)");

    // added 22/06/2019
    if ($prev_word1 == 'te' && $prev_tag2 == 'PRO' && $prev_pp_3['lemma'] == 'avere' && $this_tag == 'VER')
     self::returnRule($target_index, '1110-5', 'VER',5);

    // added 15/06/2019
    if ($prev_tag1 == 'VER' && $prev_tag2 == 'PPAST' && ($prev_tag3 == 'ART') && $this_tag == 'NOUN')
     self::returnRule($target_index, '1110-10', 'NOUN');

    if ($prev_tag1 == 'PRO' && $prev_pp_2['features'] == 'VER:inf+pres' && $prev_word3 == 'been' && $this_tag == 'VER')
     self::returnRule($target_index, '1110-15', 'VER');

    if ($prev_word1 == 'by' && $prev_pp_2['features'] == 'VER:ger+pres' && $prev_tag3 == 'NOUN' && $this_tag == 'NOUN')	 self::returnRule($target_index, '1110-20', 'NOUN', 1);	

    if ($prev_tag1 == 'PRE' && $prev_tag2 == 'NUM' && $prev_tag3 == 'ADJ' && $this_tag == 'NOUN')	 self::returnRule($target_index, '1110-25', 'NOUN', 1);	

    // added 25/09/2019
    if ($prev_tag1 == 'NUM' && $prev_tag2 == 'NOUN' && $prev_tag3 == 'ADV' && $this_tag == 'ADJ')	 self::returnRule($target_index, '1110-30', 'ADJ', 1);

    if ($prev_tag1 == 'PRO' && $prev_tag2 == 'VER' && $prev_tag3 == 'ADV' && $this_tag == 'NOUN')	 self::returnRule($target_index, '1110-35', 'NOUN', 1);

    if ($prev_tag1 == 'PRO' && $prev_tag2 == 'VER' && $prev_tag3 == 'CON' && $this_tag == 'PPAST')	 self::returnRule($target_index, '1110-40', 'PPAST');

    if ($prev_tag1 == 'VER' && $prev_tag2 == 'ART' && $prev_tag3 == 'NOUN' && $this_tag == 'ADJ')	 self::returnRule($target_index, '1110-45', 'ADJ', .9);

    if ($prev_word1 == 'by' && $prev_tag2 == 'ART' && $prev_tag3 == 'ADJ' && $this_tag == 'NOUN')	 self::returnRule($target_index, '1110-50', 'NOUN', 1);
 }
 
 
 // 1011 first, third and forth well defined, second to define
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
     echox("----- ".__LINE__." rulesPattern 1011 con $prev_word1 ($prev_tag1), $this_word ($this_tag dubious), $nextword1 ($next_tag1), $nextword2 ($next_tag2)");

    if ($prev_word1 == 'per' && $this_tag == 'VER' && $nextword1 == 'se' && $next_tag2 == 'VER')	 self::returnRule($target_index, '1011-5', 'VER');

    if ($prev_word1 == 'che' && $this_pp['features'] == 'VER:ind+pres+3+s' && $nextword1 == 'anche' && $next_tag2 == 'ART')	 self::returnRule($target_index, '1011-10', 'VER');	

    if ($prev_tag1 == 'NPR' && $this_tag == 'VER' && $next_tag1 == 'ART' && $next_tag2 == 'NOUN')	 self::returnRule($target_index, '1011-15', 'VER');

    if ($prev_tag1 == 'PRO' && $this_tag == 'VER' && $next_tag1 == 'ADJ' && $next_tag2 == 'NOUN')	 self::returnRule($target_index, '1011-20', 'VER');

    if ($prev_tag1 == 'PRO' && $this_tag == 'VER' && $next_tag1 == 'ADV' && $next_tag2 == 'PRE')	 self::returnRule($target_index, '1011-25', 'VER');	
    
    if ($prev_tag1 == 'ART' && $this_tag == 'NOUN' && $next_tag1 == 'ARTPRE' && $next_tag2 == 'NOUN')	 self::returnRule($target_index, '1011-30', 'NOUN');	
    
    if(self::$language == 'en')
    {
	if (preg_match('/(ART|PRE)/', $prev_tag1) && $this_tag == 'ADJ' && $next_tag1 == 'ADJ' && $next_tag2 == 'NOUN')	 self::returnRule($target_index, '1011-35', 'ADJ');	

	if ($prev_tag1 == 'PRE' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN' && $next_tag2 == 'VER')	 self::returnRule($target_index, '1011-40', 'ADJ');	
    }
 }
 
 
 // 1101 first, second and forth well defined, third to define
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
     echox("----- ".__LINE__." rulesPattern 1101 con $prev_word1 ($prev_tag1), $prev_word2 ($prev_tag2), $this_word ($this_tag dubious), $nextword1 ($next_tag1)");

    if (($prev_tag1 == 'ART' || $prev_tag1 == 'PRO') && $prev_tag2 == 'VER' && $this_word == 'subito' && $next_pp_1['features'] == 'VER:ger+pres')
     self::returnRule($target_index, '1101-5', 'ADV');

    if ($prev_tag1 == 'ART' && $prev_tag2 == 'NOUN' && $this_word == 'fa' && $next_tag1 == 'NOUN')
     self::returnRule($target_index, '1101-10', 'VER');

    if ($prev_pp_1['features'] == 'VER:ind+pres+3+s' && $prev_word2 == 'to' && $this_tag == 'VER' && $nextword1 == 'a')
     self::returnRule($target_index, '1101-15', 'VER', 5);

    // added 06/08/2019
    if ($prev_tag1 == 'ART' && $prev_tag2 == 'NOUN' && $this_tag == 'VER' && $next_tag1 == 'ADV') self::returnRule($target_index, '1101-20', 'VER');

    if ($prev_tag1 == 'ARTPRE' && $prev_tag2 == 'NOUN' && $this_tag == 'PPAST' && $next_tag1 == 'PRE') self::returnRule($target_index, '1101-25', 'PPAST');

    if ($prev_tag1 == 'ART' && $prev_tag2 == 'NOUN' && $this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'NUM') self::returnRule($target_index, '1101-30', 'VER');

    if ($prev_tag1 == 'ARTPRE' && $prev_tag2 == 'PRO' && $this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'ART') self::returnRule($target_index, '1101-35', 'VER');

    if ($prev_tag1 == 'VER' && $prev_pp_2['features'] == 'VER:inf+pres' && $this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'PRE') self::returnRule($target_index, '1101-40', 'NOUN');

    if ($prev_word1 == 'da' && $prev_pp_2['lemma'] == 'solo' && $this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'ADV') self::returnRule($target_index, '1101-45', 'VER',3);

    if ($prev_tag1 == 'ART' && $prev_tag2 == 'NOUN' && $this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'ADJ') self::returnRule($target_index, '1101-50', 'VER', -.5);

    if ($prev_tag1 == 'ADV' && $prev_tag2 == 'ADJ' && $this_pp['sh-feat'] == 'NOUN' && $next_tag1 == 'SENT') self::returnRule($target_index, '1101-55', 'NOUN');

    if ($prev_tag1 == 'ART' && $prev_tag2 == 'NOUN' && $this_pp['features'] == 'VER:inf+pres' && $next_tag1 == 'ADJ') self::returnRule($target_index, '1101-60', 'VER');
    
    if ($prev_tag1 == 'ADV' && $prev_tag2 == 'ART' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN') self::returnRule($target_index, '1101-65', 'ADJ');
 
    if ($prev_tag1 == 'CON' && $prev_tag2 == 'NUM' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN') self::returnRule($target_index, '1101-70', 'ADJ');
 
    if ($prev_tag1 == 'ADJ' && $prev_tag2 == 'ADJ' && $this_tag == 'NOUN' && $next_tag1 == 'PRE') self::returnRule($target_index, '1101-75', 'NOUN');
    
    if ($prev_tag1 == 'NUM' && $prev_tag2 == 'ADJ' && $this_tag == 'NOUN' && $next_tag1 == 'PRE') self::returnRule($target_index, '1101-80', 'NOUN');
    
    if(self::$language == 'en')
    {
	if ($prev_tag1 == 'PRE' && $prev_tag2 == 'ADJ' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN') self::returnRule($target_index, '1101-85', 'ADJ');
    }
 }
  
 
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
     echox("----- ".__LINE__." rulesPattern101 101 con $prev_word1 ($prev_tag1), $this_word ($this_tag dubious), $nextword1 ($next_tag1)");

    if ($prev_word1 == 'is' && ($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'a') self::returnRule($target_index, '101-2', 'VER');

    // added 21/06/2019
    if ($prev_word1 == 'a' && ($this_pp['features'] == 'VER:inf+pres' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, '101-5', 'VER');

    if ($prev_word1 == 'anche' && ($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'PRE') self::returnRule($target_index, '101-10', 'ADV');

    if ($prev_word1 == 'anche' && ($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE') self::returnRule($target_index, '101-15', 'ADV');

    if ($prev_word1 == 'e' && ($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'su') self::returnRule($target_index, '101-20', 'VER');

    if ($prev_word1 == 'e' && $this_word == 'ora' && $nextword1 == 'non') self::returnRule($target_index, '101-25', 'ADV');

    if ($prev_word1 == 'e' && $this_word == 'bene' && $nextword1 == 'per') self::returnRule($target_index, '101-30', 'ADV');

    if ($prev_word1 == 'che' && $this_word == 'ora' && $nextword1 == 'che') self::returnRule($target_index, '101-35', 'ADV');

    if ($prev_word1 == 'che' && $this_tag == 'VER' && $next_tag1 == 'ART') self::returnRule($target_index, '101-40', 'VER');

    if ($prev_word1 == 'a' && $this_word == 'uso' && ($next_tag1 == 'NOUN' || $next_tag1 == 'ADJ')) self::returnRule($target_index, '101-41', 'NOUN', 2);
    if ($prev_word1 == 'ad' && $this_word == 'uso' && ($next_tag1 == 'NOUN' || $next_tag1 == 'ADJ')) self::returnRule($target_index, '101-42', 'NOUN', 2);

    if ($prev_word1 == 'in' && ($this_tag == 'NOUN' || $this_tag == 'UNK') && $nextword1 == 'un') self::returnRule($target_index, '101-45', 'NOUN');

    if ($prev_word1 == 'che' && ($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE') self::returnRule($target_index, '101-50', 'NOUN');

    if ($prev_word1 == 'che' && ($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE') self::returnRule($target_index, '101-51', 'VER');

    if ($prev_word1 == '.' && ($this_word == 'dai' || $this_tag == 'UNK') && $next_tag1 == 'DET') self::returnRule($target_index, '101-55', 'VER');

    if ($prev_word1 == 'se' && ($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'PRO') self::returnRule($target_index, '101-60', 'ADV');

    if ($prev_word1 == 'a' && $nextword1 == 'cosa') self::returnRule($target_index, '101-65', 'NOUN', -2);

    if ($prev_word1 == 'se' && $this_word == 'nei' && $next_tag1 == 'NOUN') self::returnRule($target_index, '101-65', 'ARTPRE');

    if ($prev_word1 == 'tu' && $this_word == 'sei' && $next_tag1 == 'ADJ') self::returnRule($target_index, '101-70', 'VER');

    if ($prev_word1 == 'può' && ($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'SENT') self::returnRule($target_index, '101-70', 'VER');

    if ($prev_word1 == 'ho' && ($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PRE') self::returnRule($target_index, '101-75', 'VER');

    if ($prev_word1 == 'ho' && ($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'NPR') self::returnRule($target_index, '101-80', 'VER');

    if ($prev_word1 == 'ho' && ($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'che') self::returnRule($target_index, '101-85', 'VER');

    if ($prev_word1 == 'per' && $this_word == 'ora' && $nextword1 == 'ci') self::returnRule($target_index, '101-90', 'ADV');

    if ($prev_word1 == 'soprattutto' && ($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ADJ') self::returnRule($target_index, '101-95', 'NOUN');

    if ($prev_word1 == 'come' && ($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'NOUN') self::returnRule($target_index, '101-100', 'NOUN');
    // added 03/08/2019
    if ($prev_word1 == 'come' && ($this_tag == 'VER' || $this_tag == 'UNK') && ($next_tag1 == 'ART' || $next_tag1 == 'NUM')) self::returnRule($target_index, '101-105', 'VER');

    if ($prev_word1 == 'come' && $this_word == 'fa' && $next_tag1 == 'NPR') self::returnRule($target_index, '101-110', 'VER');

    if ($prev_word1 == 'non' && $this_word == 'ancora' && $next_tag1 == 'PPAST') self::returnRule($target_index, '101-115', 'ADV');

    if ($prev_word1 == 'gonna' && ($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PRO') self::returnRule($target_index, '101-120', 'VER');

    if ($prev_word1 == 'ho' && instr($this_pp['features'], 'PPAST:pos') > 0 && $next_tag1 == 'DET')   self::returnRule($target_index, '101-125', 'PPAST');

    if (instr($prev_pp_1['features'], 'VER:ind+pres') > 0 && $this_word == 'ancora' && $next_tag1 == 'DET')   self::returnRule($target_index, '101-130', 'ADV');

    // added 03/08/2019
    if (instr($prev_pp_1['features'], 'VER:ind+pres') > 0 && ($this_tag == 'PPAST' || $this_tag == 'UNK') && $next_tag1 == 'PRO')   self::returnRule($target_index, '101-135', 'PPAST', 3);

    if ($prev_pp_1['features'] == 'VER:ind+pres+3+s' && $this_tag == 'ADJ' && $next_tag1 == 'NOUN')   self::returnRule($target_index, '101-136', 'ADJ');

    if (instr($prev_pp_1['features'], 'ind+impf') > 0 && $this_word == 'fosse' && $next_tag1 == 'ADJ')   self::returnRule($target_index, '101-140', 'VER',10);


    if ($prev_tag1 == 'ADJ')
    {
     if ($this_word == 'gli' && $next_tag1 == 'VER') self::returnRule($target_index, '101-145', 'ART');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')   self::returnRule($target_index, '101-150', 'VER');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ADJ')   self::returnRule($target_index, '101-155', 'NOUN');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')   self::returnRule($target_index, '101-160', 'NOUN');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')   self::returnRule($target_index, '101-165', 'NOUN');

     // sospesa il 15/06/2019, non corretta
    //	 if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRO')   self::returnRule($target_index, '101-170', 'NOUN');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == "PON") self::returnRule($target_index, '101-175', 'NOUN');
    }

    if ($prev_tag1 == 'ADV')
    {
     if ($this_word == 'la' && $next_tag1 == 'VER') self::returnRule($target_index, '101-180', 'PRO');

     if ($this_word == 'gli' && $next_tag1 == 'VER') self::returnRule($target_index, '101-185', 'ART');

     if ($this_word == 'stato' && $next_tag1 == 'ADV') self::returnRule($target_index, '101-190', 'NOUN');

     if ($this_word == 'sola' && $next_tag1 == 'PON') self::returnRule($target_index, '101-195', 'ADJ');

     if ($this_word == 'nuovo' && $next_tag1 == 'DET') self::returnRule($target_index, '101-200', 'ADJ');

     if ($this_word == 'troppo' && $next_tag1 == 'ADJ') self::returnRule($target_index, '101-205', 'DET');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'che') self::returnRule($target_index, '101-210', 'VER');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'DET') self::returnRule($target_index, '101-215', 'VER');


     if ($next_tag1 == 'VER')	 self::returnRule($target_index, '101-220', 'NOUN');

    }

    if($prev_pp_1['features'] == 'ADV:tim')
    {
     if (($this_tag == 'VER' || $this_tag == 'UNK') && ($next_tag1 == 'ART' || $next_tag1 == 'ARTPRE')) self::returnRule($target_index, '101-225', 'VER');
    }

    if ($prev_tag1 == 'ART')
    {
     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ADJ') self::returnRule($target_index, '101-230', 'ADJ');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'VER') self::returnRule($target_index, '101-235', 'NOUN');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NOUN') self::returnRule($target_index, '101-240', 'ADJ');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NUM') self::returnRule($target_index, '101-245', 'ADJ');
     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'AMOUNT') self::returnRule($target_index, '101-250', 'ADJ');
     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'DET') self::returnRule($target_index, '101-255', 'ADJ');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'VER') self::returnRule($target_index, '101-260', 'NOUN');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ADJ') self::returnRule($target_index, '101-265', 'NOUN');

     // sospesa il 29/12 perchè secondo me è un doppione della 634
    //	 if ($this_tag == 'NOUN' && $next_tag1 == 'PRE')  self::returnRule($target_index, '101-270', 'NOUN');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ART')  self::returnRule($target_index, '101-275', 'NOUN');

     if (($this_tag == 'PRO' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')   self::returnRule($target_index, '101-280', 'DET');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PRE')  self::returnRule($target_index, '101-285', 'NOUN');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')  self::returnRule($target_index, '101-290', 'NOUN');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ART')   self::returnRule($target_index, '101-295', 'NOUN');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'CON')   self::returnRule($target_index, '101-300', 'NOUN');

     // ma no, regola ambigua! Almeno 
    //	 if($prev_word1 != 'il')
    //	 if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ADV')   self::returnRule($target_index, '101-305', 'VER');  

    }

    if ($prev_tag1 == 'ARTPRE')
    {
	if($next_pp_1['lemma'] != 'cosa')
     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NOUN') self::returnRule($target_index, '101-310', 'ADJ');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE') self::returnRule($target_index, '101-315', 'NOUN');

     // added 23/06/2019
     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $nextword1 == 'che') self::returnRule($target_index, '101-320', 'NOUN');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE') self::returnRule($target_index, '101-325', 'NOUN');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, '101-330', 'NOUN');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ART')   self::returnRule($target_index, '101-335', 'NOUN');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PON')   self::returnRule($target_index, '101-340', 'NOUN');

    }

    if ($prev_tag1 == 'CON')
    {
     if ($this_word == 'ora' && $next_tag1 == 'PRO') self::returnRule($target_index, '101-345', 'ADV');
     if ($this_word == 'ora' && $next_tag1 == 'VER') self::returnRule($target_index, '101-350', 'ADV');

     if ($this_word == 'quelle' && $next_tag1 == 'NOUN')   self::returnRule($target_index, '101-355', 'DET');

     if ($next_tag1 == 'VER')	 self::returnRule($target_index, '101-360', 'NOUN');

     if ($next_tag1 == 'VER')	 self::returnRule($target_index, '101-365', 'PRO');

     if (instr($this_pp['features'], 'part+past') > 0 && $next_tag1 == 'ART')   self::returnRule($target_index, '101-370', 'VER');

     if ($this_tag == 'VER' && $next_tag1 == 'NUM')   self::returnRule($target_index, '101-371', 'VER');

     if ($this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'ADV')   self::returnRule($target_index, '101-372', 'VER');

    }

    if ($prev_tag1 == 'DET')
    {
     if ($this_word == 'stato' && $next_tag1 == 'ADJ') self::returnRule($target_index, '101-375', 'NOUN');

     if ($this_word == 'stato' && $next_tag1 == 'PON') self::returnRule($target_index, '101-380', 'NOUN');

     if ($this_word == 'stato' && $next_tag1 == 'ADV')	   self::returnRule($target_index, '101-385', 'NOUN');

     if ($this_word == 'primo' && $next_tag1 == 'PON') self::returnRule($target_index, '101-390', 'PRO');

     if ($this_word == 'stesso' && $next_tag1 == 'VER') self::returnRule($target_index, '101-395', 'PRO');

     if ($this_word == 'meno' && $next_tag1 == 'DET') self::returnRule($target_index, '101-400', 'DET');

     if ($this_word == 'più' && $next_tag1 == 'DET') self::returnRule($target_index, '101-405', 'DET');

     if ($this_word == 'per' && $next_tag1 == 'DET') self::returnRule($target_index, '101-410', 'DET');

     if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'DET') self::returnRule($target_index, '101-415', 'VER');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ADJ') self::returnRule($target_index, '101-420', 'NOUN');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == "PRE")   self::returnRule($target_index, '101-425', 'NOUN');

     if ($next_tag1 == 'NOUN')	 self::returnRule($target_index, '101-430', 'VER');

     if ($next_tag1 == 'ADV')	 self::returnRule($target_index, '101-435', 'NOUN');

     if ($next_tag1 == 'NOUN')	 self::returnRule($target_index, '101-440', 'ADJ');

     if ($next_tag1 == 'DET')	 self::returnRule($target_index, '101-445', 'NOUN');

     if ($next_tag1 == 'PRO')	 self::returnRule($target_index, '101-450', 'NOUN');

     if ($next_tag1 == 'VER')	 self::returnRule($target_index, '101-455', 'NOUN');

    }

    if ($prev_tag1 == 'INT')
    {
     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PRO') self::returnRule($target_index, '101-460', 'VER');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PON')   self::returnRule($target_index, '101-465', 'VER');

    }

    if ($prev_tag1 == 'NOUN')
    {
     if ($this_word == 'x' && $next_tag1 == 'NOUN') self::returnRule($target_index, '101-470', 'ADV');

     if ($this_word == 'per' && $next_tag1 == 'ART') self::returnRule($target_index, '101-475', 'PRE');

     if ($this_word == 'gli' && $next_tag1 == 'VER') self::returnRule($target_index, '101-480', 'ART');

     if ($this_word == 'sia' && $next_tag1 == 'ADJ') self::returnRule($target_index, '101-485', 'VER');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == "PRE")  self::returnRule($target_index, '101-490', 'ADJ');

     if (($this_tag == 'NPR' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')   self::returnRule($target_index, '101-495', 'ARTPRE');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PRO')   self::returnRule($target_index, '101-500', 'ADJ');

     if ($next_tag1 == 'DET')	 self::returnRule($target_index, '101-505', 'VER');
    }

    if ($prev_tag1 == 'NPR')
    {
     if ($this_word == 'fa' && $next_tag1 == 'ART') self::returnRule($target_index, '101-510', 'VER');

     if ($this_word == 'ancora' && $nextword1 == 'non') self::returnRule($target_index, '101-515', 'ADV');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ADV') self::returnRule($target_index, '101-520', 'VER');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE') self::returnRule($target_index, '101-525', 'VER');

    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PON') self::returnRule($target_index, '101-530', 'NOUN', 0.1);

    if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'SENT') self::returnRule($target_index, '101-535', 'VER');

     if ($next_tag1 == 'PON')	 self::returnRule($target_index, '101-540', 'NPR');

     if ($next_tag1 == "NPR")	 self::returnRule($target_index, '101-545', 'NPR');

     if ($next_tag1 == "NPR")	 self::returnRule($target_index, '101-550', 'NPR');

     if ($next_tag1 == 'DET')	 self::returnRule($target_index, '101-555', 'VER');

     if ($this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'NUM')	 self::returnRule($target_index, '101-556', 'VER');


    }

    if ($prev_tag1 == 'NUM' || $prev_tag1 == 'DET' || $prev_tag1 == 'AMOUNT')
    {
     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'CON')   self::returnRule($target_index, '101-560', 'NOUN');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')   self::returnRule($target_index, '101-565', 'NOUN');

    }

    if ($prev_tag1 == 'PPAST')
    {
	if ($this_tag == 'NOUN' && $nextword1 == 'per') self::returnRule($target_index, '101-566', 'NOUN');
    }

    if ($prev_tag1 == 'PON')
    {
     if ($this_word == 'la' && $next_tag1 == 'VER') self::returnRule($target_index, '101-570', 'PRO');

     // da 1 perchè c'è il sent iniziale di default
     if ($target_index == 1 && $this_word == 'tanto' && $next_tag1 == 'VER') self::returnRule($target_index, '101-575', 'ADV');

     if ($target_index == 1 && $this_word == 'tanto' && $next_tag1 == 'ADV') self::returnRule($target_index, '101-580', 'ADV');

     if ($target_index == 1 && $this_word == 'tanto' && $next_tag1 == 'ART') self::returnRule($target_index, '101-585', 'ADV');

     if ($target_index == 1 && $this_word == 'tanto' && $next_tag1 == 'PRE') self::returnRule($target_index, '101-590', 'ADV');

    }

    if ($prev_tag1 == 'PRE')
    {
     if ($this_word == 'loro' && $next_tag1 == 'VER') self::returnRule($target_index, '101-595', 'PRO');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NPR')  self::returnRule($target_index, '101-600', 'ADJ');

    //	 if (($this_tag == 'NPR' || $this_tag == 'UNK') && $next_tag1 == 'SENT')  self::returnRule($target_index, '101-605', 'NPR');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PRE')  self::returnRule($target_index, '101-610', 'NOUN');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'PRO')  self::returnRule($target_index, '101-615', 'VER');

     if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'VER')  self::returnRule($target_index, '101-620', 'ADV');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')  self::returnRule($target_index, '101-625', 'ADJ');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'NPR')  self::returnRule($target_index, '101-630', 'ADJ');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'it')  self::returnRule($target_index, '101-635', 'VER', 3);

    }

    if ($prev_tag1 == 'PON')
    {
     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'VER')   self::returnRule($target_index, '101-640', 'ADV');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRE')   self::returnRule($target_index, '101-645', 'NOUN');

    }

    if ($prev_tag1 == 'PRO')
    {
     if ($this_word == 'stato' && $next_tag1 == 'NOUN') self::returnRule($target_index, '101-650', 'NOUN');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'NOUN')  self::returnRule($target_index, '101-655', 'VER');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'VER')  self::returnRule($target_index, '101-660', 'NOUN');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'PRO')  self::returnRule($target_index, '101-665', 'NOUN');

     if ($next_tag1 == 'DET')	 self::returnRule($target_index, '101-670', 'VER');

     if ($this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'NUM') self::returnRule($target_index, '101-671', 'VER');
     
     if ($this_tag == 'VER' && $next_tag1 == 'PRO') self::returnRule($target_index, '101-672', 'VER', 6);
     
     if ($this_tag == 'PPAST' && $nextword1 == 'me') self::returnRule($target_index, '101-673', 'PPAST');
     
     if(self::$language == 'en')
     {
	  if ($this_pp['features'] == 'VER:ind+pres+3+s' && $next_tag1 == 'PRO') self::returnRule($target_index, '101-674', 'VER');
     }
     
    }

    if ($prev_tag1 == 'SENT')
    {
     if ($this_word == 'questa' && $next_tag1 == 'VER') self::returnRule($target_index, '101-675', 'PRO');

     if ($this_word == 'quanto' && $next_tag1 == 'NOUN') self::returnRule($target_index, '101-680', 'ADV');

     if ($this_word == 'vi' && $next_tag1 == 'NOUN') self::returnRule($target_index, '101-685', 'PRO');

     if ($this_word == 'era' && $next_tag1 == 'VER') self::returnRule($target_index, '101-690', 'VER');

     if ($this_word == 'ora' && $next_tag1 == 'VER') self::returnRule($target_index, '101-695', 'ADV');

     // added 09/2019 for "carica questi dati"
     if($this_tag == 'VER' && ($next_tag1 == 'ART' || $next_tag1 == 'PRO')) self::returnRule($target_index, '101-700', 'VER');
     
     
     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'PON')  self::returnRule($target_index, '101-701', 'VER');
    }

    if ($prev_tag1 == 'SMI')
    {
     if ($this_word == 'sei' && $next_tag1 == 'ADJ') self::returnRule($target_index, '101-705', 'VER');

     if ($this_word == 'grazie' && $next_tag1 == 'PON') self::returnRule($target_index, '101-710', 'INT');

    }

    if ($prev_tag1 == 'VER')
    {
     if ($this_word == 'pure' && $next_tag1 == 'ADV') self::returnRule($target_index, '101-715', 'CON');

     if ($this_word == 'dei' && $next_tag1 == 'NOUN') self::returnRule($target_index, '101-720', 'PRE');

     if ($this_word == 'ora' && $next_tag1 == 'PON') self::returnRule($target_index, '101-725', 'ADV');

     if ($this_word == 'subito' && $next_tag1 == 'DET') self::returnRule($target_index, '101-730', 'VER');

     if ($this_word == 'ancora' && $next_tag1 == 'VER') self::returnRule($target_index, '101-735', 'ADV');

     if ($this_word == 'ancora' && $next_tag1 == 'PRO') self::returnRule($target_index, '101-740', 'ADV');

     if ($this_word == 'sia' && $next_tag1 == 'ART') self::returnRule($target_index, '101-745', 'VER');

     if ($next_tag1 == 'ADJ')	 self::returnRule($target_index, '101-750', 'ARTPRE');

     if ($this_word == 'entro' && ($next_tag1 == 'DET' || $next_tag1 == 'NUM')) self::returnRule($target_index, '101-755', 'ADV');

     if (($this_tag == 'ADJ' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, '101-760', 'VER');

     if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'VER')   self::returnRule($target_index, '101-765', 'ADV');

     if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, '101-770', 'ADV');

     if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'PRE')   self::returnRule($target_index, '101-775', 'ADV');

     if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'ARTPRE')   self::returnRule($target_index, '101-780', 'VER');

     if (($this_tag == 'ADV' || $this_tag == 'UNK') && $next_tag1 == 'SMI')   self::returnRule($target_index, '101-785', 'ADV');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, '101-790', 'VER');

     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'ART') self::returnRule($target_index, '101-795', 'PPAST');

     // okay, ma devo considerare dove ho combo di ausiliari... es. "ci ha dato"
     if(! preg_match('/(avere|essere)/i', $prev_pp_1['lemma']))
     {
     if (($this_tag == 'NOUN' || $this_tag == 'UNK') && $next_tag1 == 'DET')   self::returnRule($target_index, '101-800', 'NOUN');
     }

     if ($next_tag1 == 'NOUN')	 self::returnRule($target_index, '101-805', 'ADV');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'al') self::returnRule($target_index, '101-810', 'VER');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ADJ') self::returnRule($target_index, '101-815', 'ARTPRE');

     if ($prev_pp_1['features'] == 'VER:ind+pres+3+s' && $this_tag == 'NOUN' && $next_tag1 == 'SENT') self::returnRule($target_index, '101-820', 'NOUN');

    }

 }


 
 // 110 first and second well defined, third to define
 public static function rulesPattern110($target_index, $prev_pp_2, $prev_pp_1, $this_pp, $dbgme = false)
 {
    $prev_word1 = $prev_pp_1['form'];
    $prev_tag1 = $prev_pp_1['sh-feat']; // unica 1

    $prev_word2 = $prev_pp_2['form'];
    $prev_tag2 = $prev_pp_2['sh-feat']; // unica 2

    $this_word = $this_pp['form'];
    $this_tag = $this_pp['sh-feat'];

    if ($dbgme)
     echox("----- ".__LINE__." rulesPattern 110 con $prev_word2 ($prev_tag2), $prev_word1 ($prev_tag1), $this_word ($this_tag dubious)");


    // regole basate su tag e parole


    // ENGLISH
    if (instr($prev_pp_2['features'], 'VER:cond') > 0 && $prev_word1 == 'already' && instr($this_pp['features'], 'PPAST:pos+s+m') > 0) self::returnRule($target_index, '110-0', 'PPAST');

    if ($prev_pp_2['lemma'] == 'have' && $prev_word1 == 'to' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-5', 'VER',5);
    
    if ($prev_word2 == 'I' && $prev_word1 == 'do' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-6', 'VER',5);
    
    if ($prev_word2 == 'and' && $prev_tag1 == 'ADV' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-10', 'VER');

    if ($prev_word2 == 'how' && $prev_word1 == 'to' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-15', 'VER', 3);

    if ($prev_word2 == 'and' && $prev_word1 == 'the' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-20', 'NOUN');

    if ($prev_word2 == 'for' && $prev_word1 == 'your' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-25', 'NOUN');

    if ($prev_word2 == 'do' && $prev_word1 == 'not' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-30', 'VER');

    if ($prev_word2 == 'to' && $prev_word1 == 'be' && ($this_tag == 'ADJ' || $this_tag == 'UNK')) self::returnRule($target_index, '110-35', 'ADJ');
    
    if ($prev_word2 == 'is' && $prev_word1 == 'it' && ($this_tag == 'ADJ' || $this_tag == 'UNK')) self::returnRule($target_index, '110-36', 'ADJ', 3);

    if ($prev_word2 == 'get' && $prev_tag1 == 'PRO' && ($this_tag == 'ADJ' || $this_tag == 'UNK')) self::returnRule($target_index, '110-37', 'ADJ', 1);
    
    if ($prev_word2 == 'and' && $prev_word1 == 'if' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-40', 'VER');
    
    
    if ($prev_tag2 == 'PRO' && $prev_word1 == 'could' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-41', 'VER');
    if ($prev_tag2 == 'PRO' && $prev_word1 == 'would' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-41', 'VER');
    if ($prev_tag2 == 'PRO' && $prev_word1 == 'should' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-41', 'VER');
    
    if ($prev_word2 == 'can' && $prev_word1 == 'I' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-44', 'VER',10);
    
    if ($prev_tag2 == 'PRO' && $prev_word1 == 'will' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-45', 'VER',10);
    
    if ($prev_word2 == 'I' && $prev_word1 == 'am' && $this_tag == 'ADJ') self::returnRule($target_index, '110-46', 'ADJ');
    if ($prev_word2 == 'you' && $prev_word1 == 'are' && $this_tag == 'ADJ') self::returnRule($target_index, '110-46', 'VER');
    if ($prev_word2 == 'he' && $prev_word1 == 'is' && $this_tag == 'ADJ') self::returnRule($target_index, '110-46', 'VER');
    if ($prev_word2 == 'she' && $prev_word1 == 'is' && $this_tag == 'ADJ') self::returnRule($target_index, '110-46', 'VER');
    if ($prev_word2 == 'we' && $prev_word1 == 'are' && $this_tag == 'ADJ') self::returnRule($target_index, '110-46', 'VER');
    if ($prev_word2 == 'they' && $prev_word1 == 'are' && $this_tag == 'ADJ') self::returnRule($target_index, '110-46', 'VER');
    
    if ($prev_word2 == 'I' && $prev_word1 == 'am' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK')) self::returnRule($target_index, '110-46', 'VER');
    if ($prev_word2 == 'you' && $prev_word1 == 'are' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK')) self::returnRule($target_index, '110-46', 'VER');
    if ($prev_word2 == 'he' && $prev_word1 == 'is' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK')) self::returnRule($target_index, '110-46', 'VER');
    if ($prev_word2 == 'she' && $prev_word1 == 'is' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK')) self::returnRule($target_index, '110-46', 'VER');
    if ($prev_word2 == 'we' && $prev_word1 == 'are' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK')) self::returnRule($target_index, '110-46', 'VER');
    if ($prev_word2 == 'they' && $prev_word1 == 'are' && ($this_pp['features'] == 'VER:ger+pres' || $this_tag == 'UNK')) self::returnRule($target_index, '110-46', 'VER');
    
    
    if ($prev_word2 == 'may' && $prev_word1 == 'be' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-47', 'VER');

    if ($prev_tag2 == 'PRO' && $prev_word1 == 'wanna' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-48', 'VER');
    
    if ($prev_word2 == 'keep' && $prev_word1 == 'on' && $this_tag == 'NOUN') self::returnRule($target_index, '110-49', 'VER', 5);


    // added 21/06/2019
    if ($prev_tag2 == 'VER' && $prev_word1 == 'qua' && $this_tag == 'VER') self::returnRule($target_index, '110-50', 'VER', - 2);

    if (instr($prev_pp_2['features'], 'PRO-PERS-CLI') > 0 && instr($prev_pp_1['features'], 'VER:ind+pres') > 0 && $this_tag == 'NPR') self::returnRule($target_index, '110-55', 'NPR');

    if (instr($prev_pp_2['features'], 'VER:cond') > 0 && $prev_word1 == 'già' && instr($this_pp['features'], 'PPAST:pos+s+m') > 0) self::returnRule($target_index, '110-60', 'PPAST');

    if ($prev_word2 == 'e' && $prev_tag1 == 'ADV' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-65', 'VER');

    // es. e il 'cancello' mi deve mettere noun e non ver!
    if ($prev_word2 == 'e' && $prev_word1 == 'il' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-70', 'NOUN');

    if ($prev_word2 == 'che' && $prev_pp_1['lemma'] == 'avere' && $this_word == 'ancora') self::returnRule($target_index, '110-75', 'ADV');

    if ($prev_word2 == 'come' && $prev_word1 == 'non' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-80', 'VER');

    if ($prev_word2 == 'così' && $prev_word1 == 'lo' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-85', 'VER',3);

    if ($prev_word2 == 'come' && instr($prev_pp_1['features'], 'VER:ind+pres') > 0 && ($this_pp['features'] == 'VER:inf+pres')) self::returnRule($target_index, '110-90', 'VER');

    if (preg_match('/^(me|te)$/i', $prev_word2) && preg_match('/^(lo|la|le|li|ne)$/i', $prev_word1) && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-95', 'VER', 40);

    if ($prev_word2 == 'le' && $prev_word1 == 'da' && ($this_tag == 'ADV' || $this_tag == 'UNK')) self::returnRule($target_index, '110-100', 'ADV');

    if ($prev_word2 == 'di' && $prev_word1 == 'aver' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-105', 'VER', 3);

    // added 07/07/2019
    if($this_tag != 'VER:ind+pres')
    if ($prev_word2 == 'di' && $prev_word1 == 'non' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-110', 'VER', -3);

    if ($prev_word2 == 'di' && $prev_word1 == 'aver' && ($this_tag == 'PPAST' || $this_tag == 'UNK')) self::returnRule($target_index, '110-115', 'PPAST', 3);

    if ($prev_word2 == 'mai' && $prev_word1 == 'a' && $this_pp['features']== 'VER:inf+pres') self::returnRule($target_index, '110-120', 'VER');

    if ($prev_word2 == 'più' && $prev_word1 == 'avanti' && $this_pp['features']== 'VER:ind+pres') self::returnRule($target_index, '110-125', 'ADV');

    if ($prev_word2 == 'ma' && $prev_tag1 == 'ADV' && $this_word == 'troppo') self::returnRule($target_index, '110-130', 'ADV');


    if ($prev_word2 == 'gli' && $prev_pp_1['features'] == 'VER:ind+pres+1+s' && ($this_tag == 'PPAST' || $this_tag == 'UNK'))	 self::returnRule($target_index, '110-135', 'PPAST', 3);

    if ($prev_word2 == 'le' && $prev_pp_1['features'] == 'VER:ind+pres+1+s' && ($this_tag == 'PPAST' || $this_tag == 'UNK'))	 self::returnRule($target_index, '110-140', 'PPAST', 3);

    if ($prev_word2 == 'altra' && $prev_tag1 == 'NOUN' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))	 self::returnRule($target_index, '110-145', 'ADJ');

    if ($prev_word2 == 'il' && $prev_tag1 == 'NOUN' && $this_word == 'era')	 self::returnRule($target_index, '110-150', 'VER');

    if ($prev_word2 == 'la' && $prev_tag1 == 'NOUN' && $this_word == 'era')	 self::returnRule($target_index, '110-155', 'VER');

    if ($prev_word2 == 'per' && $prev_tag1 == 'ART' && $this_word == 'prima')	 self::returnRule($target_index, '110-160', 'ADJ');

    // added 11/07/2019
    if ($prev_word2 == 'in' && $prev_pp_1['features'] == 'ADV:qty' && ($this_tag == 'NOUN' || $this_tag == 'UNK')) self::returnRule($target_index, '110-165', 'NOUN');

    if ($prev_word2 == 'me' && $prev_word1 == 'lo' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-170', 'VER');

    if ($prev_word2 == 'non' && $prev_word1 == 'ha' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-180', 'VER');

    if ($prev_word2 == 'oggi' && $prev_word1 == 'non' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-185', 'VER');

    if ($prev_word2 == 'non' && $prev_word1 == 'mi' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-190', 'VER');

    if ($prev_word2 == 'non' && $prev_word1 == 'si' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-195', 'VER');

    if ($prev_word2 == 'non' && $prev_word1 == 'ci' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-200', 'VER');

    if ($prev_word2 == 'e' && $prev_word1 == 'se' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-205', 'VER');

  if ($prev_word2 == 'te' && $prev_word1 == 'lo' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-210', 'VER');
  if ($prev_word2 == 'te' && $prev_word1 == 'la' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-215', 'VER');
  if ($prev_word2 == 'te' && $prev_word1 == 'le' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-220', 'VER');
  if ($prev_word2 == 'te' && $prev_word1 == 'li' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-225', 'VER');
	
    if ($prev_word2 == 'un' && $prev_word1 == 'pò' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))	 self::returnRule($target_index, '110-230', 'ADJ');

    if ($prev_word2 == 'tanto' && $prev_word1 == 'per' && $this_word == 'ora')	 self::returnRule($target_index, '110-235', 'ADV');
    
    if ($prev_pp_2['lemma'] == 'quanto' && $prev_tag1 == 'NOUN' && $this_tag == 'PPAST')	 self::returnRule($target_index, '110-236', 'PPAST');

    if (preg_match('/^(mi|ti|si|ci|vi)$/i', $prev_word2) && ($prev_word1 == 'sia' || $prev_pp_1['lemma'] == 'essere'|| $prev_pp_1['lemma'] == 'avere') && ($this_tag == 'PPAST' || $this_tag == 'UNK')) self::returnRule($target_index, '110-240', 'PPAST', 1);

    if ($prev_tag2 == 'ADJ')
    {
     if ($prev_tag1 == 'ADJ' && $this_word == 'dati')	 self::returnRule($target_index, '110-245', 'NOUN');

     if ($prev_tag1 == 'PON' && $this_word == 'cosa') self::returnRule($target_index, '110-250', 'PRO');

     if ($prev_tag1 == 'PON' && $this_word == 'what') self::returnRule($target_index, '110-255', 'PRO');

//     if ($prev_tag1 == 'PRO') self::returnRule($target_index, '110-260', 'VER');

     if ($prev_tag1 == 'VER')	 self::returnRule($target_index, '110-265', 'VER');
     
     if ($prev_pp_1['form'] == '/' && $this_tag == 'ADJ')	self::returnRule($target_index, '110-266', 'ADJ');
    }

    if ($prev_tag2 == 'ADV')
    {
     if ($prev_tag1 == 'PRO' && $this_word == 'cosa') self::returnRule($target_index, '110-270', 'PRO');

     if ($prev_tag1 == 'PRO' && $this_word == 'what') self::returnRule($target_index, '110-275', 'PRO');

     if ($prev_tag1 == 'ADV' && $this_word == 'rispetto') self::returnRule($target_index, '110-280', 'ADV');

     if ($prev_word1 == 'ho' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-285', 'VER');

     if ($prev_word1 == 'ha' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-290', 'VER');

     if ($prev_tag1 == 'VER' && ($this_tag == 'ADV' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-295', 'ADV');

     if ($prev_tag1 == 'ADV' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-300', 'ARTPRE');

     if ($prev_tag1 == 'ART' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-305', 'NOUN');

     if ($prev_tag1 == 'PRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-310', 'NOUN');	

     if ($prev_tag1 == 'ARTPRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-315', 'NOUN');	

     if ($prev_tag1 == 'DET') self::returnRule($target_index, '110-320', 'NOUN');

     if ($prev_tag1 == 'NOUN')   self::returnRule($target_index, '110-325', 'DET');

    }

    if ($prev_tag2 == 'ART')
    {
     if ($prev_word1 == 'stesso' && $this_word == 'dei')	 self::returnRule($target_index, '110-330', 'PRE');

     if ($prev_tag1 == 'DET' && $this_word == 'dati')	 self::returnRule($target_index, '110-335', 'NOUN');

     if ($prev_tag1 == 'ADJ' && $this_word == 'dati')	 self::returnRule($target_index, '110-340', 'NOUN');

     if ($prev_tag1 == 'DET' && $this_word == 'dato')	 self::returnRule($target_index, '110-345', 'NOUN');

     if ($prev_tag1 == 'ADJ' && $this_word == 'dato')	 self::returnRule($target_index, '110-350', 'NOUN');

     if ($prev_tag1 == 'VER' && instr($this_pp['features'], 'PPAST') > 0)	 self::returnRule($target_index, '110-355', 'PPAST');

     if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-360', 'NOUN', .5);

     if ($prev_tag1 == 'ADJ' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-365', 'NOUN', .2);

     if ($prev_tag1 == 'DET' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-370', 'NOUN');


     if (left($prev_pp_1['features'], 2) == ':s' && left($this_pp['features'], 2) == '+p')   self::returnRule($target_index, '110-375', $this_tag,-20);

     if (left($prev_pp_1['features'], 2) == ':p' && left($this_pp['features'], 2) == '+s')   self::returnRule($target_index, '110-380', $this_tag,-20);

     if ($prev_tag1 == 'VER' && ($this_tag == 'ADV' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-385', 'ADV');

     if ($prev_tag1 == 'NPR' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-386', 'VER');

     if ($prev_tag1 == 'NOUN' && ($this_pp['features'] == 'VER:ind+pres+3+s' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-387', 'VER');

    }

    if ($prev_tag2 == 'ARTPRE')
    {
	// added 25/09/2019
	if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK')) self::returnRule($target_index, '110-388', 'NOUN');
    }

    if ($prev_tag2 == 'CON')
    {
     if ($prev_tag1 == 'PRO' && $this_word == "dei")	 self::returnRule($target_index, '110-390', 'PRE');
    }

    if ($prev_tag2 == 'DET')
    {
     if ($prev_tag1 == 'VER')	 self::returnRule($target_index, '110-395', 'NOUN');

     if ($prev_tag1 == 'DET' && $this_word == "ora")	 self::returnRule($target_index, '110-400', 'ADV');

     if ($prev_tag1 == 'NOUN' && $this_word == "destra") self::returnRule($target_index, '110-405', 'ADJ');

     if ($prev_tag1 == 'NOUN' && $this_word == "fa")	 self::returnRule($target_index, '110-410', 'ADV');


     if ($prev_tag1 == 'NOUN' && instr($this_pp['features'], 'PPAST') > 0)	 self::returnRule($target_index, '110-415', 'PPAST');

     if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-420', 'NOUN');

     if ($prev_tag1 == 'PRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-425', 'NOUN');

     if ($prev_tag1 == 'NOUN' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-430', 'ADJ');	

    }	


    if ($prev_tag2 == 'PRE')
    {
     if ($prev_tag1 == 'ART' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-435', 'NOUN');

     if ($prev_tag1 == 'ADJ' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-440', 'NOUN');

     if ($prev_tag1 == 'NOUN' && ($this_tag == 'ARTPRE' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-445', 'ARTPRE');

     if ($prev_tag1 == 'PRO' && ($this_tag == 'ADV' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-450', 'NOUN');

     
     if(self::$language == 'en')
     {
	if ($prev_word2 == 'to' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-456', 'VER');
     } else
     {
	if ($prev_tag1 == 'VER' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-455', 'NOUN');
     }

    }

    if ($prev_tag2 == 'PRO')
    {
     if ($prev_tag1 == 'DET' && $this_word == 'stati')	 self::returnRule($target_index, '110-460', 'NOUN');

     if ($prev_tag1 == 'ART' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-461', 'VER');
     if ($prev_tag1 == 'ARTPRE' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-465', 'NOUN');

     if ($prev_tag1 == 'DET' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-470', 'NOUN');

     if ($prev_tag1 == 'NOUN' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-475', 'VER');

     if ($prev_tag1 == 'VER' && ($this_tag == 'ADJ' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-480', 'VER');

     if ($prev_tag1 == 'DET')	 self::returnRule($target_index, '110-485', 'VER');
    }

    if ($prev_tag2 == 'NOUN')
    {
     if ($prev_tag1 == 'PRE' && ($this_tag == 'NPR' || $this_tag == 'UNK')) self::returnRule($target_index, '110-490', 'NPR');

     if ($prev_tag1 == 'PRE' && ($this_tag == 'NOUN' || $this_tag == 'UNK')) self::returnRule($target_index, '110-495', 'NOUN');

     if ($prev_tag1 == 'PRO' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))	self::returnRule($target_index, '110-500', 'VER');

     if ($prev_tag1 == 'ADJ')   self::returnRule($target_index, '110-505', 'PRO');

	if ($prev_pp_1['form'] == '/' && $this_tag == 'NOUN')	self::returnRule($target_index, '110-507', 'NOUN');
    }

    if ($prev_tag2 == 'NPR')
    {
	    if ($prev_pp_1['features'] == 'PON:sep' && $this_tag == 'NPR')	self::returnRule($target_index, '110-509', 'NPR');
    }

    if ($prev_tag2 == 'VER')
    {
     if ($prev_tag1 == 'ADV' && $this_word == 'cosa') self::returnRule($target_index, '110-510', 'PRO');

     if ($prev_word1 == 'più' && ($this_tag == 'ADJ' || $this_tag == 'UNK')) self::returnRule($target_index, '110-515', 'ADJ');

     if ($prev_word1 == 'già' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-520', 'VER');

     if ($prev_word1 == 'already' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-525', 'VER');

     if ($prev_tag1 == 'ADJ' && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-530', 'NOUN');

     // ma in certi casi la regola sopra crea imprecisioni. 
     // salvo almeno le situazioni con poco di "è poco distante" 
     if ($prev_word1 == 'poco' && $this_tag == 'ADJ')   self::returnRule($target_index, '110-535', 'ADJ', 3);
     
     if ($prev_word1 == 'pochi' && $this_tag == 'NOUN')   self::returnRule($target_index, '110-536', 'NOUN');

     if($prev_pp_1['features'] != 'ADV:qty')
	    if ($prev_tag1 == 'ADV' && ($this_tag == 'NOUN' || $this_tag == 'UNK')) self::returnRule($target_index, '110-540', 'VER');

     if ($prev_tag1 == 'ADV' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-545', 'ADJ');
     
     if ($prev_tag1 == 'ADV' && $this_tag == 'NPR') self::returnRule($target_index, '110-546', 'NPR', -1);

     if ($prev_tag1 == 'ART' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-550', 'NOUN');

     if ($prev_tag1 == 'ART' && ($this_tag == 'UNK' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-555', 'NOUN');

     if ($prev_tag1 == 'ART' && ($this_tag == 'ADV' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-560', 'ADJ');

     if ($prev_tag1 == 'ARTPRE' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-565', 'NOUN');

     if ($prev_tag1 == 'DET' && ($this_tag == 'ADV' || $this_tag == 'UNK')) self::returnRule($target_index, '110-570', 'ADV');

     if ($prev_tag1 == 'DET' && ($this_tag == 'NOUN' || $this_tag == 'UNK')) self::returnRule($target_index, '110-575', 'NOUN');

     if ($prev_tag1 == 'PRE' && ($this_tag == 'NOUN' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-580', 'NOUN');

     if ($prev_tag1 == 'PRO' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '110-585', 'VER');

     if ($prev_tag1 == "PRE" && ($this_tag == 'VER' || $this_tag == 'UNK'))   self::returnRule($target_index, '110-590', 'NOUN');	 

     if ($prev_tag1 == 'VER' && ($this_tag == 'ART' || $this_tag == 'UNK')) self::returnRule($target_index, '110-595', 'ART');

     if ($prev_tag1 == 'NPR') self::returnRule($target_index, '110-600', 'NPR');

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
     echox("----- ".__LINE__." rulesPattern011 011 con $this_word ($this_tag dubious), $nextword1 ($next_tag1), $nextword2 ($next_tag2)");

    //tag basati su termini precisi, li metto per primi
    if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'bene' && $nextword2 == 'se')	 self::returnRule($target_index, '011-0', 'VER');

    if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'anche' && $nextword2 == 'che')	 self::returnRule($target_index, '011-5', 'VER');

    if (($this_tag == 'ADV' || $this_tag == 'UNK') && $nextword1 == 'me' && $nextword2 == 'lo')	 self::returnRule($target_index, '011-10', 'ADV');


    if($next_tag2 == 'ADJ')
    {
     if ($this_word == 'dei' && $next_tag1 == 'NOUN')	 self::returnRule($target_index, '011-15', 'PRE');

     if ($next_tag1 == 'ADJ')	 self::returnRule($target_index, '011-20', 'NOUN');

     if ($next_tag1 == 'CON')	 self::returnRule($target_index, '011-25', 'ADJ');

     if ($next_tag1 == 'DET')	 self::returnRule($target_index, '011-30', 'VER');	 
    }

    if($next_tag2 == 'ADV')
    {
     if ($this_word == '1' && $next_tag1 == 'VER')	 self::returnRule($target_index, '011-35', 'DET');

     if ($this_word == '1' && $next_tag1 == 'CON')	 self::returnRule($target_index, '011-40', 'DET');

     if ($this_word == 'stata' && $next_tag1 == 'NOUN')	 self::returnRule($target_index, '011-45', 'VER');

     if ($next_tag1 == 'VER')	 self::returnRule($target_index, '011-50', 'PRO');
    }

    if($next_tag2 == 'ART')
    {
     if ($this_word == 'prima' && $next_tag1 == 'VER')	 self::returnRule($target_index, '011-55', 'ADV');

    }

    if($next_tag2 == 'CON')
    {

    }

    if($next_tag2 == 'DET')
    {
     if ($this_word == 'era' && $next_tag1 == 'ADV')	 self::returnRule($target_index, '011-60', 'VER');

     if ($this_word == 'prima' && $next_tag1 == 'VER')	 self::returnRule($target_index, '011-65', 'ADV');

     if ($this_word == 'gli' && $next_tag1 == 'VER')	 self::returnRule($target_index, '011-70', 'ART');

     if ($this_word == 'centro' && $next_tag1 == 'ADV')	 self::returnRule($target_index, '011-75', 'NPR');

     if ($this_word == 'alto' && $next_tag1 == 'PON')	 self::returnRule($target_index, '011-80', 'ADV');

     if ($next_tag1 == 'NOUN')	 self::returnRule($target_index, '011-85', 'PRO');

     // 12/05/2019 try to exclude part past like 'fatto', 'dato' etc.
     if ($next_tag1 == 'VER' && !preg_match('/to$/i', $this_word))   self::returnRule($target_index, '011-90', 'NOUN');

     if ($next_tag1 == 'ADV')	 self::returnRule($target_index, '011-95', 'PRO');

     if ($next_tag1 == 'ADV')	 self::returnRule($target_index, '011-100', 'VER');

     if (($this_tag == 'DET' || $this_tag == 'UNK') && $next_tag1 == 'CON')	 self::returnRule($target_index, '011-105', 'DET');
    }

    if($next_tag2 == 'NOUN')
    {
     if ($this_word == 'era' && $next_tag1 == "DET")	self::returnRule($target_index, '011-110', 'VER');

     if ($this_word == 'questa' && $next_tag1 == 'DET')  self::returnRule($target_index, '011-115', 'PRO');

     if ($this_word == 'that' && $next_tag1 == 'DET') self::returnRule($target_index, '011-120', 'PRO');
     if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'on')	 self::returnRule($target_index, '011-125', 'VER');

     if (instr($this_pp['features'], 'part+past') > 0 && $nextword1 == 'for')   self::returnRule($target_index, '011-130', 'VER');

     if ($this_word == 'lungo' && $next_tag1 == 'DET')	 self::returnRule($target_index, '011-135', 'ADV');

     if ($this_word == 'primo' && $next_tag1 == 'PON')	 self::returnRule($target_index, '011-140', 'ADJ');

     if ($this_word == 'fa' && $next_tag1 == 'ADJ')	 self::returnRule($target_index, '011-145', 'VER');

     if (($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == "su")	 self::returnRule($target_index, '011-150', 'VER');

     if (instr($this_pp['features'], 'part+past') > 0 && $nextword1 == 'per')   self::returnRule($target_index, '011-155', 'VER');

     if ($target_index == 0 && ($this_tag == 'VER' || $this_tag == 'UNK') && $next_tag1 == 'ART')	 self::returnRule($target_index, '011-160', 'VER');

    if(isset($next_pp_2['metadata']['ref']) && in_array('occup', $next_pp_2['metadata']['ref']))
	self::returnRule($target_index, '011-265', 'NPR');

    }

    if($next_tag2 == 'NPR')
    {
	if ($this_word == 'comune' && $next_tag1 == 'PRE')	 self::returnRule($target_index, '011-265', 'NOUN');
    }

    if($next_tag2 == 'PON')
    {
     if ($next_tag1 == 'NOUN')	 self::returnRule($target_index, '011-165', 'DET');

     if ($next_tag1 == 'NPR')	 self::returnRule($target_index, '011-170', 'NPR');

     if ($this_word == 'grazie' && $next_tag1 == "NPR" && $next_tag2 == 'PON')	 self::returnRule($target_index, '011-175', 'INT');

     if ($this_word == 'grazie' && $nextword1 == "mille" && $next_tag2 == 'PON')  self::returnRule($target_index, '011-180', 'INT');

    }

    if($next_tag2 == 'PRE')
    {
     if ($this_word == 'si' && $next_tag1 == 'VER')	 self::returnRule($target_index, '011-185', 'PRO');
    }

    if($next_tag2 == 'PRO')
    {
     if ($this_word == 'vorrei' && $next_tag1 == 'ADV')	 self::returnRule($target_index, '011-190', 'VER');

     if ($next_tag1 == 'ADV')	 self::returnRule($target_index, '011-195', 'PRO');
    }

    if($next_tag2 == 'VER')
    {
     if ($this_word == 'ora' && $next_tag1 == 'VER')	 self::returnRule($target_index, '011-200', 'ADV');

     if ($this_word == 'cosa' && $next_tag1 == 'PRO')	 self::returnRule($target_index, '011-205', 'NOUN');

     if ($this_word == 'prova' && $next_tag1 == 'ADV')	 self::returnRule($target_index, '011-210', 'VER');

     if ($this_word == 'era' && $next_tag1 == 'ADV')	 self::returnRule($target_index, '011-220', 'VER');

     if ($this_word == 'erano' && $next_tag1 == 'VER')	 self::returnRule($target_index, '011-225', 'VER');

     if ($this_word == 'erano' && $next_tag1 == 'ADV')	 self::returnRule($target_index, '011-230', 'VER');

     if ($this_word == 'fu' && $next_tag1 == 'ADV')	 self::returnRule($target_index, '011-235', 'VER');

     if ($this_word == 'sono' && $next_tag1 == 'ADV')	 self::returnRule($target_index, '011-240', 'VER');

     if ($this_word == 'può' && $next_tag1 == 'PON')	 self::returnRule($target_index, '011-245', 'VER');

     if ($this_word == 'primo' && $next_tag1 == 'ADV')	 self::returnRule($target_index, '011-250', 'PRO');

     if ($this_pp['features'] == 'VER:ind+pres+3+s' && ($nextword1 == 'a' || $nextword1 == 'ad'))	 self::returnRule($target_index, '011-255', 'VER');

     if ($this_pp['features'] == 'VER:ind+pres+3+s' && ($nextword1 == 'to'))	 self::returnRule($target_index, '011-260', 'VER');

    }

 }


 // 10 first well defined, second to define
 public static function rulesPattern10($target_index, $prev_pp_1, $this_pp, $dbgme = false)
 {
    //prevTag1 è la parola unica, this_word quella precedente che viene ripulita

    $prev_word1 = $prev_pp_1['form'];
    $prev_tag1 = $prev_pp_1['sh-feat'];

    $this_word = $this_pp['form'];
    $this_tag = $this_pp['sh-feat'];

    if ($dbgme)
     echox("----- ".__LINE__." rulesPattern10 10 con $prev_word1 ($prev_tag1), $this_word ($this_tag dubious)");
	
    // formulo le combinazioni BASILARI ART-NOUN tra stessi sessi. SONO
    if ($prev_pp_1['features'] == 'ART-M:s' && $this_pp['features'] == 'NOUN-m:s')  self::returnRule($target_index, '10-0', 'NOUN-m:s');
    if ($prev_pp_1['features'] == 'ART-M:p' && $this_pp['features'] == 'NOUN-m:p')  self::returnRule($target_index, '10-5', 'NOUN-m:p');
    if ($prev_pp_1['features'] == 'ART-F:s' && $this_pp['features'] == 'NOUN-f:s')  self::returnRule($target_index, '10-10', 'NOUN-f:s');
    if ($prev_pp_1['features'] == 'ART-F:p' && $this_pp['features'] == 'NOUN-f:p')  self::returnRule($target_index, '10-15', 'NOUN-f:p');

    if ($prev_word1 == 'la' && $this_pp['features'] == 'NOUN-f:s')  self::returnRule($target_index, '10-20', 'NOUN-f:s');

    if ($prev_word1 == 'le' && $this_pp['features'] == 'NOUN-f:p')  self::returnRule($target_index, '10-25', 'NOUN-f:p');

    // formulo le combinazioni BASILARI di esclusione ART-NOUN tra maschili e femminili
    if ($prev_pp_1['features'] == 'ART-M:s' && $this_pp['features'] == 'NOUN-f:s')  self::returnRule($target_index, '10-30', 'NOUN-f:s', - 2);
    if ($prev_pp_1['features'] == 'ART-M:p' && $this_pp['features'] == 'NOUN-f:s')  self::returnRule($target_index, '10-35', 'NOUN-f:s', - 2);

    if ($prev_pp_1['features'] == 'ART-M:s' && $this_pp['features'] == 'NOUN-f:p')  self::returnRule($target_index, '10-40', 'NOUN-f:p', - 2);
    if ($prev_pp_1['features'] == 'ART-M:p' && $this_pp['features'] == 'NOUN-f:p')  self::returnRule($target_index, '10-45', 'NOUN-f:p', - 2);

    if ($prev_pp_1['features'] == 'ART-F:s' && $this_pp['features'] == 'NOUN-m:s')  self::returnRule($target_index, '10-50', 'NOUN-m:s', - 2);
    if ($prev_pp_1['features'] == 'ART-F:p' && $this_pp['features'] == 'NOUN-m:s')  self::returnRule($target_index, '10-55', 'NOUN-m:s', - 2);

    if ($prev_pp_1['features'] == 'ART-F:s' && $this_pp['features'] == 'NOUN-m:p')  self::returnRule($target_index, '10-60', 'NOUN-m:p', - 2);
    if ($prev_pp_1['features'] == 'ART-F:p' && $this_pp['features'] == 'NOUN-m:p')  self::returnRule($target_index, '10-65', 'NOUN-m:p', - 2);  

    // added 01/09/2019
    if (instr($prev_pp_1['features'], 'VER:impr+pres+2') > 0 && instr($this_pp['features'], 'PPAST:part+past') > 0)  self::returnRule($target_index, '10-70', 'PPAST:part+past+m+s', - 2);  

      // rules based on specific terms

      /**
       * "gli" è art quando si usa davanti ai vocaboli che cominciano 
       * per vocale, gn, ps, pt, cn, pn, s seguita da conson., x, z: gli uomini, 
       * gli psicologi, gli strumenti, gli xenofobi, gli zingari; 
       * inoltre, davanti a dei: gli dei della Grecia;  come PRO più frequentemente
       */
      if ($prev_word1 == 'gli' && ! preg_match('/^(gn|ps|pt|cn|pn|st|a|e|i|o|u|x|z)/i', $this_word)) self::returnRule($target_index, '10-75', 'VER', 1.4);

      if ($prev_word1 == 'da' && instr($this_pp['features'], 'ver:ind+pres') == 0)	 self::returnRule($target_index, '10-80', 'VER', - 3);

      if ($prev_word1 == 'going' && $this_tag == 'NOUN')	 self::returnRule($target_index, '10-85', 'NOUN', - 1);
      
      if ($prev_word1 == 'into' && $this_tag == 'NOUN')	 self::returnRule($target_index, '10-86', 'NOUN', 1);

      if (preg_match('/(negli|nelle|nella|nello|nel)/i', $prev_word1) && ($this_tag == 'VER' || $this_tag == 'PPAST'))	 self::returnRule($target_index, '10-90', 'VER', -50);

      if (preg_match('/^(the|this|those)$/i', $prev_word1) && ($this_tag == 'VER' || $this_tag == 'PPAST'))	 self::returnRule($target_index, '10-95', 'VER', -2);
	
	if (preg_match('/^(the|this|that|those)$/i', $prev_word1) && ($this_tag == 'UNK'))	 self::returnRule($target_index, '10-100', 'NOUN');

	if (preg_match('/^(may|might|can|gonna|wanna)$/i', $prev_word1) && ($this_tag == 'VER' || $this_tag == 'PPAST'))	 self::returnRule($target_index, '10-105', 'VER', 3);

	if ($prev_word1 == 'of' && ($this_tag == 'VER' || $this_tag == 'PPAST'))	 self::returnRule($target_index, '10-110', 'VER', - self::$score_two_terms);

	if(self::$language == 'en')
	{
	if ($prev_word1 == 'a' && ($this_tag == 'VER' || $this_tag == 'PPAST'))	 self::returnRule($target_index, '10-115', 'VER', - self::$score_two_terms);
	
	if (preg_match('/^(the|my|your|him|them)$/i', $prev_word1) && ($this_tag == 'VER' || $this_tag == 'PPAST'))	 self::returnRule($target_index, '10-120', 'VER', - self::$score_two_terms);
	
	if ($prev_word1 == 'in' && ($this_tag == 'VER' || $this_tag == 'PPAST'))	 self::returnRule($target_index, '10-125', 'VER', - self::$score_two_terms);
	
	if (preg_match('/^(gonna|could|should|would)$/i', $prev_word1) && $this_tag == 'VER')	 self::returnRule($target_index, '10-127', 'VER');
	if (preg_match('/^(was)$/i', $prev_word1) && $this_pp['features'] == 'VER:ger+pres')	 self::returnRule($target_index, '10-128', 'VER');
	
	if ($prev_word1 == 'inside' && ($this_tag == 'VER' || $this_tag == 'PPAST'))	 self::returnRule($target_index, '10-130', 'VER', -50);
	
	if (preg_match('/^(good|nice)$/i', $prev_word1))	 self::returnRule($target_index, '10-135', 'VER', -3);
	
	if ($prev_word1 == 'i')    self::returnRule($target_index, '10-140', 'VER', 3);

	if ($prev_word1 == 'you')    self::returnRule($target_index, '10-145', 'VER');

	if ($prev_word1 == 'he')	 self::returnRule($target_index, '10-150', 'VER');
	
	if ($prev_word1 == 'she')	 self::returnRule($target_index, '10-155', 'VER');
	
	if ($prev_word1 == 'it')	 self::returnRule($target_index, '10-160', 'VER');
  
	if ($prev_word1 == 'with')    self::returnRule($target_index, '10-165', 'VER', - 3);
	
	if ($prev_word1 == 'every')    self::returnRule($target_index, '10-170', 'VER', - 3);
	
	if ($prev_word1 == 'each')    self::returnRule($target_index, '10-175', 'VER', - 3);
	
	if ($prev_word1 == 'in')    self::returnRule($target_index, '10-180', 'VER', - 3);

	if ($prev_word1 == 'enough')    self::returnRule($target_index, '10-185', 'VER', - 3);
	
	if ($prev_word1 == 'who')    self::returnRule($target_index, '10-190', 'VER', self::$score_three_terms);
	if ($prev_word1 == 'who')    self::returnRule($target_index, '10-191', 'PPAST', self::$score_three_terms);
	
	if ($prev_word1 == 'to')    self::returnRule($target_index, '10-195', 'VER',5);
	
//	if ($prev_word1 == 'be')    self::returnRule($target_index, '10-200', 'VER');

	if ($prev_word1 == 'we')	 self::returnRule($target_index, '10-205', 'VER');
	
	if ($prev_word1 == 'us')	 self::returnRule($target_index, '10-210', 'VER');

	if ($prev_word1 == 'they')	 self::returnRule($target_index, '10-215', 'VER');
	
	if ($prev_word1 == 'wanna')	 self::returnRule($target_index, '10-217', 'VER');


	if ($prev_word1 == 'without')    self::returnRule($target_index, '10-220', 'VER', -10);
	
	if ($prev_word1 == 'without')    self::returnRule($target_index, '10-225', 'PPAST', -10);
	
	if(($this_tag == 'ADJ' || $this_tag == 'UNK'))
	{
	 if ($prev_word1 == 'all')	 self::returnRule($target_index, '10-230', 'ADJ');
	
	}
	
	if(($this_tag == 'NOUN' || $this_tag == 'UNK'))
	{
	 if ($prev_word1 == 'this')	 self::returnRule($target_index, '10-235', 'NOUN');

	 if ($prev_word1 == 'that')	 self::returnRule($target_index, '10-240', 'NOUN');

	 if ($prev_word1 == 'those')	 self::returnRule($target_index, '10-245', 'NOUN');

	}
	
	if(($this_tag == 'VER' || $this_tag == 'UNK'))
	{
	 if ($prev_word1 == 'non')	 self::returnRule($target_index, '10-250', 'VER');
	 
	 if ($prev_word1 == 'already')	 self::returnRule($target_index, '10-255', 'VER');

	 if ($prev_word1 == 'have')	 self::returnRule($target_index, '10-260', 'VER');

	 if ($prev_word1 == 'had')	 self::returnRule($target_index, '10-265', 'VER');

	 if ($prev_word1 == 'if')	 self::returnRule($target_index, '10-270', 'VER');
	 
	 if ($prev_word1 == 'more')	 self::returnRule($target_index, '10-275', 'VER', - 2);
	 
	 if ($prev_word1 == 'less')	 self::returnRule($target_index, '10-280', 'VER', - 2);
	
	 if ($prev_word1 == 'is')	 self::returnRule($target_index, '10-281', 'ADJ', 3);
	 
	}
	

	}
	
	
	if (instr($prev_pp_1['features'], 'impr+pres+2+p') > 0 && $this_tag == 'VER')	 self::returnRule($target_index, '10-290', 'VER');

	// sicuri! dopo "mi, ti, ci, gliela glielo" etc. c'è sempre un verbo!!!!!
	if(self::$language != 'en')
	{
	// sicuri! dopo "questa questa quegli" etc. un verbo non c'è mai!!!!!
	if (instr($prev_pp_1['features'], 'PRO-DEMO') > 0)	 self::returnRule($target_index, '10-285', 'VER', - 30);
	if (instr($prev_pp_1['features'], 'PRO-PERS') > 0)	 self::returnRule($target_index, '10-295', 'VER', 30);
	}
	
	// added 16/06/2019 @todo metti i nuovi ADV:qty! penso la regola li riguardi tutti
	if ($prev_word1 == 'qualche' && ($this_tag == 'VER' || $this_tag == 'PPAST'))	 self::returnRule($target_index, '10-300', 'VER', -50);
	
	
	if ($prev_word1 == 'si' && $this_word == 'era')	 self::returnRule($target_index, '10-305', 'VER');
	
	if ($prev_word1 == 'si' && $this_word == 'dai')	 self::returnRule($target_index, '10-310', 'INT');

 	if ($prev_word1 == 'e' && $this_word == 'mezzo')	 self::returnRule($target_index, '10-315', 'ADJ');
	
	if ($prev_word1 == 'va' && $this_word == 'bene')	 self::returnRule($target_index, '10-320', 'ADV');
	
	if ($prev_pp_1['lemma'] == 'essere' && $this_word == 'ancora')	 self::returnRule($target_index, '10-325', 'ADV');
	
	// added 11/09/2019
	if ($prev_word1 == 'come_si' && ($this_tag == 'VER' || $this_tag == 'UNK')) self::returnRule($target_index, '10-330', 'VER',3);
	
	if ($prev_word1 == 'tutto' && $this_word == 'bene')	 self::returnRule($target_index, '10-335', 'ADV');
	
	if ($prev_word1 == 'uno' && $this_word == 'dei')	 self::returnRule($target_index, '10-340', 'NOUN', -10);
	
	if ($prev_word1 == 'il' && $this_word == 'sei')	 self::returnRule($target_index, '10-343', 'NUM');
	
	if ($prev_word1 == 'del' && $this_word == 'sei')	 self::returnRule($target_index, '10-344', 'NUM');
	if ($prev_word1 == 'nel' && $this_word == 'sei')	 self::returnRule($target_index, '10-345', 'NUM');
	
	if ($prev_word1 == 'il' && $this_word == 'sette')	 self::returnRule($target_index, '10-346', 'NUM');
	
	if ($prev_word1 == 'del' && $this_word == 'sette')	 self::returnRule($target_index, '10-347', 'NUM');
	if ($prev_word1 == 'del' && $this_word == 'sette')	 self::returnRule($target_index, '10-348', 'NUM');
	
	if ($prev_word1 == 'che' && $this_word == 'fa')	 self::returnRule($target_index, '10-349', 'VER');
	
	if (preg_match('/^(buon|buon[aeiou])$/i', $prev_word1))	 self::returnRule($target_index, '10-350', 'VER', -3);
	
	if ($prev_word1 == 'ecco')	 self::returnRule($target_index, '10-355', 'VER');

	if ($prev_word1 == 'ai')	 self::returnRule($target_index, '10-360', 'VER', - 3);

  // es. "a te lo fa" "fa" NON può essere un avverbio
  if ($prev_word1 == 'lo' || $prev_word1 == 'la' || $prev_word1 == 'le' || $prev_word1 == 'li') self::returnRule($target_index, '10-365', 'ADV', - 3);
  

	// added 05/08/2019
	if ($prev_word1 == 'per' && $this_pp['sh-feat'] == 'VER')   
	{
	 if($this_pp['features'] != 'VER:inf+pres')
		self::returnRule($target_index, '10-370', 'VER', - self::$score_two_terms);
	}
	
	if ($prev_word1 == 'con')    self::returnRule($target_index, '10-375', 'VER', - 3);
	
	if ($prev_word1 == 'ogni')    self::returnRule($target_index, '10-380', 'VER', - 3);
	
	if ($prev_word1 == 'in')    self::returnRule($target_index, '10-385', 'VER', - 3);

	if ($prev_word1 == 'abbastanza')    self::returnRule($target_index, '10-390', 'VER', - 3);
	
	if ($prev_word1 == 'chi')    self::returnRule($target_index, '10-395', 'VER', self::$score_three_terms);
	
	if ($prev_word1 == 'si')    self::returnRule($target_index, '10-400', 'VER');

	if ($prev_word1 == 'io')    self::returnRule($target_index, '10-405', 'VER');
	if ($prev_word1 == 'I')    self::returnRule($target_index, '10-406', 'VER');

	if ($prev_word1 == 'tu')    self::returnRule($target_index, '10-410', 'VER');
	if ($prev_word1 == 'you')    self::returnRule($target_index, '10-411', 'VER');

	if ($prev_word1 == 'lei')	 self::returnRule($target_index, '10-415', 'VER');
	if ($prev_word1 == 'she')	 self::returnRule($target_index, '10-416', 'VER');

	if ($prev_word1 == 'noi')	 self::returnRule($target_index, '10-420', 'VER');
	if ($prev_word1 == 'we')	 self::returnRule($target_index, '10-421', 'VER');

	if ($prev_word1 == 'voi')	 self::returnRule($target_index, '10-425', 'VER');

	if ($prev_word1 == 'loro')	 self::returnRule($target_index, '10-430', 'VER');
	if ($prev_word1 == 'they')	 self::returnRule($target_index, '10-431', 'VER');

	if ($prev_word1 == 'in')    self::returnRule($target_index, '10-435', 'NOUN');

	if ($prev_word1 == 'senza')    self::returnRule($target_index, '10-440', 'VER', -10);
	
	if ($prev_word1 == 'senza')    self::returnRule($target_index, '10-445', 'PPAST', -10);
	
	if ($prev_word1 == 'intanto')  self::returnRule($target_index, '10-450', 'NOUN', -10);
	
	if ($this_word == 'proprio' && ($prev_pp_1['lemma'] == 'essere' || $prev_pp_1['lemma'] == 'avere'))	 self::returnRule($target_index, '10-455', 'ADV');

	if ($prev_word1 == 'quanto' && ($this_pp['features'] == 'NOUN-f:s' || $this_pp['features'] == 'NOUN-f:p'))	 self::returnRule($target_index, '10-460', 'VER');
	
	if ($prev_word1 == 'quanta' && ($this_pp['features'] == 'NOUN-m:s' || $this_pp['features'] == 'NOUN-m:p'))	 self::returnRule($target_index, '10-465', 'VER');
	
	if ($prev_word1 == 'keep' && ($this_pp['features'] == 'VER:ger+pres'))	 self::returnRule($target_index, '10-466', 'VER');
		 
	// added 01/18, a me sembra che da qua non si scappi. $prev_pp_1 dovrebbero essere solo i VER
	// @todo ma allora anche gli adj etc.?
	if(instr($this_pp['features'], 'ind+pres') == 0 && instr($this_pp['features'], 'sub+pres') == 0)
	{
	 if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+2+s') > 0)		 self::returnRule($target_index, '10-470', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+3+s') > 0)		 self::returnRule($target_index, '10-475', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+1+p') > 0)		 self::returnRule($target_index, '10-480', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+2+p') > 0)		 self::returnRule($target_index, '10-485', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+1+s') > 0 && instr($this_pp['features'], '+3+p') > 0)		 self::returnRule($target_index, '10-490', 'VER', -10);

	 if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+1+s') > 0)		 self::returnRule($target_index, '10-500', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+3+s') > 0)		 self::returnRule($target_index, '10-505', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+1+p') > 0)		 self::returnRule($target_index, '10-510', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+2+p') > 0)		 self::returnRule($target_index, '10-515', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+2+s') > 0 && instr($this_pp['features'], '+3+p') > 0)		 self::returnRule($target_index, '10-520', 'VER', -10);

	 if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+1+s') > 0)		 self::returnRule($target_index, '10-525', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+2+s') > 0)		 self::returnRule($target_index, '10-530', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+1+p') > 0)		 self::returnRule($target_index, '10-535', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+2+p') > 0)		 self::returnRule($target_index, '10-540', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+3+s') > 0 && instr($this_pp['features'], '+3+p') > 0)		 self::returnRule($target_index, '10-545', 'VER', -10);


	 if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+2+p') > 0)		 self::returnRule($target_index, '10-550', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+3+p') > 0)		 self::returnRule($target_index, '10-555', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+1+s') > 0)		 self::returnRule($target_index, '10-560', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+2+s') > 0)		 self::returnRule($target_index, '10-565', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+1+p') > 0 && instr($this_pp['features'], '+3+s') > 0)		 self::returnRule($target_index, '10-570', 'VER', -10);

	 if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+1+p') > 0)		 self::returnRule($target_index, '10-575', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+3+p') > 0)		 self::returnRule($target_index, '10-580', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+1+s') > 0)		 self::returnRule($target_index, '10-585', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+2+s') > 0)		 self::returnRule($target_index, '10-590', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+2+p') > 0 && instr($this_pp['features'], '+3+s') > 0)		 self::returnRule($target_index, '10-595', 'VER', -10);

	 if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+1+p') > 0)		 self::returnRule($target_index, '10-600', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+2+p') > 0)		 self::returnRule($target_index, '10-605', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+1+s') > 0)		 self::returnRule($target_index, '10-610', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+2+s') > 0)		 self::returnRule($target_index, '10-615', 'VER', -10);
	 if (instr($prev_pp_1['features'], '+3+p') > 0 && instr($this_pp['features'], '+3+s') > 0)		 self::returnRule($target_index, '10-620', 'VER', -10);
	}

	if(($this_tag == 'ADJ' || $this_tag == 'UNK'))
	{
	 if ($prev_word1 == 'tutto')	 self::returnRule($target_index, '10-625', 'ADJ');

	 if ($prev_word1 == 'sarebbe')	 self::returnRule($target_index, '10-630', 'ADJ');
	
	}
	
	if(($this_tag == 'NOUN' || $this_tag == 'UNK'))
	{
//	 if ($prev_word1 == 'come')	 self::returnRule($target_index, '10-635', 'NOUN');
	 
	 if ($prev_word1 == 'questi')	 self::returnRule($target_index, '10-640', 'NOUN');

	 if ($prev_word1 == 'questo')	 self::returnRule($target_index, '10-645', 'NOUN');

	 if ($prev_word1 == 'questa')	 self::returnRule($target_index, '10-650', 'NOUN');

	 if ($prev_word1 == 'queste')	 self::returnRule($target_index, '10-655', 'NOUN');

	 if ($prev_word1 == 'questi')	 self::returnRule($target_index, '10-660', 'NOUN');

	}
	
	if(($this_tag == 'VER' || $this_tag == 'UNK'))
	{
	 if ($prev_word1 == 'ho')	 self::returnRule($target_index, '10-665', 'VER');

	 if ($prev_word1 == 'hai')	 self::returnRule($target_index, '10-670', 'VER');

	 if ($prev_word1 == 'ha')	 self::returnRule($target_index, '10-675', 'VER');

	 if ($prev_word1 == 'abbiamo')   self::returnRule($target_index, '10-680', 'VER');

	 if ($prev_word1 == 'avete')	 self::returnRule($target_index, '10-685', 'VER');

	 if ($prev_word1 == 'hanno')	 self::returnRule($target_index, '10-690', 'VER');
	 
	 
	 if ($prev_word1 == 'non')	 self::returnRule($target_index, '10-700', 'VER');
	 
	 if ($prev_word1 == 'perchè')	 self::returnRule($target_index, '10-705', 'VER');

	 if ($prev_word1 == 'già')	 self::returnRule($target_index, '10-710', 'VER');
	 
	 if ($prev_word1 == 'se')	 self::returnRule($target_index, '10-715', 'VER');
	 
	 if ($prev_word1 == 'più')	 self::returnRule($target_index, '10-720', 'VER', - 2);
	 
	}
	
	if ($prev_tag1 == 'ADJ')
	{
	 if ($this_word == 'stato')	 self::returnRule($target_index, '10-725', 'NOUN');
	 
	 if ($this_pp['features']  == 'VER:ind+pres+3+s')	 self::returnRule($target_index, '10-726', 'NOUN', 2);
	}
	
	if ($prev_tag1 == 'ADV')
	{
	 if ($this_word == 'ora')	 self::returnRule($target_index, '10-730', 'ADV');

	 if ($this_word == 'oltre')	 self::returnRule($target_index, '10-735', 'ADV');

	 if ($this_word == 'che')	 self::returnRule($target_index, '10-740', 'CON');

	 if ($this_word == 'sotto')	 self::returnRule($target_index, '10-745', 'ADV');

	 if ($this_word == 'che')	 self::returnRule($target_index, '10-750', 'CON');

	 if ($this_word == 'te')	 self::returnRule($target_index, '10-755', 'PRO');
	 
	 if ($this_word == 'loro')	 self::returnRule($target_index, '10-760', 'PRO');
	
	 if ($this_word == 'fatto')	 self::returnRule($target_index, '10-765', 'PPAST');

	 if ($this_word == 'punta')	 self::returnRule($target_index, '10-770', 'NOUN');

	 if ($this_word == 'altre')	 self::returnRule($target_index, '10-775', 'DET');

	 if ($this_word == 'diversa') self::returnRule($target_index, '10-780', 'PRO');
     
	 if($prev_pp_1['features'] != 'ADV:qty' && $prev_pp_1['features'] != 'ADV:how')
   if ($this_tag == 'NOUN')	 self::returnRule($target_index, '10-785', 'NOUN', - self::$score_two_terms);
	}
	
	if ($prev_tag1 == 'ART')
	{
	 if ($this_word == 'fa')	 self::returnRule($target_index, '10-790', 'VER');
	 
	 if ($this_tag == 'UNK')	 self::returnRule($target_index, '10-795', 'NOUN');
	
	 if ($this_tag == 'DET')	 self::returnRule($target_index, '10-800', 'DET');
	 
	 if ($this_tag == 'NUM')	 self::returnRule($target_index, '10-802', 'NUM');
	 
	}
	
	if ($prev_tag1 == 'ARTPRE')
	{
	 if ($this_tag == 'NOUN')	 self::returnRule($target_index, '10-805', 'NOUN', 1);
	 
	 // ma no, sospenso il 10/2019
//	 if ($this_tag == 'ADJ')	 self::returnRule($target_index, '10-810', 'ADJ');
	}
	
	if ($prev_tag1 == 'CON')
	{
	 if ($this_word == 'altra')	 self::returnRule($target_index, '10-815', 'DET');
	}
	
	if ($prev_tag1 == 'NUM' || $prev_tag1 == 'DET' || $prev_tag1 == 'AMOUNT')
	{
	 if ($this_word == 'secondo')	 self::returnRule($target_index, '10-820', 'PRO');

	 if ($this_word == 'male')	 self::returnRule($target_index, '10-825', 'NOUN');

	 if ($this_word == 'proprio')	 self::returnRule($target_index, '10-830', 'ADV');

	 if ($this_word == 'certo')	 self::returnRule($target_index, '10-835', 'ADJ');

	 if ($this_word == 'anche')	 self::returnRule($target_index, '10-840', 'CON');

	 if ($this_word == 'prima')	 self::returnRule($target_index, '10-845', 'ADJ');

	 if ($this_word == 'bene')	 self::returnRule($target_index, '10-850', 'NOUN');

	 if ($this_word == 'cui')	 self::returnRule($target_index, '10-855', 'DET');

	 if ($this_word == 'ora')	 self::returnRule($target_index, '10-860', 'NOUN');
	 
	 if ($this_word == 'quale')	 self::returnRule($target_index, '10-865', 'PRO');
	
	 if ($this_word == 'tale')	 self::returnRule($target_index, '10-870', 'ADJ');

	 if ($this_word == 'pochi')	 self::returnRule($target_index, '10-875', 'ADJ');

	 if ($this_word == 'fatto')	 self::returnRule($target_index, '10-880', 'NOUN');

	 if ($this_word == 'stato')	 self::returnRule($target_index, '10-885', 'NOUN');

	 if ($this_word == 'stato')	 self::returnRule($target_index, '10-890', 'NOUN');

	 if ($this_word == 'altro')	 self::returnRule($target_index, '10-900', 'PRO');

	 if ($this_word == 'altra')	 self::returnRule($target_index, '10-905', 'PRO');

	 if ($this_tag == 'NOUN')	 self::returnRule($target_index, '10-910', 'NOUN');
	  
	 // dopo di un numero generalmente non può esserci un ver!
	 if ($this_tag == 'PPAST' || $this_tag == 'UNK')	 self::returnRule($target_index, '10-915', 'NOUN');
	 
	 if ($this_word == 'mila')	 self::returnRule($target_index, '10-920', 'NUM');
	 
	}
	
	if ($prev_tag1 == 'NOUN')
	{
	 if ($this_word == 'dei')	 self::returnRule($target_index, '10-925', 'PRE');

	 if ($this_word == 'interno')	 self::returnRule($target_index, '10-930', 'ADJ');

	 if ($this_word == 'conto')	 self::returnRule($target_index, '10-935', 'NOUN');

	 if ($this_word == 'particolare')	 self::returnRule($target_index, '10-940', 'ADJ');

	 if ($this_word == 'contrario')	 self::returnRule($target_index, '10-945', 'ADJ');

	 if ($this_word == 'via')	 self::returnRule($target_index, '10-950', 'ADV');

	 if ($this_word == 'quali')	 self::returnRule($target_index, '10-955', 'ADV');

	 if ($this_word == 'diversi')	 self::returnRule($target_index, '10-960', 'ADJ');

	 if ($this_word == 'determinata')	 self::returnRule($target_index, '10-965', 'ADJ');

	 if ($this_word == 'chiuso')	 self::returnRule($target_index, '10-970', 'ADJ');

	 if ($this_word == 'basata')	 self::returnRule($target_index, '10-975', 'ADJ');
	 
	 if ($this_word == 'ha')	 self::returnRule($target_index, '10-980', 'VER');
	 
	}

	if ($prev_tag1 == 'NPR')
	{
	 if ($this_word == 'come')	 self::returnRule($target_index, '10-985', 'ADV');
	}
	
	if ($prev_tag1 == 'PON')
	{
	 if ($this_word == 'specie')	 self::returnRule($target_index, '10-990', 'ADV');
	 
	 if ($this_word == 'scusa')	 self::returnRule($target_index, '10-995', 'VER');
	 
	}

	if ($prev_tag1 == 'PRE')
	{
	    if (self::$language != 'en')
	    {
		if ($this_tag == 'NOUN' || $this_tag == 'UNK')
		    self::returnRule($target_index, '10-1000', 'NOUN');
		
		if ($this_tag == 'NPR')
		    self::returnRule($target_index, '10-1000', 'NPR');
	    }
	}
	
	if ($prev_tag1 == 'PRO')
	{
	 if ($this_word == 'altri')	 self::returnRule($target_index, '10-1005', 'PRO');
   
   if (($this_tag == 'VER' || $this_tag == 'UNK'))	 self::returnRule($target_index, '10-1010', 'ADV');
	}
	
	if ($prev_tag1 == 'SENT')
	{
	 if ($this_word == 'nono')	 self::returnRule($target_index, '10-1015', 'INT');
	}
	
	if ($prev_tag1 == 'SMI' || $prev_tag1 == 'INT')
	{
	 if ($this_word == 'scusa')	 self::returnRule($target_index, '10-1020', 'VER');
	}
	
	if ($prev_tag1 == 'VER')
	{
	 if ($this_word == 'via')	 self::returnRule($target_index, '10-1025', 'ADV');

	 if ($this_word == 'nota')	 self::returnRule($target_index, '10-1030', 'ADJ');

	 if ($this_word == 'cosa')	 self::returnRule($target_index, '10-1035', 'PRO');

	 if ($this_word == 'che')	 self::returnRule($target_index, '10-1040', 'CON');

	 if ($this_word == 'avanti')	 self::returnRule($target_index, '10-1045', 'ADV');

	 if ($this_word == 'se')	 self::returnRule($target_index, '10-1050', 'PRO');

	 if ($this_word == 'loro')	 self::returnRule($target_index, '10-1055', 'PRO');
	
	 // added 10/2019
	 if($prev_word1 != 'can' && $prev_pp_1['features'] == 'VER:inf+pres' && $this_tag == 'NOUN')
	    self::returnRule($target_index, '10-1056', 'NOUN', .4);
	}
	
	
	/**
	 * Participio passato!
	 * Perlomeno cercando di risolvere caso per caso nel modo più sicuro possibile
	 */
	if (preg_match('/(avere|essere|venire|volere|stare|potere|dovere|osare)/i', $prev_pp_1['lemma']) && instr($this_pp['features'], 'PPAST') > 0)	 self::returnRule($target_index, '10-1060', 'PPAST');
	
 }


 // 01 first to define, second well defined
 public static function rulesPattern01($target_index, $this_pp, $next_pp_1, $dbgme = false)
 {
		
    $this_word = $this_pp['form'];
    $this_tag = $this_pp['sh-feat'];

    $nextword1 = $next_pp_1['form'];
    $next_tag1 = $next_pp_1['sh-feat']; // unica 2

    // nextTag1 è la parola unica, this_word quella precedente che viene ripulita
    if ($dbgme)
     echox("----- ".__LINE__." rulesPattern01 01 con $this_word ($this_tag dubious), $nextword1 ($next_tag1)");

    if ($target_index == 1 && ($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'alle') self::returnRule($target_index, '01-0', 'VER');
    if ($target_index == 1 && ($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'a')	 self::returnRule($target_index, '01-5', 'VER');
    if ($target_index == 1 && ($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'al')	 self::returnRule($target_index, '01-10', 'VER');
    if ($target_index == 1 && ($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'ai')	 self::returnRule($target_index, '01-15', 'VER');
    if ($target_index == 1 && ($this_tag == 'VER' || $this_tag == 'UNK') && $nextword1 == 'at')	 self::returnRule($target_index, '01-20', 'VER');

    if ($target_index == 1 && $this_word == 'mm') self::returnRule($target_index, '01-25', 'INT');


    if ($this_word == 'vicino' && $nextword1 == 'a') self::returnRule($target_index, '01-30', 'ADV');

    if ($this_word == 'rispetto' && $nextword1 == 'a') self::returnRule($target_index, '01-35', 'ADV');

    if ($this_word == 'se' && $nextword1 == 'ne')	 self::returnRule($target_index, '01-45', 'PRO');

    if ($this_word == 'sia' && $nextword1 == 'i')	 self::returnRule($target_index, '01-50', 'CON');

    if ($this_word == 'sia' && $nextword1 == 'per')	 self::returnRule($target_index, '01-55', 'CON');

    if ($this_word == 'primi' && $nextword1 == 'del') self::returnRule($target_index, '01-60', 'PRO');

    if ($this_word == 'meno' && $nextword1 == 'di')	 self::returnRule($target_index, '01-65', 'PRO');
    
    if ($this_word == 'may' && $nextword1 == 'be')	 self::returnRule($target_index, '01-66', 'VER');

    if ($this_word == 'visto' && $nextword1 == 'che') self::returnRule($target_index, '01-70', 'VER');


    if($next_tag1 == 'ADJ')
    {
     if ($this_word == '1')	 self::returnRule($target_index, '01-75', 'DET');

     if ($this_word == 'che')	 self::returnRule($target_index, '01-80', 'CON');

    }

    if($next_tag1 == 'ART')
    {
     if ($this_word == 'entro')	 self::returnRule($target_index, '01-85', 'ADV');

    }

    if($next_tag1 == 'DATE')
    {
     if ($this_word == 'data')	 self::returnRule($target_index, '01-90', 'NOUN');

    }

    if($next_tag1 == 'DET')
    {
     if ($this_word == 'dei')	 self::returnRule($target_index, '01-95', 'PRE');

     if ($this_word == 'sopra')	 self::returnRule($target_index, '01-100', 'ADV');

     if ($this_word == 'salvo')	 self::returnRule($target_index, '01-105', 'ADV');

     if ($this_word == 'dietro')	 self::returnRule($target_index, '01-110', 'ADV');

     if ($this_word == 'altri')	 self::returnRule($target_index, '01-115', 'DET');

     if ($this_word == 'nei')	 self::returnRule($target_index, '01-120', 'ARTPRE');
    }

    if($next_tag1 == 'NPR')
    {
     if ($this_word == 'scusa')	 self::returnRule($target_index, '01-125', 'VER');

     if ($this_word == 'di')	 self::returnRule($target_index, '01-130', 'NPR');

     if ($this_word == 'centro')	 self::returnRule($target_index, '01-135', 'NPR');

     if ($this_word == '1')	 self::returnRule($target_index, '01-140', 'DET');

    }

    if ($this_word == 'dei' && ($next_tag1 == 'NUM' || $next_tag1 == 'DET' || $next_tag1 == 'AMOUNT'))	 self::returnRule($target_index, '01-145', 'PRE');

    if($next_tag1 == 'PON')
    {
     if ($this_word == 'sotto')	 self::returnRule($target_index, '01-150', 'ADV');

     if ($this_word == 'dopo')	 self::returnRule($target_index, '01-155', 'ADV');

     if ($this_word == 'su')	 self::returnRule($target_index, '01-160', 'ADV');

    }

    if($next_tag1 == 'PRE')
    {
	if(self::$language == 'en')
	{
	    if($this_pp['features'] == 'VER:ger+pres')	 self::returnRule($target_index, '01-163', 'VER');
	}
    }
    
    if($next_tag1 == 'PRO')
    {
     if ($this_word == 'verso')	 self::returnRule($target_index, '01-165', 'ADV');

     if ($this_word == 'quel')	 self::returnRule($target_index, '01-170', 'PRO');

     if ($this_word == 'altro')	 self::returnRule($target_index, '01-175', 'PRO');

     if ($this_word == 'secondo')	 self::returnRule($target_index, '01-180', 'ADV');

    }

    if($next_tag1 == 'NOUN')
    {
     if ($this_word == 'dei')	 self::returnRule($target_index, '01-185', 'PRE');

     if ($this_word == 'dai')	 self::returnRule($target_index, '01-190', 'ARTPRE');

     if ($this_word == 'dagli')	 self::returnRule($target_index, '01-195', 'ARTPRE');

     if ($this_word == 'prima')	 self::returnRule($target_index, '01-200', 'ADJ');

     if ($this_word == 'salvo')	 self::returnRule($target_index, '01-205', 'ADV');

     if ($this_word == 'non')	 self::returnRule($target_index, '01-210', 'ADV');

     if ($this_word == 'fuori')	 self::returnRule($target_index, '01-215', 'ADV');

     if ($this_word == 'massimo') self::returnRule($target_index, '01-220', 'ADJ');

     if ($this_word == 'mezzo')	 self::returnRule($target_index, '01-225', 'ADJ');

     if ($this_word == 'stati')	 self::returnRule($target_index, '01-230', 'NOUN');

     if ($this_word == 'quali')	 self::returnRule($target_index, '01-235', 'DET');

     if ($this_word == 'secondo') self::returnRule($target_index, '01-240', 'ADJ');

     if(isset($next_pp_1['metadata']['ref']) && in_array('occup', $next_pp_1['metadata']['ref']))
	self::returnRule($target_index, '01-242', 'NPR');

    }

    if($next_tag1 == 'VER')
    {
	if ($this_word == 'lo')	 self::returnRule($target_index, '01-245', 'PRO');

	if ($this_word == 'tale')	 self::returnRule($target_index, '01-250', 'DET');

	if ($this_word == 'era')	 self::returnRule($target_index, '01-255', 'VER');

	if ($this_word == 'sono')	 self::returnRule($target_index, '01-260', 'VER');

	if ($this_word == 'va')	 self::returnRule($target_index, '01-265', 'VER');

	if ($this_word == 'fosse')	 self::returnRule($target_index, '01-270', 'VER');

	if ($this_word == 'avere')	 self::returnRule($target_index, '01-275', 'VER');

	if ($this_word == 'sa')	 self::returnRule($target_index, '01-280', 'VER');

	if ($this_word == 'altro')	 self::returnRule($target_index, '01-285', 'PRO');

	if ($this_word == 'altri')	 self::returnRule($target_index, '01-290', 'PRO');

	if ($this_word == 'altre')	 self::returnRule($target_index, '01-295', 'PRO');

	if ($this_word == 'lungo')	 self::returnRule($target_index, '01-300', 'ADJ');

	if ($this_word == 'can')	 self::returnRule($target_index, '01-305', 'VER',5);

    }


    if ($nextword1 == 'così')	 self::returnRule($target_index, '01-310', 'PRO');

    if ($nextword1 == 'stesso')	 self::returnRule($target_index, '01-315', 'PRO');

    if ($nextword1 == 'essere')	 self::returnRule($target_index, '01-320', 'DET');

    if ($nextword1 == 'suo')	 self::returnRule($target_index, '01-325', 'DET');

    if ($nextword1 == 'in')		 self::returnRule($target_index, '01-330', 'PRO');

    if ($nextword1 == 'a')		 self::returnRule($target_index, '01-335', 'PRO');

    if ($nextword1 == 'stata')	 self::returnRule($target_index, '01-340', 'VER');

    if ($nextword1 == 'corso')	 self::returnRule($target_index, '01-345', 'VER');

    if ($nextword1 == 'data')	 self::returnRule($target_index, '01-350', 'VER');

    if ($nextword1 == 'letto')	 self::returnRule($target_index, '01-355', 'VER');

    if ($nextword1 == 'tratto')	 self::returnRule($target_index, '01-360', 'VER');

    if ($nextword1 == 'resa')	 self::returnRule($target_index, '01-365', 'VER');

    if ($nextword1 == 'meglio')	 self::returnRule($target_index, '01-370', 'VER');

    if ($nextword1 == 'stato')	 self::returnRule($target_index, '01-375', 'ADJ');
    
 }

 
}

// and class definition
if (!class_exists('NaiPosTagger\\PosTagging\\NaiBrillsRulesTrait')) {
class NaiBrillsRulesTrait extends PosBrillsRules {
 use BrillsRulesTrait;
}
}
