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
 * These are all perfectly tagged sentences.
 */
class EnJustShootMeTestSuccessful extends TestCase
{
    
    public function testPosTagging1628754941_4301() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh shoot.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp NOUN-m:s SENT");
}

    public function testPosTagging1628754941_2004() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Something amiss, my lady?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADJ:pos+m+s PON:sep ADJ:pos+m+s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754941_2554() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "It's all out of water.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s DET ADV PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_3897() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Not a problem.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_9102() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Boop.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_9579() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "This one's full.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S NUM VER:ind+pres+3+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_4017() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "God!";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam");
    }

    public function testPosTagging1628754941_8573() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "There's better water right here in the fridge.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s ADV:plc PRE ART-M:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_1777() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Damn thing sticks sometimes.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s ADV SENT");
    }

    public function testPosTagging1628754941_962() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "There it goes.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
    }

    public function testPosTagging1628754941_450() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Can I open that for you?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRO-DEMO-M-S PRE PRO-PERS-2-M-S SENT:qst");
    }

    public function testPosTagging1628754941_5696() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I doubt it.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:doubt SENT");
    }

    public function testPosTagging1628754941_9184() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "our endangered coral reefs.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PPAST:part+past+m+s NOUN-m:s NOUN-m:p SENT");
    }

    public function testPosTagging1628754941_8875() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Many different species...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:qty ADJ:pos+m+s NOUN-m:p SENT");
    }

    public function testPosTagging1628754941_7083() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "[Announcer] Jack Gallo at the plate hitting 292.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:opn NOUN-m:s PON:cls NPR NPR PRE ART-M:s NOUN-m:s NOUN-m:s NUM SENT");
    }


    public function testPosTagging1628754941_7377() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "It's a long run.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_1811() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "The Giants win the pennant,";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:p VER:inf+pres ART-M:s NOUN-m:s PON:sep SENT");
    }

    public function testPosTagging1628754941_5148() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "the Giants win the pennant!";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:p VER:inf+pres ART-M:s NOUN-m:s SENT:exclam");
    }

    public function testPosTagging1628754941_5433() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "The toxic runoff and chemical pesticides have eroded what was once one of our most precious resources.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADJ:pos+m+s NOUN-m:s CON ADJ:pos+m+s NOUN-m:p AUX:inf+pres VER:part+past+m+s NOUN-m:s VER:ind+past+1+s ADV NUM PRE ADJ:pos+m+s ADV:qty ADJ:pos+m+s NOUN-m:p SENT");
    }

    public function testPosTagging1628754941_2345() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Few people...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_8929() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "know the doctor said not to get my hopes up, but I do feel a little tingling on my scalp.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NOUN-m:s PPAST:part+past+m+s ADV:neg PRE VER:inf+pres ADJ:pos+m+s NOUN-m:p ADV PON:sep CON PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_1324() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So, you may ask, \"What can the average citizen do?\"";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-2-M-S VER:cond+pres+3+s VER:inf+pres PON:sep PON:quote NOUN-m:s VER:inf+pres ART-M:s ADJ:pos+m+s NOUN-m:s VER:inf+pres SENT:qst PON:quote SENT");
    }

    public function testPosTagging1628754941_2594() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I say plenty.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:qty SENT");
    }

    public function testPosTagging1628754941_392() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "[Dennis Voiceover] If it was an absolute emergency,";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:opn NPR NOUN-m:s PON:cls CON:cond PRO-PERS-3-M-S VER:ind+past+1+s NUM ADJ:pos+m+s NOUN-m:s PON:sep SENT");
    }

    public function testPosTagging1628754941_890() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I know I could get that fridge door open.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRO-DEMO-M-S NOUN-m:s NOUN-m:s ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754941_4112() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Still, maybe I should start working out.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep ADV PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres VER:ger+pres ADV SENT");
    }

    public function testPosTagging1628754941_5630() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yeah, I wonder if Elliot's gym offers jazzercise.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-1-M-S VER:inf+pres CON:cond ART-M:s NOUN-m:s PRE NPR NOUN-m:p NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_5968() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So, if we all volunteer for a clean-up weekend.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep CON:cond PRO-PERS-1-M-P DET NOUN-m:s PRE PRE ADJ:pos+m+s PON:sep ADV NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_5641() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Excuse me?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp SENT:qst");
    }

    public function testPosTagging1628754941_7575() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Nina?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:qst");
    }

    public function testPosTagging1628754941_9672() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What is it that you're daydreaming about that's so much more important than what I'm saying?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-PERS-3-M-S PRO-DEMO-M-S PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres ADV PRO-DEMO-M-S VER:ind+pres+3+s ADV:qty ADJ:pos+m+s CON NOUN-m:s PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres SENT:qst");
    }

    public function testPosTagging1628754941_5278() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Excuse me.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp SENT");
    }

    public function testPosTagging1628754941_3148() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Please don't start again.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other AUX:inf+pres ADV:neg VER:inf+pres ADV SENT");
    }

    public function testPosTagging1628754941_3180() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Please, please, please don't start again.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other PON:sep INT:other PON:sep INT:other AUX:inf+pres ADV:neg VER:inf+pres ADV SENT");
    }

    public function testPosTagging1628754941_7171() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Maybe I should go after her.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres ADV PRO-PERS-3-F-S SENT");
    }

    public function testPosTagging1628754941_6658() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yes, yes.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep INT:conf SENT");
    }

    public function testPosTagging1628754941_6051() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Why don't you go...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:inf+pres ADV:neg PRO-PERS-2-M-S VER:inf+pres SENT");
    }

    public function testPosTagging1628754941_370() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "See if she's okay.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres CON:cond PRO-PERS-3-F-S VER:ind+pres+3+s INT:conf SENT");
    }

    public function testPosTagging1628754941_3623() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yeah.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
    }

    public function testPosTagging1628754941_4816() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Hey.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT");
    }

    public function testPosTagging1628754941_3820() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "We're all a little worried about you, how are you doing?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:ind+pres+2+s DET PRE ADJ:pos+m+s PPAST:part+past+m+s ADV PRO-PERS-2-M-S PON:sep ADV VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres SENT:qst");
    }

    public function testPosTagging1628754941_9775() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "They found me over the internet.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:inf+pres PRO-PERS-1-M-S ADV ART-M:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_558() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Can you believe it?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-S SENT:qst");
    }

    public function testPosTagging1628754941_8699() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I mean, they just called out of nowhere.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other INT:other PON:sep PRO-PERS-3-M-P ADV PPAST:part+past+m+s ADV PRE ADV SENT");
    }

    public function testPosTagging1628754941_8445() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "And they're actually coming here to the office?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-P AUX:ind+pres+2+s ADV VER:ger+pres ADV:plc PRE ART-M:s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754941_1736() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "All the way from Twin Wells, Oklahoma.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET ART-M:s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:p PON:sep NPR SENT");
    }

    public function testPosTagging1628754941_3937() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "And you sound disappointed.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-2-M-S VER:inf+pres PPAST:part+past+m+s SENT");
    }

    public function testPosTagging1628754941_919() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, they sound like backwater hicks.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-3-M-P VER:inf+pres ADV NOUN-m:s NOUN-m:p SENT");
    }

    public function testPosTagging1628754941_9518() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well I'm sorry, but you know, when I was a little girl on the farm";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s INT:comp PON:sep CON PRO-PERS-2-M-S VER:inf+pres PON:sep ADV:when PRO-PERS-1-M-S VER:ind+past+1+s PRE ADJ:pos+m+s NOUN-m:s PRE ART-M:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_6712() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "At least people who didn't smell like hogs.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other NOUN-m:s PRO-WH-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres ADV NOUN-m:p SENT");
    }

    public function testPosTagging1628754941_1442() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Hm, it's funny.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754941_4331() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Before I understood what my dad did";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-1-M-S PPAST:part+past+m+s NOUN-m:s ADJ:pos+m+s NOUN-m:s PPAST:part+past+m+s SENT");
    }

    public function testPosTagging1628754941_114() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I used to pretend that he was a blacksmith, hammering horseshoes and working at a hot forge.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRE VER:inf+pres PRO-DEMO-M-S PRO-PERS-3-M-S VER:ind+past+1+s PRE NOUN-m:s PON:sep VER:ger+pres NOUN-m:p CON VER:ger+pres PRE PRE ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_9836() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, but instead he's a millionaire, well boo-hoo for you and now back to me.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep CON ADV PRO-PERS-3-M-S VER:ind+pres+3+s PRE NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:s PON:sep NOUN-m:s PRE PRO-PERS-2-M-S CON ADV:tim ADJ:pos+m+s PRE PRO-PERS-1-M-S SENT");
    }

    public function testPosTagging1628754941_9451() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Look, you're a little emotional right now,";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep PRO-PERS-2-M-S VER:ind+pres+2+s PRE ADJ:pos+m+s ADJ:pos+m+s ADV:tim PON:sep SENT");
    }

    public function testPosTagging1628754941_1664() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Don't get me wrong, Maya.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres PRO-PERS-1-M-S ADJ:pos+m+s PON:sep NPR SENT");
    }

    public function testPosTagging1628754941_8824() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I loved my adoptive parents,";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p PON:sep SENT");
    }

    public function testPosTagging1628754941_1713() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I mean, they fed me and they raised me and they learned me to read.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other INT:other PON:sep PRO-PERS-3-M-P PPAST:part+past+m+s PRO-PERS-1-M-S CON PRO-PERS-3-M-P PPAST:part+past+m+s PRO-PERS-1-M-S CON PRO-PERS-3-M-P PPAST:part+past+m+s PRO-PERS-1-M-S PRE VER:inf+pres SENT");
    }

    public function testPosTagging1628754941_2024() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh my God.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT");
    }

    public function testPosTagging1628754941_1356() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Okay, if one of them is holding a pig, you're me.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep CON:cond NUM PRE PRO-PERS-3-M-P VER:ind+pres+3+s VER:ger+pres PRE NOUN-m:s PON:sep PRO-PERS-2-M-S VER:ind+pres+2+s PRO-PERS-1-M-S SENT");
    }

    public function testPosTagging1628754941_5577() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Ms Van Horn?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754941_4609() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "[Nina] Yes?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:opn NPR PON:cls INT:conf SENT:qst");
    }

    public function testPosTagging1628754941_2419() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Hello.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT");
    }

    public function testPosTagging1628754941_9477() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, how rude of me.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV ADJ:pos+m+s PRE PRO-PERS-1-M-S SENT");
    }

    public function testPosTagging1628754941_6593() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Nina.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT");
    }

    public function testPosTagging1628754941_4142() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No, I'm not kidding,";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:ger+pres PON:sep SENT");
    }

    public function testPosTagging1628754941_7712() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I wanna say Karen,";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres NPR PON:sep SENT");
    }

    public function testPosTagging1628754941_21() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "but I...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S SENT");
    }

    public function testPosTagging1628754941_1807() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, I'm Maya Gallo, and I really should be going.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-PERS-1-M-S VER:inf+pres NPR NPR PON:sep CON PRO-PERS-1-M-S ADV AUX:inf+pres AUX:inf+pres VER:ger+pres SENT");
    }

    public function testPosTagging1628754941_5510() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No no, Karen, stay.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg ADV:neg PON:sep NPR PON:sep VER:inf+pres SENT");
    }

    public function testPosTagging1628754941_843() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So, I'm Doctor Les Drake and this is my wife, Libby.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-1-M-S VER:inf+pres NOUN-m:s NPR NOUN-m:s CON PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s PON:sep NPR SENT");
    }

    public function testPosTagging1628754941_2483() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Hello.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT");
    }

    public function testPosTagging1628754941_6602() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No, I've practiced medicine for over 40 years now.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s NOUN-m:s PRE ADV NUM NOUN-m:p ADV:tim SENT");
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
    
    public function testPosTagging1628754966_3820() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "\"Crushed\" isn't the right word, nor is \"told them.\"";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:quote PPAST:part+past+m+s PON:quote VER:ind+pres+3+s ADV:neg ART-M:s ADJ:pos+m+s NOUN-m:s PON:sep CON:neg VER:ind+pres+3+s PON:quote PPAST:part+past+m+s PRO-PERS-3-M-P SENT PON:quote SENT");
    }
    
    public function testPosTagging1628754941_9200() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "And I teach art at the local college.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres NOUN-m:s PRE ART-M:s ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_9690() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You're not cousins, are you?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADV:neg NOUN-m:p PON:sep VER:ind+pres+2+s PRO-PERS-2-M-S SENT:qst");
    }

    public function testPosTagging1628754941_4911() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh no, of course not.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp ADV:neg PON:sep INT:conf ADV:neg SENT");
    }

    public function testPosTagging1628754941_3764() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, look at you.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep INT:other SENT");
    }

    public function testPosTagging1628754941_8784() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "To think all these years I have taken fashion advice from Nina Van Horn, and now it turns out she's my own daughter.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE VER:inf+pres DET PRO-DEMO-M-P NOUN-m:p PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s NOUN-m:s NOUN-m:s PRE NPR NOUN-m:s NOUN-m:s PON:sep CON ADV:tim PRO-PERS-3-M-S VER:ind+pres+3+s ADV PRO-PERS-3-F-S VER:ind+pres+3+s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_6962() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I don't want to sound paranoid, but, well, we don't want to get our hopes up.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres PRE VER:inf+pres ADJ:pos+m+s PON:sep CON PON:sep ADJ:pos+m+s PON:sep PRO-PERS-1-M-P AUX:inf+pres ADV:neg VER:inf+pres PRE VER:inf+pres ADJ:pos+m+s NOUN-m:p ADV SENT");
    }

    public function testPosTagging1628754941_5786() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I understand.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres SENT");
    }

    public function testPosTagging1628754941_4262() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Plus, not to be crass, but there are certain assets.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep INT:other PON:sep CON ADV VER:ind+pres+2+s ADJ:pos+m+s NOUN-m:p SENT");
    }

    public function testPosTagging1628754941_8504() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Assets?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT:qst");
    }

    public function testPosTagging1628754941_4640() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oil as in vroom vroom, make the cars go?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADV PRE NOUN-m:s NOUN-m:s PON:sep VER:inf+pres ART-M:s NOUN-m:p VER:inf+pres SENT:qst");
    }

    public function testPosTagging1628754941_1426() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "As in, vroom vroom, let's quit the practice and play some golf.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE PON:sep NOUN-m:s NOUN-m:s PON:sep VER:inf+pres PRO-PERS-1-M-P VER:inf+pres ART-M:s NOUN-m:s CON VER:inf+pres DET NOUN-m:s SENT");
    }

    public function testPosTagging1628754941_2637() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Can't keep him off that course since he built it.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg VER:inf+pres PRO-PERS-3-M-S ADV PRO-DEMO-M-S NOUN-m:s ADV PRO-PERS-3-M-S PPAST:part+past+m+s PRO-PERS-3-M-S SENT");
    }

    public function testPosTagging1628754941_9613() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well anyway, you must have a lot of tough questions, like why we gave you up and why we waited so long to find you.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other PON:sep PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres ADV:qty ADJ:pos+m+s NOUN-m:p PON:sep ADV ADV PRO-PERS-1-M-P PPAST:part+past+m+s PRO-PERS-2-M-S ADV CON ADV PRO-PERS-1-M-P PPAST:part+past+m+s ADV ADJ:pos+m+s PRE VER:inf+pres PRO-PERS-2-M-S SENT");
    }

    public function testPosTagging1628754941_4070() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Can I have a pony?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRE NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754941_3837() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Really hard.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754941_7381() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "How long do you think it'll be before I put weights on the bar?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-S VER:inf+pres VER:inf+pres ADV PRO-PERS-1-M-S VER:inf+pres NOUN-m:p PRE ART-M:s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754941_4497() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "This is the best part, man.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ART-M:s ADJ:pos+m+s NOUN-m:s PON:sep NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_1430() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Is this living or what?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRO-DEMO-M-S NOUN-m:s CON:or NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754966_5835() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "That's a decision his family will have to make.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s PRE NOUN-m:s ADJ:pos+m+s NOUN-m:s VER:inf+pres VER:inf+pres PRE VER:inf+pres SENT");
    }

    public function testPosTagging1628754966_6566() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Is it hot in here or is it just me?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRO-PERS-3-M-S ADJ:pos+m+s PRE ADV:plc CON:or VER:ind+pres+3+s PRO-PERS-3-M-S ADV PRO-PERS-1-M-S SENT:qst");
    }

    public function testPosTagging1628754966_6644() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "[Dennis] Ah, yeah.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:opn NPR PON:cls INT:und PON:sep INT:conf SENT");
    }

    public function testPosTagging1628754966_8166() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Something you need?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRO-PERS-2-M-S VER:inf+pres SENT:qst");
    }

    public function testPosTagging1628754966_8422() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Jack, would you describe yourself as a fan of nature?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep PPAST:part+past+m+s PRO-PERS-2-M-S VER:inf+pres PRO-PERS-2-M-S ADV PRE NOUN-m:s PRE NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754966_5294() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Sure.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_3140() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "As a boy I took a lot of hikes.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE NOUN-m:s PRO-PERS-1-M-S PPAST:part+past+m+s ADV:qty NOUN-m:p SENT");
    }

    public function testPosTagging1628754966_2980() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Ah, lot of hikes.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:und PON:sep ADV:qty NOUN-m:p SENT");
    }

    public function testPosTagging1628754966_4544() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Good, that's good.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_2108() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yes.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
    }

    public function testPosTagging1628754966_1714() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I once saw an owl, and I swear to God it smiled at me.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV VER:inf+pres NUM NOUN-m:s PON:sep CON PRO-PERS-1-M-S VER:inf+pres PRE NPR PRO-PERS-3-M-S PPAST:part+past+m+s PRE PRO-PERS-1-M-S SENT");
    }

    public function testPosTagging1628754966_6777() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Sure.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_1304() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "But I'm talking more...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres ADV SENT");
    }

    public function testPosTagging1628754966_2520() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Nina.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT");
    }

    public function testPosTagging1628754966_28() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What are you doing?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres SENT:qst");
    }

    public function testPosTagging1628754966_5093() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Waiting for my blood test results.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres PRE ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_4094() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "They're sending me a fax.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P AUX:ind+pres+2+s VER:ger+pres PRO-PERS-1-M-S PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_291() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "That's my humidifier.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_3133() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "And my fax machine is over there.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADJ:pos+m+s NOUN-m:s NOUN-m:s VER:ind+pres+3+s ADV ADV SENT");
    }

    public function testPosTagging1628754966_9684() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh my God.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT");
    }

    public function testPosTagging1628754966_5756() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "It's here.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV:plc SENT");
    }

    public function testPosTagging1628754966_943() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You know this piece of paper could change the rest of my life?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PRO-DEMO-M-S NOUN-m:s PRE NOUN-m:s PPAST:part+past+m+s VER:inf+pres ADV:qty ADJ:pos+m+s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754966_2423() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Maya, you read it.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-S SENT");
    }

    public function testPosTagging1628754966_968() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "It's negative.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_6948() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "How negative?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s SENT:qst");
    }

    public function testPosTagging1628754966_8249() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Nina, this means they're not your parents.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-3-M-P VER:ind+pres+2+s ADV:neg ADJ:pos+m+s NOUN-m:p SENT");
    }

    public function testPosTagging1628754966_1011() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Are you okay?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-2-M-S INT:conf SENT:qst");
    }

    public function testPosTagging1628754966_6641() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "They have to be my parents, I mean, they're everything I ever dreamed they would be, they're fun and witty and sophisticated.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:inf+pres PRE VER:inf+pres ADJ:pos+m+s NOUN-m:p PON:sep PRO-PERS-1-M-S VER:inf+pres PON:sep PRO-PERS-3-M-P VER:ind+pres+2+s PRO-INDEF-M-S PRO-PERS-1-M-S ADV PPAST:part+past+m+s PRO-PERS-3-M-P PPAST:part+past+m+s VER:inf+pres PON:sep PRO-PERS-3-M-P VER:ind+pres+2+s ADJ:pos+m+s CON ADJ:pos+m+s CON PPAST:part+past+m+s SENT");
    }

    public function testPosTagging1628754966_1137() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I mean, sure she could use a makeover, but so could you.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other INT:other PON:sep ADJ:pos+m+s PRO-PERS-3-F-S PPAST:part+past+m+s VER:inf+pres PRE NOUN-m:s PON:sep CON ADV PPAST:part+past+m+s PRO-PERS-2-M-S SENT");
    }

    public function testPosTagging1628754966_9870() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, here you are.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV:plc PRO-PERS-2-M-S VER:ind+pres+2+s SENT");
    }

    public function testPosTagging1628754966_9775() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Libby, they're in Carol's office.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep PRO-PERS-3-M-P VER:ind+pres+2+s PRE ART-M:s NOUN-m:s PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_1382() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You mean Karen, and it's Maya.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres NPR PON:sep CON PRO-PERS-3-M-S VER:ind+pres+3+s NPR SENT");
    }

    public function testPosTagging1628754966_1049() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'm here for you.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:plc PRE PRO-PERS-2-M-S SENT");
    }

    public function testPosTagging1628754966_8589() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Please excuse us.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other VER:inf+pres PRO-PERS-1-M-P SENT");
    }

    public function testPosTagging1628754966_3504() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, okay.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep INT:conf SENT");
    }

    public function testPosTagging1628754966_5584() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Listen, we need to talk.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep PRO-PERS-1-M-P VER:inf+pres PRE VER:inf+pres SENT");
    }

    public function testPosTagging1628754966_9625() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "But first, we don't want to jinx anything, but we bought you a present.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADJ:pos+m+s PON:sep PRO-PERS-1-M-P AUX:inf+pres ADV:neg VER:inf+pres PRE VER:inf+pres NOUN-m:s PON:sep CON PRO-PERS-1-M-P PPAST:part+past+m+s PRO-PERS-2-M-S PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_4298() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "It's something that we bought a long time ago when we first started searching for our daughter.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s PRO-DEMO-M-S PRO-PERS-1-M-P PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s ADV:tim ADV:when PRO-PERS-1-M-P ADJ:pos+m+s PPAST:part+past+m+s VER:ger+pres PRE ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_1620() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, that's so sweet.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-DEMO-M-S VER:ind+pres+3+s ADV ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_2662() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "There's an inscription.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s NUM NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_4692() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I don't know what to say.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres NOUN-m:s PRE VER:inf+pres SENT");
    }

    public function testPosTagging1628754966_5280() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So, well, I'm almost afraid to ask.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other PON:sep PRO-PERS-1-M-S VER:inf+pres ADV ADJ:pos+m+s PRE VER:inf+pres SENT");
    }

    public function testPosTagging1628754966_6642() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Do you have the blood test results?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S VER:inf+pres ART-M:s NOUN-m:s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754966_6079() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "And?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON SENT:qst");
    }

    public function testPosTagging1628754966_888() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'm your little girl.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_6205() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT");
    }

    public function testPosTagging1628754966_3220() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Hey.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT");
    }

    public function testPosTagging1628754966_2187() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Mm hm?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:doubt NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754966_221() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yeah, sure.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_7469() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Hey Maya, you want me to water your plants?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter NPR PON:sep PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-S PRE VER:inf+pres ADJ:pos+m+s NOUN-m:p SENT:qst");
    }

    public function testPosTagging1628754966_4506() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yeah, thanks Finch, it's been forever.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep INT:jubi NPR PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s PPAST:part+past+m+s ADV SENT");
    }

    public function testPosTagging1628754966_4653() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'm your man.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_6427() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No, I'm her man.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-F-S NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_5831() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'll water her plant.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-3-F-S NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_404() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Fine.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_2458() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "But you'll see it's no fun lugging this thing around.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-2-M-S VER:inf+pres VER:inf+pres PRO-PERS-3-M-S VER:ind+pres+3+s ADV:neg NOUN-m:s NOUN-m:s PRO-DEMO-M-S NOUN-m:s ADV SENT");
    }

    public function testPosTagging1628754966_8091() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What the hell was that about?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other VER:ind+past+1+s PRO-DEMO-M-S ADV SENT:qst");
    }

    public function testPosTagging1628754966_4411() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Maya, be honest. I make you happy, don't I?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep VER:inf+pres ADJ:pos+m+s SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S ADJ:pos+m+s PON:sep VER:inf+pres ADV:neg PRO-PERS-1-M-S SENT:qst");
    }

    public function testPosTagging1628754966_9680() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Of course, what are you talking about?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres ADV SENT:qst");
    }

    public function testPosTagging1628754966_8269() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Elliot, what's wrong with you?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s PRE PRO-PERS-2-M-S SENT:qst");
    }

    public function testPosTagging1628754966_3192() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Just answer the question, Allie, do I make you happy?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:inf+pres ART-M:s NOUN-m:s PON:sep NPR PON:sep VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S ADJ:pos+m+s SENT:qst");
    }

    public function testPosTagging1628754966_4075() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So, you're completely satisfied with everything?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-2-M-S AUX:ind+pres+2+s ADV VER:part+past+m+s PRE PRO-INDEF-M-S SENT:qst");
    }

    public function testPosTagging1628754966_8783() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yes.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
    }

    public function testPosTagging1628754966_1363() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What do you like most?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:inf+pres PRO-PERS-2-M-S VER:inf+pres ADV:qty SENT:qst");
    }

    public function testPosTagging1628754966_2768() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, I don't know, I guess it's the little things.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-S VER:ind+pres+3+s ART-M:s ADJ:pos+m+s NOUN-m:p SENT");
    }

    public function testPosTagging1628754966_8593() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, you poor thing, Nina how did it go?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-PERS-2-M-S ADJ:pos+m+s NOUN-m:s PON:sep NPR ADV PPAST:part+past+m+s PRO-PERS-3-M-S VER:inf+pres SENT:qst");
    }

    public function testPosTagging1628754966_7820() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Were they crushed when you told them?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+past+3+p PRO-PERS-3-M-P PPAST:part+past+m+s ADV:when PRO-PERS-2-M-S PPAST:part+past+m+s PRO-PERS-3-M-P SENT:qst");
    }

    public function testPosTagging1628754966_7370() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Crushed?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s SENT:qst");
    }

    public function testPosTagging1628754966_5176() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What are you talking about?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres ADV SENT:qst");
    }

    public function testPosTagging1628754966_2579() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, I may have fudged the truth a little on the blood test.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-1-M-S VER:cond+pres+3+s AUX:inf+pres VER:part+past+m+s ART-M:s NOUN-m:s PRE ADJ:pos+m+s PRE ART-M:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_9294() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, that's one";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-DEMO-M-S VER:ind+pres+3+s NUM SENT");
    }

    public function testPosTagging1628754966_2830() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "way to look at it.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRE VER:inf+pres PRE PRO-PERS-3-M-S SENT");
    }

    public function testPosTagging1628754966_7722() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What's another?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT:qst");
    }

    public function testPosTagging1628754966_4406() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, Les and Libby have been looking for their daughter for a very long time.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other NPR CON NPR AUX:inf+pres VER:part+past+m+s VER:ger+pres PRE ADJ:pos+m+s NOUN-m:s PRE PRE ADV:qty ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_8707() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "They want to make me happy, I want to make them happy, what's the crime?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:inf+pres PRE VER:inf+pres PRO-PERS-1-M-S ADJ:pos+m+s PON:sep PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres PRO-PERS-3-M-P ADJ:pos+m+s PON:sep NOUN-m:s VER:ind+pres+3+s ART-M:s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754966_6351() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Fraud, theft.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_4755() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, you are one to talk.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-PERS-2-M-S VER:ind+pres+2+s NUM PRE VER:inf+pres SENT");
    }

    public function testPosTagging1628754966_1362() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You're gonna inherit tons from your dad.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres VER:inf+pres NOUN-m:p PRE ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_1185() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "But he is my dad!";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT:exclam");
    }

    public function testPosTagging1628754966_9837() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, is he, Maya?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep VER:ind+pres+3+s PRO-PERS-3-M-S PON:sep NPR SENT:qst");
    }

    public function testPosTagging1628754966_3552() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "At least I've had a blood test.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754966_9470() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "All I'm saying is if the cold air makes it smaller maybe the hot air in the sauna makes it...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres VER:ind+pres+3+s CON:cond ART-M:s ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s PRO-PERS-3-M-S ADJ:pos+m+s ADV ART-M:s ADJ:pos+m+s NOUN-m:s PRE ART-M:s NOUN-m:s VER:ind+pres+3+s PRO-PERS-3-M-S SENT");
    }

    public function testPosTagging1628754966_1592() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "We're not gonna talk about this anymore.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P AUX:ind+pres+2+s ADV:neg VER:ger+pres VER:inf+pres ADV PRO-DEMO-M-S ADV SENT");
    }

    public function testPosTagging1628754966_3063() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Here you go guys, two regular lattes.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:plc PRO-PERS-2-M-S VER:inf+pres NOUN-m:p PON:sep NUM ADJ:pos+m+s NOUN-m:p SENT");
    }

    public function testPosTagging1628754966_2649() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Alright.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_9705() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "And mine.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_2991() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What the hell is that?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst");
    }

    public function testPosTagging1628754966_3742() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "They call it a cafe grande.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:inf+pres PRO-PERS-3-M-S PRE NOUN-m:s ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_8377() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, that's it.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT");
    }

    public function testPosTagging1628754966_2998() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You wanna see grande?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres ADJ:pos+m+s SENT:qst");
    }

    public function testPosTagging1628754966_3959() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Here's five grande.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:plc VER:ind+pres+3+s NUM ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754966_4386() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "And there's a lot more where that came from, pal.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV VER:ind+pres+3+s PRE NOUN-m:s ADV ADV PRO-DEMO-M-S VER:ind+past+3+s PRE PON:sep NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_8823() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Punch me right here, as hard as you can.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S ADV:plc PON:sep ADV ADJ:pos+m+s ADV PRO-PERS-2-M-S VER:inf+pres SENT");
    }

    public function testPosTagging1628754970_9206() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Come on.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
    }

    public function testPosTagging1628754970_6399() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Did I get the wrong coffee for you guys?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRO-PERS-1-M-S VER:inf+pres ART-M:s ADJ:pos+m+s NOUN-m:s PRE PRO-PERS-2-M-S NOUN-m:p SENT:qst");
    }

    public function testPosTagging1628754970_4992() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Don't play innocent.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_1120() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "We've both gotten a look at his majesty, the king.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres PRO-INDEF-M-P PPAST:part+past+m+s PRE NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s PON:sep ART-M:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_9869() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You guys are freaking me out.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S NOUN-m:p AUX:ind+pres+2+s VER:ger+pres PRO-PERS-1-M-S ADV SENT");
    }

    public function testPosTagging1628754970_9475() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Do you really not know what we're talking about?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S ADV ADV:neg VER:inf+pres NOUN-m:s PRO-PERS-1-M-P AUX:ind+pres+2+s VER:ger+pres ADV SENT:qst");
    }

    public function testPosTagging1628754970_3777() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
    }

    public function testPosTagging1628754970_7482() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Really?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT:qst");
    }

    public function testPosTagging1628754970_6315() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I guess that would explain some of my back problems.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-DEMO-M-S PPAST:part+past+m+s VER:inf+pres DET PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p SENT");
    }

    public function testPosTagging1628754970_4247() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Finch, how could you not know?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep ADV PPAST:part+past+m+s PRO-PERS-2-M-S ADV:neg VER:inf+pres SENT:qst");
    }

    public function testPosTagging1628754970_4751() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Didn't you take gym in high school?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s ADV:neg PRO-PERS-2-M-S VER:inf+pres NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754970_6874() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I was excused 'cause";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:ind+past+1+s VER:part+past+m+s CON SENT");
    }

    public function testPosTagging1628754970_9953() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I have brittle bones.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s NOUN-m:p SENT");
    }

    public function testPosTagging1628754970_1485() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So, you've never compared yourself to other men?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-2-M-S AUX:inf+pres ADV:tim VER:part+past+m+s PRO-PERS-2-M-S PRE ADJ:pos+m+s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754970_119() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
    }

    public function testPosTagging1628754970_1793() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I mean, only guys in porno movies.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other INT:other PON:sep ADV NOUN-m:p PRE NOUN-m:s NOUN-m:p SENT");
    }

    public function testPosTagging1628754970_1066() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I just figured I was a little bigger than average.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV PPAST:part+past+m+s PRO-PERS-1-M-S VER:ind+past+1+s PRE ADJ:pos+m+s ADJ:pos+m+s CON ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_3168() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You son of a bitch.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S NOUN-m:s PRE PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_8607() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Didn't your ex-wife ever comment?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s ADV:neg ADJ:pos+m+s ADJ:pos+m+s PON:sep NOUN-m:s ADV VER:inf+pres SENT:qst");
    }

    public function testPosTagging1628754970_1553() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yeah, but isn't that what wives are supposed to say?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep CON VER:ind+pres+3+s ADV:neg PRO-DEMO-M-S NOUN-m:s NOUN-m:p AUX:ind+pres+2+s VER:part+past+m+s PRE VER:inf+pres SENT:qst");
    }

    public function testPosTagging1628754970_8583() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yeah, but sometimes they say it with a hint of sarcasm that makes you feel like...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep CON ADV PRO-PERS-3-M-P VER:inf+pres PRO-PERS-3-M-S PRE PRE NOUN-m:s PRE NOUN-m:s PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-2-M-S VER:inf+pres ADV SENT");
    }

    public function testPosTagging1628754970_7354() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Never mind.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other SENT");
    }

    public function testPosTagging1628754970_3429() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, well, well.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_237() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I know, it doesn't.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s ADV:neg SENT");
    }

    public function testPosTagging1628754970_7371() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'm still just Dennis";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres INT:other NPR SENT");
    }

    public function testPosTagging1628754970_9908() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Finch, regular guy.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_3977() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT");
    }

    public function testPosTagging1628754970_3052() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'm sorry.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp SENT");
    }

    public function testPosTagging1628754970_8575() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "My fault.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp SENT");
    }

    public function testPosTagging1628754970_2848() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "That's right.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
    }

    public function testPosTagging1628754970_558() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So how do you like New York?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV VER:inf+pres PRO-PERS-2-M-S VER:inf+pres ADJ:pos+m+s NPR SENT:qst");
    }

    public function testPosTagging1628754970_6020() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, we love it every time we come.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-PERS-1-M-P VER:inf+pres PRO-PERS-3-M-S ADJ:pos+m+s NOUN-m:s PRO-PERS-1-M-P VER:inf+pres SENT");
    }

    public function testPosTagging1628754970_4680() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I never get used to how tall those skyscrapers are.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV:tim VER:inf+pres PPAST:part+past+m+s PRE ADV ADJ:pos+m+s DET NOUN-m:p VER:ind+pres+2+s SENT");
    }

    public function testPosTagging1628754970_4801() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Of course, you know, it's not the size of the building that matters.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-2-M-S VER:inf+pres PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s ADV:neg ART-M:s NOUN-m:s PRE ART-M:s NOUN-m:s PRO-DEMO-M-S NOUN-m:p SENT");
    }

    public function testPosTagging1628754970_4558() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Then what is it?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV NOUN-m:s VER:ind+pres+3+s PRO-PERS-3-M-S SENT:qst");
    }

    public function testPosTagging1628754970_3966() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I wish I knew.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S PPAST:part+past+m+s SENT");
    }

    public function testPosTagging1628754970_2950() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Have a nice day.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:leave SENT");
    }

    public function testPosTagging1628754970_8205() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "My stars.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:p SENT");
    }

    public function testPosTagging1628754970_2211() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Can you make it there?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-S ADV SENT:qst");
    }

    public function testPosTagging1628754970_9727() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh my God, what happened?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NOUN-m:s PPAST:part+past+m+s SENT:qst");
    }

    public function testPosTagging1628754970_5281() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "We were mugged, right in the middle of Central Park.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P AUX:ind+past+3+p VER:part+past+m+s PON:sep INT:other ADV:plc PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_5653() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, Daddy, are you alright?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NOUN-m:s PON:sep VER:ind+pres+2+s PRO-PERS-2-M-S ADJ:pos+m+s SENT:qst");
    }

    public function testPosTagging1628754970_7152() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yes, a little shaken up is all.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRE ADJ:pos+m+s ADJ:pos+m+s ADV VER:ind+pres+3+s DET SENT");
    }

    public function testPosTagging1628754970_6754() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Should we get you into an emergency room?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-P VER:inf+pres PRO-PERS-2-M-S ADV NUM NOUN-m:s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754970_6512() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No no, I'll be alright.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg ADV:neg PON:sep PRO-PERS-1-M-S VER:inf+pres VER:inf+pres ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_915() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'll get some ice.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres DET NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_2872() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "This is terrible, and it came at the worst possible time.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s PON:sep CON PRO-PERS-3-M-S VER:ind+past+3+s PRE ART-M:s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_6244() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What do you mean?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:inf+pres PRO-PERS-2-M-S VER:inf+pres SENT:qst");
    }

    public function testPosTagging1628754970_8017() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, we got some bad news about your grandma Ruby.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-1-M-P PPAST:part+past+m+s DET ADJ:pos+m+s NOUN-m:s ADV ADJ:pos+m+s NOUN-m:s NPR SENT");
    }

    public function testPosTagging1628754970_1718() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I have a grandma Ruby?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE NOUN-m:s NPR SENT:qst");
    }

    public function testPosTagging1628754970_9211() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "For now.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADV:tim SENT");
    }

    public function testPosTagging1628754970_4994() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "She's taken a turn for the worst, she could go at any time, so we chartered a jet so we could all fly back";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S VER:ind+pres+3+s PPAST:part+past+m+s PRE NOUN-m:s PRE ART-M:s ADJ:pos+m+s PON:sep PRO-PERS-3-F-S PPAST:part+past+m+s VER:inf+pres PRE DET NOUN-m:s PON:sep ADV PRO-PERS-1-M-P VER:inf+pres PRE NOUN-m:s ADV PRO-PERS-1-M-P PPAST:part+past+m+s DET VER:inf+pres ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_1193() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "to Twin Wells and be at her side.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE VER:inf+pres NOUN-m:p CON VER:inf+pres PRE PRO-PERS-3-F-S ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_557() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So, what's the problem?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep NOUN-m:s VER:ind+pres+3+s ART-M:s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754970_8977() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "We need money for the charter, and the muggers cleaned us out.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres NOUN-m:s PRE ART-M:s ADJ:pos+m+s PON:sep CON ART-M:s NOUN-m:p PPAST:part+past+m+s PRO-PERS-1-M-P ADV SENT");
    }

    public function testPosTagging1628754970_3957() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Credit cards, ID, everything.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:p PON:sep NOUN-m:s PON:sep PRO-INDEF-M-S SENT");
    }

    public function testPosTagging1628754970_8681() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "We could get a cash wire tomorrow, but then it could be too late.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P PPAST:part+past+m+s VER:inf+pres PRE NOUN-m:s NOUN-m:s ADV:tim PON:sep CON ADV PRO-PERS-3-M-S PPAST:part+past+m+s VER:inf+pres ADV ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_2876() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'm sorry Mama, I wanted to be there.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp NOUN-m:s PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s PRE VER:inf+pres ADV SENT");
    }

    public function testPosTagging1628754970_8772() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I could give you a loan, how much do you need?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRO-PERS-2-M-S PRE NOUN-m:s PON:sep ADV ADV:qty VER:inf+pres PRO-PERS-2-M-S VER:inf+pres SENT:qst");
    }

    public function testPosTagging1628754970_389() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "$20,000.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON NUM SENT");
    }

    public function testPosTagging1628754970_9232() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Goodness, that's a lot of money.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-DEMO-M-S VER:ind+pres+3+s ADV:qty NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_4464() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "It is?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s SENT:qst");
    }

    public function testPosTagging1628754970_8010() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, to her it is.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRE PRO-PERS-3-F-S PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
    }

    public function testPosTagging1628754970_59() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh yeah, alright, alright.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp INT:conf PON:sep ADJ:pos+m+s PON:sep ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_902() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Poor Grandma, last thing she told me was how she wanted to meet you.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:s PRO-PERS-3-F-S PPAST:part+past+m+s PRO-PERS-1-M-S VER:ind+past+1+s ADV PRO-PERS-3-F-S PPAST:part+past+m+s PRE VER:inf+pres PRO-PERS-2-M-S SENT");
    }

    public function testPosTagging1628754970_5107() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You see I'm, well, I've gotten a little behind on my credit cards this year.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PON:sep ADJ:pos+m+s PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s NOUN-m:p PRO-DEMO-M-S NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_9556() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Passed down to you her diamond pendant.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s ADV:plc PRE PRO-PERS-2-M-S PRO-PERS-3-F-S NOUN-m:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_4973() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Diamond?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754970_4639() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Yes, it's called the Star of Persia.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s PPAST:part+past+m+s ART-M:s NOUN-m:s PRE NPR SENT");
    }

    public function testPosTagging1628754970_2645() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "More like the Football of Persia because of its tremendous size...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV ART-M:s NOUN-m:s PRE NPR CON PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_81() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Weight...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_1216() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Value.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_7556() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh well, she will just be buried with it.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp ADJ:pos+m+s PON:sep PRO-PERS-3-F-S VER:inf+pres ADV AUX:inf+pres VER:part+past+m+s PRE PRO-PERS-3-M-S SENT");
    }

    public function testPosTagging1628754970_116() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, the hell she will, I'll get you the money.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ART-M:s NOUN-m:s PRO-PERS-3-F-S VER:inf+pres PON:sep PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-2-M-S ART-M:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_6759() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, no, we couldn't possibly let you.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV:neg PON:sep PRO-PERS-1-M-P PPAST:part+past+m+s ADV:neg ADV VER:inf+pres PRO-PERS-2-M-S SENT");
    }

    public function testPosTagging1628754970_7569() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No, I insist.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-1-M-S VER:inf+pres SENT");
    }

    public function testPosTagging1628754970_3859() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Absolutely not.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV:neg SENT");
    }

    public function testPosTagging1628754970_7693() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Look, you're taking my money and that's all there is to it.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres ADJ:pos+m+s NOUN-m:s CON PRO-DEMO-M-S VER:ind+pres+3+s DET ADV VER:ind+pres+3+s PRE PRO-PERS-3-M-S SENT");
    }

    public function testPosTagging1628754970_8361() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Alright, let's get to the bank.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep VER:inf+pres PRO-PERS-1-M-P VER:inf+pres PRE ART-M:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_2123() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Hey, I thought you were at a shoot.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S VER:ind+past+3+p PRE PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_543() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I forgot my wide-angle lens.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADJ:pos+m+s ADJ:pos+m+s PON:sep NOUN-m:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_4984() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What's the ice pack for?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ART-M:s NOUN-m:s NOUN-m:s PRE SENT:qst");
    }

    public function testPosTagging1628754970_1547() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, it's awful,";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s PON:sep SENT");
    }

    public function testPosTagging1628754970_7558() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Les and Libby were attacked in Central Park.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR CON NPR AUX:ind+past+3+p VER:part+past+m+s PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_1401() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No they weren't.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PRO-PERS-3-M-P ADV ADV:neg SENT");
    }

    public function testPosTagging1628754970_537() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No, I just saw them two minutes ago, whatever happened to them happened between the lobby and here.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-1-M-S ADV VER:inf+pres PRO-PERS-3-M-P NUM NOUN-m:p ADV:tim PON:sep NOUN-m:s PPAST:part+past+m+s PRE PRO-PERS-3-M-P PPAST:part+past+m+s PRE ART-M:s NOUN-m:s CON ADV:plc SENT");
    }

    public function testPosTagging1628754970_4270() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh my God.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT");
    }

    public function testPosTagging1628754970_6771() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh!";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT:exclam");
    }

    public function testPosTagging1628754970_85() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Just a thought, wouldn't it be easier to take a commercial airline?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE PPAST:part+past+m+s PON:sep PPAST:part+past+m+s ADV:neg PRO-PERS-3-M-S VER:inf+pres ADJ:pos+m+s PRE VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754970_6432() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "And it would be too late.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S PPAST:part+past+m+s VER:inf+pres ADV ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_8049() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Someone needs some Valium.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S VER:ind+pres+3+s DET NOUN-m:s SENT");
    }

    public function testPosTagging1628754970_4807() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Nina, thank you for everything.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep INT:jubi SENT");
    }

    public function testPosTagging1628754970_2111() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Decent, and pretty.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep CON ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754970_6216() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, I just can't do this.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-PERS-1-M-S ADV ADV:neg VER:inf+pres PRO-DEMO-M-S SENT");
    }

    public function testPosTagging1628754972_7335() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Sorry?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:qst");
    }

    public function testPosTagging1628754972_5751() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I've just been a very bad girl.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV VER:part+past+m+s PRE ADV:qty ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_9869() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Sorry?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:qst");
    }

    public function testPosTagging1628754972_3357() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, Les,";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NPR PON:sep SENT");
    }

    public function testPosTagging1628754972_6981() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Libby, I... I'm not your real daughter.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep PRO-PERS-1-M-S SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_7151() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:qst SENT:qst");
    }

    public function testPosTagging1628754972_4450() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Sure you are, you belong to us.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PRO-PERS-2-M-S VER:ind+pres+2+s PON:sep PRO-PERS-2-M-S VER:inf+pres PRE PRO-PERS-1-M-P SENT");
    }

    public function testPosTagging1628754972_6116() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I mean, until we die and you get all the money, remember?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other INT:other PON:sep ADV PRO-PERS-1-M-P VER:inf+pres CON PRO-PERS-2-M-S VER:inf+pres DET ART-M:s NOUN-m:s PON:sep VER:inf+pres SENT:qst");
    }

    public function testPosTagging1628754972_442() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "See, I... I wanted you to be my parents so badly that I... I lied about the";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep PRO-PERS-1-M-S SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S PRE VER:inf+pres ADJ:pos+m+s NOUN-m:p ADV ADV PRO-DEMO-M-S PRO-PERS-1-M-S SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV ART-M:s SENT");
    }

    public function testPosTagging1628754972_8138() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "blood test, and...";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep CON SENT");
    }

    public function testPosTagging1628754972_9757() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Your daughter is still out there somewhere, and this belongs to her.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s ADV ADV ADV PON:sep CON PRO-DEMO-M-S VER:ind+pres+3+s PRE PRO-PERS-3-F-S SENT");
    }

    public function testPosTagging1628754972_6523() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Look, baby girl.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep NOUN-m:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_1112() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You are just hysterical.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADV ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754972_4168() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Now don't make me snap you unconscious.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim AUX:inf+pres ADV:neg VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754972_5289() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "No, go ahead, I deserve it.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep VER:inf+pres ADV PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-S SENT");
    }

    public function testPosTagging1628754972_6756() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What I did was wrong.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRO-PERS-1-M-S PPAST:part+past+m+s VER:ind+past+1+s ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754972_6706() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, the whole thing ends right here, that's it.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other ART-M:s ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s ADV:plc PON:sep PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT");
    }

    public function testPosTagging1628754972_8304() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Of course, you're good people, so I will lend you the money.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s NOUN-m:s PON:sep ADV PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-2-M-S ART-M:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_582() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Sweet.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754972_9225() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Nina, can you hear me?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-S SENT:qst");
    }

    public function testPosTagging1628754972_8086() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Maya, you're the elevator DJ?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep PRO-PERS-2-M-S VER:ind+pres+2+s ART-M:s NOUN-m:s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754972_3365() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Listen to me.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE PRO-PERS-1-M-S SENT");
    }

    public function testPosTagging1628754972_9172() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Les and Libby are frauds.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR CON NPR VER:ind+pres+2+s ADJ:pos+m+s SENT");
    }

    public function testPosTagging1628754972_62() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Do not give them any money.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres PRO-PERS-3-M-P DET NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_6697() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "They're conning you. I'm gonna need police backup for this.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P AUX:ind+pres+2+s VER:ger+pres PRO-PERS-2-M-S SENT PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres VER:inf+pres NOUN-m:s NOUN-m:s PRE PRO-DEMO-M-S SENT");
    }

    public function testPosTagging1628754972_8902() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Shame on you Maya, you could not be more wrong about this.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRE PRO-PERS-2-M-S NPR PON:sep PRO-PERS-2-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres ADV ADJ:pos+m+s ADV PRO-DEMO-M-S SENT");
    }

    public function testPosTagging1628754972_2558() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Hey, we meet again.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep PRO-PERS-1-M-P VER:inf+pres ADV SENT");
    }

    public function testPosTagging1628754972_3751() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "So, wanna go hit the town tonight?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep AUX:inf+pres VER:inf+pres VER:inf+pres ART-M:s NOUN-m:s ADV SENT:qst");
    }

    public function testPosTagging1628754972_9193() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You might wanna change 'em.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:cond+pres+3+s AUX:inf+pres VER:inf+pres PRO-PERS-3-M-P SENT");
    }

    public function testPosTagging1628754972_7191() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Oh, and why is that?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep CON ADV VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst");
    }

    public function testPosTagging1628754972_8013() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Well, let's just say I put my pants on three legs at a time.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other VER:inf+pres PRO-PERS-1-M-P ADV VER:inf+pres PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s NOUN-m:s PRE NUM NOUN-m:p PRE PRE NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_8279() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "What are you talking about?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres ADV SENT:qst");
    }

    public function testPosTagging1628754972_4985() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'm saying why settle for a ukulele when you can play the cello?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres ADV VER:inf+pres PRE PRE NOUN-m:s ADV:when PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres ART-M:s NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754972_7168() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Are you having some sort of a breakdown?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres DET NOUN-m:s PRE PRE NOUN-m:s SENT:qst");
    }

    public function testPosTagging1628754972_7880() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "You know what, you're right.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres NOUN-m:s PON:sep INT:conf SENT");
    }

    public function testPosTagging1628754972_7053() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'm not making sense.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:ger+pres NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_9178() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Perhaps there's not enough blood in my brain because it's all in my ridiculously large penis.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV VER:ind+pres+3+s ADV:neg ADV:qty NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s CON PRO-PERS-3-M-S VER:ind+pres+3+s DET PRE ADJ:pos+m+s ADV ADJ:pos+m+s NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_9212() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Listen, if you ever speak to me again,";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep CON:cond PRO-PERS-2-M-S ADV VER:inf+pres PRE PRO-PERS-1-M-S ADV PON:sep SENT");
    }

    public function testPosTagging1628754972_838() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I'll have you arrested.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-2-M-S PPAST:part+past+m+s SENT");
    }

    public function testPosTagging1628754972_7743() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Poor Dennis.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NPR SENT");
    }

    public function testPosTagging1628754972_1330() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "It's a story as old as time.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE NOUN-m:s ADV ADJ:pos+m+s ADV NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_960() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Great product, lousy sales department.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_1235() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Is that the sun breaking through the clouds, Jack?";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRO-DEMO-M-S ART-M:s NOUN-m:s VER:ger+pres ADV ART-M:s NOUN-m:p PON:sep NPR SENT:qst");
    }

    public function testPosTagging1628754972_3920() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I believe it is, Elliot.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-S VER:ind+pres+3+s PON:sep NPR SENT");
    }

    public function testPosTagging1628754972_9896() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "I believe it is.";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
    }

    public function testPosTagging1628754972_815() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Life Keeps Bringin' Me Back To You\" by Lauren Wood)";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s VER:ger+pres PRO-PERS-1-M-S ADJ:pos+m+s PRE PRO-PERS-2-M-S ADV NPR NOUN-m:s PON:cls SENT");
    }

    public function testPosTagging1628754972_8816() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Life keeps bringin' me back to you";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s VER:ger+pres PRO-PERS-1-M-S ADJ:pos+m+s PRE PRO-PERS-2-M-S SENT");
    }

    public function testPosTagging1628754972_903() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "Keeps bringin' me home";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s VER:ger+pres PRO-PERS-1-M-S NOUN-m:s SENT");
    }

    public function testPosTagging1628754972_3955() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "It don't matter what I wanna do 'cause";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S AUX:inf+pres ADV:neg VER:inf+pres NOUN-m:s PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres CON SENT");
    }

    public function testPosTagging1628754972_786() {
	    $PipelinePosTagging = new PipelinePosTagging();
	    $PipelinePosTagging->language = "en";

	    $sentence = "It's got a mind of its own";
	    $pos_arr = $PipelinePosTagging->transform($sentence);
	    $PipelinePosTagging = null;

	    $pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	    $this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PPAST:part+past+m+s PRE NOUN-m:s PRE ADJ:pos+m+s ADJ:pos+m+s SENT");
    }

