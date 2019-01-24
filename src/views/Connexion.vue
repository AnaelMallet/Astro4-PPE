<template>
    <v-app>
        <connexion/>
        <EnTete/>
    </v-app>
</template>

<script>
    import Connexion from '../components/connexion'
    import EnTete from '../components/en-tete'
    export default {
        name: 'app',
        components: {Connexion, EnTete},
    }
</script>

<style>

</style>