<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

/**
 * COMMON FUNCTIONS for manipulating strings, objects and array
 *
 * @note for scripts collected from different sources, thanks to all the authors.
 */


// ARRAYS TOOLS


/**
 * Display arrays, strings or objects well formatted
 */
if (! function_exists('echox'))
{
function echox($content, $title = null)
{
    if(! is_null($title))
	echo '<b>'.$title.'</b><br>';

    if (is_array($content))
    {
	echo '<pre>';
	print_r($content);
	echo '</pre>';
    } else if (is_object($content))
    {
	echo '<pre>';
	print_r((array) $content);
	echo '</pre>';
    } else
    {
	if ($content != '')
	    echo $content . '<br>';
    }

    if(! is_null($title))
	echo '<hr>';

}
}

/**
 * Display arrays, strings or objects well formatted with a die();
 */
if (! function_exists('diex'))
{
function diex($content = '')
{
    if (is_array($content))
    {
	echo '<pre>';
	print_r($content);
	echo '</pre>';
    } else if (is_object($content))
    {
	echo '<pre>';
	print_r((array) $content);
	echo '</pre>';
    } else
    {
	if ($content != '')
	    echo $content . '<br>';
    }

    die('- stopped from diex()');

}
}


/**
 * Display a var_dump of arrays, strings or objects well formatted
 */
if (! function_exists('dumpx'))
{
function dumpx($content)
{
    echo '<pre>';
    echo var_dump($content);
    echo '</pre>';

}
}


/**
 * Display a list for simple arrays, useful for copy/paste
 */
if (! function_exists('listx'))
{
function listx($content)
{
    echo '<pre>';
    foreach ($content as $row)
    {
	echo $row . '<br>';
    }
    echo '</pre>';

}
}


/**
 * Enhanced version of var_export for copy/paste
 * @example exportx($data['agents']);
 */
if (! function_exists('exportx'))
{
function exportx($expression, $return=FALSE) {
    $export = var_export($expression, TRUE);
    $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
    $array = preg_split("/\r\n|\n|\r/", $export);
    $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [NULL, ']$1', ' => ['], $array);
    $export = join(PHP_EOL, array_filter(["["] + $array));
    if ((bool)$return) return $export; else echo $export;
}
}


/**
 * Display arrays inside an HTML table
 */
if (! function_exists('tablex'))
{
function tablex($rows)
{
    $table_result = '<table class="table" style="border:1px solid #999">';

    //echox($rows[0]); die();
    if (isset($rows[0][0]))
    {
	$table_result .= '<tr>';

	foreach ($rows[0][0] as $label => $row)
	{
	    $table_result .= '<td style="border:1px solid #999; font-weight:bold">';
	    $table_result .= strtoupper($label);
	    $table_result .= '</td>';
	}
	$table_result .= '</tr>';
    }


    foreach ($rows as $row)
    {
	if (is_array($row))
	    $row = $row[0];
	//echox($row);
	$table_result .= '<tr>';
	foreach ($row as $column)
	{
	    //echox($column);
	    $table_result .= '<td style="border:1px solid #999; min-width:80px">';
	    if (!is_array($column))
	    {
		$table_result .= $column;
	    } else
	    {
		$table_result .= '<span style="color:red;">';
		//$tmo = implode(", ".$column);
		if (isset($column[0]))
		    $table_result .= $column[0];
		if (isset($column[1]))
		    $table_result .= ' - ' . $column[1];
		if (isset($column[2]))
		    $table_result .= ' - ' . $column[2];
		$table_result .= '</span>';
	    }
	    $table_result .= '&nbsp;</td>';
	}
	$table_result .= '</tr>';
    }

    $table_result .= '</table>';

    echo $table_result;

}
}


/**
 * Display json in a readable form
 */