public function testPosTagging1630223185_4681() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Fear. Treachery Bloodlust.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630223194_1553() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And predators had an uncontrollable, biological urge...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON NOUN-m:p PPAST:part+past+m+s NUM ADJ:pos+m+s PON:sep ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630223209_1521() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "stands the great city of Zootopia!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s ART-M:s ADJ:pos+m+s NOUN-m:s PRE NPR SENT:exclam");
}

public function testPosTagging1630223217_9971() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nope.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
}

public function testPosTagging1630223261_6314() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Don't tell me what I know, Travis.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres PRO-PERS-1-M-S NOUN-m:s PRO-PERS-1-M-S VER:inf+pres PON:sep NPR SENT");
}

public function testPosTagging1630223309_5504() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "the next time you think you will ever be anything more than just a stupid...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim PRO-PERS-2-M-S VER:inf+pres PRO-PERS-2-M-S VER:inf+pres ADV VER:inf+pres NOUN-m:s ADV CON ADV PRE ADJ:pos+m+s SENT");
}

public function testPosTagging1630223339_7810() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Tundratown...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT");
}

public function testPosTagging1630223359_8749() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "its first police academy graduate.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s NOUN-m:s ADJ:pos+m+s SENT");
}

public function testPosTagging1630223405_3340() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I won't give up No, I won't give in";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres ADV ADV:neg PON:sep PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres PRE SENT");
}

