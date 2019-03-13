<template>
    <v-app>
        <EnTantQue/>
        <EnTete/>
    </v-app>
</template>

<script>
    import EnTantQue from '@/components/En_Tant_Que'
    import EnTete from "./components/en-tete";
    export default {
        name: 'app',
        components: {EnTantQue, EnTete},
    }
</script>

<style>

</style>