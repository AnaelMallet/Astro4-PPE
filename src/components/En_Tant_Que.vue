<template>
    <v-app class="grey lighten-2">
        <div class="center">
            <h1 class="blue--text text--darken-4">Se connecter en tant que:</h1>
            <v-btn class = "block top blue darken-4 white--text">Client</v-btn>
            <v-btn class = "block blue darken-4 white--text">Artiste</v-btn>
            <v-btn class = "block centre blue darken-4 white--text">intervenant</v-btn>
        </div>
    </v-app>
</template>

<script>
    export default {
        name: "En_Tant_Que"
    }
</script>

<style scoped>
    .center {
        margin: auto;
    }

    .block {
        display: block;
        margin-bottom: 30px;
        margin-left: 110px;
    }

    .top {
        margin-top: 20px;
    }

    .centre {
        margin-left: 95px;
    }
</style>