<template>
<v-app>
    <v-toolbar class="blue darken-4 elevation-12">
        <h1 class="white--text">Mes réservations</h1>
    </v-toolbar>
    <div class="grey lighten-2 div">
        <Manif v-for="(event, i) in event_data" :key="i" :event_name="event.nom" :event_image="event.image" :event_id="event.id" :Consulted="IsConsultation"/>
    </div>
</v-app>
</template>

<script>
import Manif from '../components/manifestation'

export default {
    components: {Manif},
    data(){
        return{
            event_data:[],
            IsConsultation: true,
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
                this.event_data = data.reservation
            })
        }
    }
}
</script>

