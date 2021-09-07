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
 * Collect what the AI thinks... used for debug
 */
class NaiMyThoughts
{
    public static $thoughts = [];
    
    public static function collect($class, $method, $thought)
    {
	self::$thoughts[] = $method.' | '.$thought;
    }

}
