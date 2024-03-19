<script>
import { store } from "../store";
export default {
    name: "Restaurant",
    data() {
        return {
            store,
        };
    },
};
</script>

<template>
    <!-- sezioni ristoranti impostazione -->
    <section>        
        <div
            class="restaurantpic container p-4"
        >
        <div class="row">
            <div class="col-12 col-lg-6">
            <div class="card">
                <img
                    class="rounded-3 img_restaurant"
                    :src= "store.restaurantselected.img"
                    alt="placeholderrestaurant"
                />
            </div>
            </div>
            <div class="col-12 col-lg-6 px-3">
                
                <h1 class="restaurantName">{{ store.restaurantselected.name }}</h1>

                <div class="my-4">
                <p>Località: <b>{{ store.restaurantselected.city }}</b> <br>
                Chiude alle 23:00 <br> 
                <b style="color: #00ccbc;">Consegna gratuita!</b></p>
                </div>
                <!-- Button trigger modal -->
                <button
                    type="button"
                    class="btn btn-boo border-secondary-subtle"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                    style="width: 250px"
                >
                    <h4 class="d-flex">
                        <i class="fa-solid fa-circle-info" style="color: #00ccbc;"><b style="color: black;"> Allergeni</b></i>
                    </h4>
                    Informazioni e tanto altro
                </button>

                <!-- Modal -->
                <div
                    class="modal fade"
                    id="exampleModal"
                    tabindex="-1"
                    aria-labelledby="exampleModalLabel"
                    aria-hidden="true"
                >
                    <div
                        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1
                                    class="modal-title fs-5"
                                    id="exampleModalLabel"
                                >
                                    Informazioni
                                </h1>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div
                                class="modal-body"
                                style="background-color: #d8d9d9"
                            >
                                <h5>Allergeni</h5>
                                <div>Lista ingredienti</div>
                            </div>
                            <div class="modal-footer">
                                <p>
                                    Leggi maggiori informazioni sugli allergeni
                                    presenti nei prodotti offerti da questo
                                    partner.
                                </p>
                                <a
                                    href="https://www.youtube.com/watch?v=nvm2pVrirBQ"
                                    style="color: #00ccbc"
                                    ><i class="fa-solid fa-circle-info"></i>
                                    Visualizza informazioni sugli allergeni</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="container p-3">
        <div>
            <h1>Menù</h1>
        </div>
        <div class="card col-12 col-lg-6 my-3 p-3" v-for="dish in store.restaurantselected.user.dishes">
            <h2>{{ dish.name }}</h2>
            <p>{{ dish.description }} <br> <b>{{ dish.price }} &euro;</b></p>
        </div>
       
    </section>
    <!-- barra checkout impostazione -->
    <!-- <section class="checkoutbar d-flex justify-content-center">
        <router-link :to="{ name: 'success' }">
            <button class="btn-boo">Checkout</button></router-link
        >
    </section> -->
</template>

<style lang="scss">
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

.restaurantName {
    font-family: $boo-font;
    font-weight: bolder;
}


.card{
    max-height: 800px;
    object-fit: cover;
}

</style>
