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

class ENZootopiaTestSuccessful extends TestCase
{

public function testPosTagging1630054921_4881() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thousands of years ago,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p PRE NOUN-m:p ADV:tim PON:sep SENT");
}

public function testPosTagging1630054946_6011() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A world where prey were scared of predators.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s ADV NOUN-m:s AUX:ind+past+3+p VER:part+past+m+s PRE NOUN-m:p SENT");
}

public function testPosTagging1630054954_4382() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "these were the forces that ruled our world.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-P VER:ind+past+3+p ART-M:s NOUN-m:p PRO-DEMO-M-S PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630054965_8165() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Blood! Blood! Blood!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam NOUN-m:s SENT:exclam NOUN-m:s SENT:exclam");
}

public function testPosTagging1630054968_8311() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And death.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON NOUN-m:s SENT");
}

public function testPosTagging1630054973_6246() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Back then, the world was divided in two.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim PON:sep ART-M:s NOUN-m:s AUX:ind+past+1+s VER:part+past+m+s PRE NUM SENT");
}

public function testPosTagging1630054977_7594() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Vicious predator...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630054980_5363() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "or meek prey.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:or ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630054986_1252() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But over time, we evolved.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV NOUN-m:s PON:sep PRO-PERS-1-M-P PPAST:part+past+m+s SENT");
}

public function testPosTagging1630055005_565() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And every young mammal has multitudinous opportunities.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADJ:pos+m+s ADJ:pos+m+s ADJ:pos+m+s VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630055008_994() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630055016_7035() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't have to cower in a herd anymore.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres PRE VER:inf+pres PRE PRE NOUN-m:s ADV SENT");
}

public function testPosTagging1630055019_4484() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Instead, I can be an astronaut.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres NUM NOUN-m:s SENT");
}

public function testPosTagging1630055022_6050() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't have to be a lonely hunter anymore.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres PRE VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s ADV SENT");
}

public function testPosTagging1630055036_7446() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm gonna be an actuary!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres AUX:ger+pres VER:inf+pres NUM NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055038_4799() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I can make the world a better place.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres ART-M:s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630055044_8093() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I am going to be...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres PRE VER:inf+pres SENT");
}

public function testPosTagging1630055048_268() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "a police officer!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055055_9251() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bunny cop? That is the most stupidest thing I ever heard.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s SENT:qst PRO-DEMO-M-S VER:ind+pres+3+s ART-M:s ADV:qty ADJ:pos+m+s NOUN-m:s PRO-PERS-1-M-S ADV PPAST:part+past+m+s SENT");
}

public function testPosTagging1630055065_4887() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It may seem impossible to small minds...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:cond+pres+3+s VER:inf+pres ADJ:pos+m+s PRE ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630055071_6132() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm looking at you, Gideon.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres PRE PRO-PERS-2-M-S PON:sep NPR SENT");
}

public function testPosTagging1630055075_5581() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But, just 211 miles away...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PON:sep ADV NUM NOUN-m:p ADV:plc SENT");
}

public function testPosTagging1630055104_6499() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Where our ancestors first joined together in peace...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s NOUN-m:p ADJ:pos+m+s PPAST:part+past+m+s ADV PRE NOUN-m:s SENT");
}

public function testPosTagging1630055109_1194() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and declared that anyone can be anything!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PPAST:part+past+m+s PRO-DEMO-M-S PRO-WH-M-S AUX:inf+pres VER:inf+pres NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055117_439() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you and good night!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi CON INT:leave SENT:exclam");
}

public function testPosTagging1630055138_5236() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Judy, you ever wonder how your mom and me got to be so darn happy?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep PRO-PERS-2-M-S ADV VER:inf+pres ADV ADJ:pos+m+s NOUN-m:s CON PRO-PERS-1-M-S PPAST:part+past+m+s PRE VER:inf+pres ADV ADJ:pos+m+s ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630055152_7065() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, we gave up on our dreams and we settled. Right, Bon?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-1-M-P PPAST:part+past+m+s ADV PRE ADJ:pos+m+s NOUN-m:p CON PRO-PERS-1-M-P PPAST:part+past+m+s SENT ADJ:pos+m+s PON:sep INT:other SENT:qst");
}

public function testPosTagging1630055158_5251() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, yes, that's right, Stu. We settled hard.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep INT:conf PON:sep INT:conf PON:sep NPR SENT PRO-PERS-1-M-P PPAST:part+past+m+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630055167_2272() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "See, that's the beauty of complacency, Jude.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep PRO-DEMO-M-S VER:ind+pres+3+s ART-M:s NOUN-m:s PRE NOUN-m:s PON:sep NPR SENT");
}

public function testPosTagging1630055171_635() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "If you don't try anything new, you'll never fail.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRO-PERS-2-M-S AUX:inf+pres ADV:neg VER:inf+pres NOUN-m:s ADJ:pos+m+s PON:sep PRO-PERS-2-M-S VER:inf+pres ADV:tim VER:inf+pres SENT");
}

public function testPosTagging1630055178_8190() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I like trying actually.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:ger+pres ADV SENT");
}

public function testPosTagging1630055188_3364() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "is it's gonna be difficult,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRO-PERS-3-M-S VER:ind+pres+3+s AUX:ger+pres VER:inf+pres ADJ:pos+m+s PON:sep SENT");
}

public function testPosTagging1630055212_1227() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Right. There's never been a bunny cop. Bunnies don't do that.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT ADV VER:ind+pres+3+s ADV:tim PPAST:part+past+m+s PRE NOUN-m:s NOUN-m:s SENT NOUN-m:p AUX:inf+pres ADV:neg VER:inf+pres PRO-DEMO-M-S SENT");
}

public function testPosTagging1630055214_7791() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Never. Never.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim SENT ADV:tim SENT");
}

public function testPosTagging1630055219_4423() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Then, I guess I'll have to be the first one.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRE VER:inf+pres ART-M:s ADJ:pos+m+s NUM SENT");
}

public function testPosTagging1630055222_4930() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Because I am gonna make the world a better place.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S AUX:inf+pres AUX:ger+pres VER:inf+pres ART-M:s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630055230_7767() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Or, heck, you know, you want to talk about making the world a better place...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:or PON:sep NOUN-m:s PON:sep PRO-PERS-2-M-S VER:inf+pres PON:sep PRO-PERS-2-M-S VER:inf+pres PRE VER:inf+pres ADV VER:ger+pres ART-M:s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630055237_7704() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "no better way to do it than becoming a carrot farmer.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg ADJ:pos+m+s NOUN-m:s PRE VER:inf+pres PRO-PERS-3-M-S CON VER:ger+pres PRE NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630055241_2309() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes! Your dad, me...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:exclam ADJ:pos+m+s NOUN-m:s PON:sep PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630055244_4242() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "your 275 brothers and sisters. We're changing the world!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NUM NOUN-m:p CON NOUN-m:p SENT PRO-PERS-1-M-P AUX:ind+pres+2+s VER:ger+pres ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055251_5423() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "One carrot at a time.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:s PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1630055260_662() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Just putting the seeds in the ground.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ger+pres ART-M:s NOUN-m:p PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630055317_6189() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "At one with the soil. Just getting covered in dirt.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NUM PRE ART-M:s NOUN-m:s SENT ADV VER:ger+pres PPAST:part+past+m+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630055337_8925() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah. Just as long as you don't believe in them too much.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT ADV ADV ADJ:pos+m+s ADV PRO-PERS-2-M-S AUX:inf+pres ADV:neg VER:inf+pres PRE PRO-PERS-3-M-P ADV:qty SENT");
}

public function testPosTagging1630055346_9310() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Where'd the heck she go?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PPAST:part+past+m+s ART-M:s NOUN-m:s PRO-PERS-3-F-S VER:inf+pres SENT:qst");
}

public function testPosTagging1630055348_6539() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Give me your tickets right now...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S ADJ:pos+m+s NOUN-m:p ADV:tim SENT");
}

public function testPosTagging1630055351_8679() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "or I'm gonna kick your meek little sheep butt.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:or PRO-PERS-1-M-S AUX:inf+pres AUX:ger+pres VER:inf+pres ADJ:pos+m+s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630055354_9828() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Cut it out, Gideon!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-S ADV PON:sep NPR SENT:exclam");
}

public function testPosTagging1630055360_1355() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What are you gonna do? Cry?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S AUX:ger+pres VER:inf+pres SENT:qst VER:inf+pres SENT:qst");
}

public function testPosTagging1630055362_4997() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:exclam");
}

public function testPosTagging1630055366_3992() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You heard her. Cut it out.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s PRO-PERS-3-F-S SENT VER:inf+pres PRO-PERS-3-M-S ADV SENT");
}

public function testPosTagging1630055368_9337() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nice costume, loser.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s PON:sep ADJ:pos+m+s SENT");
}

public function testPosTagging1630055374_9014() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What crazy world are you living in";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADJ:pos+m+s NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres PRE SENT");
}

public function testPosTagging1630055377_6224() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "where you think a bunny could be a cop?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-2-M-S VER:inf+pres PRE NOUN-m:s PPAST:part+past+m+s VER:inf+pres PRE NOUN-m:s SENT:qst");
}

public function testPosTagging1630055384_636() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Kindly return my friend's tickets.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:mod VER:inf+pres ADJ:pos+m+s NOUN-m:p PRE NOUN-m:s SENT");
}

public function testPosTagging1630055386_3715() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come and get them.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres CON VER:inf+pres PRO-PERS-3-M-P SENT");
}

public function testPosTagging1630055433_2805() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But watch out, because I'm a fox,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON VER:inf+pres PON:sep CON PRO-PERS-1-M-S VER:inf+pres PRE NOUN-m:s PON:sep SENT");
}

public function testPosTagging1630055449_6400() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "us predators used to eat prey.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P NOUN-m:p PPAST:part+past+m+s PRE VER:inf+pres NOUN-m:s SENT");
}

public function testPosTagging1630055522_3145() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And that killer instinct is still in our \"Dunnah.\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-DEMO-M-S NOUN-m:s NOUN-m:s VER:ind+pres+3+s ADV:tim PRE ADJ:pos+m+s PON:quote NOUN-m:s SENT PON:quote SENT");
}

public function testPosTagging1630055601_207() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm pretty much sure it's pronounced \"DNA.\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s ADV:qty ADJ:pos+m+s PRO-PERS-3-M-S VER:ind+pres+3+s PPAST:part+past+m+s PON:quote NOUN-m:s SENT PON:quote SENT");
}

public function testPosTagging1630055614_8250() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You don't scare me, Gideon.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres ADV:neg VER:inf+pres PRO-PERS-1-M-S PON:sep NPR SENT");
}

public function testPosTagging1630055620_45() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You scared now? Look at her nose twitch!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s ADV:tim SENT:qst VER:inf+pres PRE PRO-PERS-3-F-S NOUN-m:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055623_732() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "She is scared!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S VER:ind+pres+3+s PPAST:part+past+m+s SENT:exclam");
}

public function testPosTagging1630055627_519() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Cry little baby bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630055629_8285() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Cry, cry...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep VER:inf+pres SENT");
}

public function testPosTagging1630055634_3221() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You don't know when to quit, do you?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres ADV:neg VER:inf+pres ADV:when PRE VER:inf+pres PON:sep VER:inf+pres PRO-PERS-2-M-S SENT:qst");
}

public function testPosTagging1630055637_9479() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I want you to remember this moment...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S PRE VER:inf+pres PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630055692_4836() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "carrot-farming, dumb bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630055695_5024() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That looks bad.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp SENT");
}

public function testPosTagging1630055697_2720() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are you okay, Judy?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-2-M-S INT:conf PON:sep NPR SENT:qst");
}

public function testPosTagging1630055698_5492() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah. I'm okay.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT INT:conf SENT");
}

public function testPosTagging1630055702_9936() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Here you go.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:plc PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630055705_7398() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wow! You got our tickets!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT:exclam PRO-PERS-2-M-S PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:p SENT:exclam");
}

public function testPosTagging1630055708_5680() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're awesome, Judy!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s PON:sep NPR SENT:exclam");
}

public function testPosTagging1630055712_6261() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, that Gideon doesn't know what he's talking about.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-DEMO-M-S NPR AUX:ind+pres+3+s ADV:neg VER:inf+pres NOUN-m:s PRO-PERS-3-M-S VER:ind+pres+3+s VER:ger+pres ADV SENT");
}

public function testPosTagging1630055717_978() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, he was right about one thing.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-3-M-S VER:ind+past+1+s ADJ:pos+m+s ADV NUM NOUN-m:s SENT");
}

public function testPosTagging1630055719_3653() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't know when to quit.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres ADV:when PRE VER:inf+pres SENT");
}

public function testPosTagging1630055721_4355() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Listen up, cadets.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADV PON:sep NOUN-m:p SENT");
}

public function testPosTagging1630055732_6041() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Zootopia has 12 unique ecosystems within its city limits.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR VER:ind+pres+3+s NUM ADJ:pos+m+s NOUN-m:p ADV ADJ:pos+m+s NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630055758_5590() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Rainforest District, to name a few.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s PON:sep PRE VER:inf+pres PRE ADJ:pos+m+s SENT");
}

public function testPosTagging1630055761_5171() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're gonna have to master all of them";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:ind+pres+2+s AUX:ger+pres VER:inf+pres PRE VER:inf+pres DET PRE PRO-PERS-3-M-P SENT");
}

public function testPosTagging1630055772_6582() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You'll be dead!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres VER:inf+pres ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630055841_5026() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Scorching sandstorm!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055848_305() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're dead, Bunny Bumpkin!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s PON:sep NOUN-m:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055852_8642() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "1,000-foot fall!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CODE NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055855_3728() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're dead, Carrot Face!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s PON:sep NOUN-m:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055858_9655() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Frigid ice wall!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055860_6845() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're dead, Farm Girl!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s PON:sep NOUN-m:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055862_2860() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Enormous criminal.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630055864_9145() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're dead. Dead, dead, dead!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s SENT ADJ:pos+m+s PON:sep ADJ:pos+m+s PON:sep ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630055869_4834() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Filthy toilet! You're dead, Fluff Butt.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT:exclam PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s PON:sep NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630055873_6525() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Just quit and go home, fuzzy bunny!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:inf+pres CON VER:inf+pres NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630055875_7090() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There's never been a bunny cop.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s ADV:tim PPAST:part+past+m+s PRE NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630055881_9453() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Just a stupid, carrot-farming dumb bunny,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE ADJ:pos+m+s PON:sep NOUN-m:s PON:sep NOUN-m:s ADJ:pos+m+s NOUN-m:s PON:sep SENT");
}

public function testPosTagging1630055885_4344() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "As mayor of Zootopia, I am proud to announce...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV NOUN-m:s PRE NPR PON:sep PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s PRE VER:inf+pres SENT");
}

public function testPosTagging1630055889_5314() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "that my Mammal Inclusion Initiative has produced...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s NOUN-m:s AUX:ind+pres+3+s VER:part+past+m+s SENT");
}

public function testPosTagging1630055942_5863() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Valedictorian of her class, ZPD's very first rabbit officer...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PRE PRO-PERS-3-F-S NOUN-m:s PON:sep NOUN-m:s VER:ind+pres+3+s ADV:qty ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630055944_6203() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Judy Hopps.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR NPR SENT");
}

public function testPosTagging1630055945_3818() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, gosh.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep INT:surp SENT");
}

public function testPosTagging1630055951_8435() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Assistant Mayor Bellwether, her badge.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s NPR PON:sep PRO-PERS-3-F-S NOUN-m:s SENT");
}

public function testPosTagging1630055954_8477() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, yes. Right! Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep INT:conf SENT ADJ:pos+m+s SENT:exclam INT:jubi SENT");
}

public function testPosTagging1630055956_7423() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yay, Judy!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NPR SENT:exclam");
}

public function testPosTagging1630055957_8445() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Judy...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT");
}

public function testPosTagging1630055961_9835() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "it is my great privilege to officially assign you...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE ADV VER:inf+pres PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630055966_828() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "to the heart of Zootopia: Precinct One.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ART-M:s NOUN-m:s PRE NPR PON NOUN-m:s NUM SENT");
}

public function testPosTagging1630055970_7604() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "City Center.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630055972_2465() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Congratulations, Officer Hopps.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep NOUN-m:s NPR SENT");
}

public function testPosTagging1630055979_4571() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I won't let you down. This has been my dream since I was a kid.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres PRO-PERS-2-M-S ADV:plc SENT PRO-DEMO-M-S AUX:ind+pres+3+s VER:part+past+m+s ADJ:pos+m+s NOUN-m:s ADV PRO-PERS-1-M-S VER:ind+past+1+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630055982_107() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's a real proud day for us little guys.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE PRO-PERS-1-M-P ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630056025_3479() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bellwether, make room, will you? Come on.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep VER:inf+pres NOUN-m:s PON:sep VER:inf+pres PRO-PERS-2-M-S SENT:qst INT:conf SENT");
}

public function testPosTagging1630056029_7457() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, Officer Hopps. Let's see those teeth!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep NOUN-m:s NPR SENT VER:inf+pres PRO-PERS-1-M-P VER:inf+pres DET NOUN-m:p SENT:exclam");
}

public function testPosTagging1630056033_7589() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Hopps, right here! Look this way please!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR PON:sep ADV:plc SENT:exclam VER:inf+pres PRO-DEMO-M-S NOUN-m:s INT:other SENT:exclam");
}

public function testPosTagging1630056045_6546() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We're real proud of you, Judy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:ind+pres+2+s ADJ:pos+m+s ADJ:pos+m+s PRE PRO-PERS-2-M-S PON:sep NPR SENT");
}

public function testPosTagging1630056049_5874() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah. Scared, too.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT PPAST:part+past+m+s PON:sep ADV SENT");
}

public function testPosTagging1630056056_3997() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Really, it's kind of a proud-scared combo.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s PRE PRE ADJ:pos+m+s PON:sep PPAST:part+past+m+s NOUN-m:s SENT");
}

public function testPosTagging1630056065_8756() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I mean, Zootopia. So far away. Such a big city.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other INT:other PON:sep NPR SENT ADV ADJ:pos+m+s ADV:plc SENT DET PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630056068_5002() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Guys...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT");
}

public function testPosTagging1630056073_9171() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I've been working for this my whole life.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s VER:ger+pres PRE PRO-DEMO-M-S ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630056078_117() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We know. And we're just a little excited for you, but terrified.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres SENT CON PRO-PERS-1-M-P VER:ind+pres+2+s ADV PRE ADJ:pos+m+s PPAST:part+past+m+s PRE PRO-PERS-2-M-S PON:sep CON PPAST:part+past+m+s SENT");
}

public function testPosTagging1630056083_3979() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The only thing we have to fear is fear itself.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADV NOUN-m:s PRO-PERS-1-M-P VER:inf+pres PRE VER:inf+pres VER:ind+pres+3+s NOUN-m:s PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630056094_6929() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Say nothing of lions and wolves.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADV PRE NOUN-m:p CON NOUN-m:p SENT");
}

public function testPosTagging1630056096_7083() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wolves? Weasels.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT:qst NOUN-m:p SENT");
}

public function testPosTagging1630056099_9668() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You play cribbage with a weasel.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres NOUN-m:s PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1630056199_4277() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And he cheats like there's no tomorrow.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S VER:ind+pres+3+s ADV ADV VER:ind+pres+3+s ADV:neg ADV:tim SENT");
}

public function testPosTagging1630056216_8354() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, Stu.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NPR SENT");
}

public function testPosTagging1630056220_1053() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And foxes are the worst.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON NOUN-m:p VER:ind+pres+2+s ART-M:s ADJ:pos+m+s SENT");
}

public function testPosTagging1630056225_942() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Actually, your father does have a point there. It's in their biology.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep ADJ:pos+m+s NOUN-m:s AUX:ind+pres+3+s VER:inf+pres PRE NOUN-m:s ADV SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630056228_5672() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Remember what happened with Gideon?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres NOUN-m:s PPAST:part+past+m+s PRE NPR SENT:qst");
}

public function testPosTagging1630056232_2324() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "When I was nine.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:when PRO-PERS-1-M-S VER:ind+past+1+s NUM SENT");
}

public function testPosTagging1630056236_6887() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Gideon was a jerk who happened to be a fox.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR VER:ind+past+1+s PRE NOUN-m:s PRO-WH-M-S PPAST:part+past+m+s PRE VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630056241_1933() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I know plenty of bunnies who are jerks.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:qty PRE NOUN-m:p PRO-WH-M-S VER:ind+pres+2+s NOUN-m:p SENT");
}

public function testPosTagging1630056248_6731() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sure, we all do. Absolutely. But just in case...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep PRO-PERS-1-M-P DET VER:inf+pres SENT ADV SENT CON INT:other SENT");
}

public function testPosTagging1630056252_9228() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "we made you a little care package to take with you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P PPAST:part+past+m+s PRO-PERS-2-M-S PRE ADJ:pos+m+s NOUN-m:s NOUN-m:s PRE VER:inf+pres PRE PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630056259_6665() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I put some snacks in there. This is fox deterrent.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres DET NOUN-m:p PRE ADV SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630056262_8840() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, that's safe, to have that.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s PON:sep PRE VER:inf+pres PRO-DEMO-M-S SENT");
}

public function testPosTagging1630056264_2035() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is fox repellent.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630056292_1909() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The deterrent and the repellent, that's all she needs.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s CON ART-M:s NOUN-m:s PON:sep PRO-DEMO-M-S VER:ind+pres+3+s DET PRO-PERS-3-F-S VER:ind+pres+3+s SENT");
}

public function testPosTagging1630056300_3082() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Check this out! For goodness sake.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-DEMO-M-S ADV SENT:exclam PRE NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630056310_2426() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "She has no need for a fox Taser, Stu.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S AUX:ind+pres+3+s ADV:neg VER:inf+pres PRE PRE NOUN-m:s NOUN-m:s PON:sep NPR SENT");
}

public function testPosTagging1630056314_9849() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on. When is there not a need for a fox Taser?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT ADV:when VER:ind+pres+3+s ADV ADV:neg PRE NOUN-m:s PRE PRE NOUN-m:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630056320_9721() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, look! I will take this, to make you stop talking.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep VER:inf+pres SENT:exclam PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-DEMO-M-S PON:sep PRE VER:inf+pres PRO-PERS-2-M-S VER:inf+pres VER:ger+pres SENT");
}

public function testPosTagging1630056323_3813() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Terrific! Everyone wins!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT:exclam PRO-INDEF-M-S VER:ind+pres+3+s SENT:exclam");
}

public function testPosTagging1630056332_6948() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, gotta go! Bye!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep AUX:inf+pres VER:inf+pres SENT:exclam INT:leav SENT:exclam");
}

public function testPosTagging1630056333_5384() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bye, Judy!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:leav PON:sep NPR SENT:exclam");
}

public function testPosTagging1630056335_7620() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I love you guys.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S NOUN-m:p SENT");
}

public function testPosTagging1630056338_395() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Love you, too.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S PON:sep ADV SENT");
}

public function testPosTagging1630056342_9300() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, cripes, here come the waterworks.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NOUN-m:p PON:sep ADV:plc VER:inf+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630056350_7044() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bye, everybody!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:leav PON:sep PRO-INDEF-M-S SENT:exclam");
}

public function testPosTagging1630056353_8168() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bye-bye, Judy! Bye, Judy!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:leav PON:sep INT:leav PON:sep NPR SENT:exclam INT:leav PON:sep NPR SENT:exclam");
}

public function testPosTagging1630056355_9619() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I love you!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S SENT:exclam");
}

public function testPosTagging1630056357_3020() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bye! Bye!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:leav SENT:exclam INT:leav SENT:exclam");
}

public function testPosTagging1630056359_5307() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Goodbye!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:leav SENT:exclam");
}

public function testPosTagging1630056364_7555() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I messed up tonight I lost another fight";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV ADV PRO-PERS-1-M-S PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630056385_2572() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Lost to myself But I'll just start again";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRE PRO-PERS-1-M-S CON PRO-PERS-1-M-S VER:inf+pres ADV VER:inf+pres ADV SENT");
}

public function testPosTagging1630056409_7342() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I keep falling down";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:ger+pres ADV:plc SENT");
}

public function testPosTagging1630056417_433() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I keep on hitting the ground";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE VER:ger+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630056424_2498() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But I always get up now";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S ADV VER:inf+pres ADV:tim SENT");
}

public function testPosTagging1630056428_7949() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "To see what's next";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE VER:inf+pres NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630056431_9208() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Birds don't just fly";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p VER:inf+pres ADV:neg ADV VER:inf+pres SENT");
}

public function testPosTagging1630056433_2500() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They fall down and get up";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:inf+pres ADV:plc CON VER:inf+pres SENT");
}

public function testPosTagging1630056464_9420() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I won't give up No I won't give in";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres ADV ADV:neg PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres PRE SENT");
}

public function testPosTagging1630056481_5935() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Then I'll start again";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-1-M-S VER:inf+pres VER:inf+pres ADV SENT");
}

public function testPosTagging1630056487_5900() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, I won't leave I want to try everything";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres PRO-INDEF-M-S SENT");
}

public function testPosTagging1630056496_8471() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Try everything";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-INDEF-M-S SENT");
}

