<?php

/**
 * Выбирает анаграммы из заданного массива
 * 
 * @param array $array Одномерный массив с произвольными словами или числами
 * 
 * @return array Двумерный массив с анаграммами, массив с сообщением об ошибке в случае недопустимого значения в $array;
 */
function getAnagrams(array $array) : array
{
    $result = [];

    foreach ($array as $key => $word) {
        if (gettype($word) !== 'string' && gettype($word) !== 'integer' && gettype($word) !== 'double') {
            $position = $key + 1;
            return ["Недопустимое значение на $position месте"];
        }

        $currentWord = (string) $word;
        $currentResult = [$word];
        $splitedWord = str_split($currentWord);
        sort($splitedWord);
        unset($array[$key]);

        foreach ($array as $index => $value) {
            if (gettype($value) !== 'string' && gettype($value) !== 'integer' && gettype($value) !== 'double') {
                $position = $index + 1;
                return ["Недопустимое значение на $position месте"];
            }

            if (strlen($value) === count($splitedWord)) {
                $newWord = (string) $value;
                $splitedNewWord = str_split($newWord);
                sort($splitedNewWord);
        
                if ($splitedWord === $splitedNewWord) {
                    $currentResult[] = $newWord;
                    unset($array[$index]);
                }
            }
        }

        if (count($currentResult) > 1) {
            $result[] = $currentResult;
        }
    }

    return $result;
}