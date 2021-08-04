<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace NaiPosTagger\Filters;

use PHPUnit\Framework\TestCase;
use NaiPosTagger\Models\NaiSentence;
use NaiPosTagger\Models\NaiPosArr;


require_once 'bootstrap.php';

require_once (__DIR__.'/../src/Utilities/common_functions_helper.php');


/**
 * Description of this Test script
 *
 */

class NaiEmailFilterTest extends TestCase
{

    protected $object;
    

    protected function setUp()
    {
//	$this->object = NaiUrlFilter;
    }
    
    public function testTransform()
    {
	
	$sentence = NaiEmailFilter::transform('pippo@libero.it');
	
	// FROM SENTENCE STRING TO ARRAY POS_ARR
	$pos_arr = NaiPosArr::sentenceToPosArray($sentence);
//	diex($pos_arr);

	// RESTORE PRESERVED TOKENS
	$pos_arr = NaiSentence::unpreservePosArr($pos_arr);
//	diex(serialize($pos_arr));
	
//	$expected = 'a:1:{i:0;a:1:{i:0;a:8:{s:4:"form";s:15:"pippo@libero.it";s:5:"lemma";s:15:"pippo@libero.it";s:8:"features";s:3:"EML";s:7:"sh-feat";s:3:"EML";s:8:"metadata";a:1:{s:3:"ref";a:1:{i:0;s:4:"attr";}}s:5:"label";s:0:"";s:4:"rule";s:0:"";s:9:"pos_score";i:0;}}}<br>- stopped from diex()';
	
        $this->assertEquals('EML', $pos_arr[0][0]['features']);
	

    }
}
