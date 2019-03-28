<template>
<v-app>
    <header/>
    <Manif/>
    <en-tete/>
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
                this.events_data = data.event
            })
        }
    }
}
</script>

