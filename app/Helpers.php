<?php

namespace App;

class Helpers
{
    public static function palindrome($string) {
        $string = strtolower(preg_replace("/\W/", "", $string));
        return $string == self::reverseString(str_split($string));
    }

    public static function reverseString($aStr) {
        if(count($aStr) == 1) {
            return $aStr[0];
        }

        return self::reverseString(array_slice($aStr, 1)) . $aStr[0];
    }

    public static function countWords($string) {
        $string = strtolower(self::sanitizeString($string));
        $words = array_unique(explode(" ", $string));

        $result = [];

        foreach ($words as $word) {
            $result[$word] = preg_match_all("/\b$word\b/i", $string);
        }

        return $result;
    }

    public static function combine_anagrams($aWords) {
        if(!count($aWords)) return [];

        $aGroups = [];

        foreach ($aWords as $word) {
            // ordering
            $aString = str_split(strtolower($word));
            sort($aString);
            $sortedWord = implode('', $aString);

            // populating results
            if(!isset($aGroups[$sortedWord])) {
                $aGroups[$sortedWord] = [];
            }
            // checkin duplicates
            if(!in_array($word, $aGroups[$sortedWord])) {
                $aGroups[$sortedWord][] = $word;
            }
        }

        return array_values($aGroups);
    }

    public static function sanitizeString($str) {
        return preg_replace("/[\W]+[\s]+/", " ", $str);
    }
}
