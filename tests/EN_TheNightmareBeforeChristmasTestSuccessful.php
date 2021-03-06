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

class ENTheNightmareBeforeChristmasTestSuccessful extends TestCase
{

public function testPosTagging1630574164_7446() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Was a long time ago Longer now than it seems";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+past+1+s PRE ADJ:pos+m+s NOUN-m:s ADV:tim ADJ:pos+m+s ADV:tim CON PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
}

public function testPosTagging1630574196_4269() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In a place that perhaps you've seen in your dreams";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRE NOUN-m:s PRO-DEMO-M-S ADV PRO-PERS-2-M-S AUX:inf+pres VER:part+past+m+s PRE ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630574203_5429() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "For the story that you are about to be told";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ART-M:s NOUN-m:s PRO-DEMO-M-S PRO-PERS-2-M-S VER:ind+pres+2+s ADV PRE AUX:inf+pres VER:part+past+m+s SENT");
}

public function testPosTagging1630574276_8853() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Took place in the holiday worlds of old";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s NOUN-m:s PRE ART-M:s NOUN-m:s NOUN-m:p PRE NOUN-m:s SENT");
}

public function testPosTagging1630574282_4552() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Now, you've probably wondered where holidays come from";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:tim PON:sep PRO-PERS-2-M-S AUX:inf+pres ADV VER:part+past+m+s ADV NOUN-m:p VER:inf+pres PRE SENT");
}

public function testPosTagging1630574329_364() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "If you haven't, I'd say It's time you begun!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRO-PERS-2-M-S VER:inf+pres ADV:neg PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s PRO-PERS-2-M-S PPAST:part+past+m+s SENT:exclam");
}

public function testPosTagging1630574332_1333() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Boys and girls of every age";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p CON NOUN-m:p PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630574337_1773() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wouldn't you like to see something strange?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s ADV:neg PRO-PERS-2-M-S VER:inf+pres PRE VER:inf+pres NOUN-m:s ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630574340_1292() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come with us and you will see";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRE PRO-PERS-1-M-P CON PRO-PERS-2-M-S VER:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1630574354_4033() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is Halloween This is Halloween";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s SENT");
}

public function testPosTagging1630574382_1758() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Pumpkins scream in the dead of night";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p VER:inf+pres PRE ART-M:s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630574386_2380() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is Halloween Everybody make a scene";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s PRO-INDEF-M-S VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630574405_1259() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's our town Everybody scream";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:s PRO-INDEF-M-S VER:inf+pres SENT");
}

public function testPosTagging1630574407_9463() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In this town of Halloween";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRO-DEMO-M-S NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630574437_2550() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Fingers like snakes and spiders in my hair";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p ADV NOUN-m:p CON NOUN-m:p PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630574440_5991() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is Halloween This is Halloween";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s SENT");
}

public function testPosTagging1630574442_5199() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Halloween, Halloween Halloween, Halloween";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep NOUN-m:s NOUN-m:s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630574446_5383() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In this town we call home";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRO-DEMO-M-S NOUN-m:s PRO-PERS-1-M-P VER:inf+pres NOUN-m:s SENT");
}

public function testPosTagging1630574613_5418() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In this town Don't we love it now?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRO-DEMO-M-S NOUN-m:s VER:inf+pres ADV:neg PRO-PERS-1-M-P VER:inf+pres PRO-PERS-3-M-S ADV:tim SENT:qst");
}

public function testPosTagging1630574618_1182() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Everybody's waiting for the next surprise";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S AUX:ind+pres+3+s VER:ger+pres PRE ART-M:s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630574709_3938() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Something's waiting now to pounce and how you'll scream";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s AUX:ind+pres+3+s VER:ger+pres ADV:tim PRE VER:inf+pres CON ADV PRO-PERS-2-M-S VER:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1630574717_9619() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is Halloween Red and black and slimy green";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s ADJ:pos+m+s CON ADJ:pos+m+s CON ADJ:pos+m+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630574724_2386() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Aren't you scared? Well, that's just fine!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+2+s ADV:neg PRO-PERS-2-M-S PPAST:part+past+m+s SENT:qst ADJ:pos+m+s PON:sep PRO-DEMO-M-S VER:ind+pres+3+s ADV ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630575136_1723() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I am the who when you call, \"Who's there?\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ART-M:s PRO-WH-M-S ADV:when PRO-PERS-2-M-S VER:inf+pres PON:sep PON:quote PRO-WH-M-S VER:ind+pres+3+s ADV SENT:qst PON:quote SENT");
}

public function testPosTagging1630575139_5787() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I am the wind blowing through your hair";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ART-M:s NOUN-m:s VER:ger+pres ADV ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630575217_4700() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I am the shadow on the moon at night";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ART-M:s NOUN-m:s PRE ART-M:s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630575225_7361() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is Halloween This is Halloween";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s SENT");
}

public function testPosTagging1630575230_5150() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Halloween, Halloween Halloween, Halloween";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PON:sep NOUN-m:s NOUN-m:s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630575346_7126() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Tender lumplings everywhere";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s ADV SENT");
}

public function testPosTagging1630575884_7478() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In this town Don't we love it now?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRO-DEMO-M-S NOUN-m:s VER:inf+pres ADV:neg PRO-PERS-1-M-P VER:inf+pres PRO-PERS-3-M-S ADV:tim SENT:qst");
}

public function testPosTagging1630575888_5705() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Everyone's waiting for the next surprise";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S AUX:ind+pres+3+s VER:ger+pres PRE ART-M:s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630576675_4419() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This is Halloween Everybody scream";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s NOUN-m:s PRO-INDEF-M-S VER:inf+pres SENT");
}

public function testPosTagging1630576683_7088() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Would you please make way for a very special guy?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRO-PERS-2-M-S INT:other VER:inf+pres NOUN-m:s PRE PRE ADV:qty ADJ:pos+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630585230_4648() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's over! We did it!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV SENT:exclam PRO-PERS-1-M-P PPAST:part+past+m+s PRO-PERS-3-M-S SENT:exclam");
}

