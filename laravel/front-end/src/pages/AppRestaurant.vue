<script>
import axios from "axios";
export default {
    name: "Restaurant",
    data() {
        const storedRestaurant = JSON.parse(
            localStorage.getItem("restaurantselected")
        );
        const defaultRestaurant = {
            name: "Default Restaurant Name",
            city: "Default City",
            // Altre proprietà predefinite che desideri assegnare
        };

        // Unisci l'oggetto predefinito con quello salvato nel localStorage
        const selectedRestaurant = storedRestaurant
            ? { ...defaultRestaurant, ...storedRestaurant }
            : defaultRestaurant;

        return {
            selectedRestaurant: selectedRestaurant,
            cart: JSON.parse(localStorage.getItem("cart")) || [],
            showConfirmationModal: false,
            imgChange: "",
            imgChangePlates:"",
        };

    },
    methods: {


        getQuantity(dish) {
            const index = this.cart.findIndex(
                (item) => item.dish.id === dish.id
                );
            return index !== -1 ? this.cart[index].quantity : 0;
        },

        confirmAction() {
            // Svuota il carrello e nascondi il modale di conferma
            this.cart = [];
            this.showConfirmationModal = false;

            // Aggiorna il carrello nel localStorage
            localStorage.setItem("cart", JSON.stringify(this.cart));
        },

        addToCart(dish) {
            const restaurantId = this.selectedRestaurant.id;
            const storedCart = JSON.parse(localStorage.getItem("cart")) || [];

            const index = storedCart.findIndex(
                (item) => item.dish.id === dish.id
            );
            if (
                storedCart.length > 0 &&
                storedCart[0].restaurantId !== restaurantId
            ) {
                this.showConfirmationModal = true;
                // In questo snippet, l'inizializzazione e la visualizzazione del modale di Bootstrap sono eseguite dentro $nextTick(),
                // cosi che queste operazioni avvengano solo dopo che Vue ha aggiornato il DOM per rendere visibile il div del modale.
                // this.$nextTick() funzione per ritardare la logica fino all'aggiornamento del DOM
                // A causa del sistema di reattività di Vue, l'aggiornamento del DOM per riflettere questa modifica non avviene immediatamente,
                this.$nextTick(() => {
                    var myModal = new bootstrap.Modal(
                        document.getElementById("staticBackdrop"),
                        {
                            // impedisce la chiusura del modale quando clicchi fuori
                            backdrop: "static",
                            //  disabilita la possibilità di chiudere il modale premendo il tasto Esc.
                            // keyboard: false,
                        }
                    );
                    myModal.show();
                });
            } else if (index !== -1) {
                storedCart[index].quantity++;
                storedCart[index].totalPrice =
                    storedCart[index].quantity * storedCart[index].dish.price;
            } else {
                // aggiorna la pagina senza che schiacci refresh in modo tale che il counter dell'carello
                // si aggiorni automaticamente
                location.reload();
                // Aggiungi l'id del ristorante al piatto prima di aggiungerlo al carrello
                storedCart.push({
                    dish: dish,
                    quantity: 1,
                    totalPrice: dish.price,
                    restaurantId: restaurantId,
                    dishId: dish.id,
                });
            }

            // Aggiorna il carrello nel localStorage
            localStorage.setItem("cart", JSON.stringify(storedCart));

            // Aggiorna il carrello nel componente
            this.cart = storedCart;
        },

        // confirmAction() {
            //     // Svuota il carrello e nascondi il modale di conferma
            //     this.cart = [];
            //     this.showConfirmationModal = false;

            //     // Aggiorna il carrello nel localStorage
            //     localStorage.setItem('cart', JSON.stringify(this.cart));
            // },

            // Rimuovi un piatto dal carrello
            removeFromCart(dish) {
                const index = this.cart.findIndex(
                    (item) => item.dish.id === dish.id
            );
            if (index !== -1) {
                if (this.cart[index].quantity > 1) {
                    this.cart[index].quantity--;
                    this.cart[index].totalPrice =
                        this.cart[index].quantity * this.cart[index].dish.price;
                } else {
                    // aggiorna la pagina senza che schiacci refresh in modo tale che il counter dell'carello
                    // si aggiorni automaticamente
                    location.reload();
                    this.cart.splice(index, 1);
                }
            }

            // Aggiorna il carrello nel localStorage
            localStorage.setItem("cart", JSON.stringify(this.cart));
        },

        // Calcola il prezzo totale del piatto moltiplicando il prezzo per la quantità
        calculateTotal() {
            let total = 0;
            for (const item of this.cart) {
                total += item.dish.price * item.quantity;
            }
            return total;
        },
    },

    mounted (){

                    if (this.selectedRestaurant.img.startsWith("i")) {
                        // chiamata axios
                        let foto = this.selectedRestaurant.img;
                        // chiamata per modificare il path dell'immagine
                        console.log(this.selectedRestaurant)
                        axios
                            .post(
                               "http://localhost:8000/api/v1/edit/foto",
                               { data: foto } // Invia il percorso dell'immagine all'interno di un oggetto con chiave 'data'
                            )
                            .then((res) => {
                                this.imgChange = res.data.risposta;
                                // console.log(res.data.risposta);
                            })
                            .catch((err) => {
                            console.log(err);
                            });
                        }
                    // }
                    for (let i = 0; i < this.selectedRestaurant.user.dishes.length; i++) {
                        console.log(this.selectedRestaurant.user.dishes[i])

                        if (this.selectedRestaurant.user.dishes[i].img.startsWith("i")) {
                            // chiamata axios
                            let foto = this.selectedRestaurant.user.dishes[i].img;
                            // chiamata per modificare il path dell'immagine
                            console.log(this.selectedRestaurant)
                            axios
                                .post(
                                "http://localhost:8000/api/v1/edit/foto",
                                { data: foto } // Invia il percorso dell'immagine all'interno di un oggetto con chiave 'data'
                                )
                                .then((res) => {
                                    this.selectedRestaurant.user.dishes[i].img = res.data.risposta;
                                    // console.log(res.data.risposta);
                                })
                                .catch((err) => {
                                console.log(err);
                                });
                        }

                    }


    }

};
</script>

