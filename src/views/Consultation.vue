<template>
    <v-app>
        <Header/>
        <Consultation/>
        <EnTete/>
    </v-app>
</template>

<script>
import Header from '../components/header'
import Consultation from '../components/consultation'
import EnTete from '../components/en-tete'

    export default {
        components: {EnTete, Header, Consultation}   
    }
</script>


