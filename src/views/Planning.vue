<template>
    <v-app>
        <Header/>
        <Planning/>
        <EnTete/>
    </v-app>
</template>

<script>
    import Header from '../components/Header'
    import EnTete from "../components/en-tete"
    import Planning from '../components/Planning'
    export default {
        name: 'app',
        components: {Header, EnTete, Planning},
    }
</script>

<style scoped>

</style>