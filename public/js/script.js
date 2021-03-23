var vm = new Vue({
    el: '#app',
    data: vmdata,
    methods: {
        searchProperties(page = 1) {
            if (this.field === "" || this.term === "") {
                this.updateProperties(page)
            } else {
                axios.get(`${this.endpoint}/properties/search?field=${this.field}&term=${this.term}&page=${page}&limit=15`).then(response => {
                    this.properties.data = response.data.properties.data;
                });
            }
        },
        updateProperties(page = 1) {
            axios.get(`${this.endpoint}/properties?page=${page}&limit=15`).then(response => {
                this.properties.data = response.data.properties.data;
            });
        },
        deleteProperty(id) {
            axios
                .delete(`${this.endpoint}/properties/${id}`)
                .then(response => {
                    this.updateProperties();
                });
        }
    },
    computed: {
        paginationCount() {
            if (this.properties.last_page > 5 && (this.properties.current_page + 5 < this.properties.last_page)) {
                return 5;
            }
            return this.properties.last_page - (this.properties.current_page + 5);
        }
    }
});
