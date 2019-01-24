<template>
    <v-app>
        <EnTantQue/>
        <EnTete/>
    </v-app>
</template>

<script>
    import EnTete from '../components/en-tete'
    import EnTantQue from '../components/en-tant-que'
    export default {
        components: {EnTantQue, EnTete}
    }
</script>