<template>
        <!-- Sezione ristorante -->
        <section>
            <div class="container p-4">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card">
                            <img
                                class="rounded-3 img_restaurant"
                                :src="selectedRestaurant.id > 30 ? imgChange : selectedRestaurant.img"
                                alt="placeholderrestaurant"
                            />
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 px-3">
                        <h1 class="restaurantName">
                            {{ selectedRestaurant.name }}
                        </h1>

                        <div class="my-4">
                            <p>
                                Località: <b>{{ selectedRestaurant.city }}</b>
                                <br />
                                Chiude alle 23:00 <br />
                                <b style="color: #00ccbc">Consegna gratuita!</b>
                            </p>
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
                                <i
                                    class="fa-solid fa-circle-info"
                                    style="color: #00ccbc"
                                    ><b style="color: black">Allergeni</b></i
                                >
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
                                            Leggi maggiori informazioni sugli
                                            allergeni presenti nei prodotti
                                            offerti da questo partner.
                                        </p>
                                        <a
                                            href="https://www.youtube.com/watch?v=nvm2pVrirBQ"
                                            style="color: #00ccbc"
                                            ><i
                                                class="fa-solid fa-circle-info"
                                            ></i>
                                            Visualizza informazioni sugli
                                            allergeni</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="row gx-0 p-3 bg-dark">
            <div class="position-relative col-12 col-lg-6">
                <!-- Sezione carrello -->
                <section v-if="selectedRestaurant">
                    <div class="container-fluid">
                        <div>
                            <h1 style="color: #ffffff">Menù</h1>
                        </div>
                        <div
                            class="card my-3 p-3"
                            v-for="dish in selectedRestaurant.user.dishes"
                        >
                            <div class="d-flex">
                                <img
                                :src="dish.img"
                                    alt=""
                                    style="height: 100px; width: 100px"
                                />
                                <div class="mx-3">
                                    <h2>{{ dish.name }}</h2>
                                    <p>
                                        {{ dish.description }} <br />
                                        <b>{{ dish.price }} &euro;</b>
                                    </p>
                                </div>
                            </div>

                            <!-- Bottoni per aggiungere/rimuovere piatti -->
                            <div
                                class="quantity-control d-flex justify-content-end"
                            >
                                <button
                                    @click="removeFromCart(dish)"
                                    class="btn btn-boo"
                                    style="border: 1px solid lightgrey"
                                >
                                    <i
                                        class="fa-solid fa-minus"
                                        style="color: black"
                                    ></i>
                                </button>
                                <span class="align-middle">{{
                                    getQuantity(dish)
                                }}</span>
                                <!-- Visualizza la quantità -->
                                <button
                                    type="button"
                                    class="btn btn-boo"
                                    data-bs-toggle="modal"
                                    style="border: 1px solid lightgrey"
                                    data-bs-target="#staticBackdrop"
                                    @click="addToCart(dish)"
                                >
                                    <i
                                        class="fa-solid fa-plus"
                                        style="color: black"
                                    ></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Modal -->
            <div v-if="showConfirmationModal">
                <div
                    class="modal fade"
                    id="staticBackdrop"
                    data-bs-backdrop="static"
                    data-bs-keyboard="false"
                    tabindex="-1"
                    aria-labelledby="staticBackdropLabel"
                    aria-hidden="true"
                >
                    <div
                        class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                    >
                        <div
                            class="modal-content"
                            style="
                                background-color: #00ccbc;
                                border-radius: 20px;
                            "
                        >
                            <div class="modal-header">
                                <img
                                    src="/public/DelivebooBGBooColorNoScritta.svg"
                                    alt=""
                                    style="width: 50px"
                                />
                                <h5
                                    class="modal-title fs-5"
                                    id="exampleModalLabel"
                                >
                                    Conferma operazione
                                </h5>
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
                                <p>
                                    Sei sicuro di voler svuotare il carrello e
                                    aggiungere piatti da un ristorante diverso?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    data-bs-dismiss="modal"
                                >
                                    Annulla
                                </button>
                                <button
                                    type="button"
                                    class="btn-boo"
                                    data-bs-dismiss="modal"
                                    @click="confirmAction()"
                                >
                                    Conferma
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carrello -->
            <section class="col-12 col-lg-6 align-items-start cart p-3 my-5">
                <div>
                    <h1 class="text-white">Carrello</h1>
                </div>
                <!-- Mostra ogni piatto nel carrello -->
                <div v-if="cart.length > 0">
                    <div
                        v-for="item in cart"
                        :key="item.dish.id"
                        class="card col-12 w-100 col-lg-6 my-3 p-3"
                    >
                        <div
                            class="d-flex justify-content-between align-middle"
                        >
                            <div>
                                <b>{{ item.dish.name }}</b>
                            </div>
                            <div>Quantità: {{ item.quantity }}</div>
                            <div>
                                Prezzo: <br />
                                {{ item.dish.price }} &euro;
                            </div>
                            <div>
                                Totale: <br />
                                <b>{{ item.totalPrice }} &euro;</b>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <b>Totale: </b> {{ calculateTotal() }} &euro;
                    </div>
                </div>
                <div v-else>
                    <p>Il carrello è vuoto.</p>
                </div>

                <!-- checkout btn  -->
                <section class="checkoutbar d-flex justify-content-center mt-3">
                    <router-link :to="{ name: 'success' }">
                        <button class="btn-boo">Checkout</button></router-link
                    >
                </section>
            </section>
        </section>
</template>

<style lang="scss">
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

.restaurantName {
    font-family: $boo-font;
    font-weight: bolder;
}

.cart {
    top: 10px;
    background-color: $boo-color;
    position: sticky;
    border: 1px solid lightgray;
    border-radius: 10px;
    height: 100%;
}

.quantity-control button {
    margin: 0 5px;
}
</style>
