<template>
    <v-app>
        <Header/>
        <v-toolbar class="blue darken-4 elevation-12">
            <v-btn small class="btn grey lighten-2" @click="GetEventData('all')">Tout</v-btn>
            <v-btn small class="btn grey lighten-2" @click="GetEventData('concert')">Concerts</v-btn>
            <v-btn small class="btn grey lighten-2" @click="GetEventData('expo')">Expositions</v-btn>
            <v-btn small class="btn grey lighten-2" @click="GetEventData('atelier')">Ateliers</v-btn>
            <v-btn small class="btn grey lighten-2" @click="GetEventData('conf')">Conférences</v-btn>
        </v-toolbar>
        <div class="grey lighten-2 div">
            <Manif v-for="(event, index) in events_data" :key="index" :event_name="event.nom" :event_image="event.image" :event_id="event.id_event"/>
        </div>
        <EnTete/>
    </v-app>
</template>

<script>
    import Header from '../components/header'
    import Manif from '../components/manifestation'
    import EnTete from '../components/en-tete'

    export default {
        components: {EnTete, Header, Manif},
        data() {
            return {
                events_data: [],
            }
        },

        mounted() {
            this.GetEventData('all')
        },

        methods: {
            GetEventData(action) {
                fetch('http://localhost/astro4/api.php?action=' + action)
                .then(response => {
                    return response.json()
                })
                .then((data) => {
                    this.events_data = data.event
                })
            }
        }
    }
</script>

<style scoped>
.btn {
        margin: auto;
    }
</style>