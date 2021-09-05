<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

namespace NaiPosTagger\Pipelines;


// EARLY
use NaiPosTagger\Models\NaiDictionary;
use NaiPosTagger\Models\NaiSentence;
use NaiPosTagger\Filters\NaiApostrophesFilter;
use NaiPosTagger\Filters\NaiPretaggedFilter;
use NaiPosTagger\Filters\NaiUrlFilter;
use NaiPosTagger\Filters\NaiEmailFilter;
use NaiPosTagger\Filters\NaiVATFilter;
use NaiPosTagger\Filters\NaiFilenameFilter;
use NaiPosTagger\Filters\NaiAddressesFilter;
//use NaiPosTagger\Filters\NaiDatesFilter;
use NaiPosTagger\Filters\NaiTimeFilter;
use NaiPosTagger\Filters\NaiHashtagFilter;
//use NaiPosTagger\Filters\NaiIpFilter;
//use NaiPosTagger\Filters\NaiAmountsFilter;
use NaiPosTagger\Filters\NaiCodesFilter;
use NaiPosTagger\Filters\NaiNumbersFilter;
use NaiPosTagger\Filters\NaiPhonesFilter;
use NaiPosTagger\Filters\NaiAbbreviationsFilter;
use NaiPosTagger\Filters\NaiRepeatedPonsFilter;
use NaiPosTagger\Filters\NaiSmilesFilter;
//use NaiPosTagger\Filters\NaiRomanNumbersFilter;
//use NaiPosTagger\Filters\NaiRepeatedPatternsFilter;
use NaiPosTagger\Tokenizers\NaiTokenizer;
use NaiPosTagger\Filters\NaiPunctuationFilter;
use NaiPosTagger\Filters\NaiSentFilter;
	
// POST
use NaiPosTagger\Models\NaiPosArr;
use NaiPosTagger\Filters\NaiCommonSimplifier;
use NaiPosTagger\PosTagging\PosAuxVerbs;
use NaiPosTagger\PosTagging\PosApostropheAndS;
use NaiPosTagger\PosTagging\PosByFrequency;
use NaiPosTagger\PosTagging\PosPersonAndSex;
use NaiPosTagger\PosTagging\PosNounAdj;
use NaiPosTagger\PosTagging\PosParticiples;
use NaiPosTagger\PosTagging\PosPrenouns;
use NaiPosTagger\PosTagging\PosNgrams;
use NaiPosTagger\PosTagging\PosProperNames;
use NaiPosTagger\PosTagging\UnknownWords;



/**
 * Pipeline from raw sentence to pos tagged tokens.
 * 
 */