public function testPosTagging1630585234_7385() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wasn't it terrifying? both What a night!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+past+1+s ADV:neg PRO-PERS-3-M-S VER:ger+pres SENT:qst PRO-INDEF-M-P NOUN-m:s PRE NOUN-m:s SENT:exclam");
}

public function testPosTagging1630585236_7129() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Great Halloween, everybody!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s PON:sep PRO-INDEF-M-S SENT:exclam");
}

public function testPosTagging1630585240_2775() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I believe it was our most horrible yet. Thank you, everyone.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-S VER:ind+past+1+s ADJ:pos+m+s ADV:qty ADJ:pos+m+s ADV SENT INT:jubi PON:sep PRO-INDEF-M-S SENT");
}

public function testPosTagging1630585487_2093() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No. Thanks to you, Jack. Without your brilliant leadership ???";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT INT:jubi PRE PRO-PERS-2-M-S PON:sep NPR SENT ADV:qty ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PON SENT");
}

public function testPosTagging1630585504_3045() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Jack Not at all, Mayor. You're such a scream, Jack!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR ADV:neg PRE DET PON:sep NOUN-m:s SENT PRO-PERS-2-M-S VER:ind+pres+2+s DET PRE NOUN-m:s PON:sep NPR SENT:exclam");
}

public function testPosTagging1630585591_4864() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The deadly nightshade you slipped me wore off, Sally.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADJ:pos+m+s NOUN-m:s PRO-PERS-2-M-S PPAST:part+past+m+s PRO-PERS-1-M-S PPAST:part+past+m+s ADV PON:sep NPR SENT");
}

public function testPosTagging1630585617_1785() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Let go! gasps";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres VER:inf+pres SENT:exclam NOUN-m:p SENT");
}

public function testPosTagging1630585625_9920() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're not ready for so much excitement.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:ind+pres+2+s ADV:neg ADJ:pos+m+s PRE ADV ADV:qty NOUN-m:s SENT");
}

public function testPosTagging1630585627_7480() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes, I am.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep PRO-PERS-1-M-S VER:inf+pres SENT");
}

public function testPosTagging1630585682_3246() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh! Oh!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp SENT:exclam INT:surp SENT:exclam");
}

public function testPosTagging1630585688_3963() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come back here, you foolish ???";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADV ADV:plc PON:sep PRO-PERS-2-M-S ADJ:pos+m+s PON SENT");
}

public function testPosTagging1630585703_8557() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Thank you. Thank you. Thank you very much!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT SENT ADV:qty ADV:qty SENT:exclam");
}

public function testPosTagging1630585743_5025() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mayor Hold it! We haven't given out the prizes yet!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s INT:other SENT:exclam PRO-PERS-1-M-P VER:inf+pres ADV:neg NOUN-m:s ADV ART-M:s NOUN-m:p ADV SENT:exclam");
}

public function testPosTagging1630585785_5884() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Our first award goes to the vampires";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s PRE ART-M:s NOUN-m:p SENT");
}

public function testPosTagging1630585789_3886() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "for most blood drained in a single evening.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADV:qty NOUN-m:s PPAST:part+past+m+s PRE PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630585794_7429() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "applause";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
}

public function testPosTagging1630585814_8539() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mayor A second and honourable mention";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRE ADJ:pos+m+s CON ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630585838_367() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "goes to the fabulous ??? sighs";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRE ART-M:s ADJ:pos+m+s PON NOUN-m:p SENT");
}

public function testPosTagging1630585854_7624() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "??? Dark Lagoon Leeches. playing down-tempo music";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON ADJ:pos+m+s NOUN-m:s VER:ind+pres+3+s SENT NOUN-m:s ADV:plc PON:sep NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630585922_9724() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "coin clinks Nice work, Bone Daddy!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:p ADJ:pos+m+s NOUN-m:s PON:sep ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630585957_7080() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yeah, I guess so. Just like last year.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep INT:conf SENT ADV ADV ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630585961_1770() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And the year before that, and the year before that.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ART-M:s NOUN-m:s ADV PRO-DEMO-M-S PON:sep CON ART-M:s NOUN-m:s ADV PRO-DEMO-M-S SENT");
}

public function testPosTagging1630585976_8679() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There are few who deny at what I do I am the best";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+2+s ADJ:pos+m+s PRO-WH-M-S VER:inf+pres PRE NOUN-m:s PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S VER:inf+pres ART-M:s ADJ:pos+m+s SENT");
}

public function testPosTagging1630585981_6974() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "For my talents are renowned far and wide";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s NOUN-m:p VER:ind+pres+2+s ARTPRE ADJ:pos+m+s CON ADJ:pos+m+s SENT");
}

public function testPosTagging1630585988_5860() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "When it comes to surprises in the moonlit night";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:when PRO-PERS-3-M-S VER:ind+pres+3+s PRE VER:ind+pres+3+s PRE ART-M:s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630586027_5700() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I excel without ever even trying";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:qty ADV ADV:tim VER:ger+pres SENT");
}

public function testPosTagging1630586033_7968() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "With the slightest little effort of my ghostlike charms";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ART-M:s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630586108_9417() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I have seen grown men give out a shriek";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres AUX:part+past+m+s VER:part+past+m+s NOUN-m:s VER:inf+pres ADV PRE NOUN-m:s SENT");
}

public function testPosTagging1630586174_284() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "With a wave of my hand and a well-placed moan";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRE NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s CON PRE ADJ:pos+m+s PON:sep PPAST:part+past+m+s NOUN-m:s SENT");
}

public function testPosTagging1630586642_2105() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I have swept the very bravest off their feet";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s ART-M:s ADV:qty ADJ:pos+m+s ADV ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630586666_9116() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yet, year after year It's the same routine";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep NOUN-m:s ADV NOUN-m:s PRO-PERS-3-M-S VER:ind+pres+3+s ART-M:s DET NOUN-m:s SENT");
}

