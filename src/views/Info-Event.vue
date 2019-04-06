<template>
    <v-app>
        <Header/>
        <v-toolbar class="blue darken-4 elevation-12">
            <v-btn small class="btn grey lighten-2" @click="dialog = true" v-if="!this.Reserved">Réserver des places</v-btn>
            <v-dialog
                v-model="dialog"
                max-width="500"
            >
                <v-card>
                    <v-card-title class = "card-title blue darken-4 elevation-10">
                        <h1>Réservation</h1>
                        <v-btn class="grey lighten-2 close-btn" @click ="dialog = false">Fermer</v-btn>
                        </v-card-title>
                    <v-card-text>
                        <v-text-field
                            counter= 1
                            label="nombre de personnes"
                            :rules="[rules.number]"
                        >
                        </v-text-field>
                        <v-radio-group v-model="BookMode" :mandatory="false">
                            <v-radio
                                color="blue darken-4"
                                label="Payement à l'unité (12€)"
                                value= "payement"
                            ></v-radio>
                            <v-radio
                                color="blue darken-4"
                                label="Payement par abonnement (45€*)"
                                value= "abonnement"
                            ></v-radio>
                        </v-radio-group>
                        <small>*pour un abonnement de 5 manifestations au choix</small>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn class="grey lighten-2 submit-btn" @click ="dialog = false">réserver</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-toolbar>
        <InfoEvent :Event_Name="this.Event_Name" :Event_Image="this.Event_Image" :Event_Resume="this.Event_Resume"/>
        <EnTete/>
    </v-app>
</template>

<script>
import Header from '../components/header'
import InfoEvent from '../components/info-event'
import EnTete from '../components/en-tete'

export default {
    components: {Header, InfoEvent, EnTete},
    props: {
        id: {
            type: String
        },

        Reserved: {
            type: Boolean
        }
    },

    mounted() {
        this.GetInfoEvent('GetInfoEvent', this.id)
    },

    methods: {
        GetInfoEvent(action, id) {
            fetch('http://localhost/astro4/api.php?action=' + action + '&EventID=' + id)
            .then(response => {
                return response.json()
            })
            .then((data) => {
                this.Event_Name = data.InfoEvent[0].nom
                this.Event_Image = data.InfoEvent[0].image
                this.Event_Resume = data.InfoEvent[0].resume_event
            })
        }
    },

    data () {
        return {
            Event_Name: '',
            Event_Image: '',
            Event_Resume: '',
            dialog: false,
            BookMode: "payement",
            rules: {
                number: value => {
                    const pattern = /^([1-4])/
                    return pattern.test(value) || "veuillez saisir un chiffre compris entre 1 et 4"
                }
            }
        }
    }
}
</script>

<style>
    .card-title {
        border-bottom: 2px solid black; 
    }

    .close-btn {
        margin-left: 220px;
    }


</style>
