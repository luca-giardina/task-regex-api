<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Recursion</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <input @keyup="clearResults" v-model="recursion" type="text" class="form-control">
                        </div>
                        <div class="col-3">
                            <button
                                @click="recursionCheck"
                                class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                    <div class="row">
                        <!-- errors -->
                        <div class="col-12 p-4" v-if="result">
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
            recursion: "",
            result: "",
            errors: ""
        }
    },
    mounted() {
        console.log('Recursion mounted.')
    },
    methods: {
        clearResults() {
            this.errors = ""
            this.result = ""
        },
        recursionCheck() {
            this.clearResults()
            axios.post('/api/recursion', {
                string: this.recursion
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
