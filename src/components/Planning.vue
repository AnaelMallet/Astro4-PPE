<template>
    <v-app class=" grey lighten-2">
        <v-toolbar class="blue darken-4 elevation-12">
            <h1 class="white--text">Planning</h1>
        </v-toolbar>
        <v-calendar
          ref="calendar"
            v-model="start"
            :type="type"
            :end="end"
            locale="fr-fr"
            color="primary"
        >
          <template v-slot:day="{ date }">
            <template v-for="event in RDV_Event[date]">
              <v-menu
                :key="event.nom_event"
                full-width
                offset-x
              >
                <template v-slot:activator="{ on }">
                  <div
                    v-ripple
                    class="my-event"
                    v-on="on"
                    v-html="event.nom_event"
                  ></div>
                </template>
                <v-card
                  color="grey lighten-4"
                  min-width="350px"
                  flat
                >
                  <v-toolbar
                    color="primary"
                    dark
                  >
                    <v-btn icon>
                      <v-icon>edit</v-icon>
                    </v-btn>
                    <v-toolbar-title v-html="event.nom_event"></v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn icon>
                      <v-icon>favorite</v-icon>
                    </v-btn>
                    <v-btn icon>
                      <v-icon>more_vert</v-icon>
                    </v-btn>
                  </v-toolbar>
                  <v-card-title primary-title>
                    <span v-html="event.resume_event"></span>
                  </v-card-title>
                  <v-card-actions>
                    <v-btn
                      flat
                      color="secondary"
                    >
                      Cancel
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-menu>
            </template>
          </template>
        </v-calendar>
        </v-app>

</template>

<script>
    export default {
        name: "Planning",
        data: () => ({
            type: 'month',
            start: '2019-04-01',
            end: '2019-04-30',
            RDV_Event: [],
            date: ''

        }),

        mounted(){
            this.GetEventRDV('RDV', this.$session.get('id_pers'))
        },

        methods:{
            GetEventRDV(action, idCli){
                fetch('http://localhost/astro4/api.php?action=' + action + '&EventID=' + idCli)
                .then(response =>{
                    return response.json()
                })
                .then((data)=>{
                    this.RDV_Event = data.RDV[0]
                    var DateRDV = new Date(data.RDV[0].date_event)
                    var MonthRDV = DateRDV.getMonth() + 1
                    this.date = DateRDV.getFullYear() + '-' + MonthRDV + '-' + DateRDV.getDate()
                })
            }
        }

    }
</script>

<style scoped>
    .my-event {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    border-radius: 2px;
    background-color: #1867c0;
    color: #ffffff;
    border: 1px solid #1867c0;
    width: 100%;
    font-size: 12px;
    padding: 3px;
    cursor: pointer;
    margin-bottom: 1px;
  }
</style>