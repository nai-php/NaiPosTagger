<?php

/*
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
class EnGurianRepublicTestSuccessful extends TestCase
{


    public function testPosTagging1629798479_457()
    {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The Gurian Republic[a] was an insurgent community that existed between 1902 and 1906 in the western Georgian region of Guria (known at the time as the Ozurget Uyezd) in the Russian Empire.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NPR NOUN-m:s PON:opn PRE PON:cls VER:ind+past+1+s NUM ADJ:pos+m+s NOUN-m:s PRO-DEMO-M-S PPAST:part+past+m+s PRE NUM CON NUM PRE ART-M:s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE NPR PON:opn ADJ:pos+m+s ADV:tim ADV ART-M:s NPR NPR PON:cls PRE ART-M:s ADJ:pos+m+s NOUN-m:s SENT");

    }


    public function testPosTagging1629798592_2339()
    {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It rose from a revolt over land grazing rights in 1902.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S PPAST:part+past+m+s PRE PRE NOUN-m:s ADV NOUN-m:s NOUN-m:p PRE NUM SENT");

    }
    
    public function testPosTagging1629798626_1073() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Several issues over the previous decades affecting the peasant population including taxation, land ownership and economic factors also factored into the start of the insurrection.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s NOUN-m:p ADV ART-M:s ADJ:pos+m+s NOUN-m:p VER:ger+pres ART-M:s NOUN-m:s NOUN-m:s VER:ger+pres NOUN-m:s PON:sep NOUN-m:s NOUN-m:s CON ADJ:pos+m+s NOUN-m:p ADV:qty PPAST:part+past+m+s ADV ART-M:s NOUN-m:s PRE ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1629798667_4546() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "A unique form of justice, where trial attendees voted on sentences, was introduced.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s NOUN-m:s PRE NOUN-m:s PON:sep ADV NOUN-m:s NOUN-m:p PPAST:part+past+m+s PRE NOUN-m:p PON:sep AUX:ind+past+1+s VER:part+past+m+s SENT");
}

public function testPosTagging1629798690_6840() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "While the movement broke from imperial administration, it was not anti-Russian, desiring to remain within the Empire.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ART-M:s NOUN-m:s PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s PON:sep PRO-PERS-3-M-S VER:ind+past+1+s ADV:neg ADJ:pos+m+s PON:sep ADJ:pos+m+s PON:sep VER:ger+pres PRE VER:inf+pres ADV ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1629798733_8341() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Guria within the Russian Empire";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR ADV ART-M:s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1629798764_2885() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In the early 19th century it had been incorporated into the Russian Empire: the Principality of Guria was made a protectorate in 1810 and retained autonomy until 1829 when it was formally annexed.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ART-M:s ADJ:pos+m+s CODE NOUN-m:s PRO-PERS-3-M-S PPAST:part+past+m+s PPAST:part+past+m+s PPAST:part+past+m+s ADV ART-M:s ADJ:pos+m+s NOUN-m:s PON ART-M:s NOUN-m:s PRE NPR AUX:ind+past+1+s VER:part+past+m+s PRE NOUN-m:s PRE NUM CON PPAST:part+past+m+s NOUN-m:s ADV NUM ADV:when PRO-PERS-3-M-S AUX:ind+past+1+s ADV VER:inf+pres SENT");
}

public function testPosTagging1629798895_7139() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The region was re-organised in 1840 into an uyezd (Russian: уезд; a secondary administrative division) and renamed the Ozurget Uyezd, after Ozurgeti, the main city in the region; it was added to the Kutais Governorate in 1846.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s VER:ind+past+1+s ABL PON:sep PPAST:part+past+m+s PRE NUM ADV NUM NPR PON:opn ADJ:pos+m+s PON UNK PON PRE ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PON:cls CON PPAST:part+past+m+s ART-M:s NPR NPR PON:sep ADV NPR PON:sep ART-M:s ADJ:pos+m+s NOUN-m:s PRE ART-M:s NOUN-m:s PON PRO-PERS-3-M-S AUX:ind+past+1+s VER:part+past+m+s PRE ART-M:s NPR NOUN-m:s PRE NUM SENT");
}

public function testPosTagging1629798922_6367() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Until the Russo-Turkish War and the annexation of Adjara in 1878, Guria bordered the Ottoman Empire, and that legacy as a borderland was slow to dissipate: many residents remained armed, and bandits frequented the region.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ART-M:s ADJ:pos+m+s PON:sep ADJ:pos+m+s NOUN-m:s CON ART-M:s NOUN-m:s PRE NPR PRE NUM PON:sep NPR PPAST:part+past+m+s ART-M:s ADJ:pos+m+s NOUN-m:s PON:sep CON PRO-DEMO-M-S NOUN-m:s ADV PRE NOUN-m:s VER:ind+past+1+s ADJ:pos+m+s PRE VER:inf+pres PON ADV:qty NOUN-m:p PPAST:part+past+m+s PPAST:part+past+m+s PON:sep CON NOUN-m:p PPAST:part+past+m+s ART-M:s NOUN-m:s SENT");
}

public function testPosTagging1629798974_6011() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "That reflected a major increase during this era, and by 1913 it had grown a further 35 per cent. Guria was overwhelmingly rural, with Ozurgeti the largest city at 4,694, and only 26 other villages listed.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s ADV PRO-DEMO-M-S NOUN-m:s PON:sep CON ADV NUM PRO-PERS-3-M-S PPAST:part+past+m+s PPAST:part+past+m+s PRE ADJ:pos+m+s NUM NOUN-m:s SENT NPR VER:ind+past+1+s ADV ADJ:pos+m+s PON:sep PRE NPR ART-M:s ADJ:pos+m+s NOUN-m:s PRE NUM PON:sep CON ADV NUM ADJ:pos+m+s NOUN-m:p PPAST:part+past+m+s SENT");
}

public function testPosTagging1629810160_128() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "During its existence the Gurian Republic ignored Russian authority and established its own system of government, which consisted of assemblies of villagers meeting and discussing issues.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s NOUN-m:s ART-M:s NPR NOUN-m:s PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s CON PPAST:part+past+m+s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE NOUN-m:s PON:sep PRO-WH-M-S PPAST:part+past+m+s PRE NOUN-m:p PRE NOUN-m:p VER:ger+pres CON VER:ger+pres NOUN-m:p SENT");
}

public function testPosTagging1629798990_9828() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "There were few factories, though some smaller distilleries did exist, with most of the population working in agriculture.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV VER:ind+past+3+p ADJ:pos+m+s NOUN-m:p PON:sep CON:cond DET ADJ:pos+m+s NOUN-m:p PPAST:part+past+m+s VER:inf+pres PON:sep PRE ADV:qty PRE ART-M:s NOUN-m:s VER:ger+pres PRE NOUN-m:s SENT");
}

public function testPosTagging1629799010_1680() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Guria had high levels of education for a poor peasant region. There were an estimated 63 schools, with 2,833 students, throughout the region by 1905.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:p PRE NOUN-m:s PRE PRE ADJ:pos+m+s NOUN-m:s NOUN-m:s SENT ADV VER:ind+past+3+p NUM PPAST:part+past+m+s NUM NOUN-m:p PON:sep PRE NUM NOUN-m:p PON:sep ADV ART-M:s NOUN-m:s ADV NUM SENT");
}

public function testPosTagging1629799026_4473() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Ozurgeti alone had four, including one for girls, and 681 total students.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR ADJ:pos+m+s PPAST:part+past+m+s NUM PON:sep VER:ger+pres NUM PRE NOUN-m:p PON:sep CON NUM ADJ:pos+m+s NOUN-m:p SENT");
}

public function testPosTagging1629799060_6356() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "As a result, literacy rates were high throughout the region; with one student per 20 people, the Ozurget Uyezd had by far the highest proportion of students in Georgia.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE NOUN-m:s PON:sep NOUN-m:s NOUN-m:p VER:ind+past+3+p ADJ:pos+m+s ADV ART-M:s NOUN-m:s PON PRE NUM NOUN-m:s PRE NUM NOUN-m:s PON:sep ART-M:s NPR NPR PPAST:part+past+m+s ADV ADJ:pos+m+s ART-M:s ADJ:pos+m+s NOUN-m:s PRE NOUN-m:p PRE NPR SENT");
}

public function testPosTagging1629799082_8198() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "This gave Guria a reputation as an educated and literate region, but there were no real opportunities for further development there, which frustrated the rural intelligentsia.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-DEMO-M-S PPAST:part+past+m+s NPR PRE NOUN-m:s ADV NUM PPAST:part+past+m+s CON ADJ:pos+m+s NOUN-m:s PON:sep CON ADV VER:ind+past+3+p ADV:neg ADJ:pos+m+s NOUN-m:p PRE ADJ:pos+m+s NOUN-m:s ADV PON:sep PRO-WH-M-S PPAST:part+past+m+s ART-M:s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1629799162_6299() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The development of the Transcaucasus Railway in 1872 had a major effect on Guria. It connected Tiflis with the port cities of Batumi and Poti, allowing passengers to easily travel across Georgia; it was possible to go from Ozurgeti to Batumi in 40 minutes.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s PRE ART-M:s NOUN-m:s NOUN-m:s PRE NUM PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s PRE NPR SENT PRO-PERS-3-M-S PPAST:part+past+m+s NPR PRE ART-M:s NOUN-m:s NOUN-m:p PRE NPR CON NPR PON:sep VER:ger+pres NOUN-m:p PRE ADV VER:inf+pres ADV NPR PON PRO-PERS-3-M-S VER:ind+past+1+s ADJ:pos+m+s PRE VER:inf+pres PRE NPR PRE NPR PRE NUM NOUN-m:p SENT");
}

public function testPosTagging1629799183_5420() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Indeed, by 1900 most of the 12,000 workers in Batumi, which was the third-largest industrial centre in the Transcaucasus, were from Guria.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PON:sep ADV NUM ADV:qty PRE ART-M:s NUM NOUN-m:p PRE NPR PON:sep PRO-WH-M-S VER:ind+past+1+s ART-M:s ADJ:pos+m+s PON:sep ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s PRE ART-M:s NOUN-m:s PON:sep VER:ind+past+3+p PRE NPR SENT");
}

public function testPosTagging1629799220_7633() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The advent of socialist ideas was also an important factor in Guria.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s PRE ADJ:pos+m+s NOUN-m:p VER:ind+past+1+s ADV:qty NUM ADJ:pos+m+s NOUN-m:s PRE NPR SENT");
}

public function testPosTagging1629799245_1390() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "It was noted by Grigory Aleksinsky, a Bolshevik active during the republic's existence, as \"a citadel of Menshevism.\"";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-S AUX:ind+past+1+s VER:part+past+m+s ADV NPR NPR PON:sep PRE NOUN-m:s ADJ:pos+m+s ADV ART-M:s NOUN-m:s PRE NOUN-m:s PON:sep ADV PRE PON:quote NOUN-m:s PRE NOUN-m:s SENT SENT PON:quote");
}

public function testPosTagging1629799269_5963() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Several leading Georgian Bolsheviks, the other main faction within the Russian Social Democratic Labour Party (RSDLP), were also Gurian, though the region overwhelmingly supported the Mensheviks.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADJ:pos+m+s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p PON:sep ART-M:s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s ADV ART-M:s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:s NOUN-m:s PON:opn NOUN-m:s PON:cls PON:sep VER:ind+past+3+p ADV:qty NPR PON:sep CON:cond ART-M:s NOUN-m:s ADV PPAST:part+past+m+s ART-M:s NOUN-m:p SENT");
}

public function testPosTagging1629799302_3734() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Many labourers who went to Batumi and Poti were exposed to socialist ideals, and participated in strikes and other labour actions led by the RSDLP; on their return to Guria they would expose the peasants to these ideas.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV:qty NOUN-m:p PRO-WH-M-S PPAST:part+past+m+s PRE NPR CON NPR AUX:ind+past+3+p VER:part+past+m+s PRE ADJ:pos+m+s NOUN-m:p PON:sep CON PPAST:part+past+m+s PRE NOUN-m:p CON ADJ:pos+m+s NOUN-m:s NOUN-m:p PPAST:part+past+m+s ADV ART-M:s NOUN-m:s PON PRE ADJ:pos+m+s NOUN-m:s PRE NPR PRO-PERS-3-M-P PPAST:part+past+m+s VER:inf+pres ART-M:s NOUN-m:p PRE PRO-DEMO-M-P NOUN-m:p SENT");
}

public function testPosTagging1629799325_6403() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "In particular, after a strike action was broken up in Batumi in 1902, some 500 to 600 workers were forced to leave the city, with many of them going to Guria.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRE ADJ:pos+m+s PON:sep ADV PRE NOUN-m:s NOUN-m:s VER:ind+past+1+s ADJ:pos+m+s ADV PRE NPR PRE NUM PON:sep DET NUM PRE NUM NOUN-m:p AUX:ind+past+3+p VER:part+past+m+s PRE VER:inf+pres ART-M:s NOUN-m:s PON:sep PRE ADV:qty PRE PRO-PERS-3-M-P VER:ger+pres PRE NPR SENT");
}

public function testPosTagging1629799373_8540() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The average peasant household had no more than 1.5 desyatina (roughly the same amount of hectares), with half of that land rented.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s ADJ:pos+m+s NOUN-m:s NOUN-m:s PPAST:part+past+m+s ADV:neg ADV CON NUM NOUN-m:s PON:opn ADV ART-M:s DET NOUN-m:s PRE NOUN-m:p PON:cls PON:sep PRE NOUN-m:s PRE PRO-DEMO-M-S NOUN-m:s PPAST:part+past+m+s SENT");
}

public function testPosTagging1629799529_5540() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "While larger landowners were required to make land available for rent, those who owned less than 11.25 desyatina did not have to, which meant some 80 percent of landowners were exempt, greatly limiting the amount of land available.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s NOUN-m:p AUX:ind+past+3+p VER:part+past+m+s PRE VER:inf+pres NOUN-m:s ADJ:pos+m+s PRE NOUN-m:s PON:sep DET PRO-WH-M-S VER:inf+pres ADV:qty CON NUM NOUN-m:s PPAST:part+past+m+s ADV:neg VER:inf+pres PRE PON:sep PRO-WH-M-S PPAST:part+past+m+s DET NUM NOUN-m:s PRE NOUN-m:p AUX:ind+past+3+p VER:inf+pres PON:sep ADV VER:ger+pres ART-M:s NOUN-m:s PRE NOUN-m:s ADJ:pos+m+s SENT");
}

public function testPosTagging1629799553_5100() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The nobles were reluctant to sell their land, further increasing tensions.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:p VER:ind+past+3+p ADJ:pos+m+s PRE VER:inf+pres ADJ:pos+m+s NOUN-m:s PON:sep ADJ:pos+m+s VER:ger+pres NOUN-m:p SENT");
}

public function testPosTagging1629799598_646() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "While other products, notably silk and wine, were major sources of income in the Kutais Governorate, maize was by far the most important.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV ADJ:pos+m+s NOUN-m:p PON:sep ADV NOUN-m:s CON NOUN-m:s PON:sep VER:ind+past+3+p ADJ:pos+m+s NOUN-m:p PRE NOUN-m:s PRE ART-M:s NPR NOUN-m:s PON:sep NOUN-m:s VER:ind+past+1+s ADV ADJ:pos+m+s ART-M:s ADV:qty ADJ:pos+m+s SENT");
}

public function testPosTagging1629799638_4877() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Exports were severely restricted in 1891 to help alleviate the shortages caused by the bad harvest in the rest of Russia that year; they did not recover until 1895.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:p AUX:ind+past+3+p ADV VER:part+past+m+s PRE NUM PRE VER:inf+pres VER:inf+pres ART-M:s NOUN-m:p PPAST:part+past+m+s ADV ART-M:s ADJ:pos+m+s NOUN-m:s PRE ADV:qty NPR PRO-DEMO-M-S NOUN-m:s PON PRO-PERS-3-M-P PPAST:part+past+m+s ADV:neg VER:inf+pres ADV NUM SENT");
}

public function testPosTagging1629799759_6972() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Uratadze sought the support of the RSDLP for the boycott, but they refused because of the overt religious elements of the meeting, such as swearing oaths on icons.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NPR PPAST:part+past+m+s ART-M:s NOUN-m:s PRE ART-M:s NOUN-m:s PRE ART-M:s NOUN-m:s PON:sep CON PRO-PERS-3-M-P PPAST:part+past+m+s CON PRE ART-M:s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p PRE ART-M:s NOUN-m:s PON:sep DET ADV VER:ger+pres NOUN-m:p PRE NOUN-m:p SENT");
}

public function testPosTagging1629799938_1492() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The movement gained momentum, with meetings occurring on a frequent basis, and by the spring of 1903 half of the region was involved.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:s PPAST:part+past+m+s NOUN-m:s PON:sep PRE NOUN-m:p VER:ger+pres PRE PRE ADJ:pos+m+s NOUN-m:s PON:sep CON ADV ART-M:s NOUN-m:s PRE NUM NOUN-m:s PRE ART-M:s NOUN-m:s AUX:ind+past+1+s VER:part+past+m+s SENT");
}

public function testPosTagging1629799960_9072() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The following year 20 of the 25 rural societies (analogous to municipal governments) were participating in boycotts of landowners.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s VER:ger+pres NOUN-m:s NUM PRE ART-M:s NUM ADJ:pos+m+s NOUN-m:p PON:opn ADJ:pos+m+s PRE ADJ:pos+m+s NOUN-m:p PON:cls AUX:ind+past+3+p VER:ger+pres PRE NOUN-m:p PRE NOUN-m:p SENT");
}

public function testPosTagging1629799998_9095() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "The authorities responded by arresting over 300 people, and several, including Zhordania and fellow Menshevik leader Noe Khomeriki were exiled to Siberia; this only encouraged further participation.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ART-M:s NOUN-m:p PPAST:part+past+m+s ADV VER:ger+pres ADV NUM NOUN-m:s PON:sep CON ADJ:pos+m+s PON:sep VER:ger+pres NPR CON NOUN-m:s ADJ:pos+m+s NOUN-m:s NPR NPR AUX:ind+past+3+p VER:part+past+m+s PRE NPR PON PRO-DEMO-M-S ADV PPAST:part+past+m+s ADJ:pos+m+s NOUN-m:s SENT");
}

public function testPosTagging1629800046_5705() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They established a separate committee for \"agricultural workers\" that would focus on Guria, a term that attempted to reconcile Marxism with the peasant movement.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P PPAST:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s PRE PON:quote ADJ:pos+m+s NOUN-m:p PON:quote PRO-DEMO-M-S PPAST:part+past+m+s VER:inf+pres PRE NPR PON:sep PRE NOUN-m:s PRO-DEMO-M-S PPAST:part+past+m+s PRE VER:inf+pres NOUN-m:s PRE ART-M:s NOUN-m:s NOUN-m:s SENT");
}

public function testPosTagging1629800126_1173() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Village meetings were vested with supreme authority, and also served as a court. These meetings initially met infrequently, but by 1905 were assembling weekly.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT NOUN-m:s NOUN-m:p AUX:ind+past+3+p VER:part+past+m+s PRE ADJ:pos+m+s NOUN-m:s PON:sep CON ADV:qty PPAST:part+past+m+s ADV PRE NOUN-m:s SENT PRO-DEMO-M-P NOUN-m:p ADV PPAST:part+past+m+s ADV PON:sep CON ADV NUM AUX:ind+past+3+p VER:ger+pres ADJ:pos+m+s SENT");
}

public function testPosTagging1629800199_549() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They became increasingly political and could last for hours, even days, at a time. According to Gurian linguist Nikolai Marr, while the peasants took an active role in the meetings, the workers from the cities were largely running them.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P PPAST:part+past+m+s ADV ADJ:pos+m+s CON PPAST:part+past+m+s ADJ:pos+m+s PRE NOUN-m:p PON:sep ADV:tim NOUN-m:p PON:sep PRE PRE NOUN-m:s SENT VER:ger+pres PRE NPR NOUN-m:s NPR NOUN-m:s PON:sep ADV ART-M:s NOUN-m:p PPAST:part+past+m+s NUM ADJ:pos+m+s NOUN-m:s PRE ART-M:s NOUN-m:p PON:sep ART-M:s NOUN-m:p PRE ART-M:s NOUN-m:p AUX:ind+past+3+p ADV VER:ger+pres PRO-PERS-3-M-P SENT");
}

public function testPosTagging1629810280_6059() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "Within a village a \"circle\" was made, and there were on average 10 circles for 90 households. Each circle would elect a \"tensman\" (Georgian: ათისთავი, atistavi) who then would select among themselves a \"hundredsman\" (Georgian: ასისთავი, asistavi).";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT ADV PRE NOUN-m:s PRE PON:quote NOUN-m:s PON:quote AUX:ind+past+1+s VER:part+past+m+s PON:sep CON ADV VER:ind+past+3+p PRE ADJ:pos+m+s NUM NOUN-m:p PRE NUM NOUN-m:p SENT ADJ:pos+m+s NOUN-m:s PPAST:part+past+m+s VER:inf+pres PRE PON:quote UNK PON:quote PON:opn ADJ:pos+m+s PON UNK PON:sep UNK PON:cls PRO-WH-M-S ADV PPAST:part+past+m+s VER:inf+pres ADV PRO-PERS-3-M-P PRE PON:quote UNK PON:quote PON:opn ADJ:pos+m+s PON UNK PON:sep UNK PON:cls SENT");
}

public function testPosTagging1629810308_2498() {
	$PipelinePosTagging = new PipelinePosTagging();
	$PipelinePosTagging->language = "en";

	$sentence = "They would then elect representatives for the rural society, who selected their own regional representatives.";
	$pos_arr = $PipelinePosTagging->transform($sentence);
	$PipelinePosTagging = null;

	$pos_arr = NaiPOsArr::flatPosArr($pos_arr);

	$this->assertEquals(implode(" ", array_column($pos_arr, 'features')), "SENT PRO-PERS-3-M-P PPAST:part+past+m+s ADV VER:inf+pres NOUN-m:p PRE ART-M:s ADJ:pos+m+s NOUN-m:s PON:sep PRO-WH-M-S PPAST:part+past+m+s ADJ:pos+m+s ADJ:pos+m+s ADJ:pos+m+s NOUN-m:p SENT");
}


}
