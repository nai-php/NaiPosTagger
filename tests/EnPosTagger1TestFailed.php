<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NaiPosTagger;

use PHPUnit\Framework\TestCase;
use Aura\Sql\ExtendedPdo;
use NaiPosTagger\Models\NaiPosArr;
use NaiPosTagger\Pipelines\PipelinePosTagging;

define('DICTIONARIES_PATH', __DIR__ . '/../../../dictionaries/dictionaries-');

define('KNOWLEDGES_PATH', __DIR__ . '/../../../knowledges/');

define('TRAITS_PATH', __DIR__ . '/../src/');

require_once (realpath(__DIR__ . '/../../../vendor/autoload.php'));

require_once realpath(__DIR__ . '/../../../vendor/nai-php/naipostagger/src/Utilities/common_functions_helper.php');


/**
 * Tests for english language pos tagging on "Just Shoot Me" movie subtitles.
 * These are sentences with some wrong tagged token.
 */
class EnPosTagger1TestFailed extends TestCase
{

    public function testPosTagging1628754941_60() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "And I honestly believe the readers of Blush are willing, even eager to help fight for";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S ADV VER:inf+pres ART-M:s NOUN-m:p PRE NOUN-m:s AUX:ind+pres+2+s VER:ger+pres PON:sep ADJ:pos+m+s ADJ:pos+m+s PRE VER:inf+pres VER:inf+pres PRE SENT");
    }

    public function testPosTagging1628754941_9326() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Micah throws, Gallo swings.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR VER:ind+pres+3+s PON:sep NPR VER:ind+pres+3+s SENT");
    }

    public function testPosTagging1628754941_1560() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "My biological parents have found me and will be here in half an hour.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p AUX:inf+pres VER:inf+pres PRO-PERS-1-M-S CON AUX:inf+pres VER:inf+pres ADV:plc PRE NOUN-m:s NUM NOUN-m:s SENT");
    } 

    public function testPosTagging1628754941_9615() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I always fantasized that my birth parents were, you know, movie stars or wealthy jet-setters.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV PPAST:part+past+m+s PRO-DEMO-M-S ADJ:pos+m+s NOUN-m:s NOUN-m:p VER:ind+past+3+p PON:sep PRO-PERS-2-M-S VER:inf+pres PON:sep NOUN-m:s NOUN-m:p CON:or ADJ:pos+m+s NOUN-m:s PON:sep NOUN-m:p SENT");
    }

    public function testPosTagging1628754941_917() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "This is, uh, I'm drawing a blank.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s PON:sep INT:surp PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_9841() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, now, Libby, now, we're not 100% sure, we still need her to take a blood test.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other ADV PON:sep NPR PON:sep ADV PON:sep PRO-PERS-1-M-P VER:ind+pres+1+s ADV:neg NUM ADJ:pos+m+s PON:sep PRO-PERS-1-M-P ADV:tim VER:inf+pres PRO-PERS-3-F-S PRE VER:inf+pres PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_2517() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Man, pumping iron is hard.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep 	VER:ger+pres NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754941_4275() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "When you can lift your gym bag with one arm.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:when PRO-PERS-2-M-S VER:inf+pres VER:inf+pres ADJ:pos+m+s NOUN-m:s NOUN-m:s PRE NUM NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_7894() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So, on one of those hikes, did you ever see something in nature that just didn't quite fit?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRE NUM PRE DET NOUN-m:p PON:sep PPAST:part+past+m+s PRO-PERS-2-M-S ADV VER:inf+pres NOUN-m:s PRE NOUN-m:s PRO-DEMO-M-S ADV PPAST:part+past+m+s ADV:neg ADV VER:inf+pres SENT:qst");
    }

    public function testPosTagging1628754966_3416() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I don't know, like, like a really skinny tree with branches that are way too big for its trunk.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres PON:sep ADV PON:sep ADV PRE ADV ADJ:pos+m+s NOUN-m:s PRE NOUN-m:p PRO-DEMO-M-S VER:ind+pres+2+s NOUN-m:s ADV ADJ:pos+m+s PRE ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_3625() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "\"Rattle when you need us.\"";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:quote VER:inf+pres ADV:when PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-P SENT PON:quote SENT");
    }

    public function testPosTagging1628754966_4968() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So listen, I was thinking maybe sushi tonight.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:inf+pres PON:sep PRO-PERS-1-M-S AUX:ind+past+1+s VER:ger+pres ADV NOUN-m:s ADV SENT");
    }

    public function testPosTagging1628754966_4759() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So you're fine, you're fulfilled?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s PON:sep PRO-PERS-2-M-S AUX:ind+pres+2+s VER:part+past+m+s SENT:qst");
    }

    public function testPosTagging1628754966_3820() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "\"Crushed\" isn't the right word, nor is \"told them.\"";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:quote PPAST:part+past+m+s PON:quote VER:ind+pres+3+s ADV:neg ART-M:s ADJ:pos+m+s NOUN-m:s PON:sep CON:neg VER:ind+pres+3+s PON:quote PPAST:part+past+m+s PRO-PERS-3-M-P SENT PON:quote SENT");
    }

    public function testPosTagging1628754966_3491() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Nina, I know you're fulfilling some fantasy about having rich successful parents, but lying to them is wrong.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres DET NOUN-m:s ADV VER:ger+pres ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p PON:sep CON NOUN-m:s PRE PRO-PERS-3-M-P VER:ind+pres+3+s ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_9897() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Stop gloating, alright, it doesn't mean anything.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres NOUN-m:s PON:sep ADJ:pos+m+s PON:sep PRO-PERS-3-M-S AUX:ind+pres+3+s ADV:neg VER:inf+pres NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_803() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Hey, you're Nina's folks, huh?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep PRO-PERS-2-M-S VER:ind+pres+2+s ART-M:s NOUN-m:p PRE NPR PON:sep INT:dubt SENT:qst");
    }

    public function testPosTagging1628754970_5024() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Of course, of course they were, look at him.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-3-M-P VER:ind+past+3+p PON:sep VER:inf+pres PRE PRO-PERS-3-M-S SENT");
    }

    public function testPosTagging1628754970_7562() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, the problem is we'd have to fly to Tulsa and rent a car, and it's a six-hour drive.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other ART-M:s NOUN-m:s VER:ind+pres+3+s PRO-PERS-1-M-P PPAST:part+past+m+s VER:inf+pres PRE VER:inf+pres PRE NOUN-m:s CON VER:inf+pres PRE NOUN-m:s PON:sep CON PRO-PERS-3-M-S VER:ind+pres+3+s PRE NUM PON:sep NOUN-m:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_3816() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You are so kind, and good, and...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADV ADJ:pos+m+s PON:sep CON ADJ:pos+m+s PON:sep CON SENT");
    }

    public function testPosTagging1628754972_1440() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Roll, roll!";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep VER:inf+pres SENT:exclam");
    }

    public function testPosTagging1628754972_5002() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I've got plans.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s NOUN-m:p SENT");
    }
    
}