<template class="">
    <v-app class=" grey lighten-2">
        <div class="center">
            <h1 class="font blue--text text--darken-4">Connexion:</h1>
            <div class="text">
                <v-form v-model="valid">
                    <v-text-field
                            color="blue darken-4"
                            label="Login"
                            v-model="login"
                            :rules="LoginRules"
                            required
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            v-model="mdp"
                            :append-icon="pwd ? 'visibility_off' : 'visibility'"
                            :rules="PasswordRules"
                            :type="pwd ? 'text' : 'password'"
                            label="Mot de passe"
                            @click:append="pwd = !pwd"
                    ></v-text-field>
                </v-form>
                <div class="btn_place">
                    <v-btn class="blue darken-4 white--text btn_conn" :disabled="!valid" v-on:click="Login('login', login, mdp)">Se Connecter</v-btn>
                    <v-btn class="blue darken-4 white--text" v-on:click="GoConn()">Annuler</v-btn>
                </div>
            </div>
        </div>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            pwd: false,
            valid: false,
            login: "",
            mdp: "",
            id: 0,
            PasswordRules: [
                value => !!value || 'valeur requise'
            ],

            LoginRules: [
                value => !!value || 'valeur requise'
            ]
        }),

        methods: {
            GoConn() {
                this.$router.push('/connexion')
            },


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