if (! function_exists('jsonx'))
{
function jsonx($json)
{
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen($json);

    for ($i = 0; $i < $json_length; $i++)
    {
	$char = $json[$i];
	$new_line_level = NULL;
	$post = "";
	if ($ends_line_level !== NULL)
	{
	    $new_line_level = $ends_line_level;
	    $ends_line_level = NULL;
	}
	if ($in_escape)
	{
	    $in_escape = false;
	} else if ($char === '"')
	{
	    $in_quotes = !$in_quotes;
	} else if (!$in_quotes)
	{
	    switch ($char)
	    {
		case '}': case ']':
		    $level--;
		    $ends_line_level = NULL;
		    $new_line_level = $level;
		    break;

		case '{': case '[':
		    $level++;
		case ',':
		    $ends_line_level = $level;
		    break;

		case ':':
		    $post = " ";
		    break;

		case " ": case "\t": case "\n": case "\r":
		    $char = "";
		    $ends_line_level = $new_line_level;
		    $new_line_level = NULL;
		    break;
	    }
	} else if ($char === '\\')
	{
	    $in_escape = true;
	}
	if ($new_line_level !== NULL)
	{
	    $result .= "<br>" . str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $new_line_level);
	}
	$result .= $char . $post;
    }

    return '<pre>' . $result . '</pre>';

}
}


/**
 * Convert to array a json string with some cleaning filter and with decoding errors
 * management.
 * @param string $json_text a json string
 * @return array the json converted to array, or an array with value error if something
 * goes wrong
 */
if (! function_exists('better_decode_json'))
{
function better_decode_json($json_text)
{
    // decodifico, ne verifico eventuali errori e torno.
    $result_to_json = json_decode($json_text, true);

    $json_error = '';
    switch (json_last_error())
    {
	case JSON_ERROR_NONE:
	    //$json_error = ' - No errors';
	    break;
	case JSON_ERROR_DEPTH:
	    $json_error = ' - Maximum stack depth exceeded';
	    break;
	case JSON_ERROR_STATE_MISMATCH:
	    $json_error = ' - Underflow or the modes mismatch';
	    break;
	case JSON_ERROR_CTRL_CHAR:
	    $json_error = ' - Unexpected control character found';
	    break;
	case JSON_ERROR_SYNTAX:
	    $json_error = ' - Syntax error, malformed JSON';
	    break;
	case JSON_ERROR_UTF8:
	    $json_error = ' - Malformed UTF-8 characters, possibly incorrectly encoded';
	    break;
	default:
	    $json_error = ' - Unknown error';
	    break;
    }

    if ($json_error != '')
	$result_to_json['error'] = "in better_decode_json read error " . $json_error;

    return $result_to_json;

}
}



// STRINGS

/**
 * Given a string with tokens separated by "_" returns componing parts sorted by
 * alphabetic order.
 */
if (! function_exists('sort_alphabetic'))
{
function sort_alphabetic($string, $separator = '_')
{
    $parts = explode($separator, strtolower($string));

    sort($parts);

    $array = implode($separator, $parts);

    return $array;
}
}


/**
 * If a string contains another string
 * @param string $stack
 * @param string $needle
 * @return int position
 */
if (! function_exists('instr'))
{
function instr($stack, $needle)
{
    return strpos(chr(0) . $stack, $needle) + 0;
}
}


/**
 * Return n chars of a string starting from left
 * @param string $s the string to search in
 * @param int $n how many chars have to return
 */
if (! function_exists('left'))
{
function left($s, $n)
{
    return substr($s, 0, $n);
}
}


/**
 * Return n chars of a string starting from right
 * @param string $s the string to search in
 * @param int $n how many chars have to return
 */
if (! function_exists('right'))
{
function right($s, $n)
{
    return substr($s, $n * -1);
}
}


/**
 * Return n chars indise a string starting from a given position.
 * @param string $s the string to search in
 * @param int $x how many chars have to return
 * @param int $w starting from
 */
if (! function_exists('mid'))
{
function mid($s, $x, $w = "")
{
    if ($w)
    {
	return substr($s, $x - 1, $w);
    } else
    {
	return substr($s, $x - 1);
    }

}
}


