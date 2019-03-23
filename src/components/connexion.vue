<template class="">
    <v-app class=" grey lighten-2">
        <div class="center">
            <h1 class="font text--darken-4">Connexion:</h1>
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
        <v-dialog v-model="dialog" max-width="450">
            <v-card>
                <v-card-title v-if="connexion_state === 'wrong' || connexion_state === 'not_client' || connexion_state === 'not_artist' || connexion_state === 'not_contributor'" class="red lighten-1">
                    <h1>Erreur</h1>
                    <v-btn class="grey lighten-2 close-btn" v-on:click="dialog = false">Réessayer</v-btn>
                </v-card-title>
                <v-card-title v-else class="green">
                    <h1>Vous êtes connecté</h1>
                </v-card-title>
                <v-card-text>
                    <h3 v-if="connexion_state === 'wrong'">votre mot de passe ou votre login est incorrecte</h3>
                    <h3 v-else-if="connexion_state === 'not_client'">Vous n'êtes pas enregistré en tant que client</h3>
                    <h3 v-else-if="connexion_state === 'not_artist'">Vous n'êtes pas enregistré en tant qu'artiste</h3>
                    <h3 v-else-if="connexion_state === 'not_contributor'">Vous n'êtes pas enregistré en tant qu'intervenant</h3>
                    <h3 v-else>bienvenue</h3>
                </v-card-text>
                <v-card-actions v-if="connexion_state === ''">
                    <v-btn class="grey lighten-2 close-btn" v-on:click="GoMain()">Revenir au menu</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            pwd: false,
            valid: null,
            login: "",
            mdp: "",
            id: 0,
            connexion: null,
            dialog: false,
            connexion_state: "",
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

            GoMain() {
                this.$router.push('/')
            },

            Login(action, login, password) {
                if (this.$route.path === "/connexion/client")
                {
                    action += "_client"
                    fetch('http://localhost/astro4/api.php?action=' + action + '&login=' + login + '&password=' + password)
                    .then(response => {
                        return response.json()
                    })
                    .then((data) => {
                        this.connexion = data.is_valid
                        this.connexion_state = data.non_valid_reason
                        if (this.connexion)
                        {
                            if (this.$session.exists())
                            {
                                this.$session.destroy()
                            }

                            this.$session.start()
                            this.$session.set('person', 'client')
                            this.$session.set('name', login)
                        }
                    })
                }
                if (this.$route.path === "/connexion/artiste")
                {
                    action += "_artiste"
                    fetch('http://localhost/astro4/api.php?action=' + action + '&login=' + login + '&password=' + password)
                    .then(response => {
                        return response.json()
                    })
                    .then((data) => {
                        this.connexion = data.is_valid
                        this.connexion_state = data.non_valid_reason
                        if (this.connexion)
                        {
                            if (this.$session.exists())
                            {
                                this.$session.destroy()
                            }

                            this.$session.start()
                            this.$session.set('person', 'artist')
                            this.$session.set('name', login)

                        }
                    })
                }
                if (this.$route.path === "/connexion/intervenant")
                {
                    action += "_intervenant"
                    fetch('http://localhost/astro4/api.php?action=' + action + '&login=' + login + '&password=' + password)
                    .then(response => {
                        return response.json()
                    })
                    .then((data) => {
                        this.connexion = data.is_valid
                        this.connexion_state = data.non_valid_reason
                        if (this.connexion)
                        {
                            if (this.$session.exists())
                            {
                                this.$session.destory()
                            }

                            this.$session.start()
                            this.$session.set('person', 'contributor')
                            this.$session.set('name', login)
                        }
                    })
                }
                this.dialog = true
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