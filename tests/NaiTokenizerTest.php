<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace NaiPosTagger\Tokenizers;

use PHPUnit\Framework\TestCase;

require_once 'bootstrap.php';

require_once (__DIR__.'/../src/Utilities/common_functions_helper.php');


/**
 * Description of this Test script
 *
 */
class NaiTokenizerTest extends TestCase
{

    protected $object;
    

    protected function setUp()
    {
//	$this->object = NaiUrlFilter;
    }
    
    public function testTransform()
    {
        $this->assertEquals('! ! niente .', NaiTokenizer::transform('!!niente.'));

    }
}
