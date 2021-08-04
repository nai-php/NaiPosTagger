<?php

/*
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace NaiPosTagger\PosTagging;

use NaiPosTagger\PosTagging\PosTools;

/**
 * Looks if present and apply to the score informations inside metadata 'frequencies' 
 *
 * @todo consider differents frequencies by "tpc" in metadata json
 */
class PosByFrequency
{

    /** Class debugging */
    private $dbgme = false;


    /**
     * Assign score to a feature of pos part looking frequency values in metadata.
     *
     * @param array $pos_arr
     * @return array $pos_arr (updated) with scores
     */
    public function transform($pos_arr)
    {
	foreach ($pos_arr as $index => $pos_part)
	{
	    $pos_part_count = count($pos_part);
	    
	    // considero come sempre solo i termini incerti
	    if ($pos_part_count == 1)
		continue;

	    if ($this->dbgme)
		echox('<hr>- PosByFrequency: looking <b>' . $pos_part[0]['form'] . '</b> with ' . $pos_part_count . ' features at index ' . $index);

	    // se ho metadati, li converto da json a array
	    if (empty($pos_part[0]['metadata']))
		continue;
	    
	    if ($this->dbgme)
		echox('-- metadata found');

	    $metadata = $pos_part[0]['metadata'];

	    // if set we get frequences metadata
	    if (isset($metadata['frequencies']))
		$pos_arr = $this->extractPercentages($pos_arr, $index, $pos_part[0]['form'], $metadata['frequencies']);

	} // end loop pos arr

	return $pos_arr;
    }


    /**
     * Calculate percentage by metadata availables
     * @param int $index
     * @param string $form
     * @param array $frequencies e.g.
      [NOUN] => Array
      (
      [index] => 1
      [frequency] => 8
      [tpc] => 1
      )

      [ADV] => Array
      (
      [index] => 1
      [frequency] => 300
      [tpc] => 1
      )
     *
     * @return array $pos_arr (updated) with scores
     */
    private function extractPercentages($pos_arr, $index, $form, $frequencies)
    {
	// sum of all frequences
	$total_frequences = multiArraySum($frequencies, 'frequency');

	// one moore loop for each value of metadata
	foreach ($frequencies as $feature => $frequency_data)
	{
	    $frequency_data['frequency'] = round(($frequency_data['frequency'] * 100) / $total_frequences, 2);

	    // normalize value (there is a little bit of mess in the db)
	    $frequency_data['frequency'] = (floor(($frequency_data['frequency'] /= 10)) / 10);

	    if ($this->dbgme)
		echox('-- token "' . $form . '" variant "' . $feature . '" has probability ' . $frequency_data['frequency'] . '%');

	    // setting scores
	    $pos_arr[$index] = PosTools::setSubScorePos('frequency-metadata-' . $index, $pos_arr[$index], $feature, $frequency_data['frequency']);

	}

	return $pos_arr;
    }

}
