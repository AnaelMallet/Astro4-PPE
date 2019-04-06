<template class="">
    <v-app class=" grey lighten-2">
        <div class="center">
            <h1 class="font blue--text text--darken-4">Inscription:</h1>
            <div class="text">
                <v-form v-model="valid">
                    <v-text-field
                            v-model="name"
                            :rules="NameRules"
                            color="blue darken-4"
                            label="Nom"
                    ></v-text-field>
                    <v-text-field
                            v-model="first_name"
                            color="blue darken-4"
                            :rules="FirstnameRules"
                            label="Prénom"
                    ></v-text-field>
                    <v-text-field
                            v-model="phone"
                            color="blue darken-4"
                            :rules="PhoneRules"
                            label="n° de téléphone"
                    ></v-text-field>
                    <v-text-field
                            v-model="mail"
                            color="blue darken-4"
                            :rules="MailRules"
                            label="E-Mail"
                    ></v-text-field>
                    <v-text-field
                            v-model="login"
                            color="blue darken-4"
                            :rules="LoginRules"
                            label="Login"
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            v-model="password"
                            :append-icon="pwd ? 'visibility' : 'visibility_off'"
                            :type="pwd ? 'text' : 'password'"
                            :rules="PasswordRules"
                            label="Mot de passe"
                            @click:append="pwd = !pwd"
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            v-model="age"
                            :rules="AgeRules"
                            label="Votre age"
                    ></v-text-field>
                </v-form>
                <div class="btn_place">
                    <v-btn class="blue darken-4 white--text btn_conn" @click="Inscription('register', name, first_name, phone, mail, login, password, age)" :disabled="!valid">S'inscrire</v-btn>
                    <v-btn class="blue darken-4 white--text" @click="GoMain">Annuler</v-btn>
                </div>
            </div>
        </div>
        <v-dialog v-model="dialog" max-width="500">
            <v-card>
                <v-card-title v-if="register" class="green">
                    <h1>Vous êtes maintenant enregistré(e)</h1>
                </v-card-title>
                <v-card-title v-else class="green">
                    <h1>Inscription</h1>
                </v-card-title>
                <v-card-text>
                    <h3 v-if="register">Vous êtes maintenant enregistré(e) sur notre site</h3>
                    <v-form>
                        <v-checkbox v-model="checkbox" :label="'Se connecter dés maitenant'"></v-checkbox>
                    </v-form>
                </v-card-text>
                <v-card-actions v-if="register">
                    <v-btn class="grey lighten-2 close-btn" @click="GoMain">Revenir au menu</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
    export default {
        data: () => ({
            dialog: false,
            valid: false,
            name:"",
            first_name:"",
            phone:"",
            mail:"",
            login:"",
            password:"",
            age: null,
            pwd: false,
            register: false,
            checkbox: false,
            HashedPassword: "",
            NameRules: [
                value => !!value || 'Valeur requise'
            ],

            FirstnameRules: [
                value => !!value || 'Valeur requise'
            ],

            PhoneRules: [
                value => !!value || 'Valeur requise',
                value => value.length <= 10 || 'Le numéro de téléphone doit être composé de moins de 10 chiffres',
                value => /^[0]/.test(value) || 'Le numéro de tépéhone doit commencé par un 0',
                value => /^[0-9]*$/.test(value) || 'seulement les chiffres sont autorisés'
            ],

            MailRules: [
                value => !!value || 'Valeur requise',
                value => /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value) || 'Adresse mail invalide'
            ],

            LoginRules: [
                value => !!value || 'valeur requise'
            ],

            PasswordRules: [
                value => !!value || 'valeur requise'
            ],

            AgeRules: [
                value => !!value || 'valeur requise',
                value => /^[0-9]*$/.test(value) || 'seulement les chiffres sont autorisés',
                value => value <= 120 || 'votre age ne peut pas être supérieur a 120',
                value => value >= 18 || 'vous devez être majeur pour vous inscrire'
            ]
        }),
        methods: {
            GoMain() {
                if (this.checkbox)
                {
                    this.$session.start()
                    this.$session.set('person', 'client')
                    this.$session.set('name', this.login)
                }
                this.$router.push('/')
            },

            Inscription(action, name, first_name, phone, mail, login, password, age) {
                fetch('http://localhost/astro4/api.php?action=' + action + '&nom=' + name + '&prenom=' + first_name + '&phone=' + phone + '&mail=' + mail + '&login=' + login + '&password=' + password + '&age=' + age)
                .then(response => {
                    return response.json()
                })    
                .then(data => {
                    this.dialog = data.register
                    this.register = data.register
                })
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