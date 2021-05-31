<template>
    <b-container>
        <b-row class="justify-content-md-center mt-4">
            <b-col col md="8">
                <b-card header="Neuen Artikel hinzufügen" bg-variant="transparent" style="background: rgba(0,0,0,0.1)">
                    <b-card-text>
                        <b-form @submit="onSubmit">
                            <b-form-group description="Artikel Bezeichnung" label="Bezeichnung">
                                <b-form-input v-model="articlename"/>
                            </b-form-group>
                            <b-form-group description="Artikel Preis in Euro" label="Preis">
                                <b-form-input v-model="articleprice"/>
                            </b-form-group>
                            <b-form-group description="Artikel Beschreibung" label="Beschreibung">
                                <b-form-input v-model="articledescription"/>
                            </b-form-group>
                            <b-form-group description="Artikel Verkäufer ID" label="Verkäufer">
                                <b-form-input v-model="articleseller"/>
                            </b-form-group>
                            <b-form-group>
                                <b-button type="submit" variant="outline-secondary" :disabled="!filledProps">Erstellen
                                </b-button>
                            </b-form-group>
                        </b-form>
                    </b-card-text>
                    <div v-if="successAvailable">
                        <b-card-footer v-if="successMsg == 'true'" footer-bg-variant="success">Artikel erfolgreich
                            hinzugefügt!
                        </b-card-footer>
                        <b-card-footer v-else-if="successMsg == 'false'" footer-bg-variant="danger">Bitte überprüfen sie
                            die Eingabe!
                        </b-card-footer>
                    </div>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>

<script>
export default {
    name: "article_form",
    data() {
        return {
            articlename: '',
            articleprice: '',
            articledescription: '',
            articleseller: '',
            successMsg: '',
        }
    },
    computed: {
        filledProps() {
            return this.articlename.length > 0 && this.articleprice.length > 0 && this.articledescription.length > 0 && this.articleseller.length > 0 ? true : false;
        },
        successAvailable() {
            return this.successMsg;
        },
    },
    methods: {
        onSubmit(event) {
            event.preventDefault();
            if (this.validated()) {
                axios.post('http://127.0.0.1:8000/api/createArticle', {
                    'articleName': this.articlename,
                    'articlePrice': this.articleprice,
                    'articleDescription': this.articledescription,
                    'sellerId': this.articleseller
                })

                    .then(response => {
                        this.successMsg = 'true';
                        this.clearForm();
                    })
                    .catch((errors => {
                        console.log(errors);
                    }))
            } else {
                this.successMsg = 'false';
            }
        },
        validated() {

            if (this.articlename === '' || this.articleprice === '' || this.articledescription === '' || this.articleseller === '') {
                return false;
            } else if (parseInt(this.articleprice) < 0) {
                return false;
            } else if (!this.articleprice.match('^[0-9]*$')) {
                return false
            } else
                return true;
        },
        clearForm() {
            this.articlename = '';
            this.articleprice = '';
            this.articledescription = '';
            this.articleseller = '';
        }
    }
}
</script>

<style scoped>

</style>
