<template>
<v-container>
    <div class = "username">
        <p class = "font">
            nom de l'utilisateur
        </p>
    </div>
    <v-rating class = "rating"
        readonly
        half-increments
        hover
        :length="5"
        color= "yellow darken-4"
    ></v-rating>
    <div class = "text">
        <textarea cols="60" rows="5" readonly>texte du commentaire laissé par un utilisateur du site</textarea>
    </div>
</v-container>
</template>

<script>
export default {
}
</script>

<style scoped>
    .username {
        margin-top: 10px;
        margin-inline-start: 20px;
        text-align: center;
    }

    .font {
        font-size: 25px;
    }

    .rating {
        margin-inline-start: 20px;
        margin-left: 150px;
        margin-right: 150px;
        text-align: center;
        border-bottom: 1px solid black;
    }

    .text {
        font-size: 17px;
        margin-inline-start: 20px;
        text-align: center;
        margin-top: 10px;
    }
</style>