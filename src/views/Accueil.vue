<template>
    <v-app>
        <Header/>
        <v-toolbar class="blue darken-4 elevation-12">
            <v-btn small class="btn grey lighten-2">Tout</v-btn>
            <v-btn small class="btn grey lighten-2">Concerts</v-btn>
            <v-btn small class="btn grey lighten-2">Expositions</v-btn>
            <v-btn small class="btn grey lighten-2">Ateliers</v-btn>
            <v-btn small class="btn grey lighten-2">Conférences</v-btn>
        </v-toolbar>
        <div class="grey lighten-2 div">
            <Manif/>
            <Manif/>
        </div>
        <en-tete/>
    </v-app>
</template>

<script>
    import Header from '../components/header'
    import Manif from '../components/manifestation'
    import EnTete from '../components/en-tete'

    export default {
        components: {EnTete, Header, Manif}
    }
</script>

<style scoped>
.btn {
        margin: auto;
    }
</style>