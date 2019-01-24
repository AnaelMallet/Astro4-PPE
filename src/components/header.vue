<template>
    <v-app class="app">
        <v-toolbar class="blue darken-4">
            <v-btn small class ="grey lighten-2" v-on:click="GoConn()">Connexion</v-btn>
            <v-btn small class ="grey lighten-2" v-on:click="GoInscr()">Inscription</v-btn>
        </v-toolbar>
        <div>
            <v-parallax height="250"
                        src="https://img1.science-et-vie.com/var/scienceetvie/storage/images/article/la-vie-sur-terre-est-elle-venue-de-l-espace-7388/31832-1-fre-FR/La-vie-sur-Terre-est-elle-venue-de-l-espace_exact1024x768_l.jpg">
                <h1 class="display-3 font-weight-regular mb-auto black--text h1">Astro4</h1>
            </v-parallax>
        </div>
    </v-app>
</template>

<script>
    export default {
        methods: {
            GoConn() {
                this.$router.replace('/connexion')
            },

            GoInscr() {
                this.$router.replace('/inscription')
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