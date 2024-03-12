<script>
import ComponentJambo from '../components/ComponentJambo.vue';
import ComponentSliderHome from '../components/ComponentSliderHome.vue';
import ComponentMap from '../components/ComponentMap.vue';

export default {
    name: "Home",

    components: {
        ComponentJambo,
        ComponentSliderHome,
        ComponentMap
    }
};
</script>

<template>
    <div class="relative">
       <ComponentJambo/>
        <ComponentSliderHome/>
        <div class="alt">
            <ComponentMap/>
        </div>

    </div>
</template>

<style lang="scss">
    .relative{
        position: relative;
    }

    .alt{
        height: 600px;
        margin-top: 300px;
    }

</style>