/**
 * Return a string reversed
 * @param string $n
 * @return type
 */
if (! function_exists('instrrev'))
{
function instrrev($n, $s)
{
    $x = strpos(chr(0) . strrev($n), $s) + 0;
    return(($x == 0) ? 0 : strlen($n) - $x + 1);
}
}


/**
 * Escape "'" for sql queries
 */
if (! function_exists('insert_ap'))
{
function insert_ap($string)
{
    if (!!isset($string))
    {
	$function_ret = str_replace("'", "''", $string);
    } else
    {
	$function_ret = "";
    }

    return stripslashes($function_ret);
}
}


/**
 * Remove multplice spaces from a string
 * @param string $string
 * @return string $string (updated)
 */
if (! function_exists('clear_double_spaces'))
{
function clear_double_spaces($string)
{
    if (!isset($string) || !$string || trim($string) == '')
	return '';

    $string = preg_replace('/\s+/', ' ', $string);
    return trim($string);

}
}



// MISC

/**
 * Sqlite db connection
 * @param string $db_path
 * @return \SQLite3|boolean
 */
if (! function_exists('dbConn'))
{
function dbConn($db_path)
{
    try
    {
	return new \SQLite3($db_path);
    } catch (PDOException $e)
    {
	die('Error in DB connection ' . $e);
    }
    return false;
}
}


/**
 * Given two times min e max check if another time value in inside this range
 */
if (! function_exists('isBetween'))
{
function isBetween($from, $till, $input)
{
    $f = DateTime::createFromFormat('!H:i', $from);
    $t = DateTime::createFromFormat('!H:i', $till);
    $i = DateTime::createFromFormat('!H:i', $input);

//	echox ($from. ' '.$till.' '.$input);

    if ($f > $t)
	$t->modify('+1 day');

    return ($f <= $i && $i <= $t) || ($f <= $i->modify('+1 day') && $i <= $t);

}
}



// ARRAYS

/**
 * Return from a multidimensional array the frequencies stats.
 * Useful with array created from array_count_values.
 */
if (! function_exists('multi_array_avg'))
{
function multi_array_avg($array)
{
    $num = array_sum($array);

    $percentages_result = [];

    foreach ($array as $key => $hits)
    {
	array_push($percentages_result, ['key' => $key, 'hits' => round($hits / $num * 100, 1)]);
    }

    return $percentages_result;

}
}


/**
 * Sort an array by chars length of the values.
 * Usage: usort($array, 'sortArrayByValuesLength');
 * @param type $a
 * @param type $b
 * @return type
 */
if (! function_exists('sortArrayByValuesLength'))
{
function sortArrayByValuesLength($a, $b)
{
    return strlen($b) - strlen($a);

}
}


/**
 * Given an array multidimensional e.g. [0][0] = 1, [0][0] = 2,[1][0] = 10,[1][1] = 20, 
 * return an array with unique values. Useful for manage matches in regex
 * @param array $arrayToFlatten
 * @return array $flatArray
 */
if (! function_exists('flattenArray'))
{
function flattenArray($arrayToFlatten)
{
    $flatArray = [];

    foreach ($arrayToFlatten as $element)
    {
	if (is_array($element))
	{
	    $flatArray = array_merge($flatArray, flattenArray($element));
	} else
	{
	    $flatArray[] = $element;
	}
    }
    return $flatArray;

}
}


/**
 * Imploding an array into a string. (recursively, if necessary)
 * @param string $glue
 * @param array $input
 * @return string
 */
if (! function_exists('implode_recursive'))
{
function implode_recursive($glue, $input)
{

    if (empty($input))
	return '';

    if (!is_array($input) and!is_string($input))
    {
	return $input;
    } elseif (is_string($input))
	return $input;


    foreach ($input as $index => $element)
    {
	if (empty($element))
	    continue;
	if (is_array($element))
	{
	    $input[$index] = implode_recursive($glue, $element);
	}
    }

    switch (gettype($input))
    {
	case 'array':
	    $out = implode($glue, $input);
	    break;
	case 'string':
	    $out = $input;
	    break;
	default:
	    $out = (string) $input;
    }

    $out = str_replace('  ', ' ', $out);

    return ltrim($out);

}
}


