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


/**
 * Preserve as "FILE" filenames with more common extensions
 */
class NaiFilenameFilter extends ApplyFiltersManager
{

    /** Regex for filenames */
    public static $re = '/\s([a-z0-9àèìòù_\-\.]+\.(?:jpe?g|png|gif|txt|docx|doc|pdf|slk|xml|html|htm|php|xls|csv|xlsx|map|mdb|ppt|sql|db|rar|zip|gz|css|js))\b/iu';
	
    /**
     * Main method.
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform($sentence) 
    {
	$sentence = ' ' . $sentence . ' ';
	
	return trim(self::applyFilter(self::$re, $sentence, 'FILE'));
    
    }

}
