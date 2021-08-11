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
use NaiPosTagger\Models\NaiTermsMetadata;
use NaiPosTagger\Models\NaiNgramsArchive;
use NaiBrain\Knowledges\NaiKnowledgeManager;

/**
 * Model for get, save, manage ngrams.
 *
 */
class NaiNgrams
{
    
    /** Default language */
    public static $language = 'it';

    /** Class debugger flag */
    public static $dbgme = false;
    
    /** Set to true when need to load new ngrams */
    public static $save_is_active = false;
    
    
    /**
     * Load one or more ngrams.
     * 
     * EXAMPLES
     * simple: ['forms' => 'maybe .', 'tags' => 'INT:doubt SENT'],
     * simple + lemmas: ['forms' => 'what is this', 'tags' => 'INT:qst INT:qst INT:qst', 'lemmas' => 'explain explain explain'],
     *
     * dynamic like "which side", "which tool" etc.:  ['forms' => 'which', 'tags' => 'INT:qst*NOUN-m:s']
     *
     * dynamic 3 parts: ['forms' => 'che servono', 'tags' => 'INT:other*NOUN-m:p INT:other'] per ngram "che dati servono"
     *
     * partial dynamic:  ['forms' => 'cosa', 'tags' => 'INT:qst*VER'],
     * 
     * with changes: {"chg":"di contratto", "tag":"PRE:of NOUN-m:s"}
     * 
     * Ref tags can be more tha one eg. ['cfr', 'attr']
     * 
     * @param array $ngrams one or more ngrams to add
     * @param boolean $set_knowledge if true crea i json di knowledge :)
     * @return boolean
     */
    public static function addNewNgram($ngrams, $set_knowledge = false)
    {
	$NaiTermsMetadata = new NaiTermsMetadata();
	$NaiTermsMetadata->language = self::$language;

	if (class_exists('NaiKnowledgeManager'))
	{
	    $NaiKnowledgeManager = new NaiKnowledgeManager();
	}
	
	// important!
	NaiTerms::$language = self::$language;
	NaiNgramsArchive::$language = self::$language;

	// for each set of ngrams to load
	foreach ($ngrams as $ngram)
	{
	    $ngram['forms'] = trim($ngram['forms']);
	    $ngram['tags'] = trim($ngram['tags']);
 
	    // get new or present row id
	    $ngram_id = NaiNgramsArchive::saveInArchive($ngram);
	    
	    // get the forms
	    $forms = explode(' ', $ngram['forms']);
	    
	    // get the tags
	    $tags = explode(' ', $ngram['tags']);

            // if there is a value "chg"
            $chg = null;
            if(isset($ngram['chg']) && $ngram['chg'] != '')
                $chg = trim($ngram['chg']);
	    
            // if there are lemmas
            $lemmas = null;
            if(isset($ngram['lemmas']) && $ngram['lemmas'] != '')
                $lemmas = explode(' ', trim($ngram['lemmas']));
        
            
	    // I need to know the ngram length
	    $len = count($forms);
	    
            // number of forms and tags MUST be the same (not in chg type)
	    if(is_null($chg) && $len != count($tags))
		die('number of elements are not the same in id '.$ngram_id.'!');
	    
            // loop in forms
	    foreach ($forms as $n2 => $form)
	    {
		if(self::$dbgme)
		    echox('- looking form <b>'.$form.'</b>');

		// if required, create the knowledge for each form
		if($set_knowledge)
		    $NaiKnowledgeManager->saveRelatedKnowledgeFile($forms, $ngram['forms']);
	    

		$metadata = [];
                $new_ngram = [];
		$position = ($n2 + 1);
		
		
		
		if(is_null($chg))
		{
		    $new_ngram['pos'] = $position;
		    
		    if(!is_null($lemmas))
			$new_ngram['lemma'] = $lemmas[$n2];
		    
		    $new_ngram['tag'] = $tags[$n2];
		    $new_ngram['len'] = $len;
		} else
		{
		    $new_ngram['chg'] = $chg;
		    $new_ngram['tag'] = $ngram['tags'];
		}

				  
		// if indicated a synof, let's set meta for the first elem of ngram
		if($n2 == 0 && isset($ngram['synof']))
		    $new_ngram['synof'] = $ngram['synof'];
				  
		// if indicated a refs, let's set meta for the first elem of ngram
		if($n2 == 0 && isset($ngram['refs']))
		    $new_ngram['refs'] = $ngram['refs'];		
		
		
		// look each form inside dictionaries DB
		$results = NaiTerms::searchInDictionaries($form);

		// exclude ruled as ignore_always
		foreach ($results as $n3 => $result)
		{
		    if($result['rule'] == 'ignore_always')
			unset($results[$n3]);
		}
		
		$results = array_values($results);
	
		$table = NaiTerms::set_table_by_initial($form);
		
		// if has already metadata
		if(isset($results[0]) && $results[0]['metadata'] != '')
		{
		    if(self::$dbgme)
			echox('--- has already metadata');

		    // get for append
		    $metadata = json_decode($results[0]['metadata'], true);
		} else
		{
		    // or yet don't have metadata
		    if(self::$dbgme)
			echox('--- has not metadata');

		    // a new json
		    $metadata = [];
		}


		$metadata['ngs'][$ngram_id] = $new_ngram;

			    
		if(self::$dbgme)
		    echox($metadata);
		
		$table = NaiTerms::set_table_by_initial($form);
		
		// if form not found, then add the new term
		if(!isset($results[0]))
		{
		    $new_id = null;
		    
		    // if a term is missing, by default add the term to DB level 1
		    if(self::$save_is_active)
			$new_id = NaiTerms::addTerm(['form' => $form, 'lemma' => $form, 'features' => $new_ngram['tag']], $table, 1);
		    
		    if(self::$save_is_active)
		    {
			try
			{
			    $NaiTermsMetadata->updateMetadataById($new_id, $metadata, $table);
			} catch (Exception $e)
			{
			    return $e->getTraceAsString();
			}
		    }
		    
		    if(self::$dbgme)
			echox('-- added id '.$new_id. ' in table '.$table. ' level 1');
		    
		}
		
		// loop through all features found and updateMetadataById
		foreach ($results as $n3 => $result)
		{
		    if(self::$dbgme)
			echox('------ ngram id '.$ngram_id.' UPDATED in table '.$table.'<hr>');
		    
		    if(is_null($chg) && self::$dbgme)
			echox(' with '.$NaiTermsMetadata->getUpdateQueryById($result['id'], $metadata, $table));

		    if(! is_null($chg) && self::$dbgme)
			echox(' with '.$NaiTermsMetadata->getUpdateQueryByLemma($form, $metadata, $table));
		    
		    if(self::$save_is_active)
		    {
			if(is_null($chg))
			{
			    $NaiTermsMetadata->updateMetadataById($result['id'], $metadata, $table, $result['db_lev']);
			} else
			{
			    $NaiTermsMetadata->updateMetadataByLemma($form, $metadata, $table, $result['db_lev']);
			}
		    }
			
		}
	    }
	    
	}
	
	return true;
    }

           
    /** UNUSED
     * Get the value of a given key from json metadata of ngrams.
     * 
     * @param string $metadata JSON
     * @param int $ngram_id 
     * @param string $key values: 'form', 'tag', 'lemma'
     * @param int $index used only when debug is on
     * @return '' or string? required key
     */
    public static function getNgramMetadata($metadata, $ngram_id, $key, $index)
    {
        if (self::$dbgme)
            echox('- for ngram id '.$ngram_id.' at position '.$index.' search key '.$key.' in metadata '.$metadata);
	    
        if(! isset($metadata['ngs']))
            return '';
        
        if(! isset($metadata['ngs'][$ngram_id]))
            return '';
        
        // get related ngram by his id
        $target_ngram = $metadata['ngs'][$ngram_id];

	$metadata = null;
	
        if(! isset($target_ngram[$key]))
            return '';
        
        // and return required key
        return $target_ngram[$key];
            
    }
    
    
    /**
     * Remove everything related to one or more ngrams.
     * Es.
     * $ngrams = [['forms' => 'che cosa furono']];
     * NaiNgrams::Remove($ngrams);
     * 
     * @param array || integer $ngrams the id or the form of the ngram
     * @param string $bytype with value 'forms' or 'id'  ID UNUSED, I think unuseful
     * @return boolean
     */
    public static function removeNgram($ngrams, $bytype = 'forms')
    {
	$NaiTermsMetadata = new NaiTermsMetadata();
	$NaiTermsMetadata->language = self::$language;

	// important!
	NaiTerms::$language = self::$language;

	NaiNgramsArchive::$language = self::$language;
	
	// for each set of ngrams to load
	foreach ($ngrams as $ngram)
	{
	    // get present row id
	    if($bytype == 'forms')
		$ngram_id = NaiNgramsArchive::loadFromArchive($ngram);
	    
	    if($bytype == 'id')
		$ngram_id = $ngram;
	    
	    if(! $ngram_id)
		throw new \Exception('ngram not found?');
	    
	    $forms = explode(' ', $ngram['forms']);
	    
	    // loop in forms
	    foreach ($forms as $n2 => $form)
	    {
		if(self::$dbgme)
		    echox('- looking form <b>'.$form.'</b> in id '.$ngram_id);

		$metadata = [];
		
		// look each form inside dictionaries DB
		$results = NaiTerms::searchInDictionaries($form);

		// exclude ruled as ignore_always
		foreach ($results as $n3 => $result)
		{
		    if($result['rule'] == 'ignore_always')
			unset($results[$n3]);
		}
		
		$results = array_values($results);
		
		$table = NaiTerms::set_table_by_initial($form);

		
		// if has already metadata
		if(isset($results[0]) && !empty($results[0]['metadata']))
		{
		    if(self::$dbgme)
			echox('--- has already metadata');

		    // get for append
		    $metadata = json_decode($results[0]['metadata'], true);
		} else
		{
		    // or yet don't have metadata
		    if(self::$dbgme)
			echox('--- has not metadata');

		    // nothing, continue
		    continue;
		}

	
		// if something wrong
		if(! isset($metadata['ngs']))
		    continue;
//		    diex('error in metadata of id '.$ngram_id.' ?');
		
		// if present, remove requested ID
		unset($metadata['ngs'][$ngram_id]);
		
		// if ngs remain empty, let's remove it
		if(empty($metadata['ngs']))
		    unset($metadata['ngs']);

		$metadata = json_encode($metadata);
		
		// loop through all features found and updateMetadataById
		foreach ($results as $n3 => $result)
		{
		    if(self::$dbgme)
			echox($NaiTermsMetadata->getUpdateQueryById($result['id'], $metadata, $table));
		    
		    if(self::$save_is_active)
			$NaiTermsMetadata->updateMetadataById($result['id'], $metadata, $table, $result['db_lev']);

		    if(self::$dbgme)
			echox('------ ngram id '.$ngram_id.' REMOVED in table '.$table.'<hr>');
		}
	    }
	    
	    // and remove the ngram from the archive
	    if(self::$save_is_active)
		NaiNgramsArchive::removeFromArchive($ngram['forms']);
	}
	
	return true;
    }
    
    
    /**
     * Remove from the pos_arr a ngram config by a given ngram id
     * @param array $pos_arr
     * @param int $ngram_id
     * @return array $pos_arr
     */
    public static function removeByIdFromPosarr($pos_arr, $ngram_id)
    {
	foreach ($pos_arr as $index => $pos_part)
	{
	    foreach ($pos_part as $subindex => $subpos_part)
		unset($pos_arr[$index][$subindex]['metadata']['ngs'][$ngram_id]);
	}
	
	return $pos_arr;
    }
    
}
