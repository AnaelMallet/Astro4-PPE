<template>
    <v-app>
        <h1 class = "name">{{Event_Name}}</h1>
        <span class = "image grey lighten-2">
            <img :src="Event_Image"/>
        </span>
        <div class = "event_text">
            <p>
                <textarea class="text_field" cols="60" rows="5" v-model="Event_Resume"></textarea>
            </p>
        </div>
        <div class = "event_comment">
            <textarea class = "comment_field" cols="60" rows="5" placeholder="votre commentaire..."></textarea>
            <v-rating half-increments hover :length="5" color= "yellow darken-4"></v-rating>
            <comment class = "comment elevation-12"/>
            <comment class = "comment elevation-12"/>
            <comment class = "comment elevation-12"/>
        </div>
    </v-app>
</template>

<script>
    import comment from '../components/commentaire'

export default {
    components: {comment},
    props: {
        Event_Name: {
            type: String
        },

        Event_Image: {
            type: String
        },

        Event_Resume: {
            type: String
        }
    }
}
</script>

<style scoped>
    .name {
        text-align: center;
        margin-top: 30px;
    }

    img {
        height: 100%;
        width: 100%;
    }

    .image {
        margin: 0 auto;
        margin-top: 30px;
    }

    .event_text {
        text-align: center;
        margin: 50px 100px 0 100px;
        height: 100px;
        border-top: 1px solid black;
    }

    .text_field {
        margin-top: 20px;
    }

    .event_comment {
        text-align: center;
        margin: 50px 100px 100px 100px;
        border-top: 1px solid black;
    }

    .comment_field {
        border: 1px solid gray;
        font-size: 20px;
        text-align: center;
        margin-left: 30px;
        margin-top: 30px;
        margin-right: 30px;
    }

    .comment {
        margin-top: 30px;
        border: 1px solid black;
        margin-right: 100px;
    }
</style>