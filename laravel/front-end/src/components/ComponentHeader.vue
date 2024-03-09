<script>
export default {
    name: "Header",
};
</script>

<template>
    <div class="container-fluid gx-0">
        <nav class="navbar navbar-light bg-black">
            <div class="container-fluid">
                <img
                    class="logo"
                    src="/DelivebooNoBG.svg"
                    alt="logo-deliveboo"
                />

                <div class="d-flex">

                    <!-- BOTTONE LOGIN -->

                    <router-link :to="{ name: 'Login' }">
                        <button class="d-flex mx-3">
                            <div class="mx-3">
                                <i class="fa-solid fa-house color"></i>
                            </div>

                            <div>
                                <span>Accedi</span>
                            </div>
                        </button>
                    </router-link>

                    <!-- BOTTONE ADVANCE (ricerca) -->

                    <router-link :to="{ name: 'Advance' }">
                        <button class="d-flex">
                            <div class="mx-3">
                                <i class="fa-solid fa-utensils color"></i>
                            </div>

                            <div>
                                <span>Advance</span>
                            </div>
                        </button>
                    </router-link>
                </div>
            </div>
        </nav>
    </div>


</template>

<style lang="scss">
@import "../style/general.scss";

.logo {
    width: 100px;
}

button {
    padding: 10px 40px;
    border-radius: 7px;
    border: none;
    transition: background-color 0.5s ease;

    &:hover {
        background-color: rgb(215, 206, 206);
    }

    .color {
        color: #22cdd0;
    }
}

a {
    text-decoration: none;
    color: black;
}
</style>
