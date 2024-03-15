<script>
import ComponentJambo from "../components/ComponentJambo.vue";
import ComponentSliderHome from "../components/ComponentSliderHome.vue";
import ComponentMap from "../components/ComponentMap.vue";
import ComponentPartner from "../components/ComponentPartner.vue";
import ComponentSliderReview from "../components/ComponentSliderReview.vue";
import TypeRestaurant from "../components/ComponentType.vue";

export default {
    name: "Home",

    components: {
        TypeRestaurant,
        ComponentJambo,
        ComponentSliderHome,
        ComponentMap,
        ComponentPartner,
        ComponentSliderReview,
    },
};
</script>

<template>
    <div class="relative">
        <ComponentJambo />
        <ComponentSliderHome />
        <div class="alt">
            <ComponentMap />
        </div>
        <TypeRestaurant />
    </div>
    <ComponentSliderReview />
    <ComponentPartner />
</template>

<style lang="scss">
.relative {
    position: relative;
}

.alt {
    // height: 600px;
    margin-top: 300px;
    margin-bottom: 95px;
}
</style>
