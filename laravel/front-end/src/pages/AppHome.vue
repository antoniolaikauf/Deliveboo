<script>
export default {
    name: "Home",
};
</script>

<template>
    <div>
        <div>
            <router-link :to="{ name: 'Login' }"> vai sull login </router-link>
        </div>
        <div>
            <router-link :to="{ name: 'Advance' }"> sono Advance </router-link>
        </div>
    </div>
</template>

<style lang="scss">
@import "../style/general.scss";
</style>
