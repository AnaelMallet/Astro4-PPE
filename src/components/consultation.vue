<template>
    <v-app>
        <Header/>
        <v-toolbar class="blue darken-4 elevation-12">
            <h1 class="white--text">Mes réservations</h1>
        </v-toolbar>
        <div class="grey lighten-2 div">
        <Manif v-for="(event, index) in event_data" :key="index" :event_name="event.nom_event" :event_image="event.img_event"/>
        </div>
    </v-app>
</template>

<script>
import Manif from '../components/manifestation'
import Header from '../components/header'
import EnTete from '../components/en-tete'

export default {
    components: {EnTete, Header, Manif},
    data(){
        return{
            event_data:[],
        }
    },
    mounted() {
        this.GetConsult('reservation')
    },

    methods: {
        GetConsult(action){
            fetch('http://localhost/astro4/api.php?action=' + action)
            .then(response => {
                return response.json()
            })
            .then((data) => {
                console.log(data.event)
                this.event_data = data.event
            })
        }
    }
}
</script>

