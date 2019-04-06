<template>
    <v-app class="grey lighten-2">
        <h1 class="font blue--text text--darken-4">Se connecter en tant que:</h1>
        <div class="centre">
            <v-btn small class="blue darken-4 white--text entantque reag align cli" @click="GoCli">Client</v-btn>
            <v-btn small class="blue darken-4 white--text entantque reag align art" @click="GoArt">Artiste</v-btn>
            <v-btn small class="blue darken-4 white--text entantque reag align" @click="GoInt">Intervenant</v-btn>
            <v-btn small class="blue darken-4 white--text entantque reag align retour" @click="GoMain">Retour</v-btn>
        </div>
    </v-app>
</template>

<script>
    export default {
        methods: {
            GoMain() {
                this.$router.push('/')
            },

            GoCli() {
                this.$router.push('connexion/client')
            },

            GoArt() {
                this.$router.push('connexion/artiste')
            },

            GoInt() {
                this.$router.push('connexion/intervenant')
            },
        }
    }
</script>

<style scoped>
    .entantque {
        height: 50px;
        font-size: 20px;
    }

    .reag {
        display: block;
    }

    .centre {
        margin: auto;
    }

    .font {
        margin-top: 250px;
        margin-bottom: -200px;
        font-size: 40px;
        text-decoration: underline;
        text-align: center;
    }

    .align {
        margin-bottom: 10px;
    }

    .art {
        margin-left: 35px;
    }

    .cli {
        margin-left: 38px;
    }

    .retour {
        margin-left: 38px;
        margin-top: 100px;
    }

</style>