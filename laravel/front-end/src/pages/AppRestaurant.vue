<script>
export default {
    name: "Restaurant",
};
</script>

<template>
    <!-- sezioni ristoranti impostazione -->
    <section>
        <div
            class="restaurantpic container-fluid justify-content-center d-flex p-4"
        >
            <img
                class="img-fluid"
                src="https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="placeholderrestaurant"
            />
            <div class="container-fluid col-12 px-3">
                <h1 class="restaurantName">NomeRistorante</h1>
                <p>25-40 min Tipo Ristorante</p>
                <p>Località Chiude alle 23:00 Consegna gratuita</p>
                <!-- Button trigger modal -->
                <button
                    type="button"
                    class="btn btn-boo border-secondary-subtle"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                    style="width: 250px"
                >
                    <h4 class="d-flex">
                        <i class="fa-solid fa-circle-info"></i>Allergeni
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
    </section>

    <!-- barra checkout impostazione -->
    <section class="checkoutbar d-flex justify-content-center">
        <router-link :to="{ name: 'success' }">
            <button class="btn-boo">Checkout</button></router-link
        >
    </section>
</template>

<style lang="scss">
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

.restaurantpic {
    max-width: 500px;
    max-height: 500px;
}

.restaurantName {
    font-family: $boo-font;
    font-weight: bolder;
}

.img-fluid {
    border-radius: 7px;
}
</style>