<?php

/*
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace NaiPosTagger\Tokenizers;

/**
 * Tokenizer for separing letters and others chars.
 *
 */
class NaiTokenizer
{
    /** Regex pattern to apply */
    public static $patterns = [
	'\s+' => ' ',
	'[ ]{2,}|[\t]' => ' ',
	"([^.])([.])([])}>\"\']*)[ 	]*$" => "\${1} \${2}\${3}",
	"[][(){}<>«»]" => " $0 ",
	'--' => ' -- ',
	"([^'])' " => "\${1} ' ",
	'  *' => ' ',
	'^ *' => '',
	"\'\'" => '"',
	"(\/|\?|\.|\,|\;|\:|\!|\>|\<|\'|\"|\@|\#|\$|€|\…|\%|\&|\-|\_|\=|\^|\*|\[|\]|\(|\)|\{|\}|،|、|\–|\—|\᠁|\|\‹|\›|\«|\»|\‐|\-|\^|†|‡|°|¡|¿|※|#|№|÷|×|º|ª|%|‰|\+|\−|\=|‱|§|\~|\_|\|\‖|\¦|\©|℗|®|℠|™|\‘|\’|\“|\”|\"|\&|\*|\@|\\|•|¶|\′|\″|\‴|\¤|\​₠|\​€|​ƒ|​£|​⁂|⸮|◊)" => " $1 "
    ];


    /**
     * Main method
     * 
     * @param string $sentence
     * @return string $sentence tokenized
     */
    public static function transform($sentence)
    {
	foreach (self::$patterns as $find => $replace)
	{
	    $sentence = preg_replace('/' . $find . '/u', $replace, $sentence);
	}
	
	return clear_double_spaces($sentence);
    }

}
