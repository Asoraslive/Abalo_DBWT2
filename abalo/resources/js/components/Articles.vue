<template>
    <div class="articles">

        <div class="input-group mb-3"
             style="width: 50vw;margin-right: auto;margin-left: auto;margin-top: 10px;margin-bottom: 10px!important;">
            <input type="text" class="form-control " v-model="tableData.search" placeholder="Suche"
                   @input="conditionalSearch()">
            <select v-model="tableData.length" class="form-control col-2" @change="getArticles()">
                <option value="5" selected="selected">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>

        </div>

        <datatable :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders" @sort="sortBy"
                   style="background: rgba(0,0,0,0.1)">

            <tbody>
            <tr v-for="article in articles" :key="article.id">
                <td>{{ article.ab_name }}</td>
                <td>{{ article.ab_price }}</td>
                <td>{{ article.ab_description }}</td>
                <td>{{ article.ab_creator_id }}</td>
            </tr>
            </tbody>

        </datatable>
        <pagination :pagination="pagination"
                    @prev="getArticles(pagination.prevPageUrl)"
                    @next="getArticles(pagination.nextPageUrl)">

        </pagination>

    </div>
</template>

<script>
import Datatable from "./Datatable";
import Pagination from "./Pagination";

export default {
    components: {datatable: Datatable, pagination: Pagination},
    props:['searchKey',],
    created() {
        this.getArticles();
        if (this.searchKey){
            this.tableData.search = this.searchKey;
            this.conditionalSearch(this.tableData.search);
        }
    },
    data() {
        let sortOrders = {};
        let columns = [
            {width: '16%', label: 'Name', name: 'ab_name'},
            {width: '16%', label: 'Preis', name: 'ab_price'},
            {width: '50%', label: 'Beschreibung', name: 'ab_description'},
            {width: '16%', label: 'Verkäufer', name: 'ab_creator_id'},
        ];
        columns.forEach((column) => {
            sortOrders[column.name] = -1;
        })
        return {
            articles: [],
            columns: columns,
            sortKey: 'ab_price',
            sortOrders: sortOrders,
            tableData: {
                draw: 0,
                length: 10,
                search: '',
                column: 0,
                dir: 'desc',
            },
            pagination: {
                lastPage: '',
                currentPage: '',
                total: '',
                lastPageUrl: '',
                nextPageUrl: '',
                prevPageUrl: '',
                from: '',
                to: ''
            }
        }
    },
    methods: {
        configPagination(data) {
            this.pagination.lastPage = data.last_page;
            this.pagination.currentPage = data.current_page;
            this.pagination.total = data.total;
            this.pagination.lastPageUrl = data.last_page_url;
            this.pagination.nextPageUrl = data.next_page_url;
            this.pagination.prevPageUrl = data.prev_page_url;
            this.pagination.from = data.from;
            this.pagination.to = data.to;
        },
        getArticles(url = 'http://127.0.0.1:8000/api/article') {
            this.tableData.draw++;
            axios.get(url, {params: this.tableData})
                .then(response => {
                    let data = response.data;
                    if (this.tableData.draw == data.draw) {
                        this.articles = data.data.data;
                        this.configPagination(data.data);
                    }
                })
                .catch((errors => {
                    console.log(errors);
                }))
        },
        sortBy(key) {
            this.sortKey = key;
            this.sortOrders[key] = this.sortOrders[key] * -1;
            this.tableData.column = this.getIndex(this.columns, 'name', key);
            this.tableData.dir = this.sortOrders[key] === 1 ? 'asc' : 'desc';
            this.getArticles();
        },
        getIndex(array, key, value) {
            return array.findIndex(column => column[key] == value);
        },
        conditionalSearch() {
            if (this.tableData.search.length > 2 || this.tableData.search == "") {
                this.getArticles();
            }
        }

    }
};
</script>

<style scoped>

</style>
