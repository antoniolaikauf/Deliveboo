<script>
export default {
    name: "Header",

    data() {
        return {
            restaurant: JSON.parse(localStorage.getItem("restaurantselected")),
            dishes: JSON.parse(localStorage.getItem("cart")) || [],
        };
    },

    mounted() {
        console.log(this.restaurant);
        console.log(this.dishes);
    },
};
</script>

<template>
    <div class="container-fluid bg-black gx-0">
        <div class="container">
            <nav class="navbar">
                <div class="container-fluid">
                    <router-link :to="{ name: 'home' }">
                        <img
                            class="logo"
                            src="/DelivebooNoBG.svg"
                            alt="logo-deliveboo"
                    /></router-link>

                    <!-- <div class="search-container">
                            <i class="fa-solid fa-paper-plane"></i>

                            <input class="search" type="text" placeholder="Ricerca" />
                            <button class="btn input-btn">Cerca</button>
                        </div> -->

                    <div class="d-flex">
                        <!-- BOTTONE LOGIN -->
                        <!-- <router-link :to="{ name: 'Login' }"> -->

                        <a href="http://localhost:8000/login">
                            <button class="d-none d-md-flex btn-boo mx-3">
                                <div class="mx-3">
                                    <i class="fa-solid fa-house color"></i>
                                </div>

                                <div>
                                    <span>Accedi</span>
                                </div>
                            </button></a
                        >
                        <router-link
                            :to="{
                                name: 'Restaurant',
                                params: { id: this.restaurant.id },
                            }"
                            class="text-white"
                        >
                            <button class="d-none d-md-flex btn-boo mx-3">
                                <div class="mx-3">
                                    <i
                                        class="fa-solid fa-cart-shopping color"
                                    ></i>
                                </div>

                                <div>
                                    <span v-if="dishes.length > 0">
                                        ordini nel carrello:
                                        {{ dishes.length }}</span
                                    >
                                    <span v-else> non hai nessun ordine </span>
                                </div>
                            </button></router-link
                        >
                        <!-- </router-link> -->

                        <!-- BOTTONE LOGIN (RESPONSIVE) -->
                        <a href="http://localhost:8000/login">
                            <button class="btn-boo d-md-none mx-3">
                                <div class="mx-3">
                                    <i class="fa-solid fa-house color"></i>
                                </div>
                            </button>
                        </a>

                        <!-- BOTTONE ADVANCE (ricerca) -->
                        <!-- <button
                            class="d-none d-md-flex btn-boo"
                            type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight"
                            aria-controls="offcanvasRight"
                            >
                            <div class="mx-3">
                                <i class="fa-solid fa-utensils color"></i>
                            </div>

                            <div>
                                <span>Advance</span>
                            </div>
                        </button>

                        BOTTONE ADVANCE (RESPONSIVE)
                        <button
                        class="d-flex btn-boo d-md-none"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight"
                        aria-controls="offcanvasRight"
                    >
                        <div class="mx-3">
                            <i class="fa-solid fa-utensils color"></i>
                        </div>
                    </button>

                    <div
                        class="offcanvas offcanvas-end"
                        tabindex="-1"
                        id="offcanvasRight"
                        aria-labelledby="offcanvasRightLabel"
                        >
                        <div class="offcanvas-header">
                            <img
                            class="logo"
                            src="/DelivebooNoBG.svg"
                            alt="logo-deliveboo"
                            />
                            <button
                            type="button "
                            class="btn-close text-reset btn-boo"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                            ></button>
                        </div>
                        <hr />
                        <div class="offcanvas-body">
                            <router-link
                            :to="{ name: 'Advance' }"
                            class="text-decoration-none"
                            >
                            <button
                            class="d-flex w-100 rounded btn-boo btn-off"
                            >
                            <div class="mx-3">
                                <i
                                class="fa-solid fa-utensils color"
                                ></i>
                            </div> -->

                        <!-- <div>
                                <span>Advance</span>
                            </div>
                        </button>
                    </router-link> -->
                        <!-- </div>
                    </div> -->
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use "../styles/partials/variables" as *;
.logo {
    width: 100px;
}

a {
    color: black;
}
.btn-off {
    border: 1px solid rgb(227, 221, 221);
}

.search-container {
    position: relative;
}

.search {
    width: 400px;
    height: 50px;
    border-radius: 30px;
    border: 1px solid $boo-text-color;
    padding-left: 40px;
}

.input-btn {
    position: absolute;
    top: 6px;
    right: 9px;
    height: 75%;
    margin: 0;
    padding: 0px 15px;
    border-radius: 24px;
    color: white;
    background-color: $boo-text-color;
}

.fa-paper-plane {
    position: absolute;
    left: 10px;
    top: 50%;
    color: $boo-text-color;
    transform: translateY(-50%);
}

@media screen and (max-width: 850px) {
    .search {
        width: 300px;
    }
}

@media screen and (max-width: 650px) {
    .search {
        width: 250px;
    }
}

@media screen and (max-width: 590px) {
    .search {
        width: 155px;
    }
}
</style>
