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

require_once('../../php-pos-tagger/src/Filters/NaiDatesTrait_it.php');

/**
 * Description of this Test script
 *
 */
class NaiDatesFilterTest extends TestCase
{

    public function testTransform()
    {
	
	$sentence = NaiDatesFilter::transform('31/10/1980');
	// FROM SENTENCE STRING TO ARRAY POS_ARR
	$pos_arr = NaiPosArr::sentenceToPosArray($sentence);
	// RESTORE PRESERVED TOKENS
	$pos_arr = NaiSentence::unpreservePosArr($pos_arr);
	
        $this->assertEquals('DATE', $pos_arr[0][0]['features']);
	
    }

}