public function testPosTagging1630586717_8110() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I grow so weary of the sound of screams";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres ADV ADJ:pos+m+s PRE ART-M:s NOUN-m:s PRE NOUN-m:p SENT");
}

public function testPosTagging1630586724_7617() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I, Jack, the Pumpkin King";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S PON:sep NPR PON:sep ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630586728_7116() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Have grown so tired of the same old thing";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT AUX:inf+pres VER:part+past+m+s ADV PPAST:part+past+m+s PRE ART-M:s DET ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630586733_4548() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, somewhere deep";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV ADJ:pos+m+s SENT");
}

public function testPosTagging1630586734_5516() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Inside of these bones";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE PRO-DEMO-M-P NOUN-m:p SENT");
}

public function testPosTagging1630586736_3353() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "An emptiness";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NOUN-m:s SENT");
}

public function testPosTagging1630586737_1191() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Began to grow";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRE VER:inf+pres SENT");
}

public function testPosTagging1630586740_4049() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There's something out there";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s NOUN-m:s ADV ADV SENT");
}

public function testPosTagging1630586742_1534() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Far from my home";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630586942_9457() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I've never known";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:tim ADJ:pos+m+s SENT");
}

public function testPosTagging1630586971_1509() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I'll scare you right out of your pants";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres VER:inf+pres PRO-PERS-2-M-S ADJ:pos+m+s ADV PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630586998_1715() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And I'm known throughout England and France";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s ADV NPR CON NPR SENT");
}

public function testPosTagging1630587005_3434() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And since I am dead I can take off my head";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres ADV ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630587011_5791() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "To recite Shakespearean quotations";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE VER:inf+pres ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630587026_6197() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "With the fury of my recitations";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ART-M:s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630587028_607() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But who here";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-WH-M-S ADV:plc SENT");
}

public function testPosTagging1630587030_3343() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Would ever understand";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s ADV VER:inf+pres SENT");
}

public function testPosTagging1630587137_7563() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That the Pumpkin King with the skeleton grin";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S ART-M:s NOUN-m:s NOUN-m:s PRE ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630587140_2760() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Would tire of his crown?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s VER:inf+pres PRE ADJ:pos+m+s NOUN-m:s SENT:qst");
}

public function testPosTagging1630587142_1087() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "If they only understood";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRO-PERS-3-M-P ADV PPAST:part+past+m+s SENT");
}

public function testPosTagging1630587223_981() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He'd give it all up";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S PPAST:part+past+m+s VER:inf+pres PRO-PERS-3-M-S DET ADV SENT");
}

public function testPosTagging1630587225_7305() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "If he only could";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRO-PERS-3-M-S ADV PPAST:part+past+m+s SENT");
}

public function testPosTagging1630587227_755() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "gasps";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT");
}

public function testPosTagging1630587256_1831() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, there's an empty place";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV VER:ind+pres+3+s NUM ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630587257_4897() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In my bones";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630587261_3061() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That calls out for";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV PRE SENT");
}

public function testPosTagging1630587263_1110() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Something unknown";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADJ:pos+m+s SENT");
}

public function testPosTagging1630587268_503() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The fame and praise";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s CON NOUN-m:p SENT");
}

public function testPosTagging1630587270_3253() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Come year after year";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres NOUN-m:s ADV NOUN-m:s SENT");
}

public function testPosTagging1630587781_8335() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Does nothing for";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s ADV PRE SENT");
}

public function testPosTagging1630587783_3970() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Jack ???";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON SENT");
}

public function testPosTagging1630587789_6948() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "??? I know how you feel.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON PRO-PERS-1-M-S VER:inf+pres ADV PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630587791_1926() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "thunder rumbling";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630587794_4829() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "mechanical whirring";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630587893_199() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You've come back.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres ADV SENT");
}

public function testPosTagging1630587897_3717() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I had to. For this!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRE SENT PRE PRO-DEMO-M-S SENT:exclam");
}

public function testPosTagging1630588012_7559() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Yes. Shall we, then?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf SENT VER:inf+pres PRO-PERS-1-M-P PON:sep ADV SENT:qst");
}

public function testPosTagging1630588016_3143() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's twice this month you've slipped deadly nightshade";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV PRO-DEMO-M-S NOUN-m:s PRO-PERS-2-M-S AUX:inf+pres VER:part+past+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630588081_5911() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "into my tea and run off. Three times.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s NOUN-m:s CON VER:inf+pres ADV SENT NUM NOUN-m:p SENT");
}

public function testPosTagging1630588174_7200() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You're mine, you know.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres ADJ:pos+m+s PON:sep PRO-PERS-2-M-S VER:inf+pres SENT");
}

public function testPosTagging1630588185_6067() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You can make other creations.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S AUX:inf+pres VER:inf+pres ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630588189_3215() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm restless. I can't help it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s SENT PRO-PERS-1-M-S ADV:neg VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630588240_249() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We need to be patient, that's all.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres PRE VER:inf+pres ADJ:pos+m+s PON:sep PRO-DEMO-M-S VER:ind+pres+3+s DET SENT");
}

public function testPosTagging1630588288_5976() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "But I don't want to be patient!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-S AUX:inf+pres ADV:neg VER:inf+pres PRE VER:inf+pres ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630588315_7451() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm not in the mood.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:neg PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630588320_2427() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Here you go, boy.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:plc PRO-PERS-2-M-S VER:inf+pres PON:sep NOUN-m:s SENT");
}

public function testPosTagging1630588323_5034() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "growls";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p SENT");
}

public function testPosTagging1630588325_1110() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "snoring";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s SENT");
}

public function testPosTagging1630588389_5749() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "doorbell screams Jack? You home?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s NPR SENT:qst PRO-PERS-2-M-S NOUN-m:s SENT:qst");
}

public function testPosTagging1630588390_1736() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Jack? I've got the plans for next Halloween.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:qst PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s ART-M:s NOUN-m:p PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630588396_9141() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I need to go over them with you so we can get started.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRE VER:inf+pres ADV PRO-PERS-3-M-P PRE PRO-PERS-2-M-S ADV PRO-PERS-1-M-P AUX:inf+pres VER:inf+pres PPAST:part+past+m+s SENT");
}