public function testPosTagging1630056522_428() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'll keep on making those new mistakes";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRE VER:ger+pres DET ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630056526_7644() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I'll keep on making them every day";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRE VER:ger+pres PRO-PERS-3-M-P ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630056527_9597() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Those new mistakes";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630056542_7393() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm Gazelle. Welcome to Zootopia.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres NOUN-m:s SENT ADJ:pos+m+s PRE NPR SENT");
}

public function testPosTagging1630056549_5709() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Luxury apartments with charm.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:p PRE NOUN-m:s SENT");
}

public function testPosTagging1630056556_9757() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Complimentary delousing once a month. Don't lose your key.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s VER:ger+pres ADV PRE NOUN-m:s SENT AUX:inf+pres ADV:neg VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630056590_7230() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT");
}

public function testPosTagging1630056624_4880() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hi! I'm Judy, your new neighbor.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:exclam PRO-PERS-1-M-S VER:inf+pres NPR PON:sep ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630056631_6528() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah? Well, we're loud.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:qst ADJ:pos+m+s PON:sep PRO-PERS-1-M-P VER:ind+pres+2+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630056634_2138() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Don't expect us to apologize for it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres PRO-PERS-1-M-P PRE VER:inf+pres PRE PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630056636_5587() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Greasy walls.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630056638_2615() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey, shut up!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep VER:inf+pres SENT:exclam");
}

public function testPosTagging1630056664_857() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Rickety bed.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630056672_1271() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You shut up! You shut up!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres SENT:exclam PRO-PERS-2-M-S SENT:exclam");
}

public function testPosTagging1630056674_9851() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Will you shut up?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S VER:inf+pres SENT:qst");
}

public function testPosTagging1630056676_2654() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Crazy neighbors.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630056679_9426() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I said, \"Shut up!\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PON:sep PON:quote VER:inf+pres SENT:exclam SENT PON:quote");
}

public function testPosTagging1630056684_7125() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I love it!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-S SENT:exclam");
}

public function testPosTagging1630056687_238() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:exclam");
}

public function testPosTagging1630056690_7805() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He bared his teeth first!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:p ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630056691_2012() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Excuse me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp SENT");
}

public function testPosTagging1630056693_5029() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Down here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:plc ADV:plc SENT");
}

public function testPosTagging1630056695_1539() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hi.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT");
}

public function testPosTagging1630056706_131() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They really did hire a bunny! What!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P ADV PPAST:part+past+m+s VER:inf+pres PRE NOUN-m:s SENT:exclam INT:surp");
}

public function testPosTagging1630056728_7626() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "but when other animals do it...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV:when ADJ:pos+m+s NOUN-m:p VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630056730_9493() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "it's a little...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE ADJ:pos+m+s SENT");
}

public function testPosTagging1630056737_3949() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I am so sorry! Me, Benjamin Clawhauser...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV ADJ:pos+m+s SENT:exclam PRO-PERS-1-M-S PON:sep NPR NPR SENT");
}

public function testPosTagging1630056797_5893() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "the guy everyone thinks is just a flabby, donut-loving cop, stereotyping you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s PRO-INDEF-M-S VER:ind+pres+3+s VER:ind+pres+3+s ADV PRE ADJ:pos+m+s PON:sep NOUN-m:s PON:sep VER:ger+pres NOUN-m:s PON:sep VER:ger+pres PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630056803_6663() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, it's okay. Oh, you've actually got... There's a...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s INT:conf SENT INT:surp PON:sep PRO-PERS-2-M-S AUX:inf+pres ADV VER:part+past+m+s SENT ADV VER:ind+pres+3+s PRE SENT");
}

public function testPosTagging1630056807_5849() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In your neck. The fold.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s NOUN-m:s SENT ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630056809_874() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Where? Oh!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT:qst INT:surp SENT:exclam");
}

public function testPosTagging1630056815_5518() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There you went, you little dickens!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-2-M-S PPAST:part+past+m+s PON:sep PRO-PERS-2-M-S ADJ:pos+m+s NPR SENT:exclam");
}

public function testPosTagging1630056821_3930() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I should get to roll call, which way do I...?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRE VER:inf+pres NOUN-m:s PON:sep PRO-WH-M-S NOUN-m:s VER:inf+pres PRO-PERS-1-M-S SENT SENT:qst");
}

public function testPosTagging1630056832_4522() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Great. Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT INT:jubi SENT");
}

public function testPosTagging1630056838_1883() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey, Officer Hopps.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep NOUN-m:s NPR SENT");
}

public function testPosTagging1630056842_1905() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You ready to make the world a better place?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PRE VER:inf+pres ART-M:s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630056851_768() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All right! Everybody sit.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:exclam PRO-INDEF-M-S VER:inf+pres SENT");
}

public function testPosTagging1630056867_4561() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I've got three items on the docket.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s NUM NOUN-m:p PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630056962_3032() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "First... we need to acknowledge the elephant in the room.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT PRO-PERS-1-M-P VER:inf+pres PRE VER:inf+pres ART-M:s NOUN-m:s PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630056980_9921() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Francine...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT");
}

public function testPosTagging1630056981_9531() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Happy birthday.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630056984_5484() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Number two.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NUM SENT");
}

public function testPosTagging1630056988_3952() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There are some new recruits with us I should introduce...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+2+s DET ADJ:pos+m+s NOUN-m:p PRE PRO-PERS-1-M-P PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1630056993_1126() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "but I'm not going to....";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:ger+pres PRE SENT");
}

public function testPosTagging1630056995_7354() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "because I don't care.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630057005_3430() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All predators, from a giant polar bear to a teensy little otter.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET NOUN-m:p PON:sep PRE PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057024_8026() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is priority number one.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s NOUN-m:s NUM SENT");
}

public function testPosTagging1630057025_2524() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Assignments.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT");
}

public function testPosTagging1630057030_2728() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officers Grizzoli...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p NPR SENT");
}

public function testPosTagging1630057050_8053() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Fangmeyer, Delgato.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep NPR SENT");
}

public function testPosTagging1630057055_6431() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Your teams take missing mammals from the Rainforest District.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:p VER:inf+pres VER:ger+pres NOUN-m:p PRE ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630057076_9161() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officers McHorn, Rhinowitz, Wolfard.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p NPR PON:sep NPR PON:sep NPR SENT");
}

public function testPosTagging1630057082_5425() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officers Higgins, Snarlov, Trunkaby.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p NPR PON:sep NPR PON:sep NPR SENT");
}

public function testPosTagging1630057083_9624() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Tundratown.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT");
}

public function testPosTagging1630057086_1458() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And finally, our first bunny...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV PON:sep ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057087_2526() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Hopps.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR SENT");
}

public function testPosTagging1630057089_388() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Parking Duty.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630057091_3046() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Dismissed.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s SENT");
}

public function testPosTagging1630057093_6907() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Parking duty?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630057095_6642() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Chief!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam");
}

public function testPosTagging1630057097_8389() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Chief Bogo?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR SENT:qst");
}

public function testPosTagging1630057104_1928() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So? So, I can handle one.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT:qst ADV PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres NUM SENT");
}

public function testPosTagging1630057111_4024() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Didn't forget. Just don't care.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s ADV:neg VER:inf+pres SENT ADV AUX:inf+pres ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630057116_4288() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir, I'm not just some token bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-1-M-S VER:inf+pres ADV:neg ADV DET ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057123_5827() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, then writing 100 tickets a day should be easy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other ADV VER:ger+pres NUM NOUN-m:p PRE NOUN-m:s AUX:inf+pres VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630057127_3606() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "100 tickets. I'm not gonna write 100 tickets.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:p SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg AUX:ger+pres VER:inf+pres NUM NOUN-m:p SENT");
}

public function testPosTagging1630057130_2545() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm gonna write 200 tickets.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres AUX:ger+pres VER:inf+pres NUM NOUN-m:p SENT");
}

public function testPosTagging1630057132_1798() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Before noon.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV NOUN-m:s SENT");
}

public function testPosTagging1630057134_1197() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Boom!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam");
}

public function testPosTagging1630057137_6499() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "200 tickets before noon!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:p ADV NOUN-m:s SENT:exclam");
}

public function testPosTagging1630057139_8739() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "201.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM SENT");
}

public function testPosTagging1630057144_9727() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Where'd he go?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PPAST:part+past+m+s PRO-PERS-3-M-S VER:inf+pres SENT:qst");
}

public function testPosTagging1630057172_7095() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't know what you're doing skulking around during daylight hours...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres NOUN-m:s PRO-PERS-2-M-S AUX:ind+pres+2+s AUX:ger+pres VER:ger+pres ADV ADV NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630057186_8869() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm not looking for any trouble either, sir.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:ger+pres PRE DET NOUN-m:s CON PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630057190_8736() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "for my little boy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057196_3981() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You want the red or the blue, pal?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres ART-M:s NOUN-m:s CON:or ART-M:s NOUN-m:s PON:sep NOUN-m:s SENT:qst");
}

public function testPosTagging1630057198_1324() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm such a...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres DET PRE SENT");
}

public function testPosTagging1630057200_911() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on, kid. Back up.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep NOUN-m:s SENT ADJ:pos+m+s ADV SENT");
}

public function testPosTagging1630057215_1587() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "in your part of town?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s NOUN-m:s PRE NOUN-m:s SENT:qst");
}

public function testPosTagging1630057217_417() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, no. There are.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep ADV:neg SENT ADV VER:ind+pres+2+s SENT");
}

public function testPosTagging1630057222_9457() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There are. It's just, my boy, this goofy little stinker...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+2+s SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV PON:sep ADJ:pos+m+s NOUN-m:s PON:sep PRO-DEMO-M-S ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057229_8438() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "he loves all things elephant. Wants to be one when he grows up.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s DET NOUN-m:p NOUN-m:s SENT VER:ind+pres+3+s PRE VER:inf+pres NUM ADV:when PRO-PERS-3-M-S VER:ind+pres+3+s ADV SENT");
}

public function testPosTagging1630057232_2263() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Is that adorable?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRO-DEMO-M-S ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630057237_8854() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Who the heck am I to crush his little dreams? Right?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S ART-M:s NOUN-m:s VER:inf+pres PRO-PERS-1-M-S PRE VER:inf+pres ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p SENT:qst ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630057243_5354() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You probably can't read, fox, but the sign says...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S ADV ADV:neg VER:inf+pres PON:sep NOUN-m:s PON:sep CON ART-M:s NOUN-m:s VER:ind+pres+3+s SENT");
}

public function testPosTagging1630057246_7029() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "\"We reserve the right to refuse service...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres ART-M:s NOUN-m:s PRE VER:inf+pres NOUN-m:s SENT");
}

public function testPosTagging1630057255_5882() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're holding up the line.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres ADV ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630057257_246() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hello? Excuse me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:qst INT:comp SENT");
}

public function testPosTagging1630057264_3675() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're gonna have to wait your turn like everyone else, meter maid.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:ind+pres+2+s AUX:ger+pres VER:inf+pres PRE VER:inf+pres ADJ:pos+m+s NOUN-m:s ADV PRO-INDEF-M-S ADV PON:sep NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630057267_2452() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Actually, I'm an officer.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-1-M-S VER:inf+pres NUM NOUN-m:s SENT");
}

public function testPosTagging1630057269_9784() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Just had a quick question.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057302_2414() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are your customers aware they're getting snot and mucus";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s ADJ:pos+m+s NOUN-m:p ADJ:pos+m+s PRO-PERS-3-M-P AUX:ind+pres+2+s VER:ger+pres NOUN-m:s CON NOUN-m:s SENT");
}

public function testPosTagging1630057309_1101() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What are you talking about?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres ADV SENT:qst");
}

public function testPosTagging1630057336_246() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't want to cause you any trouble, but I believe scooping ice cream...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres PRE VER:inf+pres PRO-PERS-2-M-S DET NOUN-m:s PON:sep CON PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630057390_8192() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "with their cookies and cream?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s NOUN-m:p CON NOUN-m:s SENT:qst");
}

public function testPosTagging1630057407_7463() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Which is kind of a big deal.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S VER:ind+pres+3+s NOUN-m:s PRE PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057413_1554() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Of course, I could let you off with a warning...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRO-PERS-2-M-S ADV PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1630057516_2053() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "with an ungloved trunk is a Class 3 health code violation.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NUM PPAST:part+past+m+s NOUN-m:s VER:ind+pres+3+s PRE NOUN-m:s NUM NOUN-m:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630057520_7125() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "if you were to glove those trunks and, I don't know...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRO-PERS-2-M-S VER:ind+past+3+p PRE VER:inf+pres DET NOUN-m:p CON PON:sep PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630057526_4733() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What was it?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+past+1+s PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630057544_5235() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, no. Are you kidding me? I don't have my wallet.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV:neg SENT VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres PRO-PERS-1-M-S SENT:qst PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057550_5706() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'd lose my head if it weren't attached to my neck. That's the truth.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres ADJ:pos+m+s NOUN-m:s CON:cond PRO-PERS-3-M-S ADV ADV:neg PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s SENT PRO-DEMO-M-S VER:ind+pres+3+s ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630057556_1338() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, boy. I'm sorry, pal. Got to be about the worst birthday ever.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NOUN-m:s SENT INT:comp PON:sep NOUN-m:s SENT PPAST:part+past+m+s PRE VER:inf+pres ADV ART-M:s ADJ:pos+m+s NOUN-m:s ADV SENT");
}

public function testPosTagging1630057558_7432() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Please don't be mad at me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other AUX:inf+pres ADV:neg VER:inf+pres ADJ:pos+m+s PRE PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630057561_2729() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thanks anyway.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi ADV:mod SENT");
}

public function testPosTagging1630057563_7348() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Keep the change.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630057590_7813() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So kind, really. Can I pay you back?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s PON:sep ADV SENT VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630057595_9653() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, no, My treat. It just...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV:neg PON:sep ADJ:pos+m+s NOUN-m:s SENT PRO-PERS-3-M-S ADV SENT");
}

public function testPosTagging1630057599_2999() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You know, it burns me up to see folks";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s PRO-PERS-1-M-S ADV PRE VER:inf+pres NOUN-m:p SENT");
}

public function testPosTagging1630057609_238() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I just wanna say you're a great dad and just a...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV AUX:inf+pres VER:inf+pres PRO-PERS-2-M-S VER:ind+pres+2+s PRE ADJ:pos+m+s NOUN-m:s CON ADV PRE SENT");
}

public function testPosTagging1630057614_6830() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "a real articulate fella.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057671_8287() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, that is high praise. It's rare that I find someone so non-patronizing.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:p SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s PRO-DEMO-M-S PRO-PERS-1-M-S VER:inf+pres PRO-INDEF-M-S ADV ADV PON:sep VER:ger+pres SENT");
}

public function testPosTagging1630057673_5895() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
}

public function testPosTagging1630057677_6416() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hopps. Mister...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT NOUN-m:s SENT");
}

public function testPosTagging1630057683_6608() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And you, little guy...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-2-M-S PON:sep ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057688_9533() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You want to be an elephant when you grow up? You be an elephant.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PRE VER:inf+pres NUM NOUN-m:s ADV:when PRO-PERS-2-M-S VER:inf+pres ADV SENT:qst PRO-PERS-2-M-S VER:inf+pres NUM NOUN-m:s SENT");
}

public function testPosTagging1630057690_8611() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Because this is Zootopia.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-DEMO-M-S VER:ind+pres+3+s NPR SENT");
}

public function testPosTagging1630057692_4618() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Anyone can be anything.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S AUX:inf+pres VER:inf+pres NOUN-m:s SENT");
}

public function testPosTagging1630057697_2927() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Boy, I tell him that all the time.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-S PRO-DEMO-M-S DET ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630057702_5424() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All right, here you go. Two paws. Yeah.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep ADV:plc PRO-PERS-2-M-S VER:inf+pres SENT NUM NOUN-m:p SENT INT:conf SENT");
}

public function testPosTagging1630057707_3279() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Look at that smile. That's a \"happy birthday\" smile.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE PRO-DEMO-M-S NOUN-m:s SENT PRO-DEMO-M-S VER:ind+pres+3+s PRE PON:quote ADJ:pos+m+s NOUN-m:s PON:quote NOUN-m:s SENT");
}

public function testPosTagging1630057717_7613() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bye, now.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:leav PON:sep ADV:tim SENT");
}

public function testPosTagging1630057719_6039() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Goodbye!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:leav SENT:exclam");
}

public function testPosTagging1630057726_6670() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Popsicles!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT:exclam");
}

public function testPosTagging1630057729_6237() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Get your popsicles!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADJ:pos+m+s NOUN-m:p SENT:exclam");
}

public function testPosTagging1630057734_8466() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Lumber delivery.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630057740_2858() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's with the color?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRE ART-M:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630057741_4730() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The color?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630057745_6181() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's red wood.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057749_423() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "39, 40. There you go.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM PON:sep NUM SENT ADV PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630057776_942() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Way to work that diaper, big guy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRE VER:inf+pres PRO-DEMO-M-S NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057804_681() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You kiss me tomorrow, I'll bite your face off.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-S ADV:tim PON:sep PRO-PERS-1-M-S VER:inf+pres VER:inf+pres ADJ:pos+m+s NOUN-m:s ADV SENT");
}

public function testPosTagging1630057807_5792() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ciao.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:entleav SENT");
}

public function testPosTagging1630057811_1781() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well. I stood up for you, and you lied to me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV PRE PRO-PERS-2-M-S PON:sep CON PRO-PERS-2-M-S PPAST:part+past+m+s PRE PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630057813_6909() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You liar!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S NOUN-m:s SENT:exclam");
}

public function testPosTagging1630057817_9337() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's called a hustle, sweetheart.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PPAST:part+past+m+s PRE NOUN-m:s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630057821_4557() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I'm not the liar. He is.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres ADV:neg ART-M:s NOUN-m:s SENT PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
}

public function testPosTagging1630057823_9419() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:exclam");
}

public function testPosTagging1630057833_6348() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Really? For what?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT:qst PRE NOUN-m:s SENT:qst");
}

public function testPosTagging1630057889_9109() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Transporting undeclared commerce across borough lines.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s NOUN-m:s ADV NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630057909_4178() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "False advertising.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630057923_7395() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Permit. Receipt of declared commerce.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT NOUN-m:s PRE PPAST:part+past+m+s NOUN-m:s SENT");
}

public function testPosTagging1630058034_6586() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I didn't falsely advertise anything. Take care.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S PPAST:part+past+m+s ADV:neg ADV VER:inf+pres NOUN-m:s SENT INT:leave INT:leave SENT");
}

public function testPosTagging1630058052_5856() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's right. \"Red wood.\" With a space in the middle.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT ADJ:pos+m+s NOUN-m:s PON:quote SENT PRE PRE PON:quote NOUN-m:s ADV:plc SENT");
}

public function testPosTagging1630058062_1505() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You can't touch me, Carrots. I've been doing this since I was born.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S ADV:neg VER:inf+pres PRO-PERS-1-M-S PON:sep NOUN-m:p SENT PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s VER:ger+pres PRO-DEMO-M-S ADV PRO-PERS-1-M-S AUX:ind+past+1+s VER:inf+pres SENT");
}

public function testPosTagging1630058078_6618() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "My bad. I just naturally assumed";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADJ:pos+m+s SENT PRO-PERS-1-M-S ADV ADV PPAST:part+past+m+s SENT");
}

public function testPosTagging1630058649_6738() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay. Tell me if this story sounds familiar.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT VER:inf+pres PRO-PERS-1-M-S CON:cond PRO-DEMO-M-S NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630058655_7822() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Naive little hick with good grades and big ideas...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADJ:pos+m+s ADJ:pos+m+s PRE ADJ:pos+m+s NOUN-m:p CON ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630058674_1345() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Only to find, whoopsie...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE VER:inf+pres PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630058680_878() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "we don't all get along. And that dream of becoming a big city cop?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres ADV:neg DET VER:inf+pres ADV SENT CON PRO-DEMO-M-S NOUN-m:s PRE VER:ger+pres PRE ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630058692_6370() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And soon enough, those dreams die";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV ADV:qty PON:sep DET NOUN-m:p VER:inf+pres SENT");
}

public function testPosTagging1630058697_8714() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and our bunny sinks into emotional and literal squalor...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s ADV ADJ:pos+m+s CON ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630058700_1095() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "living in a box under a bridge...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres PRE PRE NOUN-m:s ADV PRE NOUN-m:s SENT");
}

public function testPosTagging1630058706_769() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "till finally she has no choice but to go back home...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim ADV PRO-PERS-3-F-S VER:ind+pres+3+s ADV:neg NOUN-m:s CON PRE VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630058711_4764() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "to become...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE VER:inf+pres SENT");
}

public function testPosTagging1630058731_4268() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Be careful, now, or it won't just be your dreams getting crushed.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADJ:pos+m+s PON:sep ADV:tim PON:sep CON:or PRO-PERS-3-M-S AUX:inf+pres ADV:neg ADV VER:inf+pres ADJ:pos+m+s NOUN-m:p VER:ger+pres PPAST:part+past+m+s SENT");
}

public function testPosTagging1630058741_7888() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Especially not some jerk...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV:neg DET NOUN-m:s SENT");
}

public function testPosTagging1630058749_953() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "who never had the guts to try to be anything more than a popsicle hustler.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S ADV:tim PPAST:part+past+m+s ART-M:s NOUN-m:s PRE VER:inf+pres PRE VER:inf+pres NOUN-m:s ADV CON PRE NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630058752_9066() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All right, look. Everyone comes to Zootopia...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep VER:inf+pres SENT PRO-INDEF-M-S VER:ind+pres+3+s PRE NPR SENT");
}

public function testPosTagging1630058755_1763() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "thinking they can be anything they want.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres PRO-PERS-3-M-P AUX:inf+pres VER:inf+pres NOUN-m:s PRO-PERS-3-M-P VER:inf+pres SENT");
}

public function testPosTagging1630058757_5593() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, you can't.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-2-M-S ADV:neg SENT");
}

public function testPosTagging1630058763_567() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You can only be what you are.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres ADV VER:inf+pres NOUN-m:s PRO-PERS-2-M-S VER:ind+pres+2+s SENT");
}

public function testPosTagging1630058764_2990() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey! No one tells me what I can or can't be!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:exclam ADV:neg NUM VER:ind+pres+3+s PRO-PERS-1-M-S NOUN-m:s PRO-PERS-1-M-S VER:inf+pres CON:or ADV:neg VER:inf+pres SENT:exclam");
}

public function testPosTagging1630058770_3022() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm not a dumb bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630058782_3769() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Right. And that's not wet cement.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT CON PRO-DEMO-M-S VER:ind+pres+3+s ADV:neg ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630058785_3830() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You'll never be a real cop.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres ADV:tim VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630058788_1306() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're a cute meter maid, though.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s PRE ADJ:pos+m+s NOUN-m:s NOUN-m:s PON:sep CON:cond SENT");
}

public function testPosTagging1630058791_9174() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Maybe a supervisor one day.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE NOUN-m:s NUM NOUN-m:s SENT");
}

public function testPosTagging1630058795_6123() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You can't do nothing right, babe";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S ADV:neg VER:inf+pres ADV ADJ:pos+m+s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630058799_2523() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm a loser";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE ADJ:pos+m+s SENT");
}

public function testPosTagging1630058802_8914() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, hey, it's my parents.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep INT:enter PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630058804_3018() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, there she is!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV PRO-PERS-3-F-S VER:ind+pres+3+s SENT:exclam");
}

public function testPosTagging1630058807_9226() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hi, sweetheart!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058813_8171() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey there, Jude the dude. How was your first day on the force?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter ADV PON:sep NPR ART-M:s NOUN-m:s SENT ADV VER:ind+past+1+s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE ART-M:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630058816_3648() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It was real great. Yeah?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+past+1+s ADJ:pos+m+s ADJ:pos+m+s SENT INT:conf SENT:qst");
}

public function testPosTagging1630058818_3293() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Everything you ever hoped?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S PRO-PERS-2-M-S ADV PPAST:part+past+m+s SENT:qst");
}

public function testPosTagging1630058828_5193() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Absolutely.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT");
}

public function testPosTagging1630058832_9014() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And more. Everyone's so nice and...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV SENT PRO-INDEF-M-S VER:ind+pres+3+s ADV ADJ:pos+m+s CON SENT");
}

public function testPosTagging1630058846_4281() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, my sweet heaven!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058849_9245() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Judy, are you a meter maid?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep VER:ind+pres+2+s PRO-PERS-2-M-S PRE NOUN-m:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630058854_6380() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This? No! Oh, no. This is just a temporary thing.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S SENT:qst ADV:neg SENT:exclam INT:surp PON:sep ADV:neg SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630058858_7213() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's the safest job on the force!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ART-M:s ADJ:pos+m+s NOUN-m:s PRE ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058862_594() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "She's not a real cop. Our prayers have been answered!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S VER:ind+pres+3+s ADV:neg PRE ADJ:pos+m+s NOUN-m:s SENT ADJ:pos+m+s NOUN-m:p AUX:inf+pres AUX:part+past+m+s VER:part+past+m+s SENT:exclam");
}

