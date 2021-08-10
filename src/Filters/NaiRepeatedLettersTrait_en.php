<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace NaiPosTagger\Filters;

trait RepeatedLettersTrait {

    /** Most common vowels */
    public static $vowels = ['a', 'e', 'i', 'o', 'u', 'à', 'è', 'ì', 'ò', 'ù', 'A', 'E', 'I', 'O', 'U', 'À', 'È', 'Ì', 'Ò', 'Ù'];

    /** Most common consonants */
    public static $consonants = ['b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z', 'Ý', 'B', 'C', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'V', 'W', 'X', 'Y', 'Z', 'Ý'];
	
    /** Impossible combinations of couples */
    public static $impossible_doubles_raw = "àbbà èbbè ìbbì òbbò ùbbù àccà èccè ìccì òccò ùccù iddi àddà èddè ìddì òddò ùddù uffu àffà èffè ìffì òffò ùffù oggo uggu àggà èggè ìggì òggò ùggù ahha ehhe ihhi ohho uhhu àhhà èhhè ìhhì òhhò ùhhù ajja ejje ijji ojjo ujju àjjà èjjè ìjjì òjjò ùjjù akka ekke ikki okko ukku àkkà èkkè ìkkì òkkò ùkkù àllà èllè ìllì òllò ùllù ummu àmmà èmmè ìmmì òmmò ùmmù unnu ànnà ènnè ìnnì ònnò ùnnù àppà èppè ìppì òppò ùppù aqqa eqqe iqqi oqqo uqqu àqqà èqqè ìqqì òqqò ùqqù urru àrrà èrrè ìrrì òrrò ùrrù àssà èssè ìssì òssò ùssù àttà èttè ìttì òttò ùttù ivvi ovvo uvvu àvvà èvvè ìvvì òvvò ùvvù awwa ewwe iwwi owwo uwwu àwwà èwwè ìwwì òwwò ùwwù axxa exxe ixxi oxxo uxxu àxxà èxxè ìxxì òxxò ùxxù ayya eyye iyyi oyyo uyyu àyyà èyyè ìyyì òyyò ùyyù àzzà èzzè ìzzì òzzò ùzzù aÝÝa eÝÝe iÝÝi oÝÝo uÝÝu àÝÝà èÝÝè ìÝÝì òÝÝò ùÝÝù";
   
    
    /** To exclude if are the last three letters: */
    public static $excluded_suffixes_raw = 'bii,cii,dii,hii,gii,lii,mii,nii,pii,rii,sii,tii,vii,uii,zii,ii';
    
}


/**
 * Class definition
 */
class NaiRepeatedLettersFilterTrait extends NaiRepeatedLettersFilter {
    use RepeatedLettersTrait;
}