public function testPosTagging1630588400_819() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Jack, please. I'm only an elected official here.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep INT:other SENT PRO-PERS-1-M-S VER:inf+pres ADV NUM PPAST:part+past+m+s ADJ:pos+m+s ADV:plc SENT");
}

public function testPosTagging1630588404_7335() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I can't make decisions by myself.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV:neg VER:inf+pres NOUN-m:p ADV PRO-PERS-1-M-S SENT");
}

public function testPosTagging1630588412_2369() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He's not home. Where is he?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV:neg NOUN-m:s SENT ADV VER:ind+pres+3+s PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1630588466_5488() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He hasn't been home all night.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S AUX:ind+pres+3+s ADV:neg VER:part+past+m+s NOUN-m:s DET NOUN-m:s SENT");
}

public function testPosTagging1630588474_3159() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's someplace new.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV ADJ:pos+m+s SENT");
}

public function testPosTagging1630588479_7712() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What is this?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst");
}

public function testPosTagging1630588529_6792() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's this? What's this? There's colour everywhere";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst ADV VER:ind+pres+3+s NOUN-m:s ADV SENT");
}

public function testPosTagging1630588557_4235() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's this? There's white things in the air";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst ADV VER:ind+pres+3+s ADJ:pos+m+s NOUN-m:p PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630588561_914() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's this? I can't believe my eyes";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst PRO-PERS-1-M-S ADV:neg VER:inf+pres ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630588603_9259() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's this?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst");
}

public function testPosTagging1630588622_8762() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's this? What's this? There's something very wrong";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst ADV VER:ind+pres+3+s NOUN-m:s ADV:qty ADJ:pos+m+s SENT");
}

public function testPosTagging1630588627_3939() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's this? There's people singing songs";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst ADV VER:ind+pres+3+s NOUN-m:s VER:ger+pres NOUN-m:p SENT");
}

public function testPosTagging1630588636_2997() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's this? The streets are lined with creatures laughing";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst ART-M:s NOUN-m:p AUX:ind+pres+2+s VER:part+past+m+s PRE NOUN-m:p VER:ger+pres SENT");
}

public function testPosTagging1630588663_9845() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Everybody seems so happy Have I possibly gone daffy?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S VER:ind+pres+3+s ADV ADJ:pos+m+s VER:inf+pres PRO-PERS-1-M-S ADV PPAST:part+past+m+s ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1630588667_319() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What is this? What's this?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst");
}

public function testPosTagging1630589702_6071() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There's frost in every window Oh, I can't believe my eyes";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s INT:surp PON:sep PRO-PERS-1-M-S ADV:neg VER:inf+pres ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1630589726_1156() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And in my bones I feel the warmth";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRE ADJ:pos+m+s NOUN-m:p PRO-PERS-1-M-S VER:inf+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630589728_1884() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's coming from inside";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s VER:ger+pres PRE ADV SENT");
}

public function testPosTagging1630589754_9011() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, look, what's this? They're hanging mistletoe";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep VER:inf+pres PON:sep NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst PRO-PERS-3-M-P AUX:ind+pres+2+s VER:ger+pres NOUN-m:s SENT");
}

public function testPosTagging1630590003_2342() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Roasting chestnuts on a fire What's this?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ger+pres NOUN-m:p PRE PRE NOUN-m:s NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst");
}

public function testPosTagging1630590010_1695() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's this? In here they've got a little tree";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst PRE ADV:plc PRO-PERS-3-M-P AUX:inf+pres VER:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630590028_1568() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "How queer And who would ever think, and why?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s CON PRO-WH-M-S PPAST:part+past+m+s ADV VER:inf+pres PON:sep CON ADV SENT:qst");
}

public function testPosTagging1630590040_2218() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They're covering it with tiny things Electric lights on strings";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P AUX:ind+pres+2+s VER:ger+pres PRO-PERS-3-M-S PRE ADJ:pos+m+s NOUN-m:p ADJ:pos+m+s NOUN-m:p PRE NOUN-m:p SENT");
}

public function testPosTagging1630590049_6204() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And there's a smile on everyone Correct me if I'm wrong";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV VER:ind+pres+3+s PRE NOUN-m:s PRE PRO-INDEF-M-S VER:inf+pres PRO-PERS-1-M-S CON:cond PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1630590055_6957() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This looks like fun This looks like fun";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV NOUN-m:s PRO-DEMO-M-S VER:ind+pres+3+s ADV NOUN-m:s SENT");
}

public function testPosTagging1630590060_6645() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Could it be I got my wish? What's this?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRO-PERS-3-M-S VER:inf+pres PRO-PERS-1-M-S PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s SENT:qst NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst");
}

public function testPosTagging1630590070_6261() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, my, what now? The children are asleep";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADJ:pos+m+s PON:sep NOUN-m:s ADV:tim SENT:qst ART-M:s NOUN-m:p VER:ind+pres+2+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630590113_7930() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The monsters are all missing and the nightmares can't be found";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:p VER:ind+pres+2+s DET VER:ger+pres CON ART-M:s NOUN-m:p ADV:neg AUX:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1630590125_6181() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And in their place there seems to be good feeling all around";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRE ADJ:pos+m+s NOUN-m:s ADV VER:ind+pres+3+s PRE VER:inf+pres ADJ:pos+m+s NOUN-m:s DET ADV SENT");
}

public function testPosTagging1630590130_928() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Instead of screams I swear I can hear music in the air";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE NOUN-m:p PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres NOUN-m:s PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630590135_9058() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The smell of cakes and pies are absolutely everywhere";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s PRE NOUN-m:p CON NOUN-m:p VER:ind+pres+2+s ADV ADV SENT");
}

public function testPosTagging1630590139_6102() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The sights, the sounds They're everywhere and all around";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:p PON:sep ART-M:s NOUN-m:p PRO-PERS-3-M-P VER:ind+pres+2+s ADV CON DET ADV SENT");
}