public function testPosTagging1630058865_8619() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Glorious day! Meter maid! Meter maid!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT:exclam NOUN-m:s NOUN-m:s SENT:exclam NOUN-m:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058868_1638() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Meter maid! Meter maid! Dad. Dad. Dad!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s SENT:exclam NOUN-m:s NOUN-m:s SENT:exclam NOUN-m:s SENT NOUN-m:s SENT NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058871_2046() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's been a really long day. I should really...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PPAST:part+past+m+s PRE ADV ADJ:pos+m+s NOUN-m:s SENT PRO-PERS-1-M-S VER:inf+pres ADV SENT");
}

public function testPosTagging1630058874_4890() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's right, you get some rest.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-2-M-S VER:inf+pres DET NOUN-m:s SENT");
}

public function testPosTagging1630058876_8972() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Those meters aren't gonna maid themselves.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET NOUN-m:p AUX:ind+pres+2+s ADV:neg VER:ger+pres NOUN-m:s PRO-PERS-3-M-P SENT");
}

public function testPosTagging1630058879_959() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bye-bye.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:leav PON:sep INT:leav SENT");
}

public function testPosTagging1630058881_9875() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Buh-bye.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep INT:leav SENT");
}

public function testPosTagging1630058894_5763() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Leave the meter maid alone. Didn't you hear her conversation?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NOUN-m:s NOUN-m:s ADJ:pos+m+s SENT PPAST:part+past+m+s ADV:neg PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-F-S NOUN-m:s SENT:qst");
}

public function testPosTagging1630058897_5323() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "She feels like a failure!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S VER:ind+pres+3+s ADV PRE NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058903_5958() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, shut up! You shut up!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep VER:inf+pres SENT:exclam PRO-PERS-2-M-S SENT:exclam");
}

public function testPosTagging1630058906_8470() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You shut up! You shut up!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres SENT:exclam PRO-PERS-2-M-S SENT:exclam");
}

public function testPosTagging1630058912_1108() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I was 30 seconds over!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:ind+past+1+s NUM NOUN-m:p ADV SENT:exclam");
}

public function testPosTagging1630058915_9191() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're a real hero, lady!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s PRE ADJ:pos+m+s NOUN-m:s PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058926_228() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "My mommy says she wishes you were dead.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s PRO-PERS-3-F-S VER:ind+pres+3+s PRO-PERS-2-M-S VER:ind+past+3+p ADJ:pos+m+s SENT");
}

public function testPosTagging1630058932_8824() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Uncool, rabbit. My tax dollars pay your salary.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep NOUN-m:s SENT ADJ:pos+m+s NOUN-m:s NOUN-m:p VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630058936_6321() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I am a real cop. I am a real cop. I am a real cop.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s SENT PRO-PERS-1-M-S VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s SENT PRO-PERS-1-M-S VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630058939_220() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey, hey! You, bunny!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep INT:enter SENT:exclam PRO-PERS-2-M-S PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058947_6293() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir. If you have a grievance, you may contest your citation in traffic court.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT CON:cond PRO-PERS-2-M-S VER:inf+pres PRE NOUN-m:s PON:sep PRO-PERS-2-M-S VER:cond+pres+3+s VER:inf+pres ADJ:pos+m+s NOUN-m:s PRE NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630058953_3198() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What are you talking about? My shop!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres ADV SENT:qst ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058957_6324() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It was just robbed! Look!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S AUX:ind+past+1+s ADV VER:part+past+m+s SENT:exclam VER:inf+pres SENT:exclam");
}

public function testPosTagging1630058960_8865() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He's getting away!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s VER:ger+pres ADV:plc SENT:exclam");
}

public function testPosTagging1630058962_872() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are you a cop or not?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-2-M-S PRE NOUN-m:s CON:or ADV:neg SENT:qst");
}

public function testPosTagging1630058968_6312() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes! Don't worry, sir! I've got this!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:exclam AUX:inf+pres ADV:neg VER:inf+pres PON:sep NOUN-m:s SENT:exclam PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s PRO-DEMO-M-S SENT:exclam");
}

public function testPosTagging1630058978_3982() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Catch me if you can, Cottontail!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S CON:cond PRO-PERS-2-M-S VER:inf+pres PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058986_6471() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is Officer McHorn, we got a 10-31.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s NPR PON:sep PRO-PERS-1-M-P PPAST:part+past+m+s PRE NUM SENT");
}

public function testPosTagging1630058989_2897() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I got dibs!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s NOUN-m:p SENT:exclam");
}

public function testPosTagging1630058992_4536() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Hopps. I am in pursuit!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR SENT PRO-PERS-1-M-S VER:inf+pres PRE NOUN-m:s SENT:exclam");
}

public function testPosTagging1630058994_7142() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S SENT:exclam");
}

public function testPosTagging1630059007_4212() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Excuse me. Excuse me. Pardon.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp SENT SENT INT:comp SENT");
}

public function testPosTagging1630059055_7942() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Have a donut, copper!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE NOUN-m:s PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630059061_7997() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I love your hair.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630059062_9919() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT");
}

public function testPosTagging1630059064_1903() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come to papa.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630059072_2905() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mrs. Otterton. Okay?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ABL NPR SENT INT:conf SENT:qst");
}

public function testPosTagging1630059073_1253() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I popped the weasel!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630059075_5282() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hopps!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam");
}

public function testPosTagging1630059077_2708() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Abandoning your post.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630059090_4571() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Inciting a scurry.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630059092_6457() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Reckless endangerment of rodents.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s PRE NOUN-m:p SENT");
}

public function testPosTagging1630059161_5869() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But, to be fair...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PON:sep PRE VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630059181_2451() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They're a Class-C botanical, sir.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:ind+pres+2+s PRE NOUN-m:s PON:sep CODE ADJ:pos+m+s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630059193_1105() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir, I got the bad guy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s ART-M:s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630059195_1965() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's my job.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630059205_3796() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Not now.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg ADV:tim SENT");
}

public function testPosTagging1630059213_9106() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, I just didn't know if you'd want to take it this time.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-1-M-S ADV PPAST:part+past+m+s ADV:neg VER:inf+pres CON:cond PRO-PERS-2-M-S PPAST:part+past+m+s VER:inf+pres PRE VER:inf+pres PRO-PERS-3-M-S PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630059272_7989() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Not now! Sir...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg ADV:tim SENT:exclam NOUN-m:s SENT");
}

public function testPosTagging1630059277_4591() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't want to be a meter maid, I want to be a real cop.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres PRE VER:inf+pres PRE NOUN-m:s NOUN-m:s PON:sep PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630059283_5505() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Do you think the mayor asked me what I wanted when he assigned you to me?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S VER:inf+pres ART-M:s NOUN-m:s PPAST:part+past+m+s PRO-PERS-1-M-S NOUN-m:s PRO-PERS-1-M-S PPAST:part+past+m+s ADV:when PRO-PERS-3-M-S PPAST:part+past+m+s PRO-PERS-2-M-S PRE PRO-PERS-1-M-S SENT:qst");
}

public function testPosTagging1630059286_8366() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But, sir, if...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PON:sep NOUN-m:s PON:sep CON:cond SENT");
}

public function testPosTagging1630059290_2080() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Life isn't some cartoon musical where you sing a little song...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ADV:neg DET NOUN-m:s NOUN-m:s ADV PRO-PERS-2-M-S VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630059294_6445() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and your insipid dreams magically come true.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p ADV VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630059296_4777() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So, let it go.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep VER:inf+pres PRO-PERS-3-M-S VER:inf+pres SENT");
}

public function testPosTagging1630059301_772() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Chief Bogo, please. Five minutes of your time.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR PON:sep INT:other SENT NUM NOUN-m:p PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630059306_9298() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm sorry, sir.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630059309_8476() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I tried to stop her. She is super-slippery.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRE VER:inf+pres PRO-PERS-3-F-S SENT PRO-PERS-3-F-S VER:ind+pres+3+s ADJ:pos+m+s PON:sep ADJ:pos+m+s SENT");
}

public function testPosTagging1630059313_2135() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I gotta go sit down.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres AUX:inf+pres VER:inf+pres ADV:plc SENT");
}

public function testPosTagging1630059349_2823() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "My husband has been missing for 10 days. His name is Emmitt Otterton.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s AUX:ind+pres+3+s VER:part+past+m+s VER:ger+pres PRE NUM NOUN-m:p SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s NPR NPR SENT");
}

public function testPosTagging1630059351_8650() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes, I know.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-1-M-S VER:inf+pres SENT");
}

public function testPosTagging1630059354_9019() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He's a florist.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630059362_9830() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We have two beautiful children. He would never just disappear.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres NUM ADJ:pos+m+s NOUN-m:p SENT PRO-PERS-3-M-S PPAST:part+past+m+s ADV:tim ADV VER:inf+pres SENT");
}

public function testPosTagging1630059371_3428() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Please. There's got to be someone to find my Emmitt.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other SENT ADV VER:ind+pres+3+s PPAST:part+past+m+s PRE VER:inf+pres PRO-INDEF-M-S PRE VER:inf+pres ADJ:pos+m+s NPR SENT");
}

public function testPosTagging1630059375_8451() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mrs. Otterton...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ABL NPR SENT");
}

public function testPosTagging1630059378_4420() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I will find him.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630059380_8730() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT");
}

public function testPosTagging1630059383_810() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bless you. Bless you, little bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S SENT VER:inf+pres PRO-PERS-2-M-S PON:sep ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630059385_7261() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Take this.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-DEMO-M-S SENT");
}

public function testPosTagging1630059391_5045() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "to me and my babies, please.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRO-PERS-1-M-S CON ADJ:pos+m+s NOUN-m:p PON:sep INT:other SENT");
}

public function testPosTagging1630059400_1652() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Of course. Thank you both so much.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT INT:jubi PRO-INDEF-M-P ADV ADV:qty SENT");
}

public function testPosTagging1630059449_8255() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "One second.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:s SENT");
}

public function testPosTagging1630059451_7067() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're fired.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:ind+pres+2+s VER:part+past+m+s SENT");
}

public function testPosTagging1630059452_4499() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What? Why?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:qst SENT:qst ADV SENT:qst");
}

public function testPosTagging1630059454_909() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Insubordination!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam");
}

public function testPosTagging1630059457_579() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Now. I'm going to open this door...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim SENT PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres PRE VER:inf+pres PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630059464_1008() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and you're going to tell that otter you're a former meter maid...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres PRE VER:inf+pres PRO-DEMO-M-S NOUN-m:s PRO-PERS-2-M-S VER:ind+pres+2+s PRE NOUN-m:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630059486_4378() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "with delusions of grandeur...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:p PRE NOUN-m:s SENT");
}

public function testPosTagging1630059489_1637() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "who will not be taking the case!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S VER:inf+pres ADV:neg AUX:inf+pres VER:ger+pres ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630059493_9868() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I just heard Officer Hopps is taking the case.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV PPAST:part+past+m+s NOUN-m:s NPR VER:ind+pres+3+s VER:ger+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630059495_3543() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Assistant Mayor Bellwether.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s NPR SENT");
}

public function testPosTagging1630059500_6186() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The Mammal Inclusion Initiative is really starting to pay off.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADJ:pos+m+s NOUN-m:s NOUN-m:s VER:ind+pres+3+s ADV VER:ger+pres PRE VER:inf+pres ADV SENT");
}

public function testPosTagging1630059505_6378() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mayor Lionheart is just gonna be so jazzed!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s VER:ind+pres+3+s ADV AUX:ger+pres AUX:inf+pres ADV VER:part+past+m+s SENT:exclam");
}

public function testPosTagging1630059508_5099() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, let's not tell the Mayor just yet.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep VER:inf+pres PRO-PERS-1-M-P ADV:neg VER:inf+pres ART-M:s NOUN-m:s ADV ADV SENT");
}

public function testPosTagging1630059515_4502() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I've sent it and it is done, so I did do that.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s PRO-PERS-3-M-S CON PRO-PERS-3-M-S VER:ind+pres+3+s PPAST:part+past+m+s PON:sep ADV PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRO-DEMO-M-S SENT");
}

public function testPosTagging1630059535_2293() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, I'd say the case is in good hands.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres ART-M:s NOUN-m:s VER:ind+pres+3+s PRE ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630059540_987() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Us little guys really need to stick together, right?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P ADJ:pos+m+s NOUN-m:p ADV VER:inf+pres PRE VER:inf+pres ADV PON:sep ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630059542_9753() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Like glue.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV NOUN-m:s SENT");
}

public function testPosTagging1630059543_9656() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Good one.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NUM SENT");
}

public function testPosTagging1630059546_6163() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Just call me if you ever need anything, okay?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:inf+pres PRO-PERS-1-M-S CON:cond PRO-PERS-2-M-S ADV VER:inf+pres NOUN-m:s PON:sep INT:conf SENT:qst");
}

public function testPosTagging1630059550_1541() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You've always got a friend at City Hall, Judy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres ADV VER:part+past+m+s PRE NOUN-m:s PRE NOUN-m:s NOUN-m:s PON:sep NPR SENT");
}

public function testPosTagging1630059551_6593() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All right, bye-bye.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep INT:leav PON:sep INT:leav SENT");
}

public function testPosTagging1630066709_4593() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ma'am, as I've told you, we're doing everything we can.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep ADV PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s PRO-PERS-2-M-S PON:sep PRO-PERS-1-M-P AUX:ind+pres+2+s VER:ger+pres PRO-INDEF-M-S PRO-PERS-1-M-P VER:inf+pres SENT");
}

public function testPosTagging1630066712_5763() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ma'am, our detectives are very busy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:p VER:ind+pres+2+s ADV:qty ADJ:pos+m+s SENT");
}

public function testPosTagging1630066718_7917() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you, ma'am.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630066721_2601() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I will give you 48 hours.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-2-M-S NUM NOUN-m:p SENT");
}

public function testPosTagging1630066723_8920() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:exclam");
}

public function testPosTagging1630066729_5819() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's two days to find Emmitt Otterton.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NUM NOUN-m:p PRE VER:inf+pres NPR NPR SENT");
}

public function testPosTagging1630066731_5340() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630066738_8152() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But, you strike out, you resign.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PON:sep PRO-PERS-2-M-S VER:inf+pres ADV PON:sep PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630066741_7516() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630066760_4848() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Deal!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam");
}

public function testPosTagging1630066767_5146() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Here you go.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:plc PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630066769_9375() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "One missing otter.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM VER:ger+pres NOUN-m:s SENT");
}

public function testPosTagging1630066774_1584() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's it?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630066827_8118() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yikes! That is the smallest case file I've ever seen.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT:exclam PRO-DEMO-M-S VER:ind+pres+3+s ART-M:s ADJ:pos+m+s NOUN-m:s NOUN-m:s PRO-PERS-1-M-S AUX:inf+pres ADV VER:part+past+m+s SENT");
}

public function testPosTagging1630066851_183() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And you're not in the computer system yet, so resources, none!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-2-M-S VER:ind+pres+2+s ADV:neg PRE ART-M:s NOUN-m:s NOUN-m:s ADV PON:sep ADV NOUN-m:p PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630066874_6211() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay. Last known sighting.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630066876_7743() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Can I just borrow... Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S ADV VER:inf+pres SENT INT:jubi SENT");
}

public function testPosTagging1630066881_5312() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Popsicle?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:qst");
}

public function testPosTagging1630066883_153() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The murder weapon.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630066888_9795() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Get your popsicle.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630066893_4644() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah. Because that... What does that mean?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT CON PRO-DEMO-M-S SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S VER:inf+pres SENT:qst");
}

public function testPosTagging1630066895_9434() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It means...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
}

public function testPosTagging1630066912_1630() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I have a lead.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630066916_258() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hi! Hello? It's me, again!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:exclam INT:enter SENT:qst PRO-PERS-3-M-S VER:ind+pres+3+s PRO-PERS-1-M-S PON:sep ADV SENT:exclam");
}

public function testPosTagging1630066926_776() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No. Actually, it's Officer Hopps...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT ADV PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s NPR SENT");
}

public function testPosTagging1630066932_6520() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and I'm here to ask you some questions about a case.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres ADV:plc PRE VER:inf+pres PRO-PERS-2-M-S DET NOUN-m:p ADV PRE NOUN-m:s SENT");
}

public function testPosTagging1630066969_9059() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It wasn't me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+past+1+s ADV:neg PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630066993_2565() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey, Carrots, you're going to wake the baby. I gotta get to work.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep NOUN-m:p PON:sep PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres PRE VER:inf+pres ART-M:s NOUN-m:s SENT PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRE VER:inf+pres SENT");
}

public function testPosTagging1630066995_4512() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is important, sir.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630067021_746() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I make 200 bucks a day, Fluff!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres NUM NOUN-m:p PRE NOUN-m:s PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630067023_8090() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "365 days a year, since I was 12.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:p PRE NOUN-m:s PON:sep ADV PRO-PERS-1-M-S VER:ind+past+1+s NUM SENT");
}

public function testPosTagging1630067040_9302() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Please, just look at the picture.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other PON:sep ADV VER:inf+pres PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630067047_4740() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You sold Mr. Otterton that popsicle, right? Do you know him?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s ABL NPR PRO-DEMO-M-S NOUN-m:s PON:sep ADJ:pos+m+s SENT:qst VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630067048_7676() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I know everybody.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-INDEF-M-S SENT");
}

public function testPosTagging1630067051_9660() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I also know that, somewhere...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S ADV:qty VER:inf+pres PRO-DEMO-M-S PON:sep ADV SENT");
}

public function testPosTagging1630067055_8017() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "there's a toy store missing its stuffed animal,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s PRE NOUN-m:s NOUN-m:s VER:ger+pres ADJ:pos+m+s PPAST:part+past+m+s NOUN-m:s PON:sep SENT");
}

public function testPosTagging1630067060_7602() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "so why don't you get back to your box?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV VER:inf+pres ADV:neg PRO-PERS-2-M-S VER:inf+pres ADJ:pos+m+s PRE ADJ:pos+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630067064_1254() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Fine. Then we'll have to do this the hard way.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT ADV PRO-PERS-1-M-P VER:inf+pres VER:inf+pres PRE VER:inf+pres PRO-DEMO-M-S ART-M:s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630067067_8984() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Did you just boot my stroller?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRO-PERS-2-M-S ADV VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630067144_7026() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "For what? Hurting your feelings?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s SENT:qst VER:ger+pres ADJ:pos+m+s NOUN-m:p SENT:qst");
}

public function testPosTagging1630067148_4925() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Felony Tax Evasion.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630067250_8495() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "you reported, let me see here... zero!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s PON:sep VER:inf+pres PRO-PERS-1-M-S VER:inf+pres ADV:plc SENT NUM SENT:exclam");
}

public function testPosTagging1630067281_8292() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, it's my word against yours.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s ADV:mod ADJ:pos+m+p SENT");
}

public function testPosTagging1630067292_2249() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "200 bucks a day, Fluff!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:p PRE NOUN-m:s PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630067296_890() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "365 days a year, since I was 12.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:p PRE NOUN-m:s PON:sep ADV PRO-PERS-1-M-S VER:ind+past+1+s NUM SENT");
}

public function testPosTagging1630067302_5693() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Actually, it's your word against yours.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s ADV:mod ADJ:pos+m+p SENT");
}

public function testPosTagging1630067311_2956() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And if you want this pen, you're going to help me find this poor, missing otter...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON CON:cond PRO-PERS-2-M-S VER:inf+pres PRO-DEMO-M-S NOUN-m:s PON:sep PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres PRE VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRO-DEMO-M-S ADJ:pos+m+s PON:sep VER:ger+pres NOUN-m:s SENT");
}

public function testPosTagging1630067327_1603() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's called a hustle, sweetheart.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PPAST:part+past+m+s PRE NOUN-m:s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630067329_2798() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "She hustled you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S PPAST:part+past+m+s PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630067332_1979() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "She hustled you good!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S PPAST:part+past+m+s PRO-PERS-2-M-S ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630067337_9643() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You a cop now, Nick. You gonna need one of these.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PRE NOUN-m:s ADV:tim PON:sep NPR SENT PRO-PERS-2-M-S AUX:ger+pres VER:inf+pres NUM PRE PRO-DEMO-M-P SENT");
}

public function testPosTagging1630067339_8561() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Have fun...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres NOUN-m:s SENT");
}

public function testPosTagging1630067341_7998() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "working with the fuzz!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres PRE ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630067351_1321() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't know where he is. I only saw where he went.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres ADV PRO-PERS-3-M-S VER:ind+pres+3+s SENT PRO-PERS-1-M-S ADV VER:inf+pres ADV PRO-PERS-3-M-S PPAST:part+past+m+s SENT");
}

public function testPosTagging1630067353_8411() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Great. Let's go.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT VER:inf+pres PRO-PERS-1-M-P VER:inf+pres SENT");
}

public function testPosTagging1630067356_948() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's not exactly a place for...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV:neg ADV PRE NOUN-m:s PRE SENT");
}

public function testPosTagging1630067357_7324() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "a cute little bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630067360_9271() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Don't call me cute. Get in the car.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres PRO-PERS-1-M-S ADJ:pos+m+s SENT VER:inf+pres PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630067362_7527() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay. You're the boss.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT PRO-PERS-2-M-S VER:ind+pres+2+s ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630067364_884() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hi.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT");
}

public function testPosTagging1630067365_8480() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hello?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:qst");
}

public function testPosTagging1630067367_1930() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hello?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:qst");
}

public function testPosTagging1630067368_6214() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hello? Hello?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:qst INT:enter SENT:qst");
}

public function testPosTagging1630067371_8890() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hello. My name is...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s SENT");
}

public function testPosTagging1630067510_3284() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You know, I'm going to hit the pause button right there...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres PRE VER:inf+pres ART-M:s NOUN-m:s NOUN-m:s ADJ:pos+m+s ADV SENT");
}

public function testPosTagging1630067574_5885() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
}

public function testPosTagging1630067576_6127() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm Officer Hopps, ZPD.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres NOUN-m:s NPR PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630067580_1146() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm looking for a missing mammal, Emmitt Otterton, right here...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres PRE PRE VER:ger+pres ADJ:pos+m+s PON:sep NPR NPR PON:sep ADV:plc SENT");
}

public function testPosTagging1630067582_694() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "who may have frequented this establishment.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S VER:cond+pres+3+s AUX:inf+pres VER:part+past+m+s PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630067584_5609() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, old Emmitt.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep ADJ:pos+m+s NPR SENT");
}

public function testPosTagging1630067588_1433() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Haven't seen him in a couple of weeks.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:part+past+m+s PRO-PERS-3-M-S PRE PRE NOUN-m:s PRE NOUN-m:p SENT");
}

public function testPosTagging1630067592_4218() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But, hey, you should talk to his yoga instructor.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PON:sep INT:enter PON:sep PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630067597_6306() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'd be happy to take you back.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres ADJ:pos+m+s PRE VER:inf+pres PRO-PERS-2-M-S ADJ:pos+m+s SENT");
}

public function testPosTagging1630067599_8849() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you so much.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT");
}

public function testPosTagging1630067605_162() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'd appreciate that more than you can imagine, it would be such...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRO-DEMO-M-S ADV CON PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres PON:sep PRO-PERS-3-M-S PPAST:part+past+m+s VER:inf+pres DET SENT");
}

public function testPosTagging1630067606_1505() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You are naked!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630067608_3398() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "For sure, we're a naturalist club.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s PON:sep PRO-PERS-1-M-P VER:ind+pres+2+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630067611_9965() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah. In Zootopia, anyone can be anything.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT PRE NPR PON:sep PRO-WH-M-S AUX:inf+pres VER:inf+pres NOUN-m:s SENT");
}

public function testPosTagging1630067614_5077() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "These guys, they be naked.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-P NOUN-m:p PON:sep PRO-PERS-3-M-P VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630067645_3462() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, boy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630067648_5909() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Does this make you uncomfortable?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRO-DEMO-M-S VER:inf+pres PRO-PERS-2-M-S ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630067675_1586() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Because if so, there is no shame in calling it quits.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON CON:cond ADV PON:sep ADV VER:ind+pres+3+s ADV:neg VER:inf+pres PRE NOUN-m:s PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
}

public function testPosTagging1630067686_8993() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes, there is.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep ADV VER:ind+pres+3+s SENT");
}

public function testPosTagging1630067688_1821() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Boy, that's the spirit.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-DEMO-M-S VER:ind+pres+3+s ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630067694_623() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, some mammals say the naturalist life is weird...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep DET NOUN-m:p VER:inf+pres ART-M:s ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630067698_2123() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "but you know what I say is weird?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-2-M-S VER:inf+pres NOUN-m:s PRO-PERS-1-M-S VER:inf+pres VER:ind+pres+3+s ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630067700_4441() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Clothes on animals!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRE NOUN-m:p SENT:exclam");
}

public function testPosTagging1630067702_865() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Here we go.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:plc PRO-PERS-1-M-P VER:inf+pres SENT");
}

public function testPosTagging1630067716_379() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey, Nangi.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep NPR SENT");
}

public function testPosTagging1630067719_9589() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "These dudes have some questions about Emmitt the otter.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-P NOUN-m:p VER:inf+pres DET NOUN-m:p ADV NPR ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630067721_7879() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Who?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S SENT:qst");
}

public function testPosTagging1630067730_8012() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Emmitt Otterton? Been coming to your yoga class for like...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR NPR SENT:qst PPAST:part+past+m+s VER:ger+pres PRE ADJ:pos+m+s NOUN-m:s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630067733_8879() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "6 years?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:p SENT:qst");
}

