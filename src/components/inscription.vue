<template class="">
    <v-app class=" grey lighten-2">
        <div class="center">
            <h1 class="font blue--text text--darken-4">Inscription:</h1>
            <div class = "text">
                <v-form v-model="valid">
                    <v-text-field
                            color="blue darken-4"
                            v-model="name"
                            :rules="nameRules"
                            :counter="50"
                            label="Nom"
                            required
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            v-model="name"
                            :rules="nameRules"
                            :counter="50"
                            label="Prénom"
                            required
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            v-model="name"
                            :rules="nameRules"
                            :counter="50"
                            label="n° de téléphone"
                            required
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            v-model="email"
                            :rules="[rules.required, rules.email]"
                            label="E-Mail"
                            required
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            v-model="name"
                            :rules="nameRules"
                            :counter="50"
                            label="Login"
                            required
                    ></v-text-field>
                    <v-text-field
                            color="blue darken-4"
                            v-model="password"
                            :append-icon="show1 ? 'visibility_off' : 'visibility'"
                            :type="show1 ? 'text' : 'password'"
                            :counter="50"
                            label="Mot de passe"
                            @click:append="show1 = !show1"
                    ></v-text-field>
                </v-form>
                <div class="btn_place">
                    <v-btn class="blue darken-4 white--text btn_conn">Se Connecter</v-btn>
                    <v-btn class="blue darken-4 white--text">Annuler</v-btn>
                </div>
            </div>
        </div>
    </v-app>
</template>

<script>
    export default {
        name: "connexion"
    }
</script>

<style scoped>
    .text {
        margin: 50px 100px 0px 100px;
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

    .bordure {
        border: 1px solid black;
    }
</style>