public function testPosTagging1630590142_2785() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I've never felt so good before";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres ADV:tim VER:inf+pres ADV ADJ:pos+m+s ADV SENT");
}

public function testPosTagging1630590432_9755() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This empty place inside of me is filling up";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S ADJ:pos+m+s NOUN-m:s ADV PRE PRO-PERS-1-M-S VER:ind+pres+3+s VER:ger+pres ADV SENT");
}

public function testPosTagging1630590439_1334() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I simply cannot get enough I want it, oh, I want it";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S ADV:deriv ADV:neg VER:inf+pres ADV:qty PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-S PON:sep INT:surp PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1630859206_761() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Trick or treat till the neighbour's gonna die of fright";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s CON:or NOUN-m:s ADV:tim ART-M:s NOUN-m:s AUX:ind+pres+3+s AUX:ger+pres VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1630859536_9664() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Everyone hail to the pumpkin song";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S VER:inf+pres PRE ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630859544_7413() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Everybody scream Everybody scream";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S VER:inf+pres PRO-INDEF-M-S VER:inf+pres SENT");
}

public function testPosTagging1630859551_2076() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In our town of Halloween";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630859577_4037() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Life's no fun without a good scare";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ADV:neg ADJ:pos+m+s ADV:qty PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630859617_5634() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Our man Jack is king of the pumpkin patch";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:s NPR VER:ind+pres+3+s NOUN-m:s PRE ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630859620_6018() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Everyone hail to the Pumpkin King now";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S VER:inf+pres PRE ART-M:s NOUN-m:s NOUN-m:s ADV:tim SENT");
}

public function testPosTagging1630859677_7573() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In this town we call home";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE PRO-DEMO-M-S NOUN-m:s PRO-PERS-1-M-P VER:inf+pres NOUN-m:s SENT");
}

public function testPosTagging1630859678_7735() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Everyone hail to the pumpkin song";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-INDEF-M-S VER:inf+pres PRE ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630918682_6845() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I am the one hiding under your bed";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-WH-M-S VER:ger+pres ADV ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630918685_9209() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I am the one hiding under your stairs";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-WH-M-S VER:ger+pres ADV ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630919946_6285() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm the master of fright and a demon of light";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ART-M:s NOUN-m:s PRE NOUN-m:s CON PRE NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630920430_9925() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's a phase, my dear. It'll pass.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE NOUN-m:s PON:sep ADJ:pos+m+s ADJ:pos+m+s SENT PRO-PERS-3-M-S AUX:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1630921217_3838() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What is this place that I've found? What is this?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S NOUN-m:s PRO-DEMO-M-S PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres SENT:qst NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S SENT:qst");
}

public function testPosTagging1630921238_77() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This has never happened before. It's suspicious.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S AUX:ind+pres+3+s ADV:tim VER:part+past+m+s ADV SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1630921243_7631() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's peculiar. both It's scary!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT PRO-INDEF-M-P PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1630921253_624() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We've got to find Jack.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P AUX:inf+pres VER:part+past+m+s PRE VER:inf+pres NPR SENT");
}

public function testPosTagging1630921260_480() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There's only 365 days left till next Halloween!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s ADV NUM NOUN-m:p PPAST:part+past+m+s ADV:tim ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1630921266_254() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Three sixty-four.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NUM NUM PON:sep NUM SENT");
}

public function testPosTagging1630921334_2436() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Is there anywhere we've forgotten to check?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s ADV ADV PRO-PERS-1-M-P AUX:inf+pres VER:part+past+m+s PRE VER:inf+pres SENT:qst");
}

public function testPosTagging1630921344_5559() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I looked in every mausoleum.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1630921350_4491() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We opened the sarcophagi.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P PPAST:part+past+m+s ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1630921412_205() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I tromped through the pumpkin patch.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s ADV ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1630921424_2585() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I did, but he wasn't there.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PON:sep CON PRO-PERS-3-M-S VER:ind+past+1+s ADV:neg ADV SENT");
}

public function testPosTagging1630921488_726() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's time to sound the alarms!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s PRE VER:inf+pres ART-M:s NOUN-m:p SENT:exclam");
}

public function testPosTagging1630921607_7684() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What's wrong? I ??? I thought you liked frog's breath.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT:qst PRO-PERS-1-M-S PON PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-2-M-S PPAST:part+past+m+s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630921609_2675() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Nothing's more suspicious than frog's breath.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+pres+3+s ADV ADJ:pos+m+s CON NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1630921618_4845() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Until you taste it, I won't swallow a spoonful.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-S PON:sep PRO-PERS-1-M-S VER:inf+pres ADV:neg VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1631003482_9048() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "As often as I've read them Something's wrong";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV ADV PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRO-PERS-3-M-P NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1631003504_4372() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "So hard to put my bony finger on";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s PRE VER:inf+pres ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE SENT");
}

public function testPosTagging1631003841_6601() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Or, perhaps, it's really not as deep as I've been led to think";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:or PON:sep ADV PON:sep PRO-PERS-3-M-S VER:ind+pres+3+s ADV ADV:neg ADV ADJ:pos+m+s ADV PRO-PERS-1-M-S AUX:inf+pres AUX:part+past+m+s VER:part+past+m+s PRE VER:inf+pres SENT");
}

public function testPosTagging1631003847_6325() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Am I trying much too hard?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-S VER:ger+pres ADV:qty ADV ADJ:pos+m+s SENT:qst");
}

public function testPosTagging1631003952_1732() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Right in front of me It's simple, really, very clear";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:other PRE NOUN-m:s PRE PRO-PERS-1-M-S PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s PON:sep ADV PON:sep ADV:qty ADJ:pos+m+s SENT");
}

public function testPosTagging1631004046_2588() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Like music drifting in the air";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV NOUN-m:s VER:ger+pres PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1631004048_2084() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Invisible, but everywhere";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s PON:sep CON ADV SENT");
}

