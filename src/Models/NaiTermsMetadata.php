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


use NaiPosTagger\Models\NaiTerms;

/**
 * Model for json dataset of memories DB. Get the json from the "metadata" column.
 *
 */
class NaiTermsMetadata
{
    
    /** Default language */
    public $language = 'it';

    /** Class debugger flag */
    public $dbgme = false; // false true
    
    /** Db connection object */
    private $db = null;


    /**
     * Add or update the value of a metadata key and save it in db.
     * If metadata array yet not present, starts with a new.
     *
     * PARAMS USED FOR NaiTerms::searchInDictionaries
     * @param string $form the target form to search
     * OR
     * @param string $lemma the target lemma to search
     * @param string $feature 
     * 
     * @param string $key the key to add/update
     * @param array $values values to write in the key.
     * 
     * @return array $term_set del record + $metadata
     */
    public function addMetadataValue($form = null, $lemma = null, $feature = null, $key = null, $values = [])
    {
	if((is_null($form) && is_null($lemma)) || is_null($key))
	    throw new \Exception('one of required values is empty, cannot proceed');
	    
	// always look if there are already metadata present
	NaiTerms::$language = $this->language;
	$term_set = NaiTerms::searchInDictionaries($form, $lemma, $feature);
	
	// if term not found, stop
	if (!$term_set)
	    throw new \Exception('term '.$form.' not found, cannot proceed');

	if ($this->dbgme)
	    echox('- for form ' . $form . ' or lemma '.$lemma.' found metadata: ' . $term_set[0]['metadata']);

	$table = NaiTerms::set_table_by_initial($form);
	
	// by default start with a new metadata array
	$metadata = [];

	foreach ($term_set as $set)
	{
	    // if received "ignore_always", skip
	    if($set['rule'] == 'ignore_always')
		continue;
	    
	    // if term found and has metadata convert to array
	    if ($set['metadata'] != '')
		$metadata = json_decode($set['metadata'], true);

	    // add/update as required the key by the indicated values
	    $metadata[$key] = $this->setMetadata($metadata, $key, $values);
 
	    // and save back to db
	    $this->updateMetadataById($set['id'], $metadata, $table, $set['db_lev']);
	}

	return [$term_set, $metadata];

    }


    /**
     * Assign the indicated value to the key and check if the key is a string,
     * an object or an array.
     * 
     * @param array $metadata
     * @param string $key
     * @param string $values
     * @return array $metadata[$key]
     */
    public function setMetadata($metadata, $key, $values)
    {
	if(! isset($metadata[$key]))
	    $metadata[$key] = [];
	
	if($key == 'ref')
	{
	    if(!\in_array($values, $metadata[$key]))
		array_push ($metadata[$key], $values);

	} else if($key == 'tmx')
	{
	    $tmp = explode('=', $values);
	    
	    $metadata[$key][$tmp[0]] = $tmp[1];

	} else if($key == 'frequencies')
	{
	    throw new \Exception('key frequencies has a diverse structure, cannot proceed');
	} else
	{
	    $metadata[$key] = $values;
	}
	
	return $metadata[$key];
    }


    /**
     * Write metadata
     * 
     * @param string $form form to search
     * @param array $metadata array php
     * @return boolean
     */
    public function insertMetadata($form, $metadata, $table, $level = null)
    {
	if (is_null($form) || $form == '')
	    die('please set the $form to add');

	$sql = $this->getInsertQuery($form, $metadata);

	NaiTerms::$language = $this->language;
	$table = NaiTerms::set_table_by_initial($form);
	
	$this->db = dbConn(DICTIONARIES_PATH.$this->language.'/' . $level . $table);
	
	$this->db->query($sql);
	
	$this->db = null;

	return true;
    }
    
    
    /**
     * Update a metadata by the record id
     * 
     * @param int id db id for the update
     * @param array $metadata array php with full metadata set
     * @param string $table
     * @param string $level
     * @return boolean
     */
    public function updateMetadataById($id, $metadata, $table, $level = null)
    {
	if (is_null($id) || $id == '')
	    throw new \Exception('record $id is missing?');

	if (is_null($level))
	    throw new \Exception('level is missing for id '.$id.' ?');
	
	$sql = $this->getUpdateQueryById($id, $metadata, $table);

	if($level == 1)
	    $level_folder = '';
	    
	if($level > 1)
	    $level_folder = 'level-'.$level.'/';
	
	$this->db = dbConn(DICTIONARIES_PATH.$this->language.'/' . $level_folder . $table);

//	echox($sql);
	
	$this->db->query($sql);
	

	if ($this->dbgme)
	    echox('- for token id ' . $id . ' metadata saved');

	$this->db = null;
	
	return true;
    }
    
    
    /**
     * Update a metadata by the lemma
     * 
     * @param string $lemma
     * @param array $metadata array php with full metadata set
     * @param string $table
     * @param string $level
     * @return boolean
     */
    public function updateMetadataByLemma($lemma, $metadata, $table, $level = null)
    {
	if (is_null($lemma) || $lemma == '')
	    die('record $lemma is missing?');

	if (is_null($level))
	    die('level is missing?');
	
	$sql = $this->getUpdateQueryByLemma($lemma, $metadata, $table);

	if($level == 1)
	    $level_folder = '';
	    
	if($level > 1)
	    $level_folder = 'level-'.$level.'/';
	
	$this->db = dbConn(DICTIONARIES_PATH.$this->language.'/' . $level_folder . $table);

//	diex($sql);
	
	$this->db->query($sql);

	$this->db = null;
	
	return true;
    }
    

