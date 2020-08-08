<?php

namespace App;

class Helpers
{
    // HELPERS
    static function palindrome($string) {
        $string = strtolower(preg_replace("/[^a-zA-Z]+/", "", $string));
        return $string == self::reverseString(str_split($string));
    }

    static function reverseString($aStr) {
        if(count($aStr) == 1) {
            return $aStr[0];
        }

        return self::reverseString(array_splice($aStr, 1)) . $aStr[0];
    }

    static function countWords($string) {
        $string = strtolower(preg_replace("/[^a-zA-Z]+[\s]+/", " ", $string));
        $words = array_unique(explode(" ", $string));

        $result = [];

        foreach ($words as $word) {
            $result[$word] = preg_match_all("/\b$word\b/i", $string);
        }

        return $result;
    }
}
