<template>
  <div>
    <v-toolbar class="blue darken-4">
        <h1 class="white--text">Menu</h1>
    </v-toolbar>
    <v-list>
        <template v-for="(element, e) in menu_element">
            <v-list-tile :to="element.action" :key="e">
                <v-list-tile-action>
                    <v-icon color="blue darken-4">{{ element.icon }}</v-icon>
                </v-list-tile-action>
                <v-list-tile-title>
                    {{element.text}}
                </v-list-tile-title>
            </v-list-tile>
        </template>
    </v-list>
  </div>
</template>

<script>
export default {
    data() {
        return {
            menu_element: [],
        }
    },
    mounted() {
        this.ListElement()
    },
    methods: {
        ListElement() {
            if (this.$session.get('person') === 'client')
            {
                this.menu_element = [
                    {icon: "event", text:"Évenement réservé", action:"/consultation"},
                    {icon: "event", text:"planning", action:"/planning"},
                    {icon: "chat",text:"Mes commentaires", action:"/comment_list"},
                ]
            }
            else
            {
                if (this.$session.get('person') === 'artist')
                {
                    this.menu_element = [
                        {icon: "event", text:"planning", action:"/planning"},
                    ]
                }
                else
                {
                    if (this.$session.get('person') === 'contributor')
                    {
                        this.menu_element = [
                            {icon: "event", text:"planning", action:"/planning"},
                            {icon: "chat",text:"Mes commentaires", action:"/comment_list"},
                        ]
                    }
                }
            }
        }
    }
}
</script>