public function testPosTagging1630067736_3726() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I have no memory of this beaver.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg NOUN-m:s PRE PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630067738_6386() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He's an otter, actually.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s NUM NOUN-m:s PON:sep ADV SENT");
}

public function testPosTagging1630067744_9666() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He was here a couple Wednesdays ago, remember?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+past+1+s ADV:plc PRE NOUN-m:s NOUN-m:p ADV:tim PON:sep VER:inf+pres SENT:qst");
}

public function testPosTagging1630067745_1216() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
}

public function testPosTagging1630067798_1958() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, he was wearing a green cable-knit sweater vest...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-3-M-S AUX:ind+past+1+s VER:ger+pres PRE ADJ:pos+m+s NOUN-m:s PON:sep NOUN-m:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630067835_8227() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Real tight. Remember that, Nangi?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADJ:pos+m+s SENT VER:inf+pres PRO-DEMO-M-S PON:sep NPR SENT:qst");
}

public function testPosTagging1630067837_9205() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
}

public function testPosTagging1630067853_7110() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Needed a tune-up. The third cylinder wasn't firing.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRE NOUN-M:s PON:sep NOUN-M:s SENT ART-M:s ADJ:pos+m+s NOUN-m:s AUX:ind+past+1+s ADV:neg VER:ger+pres SENT");
}

public function testPosTagging1630067856_6199() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Remember that, Nangi? No.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-DEMO-M-S PON:sep NPR SENT:qst ADV:neg SENT");
}

public function testPosTagging1630067869_4128() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You didn't happen to catch the license plate number, did you?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres PRE VER:inf+pres ART-M:s NOUN-m:s NOUN-m:s NOUN-m:s PON:sep PPAST:part+past+m+s PRO-PERS-2-M-S SENT:qst");
}

public function testPosTagging1630067874_9737() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, for sure. It was 2-9...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRE ADJ:pos+m+s SENT PRO-PERS-3-M-S VER:ind+past+1+s NUM SENT");
}

public function testPosTagging1630067875_4151() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "T-H-D...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CODE PON:sep CODE PON:sep ABL SENT");
}

public function testPosTagging1630067877_9918() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "0-3. 0-3. Wow.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM SENT NUM SENT INT:surp SENT");
}

public function testPosTagging1630067879_3455() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is a lot of great info. Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV:qty ADJ:pos+m+s NOUN-m:s SENT INT:jubi SENT");
}

public function testPosTagging1630067887_8457() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Told you Nangi has a mind like a steel trap.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRO-PERS-2-M-S NPR VER:ind+pres+3+s PRE NOUN-m:s ADV PRE NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630067890_3503() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I wish I had a memory like an elephant.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S PPAST:part+past+m+s PRE NOUN-m:s ADV NUM NOUN-m:s SENT");
}

public function testPosTagging1630067893_3666() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, I had a ball.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-1-M-S PPAST:part+past+m+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630067909_6393() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and seeing as how any moron can run a plate,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON VER:ger+pres ADV ADV DET NOUN-m:s AUX:inf+pres VER:inf+pres PRE NOUN-m:s PON:sep SENT");
}

public function testPosTagging1630067919_491() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The plate. I can't run a plate.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s SENT PRO-PERS-1-M-S ADV:neg VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630067922_7820() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm not in the system yet.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg PRE ART-M:s NOUN-m:s ADV SENT");
}

public function testPosTagging1630067924_6239() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Give me the pen, please.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S ART-M:s NOUN-m:s PON:sep INT:other SENT");
}

public function testPosTagging1630067926_9442() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What was it you said?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+past+1+s PRO-PERS-3-M-S PRO-PERS-2-M-S PPAST:part+past+m+s SENT:qst");
}

public function testPosTagging1630067929_3075() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "\"Any moron can run a plate\"?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:quote DET NOUN-m:s AUX:inf+pres VER:inf+pres PRE NOUN-m:s PON:quote SENT:qst");
}

public function testPosTagging1630067938_1647() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Gosh. If only there were a moron around who were up to the task.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT CON:cond ADV ADV VER:ind+past+3+p PRE NOUN-m:s ADV PRO-WH-M-S VER:ind+past+3+p ADV PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630067966_8622() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Rabbit, I did what you asked! You can't keep me on the hook forever.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s NOUN-m:s PRO-PERS-2-M-S PPAST:part+past+m+s SENT:exclam PRO-PERS-2-M-S ADV:neg VER:inf+pres PRO-PERS-1-M-S PRE ART-M:s NOUN-m:s ADV SENT");
}

public function testPosTagging1630067977_8850() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Not forever. Well, I only have 36 hours left to solve this case.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg ADV INT:other PRO-PERS-1-M-S ADV VER:inf+pres NUM NOUN-m:p PPAST:part+past+m+s PRE VER:inf+pres PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630067981_9550() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So can you run the plate or not?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:inf+pres PRO-PERS-2-M-S VER:inf+pres ART-M:s NOUN-m:s CON:or ADV:neg SENT:qst");
}

public function testPosTagging1630067983_4669() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Actually, I just remembered...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-1-M-S ADV PPAST:part+past+m+s SENT");
}

public function testPosTagging1630068054_4828() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I have a pal at the DMV";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE NOUN-m:s PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630068064_8701() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "If you need something done, he's on it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRO-PERS-2-M-S VER:inf+pres NOUN-m:s PPAST:part+past+m+s PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s PRE PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630068112_222() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You said this was going to be quick!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s PRO-DEMO-M-S AUX:ind+past+1+s VER:ger+pres PRE VER:inf+pres ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630068117_6711() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are you saying that because he's a sloth, he can't be fast?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres PRO-DEMO-M-S CON PRO-PERS-3-M-S VER:ind+pres+3+s PRE NOUN-m:s PON:sep PRO-PERS-3-M-S ADV:neg VER:inf+pres ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630068121_1136() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I thought in Zootopia, anyone could be anything.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRE NPR PON:sep PRO-WH-M-S PPAST:part+past+m+s VER:inf+pres NOUN-m:s SENT");
}

public function testPosTagging1630068129_2727() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nice to...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PRE SENT");
}

public function testPosTagging1630068130_19() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "see you...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630068131_1145() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "too.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT");
}

public function testPosTagging1630068154_5618() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Darling, I've forgotten your name.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068157_8393() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Judy Hopps, ZPD, how are you?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR NPR PON:sep NOUN-m:s PON:sep ADV VER:ind+pres+2+s PRO-PERS-2-M-S SENT:qst");
}

public function testPosTagging1630068159_5560() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I am...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres SENT");
}

public function testPosTagging1630068161_7992() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "doing...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres SENT");
}

public function testPosTagging1630068162_512() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "just...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT");
}

public function testPosTagging1630068163_9343() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Fine?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630068166_302() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "as well as...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s ADV SENT");
}

public function testPosTagging1630068167_220() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I can...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres SENT");
}

public function testPosTagging1630068169_8207() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "be.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres SENT");
}

public function testPosTagging1630068178_4748() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "can I...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630068183_5831() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "do... I was hoping you could run a...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres SENT PRO-PERS-1-M-S AUX:ind+past+1+s VER:ger+pres PRO-PERS-2-M-S PPAST:part+past+m+s VER:inf+pres PRE SENT");
}

public function testPosTagging1630068184_4325() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "for you...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630068186_4426() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, I was hoping you could...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-1-M-S AUX:ind+past+1+s VER:ger+pres PRO-PERS-2-M-S PPAST:part+past+m+s SENT");
}

public function testPosTagging1630068187_6116() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "today?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim SENT:qst");
}

public function testPosTagging1630068190_5172() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, I was hoping you could run a plate for us.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-1-M-S AUX:ind+past+1+s VER:ger+pres PRO-PERS-2-M-S PPAST:part+past+m+s VER:inf+pres PRE NOUN-m:s PRE PRO-PERS-1-M-P SENT");
}

public function testPosTagging1630068193_5271() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We are in a really big hurry.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:ind+pres+2+s PRE PRE ADV ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068195_482() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sure.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT");
}

public function testPosTagging1630068197_5862() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's the...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ART-M:s SENT");
}

public function testPosTagging1630068199_3643() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "plate... 2-9-T...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT CODE SENT");
}

public function testPosTagging1630068201_4979() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "number?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:qst");
}

public function testPosTagging1630068202_2990() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "2-9-T-H-D-0-3";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CODE SENT");
}

public function testPosTagging1630068204_5829() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Two...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM SENT");
}

public function testPosTagging1630068205_3889() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "nine...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM SENT");
}

public function testPosTagging1630068207_2435() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "T-H-D-0-3.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CODE SENT");
}

public function testPosTagging1630068208_7399() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "T...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CODE SENT");
}

public function testPosTagging1630068209_6237() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "H-D-0-3.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CODE SENT");
}

public function testPosTagging1630068210_4502() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "H...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CODE SENT");
}

public function testPosTagging1630068212_4126() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "D-0-3.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CODE SENT");
}

public function testPosTagging1630068216_4088() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "0-3.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM SENT");
}

public function testPosTagging1630068217_4101() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "0...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM SENT");
}

public function testPosTagging1630068218_2010() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "3.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM SENT");
}

public function testPosTagging1630068221_4396() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT:exclam");
}

public function testPosTagging1630068230_3256() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay. What do you call a three-humped camel?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT NOUN-m:s VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRE NUM PON:sep PPAST:part+past+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630068233_9543() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg SENT");
}

public function testPosTagging1630068234_4238() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "know.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres SENT");
}

public function testPosTagging1630068235_3494() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
}

public function testPosTagging1630068236_8926() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "do...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres SENT");
}

public function testPosTagging1630068237_8748() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "you call...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630068241_7608() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "a... Three-humped camel.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE SENT NUM PON:sep PPAST:part+past+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068242_2970() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "three-humped...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM PON:sep PPAST:part+past+m+s SENT");
}

public function testPosTagging1630068243_2311() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "camel?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:qst");
}

public function testPosTagging1630068244_5556() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Pregnant.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT");
}

public function testPosTagging1630068247_1844() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes, very funny, very funny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep ADV:qty ADJ:pos+m+s PON:sep ADV:qty ADJ:pos+m+s SENT");
}

public function testPosTagging1630068251_6004() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Can we please just focus on the...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-P INT:other ADV VER:inf+pres PRE ART-M:s SENT");
}

public function testPosTagging1630068255_9996() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Priscilla!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam");
}

public function testPosTagging1630068256_1652() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, no!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV:neg SENT:exclam");
}

public function testPosTagging1630068257_9701() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630068266_4539() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
}

public function testPosTagging1630068267_2756() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "do...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres SENT");
}

public function testPosTagging1630068272_1081() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No! ...you call a...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT:exclam SENT PRO-PERS-2-M-S VER:inf+pres PRE SENT");
}

public function testPosTagging1630068284_2394() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A three-humped camel? \"Pregnant!\" Okay, great, we got it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NUM PON:sep PPAST:part+past+m+s NOUN-m:s SENT:qst PON:quote ADJ:pos+m+s SENT:exclam PON:quote INT:conf PON:sep ADJ:pos+m+s PON:sep PRO-PERS-1-M-P PPAST:part+past+m+s PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630068286_1585() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "three... humped...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM SENT PPAST:part+past+m+s SENT");
}

public function testPosTagging1630068293_5515() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "...you... Thank you. \"2-9-T-H-D-0-3.\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT SENT PRO-PERS-2-M-S SENT INT:jubi SENT CODE SENT");
}

public function testPosTagging1630068295_47() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "go.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres SENT");
}

public function testPosTagging1630068300_822() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's registered to Tundratown Limo Service.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ PRE NPR NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630068304_1570() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A limo took Otterton, and the limo's in Tundratown!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s PPAST:part+past+m+s NPR PON:sep CON ART-M:s NOUN-m:s VER:ind+pres+3+s PRE NPR SENT:exclam");
}

public function testPosTagging1630068312_4149() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Way to hustle, bud. I love you. I owe you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRE VER:inf+pres PON:sep NOUN-m:s SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630068319_506() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's night?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630068320_7657() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Closed. Great.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s SENT ADJ:pos+m+s SENT");
}

public function testPosTagging1630068339_2848() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I will bet you you don't have a warrant to get in.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-2-M-S PRO-PERS-2-M-S AUX:inf+pres ADV:neg VER:inf+pres PRE NOUN-m:s PRE VER:inf+pres PRE SENT");
}

public function testPosTagging1630068349_238() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Darn it. It's a bummer.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-S SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630068352_9107() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You wasted the day on purpose.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s ART-M:s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630068356_3189() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Madam, I have a fake badge.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-1-M-S VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068358_9483() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I would never impede your pretend investigation.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV:tim VER:inf+pres ADJ:pos+m+s VER:inf+pres NOUN-m:s SENT");
}

public function testPosTagging1630068382_8292() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's not a pretend investigation. Look, see? See him? This otter is missing.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV:neg PRE VER:inf+pres NOUN-m:s SENT VER:inf+pres PON:sep VER:inf+pres SENT:qst VER:inf+pres PRO-PERS-3-M-S SENT:qst PRO-DEMO-M-S NOUN-m:s VER:ind+pres+3+s VER:ger+pres SENT");
}

public function testPosTagging1630068387_9796() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Then they should've gotten a real cop to find him.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-3-M-P AUX:inf+pres AUX:inf+pres VER:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s PRE VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630068389_1758() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What is your problem?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630068394_7620() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Does seeing me fail somehow make you feel better";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:ind+pres+3+s VER:ger+pres PRO-PERS-1-M-S VER:inf+pres ADV VER:inf+pres PRO-PERS-2-M-S VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630068401_6221() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "about your own sad, miserable life?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s ADJ:pos+m+s ADJ:pos+m+s PON:sep ADJ:pos+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630068411_181() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Now, since you're sans warrant...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim PON:sep ADV PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068415_8956() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I guess we're... done?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-P VER:ind+pres+2+s SENT PPAST:part+past+m+s SENT:qst");
}

public function testPosTagging1630068422_4334() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Fine. We are done. Here's your pen.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT PRO-PERS-1-M-P AUX:ind+pres+2+s VER:part+past+m+s SENT ADV:plc VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068424_9765() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:exclam");
}

public function testPosTagging1630068428_2660() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "First off, you throw like a bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADV PON:sep PRO-PERS-2-M-S VER:inf+pres ADV PRE NOUN-m:s SENT");
}

public function testPosTagging1630068433_7365() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Second, you're a very sore loser. See you later, Officer Fluff.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep PRO-PERS-2-M-S VER:ind+pres+2+s PRE ADV:qty ADJ:pos+m+s ADJ:pos+m+s SENT VER:inf+pres PRO-PERS-2-M-S ADV PON:sep NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630068437_7546() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So sad this is over. I wish I could've helped more.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s PRO-DEMO-M-S VER:ind+pres+3+s ADV SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S PPAST:part+past+m+s AUX:inf+pres VER:part+past+m+s ADV SENT");
}

public function testPosTagging1630068443_7542() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The thing is, you don't need a warrant if you have probable cause...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s VER:ind+pres+3+s PON:sep PRO-PERS-2-M-S AUX:inf+pres ADV:neg VER:inf+pres PRE NOUN-m:s CON:cond PRO-PERS-2-M-S VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068454_393() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So you're helping plenty. Come on.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres ADV:qty SENT INT:conf SENT");
}

public function testPosTagging1630068455_4630() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "2-9-T-H-D-0-3. This is it!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CODE PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT:exclam");
}

public function testPosTagging1630068459_2312() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Polar bear fur.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630068524_5476() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But on CD.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRE ABL SENT");
}

public function testPosTagging1630068529_2738() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Who still uses CDs?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S ADV:tim VER:ind+pres+3+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630068533_5238() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Carrots, if your otter was here, he had a very bad day.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p PON:sep CON:cond ADJ:pos+m+s NOUN-m:s VER:ind+past+1+s ADV:plc PON:sep PRO-PERS-3-M-S PPAST:part+past+m+s PRE ADV:qty ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068542_8730() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You ever seen anything like this?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S ADV PPAST:part+past+m+s NOUN-m:s ADV PRO-DEMO-M-S SENT:qst");
}

public function testPosTagging1630068545_3609() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
}

public function testPosTagging1630068546_7280() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wait, look.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep VER:inf+pres SENT");
}

public function testPosTagging1630068549_2756() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is him, Emmitt Otterton.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-3-M-S PON:sep NPR NPR SENT");
}

public function testPosTagging1630068551_9180() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He was definitely here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+past+1+s ADV ADV:plc SENT");
}

public function testPosTagging1630068558_3879() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What do you think happened?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PPAST:part+past+m+s SENT:qst");
}

public function testPosTagging1630068561_3786() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Now, wait a minute.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim PON:sep INT:other SENT");
}

public function testPosTagging1630068567_3062() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Polar bear fur, Rat Pack music, fancy cup?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s NOUN-m:s PON:sep NOUN-m:s NOUN-m:s NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630068575_1264() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I know whose car this is. We got to go.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-WH-M-S NOUN-m:s PRO-DEMO-M-S VER:ind+pres+3+s SENT PRO-PERS-1-M-P PPAST:part+past+m+s PRE VER:inf+pres SENT");
}

public function testPosTagging1630068578_3906() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Why? Whose car is it?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT:qst PRO-WH-M-S NOUN-m:s VER:ind+pres+3+s PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630068591_7975() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The most feared crime-boss in Tundratown. They call him Mr. Big.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADV:qty PPAST:part+past+m+s NOUN-m:s PON:sep NOUN-m:s PRE NPR SENT PRO-PERS-3-M-P VER:inf+pres PRO-PERS-3-M-S ABL ADJ:pos+m+s SENT");
}

public function testPosTagging1630068595_8767() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And he does not like me. So we gotta go!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S AUX:ind+pres+3+s ADV:neg VER:inf+pres PRO-PERS-1-M-S SENT ADV PRO-PERS-1-M-P AUX:inf+pres VER:inf+pres SENT:exclam");
}

public function testPosTagging1630068597_1212() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm not leaving. This is a crime scene.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:ger+pres SENT PRO-DEMO-M-S VER:ind+pres+3+s PRE NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630068609_7287() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "so we're leaving right now.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-1-M-P AUX:ind+pres+2+s VER:ger+pres ADV:tim SENT");
}

public function testPosTagging1630068613_321() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Raymond!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam");
}

public function testPosTagging1630068620_6878() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And is that Kevin? Long time, no see.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON VER:ind+pres+3+s PRO-DEMO-M-S NPR SENT:qst ADJ:pos+m+s NOUN-m:s PON:sep ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630068635_6238() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's a no.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s PRE ADV:neg SENT");
}

public function testPosTagging1630068641_3445() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What did you do that made Mr. Big so mad at you?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s PRO-PERS-2-M-S VER:inf+pres PRO-DEMO-M-S PPAST:part+past+m+s ABL ADJ:pos+m+s ADV ADJ:pos+m+s PRE PRO-PERS-2-M-S SENT:qst");
}

public function testPosTagging1630068645_6294() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I may have sold him a very expensive wool rug...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:cond+pres+3+s AUX:inf+pres VER:part+past+m+s PRO-PERS-3-M-S PRE ADV:qty ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630068650_1428() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "that was made from the fur of a skunk...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S AUX:ind+past+1+s VER:part+past+m+s PRE ART-M:s NOUN-m:s PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1630068654_9081() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sweet cheese and crackers.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s CON NOUN-m:p SENT");
}

public function testPosTagging1630068657_8566() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Is that Mr. Big?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRO-DEMO-M-S ABL ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630068658_4456() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
}

public function testPosTagging1630068661_9887() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What about him?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADV PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630068664_722() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Is that him? No!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRO-DEMO-M-S PRO-PERS-3-M-S SENT:qst ADV:neg SENT:exclam");
}

public function testPosTagging1630068665_3855() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's got to be him.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s PPAST:part+past+m+s PRE VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630068724_4818() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Stop talking, stop talking, stop talking!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres VER:ger+pres PON:sep VER:inf+pres VER:ger+pres PON:sep VER:inf+pres VER:ger+pres SENT:exclam");
}

public function testPosTagging1630068730_4384() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mr. Big, sir. This is a simple...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ABL ADJ:pos+m+s PON:sep NOUN-m:s SENT PRO-DEMO-M-S VER:ind+pres+3+s PRE ADJ:pos+m+s SENT");
}

public function testPosTagging1630068731_8080() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630068735_3293() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is a simple misunderstanding.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068764_4948() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You come here, unannounced, on the day my daughter is to be married.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres ADV:plc PON:sep ADJ:pos+m+s PON:sep PRE ART-M:s NOUN-m:s ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s PRE AUX:inf+pres VER:part+past+m+s SENT");
}

public function testPosTagging1630068770_7379() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, actually, we were brought here against our will, so...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other ADV PON:sep PRO-PERS-1-M-P AUX:ind+past+3+p VER:part+past+m+s ADV:plc ADV:mod ADJ:pos+m+s NOUN-m:s PON:sep ADV SENT");
}

public function testPosTagging1630068775_1205() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The point is, I did not know that it was your car...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s VER:ind+pres+3+s PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres PRO-DEMO-M-S PRO-PERS-3-M-S VER:ind+past+1+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068781_569() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I trusted you, Nicky.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S PON:sep NPR SENT");
}

public function testPosTagging1630068784_6007() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I welcomed you into my home.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S ADV ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068788_2960() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We broke bread together.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P PPAST:part+past+m+s NOUN-m:s ADV SENT");
}

public function testPosTagging1630068799_7965() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And how did you repay my generosity?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV PPAST:part+past+m+s PRO-PERS-2-M-S VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630068802_8814() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "With a rug made from the butt of a skunk.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRE NOUN-m:s PPAST:part+past+m+s PRE ART-M:s NOUN-m:s PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1630068805_7956() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A skunk-butt rug.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s PON:sep NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630068807_1418() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You disrespected me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630068849_5356() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You disrespected my Gram-mama, who I buried in that skunk butt rug.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s PON:sep PRO-WH-M-S PRO-PERS-1-M-S PPAST:part+past+m+s PRE PRO-DEMO-M-S NOUN-m:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630068854_4018() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I told you never to show your face here again but here you are...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S ADV:tim PRE VER:inf+pres ADJ:pos+m+s NOUN-m:s ADV:plc ADV CON ADV:plc PRO-PERS-2-M-S VER:ind+pres+2+s SENT");
}

public function testPosTagging1630068856_7270() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "snooping around with this...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres ADV PRE PRO-DEMO-M-S SENT");
}

public function testPosTagging1630068858_422() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What are you? A performer?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S SENT:qst PRE NOUN-m:s SENT:qst");
}

public function testPosTagging1630068860_9414() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's with the costume?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRE ART-M:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630068864_8788() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir. I am a...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT PRO-PERS-1-M-S VER:inf+pres PRE SENT");
}

public function testPosTagging1630068866_2390() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mime! She is a mime.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam PRO-PERS-3-F-S VER:ind+pres+3+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630068870_9710() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This... mime cannot speak. You can't speak if you're a mime.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S SENT NOUN-m:s ADV:neg VER:inf+pres SENT PRO-PERS-2-M-S ADV:neg VER:inf+pres CON:cond PRO-PERS-2-M-S VER:ind+pres+2+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630068872_4640() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, I am a cop.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-1-M-S VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630068880_2092() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And my evidence puts him in your car.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADJ:pos+m+s NOUN-m:s VER:inf+pres NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068885_8904() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So intimidate me all you want.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:inf+pres PRO-PERS-1-M-S DET PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630068919_7683() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Gram-mama made you a cannoli.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s PRO-PERS-2-M-S PRE NOUN-m:p SENT");
}

public function testPosTagging1630068924_4269() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm going to find out what you did to that otter if it's the last thing I do.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres PRE VER:inf+pres ADV NOUN-m:s PRO-PERS-2-M-S PPAST:part+past+m+s PRE PRO-DEMO-M-S NOUN-m:s CON:cond PRO-PERS-3-M-S VER:ind+pres+3+s ART-M:s ADJ:pos+m+s NOUN-m:s PRO-PERS-1-M-S VER:inf+pres SENT");
}

public function testPosTagging1630068927_4800() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Then I have only one request.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-1-M-S VER:inf+pres ADV NUM NOUN-m:s SENT");
}

public function testPosTagging1630068932_185() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Say hello to Gram-mama. Ice 'em.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres INT:enter PRE NOUN-m:s SENT VER:inf+pres PRO-PERS-3-M-P SENT");
}

public function testPosTagging1630068935_770() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I didn't see nothing! I'm not saying nothing!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres ADV SENT:exclam PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:ger+pres ADV SENT:exclam");
}

public function testPosTagging1630068944_8320() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Please! No, no, no!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other SENT:exclam ADV:neg PON:sep ADV:neg PON:sep ADV:neg SENT:exclam");
}

public function testPosTagging1630068949_3705() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "If you're mad at me about the rug, I've got more rugs!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s PRE PRO-PERS-1-M-S ADV ART-M:s NOUN-m:s PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s ADV NOUN-m:p SENT:exclam");
}

public function testPosTagging1630068952_7844() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Daddy! It's time for our dance!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630068958_7607() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What did we say?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s PRO-PERS-1-M-P VER:inf+pres SENT:qst");
}

