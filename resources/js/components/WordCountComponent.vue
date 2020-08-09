<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Word Count</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <input @keyup="clearResults" v-model="wordCount" type="text" class="form-control">
                        </div>
                        <div class="col-3">
                            <button
                                @click="wordCountCheck"
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
import axios from 'axios';

export default {
    data() {
        return {
            wordCount: "",
            result: "",
            errors: ""
        }
    },
    mounted() {
        console.log('Word count mounted.')
    },
    methods: {
        clearResults() {
            this.errors = ""
            this.result = ""
        },
        wordCountCheck() {
            this.clearResults()
            axios.post('/api/word-count', {
                string: this.wordCount
            }).then(response => {
                if(response.status == 200) {
                    this.result = response.data.result
                }
                else {
                    this.errors = response.errors
                }
            }).catch(error => {
                this.errors = error.response.data.message
            })
        }
    }
}
</script>
