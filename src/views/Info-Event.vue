<template>
    <v-app>
        <Header/>
        <v-toolbar class="blue darken-4 elevation-12">
            <v-btn small class="btn grey lighten-2">Réserver des places</v-btn>
        </v-toolbar>
        <InfoEvent/>
        <EnTete/>
    </v-app>
</template>

<script>
import Header from '../components/header'
import InfoEvent from '../components/info-event'
import EnTete from '../components/en-tete'
export default {
    components: {Header, InfoEvent, EnTete},
}
</script>

