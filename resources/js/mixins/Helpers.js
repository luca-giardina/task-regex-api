export default {
    data: function() {
        return {
            result: "",
            errors: ""
        }
    },
    methods: {
        clearResults() {
            this.errors = ""
            this.result = ""
        },
        getResult(url, string) {
            this.clearResults()
            axios.post(url, {
                string: string
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
