<template>
    <v-app class="app">
        <v-toolbar class="blue darken-4">
            <v-menu></v-menu>
            <v-btn small class ="grey lighten-2" v-on:click="GoConn()">Connexion</v-btn>
            <v-btn small class ="grey lighten-2" v-on:click="GoInscr()">Inscription</v-btn>
            <v-btn small class ="grey lighten-2" v-on:click="GoCons()">Consultation</v-btn>
        </v-toolbar>
        <div>
            <v-parallax height="250"
                        src="https://hdfondsdecran.com/image/201609/338/espace-profond-hyperespace-pourpre.jpg">
            </v-parallax>
        </div>
    </v-app>
</template>

<script>
    export default {
        methods: {
            GoConn() {
                this.$router.push('/connexion')
            },

            GoInscr() {
                this.$router.push('/inscription')
            },
            GoCons(){
                this.$router.push('/consultation')
            }
        }
    }
</script>

<style>
    .h1 {
        text-align: center;
    }

    .app {
        height: 300px;
    }
</style>