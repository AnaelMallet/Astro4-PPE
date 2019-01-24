<template>
    <v-app class="grey lighten-2">
        <h1 class="font blue--text text--darken-4">Se connecter en tant que:</h1>
        <div class="centre">
            <v-btn small class="blue darken-4 white--text entantque reag align cli">Client</v-btn>
            <v-btn small class="blue darken-4 white--text entantque reag align art">Artiste</v-btn>
            <v-btn small class="blue darken-4 white--text entantque reag align">Intervenant</v-btn>
            <v-btn small class="blue darken-4 white--text entantque reag align retour" v-on:click="goMain()">Retour</v-btn>
        </div>
    </v-app>
</template>

<script>
    export default {
        methods: {
            goMain() {
                this.$router.replace('/')
            }
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