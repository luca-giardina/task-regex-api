<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class TestController extends Controller
{
    public function recursion(Request $request) {
        $data = $this->validateString($request);

        return [
            'string' => $this->reverseString(str_split($data["string"]))
        ];
    }

    public function palindrimes(Request $request) {
        $data = $this->validateString($request);

        return [
            'result' => $this->palindrome($data["string"])
        ];
    }

    public function wordCount(Request $request) {
        $data = $this->validateString($request);

        return [
            'result' => $this->countWords($data["string"])
        ];
    }


    // HELPERS
    private function palindrome($string) {
        $string = strtolower(preg_replace("/[^a-zA-Z]+/", "", $string));
        return $string == $this->reverseString(str_split($string));
    }

    private function reverseString($aStr) {
        if(count($aStr) == 1) {
            return $aStr[0];
        }

        return $this->reverseString(array_splice($aStr, 1)) . $aStr[0];
    }

    private function countWords($string) {
        $string = strtolower(preg_replace("/[^a-zA-Z]+[\s]+/", " ", $string));
        $words = array_unique(explode(" ", $string));

        $result = [];

        foreach ($words as $word) {
            $result[$word] = preg_match_all("/\b$word\b/i", $string);
        }

        return $result;
    }
}