class PipelinePosTagging
{
    /** Default language */
    public $language = 'it';
    
    
    /**
     * Given a sentence, returns the complete pos analysis.
     * 
     * E.g. $pos_arr = PipelinePosTagging->transform($sentence);
     * @param string $sentence
     * @return array $pos_arr
     */
    public function transform($sentence)
    {
	$sentence = $this->earlyOperations($sentence);

	NaiDictionary::$language = $this->language;
	
	NaiDictionary::generateDictionary($sentence);

	$sentence = NaiSentence::prepareSentence($sentence);

	$pos_arr = $this->postOperations($sentence);
	
	return $pos_arr;
    }

    
    /**
     * First group of transformations for the sentence. 
     * Mainly filters for preserve non verbal parts as email, codes etc. which 
     * could be denaturaded by the tokenizer.
     * 
     * @param string $sentence
     * @return string $sentence updated
     */
    public function earlyOperations($sentence)
    {
	// LOCALIZED TRAITS
	require_once(TRAITS_PATH.'Filters/NaiAbbreviationsTrait_'.$this->language.'.php');

	require_once(TRAITS_PATH.'Filters/NaiDatesTrait_'.$this->language.'.php');

	$NaiAbbreviationsClass = "\\NaiPosTagger\\Filters\\NaiAbbreviationsFilterTrait";
//	$NaiDatesTraitClass = "\\NaiPosTagger\\Filters\\NaiDatesFilterTrait";


	// ACCENTED LETTERS AND VARIOUS SMALL FIX
	NaiApostrophesFilter::$language = $this->language;
	$sentence = NaiApostrophesFilter::transform($sentence);
	//diex($sentence);

	// SMALL INITIAL FIXES AND OPTIMIZATIONS
	$sentence = NaiSentence::prepareSentence($sentence);


	// ADD CHAR . TO CLOSE ALWAYS SENTENCES
	$sentence = NaiSentence::closeSentence($sentence);
//diex($sentence);

	// token already in form op POS TAG
	$sentence = NaiPretaggedFilter::transform($sentence);
	
	// GENITIVE
//	$sentence = NaiGenitiveFilter::transform($sentence);
	
	
	// URL
	$sentence = NaiUrlFilter::transform($sentence);
	
	
	// TIME
	$sentence = NaiTimeFilter::transform($sentence);


	// EMAIL
	$sentence = NaiEmailFilter::transform($sentence);
	
	
	// ITALIAN VAT NUMBERS
	$sentence = NaiVATFilter::transform($sentence);

	
	// FILES
	$sentence = NaiFilenameFilter::transform($sentence);

	
	// PHYSICAL ADDRESSES
	NaiAddressesFilter::$language = $this->language;
	$sentence = NaiAddressesFilter::transform($sentence);
	
	
	// ALPHANUMERIC CODES ETC. FIRST ROUND
	$sentence = NaiCodesFilter::transform1($sentence);
//	diex($sentence);
	
	// ALPHANUMERIC CODES SECOND ROUND ETC.
	$sentence = NaiCodesFilter::transform2($sentence);	
	
	
	// TWITTER HASHTAGS
	$sentence = NaiHashtagFilter::transform($sentence);

	
	// EVERYTHING CAN BE A NUMBER... dates, timestamps, amounts, ip addresses etc.
	$sentence = NaiNumbersFilter::transform1($sentence);		 
	
	// SMILE MORE DELICATED
	$sentence = NaiSmilesFilter::transform1($sentence);	
	
	
	// REDUCE REPEATED BASE ? ! .
	$sentence = NaiRepeatedPonsFilter::transform($sentence);	

	
	// TOKENIZE
	$sentence = NaiTokenizer::transform($sentence);
	

	// NUMBERS SECOND ROUND
	$sentence = NaiNumbersFilter::transform2($sentence);

	
	// ABBREVIATIONS
	$sentence = $NaiAbbreviationsClass::transform($sentence);


	// SMILE LESS DELICATED
	$sentence = NaiSmilesFilter::transform2($sentence);


	// END SENTENCE CHARACTERS
	$sentence = NaiSentFilter::transform($sentence);
	
	
	// ALL OTHERS CHARS ARE TAGGED AS PON
	$sentence = NaiPunctuationFilter::transform($sentence);
	

	// AND RETURN ALWAYS A STRING
	return clear_double_spaces($sentence);

    }

    
    /**
     * Second group of transformations from sentence string to pos array.
     * @param string $sentence
     * @return array $pos_arr
     */
    public function postOperations($sentence)
    {
	// localized traits
//	require_once(TRAITS_PATH.'PosTagging/BrillsRules_'.$this->language.'.php');
	require_once(TRAITS_PATH.'PosTagging/BrillsRules_it.php');
	
	
	$PosByFrequency = new PosByFrequency();

	// suspended, too many problems with italian language :(
	// $sentence = $NaiWordsToNumbers->prepareWordsToNumbers($sentence);
	// $sentence = $NaiWordsToNumbers->wordsToNumbers($sentence);


	// FROM SENTENCE STRING TO ARRAY POS_ARR
	NaiPosArr::$language = $this->language;
	$pos_arr = NaiPosArr::sentenceToPosArray($sentence);
//	diex($pos_arr);

	
	// RESTORE PRESERVED TOKENS
	$pos_arr = NaiSentence::unpreservePosArr($pos_arr);
	
	
        // ADD TAIL SENT
	$pos_arr = NaiPosArr::addTailSent($pos_arr);
//	diex($pos_arr);

	
	/**
	 * @todo place here some filters for join multiple parts to compose 
	 * amounts and dates, measures values eg. 230 km , percentages, and others.
	 */
	
	
	// TO SOME MOST COMMON TERMS, ASSIGN TEMPORARILY MORE COMMON FEATURE
	if($this->language != 'en')
	{
	    $NaiCommonSimplifier = new NaiCommonSimplifier();
	    NaiDictionary::$pos_dictionary = $NaiCommonSimplifier->simplify(NaiDictionary::$pos_dictionary);
	}
//	diex(NaiDictionary::$pos_dictionary);

	
	// FILL POS ARRAY PARTS FROM THE DICTIONARY, AND FIXING FEATS OF PARTICIPLES
	$pos_arr = NaiPosArr::populateFromDictionary($pos_arr, NaiDictionary::$pos_dictionary);
//	diex($pos_arr);


	// REMOVE PONS AND OTHER FASTIDIOUSLY OR UNUSEFUL
	$pos_arr = NaiPosArr::hideUnwantedTags($pos_arr, [], ['"']); //, "'", "<", ">"]);

	
	// IDENTIFY AND APPLY NGRAMS BY FORMS
	PosNgrams::$language = $this->language;
	$pos_arr = PosNgrams::transform($pos_arr);
//	diex($pos_arr);

	
	// FIX ABBREVIATIONS WHERE "ABL + ."
	$pos_arr = NaiAbbreviationsFilter::fix($pos_arr);
//	diex($pos_arr);

	
	// TIME TAGS NEEDS _ IN FORM AND LEMMAS
	$pos_arr = NaiTimeFilter::fix($pos_arr);

	
	// SCORING: BY COMBINATIONS OF DIFFERENT TIME, PERSON AND SEX
//	PosPersonAndSex::$dbgme = true;
	PosPersonAndSex::resetDoneIndex();
	$pos_arr = PosPersonAndSex::exclude($pos_arr);
//	diex($pos_arr);

	
	// RECREATE NOUNS FOR ADJECTIVES SUBSTANTIVATED
	$pos_arr = PosNounAdj::transform($pos_arr);
	
	
	// TRY TO DETECT PROPER NAMES
	$pos_arr = PosProperNames::transform($pos_arr);
//	diex($pos_arr);
	
	
	// TRY SOLVE UNKNOWN OR MISPELLED WORDS
	UnknownWords::$language = $this->language;
	$pos_arr = UnknownWords::solveUnknownWorks($pos_arr);
	
	
	// ENGLISH GENITIVES
	if($this->language == 'en')
	{
	    $pos_arr = PosApostropheAndS::detect($pos_arr);
	}
	
	
        // SCORING: BY BRILL RULES
	$PosBrillsClass = "\\NaiPosTagger\\PosTagging\\NaiBrillsRulesTrait";
	$PosBrillsClass::$language = $this->language;
//	$PosBrillsClass::$dbgme = true;
	$PosBrillsClass::$update_brill_hits = FALSE;
	$brill_subscores = $PosBrillsClass::applyRules($pos_arr);
	$pos_arr = $PosBrillsClass::applyScore($pos_arr, $brill_subscores);
//		    echox($brill_subscores);
//diex($pos_arr);
	
        // SCORING: BY FREQUENCIES IN METADATA
	$pos_arr = $PosByFrequency->transform($pos_arr);

	
	// APPLY SCORES
	$pos_arr = NaiPosArr::sortByScore($pos_arr);
	
		
	// RESTORE PARTS HIDDEN TO HELP BRILL RULES ETC.
	$pos_arr = NaiPosArr::unhideUnwantedTags($pos_arr);
	
//diex($pos_arr);
        // TAG PRENOUNS
	if($this->language != 'en')
	{
	    $pos_arr = PosPrenouns::transform($pos_arr);
	}
	
        
	// SOLVE COMBOS OF AUX E VER, FIXING WHERE POSSIBLE PPAST TAGS
	$PosAuxVerbs = new PosAuxVerbs();
        $PosAuxVerbs->language = $this->language;
	$pos_arr = $PosAuxVerbs->preserveAuxPatterns($pos_arr);
	
        // FIX PAST PARTICIPLES (unnecessary for english)
//	PosParticiples::$dbgme = true;
	if($this->language != 'en')
	{
	    $pos_arr = PosParticiples::fixPartPast($pos_arr);
	}

        // DETECTING PHONE NUMBERS
	$pos_arr = NaiPhonesFilter::transform($pos_arr);
	
	
	// TAG AS PLACE terms with a ref "plc" inside metadata
	// no, because it interferes with later nouns associations...
//	$pos_arr = NaiAddressesFilter::tagPlaces($pos_arr);
	

	// @todo ROMAN NUMBERS 
	// $pos_sentence = NaiRomanNumbersFilter::convertRomanNumbers($pos_sentence);
//	echox($pos_arr);

	
	// LAST REORDER BY SCORE
	$pos_arr = NaiPosArr::sortByScore($pos_arr);
	
	return $pos_arr;
	
    }
  
}
