<template>
    <v-app>
        <header/>
    </v-app>
</template>

<script>
    import Header from '@/components/Header'
    import EnTete from "./components/en-tete";
    export default {
        name: 'app',
        components: {Header, EnTete},
    }

</script>

<style scoped>

</style>