public function testPosTagging1630068960_9344() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No icing anyone at my wedding!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg VER:ger+pres PRO-WH-M-S PRE ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630068963_2868() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I have to, baby. Daddy has to.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE PON:sep NOUN-m:s SENT NOUN-m:s VER:ind+pres+3+s PRE SENT");
}

public function testPosTagging1630068965_8862() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ice 'em.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-P SENT");
}

public function testPosTagging1630068967_9316() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, no no!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep ADV:neg ADV:neg SENT:exclam");
}

public function testPosTagging1630068971_9126() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "She's the bunny that saved my life yesterday!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S VER:ind+pres+3+s ART-M:s NOUN-m:s PRO-DEMO-M-S PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s ADV SENT:exclam");
}

public function testPosTagging1630068974_876() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "From that giant donut.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRO-DEMO-M-S ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630068976_9701() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This bunny?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S NOUN-m:s SENT:qst");
}

public function testPosTagging1630068979_4865() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah! Hi!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:exclam INT:enter SENT:exclam");
}

public function testPosTagging1630069030_1297() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hi. I love your dress.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630069032_5175() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT");
}

public function testPosTagging1630069033_2870() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Put 'em down.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-P ADV:plc SENT");
}

public function testPosTagging1630069037_9968() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You've done me a great service.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres VER:part+past+m+s PRO-PERS-1-M-S PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630069040_8575() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I will help you find the otter.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-2-M-S VER:inf+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630069064_2559() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Otterton is my florist.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630069069_7398() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He's like a part of the family.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV PRE NOUN-m:s PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630069073_7741() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He had something important he wanted to discuss.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S PPAST:part+past+m+s NOUN-m:s ADJ:pos+m+s PRO-PERS-3-M-S PPAST:part+past+m+s PRE VER:inf+pres SENT");
}

public function testPosTagging1630069131_6977() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's why I sent that car to pick him up.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV PRO-PERS-1-M-S PPAST:part+past+m+s PRO-DEMO-M-S NOUN-m:s PRE VER:inf+pres PRO-PERS-3-M-S ADV SENT");
}

public function testPosTagging1630069133_7220() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But he never arrived.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S ADV:tim PPAST:part+past+m+s SENT");
}

public function testPosTagging1630069135_3909() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Because he was attacked.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S AUX:ind+past+1+s VER:part+past+m+s SENT");
}

public function testPosTagging1630069137_601() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No. He attacked.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT PRO-PERS-3-M-S PPAST:part+past+m+s SENT");
}

public function testPosTagging1630069139_6438() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Otterton?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:qst");
}

public function testPosTagging1630069142_6628() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Otterton. He went crazy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT PRO-PERS-3-M-S PPAST:part+past+m+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630069148_3730() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ripped up the car, scared my driver half to death...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s ADV ART-M:s NOUN-m:s PON:sep PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s ADJ:pos+m+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630069150_4831() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and disappeared into the night.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PPAST:part+past+m+s ADV ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630069153_5531() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But he's a sweet little otter.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S VER:ind+pres+3+s PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630069159_676() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "My child, we may be evolved, but deep down...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s PON:sep PRO-PERS-1-M-P VER:cond+pres+3+s AUX:inf+pres VER:part+past+m+s PON:sep CON ADJ:pos+m+s ADV:plc SENT");
}

public function testPosTagging1630069162_2033() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "we are still animals.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:ind+pres+2+s ADV:tim NOUN-m:p SENT");
}

public function testPosTagging1630069196_6176() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "His name is Manchas...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s NPR SENT");
}

public function testPosTagging1630069201_2354() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Only he can tell you more.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-3-M-S AUX:inf+pres VER:inf+pres PRO-PERS-2-M-S ADV SENT");
}

public function testPosTagging1630069202_171() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mr. Manchas?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ABL NPR SENT:qst");
}

public function testPosTagging1630069204_8745() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Judy Hopps, ZPD.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR NPR PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630069206_3330() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We just wanna know what happened to Emmitt Otterton.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P ADV AUX:inf+pres VER:inf+pres NOUN-m:s PPAST:part+past+m+s PRE NPR NPR SENT");
}

public function testPosTagging1630069207_3040() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630069209_5604() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "should be asking...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres AUX:inf+pres VER:ger+pres SENT");
}

public function testPosTagging1630069211_9910() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "what happened to me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s PRE PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630069213_1073() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A teensy otter did that?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s NOUN-m:s PPAST:part+past+m+s PRO-DEMO-M-S SENT:qst");
}

public function testPosTagging1630069216_3140() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What happened?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s SENT:qst");
}

public function testPosTagging1630069218_3326() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He was an animal.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+past+1+s NUM NOUN-m:s SENT");
}

public function testPosTagging1630069220_439() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Down...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:plc SENT");
}

public function testPosTagging1630069223_5188() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "on all fours.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE DET NUM SENT");
}

public function testPosTagging1630069227_4268() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He was a savage!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+past+1+s PRE NOUN-m:s SENT:exclam");
}

public function testPosTagging1630069240_4836() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Over and over. The Night Howlers.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV CON ADV SENT ART-M:s NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630069244_5605() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So you know about the Night Howlers, too?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-2-M-S VER:inf+pres ADV ART-M:s NOUN-m:s NOUN-m:p PON:sep ADV SENT:qst");
}

public function testPosTagging1630069247_575() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Good. Good, good.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT ADJ:pos+m+s PON:sep ADJ:pos+m+s SENT");
}

public function testPosTagging1630069252_4489() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Because the Night Howlers are exactly what we are here to talk about.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ART-M:s NOUN-m:s NOUN-m:p VER:ind+pres+2+s ADV NOUN-m:s PRO-PERS-1-M-P VER:ind+pres+2+s ADV:plc PRE VER:inf+pres ADV SENT");
}

public function testPosTagging1630069254_590() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Right? Yup.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT:qst INT:jubi SENT");
}

public function testPosTagging1630069264_1644() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and tell us what you know...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON VER:inf+pres PRO-PERS-1-M-P NOUN-m:s PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630069268_3930() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and we will tell you what we know. Okay?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-P VER:inf+pres VER:inf+pres PRO-PERS-2-M-S NOUN-m:s PRO-PERS-1-M-P VER:inf+pres SENT INT:conf SENT:qst");
}

public function testPosTagging1630069269_1322() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630069270_3787() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Clever fox.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630069272_492() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mr. Manchas?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ABL NPR SENT:qst");
}

public function testPosTagging1630069273_2711() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Buddy?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:qst");
}

public function testPosTagging1630069274_4870() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are you...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630069276_5195() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "okay?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:qst");
}

public function testPosTagging1630069278_530() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Run. Run!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres SENT VER:inf+pres SENT:exclam");
}

public function testPosTagging1630069280_3184() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What is wrong with him?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s PRE PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630069282_1185() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't know!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres SENT:exclam");
}

public function testPosTagging1630069299_1054() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:exclam");
}

public function testPosTagging1630069300_1317() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Head down!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADV:plc SENT:exclam");
}

public function testPosTagging1630069303_748() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Hopps to Dispatch.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR PRE VER:inf+pres SENT");
}

public function testPosTagging1630069308_6581() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are you familiar with Gazelle, greatest singer of our lifetime, angel with horns?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-2-M-S ADJ:pos+m+s PRE NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s PON:sep NOUN-m:s PRE NOUN-m:p SENT:qst");
}

public function testPosTagging1630069315_6994() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, hold on. Keep watching. Who's that beside her? Who is it?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep VER:inf+pres PRE SENT VER:inf+pres VER:ger+pres SENT PRO-WH-M-S VER:ind+pres+3+s PRO-DEMO-M-S ADV PRO-PERS-3-F-S SENT:qst PRO-WH-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630069318_5211() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wow, you are one hot dancer, Benjamin Clawhauser.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-PERS-2-M-S VER:ind+pres+2+s NUM ADJ:pos+m+s NOUN-m:s PON:sep NPR NPR SENT");
}

public function testPosTagging1630069323_5440() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's me! Did you think it was real? It looks so real!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRO-PERS-1-M-S SENT:exclam PPAST:part+past+m+s PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-S VER:ind+past+1+s ADJ:pos+m+s SENT:qst PRO-PERS-3-M-S VER:ind+pres+3+s ADV ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630069357_2929() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Clawhauser!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam");
}

public function testPosTagging1630069362_4233() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Listen to me, we have a 10-91! Jaguar gone savage!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE PRO-PERS-1-M-S PON:sep PRO-PERS-1-M-P VER:inf+pres PRE NUM NOUN-m:s PPAST:part+past+m+s ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630069372_8626() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, we're sending backup! Hopps?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-1-M-P AUX:ind+pres+2+s VER:ger+pres NOUN-m:s SENT:exclam NPR SENT:qst");
}

public function testPosTagging1630069374_5095() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hopps!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam");
}

public function testPosTagging1630069376_911() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT:exclam");
}

public function testPosTagging1630069380_5788() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Get in! Carrots.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE SENT:exclam NOUN-m:p SENT");
}

public function testPosTagging1630069382_130() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Carrots!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT:exclam");
}

public function testPosTagging1630069383_3761() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Go!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres SENT:exclam");
}

public function testPosTagging1630069385_2700() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, no, no!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep ADV:neg PON:sep ADV:neg SENT:exclam");
}

public function testPosTagging1630069386_837() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Buddy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
}

public function testPosTagging1630069390_1890() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "One predator to another...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:s PRE ADJ:pos+m+s SENT");
}

public function testPosTagging1630069412_4364() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Now, I can tell you're a little tense...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRO-PERS-2-M-S VER:ind+pres+2+s PRE ADJ:pos+m+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630069416_6228() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "so I'm just gonna give you a little personal space!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-1-M-S VER:inf+pres ADV AUX:ger+pres VER:inf+pres PRO-PERS-2-M-S PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630069420_9963() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Rabbit, whatever you do, do not let go!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep NOUN-m:s PRO-PERS-2-M-S VER:inf+pres PON:sep AUX:inf+pres ADV:neg VER:inf+pres VER:inf+pres SENT:exclam");
}

public function testPosTagging1630069423_3168() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm gonna let go! No, you, what?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres AUX:ger+pres VER:inf+pres VER:inf+pres SENT:exclam ADV:neg PON:sep PRO-PERS-2-M-S PON:sep NOUN-m:s SENT:qst");
}

public function testPosTagging1630069424_4947() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "One, two...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM PON:sep NUM SENT");
}

public function testPosTagging1630069427_6993() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Carrots. You saved my life.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT PRO-PERS-2-M-S PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630069431_9471() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well. That's what we do at the ZPD.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s PRO-PERS-1-M-P VER:inf+pres PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630069433_9861() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, this should be good.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-DEMO-M-S AUX:inf+pres VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630069438_4538() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I thought this was just a missing mammal case but it's way bigger.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-DEMO-M-S VER:ind+past+1+s ADV PRE VER:ger+pres ADJ:pos+m+s NOUN-m:s CON PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s ADJ:pos+m+s SENT");
}

public function testPosTagging1630069441_1441() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mr. Otterton did not just disappear.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ABL NPR PPAST:part+past+m+s ADV:neg ADV VER:inf+pres SENT");
}

public function testPosTagging1630069445_2786() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I believe he and this jaguar, they went savage, sir.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-S CON PRO-DEMO-M-S NOUN-m:s PON:sep PRO-PERS-3-M-P PPAST:part+past+m+s ADJ:pos+m+s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630070974_1902() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I thought so, too, until I saw this.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV PON:sep ADV PON:sep ADV PRO-PERS-1-M-S VER:inf+pres PRO-DEMO-M-S SENT");
}

public function testPosTagging1630070976_4914() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What? He was right here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:qst SENT:qst PRO-PERS-3-M-S VER:ind+past+1+s ADV:plc SENT");
}

public function testPosTagging1630070979_3893() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The \"savage\" jaguar?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s PON:quote ADJ:pos+m+s PON:quote NOUN-m:s SENT:qst");
}

public function testPosTagging1630070983_8375() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir, I know what I saw. He almost killed us!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-1-M-S VER:inf+pres NOUN-m:s PRO-PERS-1-M-S VER:inf+pres SENT PRO-PERS-3-M-S ADV PPAST:part+past+m+s PRO-PERS-1-M-P SENT:exclam");
}

public function testPosTagging1630070990_4163() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Let's go!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-P VER:inf+pres SENT:exclam");
}

public function testPosTagging1630070991_163() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wait, sir.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630070994_3708() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm not the only one who saw him.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg ART-M:s ADV NUM PRO-WH-M-S VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630070996_120() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nick!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam");
}

public function testPosTagging1630070998_7696() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You think I'm gonna believe a fox?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-S AUX:inf+pres AUX:ger+pres VER:inf+pres PRE NOUN-m:s SENT:qst");
}

public function testPosTagging1630071002_3906() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He was a key witness, and I...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+past+1+s PRE NOUN-m:s NOUN-m:s PON:sep CON PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630071004_5383() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Two days to find the otter...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:p PRE VER:inf+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630071007_2820() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "or you quit.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:or PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630071009_3125() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That was the deal.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+past+1+s ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630071011_1752() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Badge.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
}

public function testPosTagging1630071070_4900() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But, sir, we... Badge!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PON:sep NOUN-m:s PON:sep PRO-PERS-1-M-P SENT NOUN-m:s SENT:exclam");
}

public function testPosTagging1630071071_8073() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
}

public function testPosTagging1630071073_3134() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What did you say, fox?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s PRO-PERS-2-M-S VER:inf+pres PON:sep NOUN-m:s SENT:qst");
}

public function testPosTagging1630071076_1925() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sorry. What I said was, \"no.\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT NOUN-m:s PRO-PERS-1-M-S PPAST:part+past+m+s VER:ind+past+1+s PON:sep PON:quote ADV:neg SENT PON:quote SENT");
}

public function testPosTagging1630071080_4771() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "She will not be giving you that badge.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S VER:inf+pres ADV:neg AUX:inf+pres VER:ger+pres PRO-PERS-2-M-S PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630071104_912() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Look, you give her a clown vest and a three-wheeled joke-mobile...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-F-S PRE NOUN-m:s NOUN-m:s CON PRE NUM PON:sep PPAST:part+past+m+s NOUN-m:s PON:sep ADJ:pos+m+s SENT");
}

public function testPosTagging1630071108_572() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and two days to solve a case you guys haven't cracked in two weeks?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON NUM NOUN-m:p PRE VER:inf+pres PRE NOUN-m:s PRO-PERS-2-M-S NOUN-m:p AUX:inf+pres ADV:neg VER:part+past+m+s PRE NUM NOUN-m:p SENT:qst");
}

public function testPosTagging1630071110_2455() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630071121_7932() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "None of you guys were gonna help her, were you?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRE PRO-PERS-2-M-S NOUN-m:p AUX:ind+past+3+p AUX:ger+pres VER:inf+pres PRO-PERS-3-F-S PON:sep VER:ind+past+3+p PRO-PERS-2-M-S SENT:qst");
}

public function testPosTagging1630071124_2212() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Here's the thing, Chief.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:plc VER:ind+pres+3+s ART-M:s NOUN-m:s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630071126_6418() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You gave her the 48 hours...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s PRO-PERS-3-F-S ART-M:s NUM NOUN-m:p SENT");
}

public function testPosTagging1630071132_7542() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "10 left to find our Mr. Otterton...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM PPAST:part+past+m+s PRE VER:inf+pres ADJ:pos+m+s ABL NPR SENT");
}

public function testPosTagging1630071135_8917() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and that is exactly what we're gonna do.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-DEMO-M-S VER:ind+pres+3+s ADV NOUN-m:s PRO-PERS-1-M-P AUX:ind+pres+2+s AUX:ger+pres VER:inf+pres SENT");
}

public function testPosTagging1630071143_5554() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So, if you'll excuse us, we have a very big lead to follow and a case to crack.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep CON:cond PRO-PERS-2-M-S VER:inf+pres VER:inf+pres PRO-PERS-1-M-P PON:sep PRO-PERS-1-M-P VER:inf+pres PRE ADV:qty ADJ:pos+m+s NOUN-m:s PRE VER:inf+pres CON PRE NOUN-m:s PRE VER:inf+pres SENT");
}

public function testPosTagging1630071218_5029() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Good day.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630071219_6300() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Hopps.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR SENT");
}

public function testPosTagging1630071220_9385() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT");
}

public function testPosTagging1630071223_8036() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Never let them see that they get to you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim VER:inf+pres PRO-PERS-3-M-P VER:inf+pres PRO-DEMO-M-S PRO-PERS-3-M-P VER:inf+pres PRE PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630071225_1838() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT");
}

public function testPosTagging1630071226_8822() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "things do get to you?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p AUX:inf+pres VER:inf+pres PRE PRO-PERS-2-M-S SENT:qst");
}

public function testPosTagging1630071228_8718() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, I mean, not anymore...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-1-M-S VER:inf+pres PON:sep ADV:neg ADV SENT");
}

public function testPosTagging1630071232_4501() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "but I was small and emotionally unbalanced like you once.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:ind+past+1+s ADJ:pos+m+s CON ADV PPAST:part+past+m+s ADV PRO-PERS-2-M-S ADV SENT");
}

public function testPosTagging1630071276_651() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, it's true.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630071279_2401() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I think I was 8, or maybe 9...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S VER:ind+past+1+s NUM PON:sep CON:or ADV NUM SENT");
}

public function testPosTagging1630071294_9661() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So, my mom scraped together enough money";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep ADJ:pos+m+s NOUN-m:s PPAST:part+past+m+s ADV ADV:qty NOUN-m:s SENT");
}

public function testPosTagging1630071308_4641() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "because, by God, I was gonna fit in.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PON:sep ADV NPR PON:sep PRO-PERS-1-M-S AUX:ind+past+1+s AUX:ger+pres VER:inf+pres PRE SENT");
}

public function testPosTagging1630071316_7327() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The only fox.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADV NOUN-m:s SENT");
}

public function testPosTagging1630071317_1231() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, Nick.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep NPR SENT");
}

public function testPosTagging1630071319_7158() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I was gonna be part of a pack.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:ind+past+1+s AUX:ger+pres VER:inf+pres NOUN-m:s PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1630071322_5606() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ready for initiation?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PRE NOUN-m:s SENT:qst");
}

public function testPosTagging1630071370_6708() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah. Pretty much born ready.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT ADJ:pos+m+s ADV:qty VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630071371_107() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I was so proud.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:ind+past+1+s ADV ADJ:pos+m+s SENT");
}

public function testPosTagging1630071372_1920() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630071455_7287() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "loyal, helpful, and trustworthy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep ADJ:pos+m+s PON:sep CON ADJ:pos+m+s SENT");
}

public function testPosTagging1630071461_9425() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:qst SENT:qst");
}

public function testPosTagging1630071475_2666() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What did I do?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s PRO-PERS-1-M-S VER:inf+pres SENT:qst");
}

public function testPosTagging1630071489_5935() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "If you thought we would ever trust a fox without a muzzle...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRO-PERS-2-M-S PPAST:part+past+m+s PRO-PERS-1-M-P PPAST:part+past+m+s ADV VER:inf+pres PRE NOUN-m:s ADV:qty PRE NOUN-m:s SENT");
}

public function testPosTagging1630071518_8121() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Aw, is he gonna cry?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ABL PON:sep VER:ind+pres+3+s PRO-PERS-3-M-S AUX:ger+pres VER:inf+pres SENT:qst");
}

public function testPosTagging1630071521_4664() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I learned two things that day,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s NUM NOUN-m:p PRO-DEMO-M-S NOUN-m:s PON:sep SENT");
}

public function testPosTagging1630071523_7249() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "One...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM SENT");
}

public function testPosTagging1630071526_6982() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I was never gonna let anyone see that they got to me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:ind+past+1+s ADV:tim AUX:ger+pres VER:inf+pres PRO-WH-M-S VER:inf+pres PRO-DEMO-M-S PRO-PERS-3-M-P PPAST:part+past+m+s PRE PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630071527_985() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And two?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON NUM SENT:qst");
}

public function testPosTagging1630071533_7861() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "If the world's only gonna see a fox as shifty and untrustworthy...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond ART-M:s NOUN-m:s VER:ind+pres+3+s ADV AUX:ger+pres VER:inf+pres PRE NOUN-m:s ADV ADJ:pos+m+s CON ADJ:pos+m+s SENT");
}

public function testPosTagging1630071538_3171() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "there's no point in trying to be anything else.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s ADV:neg NOUN-m:s PRE VER:ger+pres PRE VER:inf+pres NOUN-m:s ADV SENT");
}

public function testPosTagging1630071585_2325() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The Jam Cams.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630071589_3810() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Seriously. It's okay. No, no, no.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT PRO-PERS-3-M-S VER:ind+pres+3+s INT:conf SENT ADV:neg PON:sep ADV:neg PON:sep ADV:neg SENT");
}

public function testPosTagging1630071596_5037() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All over the canopy!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET ADV ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630071597_9573() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Whatever happened to that jaguar...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s PRE PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630071618_5180() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The traffic cams would have caught it!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s NOUN-m:p PPAST:part+past+m+s AUX:inf+pres VER:part+past+m+s PRO-PERS-3-M-S SENT:exclam");
}

public function testPosTagging1630071623_9872() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bingo!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam");
}

public function testPosTagging1630071641_7978() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I doubt Chief Buffalo Butt is gonna let you into it now.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres NOUN-m:s NOUN-m:s NOUN-m:s VER:ind+pres+3+s AUX:ger+pres VER:inf+pres PRO-PERS-2-M-S ADV PRO-PERS-3-M-S ADV:tim SENT");
}

public function testPosTagging1630071642_6350() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
}

public function testPosTagging1630071645_2868() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But I have a friend at City Hall who might.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres PRE NOUN-m:s PRE NOUN-m:s NOUN-m:s PRO-WH-M-S VER:cond+pres+3+s SENT");
}

public function testPosTagging1630071649_5714() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir, if we could just review these very important...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep CON:cond PRO-PERS-1-M-P PPAST:part+past+m+s ADV VER:inf+pres PRO-DEMO-M-P ADV:qty ADJ:pos+m+s SENT");
}

public function testPosTagging1630071650_43() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
}

public function testPosTagging1630071652_2579() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm so sorry. Sir!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV ADJ:pos+m+s SENT NOUN-m:s SENT:exclam");
}

public function testPosTagging1630071690_2501() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay. I heard you, Bellwether. Just take care of it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S PON:sep NPR SENT ADV VER:inf+pres NOUN-m:s PRE PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630071753_9646() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, no! But, sir, you do have a meeting with Herds and Grazing.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep ADV:neg SENT:exclam CON PON:sep NOUN-m:s PON:sep PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres PRE NOUN-m:s PRE NOUN-m:p CON NOUN-m:s SENT");
}

public function testPosTagging1630071755_6973() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir, if I could just...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep CON:cond PRO-PERS-1-M-S PPAST:part+past+m+s ADV SENT");
}

public function testPosTagging1630071757_611() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, mutton chops.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630071759_1623() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Assistant Mayor Bellwether?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s NPR SENT:qst");
}

public function testPosTagging1630071761_3144() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We need your help.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630071766_2516() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We just need to get into the traffic cam database.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P ADV VER:inf+pres PRE VER:inf+pres ADV ART-M:s NOUN-m:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630071767_2161() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So fluffy!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630071768_5384() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:exclam");
}

public function testPosTagging1630071776_3835() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sheep never let me get this close.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADV:tim VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRO-DEMO-M-S ADJ:pos+m+s SENT");
}

public function testPosTagging1630071778_9534() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You can't just touch a sheep's wool!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S ADV:neg ADV VER:inf+pres PRE NOUN-m:s PRE NOUN-m:s SENT:exclam");
}

public function testPosTagging1630071781_7432() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's like cotton candy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630071785_7945() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Stop it!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-S SENT:exclam");
}

public function testPosTagging1630071787_1045() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Where to?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE SENT:qst");
}

public function testPosTagging1630071791_2909() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Rainforest District, Vine and Tujunga.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s PON:sep NOUN-m:s CON NPR SENT");
}

public function testPosTagging1630071805_1789() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is so exciting, actually!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV VER:ger+pres PON:sep ADV SENT:exclam");
}

public function testPosTagging1630071808_3505() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I never get to do anything this important.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV:tim VER:inf+pres PRE VER:inf+pres NOUN-m:s PRO-DEMO-M-S ADJ:pos+m+s SENT");
}

public function testPosTagging1630071810_3() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But you're the Assistant Mayor of Zootopia.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-2-M-S VER:ind+pres+2+s ART-M:s NOUN-m:s NOUN-m:s PRE NPR SENT");
}

public function testPosTagging1630071813_319() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm more of a glorified secretary.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV PRE PRE PPAST:part+past+m+s NOUN-m:s SENT");
}

public function testPosTagging1630071822_8462() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I think Mayor Lionheart just wanted the sheep vote.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres NOUN-m:s NOUN-m:s ADV PPAST:part+past+m+s ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630071826_2243() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But he did give me that nice mug.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S PPAST:part+past+m+s VER:inf+pres PRO-PERS-1-M-S PRO-DEMO-M-S ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630071827_9700() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Feels good to be appreciated.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s ADJ:pos+m+s PRE AUX:inf+pres VER:part+past+m+s SENT");
}

