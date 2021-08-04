<?php

/*
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace NaiPosTagger\Filters;


/**
 * Some of most common italian terms has more than one function but really rare,
 * or however really less frequent. The first method, let only functions more frequent
 * to avoid stupid dubts. With the second method fix them if detect the rarest.
 * 
 */
class NaiCommonSimplifier
{
    /** Class debugger flag true false */
    public $dbgme = false;
    
    public $complex_common_terms = [];

    /** remember removed function for second step */
    public $removed_pos_parts = [];

    
    public function __construct()
    {
	$complex_common_terms_set = [];
	$complex_common_terms_set['a'] = 'PRE';
	$complex_common_terms_set['ad'] = 'PRE';
	$complex_common_terms_set['ai'] = 'ARTPRE';
	$complex_common_terms_set['al'] = 'ARTPRE';
	$complex_common_terms_set['anche'] = 'CON';
	$complex_common_terms_set['ancora'] = 'ADV:tim';
	$complex_common_terms_set['avere'] = 'VER:inf+pres';
	$complex_common_terms_set['bene'] = 'ADV:mod';
	$complex_common_terms_set['campi'] = 'NOUN-m:p';
	$complex_common_terms_set['ci'] = 'PRO-PERS-CLI-1-M-P';
	$complex_common_terms_set['dei'] = 'ARTPRE-M:p';
	$complex_common_terms_set['detto'] = 'PPAST:part+past+m+s';
	$complex_common_terms_set['di'] = 'PRE';
	$complex_common_terms_set['ed'] = 'CON';
	$complex_common_terms_set['era'] = 'VER:ind+impf+3+s';
	$complex_common_terms_set['essere'] = 'VER:inf+pres';
	$complex_common_terms_set['fine'] = 'NOUN-m:s';
	$complex_common_terms_set['i'] = 'ART-M:p';
	$complex_common_terms_set['io'] = 'PRO-PERS-1-M-S';
	$complex_common_terms_set['la'] = 'ART-F:s';
	$complex_common_terms_set['ma'] = 'CON';
	$complex_common_terms_set['mi'] = 'PRO-PERS-CLI-1-M-S';
	$complex_common_terms_set['mia'] = 'ADJ:pos+f+s';
	$complex_common_terms_set['ne'] = 'PRO-INDEF-M-S';
	$complex_common_terms_set['nei'] = 'ARTPRE-M:p';
	$complex_common_terms_set['o'] = 'CON';
	$complex_common_terms_set['presso'] = 'ADV:plc';
	$complex_common_terms_set['serie'] = 'NOUN-f:s';
	$complex_common_terms_set['ufficio'] = 'NOUN-m:s';
	
	$this->complex_common_terms = $complex_common_terms_set;
    }

    
    /**
     * Search terms indicated and force more frequent feature.
     * 
     * @param array $pos_dictionary
     * @return array $pos_dictionary
     */
    public function simplify($pos_dictionary)
    {
	foreach ($pos_dictionary as $index => $pos_part)
	{

	    if(!isset($pos_part[0]) || !isset($this->complex_common_terms[$pos_part[0]['form']]))
		continue;

	    
	    if(isset($this->complex_common_terms[$pos_part[0]['form']]))
	    {
		if($this->dbgme)
		    echox('- keep '.$this->complex_common_terms[$pos_part[0]['form']]. ' after '.$pos_part[0]['form']);
		
		foreach ($pos_part as $subindex => $subpart)
		{
		    if(count($pos_dictionary[$index]) == 1)
			break;
//	echox('-- cfr '.$subpart['features'] . ' vs '. $this->complex_common_terms[$pos_part[0]['form']]);	    
		    if($subpart['features'] != $this->complex_common_terms[$pos_part[0]['form']])
		    {
			if($this->dbgme)
			    echox('-- remove pos tag '.$subpart['features']. ' in form '.$pos_part[0]['form']);
			
			$this->removed_pos_parts[$index][$subindex] = $pos_dictionary[$index][$subindex];
			
			unset($pos_dictionary[$index][$subindex]);
		    }
//		     echox(count($pos_dictionary[$index]));
		}
		
		// put in safe deleted features
		$pos_dictionary[$index] = array_values($pos_dictionary[$index]);
	    }
	}
	
//	diex($pos_dictionary);

	return $pos_dictionary;
    }

    
    /**
     * If needed...
     * 
     * @param array $pos_arr
     * @return array $pos_arr
     */
    public function fix($pos_arr)
    {
//	diex($this->removed_pos_parts);
	
	// @todo
	// ...
	
	
	return $pos_arr;
    }
    

}
