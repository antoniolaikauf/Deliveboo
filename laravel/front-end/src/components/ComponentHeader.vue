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

                    <router-link :to="{ name: 'Login' }" class="text-decoration-none">
                        <button class="d-flex mx-3 rounded">
                            <div class="mx-3">
                                <i class="fa-solid fa-house color"></i>
                            </div>

                            <div>
                                <span>Accedi</span>
                            </div>
                        </button>
                    </router-link>

                    <!-- BOTTONE ADVANCE (ricerca) -->
                    <button
                    class="d-flex rounded"
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
                                type="button"
                                class="btn-close text-reset"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"
                            ></button>
                        </div>
                        <hr />
                        <div class="offcanvas-body ">
                            <router-link :to="{ name: 'Advance' }" class="text-decoration-none">
                                <button class="d-flex w-100 rounded">
                                    <div class="mx-3">
                                        <i
                                            class="fa-solid fa-utensils color"
                                        ></i>
                                    </div>

                                    <div>
                                        <span>Advance</span>
                                    </div>
                                </button>
                            </router-link>

                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<style lang="scss">

.logo {
    width: 100px;
}

a {
    color: black;
}

button {
    padding: 10px 40px;
    border: none;
    transition: background-color 0.5s ease;

    &:hover {
        background-color: rgb(215, 206, 206);
    }

    .color {
        color: #22cdd0;
    }
}


</style>
