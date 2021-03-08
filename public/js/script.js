var vm = new Vue({
    el: '#app',
    data: vmdata,
    methods: {
        searchProperties() {
            axios.get(`${this.endpoint}/properties/search?field=${this.field}&term=${this.term}`).then(response => {
                this.properties = response.data.properties;
            });
        },
        updateProperties() {
            axios.get(`${this.endpoint}/properties`).then(response => {
                this.properties = response.data.properties;
            });
        },
        deleteProperty(id) {
            axios
                .delete(`${this.endpoint}/properties/${id}`)
                .then(response => {
                    this.updateProperties();
                });
        }
    }
});
