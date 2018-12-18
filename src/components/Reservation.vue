<template>
    <v-app class=" grey lighten-2">
        <div class="gauche">
            <h1 class="font blue--text text--darken-4">Reservation des événements:</h1>
            <v-form v-model="valid">
                <v-text-field
                        color="blue darken-4"
                        v-model="name"
                        :rules="nameRules"
                        :counter="50"
                        label="Nombre de personne :"
                        required
                ></v-text-field>
                <v-text-field
                        color="blue darken-4"
                        v-model="email"
                        :rules="emailRules"
                        label="Paiement:"
                        required
                ></v-text-field>
                <v-text-field
                        color="blue darken-4"
                        v-model="name"
                        :rules="emailRules"
                        label="Abonnement:"
                        required
                ></v-text-field>
            </v-form>
        </div>
        <div class="droite">
            <h1 class="font blue--text text--darken-4">Tarif des réservations:</h1>
            <h3 class="font blue--text text--darken-4">12€/événement payant*</h3>
            <h3 class="font blue--text text--darken-4">49€ pour l'abonnement**</h3>
            <h4 class="bas font blue--text text--darken-4">*: certain événement sont gratuit</h4>
            <h4 class=" font blue--text text--darken-4">**: abonnement de 5 événements maximum </h4>
        </div>
    </v-app>

</template>

<script>
    export default {
        name: "Reservation"
    }
</script>

<style scoped>

    .gauche {
        display: inline-block;
        margin-right: 1000px;
        margin-top: 30px;
        margin-left: 30px;
        border-right: 1px solid darkblue;

    }

    .droite {
        display: inline-block;
        margin-right: 1500px;

    }
    .bas{
        margin-top: 200px;
    }

</style>