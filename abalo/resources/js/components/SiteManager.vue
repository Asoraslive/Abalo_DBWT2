<template>
    <div>

        <div v-if="!isInMaintanance">
            <siteHeader @clicked="selectSiteBody"/>
            <div v-if="state == 'home'" class="mt-2">
                <b-form inline class="justify-content-md-center">
                    <b-form-input v-model="search"></b-form-input>
                    <b-button type="submit" @click="selectSiteBody('table')">Suchen</b-button>
                </b-form>
            </div>
            <siteBody :bodyRef="state" :homeSearch="search"/>
            <div>
                <b-button @click="RandomSell()">Random Sell</b-button>
                <b-alert v-model="showDismissibleAlert" dismissible variant="success">
                    Großartig! Ihr Artikel "{{ aritcleName }}" wurde erfolgreich verkauft!
                </b-alert>

                <b-card-body body-bg-variant="danger" v-if="discounted">
                    Der Artikel "{{ discountName }}" wird nun günstiger angeboten! Greifen Sie schnell zu.
                <b-button @click="dismissDiscount()" >Ok</b-button>
                </b-card-body>
            </div>
            <siteFooter @impressum="selectSiteBody"/>
        </div>

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

        <!--- Maintanance Modal------->
        <b-card v-if="isInMaintanance"
                title="In Wartung"
                class="bg-warning text-center"
        >
            <h4>In Kürze verbessern wir Abalo für Sie! <br>
                Nach einer kurzen Pause sind wir wieder <br> für Sie da!
                Versprochen.</h4>
            <template #footer>
                <b-button @click="clearMaintanance">Beende Wartung</b-button>
            </template>
        </b-card>
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
        let socket = new WebSocket('ws://127.0.0.1:8080/custom');
        socket.onmessage = (msg) => {

            let response = JSON.parse(msg.data);
            switch (response.action) {
                case 'maintanance':
                    if (response.data === 'start')
                        this.maintanance = true;
                    else
                        this.maintanance = false;
                    break;
                case 'sold':
                    this.aritcleName = response.data;
                    this.showDismissibleAlert = true;
                    break;
                case 'discount':
                    this.discountName = response.data;
                    this.discounted = true;
                    break;
            }

        }

        if (this.getCookie('dsgvo') == null || parseInt(this.getCookie('dsgvo')) === 0
        ) {
            //user Abfrage
            this.$bvModal.show('cookieModal');
        }
    },
    data() {
        let state = "home";
        return {
            state: state,
            search: '',
            maintanance: false,
            aritcleName: "",
            discountName: "",
            discounted:false,
            showDismissibleAlert: false,

        };
    }
    ,
    methods: {
        selectSiteBody(key) {
            this.state = key;
            if (this.state == 'home') this.search = '';
        }
        ,
        //cookiehandler
        getCookie(name) {
            let v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)')
            return v ? v[2] : null;
        }
        ,
        cookieConsent() {
            document.cookie = "dsgvo=" + 1;
            this.$bvModal.hide('cookieModal');
        }
        ,
        clearMaintanance() {
            this.maintanance = false;
        },

        RandomSell() {
            axios.post('http://127.0.0.1:8000/api/articles/' + Math.floor((Math.random() * 30) + 1) + '/sold', {});
        },
        dismissDiscount(){
            this.discounted = false;
        }
    }
    ,
    computed: {
        isInMaintanance() {
            return this.maintanance == true;
        }
    }
}
</script>

<style scoped>

</style>