public function testPosTagging1631004143_3979() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Just because I cannot see it doesn't mean I can't believe it";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV CON PRO-PERS-1-M-S ADV:neg VER:inf+pres PRO-PERS-3-M-S AUX:ind+pres+3+s ADV:neg VER:inf+pres PRO-PERS-1-M-S ADV:neg VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1631004154_5150() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You know, I think this Christmas thing is not as tricky as it seems";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres PON:sep PRO-PERS-1-M-S VER:inf+pres PRO-DEMO-M-S NPR NOUN-m:s VER:ind+pres+3+s ADV:neg ADV ADJ:pos+m+s ADV PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
}

public function testPosTagging1631004161_4038() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And why should they have all the fun? It should belong to anyone";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON ADV VER:inf+pres PRO-PERS-3-M-P VER:inf+pres DET ART-M:s NOUN-m:s SENT:qst PRO-PERS-3-M-S AUX:inf+pres VER:inf+pres PRE PRO-WH-M-S SENT");
}

public function testPosTagging1631004208_1416() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Not anyone, in fact, but me Why, I could make a Christmas tree";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg PRO-WH-M-S PON:sep INT:other PON:sep CON PRO-PERS-1-M-S ADV PON:sep PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRE NPR NOUN-m:s SENT");
}

public function testPosTagging1631004276_1896() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I bet I could improve it, too and that's exactly what I'll do";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres PRO-PERS-3-M-S PON:sep ADV CON PRO-DEMO-M-S VER:ind+pres+3+s ADV NOUN-m:s PRO-PERS-1-M-S VER:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1631004279_3849() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Eureka!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:jubi SENT:exclam");
}

public function testPosTagging1631004362_6575() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Jack has a special job for each of you.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR VER:ind+pres+3+s PRE ADJ:pos+m+s NOUN-m:s PRE ADJ:pos+m+s PRE PRO-PERS-2-M-S SENT");
}

public function testPosTagging1631004377_6863() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Mayor Your Christmas assignment is ready.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s ADJ:pos+m+s NPR NOUN-m:s VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1631004380_5961() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Dr Finkelstein to the front of the line!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s PRE ART-M:s NOUN-m:s PRE ART-M:s NOUN-m:s SENT:exclam");
}

public function testPosTagging1631004387_7214() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What kind of noise is that for a baby to make?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:s PRE NOUN-m:s VER:ind+pres+3+s PRO-DEMO-M-S PRE PRE NOUN-m:s PRE VER:inf+pres SENT:qst");
}

public function testPosTagging1631005125_383() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Perhaps it can be improved? No problem!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-PERS-3-M-S AUX:inf+pres AUX:inf+pres VER:part+past+m+s SENT:qst ADV:neg NOUN-m:s SENT:exclam");
}

public function testPosTagging1631005130_7466() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I knew it!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S PPAST:part+past+m+s PRO-PERS-3-M-S SENT:exclam");
}

public function testPosTagging1631005138_1183() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We need some of these.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres DET PRE PRO-DEMO-M-P SENT");
}

public function testPosTagging1631005178_2588() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hmm ??? Their construction should be exceedingly simple, I think.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:doubt PON ADJ:pos+m+s NOUN-m:s AUX:inf+pres VER:inf+pres ADV ADJ:pos+m+s PON:sep PRO-PERS-1-M-S VER:inf+pres SENT");
}

public function testPosTagging1631005690_8341() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This year, Christmas will be ours!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S NOUN-m:s PON:sep NPR AUX:ind+pres+2+s VER:inf+pres ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1631005697_1327() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "How horrible our Christmas will be.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s ADJ:pos+m+s NPR AUX:ind+pres+2+s VER:inf+pres SENT");
}

public function testPosTagging1631005760_6340() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "No. How jolly!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg SENT ADV ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1631005766_7294() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Oh, how jolly our Christmas will be.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:surp PON:sep ADV ADJ:pos+m+s ADJ:pos+m+s NPR AUX:ind+pres+2+s VER:inf+pres SENT");
}

public function testPosTagging1631005775_4272() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "What are you doing here? Jack sent for us.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s VER:ind+pres+2+s PRO-PERS-2-M-S VER:ger+pres ADV:plc SENT:qst NPR PPAST:part+past+m+s PRE PRO-PERS-1-M-P SENT");
}

public function testPosTagging1631006095_5381() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The job I have for you is top secret.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s PRO-PERS-1-M-S VER:inf+pres PRE PRO-PERS-2-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1631006105_8224() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "And we thought you didn't like us, Jack!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-PERS-1-M-P PPAST:part+past+m+s PRO-PERS-2-M-S PPAST:part+past+m+s ADV:neg ADV PRO-PERS-1-M-P PON:sep NPR SENT:exclam");
}

public function testPosTagging1631006114_3925() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Absolutely no one is to know about it. Not a soul.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV:neg NUM VER:ind+pres+3+s PRE VER:inf+pres ADV PRO-PERS-3-M-S SENT ADV:neg PRE NOUN-m:s SENT");
}

public function testPosTagging1631006121_1941() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In the forest you will see a tree.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ART-M:s NOUN-m:s PRO-PERS-2-M-S VER:inf+pres VER:inf+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1631006126_5683() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "??? Christmas Town.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON NPR NOUN-m:s SENT");
}

public function testPosTagging1631006155_6075() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Hmm. And one more thing.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:doubt SENT CON NUM ADV NOUN-m:s SENT");
}

public function testPosTagging1631006163_6108() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Whatever you say, Jack.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s PRO-PERS-2-M-S VER:inf+pres PON:sep NPR SENT");
}

public function testPosTagging1631006178_7679() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Of course, Jack. Wouldn't dream of it, Jack.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT INT:conf PON:sep NPR SENT PPAST:part+past+m+s ADV:neg VER:inf+pres PRE PRO-PERS-3-M-S PON:sep NPR SENT");
}

public function testPosTagging1631006191_7546() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "- I wanna do it - Let's draw straws";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres PRO-PERS-3-M-S PON:sep VER:inf+pres PRO-PERS-1-M-P VER:inf+pres NOUN-m:p SENT");
}