/**
 * Sort an array by elements length
 * @param type $a
 * @param type $b
 * @return type
 */
if (! function_exists('lensort'))
{
function lensort($a, $b)
{
    return strlen($b) - strlen($a);
}
}


/**
 * Return first element of an array
 * @param array $array
 * @return array|string
 */
if (! function_exists('first'))
{
function first($array)
{
    if (!is_array($array))
	return $array;
    
    if (!count($array))
	return null;
    
    reset($array);
    
    return $array[key($array)];
}
}


/**
 * Return last element of an array
 * @param array $array
 * @return array|string
 */
if (! function_exists('last'))
{
function last($array)
{
    if (!is_array($array))
	return $array;
    
    if (!count($array))
	return null;
    
    end($array);
    return $array[key($array)];

}
}


/**
 * Sort 2d array 
 * @param array $array
 * @param string $key the array key to use for reordering
 * @param string $order ASC DESC
 * @return array $new the input array reordered
 */
if (! function_exists('sort2dArray'))
{
function sort2dArray($array, $key, $order = 'ASC')
{
   //    dumpx($array); die();
   if (!is_array($array))
       return $array;

   if (count($array) < 2)
       return $array;

   $new = array($array[0]);

   for ($cnt = 1; $cnt <= count($array) - 1; $cnt++)
   {
       $stop = 0;
       $splice = 0;

       for ($newcnt = 0; $newcnt <= count($new) - 1; $newcnt++)
       {
	   if ($stop == 0)
	   {
	       if ($order == 'ASC')
		   if (isset($array[$cnt][$key]) && $array[$cnt][$key] < $new[$newcnt][$key])
		   {
		       $splice = $newcnt;
		       $stop = 1;
		   } // splice position for ASC 
	       if ($order == 'DESC')
		   if (isset($array[$cnt][$key]) && $array[$cnt][$key] > $new[$newcnt][$key])
		   {
		       $splice = $newcnt;
		       $stop = 1;
		   } // splice position for DESC 
	   } // stop vying for position 
       } // cycle through new array to find position 
       if ($stop == 0)
       {
	   $new[] = $array[$cnt];
       } else
       {
	   array_splice($new, $splice, 0, array($array[$cnt]));
       } // splice into new array while keeping somewhat the original order 
   } // cycle through original array 
   return $new;

}
}


/**
 * Sum numeric values of an array by a given key
 * @param array $array
 * @param string $key
 * @return numeric $sum
 */
if (! function_exists('multiArraySum'))
{
function multiArraySum($array, $key)
{

    $sum = 0;
    foreach ($array as $item)
    {
	$sum += $item[$key];
    }
    return $sum;

}
}


/**
 * Implodes a nested array into a single string recursively
 * Imploding an array into a string. (recursively, if necessary)
 * @param string $glue
 * @param array $input
 * @return string
 */
if (! function_exists('implodeRecursive'))
{
function implodeRecursive($glue, $input)
{

    if (empty($input))
	return '';

    if (!is_array($input) and ! is_string($input))
    {
	return $input;
    } elseif (is_string($input))
	return $input;


    foreach ($input as $index => $element)
    {
	if (empty($element))
	    continue;
	if (is_array($element))
	{
	    $input[$index] = implodeRecursive($glue, $element);
	}
    }

    switch (gettype($input))
    {
	case 'array':
	    $out = implode($glue, $input);
	    break;
	case 'string':
	    $out = $input;
	    break;
	default:
	    $out = (string) $input;
    }

    $out = str_replace('  ', ' ', $out);

    return ltrim($out);

}
}


/**
 * Unicize a multidimensional array by a given key
 * @param array $array
 * @param string $key
 * @return array $array
 */
