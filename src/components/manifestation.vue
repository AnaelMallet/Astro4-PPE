<template>
    <div class="div grey elevation-5" @click="GoEvent">
        <v-card class ="card">
            <v-card-title class="title">{{event_name}}</v-card-title>
            <v-card-text>
                <span class="img_container">
                    <img :src="event_image">
                </span>
            </v-card-text>
        </v-card>
    </div>
</template>

<script>
    export default {
        props: {
            event_name: {
                type: String,
                required: true
            },

            event_image: {
                type: String,
                required: true
            },

            event_id: {
                type: String,
                required: true
            },

            Consulted: {
                type:Boolean,
                default: false
            }
        },
        methods: {
            GoEvent() {
                this.$router.push({
                path:"/evenement",
                name: 'evenement',
                params: {id: this.event_id, Reserved: this.Consulted}
                })
            }
        }
    }
</script>

<style scoped>
    .title {
        text-align: center;
    }

    .div {
        display: inline-block;
        border: 2px solid black;
        margin-left: 30px;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .img_container {
        height: 100%;
        width: 100%;
    }

    .img {
        width: 100%;
        height: 100%;
    }
</style>