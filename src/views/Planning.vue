<template>
    <v-app>
        <Header/>
        <Planning/>
        <EnTete/>
    </v-app>
</template>

<script>
    import Header from '@/components/header'
    import EnTete from "@/components/en-tete"
    import Planning from '@/components/planning'
    export default {
        name: 'app',
        components: {Header, EnTete, Planning},
    }
</script>

<style scoped>

</style>