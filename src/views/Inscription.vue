<template>
    <v-app>
        <inscription/>
        <EnTete/>
    </v-app>
</template>

<script>
    import Inscription from '@/components/inscription'
    import EnTete from "./components/en-tete";
    export default {
        name: 'app',
        components: {Inscription, EnTete},
    }
</script>

<style>

</style>