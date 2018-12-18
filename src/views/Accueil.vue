<template>
    <v-app >
        <Header/>
        <v-toolbar class="blue darken-4">
            <v-btn small class="btn grey lighten-2">All</v-btn>
            <v-btn small class="btn grey lighten-2">Concerts</v-btn>
            <v-btn small class="btn grey lighten-2">Expositions</v-btn>
            <v-btn small class="btn grey lighten-2">Ateliers</v-btn>
            <v-btn small class="btn grey lighten-2">Conférences</v-btn>
        </v-toolbar>
        <div class="marge grey lighten-2">
            <Manif/>
            <Manif/>
            <Manif/>
            <Manif/>
            <Manif/>
            <Manif/>
            <Manif/>
        </div>
        <en-tete/>
    </v-app>
</template>

<script>
    import Header from '@/components/Header'
    import Manif from '@/components/manifestation'
    import EnTete from "@/components/en-tete";
    export default {
        name: 'app',
        components: {EnTete, Header, Manif},
    }
</script>

<style>
    .marge {
        display: inline-block;
    }

    .btn {
        margin: auto;
    }
</style>