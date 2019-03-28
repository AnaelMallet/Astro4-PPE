<template>
    <v-app>
        <header/>
        <consultation/>
        <en-tete/>
    </v-app>
</template>

<script>
 import Header from '../components/header'
    import Consultation from '../components/consultation'
    import EnTete from '../components/en-tete'

    export default {
        components: {EnTete, Header, Consultation},
        methods:{
                        consultation(action) {
                if (this.$route.path === "/connexion/client")
                {
                    action += "_client"
                    fetch('http://localhost/astro4/api.php?action=' + action )
                    .then(response => {
                        return response.json()
                    })
                    .then((data) => {
                        console.log(data)
                    })
                }
                
                
            }
        }
    }

</script>


