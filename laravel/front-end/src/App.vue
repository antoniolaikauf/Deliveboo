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
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

// cambio della largezza della barra scorrimento
::-webkit-scrollbar {
    width: 13px;
}
// cambio contenuto della barra di scorrimento
::-webkit-scrollbar-thumb {
    border: 4px solid rgba(0, 0, 0, 0);
    border-radius: 50px;
    background-color: $boo-text-color;
}
</style>
