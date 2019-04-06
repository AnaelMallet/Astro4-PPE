<template>
    <v-app class="app">
        <v-navigation-drawer v-model="drawer" class="elevation-12" app temporary>
            <myContentDrawer/>
        </v-navigation-drawer>
        <v-toolbar class="blue darken-4">
            <v-toolbar-side-icon dark @click="drawer = true" v-if="this.$session.exists()"></v-toolbar-side-icon><div class="white--text menu">{{this.$session.get('name')}}</div>
            <v-btn small class ="grey lighten-2" @click="Disconnect" v-if="this.$session.exists()">Déconnexion</v-btn>
            <v-btn small class ="grey lighten-2" @click="GoConn" v-else>Connexion</v-btn>
            <v-btn small class ="grey lighten-2" @click="GoInscr" v-if="!this.$session.exists()">Inscription</v-btn>
        </v-toolbar>
        <div>
            <v-parallax height="250"
                        src="https://hdfondsdecran.com/image/201609/338/espace-profond-hyperespace-pourpre.jpg">
            </v-parallax>
        </div>
        <v-dialog v-model="disconnect" max-width="450">
            <v-card>
                <v-card-title class="green">
                    <h1>Vous êtes Déconnecté</h1>
                </v-card-title>
                <v-card-text>
                    <h3>Au revoir</h3>
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
    import myContentDrawer from "@/components/drawer"
    
    export default {
        components: {myContentDrawer},
        data() {
            return {
                disconnect: false,
                drawer: false,
            }
        },

        methods: {
            GoConn() {
                this.$router.push('/connexion')
            },

            GoInscr() {
                this.$router.push('/inscription')
            },

            Disconnect() {
                this.$session.destroy()
                this.disconnect = true
                if (this.$route.path === "/consultation" || this.$route.path === "/planning")
                {
                    this.$router.push('/')
                }
            },

            GoMain() {
                this.$router.push('/')
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

    .menu {
        margin-right: 15px;
    }

    .MainBtn{
        right: -1530px;
    }
</style>