public function testPosTagging1631006218_4242() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "- Birds of a feather - Now and for ever";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PON:sep NOUN-m:p PRE PRE NOUN-m:s PON:sep ADV:tim CON PRE ADV SENT");
}

public function testPosTagging1631007613_59() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Wait, I've got a better plan to catch this big red lobster man";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s PRE VER:inf+pres PRO-DEMO-M-S ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1631007631_4238() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Bury him for 90 years Then see if he talks";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-S PRE NUM NOUN-m:p ADV VER:inf+pres CON:cond PRO-PERS-3-M-S VER:ind+pres+3+s SENT");
}

public function testPosTagging1631019583_5147() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Kidnap the Sandy Claws Lock him up real tight";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NPR VER:inf+pres PRO-PERS-3-M-S ADV ADJ:pos+m+s ADJ:pos+m+s SENT");
}

public function testPosTagging1631019691_7138() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Kidnap the Sandy Claws Throw him in a box";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NPR VER:inf+pres PRO-PERS-3-M-S PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1631019763_7522() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He'll be so pleased, I do declare";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:inf+pres AUX:inf+pres ADV VER:part+past+m+s PON:sep PRO-PERS-1-M-S AUX:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1631019770_778() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That he will cook him rare";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S PRO-PERS-3-M-S VER:inf+pres VER:inf+pres PRO-PERS-3-M-S ADJ:pos+m+s SENT");
}

public function testPosTagging1631019783_4510() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I say that we take a cannon Aim it at his door and then";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres PRO-DEMO-M-S PRO-PERS-1-M-P VER:inf+pres PRE NOUN-m:s VER:inf+pres PRO-PERS-3-M-S PRE ADJ:pos+m+s NOUN-m:s CON ADV SENT");
}

public function testPosTagging1631019892_7994() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Kidnap the Sandy Claws Tie him in a bag";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NPR VER:inf+pres PRO-PERS-3-M-S PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1631019949_1124() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Throw him in the ocean Then see if he is sad";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-S PRE ART-M:s NOUN-m:s ADV VER:inf+pres CON:cond PRO-PERS-3-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT");
}

public function testPosTagging1631019964_9857() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "If I were on his boogie list I'd get out of town";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON:cond PRO-PERS-1-M-S VER:ind+past+3+p PRE ADJ:pos+m+s NOUN-m:s NOUN-m:s PRO-PERS-1-M-S PPAST:part+past+m+s VER:inf+pres ADV PRE NOUN-m:s SENT");
}

public function testPosTagging1631019968_5102() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "He'll be so pleased by our success";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:inf+pres AUX:inf+pres ADV VER:part+past+m+s ADV ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1631019975_1824() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That he'll reward us, too, I'll bet";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S PRO-PERS-3-M-S VER:inf+pres VER:inf+pres PRO-PERS-1-M-P PON:sep ADV PON:sep PRO-PERS-1-M-S VER:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1631019993_6883() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Of snake and spider stew";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE NOUN-m:s CON NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1631020000_5401() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We're his little henchmen and we take our job with pride";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:ind+pres+2+s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s CON PRO-PERS-1-M-P VER:inf+pres ADJ:pos+m+s NOUN-m:s PRE NOUN-m:s SENT");
}

public function testPosTagging1631020014_252() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I wish my cohorts weren't so dumb";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADJ:pos+m+s NOUN-m:p ADV ADV:neg ADV ADJ:pos+m+s SENT");
}

public function testPosTagging1631020039_7200() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I've got something, listen This one is real good, you'll see";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S AUX:inf+pres VER:part+past+m+s NOUN-m:s PON:sep VER:inf+pres PRO-DEMO-M-S NUM VER:ind+pres+3+s ADJ:pos+m+s ADJ:pos+m+s PON:sep PRO-PERS-2-M-S VER:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1631020200_2070() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Entices him to look inside and then we'll have him one, two, three";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:ind+pres+3+s PRO-PERS-3-M-S PRE VER:inf+pres ADV CON ADV PRO-PERS-1-M-P VER:inf+pres VER:inf+pres PRO-PERS-3-M-S NUM PON:sep NUM PON:sep NUM SENT");
}

public function testPosTagging1631020206_8649() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Kidnap the Sandy Claws Beat him with a stick";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NPR VER:inf+pres PRO-PERS-3-M-S PRE PRE NOUN-m:s SENT");
}

public function testPosTagging1631020368_1359() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We'll send a present to his door Upon there'll be a note to read";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P VER:inf+pres VER:inf+pres PRE NOUN-m:s PRE ADJ:pos+m+s NOUN-m:s ADV:plc ADV AUX:inf+pres VER:inf+pres PRE NOUN-m:s PRE VER:inf+pres SENT");
}

public function testPosTagging1631020439_8690() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Kidnap the Sandy Claws Chop him into bits";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NPR VER:inf+pres PRO-PERS-3-M-S ADV NOUN-m:p SENT");
}

public function testPosTagging1631020454_3252() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Kidnap the Sandy Claws See what we will see";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ART-M:s NPR VER:inf+pres NOUN-m:s PRO-PERS-1-M-P VER:inf+pres VER:inf+pres SENT");
}

public function testPosTagging1631020459_4478() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Lock him in a cage and then throw away the key";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-S PRE PRE NOUN-m:s CON ADV VER:inf+pres ADV:plc ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1631020479_893() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "How about it? Think you can you manage?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADV PRO-PERS-3-M-S SENT:qst VER:inf+pres PRO-PERS-2-M-S VER:inf+pres PRO-PERS-2-M-S VER:inf+pres SENT:qst");
}

public function testPosTagging1631020643_1130() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You certainly do, Jack. I had the most terrible vision.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S ADV VER:inf+pres PON:sep NPR SENT PRO-PERS-1-M-S PPAST:part+past+m+s ART-M:s ADV:qty ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1631020647_3742() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's splendid! No. It was about your Christmas.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADJ:pos+m+s SENT:exclam ADV:neg SENT PRO-PERS-3-M-S VER:ind+past+1+s ADV ADJ:pos+m+s NPR SENT");
}