public function testPosTagging1630071846_2291() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I called him Lion-fart once.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-3-M-S NOUN-m:s PON:sep NOUN-m:s ADV SENT");
}

public function testPosTagging1630071851_8235() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He did not care for that. Let me tell you, it was not a good day for me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres PRE PRO-DEMO-M-S SENT VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S PON:sep PRO-PERS-3-M-S VER:ind+past+1+s ADV:neg PRE ADJ:pos+m+s NOUN-m:s PRE PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630071854_1811() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes, sir?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep NOUN-m:s SENT:qst");
}

public function testPosTagging1630071857_1365() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I thought you were going to cancel my afternoon!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S AUX:ind+past+3+p VER:ger+pres PRE VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630071861_569() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, dear. I better go.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADJ:pos+m+s SENT PRO-PERS-1-M-S ADJ:pos+m+s VER:inf+pres SENT");
}

public function testPosTagging1630071865_9026() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Let me know what you find. It was really nice for me to be...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S VER:inf+pres NOUN-m:s PRO-PERS-2-M-S VER:inf+pres SENT PRO-PERS-3-M-S VER:ind+past+1+s ADV ADJ:pos+m+s PRE PRO-PERS-1-M-S PRE VER:inf+pres SENT");
}

public function testPosTagging1630071873_5592() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "While we're young, Smell-wether!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-1-M-P VER:ind+pres+2+s ADJ:pos+m+s PON:sep NOUN-m:s PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630071878_6098() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You think when she goes to sleep she counts herself?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres ADV:when PRO-PERS-3-F-S VER:ind+pres+3+s PRE VER:inf+pres PRO-PERS-3-F-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630071889_2633() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Who are these guys?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S VER:ind+pres+2+s PRO-DEMO-M-P NOUN-m:p SENT:qst");
}

public function testPosTagging1630071966_8426() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Timberwolves. Look at these dumb-dumbs.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT VER:inf+pres PRE PRO-DEMO-M-P ADJ:pos+m+s PON:sep ADJ:pos+m+p SENT");
}

public function testPosTagging1630071983_8799() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bet you a nickel one of them is gonna howl.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S PRE NOUN-m:s NUM PRE PRO-PERS-3-M-P VER:ind+pres+3+s AUX:ger+pres VER:inf+pres SENT");
}

public function testPosTagging1630071984_3925() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And there it is.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
}

public function testPosTagging1630071994_4192() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What is it with wolves and the howling? It's like...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-PERS-3-M-S PRE NOUN-m:p CON ART-M:s NOUN-m:s SENT:qst PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s SENT");
}

public function testPosTagging1630071997_4727() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Howlers. Night Howlers.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630072000_442() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's what Manchas was afraid of! Wolves!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s NPR VER:ind+past+1+s ADJ:pos+m+s PRE SENT:exclam NOUN-m:p SENT:exclam");
}

public function testPosTagging1630072003_5129() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The wolves are the Night Howlers. If they took Manchas...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:p VER:ind+pres+2+s ART-M:s NOUN-m:s NOUN-m:p SENT CON:cond PRO-PERS-3-M-P PPAST:part+past+m+s NPR SENT");
}

public function testPosTagging1630072009_5207() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'll bet they took Otterton, too.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-3-M-P PPAST:part+past+m+s NPR PON:sep ADV SENT");
}

public function testPosTagging1630072020_1795() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wait, where did they go?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep ADV PPAST:part+past+m+s PRO-PERS-3-M-P VER:inf+pres SENT:qst");
}

public function testPosTagging1630072024_2752() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "If I wanted to avoid surveillance because I was doing something illegal...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRO-PERS-1-M-S PPAST:part+past+m+s PRE VER:inf+pres NOUN-m:s CON PRO-PERS-1-M-S AUX:ind+past+1+s VER:ger+pres NOUN-m:s ADJ:pos+m+s SENT");
}

public function testPosTagging1630072026_3433() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "which I never have...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S PRO-PERS-1-M-S ADV:tim VER:inf+pres SENT");
}

public function testPosTagging1630072029_8684() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I would use the maintenance tunnel 6B.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres ART-M:s NOUN-m:s NOUN-m:s CODE SENT");
}

public function testPosTagging1630072031_827() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Which would put them out...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S PPAST:part+past+m+s VER:inf+pres PRO-PERS-3-M-P ADV SENT");
}

public function testPosTagging1630072033_2205() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "right there.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADV SENT");
}

public function testPosTagging1630072036_9824() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, look at you, Junior Detective.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other INT:other PON:sep ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072053_825() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You know, I think you'd actually make a pretty good cop.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S PPAST:part+past+m+s ADV VER:inf+pres PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072056_1392() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "How dare you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:inf+pres PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630072062_2744() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Acacia Alley?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630072063_4512() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ficus Underpass.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630072065_4018() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "South Canyon.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072068_3384() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They're heading out of town.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P AUX:ind+pres+2+s VER:ger+pres ADV PRE NOUN-m:s SENT");
}

public function testPosTagging1630072069_9878() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Where does that road go?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s PRO-DEMO-M-S NOUN-m:s VER:inf+pres SENT:qst");
}

public function testPosTagging1630072071_9735() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Gary, quit it!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep VER:inf+pres PRO-PERS-3-M-S SENT:exclam");
}

public function testPosTagging1630072074_5190() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're gonna start a howl.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:ind+pres+2+s AUX:ger+pres VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630072076_9114() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I didn't start it!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres PRO-PERS-3-M-S SENT:exclam");
}

public function testPosTagging1630072077_9116() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630072079_6505() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You are a clever bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072131_1726() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It looks like this was a hospital.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV PRO-DEMO-M-S VER:ind+past+1+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630072136_4627() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You know, after you. You're the cop.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PON:sep ADV PRO-PERS-2-M-S SENT PRO-PERS-2-M-S VER:ind+pres+2+s ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630072138_568() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, all clear.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep DET ADJ:pos+m+s SENT");
}

public function testPosTagging1630072149_1216() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All this equipment is brand new.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET PRO-DEMO-M-S NOUN-m:s VER:ind+pres+3+s NOUN-m:s ADJ:pos+m+s SENT");
}

public function testPosTagging1630072150_4157() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Carrots.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT");
}

public function testPosTagging1630072168_3079() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mr. Manchas.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ABL NPR SENT");
}

public function testPosTagging1630072169_1372() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's him.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630072171_7848() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We found our otter.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072173_9598() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mr. Otterton.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ABL NPR SENT");
}

public function testPosTagging1630072179_8317() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "My name is Officer Judy Hopps. Your wife sent me to find you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s NOUN-m:s NPR NPR SENT ADJ:pos+m+s NOUN-m:s PPAST:part+past+m+s PRO-PERS-1-M-S PRE VER:inf+pres PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630072182_3170() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We're gonna get you out of here now.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P AUX:ind+pres+2+s AUX:ger+pres VER:inf+pres PRO-PERS-2-M-S ADV PRE ADV:plc ADV:tim SENT");
}

public function testPosTagging1630072185_1161() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Or not.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:or ADV:neg SENT");
}

public function testPosTagging1630072196_118() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "11, 12, 13, 14...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM PON:sep NUM PON:sep NUM PON:sep NUM SENT");
}

public function testPosTagging1630072199_1665() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Not including Manchas, it's 14.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg VER:ger+pres NPR PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s NUM SENT");
}

public function testPosTagging1630072202_828() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Chief Bogo handed out 14 missing mammal files.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR PPAST:part+past+m+s ADV NUM VER:ger+pres ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630072204_7778() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They're all here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:ind+pres+2+s DET ADV:plc SENT");
}

public function testPosTagging1630072210_2202() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All the missing mammals are right here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET ART-M:s VER:ger+pres NOUN-m:p VER:ind+pres+2+s ADV:plc SENT");
}

public function testPosTagging1630072223_5413() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I want answers.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres NOUN-m:p SENT");
}

public function testPosTagging1630072224_3140() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mayor Lionheart, please.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s PON:sep INT:other SENT");
}

public function testPosTagging1630072226_6243() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We're doing everything we can.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P AUX:ind+pres+2+s VER:ger+pres PRO-INDEF-M-S PRO-PERS-1-M-P VER:inf+pres SENT");
}

public function testPosTagging1630072227_9287() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Really?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT:qst");
}

public function testPosTagging1630072231_5550() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Because I got a dozen and a half animals here";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S PPAST:part+past+m+s PRE NOUN-m:s CON PRE ADJ:pos+m+s NOUN-m:p ADV:plc SENT");
}

public function testPosTagging1630072235_6891() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "who have gone off-the-rails crazy...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S AUX:inf+pres VER:part+past+m+s ADV PON:sep ART-M:s PON:sep NOUN-m:p ADJ:pos+m+s SENT");
}

public function testPosTagging1630072238_8013() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and you can't tell me why.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-2-M-S ADV:neg VER:inf+pres PRO-PERS-1-M-S ADV SENT");
}

public function testPosTagging1630072245_739() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Now, I'd call that awfully far from \"doing everything.\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRO-DEMO-M-S ADV ADJ:pos+m+s PRE PON:quote VER:ger+pres PRO-INDEF-M-S SENT PON:quote SENT");
}

public function testPosTagging1630072246_5889() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
}

public function testPosTagging1630072249_85() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "it may be time to consider their biology.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:cond+pres+3+s VER:inf+pres NOUN-m:s PRE VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072252_4581() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What? What do you mean \"biology?\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:qst SENT:qst NOUN-m:s VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PON:quote NOUN-m:s SENT:qst PON:quote SENT");
}

public function testPosTagging1630072255_7919() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The only animals going savage are predators.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADV NOUN-m:p VER:ger+pres ADJ:pos+m+s VER:ind+pres+2+s NOUN-m:p SENT");
}

public function testPosTagging1630072426_4277() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Great idea. Tell the public.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT VER:inf+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630072441_8358() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And how do you think they're gonna feel about their mayor...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-P AUX:ind+pres+2+s AUX:ger+pres VER:inf+pres ADV ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072442_6192() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "who is a lion?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S VER:ind+pres+3+s PRE NOUN-m:s SENT:qst");
}

public function testPosTagging1630072444_6961() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'll be ruined!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres AUX:inf+pres VER:part+past+m+s SENT:exclam");
}

public function testPosTagging1630072447_7043() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, what does Chief Bogo say?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other NOUN-m:s VER:ind+pres+3+s NOUN-m:s NPR VER:inf+pres SENT:qst");
}

public function testPosTagging1630072448_1929() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Chief Bogo doesn't know.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR AUX:ind+pres+3+s ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630072452_3055() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And we are going to keep it that way.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-P AUX:ind+pres+2+s VER:ger+pres PRE VER:inf+pres PRO-PERS-3-M-S PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630072454_1919() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, no, no!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep ADV:neg PON:sep ADV:neg SENT:exclam");
}

public function testPosTagging1630072456_8652() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Someone's here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S VER:ind+pres+3+s ADV:plc SENT");
}

public function testPosTagging1630072459_9477() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir, you need to go, now!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-2-M-S VER:inf+pres PRE VER:inf+pres PON:sep ADV:tim SENT:exclam");
}

public function testPosTagging1630072462_2682() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Security! Sweep the area!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam VER:inf+pres ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630072465_2705() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Great! We're dead. We're dead.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT:exclam PRO-PERS-1-M-P VER:ind+pres+2+s ADJ:pos+m+s SENT PRO-PERS-1-M-P VER:ind+pres+2+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630072473_1625() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's it. I'm dead, you're dead. Everybody's dead!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s PON:sep PRO-PERS-2-M-S VER:ind+pres+2+s ADJ:pos+m+s SENT PRO-INDEF-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630072475_593() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Can you swim?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S VER:inf+pres SENT:qst");
}

public function testPosTagging1630072478_748() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What? Can I swim? Yes, I can swim. Why?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:qst SENT:qst VER:inf+pres PRO-PERS-1-M-S VER:inf+pres SENT:qst INT:conf PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres SENT ADV SENT:qst");
}

public function testPosTagging1630072480_6776() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Carrots! Hopps! Judy!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT:exclam NPR SENT:exclam NPR SENT:exclam");
}

public function testPosTagging1630072483_4816() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We gotta tell Bogo!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P AUX:inf+pres VER:inf+pres NPR SENT:exclam");
}

public function testPosTagging1630072488_2701() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wow! You are one hot dancer, Chief Bogo.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT:exclam PRO-PERS-2-M-S VER:ind+pres+2+s NUM ADJ:pos+m+s NOUN-m:s PON:sep NOUN-m:s NPR SENT");
}

public function testPosTagging1630072490_3480() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Chief Bogo! Not now!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR SENT:exclam ADV:neg ADV:tim SENT:exclam");
}

public function testPosTagging1630072493_8859() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wait, is that Gazelle?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep VER:ind+pres+3+s PRO-DEMO-M-S NOUN-m:s SENT:qst");
}

public function testPosTagging1630072495_9937() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
}

public function testPosTagging1630072499_904() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm Gazelle, and you are one hot dancer.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres NOUN-m:s PON:sep CON PRO-PERS-2-M-S VER:ind+pres+2+s NUM ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072504_8038() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You have the app too?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres ART-M:s NOUN-m:s ADV SENT:qst");
}

public function testPosTagging1630072506_59() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Chief!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam");
}

public function testPosTagging1630072516_4935() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes of course! About that, sir. Officer Hopps just called.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf INT:conf SENT:exclam ADV PRO-DEMO-M-S PON:sep NOUN-m:s SENT NOUN-m:s NPR ADV PPAST:part+past+m+s SENT");
}

public function testPosTagging1630072518_2248() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "She found all of them.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S VER:inf+pres DET PRE PRO-PERS-3-M-P SENT");
}

public function testPosTagging1630072520_2854() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wow! I'm impressed.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT:exclam PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s SENT");
}

public function testPosTagging1630072524_3044() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mayor Lionheart, you have the right to remain silent. Anything...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s PON:sep PRO-PERS-2-M-S VER:inf+pres ART-M:s NOUN-m:s PRE VER:inf+pres ADJ:pos+m+s SENT NOUN-m:s SENT");
}

public function testPosTagging1630072527_6512() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You don't understand. I was trying to protect the city!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres ADV:neg VER:inf+pres SENT PRO-PERS-1-M-S AUX:ind+past+1+s VER:ger+pres PRE VER:inf+pres ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630072530_3214() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You were just trying to protect your job.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:ind+past+3+p ADV VER:ger+pres PRE VER:inf+pres ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072536_3645() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It could destroy Zootopia.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S PPAST:part+past+m+s VER:inf+pres NPR SENT");
}

public function testPosTagging1630072540_5578() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You have the right to remain silent.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres ART-M:s NOUN-m:s PRE VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630072572_6188() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ladies and gentlemammals.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p CON NOUN-m:s SENT");
}

public function testPosTagging1630072574_8713() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "14 mammals went missing...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:p PPAST:part+past+m+s VER:ger+pres SENT");
}

public function testPosTagging1630072577_9612() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and all 14 have been found by our newest recruit...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON DET NUM AUX:inf+pres VER:part+past+m+s VER:inf+pres ADV ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072579_1212() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "who will speak to you in a moment.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S VER:inf+pres VER:inf+pres PRE PRO-PERS-2-M-S PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1630072582_2062() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But first, let me remind you...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADJ:pos+m+s PON:sep VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630072583_7486() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm so nervous.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV ADJ:pos+m+s SENT");
}

public function testPosTagging1630072587_794() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay. Press Conference 101.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT NOUN-m:s NOUN-m:s NUM SENT");
}

public function testPosTagging1630072657_2081() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "\"Well, was this a tough case?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other VER:ind+past+1+s PRO-DEMO-M-S PRE ADJ:pos+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630072661_7155() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "\"Yes. Yes, it was.\" You see?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:quote INT:conf SENT INT:conf PON:sep PRO-PERS-3-M-S VER:ind+past+1+s SENT PON:quote PRO-PERS-2-M-S VER:inf+pres SENT:qst");
}

public function testPosTagging1630072680_776() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You should be there with me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres ADV PRE PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630072682_2525() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We did this together.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P PPAST:part+past+m+s PRO-DEMO-M-S ADV SENT");
}

public function testPosTagging1630072684_8368() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, am I a cop? No. No, I am not.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other VER:inf+pres PRO-PERS-1-M-S PRE NOUN-m:s SENT:qst ADV:neg SENT ADV:neg PON:sep PRO-PERS-1-M-S VER:inf+pres ADV:neg SENT");
}

public function testPosTagging1630072690_8072() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Funny you should say that, because I've been thinking...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres PRO-DEMO-M-S PON:sep CON PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s VER:ger+pres SENT");
}

public function testPosTagging1630072692_3233() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It would be nice to have a partner.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S PPAST:part+past+m+s VER:inf+pres ADJ:pos+m+s PRE VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630072697_1973() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Here. In case you need something to write with.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:plc SENT PRE NOUN-m:s PRO-PERS-2-M-S VER:inf+pres NOUN-m:s PRE VER:inf+pres PRE SENT");
}

public function testPosTagging1630072703_9780() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "At twenty-two hundred hours, we found all these missing animals...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NUM PON:sep NUM NUM NOUN-m:p PON:sep PRO-PERS-1-M-P VER:inf+pres DET PRO-DEMO-M-P VER:ger+pres NOUN-m:p SENT");
}

public function testPosTagging1630072708_3640() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Hopps, it's time.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s SENT");
}

public function testPosTagging1630072712_6325() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They appear to be in good health, physically if not emotionally";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:inf+pres PRE VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s PON:sep ADV CON:cond ADV:neg ADV SENT");
}

public function testPosTagging1630072717_2221() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So now, I'll turn things over to the officer who cracked the case.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV:tim PON:sep PRO-PERS-1-M-S VER:inf+pres VER:inf+pres NOUN-m:p ADV PRE ART-M:s NOUN-m:s PRO-WH-M-S PPAST:part+past+m+s ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630072718_8571() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Judy Hopps.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR NPR SENT");
}

public function testPosTagging1630072720_5862() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Hopps! Officer Hopps!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR SENT:exclam NOUN-m:s NPR SENT:exclam");
}

public function testPosTagging1630072722_935() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Over here!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV:plc SENT:exclam");
}

public function testPosTagging1630072724_3894() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:qst");
}

public function testPosTagging1630072728_8150() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What can you tell us about the animals that went savage?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-P ADV ART-M:s NOUN-m:p PRO-DEMO-M-S PPAST:part+past+m+s ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630072732_1756() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, the animals in question...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other ART-M:s NOUN-m:p PRE NOUN-m:s SENT");
}

public function testPosTagging1630072734_7832() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are they all different species?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-3-M-P DET ADJ:pos+m+s NOUN-m:p SENT:qst");
}

public function testPosTagging1630072736_4621() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes. Yes, they are.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT INT:conf PON:sep PRO-PERS-3-M-P VER:ind+pres+2+s SENT");
}

public function testPosTagging1630072738_6745() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, so what is the connection?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep ADV NOUN-m:s VER:ind+pres+3+s ART-M:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630072747_9461() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All we know is that they are all members of the predator family.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET PRO-PERS-1-M-P VER:inf+pres VER:ind+pres+3+s PRO-DEMO-M-S PRO-PERS-3-M-P VER:ind+pres+2+s DET NOUN-m:p PRE ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630072750_2999() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So, predators are the only ones going savage?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep NOUN-m:p VER:ind+pres+2+s ART-M:s ADV NUM VER:ger+pres ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630072752_9274() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That is accurate. Yes.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT INT:conf SENT");
}

public function testPosTagging1630072765_8424() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It may have something to do with biology.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:cond+pres+3+s VER:inf+pres NOUN-m:s PRE VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630072768_2382() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What do you mean by that?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:inf+pres PRO-PERS-2-M-S VER:inf+pres ADV PRO-DEMO-M-S SENT:qst");
}

public function testPosTagging1630072771_6445() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A biological component.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072775_4346() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You know, something in their DNA.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PON:sep NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072779_4880() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In their DNA? Can you elaborate on that, please?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s NOUN-m:s SENT:qst VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRE PRO-DEMO-M-S PON:sep INT:other SENT:qst");
}

public function testPosTagging1630072783_5870() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes, what I mean is, thousands of years ago...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep NOUN-m:s PRO-PERS-1-M-S VER:inf+pres VER:ind+pres+3+s PON:sep NOUN-m:p PRE NOUN-m:p ABL SENT");
}

public function testPosTagging1630072786_2601() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "predators survived through their aggressive...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p PPAST:part+past+m+s ADV ADJ:pos+m+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630072793_760() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "hunting instincts.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres NOUN-m:p SENT");
}

public function testPosTagging1630072796_9328() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "For whatever reason...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630072804_8031() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Of course they did.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PRO-PERS-3-M-P PPAST:part+past+m+s SENT");
}

public function testPosTagging1630072808_9916() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Aw, is he gonna cry?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ABL PON:sep VER:ind+pres+3+s PRO-PERS-3-M-S AUX:ger+pres VER:inf+pres SENT:qst");
}

public function testPosTagging1630072811_8786() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Hopps, could it happen again?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR PON:sep PPAST:part+past+m+s PRO-PERS-3-M-S VER:inf+pres ADV SENT:qst");
}

public function testPosTagging1630072814_7105() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It is possible. So we must be vigilant.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT ADV PRO-PERS-1-M-P AUX:inf+pres VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630072819_8543() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And we at the ZPD are prepared and are here to protect you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-P PRE ART-M:s NOUN-m:s AUX:ind+pres+2+s VER:part+past+m+s CON VER:ind+pres+2+s ADV:plc PRE VER:inf+pres PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630072825_9272() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What is being done to protect us?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s AUX:ger+pres VER:part+past+m+s PRE VER:inf+pres PRO-PERS-1-M-P SENT:qst");
}

public function testPosTagging1630072828_3560() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Have you considered a mandatory quarantine on predators?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s PRE NOUN-m:p SENT:qst");
}

public function testPosTagging1630072838_9376() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, thank you, Officer Hopps. That's all the time that we have.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep INT:jubi PON:sep NOUN-m:s NPR SENT PRO-DEMO-M-S VER:ind+pres+3+s DET ART-M:s NOUN-m:s PRO-DEMO-M-S PRO-PERS-1-M-P VER:inf+pres SENT");
}

public function testPosTagging1630072840_4122() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No more questions.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg ADV NOUN-m:p SENT");
}

public function testPosTagging1630072842_2726() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Was I okay?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+past+1+s PRO-PERS-1-M-S INT:conf SENT:qst");
}

public function testPosTagging1630072845_8547() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You did fine.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630072848_4327() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That went so fast.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S PPAST:part+past+m+s ADV ADJ:pos+m+s SENT");
}

public function testPosTagging1630072854_7454() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I didn't get a chance to mention you, or say anything about how we...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres PRE NOUN-m:s PRE VER:inf+pres PRO-PERS-2-M-S PON:sep CON:or VER:inf+pres NOUN-m:s ADV ADV PRO-PERS-1-M-P SENT");
}

public function testPosTagging1630072856_5011() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I think you said plenty.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S PPAST:part+past+m+s ADV:qty SENT");
}

public function testPosTagging1630072858_6011() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What do you mean?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:inf+pres PRO-PERS-2-M-S VER:inf+pres SENT:qst");
}

public function testPosTagging1630072861_7377() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "\"Clearly there's a biological component?\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:quote ADV ADV VER:ind+pres+3+s PRE ADJ:pos+m+s NOUN-m:s SENT:qst PON:quote SENT");
}

public function testPosTagging1630072872_8201() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are you serious?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-2-M-S ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630072875_3797() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I just stated the facts of the case.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV PPAST:part+past+m+s ART-M:s NOUN-m:p PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630072883_1873() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Right. But a fox could?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT CON PRE NOUN-m:s PPAST:part+past+m+s SENT:qst");
}

public function testPosTagging1630072888_3680() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, there's a \"them\" now?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV VER:ind+pres+3+s PRE PON:quote PRO-PERS-3-M-P PON:quote ADV:tim SENT:qst");
}

public function testPosTagging1630072893_9163() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You know what I mean. You're not that kind of predator.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres NOUN-m:s PRO-PERS-1-M-S VER:inf+pres SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADV:neg PRO-DEMO-M-S NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630072898_8069() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The kind that needs to be muzzled?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s PRO-DEMO-M-S VER:ind+pres+3+s PRE AUX:inf+pres VER:part+past+m+s SENT:qst");
}

public function testPosTagging1630072902_8825() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The kind that makes you think you need to carry around fox repellent?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-2-M-S VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRE VER:inf+pres ADV NOUN-m:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630072907_574() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, don't think I didn't notice that little item the first time we met.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep AUX:inf+pres ADV:neg VER:inf+pres PRO-PERS-1-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres PRO-DEMO-M-S ADJ:pos+m+s NOUN-m:s ART-M:s ADJ:pos+m+s NOUN-m:s PRO-PERS-1-M-P PPAST:part+past+m+s SENT");
}

public function testPosTagging1630072912_5232() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So let me ask you a question. Are you afraid of me?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S PRE NOUN-m:s SENT VER:ind+pres+2+s PRO-PERS-2-M-S ADJ:pos+m+s PRE PRO-PERS-1-M-S SENT:qst");
}

