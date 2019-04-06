<template>
    <v-app class=" grey lighten-2">
        <v-toolbar class="blue darken-4 elevation-12">
            <h1 class="white--text">Planning</h1>
        </v-toolbar>
            <v-calendar
            :type="type"
            v-model="start"
            :end="end"
            color="primary"
            locale= 'fr-fr'
          >
            <template v-slot:day="{ date }">
              <template v-for="RDV in Events[date]">
                <v-menu
                  :key="RDV.title"
                  full-width
                  offset-x
                >
                  <template v-slot:activator="{ on }">
                    <div
                      v-ripple
                      class="my-event blue darken-4"
                      v-on="on"
                      v-html="RDV.title"
                    ></div>
                  </template>
                  <v-card
                    color="grey lighten-4"
                    min-width="350px"
                    flat
                  >
                    <v-toolbar
                      class="blue darken-4"
                      dark
                    >
                      <v-toolbar-title v-html="RDV.title"></v-toolbar-title>
                      <v-spacer></v-spacer>
                      <h1 v-html="RDV.Heure"></h1>
                    </v-toolbar>
                    <v-card-title primary-title>
                      <span v-html="RDV.details"></span>
                    </v-card-title>
                  </v-card>
                </v-menu>
              </template>
            </template>
          </v-calendar>
        </v-app>

</template>

<script>
    export default {
    data() {
        return {
          type: 'month',
          start: '2019-04-01',
          end: '2019-04-30',
          EventsRDV: []
        }
    },

    mounted() {
        if (this.$session.exists())
        {
            this.GetEventRDVInfo('RDV', this.$session.get('id_pers'))
        }
        else
        {
            this.$router.push('/connexion')
        }      
    },

  computed: {
    // convert the list of events into a map of lists keyed by date
    Events () {
      const map = {}
      this.EventsRDV.forEach(e => (map[e.date] = map[e.date] || []).push(e))
      return map
    }
  },

  methods: {
    GetEventRDVInfo(action, IdCli) {
      fetch('http://localhost/astro4/api.php?action=' + action + '&idCli=' + IdCli)
      .then(response => {
          return response.json()
      })
      .then((data) => {
          this.EventsRDV = data.EventRDV
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