public function testPosTagging1630223926_4735() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Till I reach the end And then I'll start again";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim PRO-PERS-1-M-S VER:inf+pres ART-M:s NOUN-m:s CON ADV PRO-PERS-1-M-S VER:inf+pres VER:inf+pres ADV SENT");
}

public function testPosTagging1630223931_8468() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Till I reach the end";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim PRO-PERS-1-M-S VER:inf+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630223939_5315() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No I won't leave";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630224067_7073() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I want to try everything I want to try even though I could fail";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres PRO-INDEF-M-S PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres ADV:tim ADV PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres SENT");
}

public function testPosTagging1630224070_9339() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I want to try even though I could fail";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres ADV:tim ADV PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres SENT");
}

public function testPosTagging1630224347_8523() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And City Hall is right up my tail to find them.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON NOUN-m:s NOUN-m:s VER:ind+pres+3+s ADV ADJ:pos+m+s NOUN-m:s PRE VER:inf+pres PRO-PERS-3-M-P SENT");
}

public function testPosTagging1630224523_1050() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I simply want to buy a Jumbo Pop...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV:deriv VER:inf+pres PRE VER:inf+pres PRE NOUN-m:s ADJ:pos+m+s SENT");
}

public function testPosTagging1630224845_9141() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "\"...to anyone.\" So, beat it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:quote SENT PRE PRO-WH-M-S SENT PON:quote ADV PON:sep VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630224851_6010() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A Jumbo Pop. Please.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s ADJ:pos+m+s SENT INT:other SENT");
}

