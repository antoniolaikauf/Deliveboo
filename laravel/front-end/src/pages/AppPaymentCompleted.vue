<script>
    export default {
    name: "PaymentCompleted",
    data() {
      return {



      };
    }
}
</script>

<template>
    <div class="container-fluid gx-0">
        <div class="bg text-center">
            <h1>Il tuo ordine è confermato</h1>

            <div class="raw">
                <div class="col-12">
                    <div class="card">
                        <img src="/public/DelivebooNoBG.svg" alt="svg deliveboo">

                        <div>
                            <h4>Tieniti pronto, il driver è in arrivo!</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" >
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

.bg {
    background-color: $boo-color;
    height: 100%;

    img {
        width: 200px;
        animation: moveBackAndForth 4s infinite; /* Applica l'animazione */
    }
}

@keyframes moveBackAndForth {
    0% { transform: translateX(0); }
    50% { transform: translateX(100%); }
    100% { transform: translateX(0); }
}
</style>

