<template>
    <div class="container">
        <hr />
        <h1 class="text-center">Test</h1>
        <hr />
        <recursion />
        <hr />
        <palindrimes />
        <hr />
        <word-count />
        <hr />
        <anagram />
    </div>
</template>

<script>

import Recursion from '../components/RecursionComponent'
import Palindrimes from '../components/PalindrimesComponent'
import WordCount from '../components/WordCountComponent'
import Anagram from '../components/AnagramComponent'

export default {
    components: {
        Recursion,
        Palindrimes,
        WordCount,
        Anagram,
    }
}

</script>
