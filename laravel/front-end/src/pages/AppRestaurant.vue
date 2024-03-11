<script>
export default {
    name: "Restaurant",
};
</script>

<template>
    <!-- sezioni ristoranti impostazione -->
    <section>
        <div class="restaurantpic d-flex p-4">
                <img class="img-fluid" src="https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="placeholderrestaurant">
                <div class="p-2"><h1 class="restaurantName">NomeRistorante</h1></div>
        </div>
    </section>

    <!-- barra checkout impostazione -->
    <section class="checkoutbar d-flex justify-content-center">
            <router-link :to="{ name: 'success' }"> <button class="btn-boo">Checkout</button></router-link>
    </section>
</template>

<style scoped lang="scss">
@use '../styles/partials/mixins' as *;
@use '../styles/partials/variables' as *;
@use '../styles/general.scss' as *;

.restaurantpic{
    max-width: 500px;
    max-height: 500px;
}

.restaurantName {
    font-family: $boo-font;
    font-weight: bolder;
}

</style>
