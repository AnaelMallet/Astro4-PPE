<template class="">
    <v-app class=" grey lighten-2">
        <div class="center">
            <h1 class="font blue--text text--darken-4">Inscription:</h1>
            <div class="text">
                <v-form v-model="valid">
                    <v-text-field
                            :rules="[rules.required, rules.max, rules.min]"
                            color="blue darken-4"
                            label="Nom"
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            :rules="[rules.required, rules.max, rules.min]"
                            label="Prénom"
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            :rules="[rules.required, rules.maxPhone]"
                            label="n° de téléphone"
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            :rules="[rules.required, rules.Mail]"
                            label="E-Mail"
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            :rules="[rules.required, rules.max, rules.min]"
                            label="Login"
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            v-model="password"
                            :append-icon="pwd ? 'visibility_off' : 'visibility'"
                            :type="pwd ? 'text' : 'password'"
                            :rules="[rules.required, rules.max, rules.min]"
                            label="Mot de passe"
                            @click:append="pwd = !pwd"
                    ></v-text-field>
                </v-form>
                <div class="btn_place">
                    <v-btn class="blue darken-4 white--text btn_conn">Se Connecter</v-btn>
                    <v-btn class="blue darken-4 white--text" v-on:click="GoMain()">Annuler</v-btn>
                </div>
            </div>
        </div>
    </v-app>
</template>

<script>
    export default {
        data () {
            return {
                pwd: false,
                setup:"phone",
                rules: {
                    required: value => !!value || 'valeur requise',
                    max: value => value.length <= 32 || 'saisie supérieur à 32 caractères',
                    min: value => value.length >= 10 || 'saisie inférieur à 10 caractères',
                    maxPhone: value => value.length <= 10 || 'saisie supérieur à 10 chiffres',
                    Mail: value => {
                        const patterne = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                        return patterne.test(value) || 'Adresse mail invalide'
                    }
                }
            }
        },
        methods: {
            GoMain() {
                this.$router.replace('/')
            }
        }
    }
</script>

<style scoped>
    .text {
        margin: 50px 100px 0 100px;
    }

    .center {
        margin-bottom: -500px;
        margin-top: 200px;
    }

    .btn_place {
        margin-top: 30px;
        margin-left: -10px;
    }

    .btn_conn {
        margin-right: 25px;
    }

    .font {
        font-size: 40px;
        text-decoration: underline;
        text-align: center;
    }
</style>