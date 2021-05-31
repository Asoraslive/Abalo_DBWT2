<template>
    <div>
        <siteHeader @clicked="selectSiteBody"/>
        <div v-if="state == 'home'" class="mt-2">
            <b-form inline class="justify-content-md-center">
                <b-form-input v-model="search"></b-form-input>
                <b-button type="submit" @click="selectSiteBody('table')">Suchen</b-button>
            </b-form>
        </div>
        <siteBody :bodyRef="state" :homeSearch="search"/>
        <siteFooter @impressum="selectSiteBody"/>


        <!--        cookiemodal-->
        <b-modal
            id="cookieModal"
            no-close-on-backdrop
            no-close-on-esc
            title="Cookie Information"
        >
            <h4>Cookie Policy</h4>
            <p>Wir nutzen Cookies auf unserer Website.</p>
            <p>
                <a href="https://dsgvo-gesetz.de/" target="_blank">Klick hier um die Richtlinien des DSGVOs
                    zu sehen!</a>
            </p>
            <template #modal-footer>
                <b-button @click="cookieConsent">Akzeptieren</b-button>
            </template>
        </b-modal>

    </div>
</template>

<script>
import SiteHeader from "./SiteHeader";
import SiteBody from "./SiteBody";
import SiteFooter from "./SiteFooter";

export default {
    name: "SiteManager",
    components: {siteHeader: SiteHeader, siteBody: SiteBody, siteFooter: SiteFooter},
    mounted() {
        if (this.getCookie('dsgvo') == null || parseInt(this.getCookie('dsgvo')) === 0) {
            //user Abfrage
            this.$bvModal.show('cookieModal');
        }
    },
    data() {
        let state = "home";
        return {state: state, search: '',};
    },
    methods: {
        selectSiteBody(key) {
            this.state = key;
            if (this.state == 'home') this.search = '';
        },
        //cookiehandler
        getCookie(name) {
            let v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)')
            return v ? v[2] : null;
        },
        cookieConsent() {
            document.cookie = "dsgvo=" + 1;
            this.$bvModal.hide('cookieModal');
        }
    },
}
</script>

<style scoped>

</style>
