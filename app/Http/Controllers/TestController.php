<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Helpers;

class TestController extends Controller
{
    public function recursion(Request $request) {
        $data = $this->validateString($request);
        try {
            $aString = str_split($data["string"]);
            $result = Helpers::reverseString($aString);
        }
        catch(\Exception $e) {
            return response()->json([
                "message" => $this->aError["500"]
            ], 500);
        }
        return [
            'result' => $result
        ];
    }

    public function palindrimes(Request $request) {
        $data = $this->validateString($request);

        try {
            $result = Helpers::palindrome($data["string"]);
        }
        catch(\Exception $e) {
            return response()->json([
                "message" => $this->aError["500"]
            ], 500);
        }
        return [
            'result' => $result
        ];
    }

    public function wordCount(Request $request) {
        $data = $this->validateString($request);
        try {
            $result = Helpers::countWords($data["string"]);
        }
        catch(\Exception $e) {
            return response()->json([
                "message" => $this->aError["500"]
            ], 500);
        }
        return [
            'result' => $result
        ];
    }

    public function anagram(Request $request) {
        $data = $this->validateString($request);

        try {
            // json validation
            $string = str_replace("'", '"', $data["string"]);
            $aWords = json_decode($string, JSON_THROW_ON_ERROR);

            if(json_last_error()) {
                return response()->json([
                        "message" => $this->aError["422"]
                    ], 422);
            }

            $result = Helpers::combine_anagrams($aWords);
        }
        catch(\Exception $e) {
            return response()->json([
                "message" => $this->aError["500"]
            ], 500);
        }

        return [
            'result' => $result
        ];
    }
}
