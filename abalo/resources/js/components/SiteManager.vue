<template>
    <div>
        <siteHeader @clicked="selectSiteBody"/>
        <siteBody :bodyRef="state"/>
    </div>
    <!--    <siteFooter></siteFooter>-->

</template>

<script>
import SiteHeader from "./SiteHeader";
import SiteBody from "./SiteBody";
import SiteFooter from "./SiteFooter";

export default {
    name: "SiteManager",
    components: {siteHeader: SiteHeader, siteBody: SiteBody, siteFooter: SiteFooter},
    data() {
        let state = "";
        return {state: state,};
    },
    methods: {
        selectSiteBody(key) {
                    this.state = key;
        }
    }
}
</script>

<style scoped>

</style>
