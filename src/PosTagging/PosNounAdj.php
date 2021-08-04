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
 * Some ADJs es. "superiore" can be also a NOUN.
 * They have the same form and lemma in all the variants, so into database NOUNs are removed
 * and ADJs have a metadata {"nnadj":1} so NOUNs can be created on the fly.
 */
 
class PosNounAdj
{

    /**
     * Into DB tables are present only ADJ with a metadata key {"nnadj":1}
     * 
     * @param array $pos_arr
     * @return array $pos_arr
     */
    public static function transform($pos_arr)
    {
	foreach ($pos_arr as $n => $pos_part)
	{
	    foreach ($pos_part as $subpart)
	    {
		if(! isset($subpart['metadata']['nnadj']))
		    continue;
	    
		// if found nnadj, create a new pos part for the relative NOUN
		$new_noun_part = $subpart;
		$new_noun_part['features'] = preg_replace('/ADJ\:pos\+(m|f)\+(s|p)/', 'NOUN-$1:$2', $pos_arr[$n][0]['features']);
		$new_noun_part['sh-feat'] = 'NOUN';

		array_push($pos_arr[$n], $new_noun_part);
		
		break;
	    }
	}
	
	return $pos_arr;
    }

}
