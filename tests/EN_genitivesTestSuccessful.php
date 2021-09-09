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

class ENgenitivesTestSuccessful extends TestCase
{

public function testPosTagging1631001904_647() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bullpen's over there to the left.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR VER:ind+pres+3+s ADV ADV PRE ART-M:s PPAST:part+past+m+s SENT");
}

public function testPosTagging1631001909_4154() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Something's up with Jack Something's up with Jack";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ADV PRE NPR NOUN-m:s VER:ind+pres+3+s ADV PRE NPR SENT");
}

public function testPosTagging1631001915_4033() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Chief, Mrs. Otterton's here to see you again.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep ABL NPR VER:ind+pres+3+s ADV:plc PRE VER:inf+pres PRO-PERS-2-M-S ADV SENT");
}

public function testPosTagging1631001921_7005() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nangi's just on the other side of the Pleasure Pool.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR VER:ind+pres+3+s ADV PRE ART-M:s ADJ:pos+m+s NOUN-m:s PRE ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1631001938_8581() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Life's no fun without a good scare";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ADV:neg ADJ:pos+m+s ADV:qty PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1631001946_7017() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That poor little bunny's gonna get eaten alive.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s AUX:ind+pres+3+s AUX:ger+pres VER:inf+pres ADJ:pos+m+s ADJ:pos+m+s SENT");
}

public function testPosTagging1631001951_7041() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes, Susie's been nice. Nice. Nice.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep NPR AUX:ind+pres+3+s VER:part+past+m+s ADJ:pos+m+s SENT ADJ:pos+m+s SENT ADJ:pos+m+s SENT");
}

public function testPosTagging1631001954_709() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Someone's darting predators with a serum.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S AUX:ind+pres+3+s VER:ger+pres NOUN-m:p PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1631001965_4777() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "As you can see, Nangi's an elephant, so she'll totally remember everything.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres PON:sep NPR VER:ind+pres+3+s NUM NOUN-m:s PON:sep ADV PRO-PERS-3-F-S VER:inf+pres ADV VER:inf+pres PRO-INDEF-M-S SENT");
}

public function testPosTagging1631001972_6595() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Turns out, real life's a little bit more complicated...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other PON:sep ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s ADV:qty ADV PPAST:part+past+m+s SENT");
}

public function testPosTagging1631001974_1072() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Tomorrow's another day.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1631001987_426() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes, well, in addition to Les's practice there is some oil money.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep ADJ:pos+m+s PON:sep PRE NOUN-m:s PRE NOUN-m:s PRE NPR ADV VER:ind+pres+3+s DET NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1631001992_4220() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Some of the Republic's leaders were executed, imprisoned or exiled,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET PRE ART-M:s NOUN-m:p PRE NOUN-m:s AUX:ind+past+3+p VER:part+past+m+s PON:sep PPAST:part+past+m+s CON:or PPAST:part+past+m+s PON:sep SENT");
}

public function testPosTagging1631002011_2724() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "sniffing Worm's wart! Mmm.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres NOUN-m:s PRE NOUN-m:s SENT:exclam NOUN-m:s SENT");
}

public function testPosTagging1631003038_4267() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "My skull's so full It's tearing me apart";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s ADV ADJ:pos+m+s PRO-PERS-3-M-S VER:ind+pres+3+s VER:ger+pres PRO-PERS-1-M-S ADV SENT");
}

public function testPosTagging1631003100_1629() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Worm's wart. gasping";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRE NOUN-m:s SENT VER:ger+pres SENT");
}

public function testPosTagging1631003105_9734() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nothing's more suspicious than frog's breath.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s ADV ADJ:pos+m+s CON NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1631003162_8595() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and I certainly did not know about your daughter's wedding.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S ADV PPAST:part+past+m+s ADV:neg VER:inf+pres ADV ADJ:pos+m+s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1631003357_9198() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "As often as I've read them Something's wrong";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV ADV PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRO-PERS-3-M-P NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

// next test **

}
