<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NaiPosTagger\PosTagging;

use NaiBrain\Models\NaiMyself;
use NaiBrain\Models\NaiKnowledgeRecords;
use NaiLogics\Models\NaiLogicArray;
use NaiPosTagger\Utilities\MathCombinatorics;

/**
 * Se nel logic_arr sono stati iniettate 'conoscenze' dai file di knowledge (dentro
 * a tag "DATASET", questa classe analizza quelli che hanno valori "related". Se token
 * vicini (@todo-@tocheck) hanno related uguali, plausibilmente significa che compongono
 * magari un nome proprio o simili. In questo caso li unisce e (@todo) li tagga a dovere.
 *
 */
class PosByKnldRelations
{

    /** Class debugger flag true false */
    public static $dbgme = false;


    /**
     * Guarda se ci sono nodi "related" che portano ad un unico file di termini 
     * "compositi" come negli NPR o ngrammi.
     * Se trovato, sostituisco le parti con quella completa.
     * 
     * @param array $logic_arr
     * @return array $knowledge_contents
     */
    public static function searchRelations($logic_arr)
    {
	if (self::$dbgme)
	    echox('- start searchRelations');

	// collector for all values "related"
	$relations = self::collectRelated($logic_arr);

	// stats per capire se ce ne è uno più probabile
	$stats = multi_array_avg(array_count_values($relations));

	// li ordino per importanza
	$stats = sort2dArray($stats, 'hits', 'DESC');

	if (self::$dbgme)
	    echox($stats, 'Stats results');

	// se ce n'è solo 1 è fatta :)
	if (count($stats) == 1)
	{
	    if (self::$dbgme)
		echox('-- found only 1 possible related: ' . $stats[0]['key'], 'Stats 2');

	    $knowledge_content = [$stats[0]['key'] => NaiKnowledgeRecords::getKnowledgeFile($stats[0]['key'], NaiMyself::getMyKnowledgeSources())];
	    return $knowledge_content;
	}

	$probs = array_column($stats, 'hits');

	$probsstats = array_unique($probs);


	// se ce n'è uno che ha più probablità
	if (count($probsstats) > 1)
	{
	    if (self::$dbgme)
		echox($stats[0]['key'], 'More probably');

	    // leggo il file e ritorno quello
	    $knowledge_content = [$stats[0]['key'] => NaiKnowledgeRecords::getKnowledgeFile($stats[0]['key'], NaiMyself::getMyKnowledgeSources())];
	    return $knowledge_content;
	} else
	{
	    // se  ne resta 1, vuol dire che hanno tutte la stessa probablità ritorno i contenuti

	    $knowledge_contents = [];
	    foreach ($stats as $stat)
	    {
		if (self::$dbgme)
		    echox($stat['key'], ' di pari probabilità');

		$knowledge_contents[$stat['key']] = NaiKnowledgeRecords::getKnowledgeFile($stat['key'], NaiMyself::getMyKnowledgeSources());
	    }

	    return $knowledge_contents;
	}

    }


    /**
     * If found tokens related to a composite "entity" modify the $logic_arr
     * 
     * @param array $logic_arr
     * @param array $knowledge_contents
     * @return array $logic_arr
     */
    public static function modifyLogicArr($logic_arr, $knowledge_contents)
    {

	// comandano i risultati tornati
	foreach ($knowledge_contents as $key => $knowledge_content)
	{
	    $key_parts = explode('_', $key);

	    $n_parts = \count($key_parts);

	    if ($n_parts == 1)
		continue;

	    if (self::$dbgme)
		echox($key_parts, 'Key tokens');

	    // prima coi form
	    $intersections_on_forms = array_intersect($key_parts, array_map('mb_strtolower', array_column($logic_arr, 'form')));

	    if (self::$dbgme)
		echox($intersections_on_forms, 'Intersections on form');


	    // @todo coi lemma
	    if ($intersections_on_forms != $key_parts)
		$intersections_on_lemmas = array_intersect($key_parts, array_map('mb_strtolower', array_column($logic_arr, 'lemma')));


	    if (count($intersections_on_forms) == 1)
	    {
		/**
		 * Es. con "hai i dati di marco?" le intersections convertono solo su "marco".
		 * Cerco nel logic_arr e semplicemente gli assegno l'intera knowlege.
		 */
		if (self::$dbgme)
		    echox('Found only one intersection');

		foreach ($logic_arr as $index => $logic_part)
		{
		    if (strtolower($logic_part['form']) == first($intersections_on_forms))
		    {
			$logic_arr[$index] = NaiLogicArray::applyKnowledges($logic_arr[$index], $knowledge_contents);
		    }
		}
	    } else
	    {
		if (self::$dbgme)
		    echox('More than one intersection found');

		// se sono di più devo cercare il match
		$logic_arr = self::findComboPos($logic_arr, $intersections_on_forms, $knowledge_content);
	    }
	}

	return $logic_arr;

    }


