<template>
    <div class="articles">
        <!--search-->
        <div class="input-group mb-3"
             style="width: 50vw;margin-right: auto;margin-left: auto;margin-top: 10px;margin-bottom: 10px!important;">
            <input type="text" class="form-control " v-model="tableData.search" placeholder="Suche"
                   @input="conditionalSearch()">
            <select v-model="perPage" class="form-control col-2" @change="getArticles()">
                <option value="5" selected="selected">5</option>
                <option value="10">10</option>
                <option value="13">13</option>
            </select>

        </div>


        <!--        table-->

        <b-table :items="articles" :fields="fields" :per-page="perPage" :current-page="currentPage" responsive hover>
            <template #cell(hinzufügen)="data">
                <b-button @click="addToShop(data.item.id)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </b-button>
            </template>
        </b-table>
        <!--        pagination-->
        <b-pagination
            v-model="currentPage"
            :total-rows="rows"
            :per-page="perPage"
            align="center"
        ></b-pagination>

    </div>
</template>

<script>

export default {
    props: ['searchKey',],
    created() {
        this.getArticles();
        if (this.searchKey) {
            this.tableData.search = this.searchKey;
            this.conditionalSearch(this.tableData.search);
        }
    },
    data() {
        return {
            perPage: 5,
            currentPage: 1,
            articles: [],
            tableData: {
                draw: 0,
                search: '',
            },
            fields: [
                {
                    label: 'Artikel',
                    key: 'ab_name',
                    sortable: true
                },
                {
                    label: 'Preis',
                    key: 'ab_price',
                    sortable: true
                },
                {
                    label: 'Beschreibung',
                    key: 'ab_description',
                    sortable: true
                },
                {
                    label: 'Verkäufer',
                    key: 'ab_creator_id',
                    sortable: true
                },
                'Hinzufügen',


            ],
        }
    },
    methods: {
        getArticles(url = 'http://127.0.0.1:8000/api/article') {
            this.tableData.draw++;
            axios.get(url, {params: this.tableData})
                .then(response => {
                    let data = response.data;
                    if (this.tableData.draw == data.draw) {
                        this.articles = data.data;
                    }
                })
                .catch((errors => {
                    console.log(errors);
                }))
        },
        conditionalSearch() {
            if (this.tableData.search.length > 2 || this.tableData.search == "") {
                this.getArticles();
            }
        },
        addToShop(id) {
            axios.post('http://127.0.0.1:8000/api/shoppingkart', {
                'articleid': id
            })
                .then(response => {
                    console.log(response);
                })
                .catch((errors => {
                    console.log(errors);
                }))
        }

    },
    computed: {
        rows() {
            return this.articles.length;
        }
    },
}
;
</script>

<style scoped>

</style>
