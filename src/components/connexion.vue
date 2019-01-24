<template class="">
    <v-app class=" grey lighten-2">
        <div class="center">
            <h1 class="font blue--text text--darken-4">Connexion:</h1>
            <div class="text">
                <v-form v-model="valid">
                    <v-text-field
                            color="blue darken-4"
                            label="Login"
                            :rules="[rules.required]"
                            required
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            v-model="password"
                            :append-icon="pwd ? 'visibility_off' : 'visibility'"
                            :rules="[rules.required]"
                            :type="pwd ? 'text' : 'password'"
                            label="Mot de passe"
                            @click:append="pwd = !pwd"
                    ></v-text-field>
                </v-form>
                <div class="btn_place">
                    <v-btn class="blue darken-4 white--text btn_conn">Se Connecter</v-btn>
                    <v-btn class="blue darken-4 white--text" v-on:click="GoConn()">Annuler</v-btn>
                </div>
            </div>
        </div>
    </v-app>
</template>

<script>
    export default {
        data() {
            return {
                pwd: false,
                rules: {
                    required: value => !!value || 'valeur requise',
                }
            }
        },
        methods: {
            GoConn() {
                this.$router.replace('/connexion')
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
        margin-top: 300px;
    }

    .btn_place {
        margin-top: 30px;
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