public function testPosTagging1630224853_427() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A Jumbo Pop.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s ADJ:pos+m+s SENT");
}

public function testPosTagging1630224912_513() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you so much. Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT INT:jubi SENT");
}

public function testPosTagging1630224937_2050() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer, I can't thank you enough.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-1-M-S ADV:neg INT:jubi SENT");
}

public function testPosTagging1630224947_8645() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wilde. Nick Wilde.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT NPR NPR SENT");
}

public function testPosTagging1630225013_5506() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You told that mouse the popsicle sticks were redwood!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s PRO-DEMO-M-S NOUN-m:s ART-M:s NOUN-m:s VER:ind+pres+3+s VER:ind+past+3+p NOUN-m:s SENT:exclam");
}

public function testPosTagging1630225033_3654() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "you came from some little carrot-choked Podunk, no?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+past+3+s PRE DET ADJ:pos+m+s NOUN-m:s PON:sep PPAST:part+past+m+s NPR PON:sep ADV:neg SENT:qst");
}

public function testPosTagging1630225252_3347() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "with that cute, fuzzy-wuzzy little tail between her legs...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRO-DEMO-M-S ADJ:pos+m+s PON:sep ADJ:pos+m+s PON:sep ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE PRO-PERS-3-F-S NOUN-m:p SENT");
}

