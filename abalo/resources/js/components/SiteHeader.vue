<template>
    <div>
        <!--        Logo-->
        <b-container class="logo">
            <b-row align-v="center">
                <b-col>
                </b-col>
                <b-col><img :src="'img/abalo_logo.png'" class="rounded border border-secondary logo__image" alt="">
                </b-col>
                <b-col>
                    <b-button v-b-toggle.sidebar-1>
                        Warenkorb
                    </b-button>
                </b-col>
            </b-row>
        </b-container>

        <!--        sidebar-->
        <div>
            <b-sidebar id="sidebar-1" title="Warenkorb" bg-variant="dark" text-variant="light" shadow
                       @shown="refreshShoppingkart">
                <div v-if="this.isLoading" class="text-center">
                    <b-spinner label="Spinning"></b-spinner>
                </div>
                <div class="px-3 py-2" v-else-if="!this.isLoading">
                    <b-card bg-variant="info" text-variant="dark" v-for="shopItem in shopItems" key="id" class="mb-2">
                        <template #header>{{ shopItem.ab_name }}</template>
                        <b-card-text>
                            {{ shopItem.ab_description }}
                            <br/>
                            {{ shopItem.ab_price }} €
                        </b-card-text>
                        <template #footer>
                            <b-button variant="danger" @click="deleteShopItem(shopItem.id)">Entfernen</b-button>
                        </template>

                    </b-card>
                </div>
            </b-sidebar>
        </div>

        <!--        nav-->
        <nav class="nav nav-justified border" style="height: 3em;background: rgba(0,0,0,0.1)">
            <a v-for="main in itemWithSub" :key="main.id" class="nav-link text-dark" @click="$emit('clicked',main.ref)">{{
                    main.name
                }}</a>
            <li class="nav-item dropdown">
                <p class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    {{ this.menu.mainPoints[4].name }}
                </p>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a class="dropdown-item"
                           @click="$emit('clicked',this.menu.subs[0].ref)">{{ this.menu.subs[0].name }}</a></li>
                    <li><a class="dropdown-item"
                           @click="$emit('clicked',this.menu.subs[1].ref)">{{ this.menu.subs[1].name }}</a></li>

                </ul>
            </li>

        </nav>
    </div>
</template>

<script>
export default {

    name: "SiteHeader",
    data() {
        let menu = {
            mainPoints:
                [
                    {id: 1, name: 'Home', ref: 'home', sub: false},
                    {id: 2, name: 'Kategorien', ref: 'categories', sub: false},
                    {id: 3, name: 'Verkauf', ref: 'table', sub: false},
                    {id: 4, name: 'Neuen Artikel hinzufügen', ref: 'new', sub: false},
                    {id: 5, name: 'Unternehmen', ref: '', sub: 1},
                ],
            subs:
                [
                    {id: 1, name: 'Karriere', ref: 'karriere', subFrom: 'Unternehmen'},
                    {id: 2, name: 'Philosophie', ref: 'philosophie', subFrom: 'Unternehmen'},

                ],
        };
        return {
            isLoading: true,
            menu: menu,
            shopItems: [],
        };
    },
    computed: {
        itemWithSub: function () {
            return this.menu.mainPoints.filter(function (u) {
                return !u.sub
            })
        }
    },
    methods: {
        refreshShoppingkart() {
            this.isLoading = true;
            this.shopItems = [];
            axios.get('http://127.0.0.1:8000/api/shoppingkart')
                .then(response => {
                    response.data.itemId.forEach(shopId => {
                            axios.get('http://127.0.0.1:8000/api/shoppingkart/' + shopId.ab_article_id)
                                .then(response => {
                                    this.shopItems = this.shopItems.concat(response.data.shopItem[0]);
                                    console.log(this.shopItems);
                                })
                                .catch(errors => {
                                    console.log(errors);
                                })
                        }
                    );
                    this.isLoading = false;

                })
                .catch(errors => {
                    console.log(errors);
                })
        },
        deleteShopItem(id) {
            axios.delete('http://127.0.0.1:8000/api/shoppingkart/' + id)
                .then(response => {
                    this.refreshShoppingkart();
                })
                .catch(errors => {
                    console.log(errors);
                })
        },
    }
}
</script>

<style scoped>

</style>
