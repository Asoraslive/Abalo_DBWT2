<template>
    <div>
        <articles v-if="bodyRef == 'table'" />
        <homepage v-else-if="bodyRef == 'home'" />
        <h1 v-else> Keine Seite vorhanden!</h1>
    </div>
</template>

<script>
import Articles from "./Articles";
import HomepageBody from "./HomepageBody";

export default {
    components: {articles: Articles,homepage:HomepageBody},
    props: ['bodyRef',]
}
</script>

<style scoped>

</style>