public function testPosTagging1630072917_8636() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Do you think I might go nuts?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-S VER:cond+pres+3+s VER:inf+pres ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630072924_4684() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Do you think I might try to...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-S VER:cond+pres+3+s VER:inf+pres PRE SENT");
}

public function testPosTagging1630072926_3739() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "eat you?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-2-M-S SENT:qst");
}

public function testPosTagging1630072928_5199() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I knew it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630072931_8251() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Just when I thought somebody actually believed in me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV:when PRO-PERS-1-M-S PPAST:part+past+m+s NOUN-m:s ADV PPAST:part+past+m+s PRE PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630072935_5705() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Probably best if you don't have a predator as a partner.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s CON:cond PRO-PERS-2-M-S AUX:inf+pres ADV:neg VER:inf+pres PRE NOUN-m:s ADV PRE NOUN-m:s SENT");
}

public function testPosTagging1630072939_8346() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No. Nick. Nick!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT NPR SENT NPR SENT:exclam");
}

public function testPosTagging1630072942_6455() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officer Hopps! Were you just threatened by that predator?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR SENT:exclam VER:ind+past+3+p PRO-PERS-2-M-S ADV PPAST:part+past+m+s ADV PRO-DEMO-M-S NOUN-m:s SENT:qst");
}

public function testPosTagging1630072945_7434() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, he's my friend.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630072950_4461() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That is not what I said! Please!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV:neg NOUN-m:s PRO-PERS-1-M-S PPAST:part+past+m+s SENT:exclam INT:other SENT:exclam");
}

public function testPosTagging1630072952_5695() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are we safe?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-1-M-P ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630072955_2629() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Have any foxes gone savage?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres DET NOUN-m:p PPAST:part+past+m+s ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630072990_9318() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A caribou is in critical condition, the victim of a mauling...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s VER:ind+pres+3+s PRE ADJ:pos+m+s NOUN-m:s PON:sep ART-M:s NOUN-m:s PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1630072997_508() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This, the 27th such attack, comes just one week...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S PON:sep ART-M:s CODE DET VER:inf+pres PON:sep VER:ind+pres+3+s ADV NUM NOUN-m:s SENT");
}

public function testPosTagging1630073000_8271() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "after ZPD Officer Judy Hopps connected the violence";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV NOUN-m:s NOUN-m:s NPR NPR PPAST:part+past+m+s ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630073003_6017() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "to traditionally predatory animals.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADV ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630073007_209() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Meanwhile, a peace rally organized by pop star Gazelle...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRE NOUN-m:s NOUN-m:s PPAST:part+past+m+s ADV NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630073009_648() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "was marred by protest.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:ind+past+1+s VER:part+past+m+s ADV NOUN-m:s SENT");
}

public function testPosTagging1630073012_6291() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Go back to the forest, predator!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADJ:pos+m+s PRE ART-M:s NOUN-m:s PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630073014_3782() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm from the savanna!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630073016_421() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Zootopia is a unique place.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR VER:ind+pres+3+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073019_7743() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's a crazy, beautiful, diverse city...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE ADJ:pos+m+s PON:sep ADJ:pos+m+s PON:sep ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073022_9339() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "where we celebrate our differences.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-1-M-P VER:inf+pres ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630073025_8546() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is not the Zootopia I know";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV:neg ART-M:s NPR PRO-PERS-1-M-S VER:inf+pres SENT");
}

public function testPosTagging1630073027_3415() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The Zootopia I know is better than this.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NPR PRO-PERS-1-M-S VER:inf+pres VER:ind+pres+3+s ADJ:pos+m+s CON PRO-DEMO-M-S SENT");
}

public function testPosTagging1630073041_757() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We don't know why these attacks keep happening...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P AUX:inf+pres ADV:neg VER:inf+pres ADV PRO-DEMO-M-P NOUN-m:p VER:inf+pres VER:ger+pres SENT");
}

public function testPosTagging1630073049_5640() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's not my Emmitt.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV:neg ADJ:pos+m+s NPR SENT");
}

public function testPosTagging1630073055_4704() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Please give me back the Zootopia I love.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other VER:inf+pres PRO-PERS-1-M-S ADJ:pos+m+s ART-M:s NPR PRO-PERS-1-M-S VER:inf+pres SENT");
}

public function testPosTagging1630073059_3619() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on, Hopps.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep NPR SENT");
}

public function testPosTagging1630073063_6663() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The new mayor wants to see us.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s PRE VER:inf+pres PRO-PERS-1-M-P SENT");
}

public function testPosTagging1630073065_5975() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The mayor? Why?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s SENT:qst ADV SENT:qst");
}

public function testPosTagging1630073067_2218() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It would seem you've arrived.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S PPAST:part+past+m+s VER:inf+pres PRO-PERS-2-M-S AUX:inf+pres VER:part+past+m+s SENT");
}

public function testPosTagging1630073069_9442() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Clawhauser?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:qst");
}

public function testPosTagging1630073072_9552() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What are you doing?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres SENT:qst");
}

public function testPosTagging1630073074_2381() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They thought it would be better...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P PPAST:part+past+m+s PRO-PERS-3-M-S PPAST:part+past+m+s VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630073080_2247() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "if a predator such as myself wasn't the first face that you see...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRE NOUN-m:s DET ADV PRO-PERS-1-M-S VER:ind+past+1+s ADV:neg ART-M:s ADJ:pos+m+s NOUN-m:s PRO-DEMO-M-S PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630073083_343() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "when you walk into the ZPD.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:when PRO-PERS-2-M-S VER:inf+pres ADV ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630073084_2298() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:qst SENT:qst");
}

public function testPosTagging1630073102_1991() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They're gonna move me to records. It's downstairs.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P AUX:ind+pres+2+s AUX:ger+pres VER:inf+pres PRO-PERS-1-M-S PRE VER:ind+pres+3+s SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630073104_1567() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's by the boiler.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630073105_8744() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hopps!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam");
}

public function testPosTagging1630073106_2219() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't understand.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630073109_210() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Our city is 90% prey, Judy...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s NUM NOUN-m:s PON:sep NPR SENT");
}

public function testPosTagging1630073112_5233() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and right now they're just really scared.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV:tim PRO-PERS-3-M-P VER:ind+pres+2+s ADV ADV PPAST:part+past+m+s SENT");
}

public function testPosTagging1630073118_9055() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're a hero to them. They trust you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s PRE NOUN-m:s PRE PRO-PERS-3-M-P SENT PRO-PERS-3-M-P VER:inf+pres PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630073135_1373() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm not a hero.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg PRE NOUN-m:s SENT");
}

public function testPosTagging1630073137_8655() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I came here to make the world a better place...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:ind+past+3+s ADV:plc PRE VER:inf+pres ART-M:s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073139_2030() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "but I think I broke it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630073142_4536() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Don't give yourself so much credit, Hopps.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres PRO-PERS-2-M-S ADV ADV:qty NOUN-m:s PON:sep NPR SENT");
}

public function testPosTagging1630073146_294() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The world has always been broken, that's why we need good cops.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s AUX:ind+pres+3+s ADV VER:part+past+m+s ADJ:pos+m+s PON:sep PRO-DEMO-M-S VER:ind+pres+3+s ADV PRO-PERS-1-M-P VER:inf+pres ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630073158_578() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "With all due respect, sir, a good cop...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE DET ADJ:pos+m+s NOUN-m:s PON:sep NOUN-m:s PON:sep PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073160_4775() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "is supposed to serve and protect.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PPAST:part+past+m+s PRE VER:inf+pres CON VER:inf+pres SENT");
}

public function testPosTagging1630073162_8763() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Help the city.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630073164_5181() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Not tear it apart.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg VER:inf+pres PRO-PERS-3-M-S ADV SENT");
}

public function testPosTagging1630073167_8545() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I don't deserve this badge.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630073168_8342() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hopps...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT");
}

public function testPosTagging1630073171_5394() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Judy, you've worked so hard to get here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep PRO-PERS-2-M-S AUX:inf+pres VER:part+past+m+s ADV ADJ:pos+m+s PRE VER:inf+pres ADV:plc SENT");
}

public function testPosTagging1630073174_3457() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's what you wanted since you were a kid.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s PRO-PERS-2-M-S PPAST:part+past+m+s ADV PRO-PERS-2-M-S VER:ind+past+3+p PRE NOUN-m:s SENT");
}

public function testPosTagging1630073176_6924() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You can't quit.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630073179_2314() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you for the opportunity.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630073181_9159() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A dozen carrots.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630073184_7983() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thanks. Have a nice day.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT INT:leave SENT");
}

public function testPosTagging1630073185_7037() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630073188_5762() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey, there, Jude. Jude the dude.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep ADV PON:sep NPR SENT NPR ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630073191_8302() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Remember that one? How we doing?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-DEMO-M-S NUM SENT:qst ADV PRO-PERS-1-M-P VER:ger+pres SENT:qst");
}

public function testPosTagging1630073193_3687() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm fine.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630073196_9918() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You are not fine. Your ears are droopy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADV:neg ADJ:pos+m+s SENT ADJ:pos+m+s NOUN-m:p VER:ind+pres+2+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630073199_2640() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Why did I think I could make a difference?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PPAST:part+past+m+s PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRE NOUN-m:s SENT:qst");
}

public function testPosTagging1630073203_8479() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Because you're a trier, that's why.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-2-M-S VER:ind+pres+2+s PRE NOUN-m:s PON:sep PRO-DEMO-M-S VER:ind+pres+3+s ADV SENT");
}

public function testPosTagging1630073206_586() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You've always been a trier.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres ADV VER:part+past+m+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630073209_7370() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, I tried.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s SENT");
}

public function testPosTagging1630073214_4598() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And it made life so much worse for so many innocent predators.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S PPAST:part+past+m+s NOUN-m:s ADV ADV:qty ADJ:pos+m+s PRE ADV ADV:qty ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630073220_422() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Not all of them, though. Speak of the devil.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg DET PRE PRO-PERS-3-M-P PON:sep CON:cond SENT VER:inf+pres PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630073226_3293() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Is that Gideon?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRO-DEMO-M-S NPR SENT:qst");
}

public function testPosTagging1630073229_4795() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yep. It sure is. We work with him now.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT PRO-PERS-3-M-S ADJ:pos+m+s VER:ind+pres+3+s SENT PRO-PERS-1-M-P VER:inf+pres PRE PRO-PERS-3-M-S ADV:tim SENT");
}

public function testPosTagging1630073231_4304() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He's our partner.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073236_1475() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And we would never have considered it had you not opened our minds.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-P PPAST:part+past+m+s ADV:tim AUX:inf+pres VER:part+past+m+s PRO-PERS-3-M-S PPAST:part+past+m+s PRO-PERS-2-M-S ADV:neg PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630073238_2348() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's right.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630073243_2612() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's really cool, you guys.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV ADJ:pos+m+s PON:sep PRO-PERS-2-M-S NOUN-m:p SENT");
}

public function testPosTagging1630073245_1112() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Gideon.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT");
}

public function testPosTagging1630073248_4590() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'll be darned.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres AUX:inf+pres VER:part+past+m+s SENT");
}

public function testPosTagging1630073255_948() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey, Judy. I'd just like to say I'm sorry for the way I behaved in my youth.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep NPR SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV ADV PRE VER:inf+pres INT:comp PRE ART-M:s NOUN-m:s PRO-PERS-1-M-S PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073260_3123() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I had a lot of self-doubt,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV:qty ADJ:pos+m+s PON:sep NOUN-m:s PON:sep SENT");
}

public function testPosTagging1630073265_2149() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and it manifested itself in the form of unchecked rage and aggression.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S PPAST:part+past+m+s PRO-PERS-3-M-S PRE ART-M:s NOUN-m:s PRE PPAST:part+past+m+s NOUN-m:s CON NOUN-m:s SENT");
}

public function testPosTagging1630073268_6085() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I was a major jerk.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:ind+past+1+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073271_9563() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I know a thing or two about being a jerk.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE NOUN-m:s CON:or NUM ADV VER:ger+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630073320_1710() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Anyhow, I brought y'all these pies.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S DET PRO-DEMO-M-P NOUN-m:p SENT");
}

public function testPosTagging1630073338_8505() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "My family always just called them Night Howlers.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s ADV ADV PPAST:part+past+m+s PRO-PERS-3-M-P NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630073340_5810() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What did you say?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s PRO-PERS-2-M-S VER:inf+pres SENT:qst");
}

public function testPosTagging1630073348_9607() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I use them to keep the bugs off the produce...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-P PRE VER:inf+pres ART-M:s NOUN-m:p ADV ART-M:s VER:inf+pres SENT");
}

public function testPosTagging1630073351_7087() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "but I don't like the little ones going near 'em...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres ART-M:s ADJ:pos+m+s NUM VER:ger+pres ADJ:pos+m+s PRO-PERS-3-M-P SENT");
}

public function testPosTagging1630073354_1930() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "on account of what happened to your uncle Terry.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s PRE NOUN-m:s PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s NPR SENT");
}

public function testPosTagging1630073359_703() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, Terry ate one whole when we were kids";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep NPR PPAST:part+past+m+s NUM ADJ:pos+m+s ADV:when PRO-PERS-1-M-P VER:ind+past+3+p NOUN-m:p SENT");
}

public function testPosTagging1630073361_6704() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and went completely nuts.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PPAST:part+past+m+s ADV ADJ:pos+m+s SENT");
}

public function testPosTagging1630073376_9907() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Savage? Well, that's a strong word. But it did hurt like the devil.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT:qst ADJ:pos+m+s PON:sep PRO-DEMO-M-S VER:ind+pres+3+s PRE ADJ:pos+m+s NOUN-m:s SENT CON PRO-PERS-3-M-S PPAST:part+past+m+s VER:inf+pres ADV ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630073389_694() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sure it did! There's a sizable divot in your arm. I'd call that savage.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PRO-PERS-3-M-S PPAST:part+past+m+s SENT:exclam ADV VER:ind+pres+3+s PRE ADJ:pos+m+s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s SENT PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630073392_3195() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Night Howlers aren't wolves, they're flowers!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:p VER:ind+pres+2+s ADV:neg NOUN-m:p PON:sep PRO-PERS-3-M-P VER:ind+pres+2+s NOUN-m:p SENT:exclam");
}

public function testPosTagging1630073400_8338() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's it! That's what I've been missing!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT:exclam PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s VER:ger+pres SENT:exclam");
}

public function testPosTagging1630073402_1639() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Keys!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT:exclam");
}

public function testPosTagging1630073406_6715() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you! I love you! Bye!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT:exclam PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S SENT:exclam INT:leav SENT:exclam");
}

public function testPosTagging1630073409_5790() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You catch any of that, Bon?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres DET PRE PRO-DEMO-M-S PON:sep INT:other SENT:qst");
}

public function testPosTagging1630073412_1246() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Not one bit.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg NUM NOUN-m:s SENT");
}

public function testPosTagging1630073423_7816() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Who is it?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630073425_9962() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I need to find Nick.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres NPR SENT");
}

public function testPosTagging1630073426_4392() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Please.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other SENT");
}

public function testPosTagging1630073428_7504() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nick?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:qst");
}

public function testPosTagging1630073429_2487() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nick!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam");
}

public function testPosTagging1630073431_9795() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, Nick.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NPR SENT");
}

public function testPosTagging1630073434_1495() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Night Howlers aren't wolves.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:p VER:ind+pres+2+s ADV:neg NOUN-m:p SENT");
}

public function testPosTagging1630073437_2896() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They're toxic flowers.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:ind+pres+2+s ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630073440_5996() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I think someone is targeting predators on purpose";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-INDEF-M-S VER:ind+pres+3+s VER:ger+pres NOUN-m:p PRE NOUN-m:s SENT");
}

public function testPosTagging1630073446_4490() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wow.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT");
}

public function testPosTagging1630073471_8970() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Isn't that interesting?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s ADV:neg PRO-DEMO-M-S ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630073481_6106() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I wouldn't forgive me either. I was ignorant...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres PRO-PERS-1-M-S CON SENT PRO-PERS-1-M-S VER:ind+past+1+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630073541_1628() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But predators shouldn't have to suffer for my mistakes.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON NOUN-m:p AUX:inf+pres ADV:neg VER:inf+pres PRE VER:inf+pres PRE ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630073543_3611() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I have to fix this.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres PRO-DEMO-M-S SENT");
}

public function testPosTagging1630073546_3073() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But I can't do it without you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S ADV:neg VER:inf+pres PRO-PERS-3-M-S ADV:qty PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630073549_4683() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And after we're done...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV PRO-PERS-1-M-P AUX:ind+pres+2+s VER:part+past+m+s SENT");
}

public function testPosTagging1630073589_5486() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Because I was a horrible friend...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:ind+past+1+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073592_7763() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and I hurt you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630073602_9319() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I really am just a dumb bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV VER:inf+pres ADV PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073630_1487() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Don't worry, Carrots. I'll let you erase it...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres PON:sep NOUN-m:p SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630073632_8055() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "in 48 hours.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NUM NOUN-m:p SENT");
}

public function testPosTagging1630073634_8159() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All right. Get in here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT VER:inf+pres PRE ADV:plc SENT");
}

public function testPosTagging1630073639_4627() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay. You bunnies are so emotional.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT PRO-PERS-2-M-S NOUN-m:p VER:ind+pres+2+s ADV ADJ:pos+m+s SENT");
}

public function testPosTagging1630073643_3279() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There we go. Deep breath.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-1-M-P VER:inf+pres SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073647_7686() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are you just trying to steal the pen? Is that what this is?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-2-M-S ADV VER:ger+pres PRE VER:inf+pres ART-M:s NOUN-m:s SENT:qst VER:ind+pres+3+s PRO-DEMO-M-S NOUN-m:s PRO-DEMO-M-S VER:ind+pres+3+s SENT:qst");
}

public function testPosTagging1630073651_7177() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You are standing on my tail, though. Off, off, off.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres PRE ADJ:pos+m+s NOUN-m:s PON:sep CON:cond SENT ADV PON:sep ADV PON:sep ADV SENT");
}

public function testPosTagging1630073654_5795() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm sorry.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp SENT");
}

public function testPosTagging1630073659_9425() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I thought you guys only grew carrots.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S NOUN-m:p ADV PPAST:part+past+m+s NOUN-m:p SENT");
}

public function testPosTagging1630073662_994() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's the plan?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ART-M:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630073664_719() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We are gonna follow the Night Howlers.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P AUX:ind+pres+2+s AUX:ger+pres VER:inf+pres ART-M:s NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630073667_750() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay. How?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT ADV SENT:qst");
}

public function testPosTagging1630073669_9178() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Know this guy?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-DEMO-M-S NOUN-m:s SENT:qst");
}

public function testPosTagging1630073672_7503() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I told you. I know everybody.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S SENT PRO-PERS-1-M-S VER:inf+pres PRO-INDEF-M-S SENT");
}

public function testPosTagging1630073677_2732() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Step right up. Anything you need, I got it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADV SENT NOUN-m:s PRO-PERS-2-M-S VER:inf+pres PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630073679_8754() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All your favorite movies!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p SENT:exclam");
}

public function testPosTagging1630073688_7871() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey, 15% off! 20! Make me an offer! Come on!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep NUM ADV SENT:exclam NUM SENT:exclam VER:inf+pres PRO-PERS-1-M-S NUM NOUN-m:s SENT:exclam INT:conf SENT:exclam");
}

public function testPosTagging1630073742_5794() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, well, look who it is. The duke of bootleg.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other VER:inf+pres PRO-WH-M-S PRO-PERS-3-M-S VER:ind+pres+3+s SENT ART-M:s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630073744_5150() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's it to you, Wilde?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-PERS-3-M-S PRE PRO-PERS-2-M-S PON:sep NPR SENT:qst");
}

public function testPosTagging1630073756_8670() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey, if it ain't Flopsy the Copsy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter PON:sep CON:cond PRO-PERS-3-M-S VER:ind+pres+3+s ADV:neg ADJ:pos+m+s ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630073761_3818() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We both know those weren't moldy onions I caught you stealing.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P PRO-INDEF-M-P VER:inf+pres DET ADV ADV:neg ADJ:pos+m+s NOUN-m:p PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S VER:ger+pres SENT");
}

public function testPosTagging1630073766_1539() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What were you gonna do with those Night Howlers, Wezzleton?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+past+3+p PRO-PERS-2-M-S AUX:ger+pres VER:inf+pres PRE DET NOUN-m:s NOUN-m:p PON:sep NPR SENT:qst");
}

public function testPosTagging1630073791_1985() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's Weaselton! Duke Weaselton!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s NPR SENT:exclam NOUN-m:s NPR SENT:exclam");
}

public function testPosTagging1630073794_2197() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I ain't talking, rabbit.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:ind+pres+3+s ADV:neg VER:ger+pres PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630073797_813() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And there ain't nothing you can do to make me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV VER:ind+pres+3+s ADV:neg ADV PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres PRE VER:inf+pres PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630073799_394() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ice him.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630073826_480() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And the godmother to my future granddaughter.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ART-M:s NOUN-m:s PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630073829_5550() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm gonna name her Judy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres AUX:ger+pres VER:inf+pres PRO-PERS-3-F-S NPR SENT");
}

public function testPosTagging1630073831_8447() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ice this weasel.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630073835_7293() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All right, all right, please! I'll talk! I'll talk.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PON:sep INT:other SENT:exclam PRO-PERS-1-M-S VER:inf+pres VER:inf+pres SENT:exclam PRO-PERS-1-M-S VER:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1630073845_141() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They offered me what I couldn't refuse.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:inf+pres PRO-PERS-1-M-S NOUN-m:s PRO-PERS-1-M-S PPAST:part+past+m+s ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630073846_1939() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Money.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
}

public function testPosTagging1630073849_6972() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And to whom did you sell them?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRE PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-P SENT:qst");
}

public function testPosTagging1630073863_2046() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A ram named Doug. We got a drop spot underground.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s PPAST:part+past+m+s NPR SENT PRO-PERS-1-M-P PPAST:part+past+m+s PRE NOUN-m:s NOUN-m:s ADJ:pos+m+s SENT");
}

public function testPosTagging1630073894_3650() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Just watch it. Doug is the opposite of friendly,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:inf+pres PRO-PERS-3-M-S SENT NPR VER:ind+pres+3+s ART-M:s ADJ:pos+m+s PRE ADJ:pos+m+s PON:sep SENT");
}

public function testPosTagging1630073896_1579() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He's unfriendly,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s PON:sep SENT");
}

public function testPosTagging1630073898_8988() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630073902_2786() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The weasel wasn't lying.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s AUX:ind+past+1+s ADV:neg VER:ger+pres SENT");
}

public function testPosTagging1630073940_8117() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, looks like old Doug's cornered the market on Night Howlers.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep VER:ind+pres+3+s ADV ADJ:pos+m+s NPR AUX:ind+pres+3+s VER:part+past+m+s ART-M:s NOUN-m:s PRE NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630073942_4620() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You got Doug here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s NPR ADV:plc SENT");
}

public function testPosTagging1630073944_1876() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's the mark?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ART-M:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630073950_2859() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Serious? Yeah, I know they're fast.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT:qst INT:conf PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-P VER:ind+pres+2+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630073953_5339() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I can hit him.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630073999_4108() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Listen, I hit a tiny little otter through the open window of a moving car.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep PRO-PERS-1-M-S VER:inf+pres PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s ADV ART-M:s ADJ:pos+m+s NOUN-m:s PRE PRE VER:ger+pres NOUN-m:s SENT");
}

public function testPosTagging1630074003_1852() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, I'll buzz you when it's done.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-2-M-S ADV:when PRO-PERS-3-M-S VER:ind+pres+3+s PPAST:part+past+m+s SENT");
}

public function testPosTagging1630074008_8161() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Or you'll see it on the news. You know, whichever comes first.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:or PRO-PERS-2-M-S VER:inf+pres VER:inf+pres PRO-PERS-3-M-S PRE ART-M:s NOUN-m:s SENT PRO-PERS-2-M-S VER:inf+pres PON:sep ADV VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630074051_9447() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Woolter and Jesse are back, so I'm leaving now.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s CON NPR VER:ind+pres+2+s ADJ:pos+m+s PON:sep ADV PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres ADV:tim SENT");
}

public function testPosTagging1630074052_6929() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Out.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT");
}

public function testPosTagging1630074054_1005() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Where are you going? Get back here!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres SENT:qst VER:inf+pres ADJ:pos+m+s ADV:plc SENT:exclam");
}

public function testPosTagging1630074057_6286() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What are you doing? He's gonna see you!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres SENT:qst PRO-PERS-3-M-S VER:ind+pres+3+s AUX:ger+pres VER:inf+pres PRO-PERS-2-M-S SENT:exclam");
}

public function testPosTagging1630074061_9888() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What are you looking at? Hey!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres PRE SENT:qst INT:enter SENT:exclam");
}

public function testPosTagging1630074065_6932() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Carrots!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT:exclam");
}

public function testPosTagging1630074069_8027() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It better have the extra foam this time.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S ADJ:pos+m+s VER:inf+pres ART-M:s ADJ:pos+m+s NOUN-m:s PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630074074_7261() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What are you doing? You just trapped us in here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres SENT:qst PRO-PERS-2-M-S ADV PPAST:part+past+m+s PRO-PERS-1-M-P PRE ADV:plc SENT");
}