public function testPosTagging1631020652_4749() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There was smoke and fire! That's not my Christmas.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+past+1+s NOUN-m:s CON NOUN-m:s SENT:exclam PRO-DEMO-M-S VER:ind+pres+3+s ADV:neg ADJ:pos+m+s NPR SENT");
}

public function testPosTagging1631020655_6753() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "My Christmas is filled with laughter and joy,";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NPR VER:ind+pres+3+s PPAST:part+past+m+s PRE NOUN-m:s CON NOUN-m:s PON:sep SENT");
}

public function testPosTagging1631020659_6178() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "and this!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT CON PRO-DEMO-M-S SENT:exclam");
}

public function testPosTagging1631020724_8459() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "My Sandy Claws outfit. I want you to make it.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NPR NOUN-m:s SENT PRO-PERS-1-M-S VER:inf+pres PRO-PERS-2-M-S PRE VER:inf+pres PRO-PERS-3-M-S SENT");
}

public function testPosTagging1631020730_1905() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Jack, please listen to me. It's going to be a disaster!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PON:sep INT:other VER:inf+pres PRE PRO-PERS-1-M-S SENT PRO-PERS-3-M-S VER:ind+pres+3+s VER:ger+pres PRE VER:inf+pres PRE NOUN-m:s SENT:exclam");
}

public function testPosTagging1631020734_5530() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "How could it be? Just follow the pattern.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PPAST:part+past+m+s PRO-PERS-3-M-S VER:inf+pres SENT:qst ADV VER:inf+pres ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1631020781_2039() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's a mistake, Jack. Now, don't be modest.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s PRE NOUN-m:s PON:sep NPR SENT ADV:tim PON:sep AUX:inf+pres ADV:neg VER:inf+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1631020785_6974() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Who else is clever enough to make my Sandy Claws outfit?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-WH-M-S ADV VER:ind+pres+3+s ADJ:pos+m+s ADV:qty PRE VER:inf+pres ADJ:pos+m+s NPR NOUN-m:s SENT:qst");
}

public function testPosTagging1631020799_9739() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This device is called a nutcracker.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S NOUN-m:s VER:ind+pres+3+s PPAST:part+past+m+s PRE NOUN-m:s SENT");
}

public function testPosTagging1631020803_9999() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Jack! We caught him! We got him! Perfect!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR SENT:exclam PRO-PERS-1-M-P PPAST:part+past+m+s PRO-PERS-3-M-S SENT:exclam PRO-PERS-1-M-P PPAST:part+past+m+s PRO-PERS-3-M-S SENT:exclam ADJ:pos+m+s SENT:exclam");
}

public function testPosTagging1631020806_2553() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Open it up! Quickly!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-S ADV SENT:exclam ADV SENT:exclam");
}

public function testPosTagging1631020809_6353() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That's not Sandy Claws.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S VER:ind+pres+3+s ADV:neg NPR SENT");
}

public function testPosTagging1631020813_996() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It isn't? Who is it?";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s ADV:neg SENT:qst PRO-WH-M-S VER:ind+pres+3+s PRO-PERS-3-M-S SENT:qst");
}

public function testPosTagging1631020822_8219() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Not Sandy Claws. Take him back! We followed your instructions.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:neg NPR SENT VER:inf+pres PRO-PERS-3-M-S ADJ:pos+m+s SENT:exclam PRO-PERS-1-M-P PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1631020830_6823() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "We went through the door. Which door? There's more than one.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-P PPAST:part+past+m+s ADV ART-M:s NOUN-m:s SENT PRO-WH-M-S NOUN-m:s SENT:qst ADV VER:ind+pres+3+s ADV CON NUM SENT");
}

public function testPosTagging1631020839_2780() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Sandy Claws is behind the door shaped like this.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR VER:ind+pres+3+s NOUN-m:s ART-M:s NOUN-m:s PPAST:part+past+m+s ADV PRO-DEMO-M-S SENT");
}

public function testPosTagging1631020867_886() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "I'm very sorry for the inconvenience, sir.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-1-M-S VER:inf+pres ADV:qty ADJ:pos+m+s PRE ART-M:s NOUN-m:s PON:sep NOUN-m:s SENT");
}

public function testPosTagging1631020874_2435() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Take him home first. And apologise again!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-3-M-S NOUN-m:s ADJ:pos+m+s SENT CON VER:inf+pres ADV SENT:exclam");
}

public function testPosTagging1631020881_9203() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Be careful with Sandy Claws when you fetch him! Treat him nicely!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres ADJ:pos+m+s PRE NPR ADV:when PRO-PERS-2-M-S VER:inf+pres PRO-PERS-3-M-S SENT:exclam VER:inf+pres PRO-PERS-3-M-S ADV SENT:exclam");
}

public function testPosTagging1631020926_9823() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Got it! We'll get it right next time!";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PPAST:part+past+m+s PRO-PERS-3-M-S SENT:exclam PRO-PERS-1-M-P VER:inf+pres VER:inf+pres PRO-PERS-3-M-S ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s SENT:exclam");
}

public function testPosTagging1631020930_4189() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "You will be a decided improvement";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-2-M-S VER:inf+pres VER:inf+pres PRE PPAST:part+past+m+s NOUN-m:s SENT");
}

public function testPosTagging1631020936_5292() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "over that treacherous Sally.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRO-DEMO-M-S ADJ:pos+m+s NPR SENT");
}

public function testPosTagging1631024887_9668() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Let's have a cheer from everyone";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT VER:inf+pres PRO-PERS-1-M-P VER:inf+pres PRE NOUN-m:s PRE PRO-INDEF-M-S SENT");
}

public function testPosTagging1631024890_2786() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It's time to party";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S VER:ind+pres+3+s NOUN-m:s PRE NOUN-m:s SENT");
}

// next test **

}
