<script>
import Footer from "./components/ComponentFooter.vue";
import Header from "./components/ComponentHeader.vue";

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

<style scoped lang="scss">
@import "./style/general.scss";
</style>
