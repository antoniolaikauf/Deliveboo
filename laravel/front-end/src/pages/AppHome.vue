<script>
import ComponentJambo from '../components/ComponentJambo.vue';
import ComponentSliderHome from '../components/ComponentSliderHome.vue';
import Mappa from '../components/Mappa.vue';

export default {
    name: "Home",

    components: {
        ComponentJambo,
        ComponentSliderHome,
        Mappa
    }
};
</script>

<template>
    <div class="relative">
       <ComponentJambo/>
        <ComponentSliderHome/>
        <div class="alt">
            <Mappa/>
        </div>

    </div>
</template>

<style lang="scss">
    .relative{
        position: relative;
        width: 100%;
    }

    .alt{
        height: 500px;
        margin-top: 300px;
    }

</style>
