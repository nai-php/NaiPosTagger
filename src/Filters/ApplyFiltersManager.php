<?php

/*
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

namespace NaiPosTagger\Filters;

use NaiPosTagger\Models\NaiSentence;



/**
 * Filters extends this class
 */
class ApplyFiltersManager
{
    
    /**
     * Apply the filter
     * @param regex $re
     * @param string $string es. eml, url, num etc.
     * @param string $tag
     * @return string $string updated
     */
    public static function applyFilter($re, $string, $tag, $refs = null)
    {
	$matches_raw = [];
	$done = [];

	preg_match_all($re, $string, $matches_raw, PREG_PATTERN_ORDER);

	if (!isset($matches_raw[0][0]))
	    return $string;

	// remove multiple matches.
	$matches = flattenArray($matches_raw);
	$matches = array_unique($matches);
	

	foreach ($matches as $submatch)
	{
	    if (! in_array($submatch, $done) && $submatch != '')
	    {
		$submatch = trim($submatch);
		
		$new_string = str_replace($submatch, NaiSentence::preserveString($tag, $submatch, $refs), $string);

		array_push($done, $submatch);
	    }

	    $string = $new_string;

	}

	return $string;
    }
}
