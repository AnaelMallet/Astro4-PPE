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
            color="primary"
            ></v-calendar>
        </v-app>

</template>

<script>
    export default {
        name: "Planning",
        data: () => ({
        type: 'month',
        start: '2019-04-01',
        end: '2019-04-30',
        typeOptions: [
            { text: 'Day', value: 'day' },
            { text: '4 Day', value: '4day' },
            { text: 'Week', value: 'week' },
            { text: 'Month', value: 'month' },
            { text: 'Custom Daily', value: 'custom-daily' },
            { text: 'Custom Weekly', value: 'custom-weekly' }
        ]
        })
    }
</script>

<style scoped>

</style>