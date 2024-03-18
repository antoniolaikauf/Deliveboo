<script>
export default {
    name: "ComponentJambo",
};
</script>

<template>
    <div class="container-fluid gx-0">
        <div class="jumbotron">
            <div class="description text-white">
                <h1>I piatti dei ristoranti che ami <br> e la spesa, a domicilio </h1>
                <p>Inserisci un indirizzo nell'input in alto per scoprire <br> le opzioni disponibili nella tua zona</p>
=======
            <video autoplay loop muted playsinline class="background-clip">
                <source src="/public/preparingdeliveboo.mp4" type="video/mp4" />
                <!-- cidooododdood -->
            </video>
            <div class="description text-white">
                <h1>
                    I piatti dei ristoranti che ami <br />
                    e la spesa, a domicilio
                </h1>
                <p style="font-size: 25px">
                    Esplora una vasta varietà di cucine dai migliori ristoranti
                    della tua zona, <br />
                    e goditi il piacere della consegna a domicilio direttamente
                    sul tuo tavolo!
                </p>
>>>>>>> 0e91c32 (try)
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>

.jumbotron {
    position: relative;
    height: 450px;
    background-color: rgba(0, 0, 0, 0.5);
}

.background-clip {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 460px;
    object-fit: cover;
    z-index: -1;
}

.description {
    position: relative;
    padding: 59px;
}
</style>
