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

use NaiPosTagger\Models\NaiSentence;

/**
 * Preserve as "SMI" smiles and emoticos. Skype smiles too.
 * @todo with some smile are hard to solve because they could be part of real words...
 */
class NaiSmilesFilter extends ApplyFiltersManager
{
    public static $smiles_set_1 = [
	'( angry )' => 'SMI:other',
'( suryannamaskar )' => 'SMI:other',
'( bandit )' => 'SMI:other',
'( bow )' => 'SMI:other',
'( computerrage )' => 'SMI:other',
'( chuckle )' => 'SMI:other',
'( fingerscrossed )' => 'SMI:other',
'( emo )' => 'SMI:other',
'( cat )' => 'SMI:other',
'( slap )' => 'SMI:other',
'( flex )' => 'SMI:other',
'( porcone )' => 'SMI:other',
'( headbang )' => 'SMI:other',
'( tandoorichicken )' => 'SMI:other',
'( accarezza )' => 'SMI:other',
'( holidayspirit )' => 'SMI:other',
'( speechless )' => 'SMI:other',
'( discodancer )' => 'SMI:other',
'( disco )' => 'SMI:other',
'( victory )' => 'SMI:other',
'( festiveparty )' => 'SMI:other',
'( monkeygiggle )' => 'SMI:other',
'( handshake )' => 'SMI:other',
'( facepalm )' => 'SMI:other',
'( inlove )' => 'SMI:other',
'( learn )' => 'SMI:other',
'( like )' => 'SMI:other',
'( lips )' => 'SMI:other',
'( makeup )' => 'SMI:other',
'( pig )' => 'SMI:other',
'( monkey )' => 'SMI:other',
'( surprised )' => 'SMI:other',
'( lipssealed )' => 'SMI:other',
'( champagne )' => 'SMI:other',
'( motta )' => 'SMI:other',
'( heidy )' => 'SMI:other',
'( muscle )' => 'SMI:other',
'( sweat )' => 'SMI:other',
'( heart )' => 'SMI:other',
'( time )' => 'SMI:other',
'( cake )' => 'SMI:other',
'( cry )' => 'SMI:other',
'( stop )' => 'SMI:other',
'( sad )' => 'SMI:other',
'( rock )' => 'SMI:other',
'( laugh )' => 'SMI:other',
'( bhangra )' => 'SMI:other',
'( movember )' => 'SMI:other',
'( sleepy )' => 'SMI:other',
'( music )' => 'SMI:other',
'( nerdy )' => 'SMI:other',
'( nerd )' => 'SMI:other',
'( cool )' => 'SMI:other',
'( smile )' => 'SMI:other',
'( ninja )' => 'SMI:other',
'( o )' => 'SMI:other',
'( ok )' => 'SMI:other',
'( party )' => 'SMI:other',
'( penguin )' => 'SMI:other',
'( maialone )' => 'SMI:jubilant',
'( ri - uff )' => 'SMI:complain',
'( pi )' => 'SMI:other',
'( polarbear )' => 'SMI:other',
'( poke )' => 'SMI:other',
'( pizza )' => 'SMI:other',
'( polpette )' => 'SMI:other',
'( puke )' => 'SMI:other',
'( doh )' => 'SMI:other',
'( beer )' => 'SMI:other',
'( wonder )' => 'SMI:other',
'( disgust )' => 'SMI:other',
'( highfive )' => 'SMI:other',
'( wink )' => 'SMI:other',
'( pullshot )' => 'SMI:other',
'( coffee )' => 'SMI:other',
'( giggle )' => 'SMI:other',
'( pumpkin )' => 'SMI:other',
'( punch )' => 'SMI:other',
'( rain )' => 'SMI:other',
'( rofl )' => 'SMI:other',
'( shake )' => 'SMI:other',
'( skipping )' => 'SMI:other',
'( snowangel )' => 'SMI:other',
'( tongueout )' => 'SMI:other',
'( angel )' => 'SMI:other',
'( spanish )' => 'SMI:other',
'( sun )' => 'SMI:other',
'( tandoori )' => 'SMI:other',
'( tandori )' => 'SMI:other',
'( think )' => 'SMI:other',
'( happy )' => 'SMI:other',
'( tmi )' => 'SMI:other',
'( cwl )' => 'SMI:other',
'( tvbinge )' => 'SMI:other',
'( envy )' => 'SMI:other',
'( wait )' => 'SMI:other',
'( waiting )' => 'SMI:other',
'( wasntme )' => 'SMI:other',
'( whew )' => 'SMI:other',
'( worry )' => 'SMI:other',
'( donkey )' => 'SMI:other',
'( xmastree )' => 'SMI:other',
'( sturridge15 )' => 'SMI:other',
'( xmastre )' => 'SMI:other',
'( blush )' => 'SMI:other',
'( yes )' => 'SMI:other',
'( dull )' => 'SMI:other',
'( hi )' => 'SMI:other',
'( yy )' => 'SMI:other',
'( YY )' => 'SMI:other',
'( y )' => 'SMI:other',
'( Y )' => 'SMI:other',
'( yn )' => 'SMI:other',
'( yawn )' => 'SMI:other',
'( wave )' => 'SMI:other',
'( waves )' => 'SMI:other',
'( forse )' => 'SMI:doubting',
'( " , )' => 'SMI:other',
'( "_o )' => 'SMI:other',
'( $ _ $ )' => 'SMI:other',
'( * _ * )' => 'SMI:complain',
'( + _ + )' => 'SMI:complain',
'( - _ - )' => 'SMI:complain',
'( - _ -_; )' => 'SMI:complain',
'( . _ . )' => 'SMI:complain',
'( 0 _ < )' => 'SMI:other',
'( 9 _ 9 )' => 'SMI:other',
'( ; _ ; )' => 'SMI:other',
'( < _ < )' => 'SMI:other',
'( - _ _ - )' => 'SMI:other',	// bò non lo prende
'( = _ = )' => 'SMI:complain',
'( > _ < )' => 'SMI:complain',
'( @ _ @ )' => 'SMI:other',
'( @ _ o )' => 'SMI:other',
'( O _ O )' => 'SMI:other',
'( T_0_T )' => 'SMI:other',
'( T _ T )' => 'SMI:other',
'( ^_._^ )' => 'SMI:jubilant',
'( ^ _ ^ )_;_;' => 'SMI:jubilant',
'( ^ _ ~ )' => 'SMI:jubilant',
'( ^_o_^ )' => 'SMI:jubilant',
'( ` _ ^ )' => 'SMI:jubilant',
'( n _ n )' => 'SMI:jubilant',
'( o . 0 )_;' => 'SMI:other',
'( o _ O )' => 'SMI:complain',
'( x _ x )' => 'SMI:complain',
'( ~ _ ~ )' => 'SMI:other',
'( ô _ O )' => 'SMI:other',
': ( : (' => 'SMI:other',
'0_:_- )' => 'SMI:jubilant',
'8 - )' => 'SMI:jubilant',
': (' => 'SMI:complain',
': )' => 'SMI:jubilant',
': - (' => 'SMI:complain',
': - )' => 'SMI:jubilant',
': - \/' => 'SMI:complain',
': o )' => 'SMI:jubilant',
'; o )' => 'SMI:jubilant',
'| - )' => 'SMI:jubilant',
': ~ - (' => 'SMI:complain',
'; )' => 'SMI:jubilant',
'; - )' => 'SMI:jubilant',
': : )' => 'SMI:jubilant',
'} : - )' => 'SMI:jubilant',
'~_~_( = _ = )_~_~' => 'SMI:complain',
'; (' => 'SMI:complain',
'( : |' => 'SMI:complain',
': |' => 'SMI:complain',
'; i )' => 'SMI:jubilant',
': - |' => 'SMI:complain',
'> : - )' => 'SMI:jubilant',
//'( ^ o ^ ) //' => 'SMI:jubilant',
': \\' => 'SMI:complain',
'( ! )' => 'SMI:surprising',
'( ? )' => 'SMI:doubting',
'; /' => 'SMI:surprising',
': /' => 'SMI:surprising',
'8 )' => 'SMI:jubilant',
];

    
// problematic because termends with more common characters, solved in step 2
public static $smiles_set_2 = [
':-0' => 'SMI:surprising',
':-8' => 'SMI:surprising',
':-b' => 'SMI:jubilant',
':-d' => 'SMI:jubilant',
':-o' => 'SMI:surprising',
':-p' => 'SMI:jubilant',
':-s' => 'SMI:other',
':v' => 'SMI:other',
':-x' => 'SMI:other',
'=-o' => 'SMI:other',
':d ' => 'SMI:jubilant',
':x ' => 'SMI:complain',
':s ' => 'SMI:jubilant',
':_p' => 'SMI:jubilant',
':p ' => 'SMI:jubilant',
':_o' => 'SMI:jubilant',
':O' => 'SMI:surprising',
':9' => 'SMI:surprising',
';9' => 'SMI:surprising',
':\s?_\s?d' => 'SMI:jubilant',

];

