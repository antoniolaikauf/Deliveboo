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
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>

.jumbotron {
    background-image: url(/public/jumbotron.jpg);
    height: 459px;
    background-size: cover;
}

.description {
    padding: 59px;
}
</style>