    /**
     * In $intersections ci sono termini che nel logic seq vanno concatenati. 
     * Non essendo messi in ordine, devo trovare quello che ha l'index più basso
     * @param array $logic_arr
     * @param array $intersections
     * @return array $logic_arr updated
     */
    private static function findComboPos($logic_arr, $intersections, $knowledge_content)
    {
	if (self::$dbgme)
	    echox('--- Start findComboPos');

	// genero tutte le combinazioni
	$combo_intersections = self::rotatingCombinations($intersections);


	foreach ($combo_intersections as $intersection)
	{
	    $a = implode(' ', $intersection);
	    $set = implode(' ', array_column($logic_arr, 'form'));

	    // @todo anche qua considerare anche i lemma? ha senso?

	    $matches = [];
	    preg_match_all('/' . $a . '\s/ui', $set, $matches, PREG_OFFSET_CAPTURE);

	    if (isset($matches[0][0][1]))
	    {
		$pre = left($set, $matches[0][0][1]);
		$indexstart = \count(explode(' ', trim($pre)));

		if (self::$dbgme)
		    echox('- found combo "' . $a . '" from index ' . $indexstart);

		for ($index = $indexstart; $index < $indexstart + \count($intersections); $index++)
		{

		    if ($index == $indexstart)
		    {
			if (self::$dbgme)
			    echox('-- apply changes starting from ' . $logic_arr[$index]['form']);

			// in the first token of entity put the forms
			$logic_arr[$index]['form'] = str_replace(' ', '_', $a);
			$logic_arr[$index]['lemma'] = str_replace(' ', '_', $a);
			$logic_arr[$index] = NaiLogicArray::applyKnowledges($logic_arr[$index], [$knowledge_content]);

			// if the full informations record don't exists, I set it as NOUN
			if (!isset($knowledge_content['DATASET']))
			{
			    $logic_arr[$index]['features'] = 'NOUN-m:s';
			    $logic_arr[$index]['sh-feat'] = 'NOUN';
			    continue;
			}

			// abbozzo qualcosa che agisca anche sul tag
			foreach ($knowledge_content['DATASET'][0] as $dataset)
			{
			    if ($dataset['ref'] == 'pers')
			    {
				$logic_arr[$index]['features'] = 'NPR';
				$logic_arr[$index]['sh-feat'] = 'NPR';
			    }
			}
		    } else
		    {
			// e elimino gli altri
			unset($logic_arr[$index]);
		    }
		}

		break;
	    }
	}

	$logic_arr = array_values($logic_arr);

	return $logic_arr;

    }


    /**
     * Return all permutations of an array elements
     * @param array $array
     * @return array $combinations
     */
    public static function rotatingCombinations($array)
    {
	$combinatorics = new MathCombinatorics;

	foreach ($combinatorics->permutations($array, count($array)) as $p)
	    $combinations[] = $p;

	return $combinations;

    }


    /**
     * Search for pos parts wich contains tag RELATED and collect the contents.
     * 
     * @todo consider only if thay are near!
     * @param array $logic_arr
     * @return array $relations
     */
    private static function collectRelated($logic_arr)
    {
	$relations = [];

	foreach ($logic_arr as $logic_part)
	{
	    if (!isset($logic_part['DATASET']))
		continue;

	    foreach ($logic_part['DATASET'] as $know_content)
	    {
		foreach ($know_content as $dataset)
		{
		    if (isset($dataset['related']))
		    {
			$relations[] = $dataset['related'];
		    }
		}
	    }
	}

	return $relations;

    }

}
