<?php

/*
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

namespace NaiPosTagger\Filters;

/**
 * Traits for english dates
 */
trait NaiDatesTrait {

    /** combinations 2/10/2016 or 10-31-1970 */
    public static $re_1 = '/\s((?:[0-9]{1,2}\s?(?:\/|\-)\s?)(?:[0-9]{1,2}\s?(?:\/|\-)\s?)(?:[0-9]{2,4}))\s?/ui';
    
    /** short e.g. 10/31  */
    // @todo try ([0-3]?[0-9])\/([0-3]?[0-9])\/((?:[0-9]{2})?[0-9]{2})\s
    public static $re_2 = '/\s((?:[0-9]{1,2}\s?(?:\/)\s?)(?:[0-9]{1,4}))\s?/ui';

    /** years + a prefix e.g. in|sincel|il|data 2015
    public static $re_3 = '/\s(?!(?:of|in|since|early|date|q1|q2|q3|q4|q5|q6|year|day)\s)((?:19|20)\d{2})(?:\s|\?)/ui';

    /** for validation  */
    public static $re_valid_1 = '/([0-3][0-9])\/([0-3]?[0-9])\/((?:[0-9]{2})?[0-9]{2})/';

}


/**
 * Class definition
 */
class NaiDatesFilterTrait extends NaiDatesFilter {
    use NaiDatesTrait;
}
