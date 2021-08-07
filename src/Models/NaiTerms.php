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
 * Terms model
 *
 */
class NaiTerms
{
    /** Default language */
    public static $language = 'it';

    /** Class debugger flag */
    public static $dbgme = false; // true false

    /** Initials letters that has dictionaries splitted in 3 db */ 
    public static $terms_db_splitted = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'i', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'v', 'u'];
    
    /** Commons languages letters */ 
    public static $common_letters = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    
    /** Last terms table opened */ 
    private static $last_table = null;

    /** Last db level used */ 
    private static $last_level = null;
    
    /** Db connection instance */ 
    private static $pdo = null;


    /**
     * Given a form, or a lemma, or a feature search it inside dictionaries db.
     * @param string $form if you want to search a form
     * @param string $lemma if you want to search a lemma
     * @param string $feature if you want to search a specific feature
     * @param boolean $findall with this = true, join results from the differents levels.
     * @return array $results
     */
    public static function searchInDictionaries($form = null, $lemma = null, $feature = null, $findall = false)
    {
	$form = trim($form);
	
	// always first in level 1
	$results = self::doSearch($form, $lemma, $feature, 1);

	// if not found, search in level 2
	if(empty($results))
	{
	    // important
	    self::$last_table = null;
	    self::$last_level = null;
	    
	    $results = self::doSearch($form, $lemma, $feature, 2);
	}

	// if true, we join the results from the differents levels
	// 25/12/2019 added empty($results) && to avoid multiple results
	if(empty($results) && $findall)
	{
	    // important
	    self::$last_table = null;
	    self::$last_level = null;
	    
	    $results = array_merge($results, self::doSearch($form, $lemma, $feature, 2));
	}
	
	return $results;
    }
    
    
    /**
     * Search a term by ID
     * 
     * @todo search in level 2 if not found in level 1
     * @param int $id
     * @param string $table
     * @return array for single $result or false if id not found
     */
    public static function searchTermById($id, $table)
    {
	$stm = "SELECT * FROM " . $table . " WHERE id = :id";
	
	$bind = ['id' => $id];
	
	try
	{
	    self::$pdo = self::setDbPath($table);

	    $results = self::$pdo->fetchAll($stm, $bind);
	    
	} catch (\Exception $exc) {
	    throw new \Exception($exc->getMessage());
	}

	if(!isset($results[0]))
	    return false;
	
	return $results[0];
    }

    
    /**
     * Search for a given token in sqlite memories.
     * @param string $form form to search
     * @param string $lemma if need more precision
     * @param string $feature if need more precision
     * @param int $level
     * @return array $results the recordset if found, otherwise count = 0
     */
    public static function doSearch($form = null, $lemma = null, $feature = null, $level = 1)
    {
	// ignore sentence separator
	if ($form == NaiSentence::$sentences_separator)
	    return FALSE;

	if(! is_null($lemma))
	    $table = self::set_table_by_initial($lemma);
	
	if(! is_null($form))
	    $table = self::set_table_by_initial($form);

	if(!isset($table))
	    throw new \Exception('table not set for token "'.$form.'""');
	 
	 
	$stm = self::getSelectQuery($form, $lemma, $feature, $table);

	// In db others there are some differences
	if ($table == 'others')
	{
            if (is_null(self::$last_table) || ($table != self::$last_table))
                self::$pdo = self::setDbPath ($table);
 
            self::$last_table = $table;
	    
            if(self::$dbgme)  echox('-- from others: '.$stm);

	    $results = self::$pdo->fetchAll($stm);
	}
	
	
	// a-z db
	if (!instr($form, '_') && $table != 'others')
	{
	    if($table != self::$last_table || self::$last_level != $level)
	    {
		if(self::$dbgme)
		    echox('-- open conn to '.$table. ' in level '.$level. ' for form '. $form);
		
		self::$pdo = self::setDbPath ($table, $level);
	    }
	    
	    $results = self::$pdo->fetchAll($stm);
	    
	    self::$last_table = $table;
	}
	
	self::$last_level = $level;

	
	// and add the value of memories level where stay the token
	foreach ($results as $n => $result)
	    $results[$n]['db_lev'] = $level;

	return $results;
    }

    
    /**
     * Set DB levels path
     * @param string $table
     * @param int $level
     * @return dbConn
     */
    public static function setDbPath($table, $level = 1)
    {
	if($level == 1)
	    $level_folder = '';
	    
	if($level > 1)
	    $level_folder = 'level-'.$level.'/';

	return new \Aura\Sql\ExtendedPdo("sqlite:" . DICTIONARIES_PATH.self::$language.'/' . $level_folder .$table);
	
    }
    

    /**
     * Return sql query for selecting terms
     * @param array $term_set
     * @param string $table
     * @return string $stm
     */
    public static function getSelectQuery($form = null, $lemma = null, $feature = null, $table = null)
    {
	$stm = "SELECT * FROM " . $table . " WHERE id > 0 ";

	if(! is_null($form))
	$stm .= " AND form = '" . insert_ap($form) . "'";

	if(! is_null($lemma))
	$stm .= " AND lemma = '" . insert_ap($lemma) . "'";

	if(! is_null($feature))
	$stm .= " AND features LIKE '" . insert_ap($feature) . "%'";

	$stm .= " COLLATE NOCASE ORDER BY features ASC;";
//	echox($stm);
	return $stm;
    }
    
    
    /**
     * Update the record for a given term.
     * @param array $term_set
     * @param string $table
     * @return array $query
     */
    public static function updateTerm($term_set, $table = null, $level = null)
    {	
	if(is_null($level))
	    die('please set level where the term is');
	
	if(is_null($table))
	    $table = self::set_table_by_initial($term_set['form']);
	
	$stm = self::getUpdateQuery($term_set, $table);
	
	// usefull sometimes
//	$stm.=" AND features LIKE 'ADV%'";
//	diex($stm);
	
	self::$pdo = self::setDbPath ($table, $level);

	$query = self::$pdo->fetchAffected($stm);

	return $query;

    }
    
    
    /**
     * Add a record for a given term
     * @param array $term_set
     * @param string $table optional for apostrophes db etc.
     * @return last id
     */
    public static function addTerm($term_set, $table = null, $level = null)
    {
//	diex($term_set);
	if(is_null($level))
	    die('please set level where the term is');
	
	if(is_null($table))
	    $table = self::set_table_by_initial($term_set['form']);
	
	$stm = self::getInsertQuery($term_set, $table);
//	diex($stm);
	self::$pdo = self::setDbPath ($table, $level);
	
	self::$pdo->fetchAffected($stm);

	return self::$pdo->lastInsertId();
    }

   
    /**
     * Search in a given table all the terms that have more than one POS tag
     * @param string $table es. a_ah
     * @return array $results with occourrences and form
     */
    public static function searchComplexTerms($table)
    {
 	$stm = "SELECT COUNT(*) AS `rows`, `form` FROM `$table` GROUP BY `form` ORDER BY `rows` DESC";
	
	self::$pdo = self::setDbPath ($table);

	$results = self::$pdo->fetchAll($stm);
	
	foreach ($results as $n => $result)
	{
	    if($result['rows'] == 1)
	    {
		unset($results[$n]);
	    }
	}
	
	return $results;

    }

    
    /**
     * Given a table and a feature returns all terms
     * @param string $table es. a_ah
     * @param string $feature es. noun
     * @param string $rel optional e.g. "plc" to search in metadata
     * @return array $results with occourrences and form
     */
    public static function getTermsList($table, $feature, $rel = null, $filter = null)
    {
	$bind = ['feature' => $feature . '%'];
	
 	$stm = "SELECT id, form, lemma, rule";
	
	if(! is_null($rel))
	$stm .= ", metadata";
	
	if(is_null($filter))
	$stm .= " FROM `$table` WHERE features LIKE :feature";
	
	if(!is_null($filter))
	$stm .= " FROM `$table` WHERE features LIKE :feature AND metadata NOT LIKE '%\"ref\"%' AND metadata NOT LIKE '%\"synof\"%'";
	
	self::$pdo = self::setDbPath ($table);

	$results = self::$pdo->fetchAll($stm, $bind);

	if(! is_null($rel))
	{
	    foreach ($results as $n => $result)
	    {
		if($result['metadata'] != '')
		{
		    $metadata = json_decode ($result['metadata'], true);

		    if(isset($metadata['synof']))	
			$results[$n]['synof'] = $metadata['synof'];

		    if(isset($metadata[$rel]))
		    {
			$results[$n]['metadata'] = $metadata[$rel];
		    } else
		    {
			$results[$n]['metadata'] = '';
		    }
		}
	    }
	}

	return $results;

    }
    
    
    /**
     * Return all the adjectives where form=lemma
     * @param string $field
     * @return array $collection
     */
    public static function getAllAdjBase($field = 'form')
    {
	$terms_tables = self::terms_tables_list();
	
	$collection = [];
	
	foreach ($terms_tables as $n => $table)
	{
	    $stm = "SELECT $field FROM $table WHERE features = 'ADJ:pos+m+s' AND lemma = form";

	    self::$pdo = self::setDbPath ($table);

	    $results = self::$pdo->fetchAll($stm);
	    
	    foreach ($results as $result)
	    {
		$collection[] = $result[$field];
	    }
	}
	
	return $collection;
    }

 
    /**
     * Return sql query for adding terms
     * @param array $term_set
     * @param string $table
     * @return string $stm
     */
    public static function getInsertQuery($term_set, $table = null)
    {
	if(is_null($table))
	    $table = self::set_table_by_initial($term_set['form']);
	
	$stm = "INSERT INTO `" . $table . "` (form, lemma, features";

	if(isset($term_set['metadata']))
	$stm .= ", metadata";
	
	if(isset($term_set['rule']))
	$stm .= ", rule";	
	
	$stm .= ") VALUES(";

	$stm .= "'" . trim(insert_ap($term_set['form'])) . "', ";

	$stm .= "'" . trim(insert_ap($term_set['lemma'])) . "', ";

	$stm .= "'" . trim(insert_ap($term_set['features'])) . "' ";

	if(isset($term_set['metadata']))
	$stm .= ",'" . trim(insert_ap($term_set['metadata'])) . "' ";

	if(isset($term_set['rule']))
	$stm .= ",'" . trim(insert_ap($term_set['rule'])) . "' ";
	
	$stm .= ");";
	
	return $stm;

    }

    
    /**
     * Return sql query for updating terms
     * @param type $term_set
     * @param type $table
     * @param type $form
     * @return type
     */
    public static function getUpdateQuery($term_set, $table = null)
    {
	if(is_null($table))
	    $table = self::set_table_by_initial($term_set['form']);
	
	$stm = "UPDATE `" . $table . "` SET ";

	$stm .= " form = '" . trim(insert_ap($term_set['form'])) . "', ";

	$stm .= " lemma = '" . trim(insert_ap($term_set['lemma'])) . "', ";

	$stm .= " features = '" . trim(insert_ap($term_set['features'])) . "' ";

	$stm .= " WHERE form = '" . trim(insert_ap($term_set['form'])) . "' ";

	return $stm;

    }

    
    /**
     * Move a term by id from dictionary level 1 to level 2
     * @param int $id
     * @param string $table
     * @return boolean
     * @throws \Exception
     */
    public static function moveToLevel2($id, $table = null)
    {
	// get term dataset
	$term_set = self::searchTermById($id, $table);

	$is_present = self::searchInDictionaries($term_set['form'], $term_set['lemma'], $term_set['features'], true);

	// if returns 2 results is because is already present in level 2
	if(count($is_present) > 1)
	    throw new \Exception('already present in level 2');
	
	// prepare insert query
	$stm = self::getInsertQuery($term_set, $table);
	
	// connect to level 2 db
	$db_lev2 = self::setDbPath($table, $level = 2);
	
	// write
	$db_lev2->fetchAffected($stm);
//	echox($stm);
	
	// and remove from level 1 DB
	$db_lev1 = self::setDbPath($table, $level = 1);
	
	$bind = ['id' => $id];
	$stm = "DELETE FROM $table WHERE id = :id";
	$db_lev1->fetchAffected($stm, $bind);
	
	return true;
	
    }
    

    /**
     * Set rule value for a given term
     * @param type $id
     * @param type $value
     * @param type $table
     * @return boolean
     */
    public static function setRuleValue($id, $value, $table)
    {

	$bind = ['rule' => $value, 'id' => $id];
	
	$stm = "UPDATE $table SET rule = :rule WHERE id = :id";
	
	$db_lev1 = self::setDbPath($table, $level = 1);
	
	// write
	$db_lev1->fetchAffected($stm, $bind);
	
	return true;
	
    }
    

    /**
     * Remove a given term from the dictionary
     * @param type $id
     * @param type $table
     * @return boolean
     */
    public static function deleteTerm($id, $table)
    {

	$bind = ['id' => $id];
	
	$stm = "DELETE FROM $table WHERE id = :id";
	
	$db_lev1 = self::setDbPath($table, $level = 1);
	
	// write
	$db_lev1->fetchAffected($stm, $bind);
	
	return true;
	
    }
    
    
    /**
    * Given a $form the method returns the name of the relative dictionary table
    * @param string $form e.g. dog
    * @return string $terms_tb e.g. d_iq
    */
    public static function set_table_by_initial($form)
    {
	$form = trim($form);
	
	$initial = strtolower(left($form, 1));

	// by looking the first char of the form determine the table name
	
	// if not [a-z] return table others
	if (in_array($initial, self::$common_letters) && instr($form, '_') == 0)
	{
	    $matches = [];
	    if (in_array($initial, self::$terms_db_splitted))
	    {
		// if the inizial letter has forms splitted in more than one table, check the second letter
		preg_match_all('/^' . $initial . '[0-9a-hàè]/iu', $form, $matches);
		if (count($matches[0]) > 0)
		    return $initial . '_ah';

		preg_match_all('/^' . $initial . '[i-qìò]/iu', $form, $matches);
		if (count($matches[0]) > 0)
		    return $initial . '_iq';

		preg_match_all('/^' . preg_quote($initial) . '[r-zù]/iu', $form, $matches);
		if (count($matches[0]) > 0)
		    return $initial . '_rz';

		// default
		return $initial . '_ah';
	    } else
	    {
		// temp value while split
		$terms_tb = left($form, 1);
	    }
	} else
	{
	    $terms_tb = 'others';
	}

	return strtolower($terms_tb);

    }


    /**
     * Return the full list of dictionaries tables
     * @return array $terms_table_list;
     */
    public static function terms_tables_list()
    {
	$terms_table_list = [];

	foreach (self::$common_letters as $letter)
	{
	    if (in_array($letter, self::$terms_db_splitted))
	    {
		array_push($terms_table_list, self::set_table_by_initial($letter));
		array_push($terms_table_list, str_replace('ah', 'iq', self::set_table_by_initial($letter)));
		array_push($terms_table_list, str_replace('ah', 'rz', self::set_table_by_initial($letter)));
	    } else
	    {
		array_push($terms_table_list, self::set_table_by_initial($letter));
	    }
	}

	return $terms_table_list;
    }

    
    /**
     * Given a dictionary table, returns a list of features.
     * @param string $table e.g. d_iq
     * @return array $terms_table_list;
     */
    public static function getAllFeatures($table)
    {
	$stm = "SELECT `features` FROM `$table` GROUP BY `features` ORDER BY `features`";

	self::$pdo = self::setDbPath($table);

	$results = self::$pdo->fetchAll($stm);

	$features = [];
	
	foreach ($results as $result)
	{
	    $features[] = $result['features'];
	}
	
	$features = array_unique($features);
	sort($features);

	return $features;
	
    }
    
}
