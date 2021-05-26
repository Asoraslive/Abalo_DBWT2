<template>
    <div>
        <img  :src="'img/abalo_logo.png'" alt="" style="margin-left: auto;margin-right: auto;display: block" width="auto" height="200" >

        <nav class="nav nav-justified border">
            <a v-for="main in itemWithSub" :key="main.id" class="nav-link " @click="$emit('clicked',main.ref)">{{main.name}}</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{this.menu.mainPoints[3].name}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a class="dropdown-item" @click="$emit('clicked',this.menu.subs[0].ref)">{{this.menu.subs[0].name}}</a></li>
                        <li><a class="dropdown-item" @click="$emit('clicked',this.menu.subs[1].ref)">{{this.menu.subs[1].name}}</a></li>

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
                    {id:1,name: 'Home', ref: 'home', sub: false},
                    {id:2,name: 'Kategorien', ref: 'categories', sub: false},
                    {id:3,name: 'Verkauf', ref: 'table', sub: false},
                    {id:4,name: 'Unternehmen', ref: '', sub: 1},
                ],
            subs:
                [
                    {id:1,name: 'Karriere', ref: 'karriere', subFrom: 'Unternehmen'},
                    {id:2,name: 'Philosophie', ref: 'philosophie', subFrom: 'Unternehmen'},

                ],
        }

        return {
            menu: menu,
        };
    },
    computed: {
      itemWithSub: function (){
          return this.menu.mainPoints.filter(function (u){
              return !u.sub
          })
      }
    },
    methods:{
    }
}
</script>

<style scoped>

</style>