public function testPosTagging1630225262_7905() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're from Bunnyburrow, is that what you said?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s PRE NOUN-m:s PON:sep VER:ind+pres+3+s PRO-DEMO-M-S NOUN-m:s PRO-PERS-2-M-S PPAST:part+past+m+s SENT:qst");
}

public function testPosTagging1630225584_5668() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, my God. Did you see those leopard print jeggings?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADJ:pos+m+s NPR SENT PPAST:part+past+m+s PRO-PERS-2-M-S VER:inf+pres DET NOUN-m:s VER:inf+pres NOUN-m:p SENT:qst");
}

public function testPosTagging1630226437_3989() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Your job is putting tickets on parked cars!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s VER:ger+pres NOUN-m:p PRE ADJ NOUN-m:p SENT:exclam");
}

public function testPosTagging1630226490_8606() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "She seems really upset.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S VER:ind+pres+3+s ADV ADJ:pos+m+s SENT");
}

public function testPosTagging1630227397_7211() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It does. 100%.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s SENT NUM SENT");
}

public function testPosTagging1630227417_8632() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The Velvety Pipes of Jerry Vole.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADJ:pos+m+s NOUN-m:p PRE NPR NOUN-m:s SENT");
}

public function testPosTagging1630227712_8035() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And you never will.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-2-M-S ADV:tim VER:inf+pres SENT");
}

public function testPosTagging1630228321_8414() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "so, technically, we still have...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep ADV PON:sep PRO-PERS-1-M-P ADV:tim VER:inf+pres SENT");
}

public function testPosTagging1630228374_2175() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Har-har.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630228415_6398() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Even though you're a fox?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim ADV PRO-PERS-2-M-S VER:ind+pres+2+s PRE NOUN-m:s SENT:qst");
}

public function testPosTagging1630228792_3074() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "\"Excuse me. Officer Hopps, what can you tell us about the case?\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:quote INT:comp SENT NOUN-m:s NPR PON:sep NOUN-m:s VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-P ADV ART-M:s NOUN-m:s SENT:qst SENT PON:quote");
}

public function testPosTagging1630228815_5622() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We still don't know.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P ADV:tim AUX:inf+pres ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630228965_7356() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And irresponsible and small-minded.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADJ:pos+m+s CON ADJ:pos+m+s PON:sep PPAST:part+past+m+s SENT");
}
}