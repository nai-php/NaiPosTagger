<?php

/*
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace NaiPosTagger\Utilities;

use NaiPosTagger\Models\NaiTerms;
/*
 * Some methods for developer
 */

class DbTools
{

    /**
     * To add a language or a memory level, we need to start with the sqlite dbs empty.
     * 1. create a new folder inside databases folder, eg. memories_en or memories_en/level-2
     * 2. copy in the new folder the empty_src.db
     * 3. call this method
     * @param string $language two chars eg. it, en, es, fr
     * @param int $memory_level eg. 1,2 
     * @return type
     */
    public static function generateBulkDictionaries($language = null, $memory_level = null)
    {
	if(is_null($language))
	    die('please set language es. en, fr etc.');
	    
	if(is_null($memory_level))
	    die('please set the required memory level 1,2 etc.');
	
	if($memory_level == 1)
	{
	    $level_path = '';
	} else
	{
	    $level_path = 'level-'.$memory_level."/";
	}

	
	// need some values in CI config
	$CI = & get_instance();
	
        // get the list of splitted tables
	$terms_tables = NaiTerms::terms_tables_list($CI->config->item('letters'));

	$limit = 300;
	
	// loop
	foreach ($terms_tables as $n => $table)
	{
	    $source_filename = DICTIONARIES_PATH.$language."/".$level_path."empty_src.db";
	    
	    $dest_filename = DICTIONARIES_PATH.$language."/".$level_path.$table;
	
//	    die("- copy from ".$source_filename." to ".$dest_filename);
	
	    
	    // important!
	    if(file_exists($dest_filename))
		die('NO! DB '.DICTIONARIES_PATH.$language."/".$level_path.$table.' already exists!!! stop');
	    
	    // and duplicate the 'source' empty DB for each one
	    copy($source_filename, $dest_filename);
	    
	    echox("- copy from ".$source_filename." to ".$dest_filename);
	    
	    // and query for the table
	    $sql = "CREATE TABLE \"$table\" ('id' INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, 'form' TEXT DEFAULT NULL, 'lemma' TEXT DEFAULT NULL, 'features' TEXT DEFAULT NULL, 'rule' TEXT DEFAULT NULL, 'uuid' TEXT DEFAULT NULL, metadata TEXT DEFAULT NULL)";
//	    echox($sql);
	    
	    $db = dbConn($dest_filename);
	    
	    $db->query($sql);
	    
	    if($n >= $limit)
		break;
	}

    }

}