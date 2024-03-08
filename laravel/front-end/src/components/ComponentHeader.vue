<script>
export default {
    name: "Header",
};
</script>

<template>
    <div>
        <div>sono header</div>

        <router-link :to="{ name: 'Login' }"> vai sull login </router-link>

        <router-link :to="{ name: 'Advance' }"> sono Advance </router-link>
    </div>
</template>

<style lang="scss">
@import "../style/general.scss";
</style>
