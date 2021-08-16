# N-ai php pos tagger

A part of speech tagger written in PHP.
This is the english version. Documentation and TODO are coming, more info and demo on [n-ai.cloud]

## Installation

1. in your project folder e.g. "_myproject_" install the package via [composer];

2. create folder "_dictionaries_";

3. inside folder "_dictionaries_" clone or download the [english dictionary] repository;

4. run this example script:

```php
use NaiPosTagger\Pipelines\PipelinePosTagging;
use NaiPosTagger\Models\NaiPosArr;


include('vendor/autoload.php');

define('DICTIONARIES_PATH', __DIR__ . '/./dictionaries/dictionaries-');

define('TRAITS_PATH', __DIR__ . '/./vendor/nai-php/naipostagger/src/');

$sentence = 'my name is Fred';

$PipelinePosTagging = new PipelinePosTagging();

$PipelinePosTagging->language = 'en';

$pos_arr = $PipelinePosTagging->transform($sentence);

// for a clear output, better hide metadata
$pos_arr = NaiPosArr::clearMetadata($pos_arr);

diex($pos_arr);

```


And the output will be:

```php
Array
(
    [0] => Array
        (
            [0] => Array
                (
                    [form] => .
                    [lemma] => .
                    [features] => SENT
                    [sh-feat] => SENT
                    [label] => 
                    [rule] => 
                    [pos_score] => 0
                )

        )

    [1] => Array
        (
            [0] => Array
                (
                    [form] => my
                    [lemma] => my
                    [features] => ADJ:pos+m+s
                    [sh-feat] => ADJ
                    [label] => 
                    [rule] => 
                    [pos_score] => 0
                )

        )

    [2] => Array
        (
            [0] => Array
                (
                    [form] => name
                    [lemma] => name
                    [features] => NOUN-m:s
                    [sh-feat] => NOUN
                    [label] => 
                    [rule] => 
                    [pos_score] => 0
                )

            [1] => Array
                (
                    [form] => name
                    [lemma] => name
                    [features] => VER:inf+pres
                    [sh-feat] => VER
                    [label] => 
                    [rule] => 
                    [pos_score] => -0.7
                )

        )

    [3] => Array
        (
            [0] => Array
                (
                    [form] => is
                    [lemma] => is
                    [features] => VER:ind+pres+3+s
                    [sh-feat] => VER
                    [label] => 
                    [rule] => 
                    [pos_score] => 0
                )

        )

    [4] => Array
        (
            [0] => Array
                (
                    [form] => Fred
                    [lemma] => Fred
                    [features] => NPR
                    [sh-feat] => NPR
                    [label] => 
                    [rule] => 
                    [pos_score] => 0
                )

        )

    [5] => Array
        (
            [0] => Array
                (
                    [form] => .
                    [lemma] => .
                    [features] => SENT
                    [sh-feat] => SENT
                    [label] => 
                    [rule] => 
                    [pos_score] => 0
                )

        )

)
```

## To do list

- [ ] Clean, check, fix and tag term in dictionaries
- [ ] Clean, check, fix brill rules
- [ ] Add more ngrams
- [ ] Add more tests, expecially for filters
- [ ] Collect and load frill words
- [ ] Better Oop for some classes?
- [ ] Find contributors
- [ ] In module for logical analysis (yet not published) collect synonyms and temporal expressions

[n-ai.cloud]: https://www.n-ai.cloud
[english dictionary]: https://github.com/nai-php/databases.git
[composer]: https://packagist.org/packages/nai-php/naipostagger
