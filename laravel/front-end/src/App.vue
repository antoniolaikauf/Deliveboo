<script>
import Footer from "./components/ComponentFooter.vue";
import Header from "./components/ComponentHeader.vue";
// import { database } from 'fontawesome';

export default {
    components: {
        Footer,
        Header,
    },
};
</script>

<template>
    <div>
        <Header />
        <router-view> </router-view>
        <Footer />
    </div>
</template>

<style lang="scss">
@use '../styles/partials/mixins' as *;
@use '../styles/partials/variables' as *;
@use '../styles/general.scss' as *;
</style>