    /**
     * Delete a given key from metadata of each part of a pos_arr
     * Eg. NaiTermsMetadata->deleteMetadata($pos_arr, 'frequencies');
     * Eg. NaiTermsMetadata->deleteMetadata($pos_arr, 'ngs');
     * 
     * @param array $logic_arr
     * @param string $key
     * @return array $logic_arr
     */
    public function deleteMetadata($logic_arr, $key = null)
    {
	foreach ($logic_arr as $index => $logic_part)
	{
	    unset($logic_arr[$index]['metadata'][$key]);
	}
	
	return $logic_arr;
    }
    
    
    /**
     * Return query for update a metadata field by a given ID
     * 
     * @param int $id
     * @param array $metadata
     * @param string $table
     * @return string $sql
     */
    public function getUpdateQueryById($id, $metadata, $table)
    {
	// when removing a ngram to empty the cell
	if(! \is_array($metadata) && $metadata == '[]')
	{
	    $sql = "UPDATE `$table` SET metadata = NULL WHERE id = " . $id . ";";
	    return $sql;
	}
	
	if(\is_array($metadata))
	    $metadata = json_encode($metadata, JSON_UNESCAPED_UNICODE);
	
	$sql = "UPDATE `$table` SET metadata = '" . insert_ap($metadata) . "' WHERE id = " . $id . ";";

	$metadata = null;
	
	return $sql;
    }

    
    /**
     * Return query for update a metadata field by a given lemma
     * 
     * @param string $lemma
     * @param array $metadata
     * @param string $table
     * @return string $sql
     */
    public function getUpdateQueryByLemma($lemma, $metadata, $table)
    {
	// when removing a ngram to empty the cell
	if(! \is_array($metadata) && $metadata == '[]')
	{
	    $sql = "UPDATE `$table` SET metadata = NULL WHERE lemma = '" . $lemma . "';";
	    return $sql;
	}
	
	if(\is_array($metadata))
	    $metadata = json_encode($metadata, JSON_UNESCAPED_UNICODE);
	
	$sql = "UPDATE `$table` SET metadata = '" . insert_ap($metadata) . "' WHERE lemma = '" . $lemma . "';";

	$metadata = null;
	
	return $sql;
    }

    
    /**
     * Return a query for insert a metadata
     * 
     * @param string $form
     * @param array $metadata
     * @return string $sql
     */
    public function getInsertQuery($form, $metadata)
    {
	NaiTerms::$language = $this->language;
	$table = NaiTerms::set_table_by_initial($form);
	
	$sql = "INSERT INTO $table (form, metadata) VALUES ('" . insert_ap($form) . "', '" . insert_ap(json_encode($metadata, JSON_UNESCAPED_UNICODE)) . "');";

	$metadata = null;
	
	return $sql;
    }

    
    /**
     * Merge metadata of two pos_parts.
     * 
     * @todo what if present an ngramm?
     * @param array $metadata_form
     * @param array $metadata_lemma
     * @return array $metadata_form
     */
    public function mergeMetadata($metadata_form, $metadata_lemma)
    {
	// json to array lemma metadata
	$metadata_lemma = better_decode_json($metadata_lemma);

	// json to array form metadata
	if (empty($metadata_form))
	    $metadata_form = [];

	// and join them
	foreach ($metadata_form as $key => $dataset)
	{
	    if (isset($metadata_lemma[$key]) && is_numeric($metadata_form[$key]))
	    {
		$tmp = $metadata_form[$key] + $metadata_lemma[$key];
		$metadata_form[$key] = $tmp;
	    }
	}


	foreach ($metadata_lemma as $key => $dataset)
	{
	    if (isset($metadata_form[$key]) && is_numeric($metadata_form[$key]))
	    {
		$tmp = $metadata_form[$key] + $metadata_lemma[$key];
		$metadata_form[$key] = $tmp;
	    } else
	    {
		$metadata_form[$key] = $metadata_lemma[$key];
	    }
	}

	return $metadata_form;

    }

    
    /**
     * Return a list of terms that have the given metadata REF.
     * 
     * @param string $ref es. anat, act, food, tool etc.
     * @param string $level con valori '' oppure level-2/
     */
    public function getTermsByRefList($ref, $level = '')
    {
	NaiTerms::$language = $this->language;
	$terms_tables = NaiTerms::terms_tables_list();

	$collection = [];
	foreach ($terms_tables as $table)
	{
	    $stm = "SELECT * FROM $table WHERE features != 'NPR' AND metadata LIKE '%\"$ref\"%'";
	    
	    try
	    {
		$pdo = new \Aura\Sql\ExtendedPdo("sqlite:" . DICTIONARIES_PATH.$this->language.'/'. $level . $table);

		$results = $pdo->fetchAll($stm);
	    } catch (\Exception $exc)
	    {
		throw new \Exception($exc->getMessage());
	    }

	    $pdo->disconnect();

	    foreach ($results as $result)
	    {
		$collection[] = $result['form'];
	    }
	}
	
	return $collection;
    }

}
