<script>
import axios from "axios";
export default {
    name: "TypeRestaurant",

    data() {
        return {
            arrayTypes: [],
        };
    },
    mounted() {
        axios.get("http://localhost:8000/api/v1/types").then((risposta) => {
            console.log(risposta.data);
            this.arrayTypes = risposta.data.types;
        });
    },
};
</script>

<template>
    <div class="container-fluid"></div>
</template>

<style lang="scss"></style>
