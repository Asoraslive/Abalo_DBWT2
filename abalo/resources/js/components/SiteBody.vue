<template>
    <div>
<!--        <articles v-if="bodyRef == 'table'" :searchKey="homeSearch"/>-->
        <bvtable v-if="bodyRef == 'table'" :searchKey="homeSearch"></bvtable>
        <homepage v-else-if="bodyRef == 'home'"/>
        <impressum v-else-if="bodyRef== 'impressum'"></impressum>
        <articleform v-else-if="bodyRef== 'new'"></articleform>
        <h1 v-else> Keine Seite vorhanden!</h1>
    </div>
</template>

<script>
import Articles from "./Articles";
import HomepageBody from "./HomepageBody";
import Impressum from "./Impressum";
import article_form from "./article_form";
import bvTable from "./bvTable";

export default {
    components: {articles: Articles,homepage:HomepageBody,impressum :Impressum,articleform:article_form,bvtable:bvTable},
    props: ['bodyRef','homeSearch'],
}
</script>

<style scoped>

</style>