    /**
     * First step
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform1($sentence) 
    {
	
	$sentence = ' '.$sentence.' ';

	// temporary
	$lowercase_string = strtolower($sentence);
	
	foreach(self::$smiles_set_2 as $smile => $sentiment)
	{
	    if(instr($lowercase_string, strtolower($smile)) == 0)
		continue;
//	echox('- 1 cfr '.$smile);	    
	    
	    $replace_with = ' '.NaiSentence::preserveString($sentiment, $smile).' ';
		
	    
	    // case insensitive!
	    $sentence = str_ireplace($smile, $replace_with, $sentence);

	}

	$lowercase_string = null;
	
        return trim($sentence);
    }
    
    
    /**
     * Second step
     * @param string $sentence
     * @return string $sentence updated
     */
    public static function transform2($sentence) 
    {
	$sentence = ' '.$sentence.' ';

	foreach(self::$smiles_set_1 as $smile => $sentiment)
	{
	    if(instr($sentence, $smile) == 0)
		continue;
//	echox('- 2 cfr '.$smile);	    
	    
	    $replace_with = ' '.NaiSentence::preserveString($sentiment, $smile).' ';
	    
	    
	    $sentence = str_ireplace(trim($smile), $replace_with, $sentence);

	    // non really perfect because inside smiles there are delicated characters
	    if(preg_match('/^[\w\s\.\|]*$/i', $sentence))
		return trim($sentence);
	    
	}

        return trim($sentence);
    }
    
    
}
