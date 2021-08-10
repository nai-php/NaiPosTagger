<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NaiPosTagger\Models;

/**
 * CRUD methods for ngrams archive DB
 *
 */
class NaiNgramsArchive
{
    /** Default language */
    public static $language = 'it';
    
    /** Class debugger flag */
    public static $dbgme = false;
    
    /**
     * Given a ngram, returns ID and forms (if found) in the ngrams_language DB
     * @param string $ngram
     * @return int id or false if not found
     */
    public static function loadFromArchive($ngram)
    {
	
	// check if ngram is already present
	$sql = "SELECT id FROM archive WHERE forms = '". insert_ap($ngram['forms'])."'";
	
	if(self::$dbgme)
	    echox('- '.$sql);

	$db = new \PDO('sqlite:' . DICTIONARIES_PATH.self::$language.'/ngrams_'.self::$language.'.db');
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
	$db = null;
	

	// if found, return id
	if(!empty($results))
	    return $results[0]['id'];
	
	return false;
    }
    
    
    /**
     * When a ngram is loaded, first is saved in a core/db/ngrams_[language].db to get the new ID
     * @param array $ngram one ngram
     * @return int ngram ID
     */
    public static function saveInArchive($ngram)
    {
	
	// check if ngram is already present
	$sql = "SELECT id, forms FROM archive WHERE forms = '". insert_ap($ngram['forms'])."'";
	
	if(self::$dbgme)
	    echox('- '.$sql);

	$db = new \PDO('sqlite:' . DICTIONARIES_PATH.self::$language.'/ngrams_'.self::$language.'.db');
	
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
	

	// if already present, update parts and return id
	if(!empty($result))
	{
	    if(self::$dbgme)
		echox('-- already present with id '.$result[0]['id']);
		
	    $sql = "UPDATE archive SET tags = '". insert_ap($ngram['tags'])."', ";
	    
	    if(!isset($ngram['lemmas']))
			$ngram['lemmas'] = '';
			
	    $sql .= "lemmas = '". insert_ap($ngram['lemmas'])."'";
	    
	    $sql .= "WHERE id = ".$result[0]['id'];
	    
	    if(self::$dbgme)
		echox($sql);
	    
	    $db->query($sql);
	    
	    return $result[0]['id'];
	}
	
	$fields = 'forms,tags';
	
	if(isset($ngram['lemmas']))
	    $fields .= ',lemmas';
	
	$sql = "INSERT INTO archive ($fields) VALUES(";

	$sql .= "'". insert_ap($ngram['forms'])."',";
	$sql .= "'". insert_ap($ngram['tags'])."'";
	
	if(isset($ngram['lemmas']))
	    $sql .= ",'". insert_ap($ngram['lemmas'])."'";

	$sql .= ")";

//	diex($sql);

	$db->exec($sql);

	return $db->lastInsertId();
	
    }

    
    /**
     * Remove a ngram from the archive.
     * @param string $forms
     * @return boolean
     */
    public static function removeFromArchive($forms)
    {
	$db = dbConn(DICTIONARIES_PATH.self::$language.'/ngrams_'.self::$language.'.db');
	
	$sql = "DELETE FROM archive WHERE forms = '". insert_ap($forms)."'";
	
	if(self::$dbgme)
	    echox('- '.$sql);

	$db->query($sql);
	
	return false;
    }

}