public function testPosTagging1630074086_9233() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We need to get this evidence to the ZPD!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres PRE VER:inf+pres PRO-DEMO-M-S NOUN-m:s PRE ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630074091_7993() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Great! Here it is. Got it!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT:exclam ADV:plc PRO-PERS-3-M-S VER:ind+pres+3+s SENT PPAST:part+past+m+s PRO-PERS-3-M-S SENT:exclam");
}

public function testPosTagging1630074095_205() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No. All of it! Wait, what?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT DET PRE PRO-PERS-3-M-S SENT:exclam VER:inf+pres PON:sep NOUN-m:s SENT:qst");
}

public function testPosTagging1630074098_3975() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Great, you're a conductor now?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep PRO-PERS-2-M-S VER:ind+pres+2+s PRE NOUN-m:s ADV:tim SENT:qst");
}

public function testPosTagging1630074122_265() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well. Hallelujah.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT NOUN-m:s SENT");
}

public function testPosTagging1630074126_23() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We kinda got a situation at the lab.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P ADV PPAST:part+past+m+s PRE NOUN-m:s PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630074128_9918() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It just got worse!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S ADV PPAST:part+past+m+s ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630074130_6343() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mission accomplished.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s SENT");
}

public function testPosTagging1630074167_6524() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, I can cross that off the bucket list.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRO-DEMO-M-S ADV ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630074185_5689() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come here!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADV:plc SENT:exclam");
}

public function testPosTagging1630074186_85() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Back off!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADV SENT:exclam");
}

public function testPosTagging1630074206_1775() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Carrots!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT:exclam");
}

public function testPosTagging1630074209_8834() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Don't stop! Keep going!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres SENT:exclam VER:inf+pres VER:ger+pres SENT:exclam");
}

public function testPosTagging1630074213_3298() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Do not stop this car!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres PRO-DEMO-M-S NOUN-m:s SENT:exclam");
}

public function testPosTagging1630074219_2207() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Speed up, Nick! Speed up!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADV PON:sep NPR SENT:exclam NOUN-m:s ADV SENT:exclam");
}

public function testPosTagging1630074225_8994() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Trust me. Speed up!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S SENT NOUN-m:s ADV SENT:exclam");
}

public function testPosTagging1630074227_652() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Stop the train!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630074228_7757() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hey!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:enter SENT:exclam");
}

public function testPosTagging1630074233_9836() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, no, no, no! Too fast!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV:neg PON:sep ADV:neg PON:sep ADV:neg SENT:exclam ADV ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630074235_1038() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hold on!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE SENT:exclam");
}

public function testPosTagging1630074237_6477() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I think this is our stop!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630074239_4936() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Maybe some of the evidence survived.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV DET PRE ART-M:s NOUN-m:s PPAST:part+past+m+s SENT");
}

public function testPosTagging1630074241_7122() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Everything is gone.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S VER:ind+pres+3+s PPAST:part+past+m+s SENT");
}

public function testPosTagging1630074243_2004() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We've lost it all.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P AUX:inf+pres VER:part+past+m+s PRO-PERS-3-M-S DET SENT");
}

public function testPosTagging1630074246_8866() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT");
}

public function testPosTagging1630074251_1904() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "except for this.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE PRO-DEMO-M-S SENT");
}

public function testPosTagging1630074254_9625() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nick! Yes!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam INT:conf SENT:exclam");
}

public function testPosTagging1630074258_9024() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on! We gotta get to the ZPD.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:exclam PRO-PERS-1-M-P AUX:inf+pres VER:inf+pres PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630074261_1403() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Cut through the Natural History Museum!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADV ART-M:s ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630074263_1062() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There it is!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-3-M-S VER:ind+pres+3+s SENT:exclam");
}

public function testPosTagging1630074265_8610() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Judy!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam");
}

public function testPosTagging1630074267_4679() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mayor Bellwether!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NPR SENT:exclam");
}

public function testPosTagging1630074280_2145() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm so proud of you, Judy. You did just a super job!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV ADJ:pos+m+s PRE PRO-PERS-2-M-S PON:sep NPR SENT PRO-PERS-2-M-S PPAST:part+past+m+s ADV PRE ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630074282_4100() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you, ma'am.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630074286_6628() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "How did you know where to find us?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PPAST:part+past+m+s PRO-PERS-2-M-S VER:inf+pres ADV PRE VER:inf+pres PRO-PERS-1-M-P SENT:qst");
}

public function testPosTagging1630074289_345() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'll go ahead and I'll take that case now.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres ADV CON PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-DEMO-M-S NOUN-m:s ADV:tim SENT");
}

public function testPosTagging1630074293_5447() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You know what? I think Nick and I will just take this to the ZPD.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres NOUN-m:s SENT:qst PRO-PERS-1-M-S VER:inf+pres NPR CON PRO-PERS-1-M-S VER:inf+pres ADV VER:inf+pres PRO-DEMO-M-S PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630074295_660() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Run.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres SENT");
}

public function testPosTagging1630074297_5019() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Get them.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-P SENT");
}

public function testPosTagging1630074299_933() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Carrots!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT:exclam");
}

public function testPosTagging1630074302_3512() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I got you! Come here, come here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S SENT:exclam VER:inf+pres ADV:plc PON:sep VER:inf+pres ADV:plc SENT");
}

public function testPosTagging1630074306_625() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Okay, now just relax.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep ADV:tim ADV VER:inf+pres SENT");
}

public function testPosTagging1630074308_9236() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Blueberry?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:qst");
}

public function testPosTagging1630074325_5145() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on out, Judy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf ADV PON:sep NPR SENT");
}

public function testPosTagging1630074326_883() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Take the case.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630074329_3809() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Get it to Bogo.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-S PRE NPR SENT");
}

public function testPosTagging1630074332_2095() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm not gonna leave you behind. That's not happening.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg AUX:ger+pres VER:inf+pres PRO-PERS-2-M-S NOUN-m:s SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV:neg VER:ger+pres SENT");
}

public function testPosTagging1630074335_5543() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I can't walk.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV:neg VER:inf+pres SENT");
}

public function testPosTagging1630074338_9157() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We'll think of something.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630074341_2526() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We're on the same team, Judy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:ind+pres+2+s PRE ART-M:s DET NOUN-m:s PON:sep NPR SENT");
}

public function testPosTagging1630074343_7079() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Underestimated, underappreciated.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PON:sep PPAST:part+past+m+s SENT");
}

public function testPosTagging1630074346_5101() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Aren't you sick of it?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s ADV:neg PRO-PERS-2-M-S ADJ:pos+m+s PRE PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630074349_2379() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Predators. They may be strong and loud...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT PRO-PERS-3-M-P VER:cond+pres+3+s VER:inf+pres ADJ:pos+m+s CON ADJ:pos+m+s SENT");
}

public function testPosTagging1630074408_7755() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "but prey outnumber predators 10 to 1.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON NOUN-m:s VER:inf+pres NOUN-m:p NUM PRE NUM SENT");
}

public function testPosTagging1630074409_7637() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Think of it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630074411_9297() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "90% of the population...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630074413_3616() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "united against a common enemy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s ADV:mod PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630074415_3187() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We'll be unstoppable.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630074417_919() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Over there!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV SENT:exclam");
}

public function testPosTagging1630074424_8936() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, you should have just stayed on the carrot farm, huh?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-2-M-S AUX:inf+pres AUX:inf+pres ADV VER:part+past+m+s PRE ART-M:s NOUN-m:s NOUN-m:s PON:sep INT:doubt SENT:qst");
}

public function testPosTagging1630074429_5632() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It really is too bad. I did like you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S ADV VER:ind+pres+3+s ADV ADJ:pos+m+s SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630074432_148() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What are you going to do? Kill me?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres PRE VER:inf+pres SENT:qst VER:inf+pres PRO-PERS-1-M-S SENT:qst");
}

public function testPosTagging1630074435_6837() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, of course not.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep INT:conf ADV:neg SENT");
}

public function testPosTagging1630074437_6753() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He is.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
}

public function testPosTagging1630074440_213() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No! Nick!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT:exclam NPR SENT:exclam");
}

public function testPosTagging1630074458_1875() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But he can't help it, can he?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-3-M-S ADV:neg VER:inf+pres PRO-PERS-3-M-S PON:sep VER:inf+pres PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630074470_4851() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Gosh. Think of the headline!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT VER:inf+pres PRE ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630074473_3393() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "\"Hero cop killed by savage fox.\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:quote NOUN-m:s NOUN-m:s PPAST:part+past+m+s ADV ADJ:pos+m+s NOUN-m:s SENT PON:quote SENT");
}

public function testPosTagging1630074479_9893() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So that's it? Prey fears predator, and you stay in power?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-DEMO-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT:qst NOUN-m:s VER:ind+pres+3+s NOUN-m:s PON:sep CON PRO-PERS-2-M-S VER:inf+pres PRE NOUN-m:s SENT:qst");
}

public function testPosTagging1630074481_2988() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, pretty much.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep ADJ:pos+m+s ADV:qty SENT");
}

public function testPosTagging1630074486_5165() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It won't work!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S AUX:inf+pres ADV:neg VER:inf+pres SENT:exclam");
}

public function testPosTagging1630074489_7337() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Fear always works.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADV VER:ind+pres+3+s SENT");
}

public function testPosTagging1630074493_1193() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I'll dart every predator in Zootopia to keep it that way.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres VER:inf+pres ADJ:pos+m+s NOUN-m:s PRE NPR PRE VER:inf+pres PRO-PERS-3-M-S PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630074495_1148() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, Nick.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NPR SENT");
}

public function testPosTagging1630074497_9724() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT");
}

public function testPosTagging1630074500_4867() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bye-bye, bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:leav PON:sep INT:leav PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630074503_6215() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Blood! Blood! Blood and death.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT:exclam NOUN-m:s SENT:exclam NOUN-m:s CON NOUN-m:s SENT");
}

public function testPosTagging1630074506_7960() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All right, you're milking it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-2-M-S AUX:ind+pres+2+s VER:ger+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630074508_7027() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Besides, I think we got it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-P PPAST:part+past+m+s PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630074515_8755() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We got it up there, thank you, Yakety-yak!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P PPAST:part+past+m+s PRO-PERS-3-M-S ADV ADV PON:sep INT:jubi PON:sep NPR PON:sep NOUN-m:s SENT:exclam");
}

public function testPosTagging1630074519_8691() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You laid it all out beautifully.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S PPAST:part+past+m+s PRO-PERS-3-M-S DET ADV ADV SENT");
}

public function testPosTagging1630074521_1354() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:qst SENT:qst");
}

public function testPosTagging1630074524_7989() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Are you looking for the serum?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres PRE ART-M:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630074527_5653() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, it's right here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other PRO-PERS-3-M-S VER:ind+pres+3+s ADV:plc SENT");
}

public function testPosTagging1630074530_1128() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What you've got in the weapon there?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRO-PERS-2-M-S AUX:inf+pres VER:part+past+m+s PRE ART-M:s NOUN-m:s ADV SENT:qst");
}

public function testPosTagging1630074533_7814() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Those are blueberries. From my family's farm.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET VER:ind+pres+2+s NOUN-m:p SENT PRE ADJ:pos+m+s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630074536_7862() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They are delicious. You should try some.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P VER:ind+pres+2+s ADJ:pos+m+s SENT PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres DET SENT");
}

public function testPosTagging1630074541_9232() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I framed Lionheart. I can frame you, too.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s NOUN-m:s SENT PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRO-PERS-2-M-S PON:sep ADV SENT");
}

public function testPosTagging1630074544_1978() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's my word against yours.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s ADV:mod ADJ:pos+m+p SENT");
}

public function testPosTagging1630074546_6092() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Actually...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV SENT");
}

public function testPosTagging1630074551_9771() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I'll dart every predator in Zootopia to keep it that way,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres VER:inf+pres ADJ:pos+m+s NOUN-m:s PRE NPR PRE VER:inf+pres PRO-PERS-3-M-S PRO-DEMO-M-S NOUN-m:s PON:sep SENT");
}

public function testPosTagging1630074554_1861() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "it's your word against yours.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s ADV:mod ADJ:pos+m+p SENT");
}

public function testPosTagging1630074557_976() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's called a hustle, sweetheart. Boom.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PPAST:part+past+m+s PRE NOUN-m:s PON:sep NOUN-m:s SENT NOUN-m:s SENT");
}

public function testPosTagging1630074567_6510() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "guilty of masterminding the savage attacks";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PRE VER:ger+pres ART-M:s NOUN-m:s VER:ind+pres+3+s SENT");
}

public function testPosTagging1630074575_3760() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Her predecessor, Leodore Lionheart, denies any knowledge of her plot...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-F-S NOUN-m:s PON:sep NPR NOUN-m:s PON:sep VER:ind+pres+3+s DET NOUN-m:s PRE PRO-PERS-3-F-S NOUN-m:s SENT");
}

public function testPosTagging1630074600_4025() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Did I falsely imprison those animals?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRO-PERS-1-M-S ADV VER:inf+pres DET NOUN-m:p SENT:qst");
}

public function testPosTagging1630074603_6114() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Well, yes. Yes, I did.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "INT:other INT:conf SENT INT:conf PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s SENT");
}

public function testPosTagging1630074614_760() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In related news, doctors say the Night Howler antidote";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PPAST:part+past+m+s NOUN-m:s PON:sep NOUN-m:p VER:inf+pres ART-M:s NOUN-m:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630074617_754() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "is proving effective...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s VER:ger+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630074619_2547() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "in rehabilitating the afflicted predators.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE VER:ger+pres ART-M:s PPAST:part+past+m+s NOUN-m:p SENT");
}

public function testPosTagging1630074637_6439() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT");
}

public function testPosTagging1630074639_1646() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "When I was a kid...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:when PRO-PERS-1-M-S VER:ind+past+1+s PRE NOUN-m:s SENT");
}

public function testPosTagging1630074641_584() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I thought Zootopia was this perfect place.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s NPR VER:ind+past+1+s PRO-DEMO-M-S ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630074644_4545() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Where everyone got along and anyone could be anything.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-INDEF-M-S PPAST:part+past+m+s ADV CON PRO-WH-M-S PPAST:part+past+m+s VER:inf+pres NOUN-m:s SENT");
}

public function testPosTagging1630074651_7354() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "than a slogan on a bumper sticker.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRE NOUN-m:s PRE PRE NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630074653_5111() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Real life is messy";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630074656_8459() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We all have limitations. We all make mistakes.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P DET VER:inf+pres NOUN-m:p SENT PRO-PERS-1-M-P DET VER:inf+pres NOUN-m:p SENT");
}

public function testPosTagging1630074666_601() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Which means, hey, glass half-full, we all have a lot in common.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S VER:ind+pres+3+s PON:sep INT:enter PON:sep NOUN-m:s ADJ:pos+m+s PON:sep ADJ:pos+m+s PON:sep PRO-PERS-1-M-P DET VER:inf+pres PRE NOUN-m:s PRE ADJ:pos+m+s SENT");
}

public function testPosTagging1630074669_7995() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And the more we try to understand one another...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ART-M:s ADV PRO-PERS-1-M-P VER:inf+pres PRE VER:inf+pres NUM ADJ:pos+m+s SENT");
}

public function testPosTagging1630074673_8706() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "the more exceptional each of us will be.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADV ADJ:pos+m+s ADJ:pos+m+s PRE PRO-PERS-1-M-P VER:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1630074676_213() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But we have to try";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-P VER:inf+pres PRE VER:inf+pres SENT");
}

public function testPosTagging1630074680_5276() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So, no matter what type of animal you are...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep ADV:neg VER:inf+pres NOUN-m:s NOUN-m:s PRE NOUN-m:s PRO-PERS-2-M-S VER:ind+pres+2+s SENT");
}

public function testPosTagging1630074683_9236() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "from the biggest elephant...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ART-M:s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630074685_7471() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "to our first fox...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630074697_4163() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Look inside yourself...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADV PRO-PERS-2-M-S SENT");
}

public function testPosTagging1630074699_7630() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and recognize that change...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON VER:inf+pres PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630074704_3590() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It starts with me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630074706_6828() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It starts with all of us.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE DET PRE PRO-PERS-1-M-P SENT");
}

public function testPosTagging1630074709_210() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "All right, enough! Shut it!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep ADV:qty SENT:exclam VER:inf+pres PRO-PERS-3-M-S SENT:exclam");
}

public function testPosTagging1630074712_30() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We have some new recruits with us this morning...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres DET ADJ:pos+m+s NOUN-m:p PRE PRO-PERS-1-M-P PRO-DEMO-M-S NOUN-m:s SENT");
}

public function testPosTagging1630074715_2177() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "including our first fox.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630074721_5804() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Who cares?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S VER:ind+pres+3+s SENT:qst");
}

public function testPosTagging1630074752_4102() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You should have your own line of inspirational greeting cards, sir.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s NOUN-m:p PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630074756_2843() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Assignments.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT");
}

public function testPosTagging1630074758_2975() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Officers Grizzoli, Fangmeyer, Delgato...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p NPR PON:sep NPR PON:sep NPR SENT");
}

public function testPosTagging1630074763_6524() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "undercover.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s SENT");
}

public function testPosTagging1630074765_4494() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hopps, Wilde.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep NPR SENT");
}

public function testPosTagging1630074768_4986() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Parking duty.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630074771_2113() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Dismissed.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s SENT");
}

public function testPosTagging1630074773_6207() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Just kidding!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ger+pres SENT:exclam");
}

public function testPosTagging1630074795_4742() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So, are all rabbits bad drivers, or is it just you?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep VER:ind+pres+2+s DET NOUN-m:p ADJ:pos+m+s NOUN-m:p PON:sep CON:or VER:ind+pres+3+s PRO-PERS-3-M-S ADV PRO-PERS-2-M-S SENT:qst");
}

public function testPosTagging1630074803_8180() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oops. Sorry.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:comp SENT ADJ:pos+m+s SENT");
}

public function testPosTagging1630074806_4563() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sly bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630074809_3810() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Dumb fox.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630074811_4443() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You know you love me.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630074813_1203() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Do I know that?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRO-DEMO-M-S SENT:qst");
}

public function testPosTagging1630074815_4631() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes. Yes, I do.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT INT:conf PON:sep PRO-PERS-1-M-S VER:inf+pres SENT");
}

public function testPosTagging1630074821_3966() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir, you were going 115 miles per hour. I hope you have a good explanation.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-2-M-S AUX:ind+past+3+p VER:ger+pres NUM NOUN-m:p PRE NOUN-m:s SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630074866_2217() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Good evening, Zootopia!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:entleav PON:sep NPR SENT:exclam");
}

public function testPosTagging1630074871_4952() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on, everybody, put your paws up!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-INDEF-M-S PON:sep VER:inf+pres ADJ:pos+m+s NOUN-m:p ADV SENT:exclam");
}

public function testPosTagging1630074874_6510() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I messed up tonight I lost another fight";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV ADV PRO-PERS-1-M-S PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630074877_5125() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Lost to myself But I'll just start again";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRE PRO-PERS-1-M-S CON PRO-PERS-1-M-S VER:inf+pres ADV VER:inf+pres ADV SENT");
}

public function testPosTagging1630074880_851() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I keep falling down";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:ger+pres ADV:plc SENT");
}

public function testPosTagging1630074882_6873() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I keep on hitting the ground";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE VER:ger+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630074885_1760() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But I always get up now To see what's next";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S ADV VER:inf+pres ADV:tim PRE VER:inf+pres NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630074891_3719() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I won't give up No, I won't give in";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres ADV ADV:neg PON:sep PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres PRE SENT");
}

public function testPosTagging1630074899_5483() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No, I won't leave I want to try everything";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PON:sep PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres PRO-INDEF-M-S SENT");
}

public function testPosTagging1630074938_2584() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Try everything";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-INDEF-M-S SENT");
}

public function testPosTagging1630074942_5147() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Put your paws in the air. Come on!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADJ:pos+m+s NOUN-m:p PRE ART-M:s NOUN-m:s SENT INT:conf SENT:exclam");
}

public function testPosTagging1630074947_6670() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Look how far you've come You filled your heart with love";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADV ADJ:pos+m+s PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres PRO-PERS-2-M-S PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630074956_483() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Don't beat yourself up No need to run so fast";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres ADV:neg VER:inf+pres PRO-PERS-2-M-S ADV ADV:neg VER:inf+pres PRE VER:inf+pres ADV ADJ:pos+m+s SENT");
}

public function testPosTagging1630074959_9739() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sometimes we come last But we did our best";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-1-M-P VER:inf+pres ADJ:pos+m+s CON PRO-PERS-1-M-P PPAST:part+past+m+s ADJ:pos+m+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630074962_9322() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I want to try";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres SENT");
}

public function testPosTagging1630074967_3426() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'll keep on making those new mistakes";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRE VER:ger+pres DET ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630074970_2577() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I'll keep on making them every day";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRE VER:ger+pres PRO-PERS-3-M-P ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630074972_4595() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Those new mistakes";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT DET ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630074973_8205() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come on!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT:exclam");
}

public function testPosTagging1630333215_6378() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "impossible even, for you to become a police officer.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADV:tim PON:sep PRE PRO-PERS-2-M-S PRE VER:inf+pres PRE NOUN-m:s NOUN-m:s SENT");
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

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s VER:ger+pres NOUN-m:p PRE PPAST:part+past+m+s NOUN-m:p SENT:exclam");
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

public function testPosTagging1630334280_8831() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, Stu, pull it together.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep NPR PON:sep VER:inf+pres PRO-PERS-3-M-S ADV SENT");
}

public function testPosTagging1630337310_2922() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What happened, meter maid? Did someone steal a traffic cone?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PPAST:part+past+m+s PON:sep NOUN-m:s NOUN-m:s SENT:qst PPAST:part+past+m+s PRO-INDEF-M-S VER:inf+pres PRE NOUN-m:s NOUN-m:s SENT:qst");
}

public function testPosTagging1630500694_3260() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What your father means, hon...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630502846_8267() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You get it, honey. It's great to have dreams.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-S PON:sep ADJ:pos+m+s SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s PRE VER:inf+pres NOUN-m:p SENT");
}

public function testPosTagging1630505110_3329() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Finally, we have 14 missing mammal cases.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep PRO-PERS-1-M-P VER:inf+pres NUM VER:ger+pres ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630505124_3317() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sir, you said there were 14 missing mammal cases.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep PRO-PERS-2-M-S PPAST:part+past+m+s ADV VER:ind+past+3+p NUM VER:ger+pres ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630571199_156() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're gonna want to refrain from calling me Carrots.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:ind+pres+2+s AUX:ger+pres VER:inf+pres PRE VER:inf+pres PRE VER:ger+pres PRO-PERS-1-M-S NOUN-m:p SENT");
}

public function testPosTagging1630571308_5641() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Podunk is in Deerbrooke County, and I grew up in Bunnyburrow.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR VER:ind+pres+3+s PRE NOUN-m:s NOUN-m:s PON:sep CON PRO-PERS-1-M-S PPAST:part+past+m+s ADV PRE NOUN-m:s SENT");
}

public function testPosTagging1630571379_4154() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "decides, \"Hey, look at me! I'm gonna move to Zootopia...";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PON:sep INT:enter PON:sep VER:inf+pres PRE PRO-PERS-1-M-S SENT:exclam PRO-PERS-1-M-S AUX:inf+pres AUX:ger+pres VER:inf+pres PRE NPR SENT");
}

public function testPosTagging1630571474_7495() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sly fox, dumb bunny.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630571534_8072() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hang in there.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE ADV SENT");
}

public function testPosTagging1630571861_7673() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I feel like I'm making a difference. Wait a second.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV PRO-PERS-1-M-S AUX:inf+pres VER:ger+pres PRE NOUN-m:s SENT VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630572885_2624() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "no one cares about her or her dreams.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg NUM VER:ind+pres+3+s ADV PRO-PERS-3-F-S CON:or PRO-PERS-3-F-S NOUN-m:p SENT");
}

public function testPosTagging1630573083_1523() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Holy cripes, Bonnie, look at that.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:p PON:sep NPR PON:sep VER:inf+pres PRE PRO-DEMO-M-S SENT");
}

public function testPosTagging1630573127_8501() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, but it might be worse!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep CON PRO-PERS-3-M-S VER:cond+pres+3+s VER:inf+pres ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630831807_3399() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And we both walked him out, and he got into this big old white car";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-P PRO-INDEF-M-P PPAST:part+past+m+s PRO-PERS-3-M-S ADV PON:sep CON PRO-PERS-3-M-S PPAST:part+past+m+s ADV PRO-DEMO-M-S ADJ:pos+m+s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630857491_6454() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Today, I can hunt for tax exemptions.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRE NOUN-m:s NOUN-m:p SENT");
}

public function testPosTagging1630857768_9510() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And also bears. We have bears to fear, too.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV:qty NOUN-m:p SENT PRO-PERS-1-M-P VER:inf+pres NOUN-m:p PRE VER:inf+pres PON:sep ADV SENT");
}

public function testPosTagging1630858614_7975() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nobody learns without getting it wrong";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S VER:ind+pres+3+s ADV:qty VER:ger+pres PRO-PERS-3-M-S ADJ:pos+m+s SENT");
}

// next test **

}
