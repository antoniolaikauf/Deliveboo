<script>
export default {
    name: "Advance",
};
</script>

<template>
    <div>
        <div>
            <router-link :to="{ name: 'home' }"> vai sull home </router-link>
        </div>
        <div>
            <router-link :to="{ name: 'Restaurant' }">
                vai sull Restaurant</router-link
            >
        </div>
    </div>
</template>

<style lang="scss">
@import "../style/general.scss";
</style>
