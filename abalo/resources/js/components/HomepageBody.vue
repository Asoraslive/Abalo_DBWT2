<template>
    <div>
        <h2 style="margin: 10px auto;display: block;width: -moz-fit-content;">Die Letzten
            Einträge: </h2>
        <b-card-group columns style="margin: 20px 50px">
            <b-card v-for="article in articles" :key="article.id" border-variant="secondary"
                    style="background: rgba(0,0,0,0.1)">
                <b-card-title>{{ article.ab_name }}</b-card-title>
                <b-card-text>
                    {{ article.ab_description }}
                </b-card-text>
                <b-card-sub-title>{{ article.ab_price }}€</b-card-sub-title>
            </b-card>
        </b-card-group>
    </div>
</template>

<script>
export default {
    name: "HomepageBody",
    created() {
        this.getLastArticles();
    },
    data() {
        return {
            articles: [],
        }

    },
    methods: {
        getLastArticles() {
            axios.get('http://127.0.0.1:8000/api/lastarticles', {params: this.articles})
                .then(response => {
                    let data = response.data;
                    this.articles = data.articles;
                })
                .catch((errors => {
                    console.log(errors);
                }))
        },
    },
}
</script>

<style scoped>

</style>