if (! function_exists('arrayUniqueRecoursive'))
{
function arrayUniqueRecoursive($array, $key)
{
    $temp_array = [];
    $key_array = [];

    foreach ($array as $i => $val)
    {
	if (!in_array($val[$key], $key_array))
	{
	    $key_array[$i] = $val[$key];
	    $temp_array[$i] = $val;
	}
    }
    return $temp_array;

}
}


/**
 * Reindex an array
 * @param array
 * @return array updated
 */
if (! function_exists('rebuildArrayIndex'))
{
function rebuildArrayIndex($array)
{

    if (!is_array($array))
    {
	return $array;
    }

    foreach ($array as $n => $word)
    {
	if (count($word) == 0)
	{
	    unset($array[$n]);
	} else
	{
	    $array[$n] = array_values($array[$n]);
	}
    }
    $array = array_values($array);

    return $array;

}
}


/**
 * Order an array by elements length
 * @param array $a	?
 * @param array $b	?
 * @return array (updated)
 */
if (! function_exists('sortArrayByLenght'))
{
function sortArrayByLenght($a, $b)
{
    $la = strlen($a);
    $lb = strlen($b);
    if ($la == $lb)
    {
	return strcmp($a, $b);
    }
    return $la - $lb;

}
}


/**
 * Remove empty elements in an array
 * @param array $array
 * @return array $array updated
 */
if (! function_exists('removeEmptyValues'))
{
function removeEmptyValues($array)
{
    $array = array_filter($array, function($value) {
	return $array !== '';
    });

    return $array;

}
}


/**
 * Return all the possibile combinations of elements in an array
 * @param array $array
 * @return array $results
 */
if (! function_exists('pcArrayPowerSet'))
{
function pcArrayPowerSet($array)
{
    // initialize by adding the empty set
    $results = array(array());

    foreach ($array as $element)
	foreach ($results as $combination)
	    array_push($results, array_merge(array($element), $combination));

    return $results;

}
}


/**
 * Given an array and a chain of keys, return the value
 * Eg. calling getVal($data,array('foo','bar','2017-08')) will return the equivalent of
 * $data['foo']['bar']['2017-08']
 */
if (! function_exists('getKeyChainValueFromArray'))
{
function getKeyChainValueFromArray($data, $chain)
{
	$result = $data;
	for($i=0;$i<count($chain);$i++)
	{
		if(isset($result[$chain[$i]]))
		{
				$result = $result[$chain[$i]];
		}
			else
		{
				return null; // key does not exist, return null
		}
	}

	return $result;
}
}


/**
 * Given a $pos_arr return php code to paste in a unit test file
 * @param array $pos_arr
 * @return string test_function
 */
if (! function_exists('createTestFunctions'))
{
    function createTestFunctions($orig_sentence, $pos_arr)
    {
	$pos_arr = \NaiPosTagger\Models\NaiPosArr::flatPosArr($pos_arr);
	
	$test_function = "public function testPosTagging".time()."_".rand(1, 10000)."() {\n" .
	
	    "\t" . '$PipelinePosTagging = new PipelinePosTagging();' . "\n" .
	
	    "\t" . '$PipelinePosTagging->language = "en";' . "\n\n" .
	
	    "\t" . '$sentence = "'.preg_replace('/"/', '\"', trim($orig_sentence)).'";' . "\n" .
	
	    "\t" . '$pos_arr = $PipelinePosTagging->transform($sentence);' . "\n" .

	    "\t" . '$PipelinePosTagging = null;' . "\n\n" .
		
	    "\t" . '$pos_arr = NaiPOsArr::flatPosArr($pos_arr);' . "\n\n" .
	
	    "\t" . '$this->assertEquals(implode(" ", array_column($pos_arr, \'features\')), "'.implode(" ", array_column($pos_arr, 'features')).'");' . "\n" .

	"}" . "\n\n";
	
	return $test_function;
    }
}