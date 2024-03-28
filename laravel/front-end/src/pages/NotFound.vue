
<script>
    export default {
    name: "NotFound",

}
</script>

<template>
    <div class="container-fluid bg-not-found">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <img src="/public/DelivebooNoBG.svg" alt="logo deliveboo">
                </div>
                <div class="col-12 col-lg-6">
                    <h1> <span class="text-white">Oops! </span>Sembra che tu abbia preso una direzione sbagliata. <br> Prova a ritornare indietro e navigare nella giusta direzione!</h1>

                    <router-link :to="{ name: 'home' }">
                        <button class="btn-boo mt-5 mb-4">Ritorna alla Home</button>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped>
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

    .bg-not-found{
        background-color: $boo-color;
    }

</style>
