<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Anagram</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <input @keyup="clearResults" v-model="anagram" type="text" class="form-control">
                        </div>
                        <div class="col-3">
                            <button
                                @click="anagramCheck"
                                class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                    <div class="row">
                        <!-- errors -->
                        <div class="col-12 p-4" v-if="result !== ''">
                            <div><strong>Result:</strong></div>
                            <div class="text-success">{{result}}</div>

                            <div class="col-12 text-center">
                                <button
                                    @click="clearResults"
                                    class="btn btn-danger">Clear</button>
                            </div>

                        </div>
                        <!-- response -->
                        <div class="col-12 p-4" v-if="errors">
                            <div class="text-danger">{{errors}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Helpers from '../mixins/Helpers'

export default {
    mixins: [Helpers],
    data() {
        return {
            anagram: ""
        }
    },
    mounted() {
        console.log('Anagram mounted.')
    },
    methods: {
        anagramCheck() {
            this.getResult('/api/anagram', this.anagram)
        }
    }
}
</script>
