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
class NaiAmountsFilterTest extends TestCase
{

    protected function setUp()
    {
    }
    
    public function testTransform()
    {
	
	$sentence = NaiAmountsFilter::transform('12 euro');
	// FROM SENTENCE STRING TO ARRAY POS_ARR
	$pos_arr = NaiPosArr::sentenceToPosArray($sentence);
	// RESTORE PRESERVED TOKENS
	$pos_arr = NaiSentence::unpreservePosArr($pos_arr);
	
        $this->assertEquals('AMOUNT', $pos_arr[0][0]['features']);
	
	
	$sentence = NaiAmountsFilter::transform('1.200 Dollars');
	// FROM SENTENCE STRING TO ARRAY POS_ARR
	$pos_arr = NaiPosArr::sentenceToPosArray($sentence);
	// RESTORE PRESERVED TOKENS
	$pos_arr = NaiSentence::unpreservePosArr($pos_arr);
	
        $this->assertEquals('AMOUNT', $pos_arr[0][0]['features']);
	
	
	$sentence = NaiAmountsFilter::transform('Euro 33.00');
	// FROM SENTENCE STRING TO ARRAY POS_ARR
	$pos_arr = NaiPosArr::sentenceToPosArray($sentence);
	// RESTORE PRESERVED TOKENS
	$pos_arr = NaiSentence::unpreservePosArr($pos_arr);
	
        $this->assertEquals('AMOUNT', $pos_arr[0][0]['features']);	
    }

}
