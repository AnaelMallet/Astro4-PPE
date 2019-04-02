<template>
<v-app>
    <Header/>
    <v-toolbar class="blue darken-4 elevation-12">
        <h1 class="white--text">Mes réservations</h1>
    </v-toolbar>
    <div class="grey lighten-2 div">
        <Manif v-for="(event, i) in event_data" :key="i" :event_name="event.nom" :event_image="event.image" :event_id="event.id"/>
    </div>
</v-app>
</template>

<script>
import Manif from '../components/manifestation'
import Header from '../components/header'

export default {
    components: {Header, Manif},
    data(){
        return{
            event_data:[],
        }
    },
    mounted() {
        if (this.$session.exists())
        {
            this.GetConsult('reservation', this.$session.get('id_pers'))
        }
        else
        {
            this.$router.push('/connexion')
        }
    },

    methods: {
        GetConsult(action, idCli){
            fetch('http://localhost/astro4/api.php?action=' + action + '&idCli=' + idCli)
            .then(response => {
                return response.json()
            })
            .then((data) => {
                console.log(data.reservation)
                this.event_data = data.reservation
            })
        }
    }
}
</script>

