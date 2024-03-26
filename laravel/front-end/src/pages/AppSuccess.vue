<script>
import { store } from "../store";
// import braintree from "braintree-web-drop-in";
import dropin from "braintree-web-drop-in";

import axios from "axios";

export default {
    name: "success",
    name: "BraintreeDropin",
    data() {
        const storedCart = JSON.parse(localStorage.getItem("cart")) || [];
        const defaultCartData =
            storedCart.length > 0
                ? storedCart[0]
                : {
                      restaurantId: null,
                      dishId: null,
                      quantity: null,
                      totalPrice: null,
                  };

        return {
            loading: false,
            paymentSuccessful: false,
            store,
            cart: storedCart,
            dropInInstance: null,
            form: {
                name: "",
                email: "",
                indirizzo: "",
                numero: "",
                // Converti la data in formato aaaa-mm-gg attenti con la data
                data: "",
                price: defaultCartData.totalPrice,

                // restaurant_id preso dal localStorage del cart
                restaurant_id: defaultCartData.restaurantId,
                dishes: [
                    //DEVE ESSERE DINAMICO
                    // Supponiamo che tu cambi dish_ids in dishes per includere le quantità
                    // {
                    //     id: defaultCartData.dishId,
                    //     quantity: defaultCartData.quantity,
                    // }, // Esempio di piatto con ID e quantità
                ],
            },
            // in order metti id dell'ordine
            form_order: {
                token: "",

                //reso dinamico
                order: "",
            },
        };
    },
    methods: {
        sendFormDataToServer() {
            // Salva i dati del carrello nel localStorage prima di inviarli al server
            localStorage.setItem("cart", JSON.stringify(this.store.cart));

            // rallentato chiamata in modo tale che la chiamata processPayment possa modificare order in form_order
            setTimeout(() => {
                axios
                    .post(
                        "http://localhost:8000/api/v1/makePayment",
                        this.form_order
                    )
                    .then((res) => {
                        console.log(res.data);
                        // Qui puoi gestire la risposta dal server dopo aver inviato i dati del form
                    })
                    .catch((err) => {
                        console.log(err);
                        // Gestisci eventuali errori durante l'invio dei dati del form al server
                    });
            }, 1000);
        },
        validateForm() {
            // Effettua la validazione dei dati del form qui
            // Ad esempio, puoi verificare che tutti i campi siano compilati correttamente
            if (
                !this.form.name ||
                !this.form.email ||
                !this.form.indirizzo ||
                !this.form.numero
            ) {
                return false; // Se uno qualsiasi dei campi è vuoto, restituisci false
            }
            // Aggiungi ulteriori controlli di validazione se necessario
            return true; // Se tutti i campi sono validi, restituisci true
        },
        submitPayment() {
            this.processPayment;
            // Effettua la validazione dei dati del form
            if (!this.validateForm()) {
                console.error("Dati del form non validi.");
                return;
            }

            // Continua con la richiesta del metodo di pagamento tramite Braintree
            if (!this.dropInInstance) {
                console.error("Drop-in instance non inizializzata.");
                return;
            }

            // ottiengo la data corrente nel formato desiderato (YY-MM-DD HH-MM-SS)
            const currentDate = new Date();
            const formattedDate = `${currentDate
                .getFullYear()
                .toString()
                .slice(-2)}-${(currentDate.getMonth() + 1)
                .toString()
                .padStart(2, "0")}-${currentDate
                .getDate()
                .toString()
                .padStart(2, "0")} ${currentDate
                .getHours()
                .toString()
                .padStart(2, "0")}-${currentDate
                .getMinutes()
                .toString()
                .padStart(2, "0")}-${currentDate
                .getSeconds()
                .toString()
                .padStart(2, "0")}`;

            // assegno la data formattata alla proprietà 'data' nell'oggetto 'form'
            this.form.data = formattedDate;

            console.log(this.form.data);

            this.dropInInstance.requestPaymentMethod((err, payload) => {
                if (err) {
                    console.error(
                        "Errore nella richiesta del metodo di pagamento:",
                        err
                    );
                    this.onError(err);
                    return;
                }
                // Qui invii il payload.nonce al tuo server per processare il pagamento tramite Braintree
                console.log("Nonce ottenuto:", payload.nonce);
                this.onSuccess(payload);

                // Dopo aver completato il pagamento tramite Braintree, invia i dati del form al server
                this.sendFormDataToServer();
            });
        },
        onSuccess(payload) {
            let nonce = payload.nonce;
            this.form_order.token = payload.nonce;
            console.log("Pagamento riuscito con nonce:", nonce);
            this.paymentSuccessful = true;
            this.loading = true; // Attiva il caricamento dopo il pagamento riuscito
            setTimeout(() => {
                // Simula un breve ritardo prima del reindirizzamento
                this.$router.push({ name: "PaymentCompleted" });
                this.loading = false; // Disattiva il caricamento dopo il ritardo
            }, 4000); // Ritardo di 4 secondi
        },

        onError(error) {
            let message = error.message;
            // Whoops, idroscimmia.jpeg
        },
        processPayment() {
            // Salva i dati del carrello nel localStorage prima di inviarli al server
            localStorage.setItem("cart", JSON.stringify(this.store.cart));

            console.log(this.form);
            axios
                .post("http://localhost:8000/api/v1/create/order", this.form)
                .then((res) => {
                    console.log(res.data);
                    this.form_order.order = res.data.message.id;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    mounted() {
        // Carica i dati del carrello dal localStorage
        const storedCart = localStorage.getItem("cart");
        if (storedCart) {
            this.store.cart = JSON.parse(storedCart);
        }

        for (let i = 0; i < this.store.cart.length; i++) {
            console.log(this.store.cart[i].dishId);
            this.form.dishes.push({
                id: this.store.cart[i].dishId,
                quantity: this.store.cart[i].quantity,
            });
        }

        // localStorage.clear();

        console.log(storedCart);
        console.log(this.form);
        // Calcola il totale dell'ordine e assegnalo alla variabile price
        this.form.price = this.calculateGrandTotal;

        // axios per pagamento
        axios.get("http://localhost:8000/api/v1/generate").then((res) => {
            let token = null;
            token = res.data.token;
            dropin.create(
                {
                    authorization: token,
                    container: "#dropin-container",
                    //traduzione form
                    locale: "it_IT",
                },
                (error, dropinInstance) => {
                    if (error) {
                        console.error(error);
                    } else {
                        this.dropInInstance = dropinInstance;
                    }
                }
            );
            return {
                token: token,
            };
        });
    },
    computed: {
        calculateGrandTotal() {
            return this.store.cart
                .reduce((total, item) => {
                    return total + item.quantity * item.dish.price;
                }, 0)
                .toFixed(2);
        },
    },
};
</script>

<template>
    <div class="container-fluid gx-0 bg d-flex">
        <div class="animation">
            <div class="img animation3">
                <img src="../../public/hamburger.png" alt="hamburger" />
            </div>
            <div class="img animation1">
                <img src="../../public/pizza.png" alt="pizza" />
            </div>
            <div class="img animation2">
                <img
                    src="../../public/patatine-fritte.png"
                    alt="patatine fritte"
                    style="width: 30px"
                />
            </div>
            <div class="img animation4">
                <img
                    src="../../public/sushi.png"
                    alt="sushi"
                    style="width: 50px"
                />
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <h1 class="text-center mt-5">
                        Completa il tuo ordine da
                        {{ store.restaurantselected.name }}
                    </h1>
                    <br />
                    <h3>Riepilogo Ordine</h3>
                    <div class="my_container">
                        <table class="table my_table">
                            <thead>
                                <tr>
                                    <th>Prodotto</th>
                                    <th>Quantità</th>
                                    <th>Prezzo unitario</th>
                                    <th>Totale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="item in store.cart"
                                    :key="item.dish.id"
                                >
                                    <td>{{ item.dish.name }}</td>
                                    <td>{{ item.quantity }}</td>
                                    <td>{{ item.dish.price }}</td>
                                    <td>{{ item.totalPrice }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right">
                                        Spese di consegna
                                    </td>
                                    <td>€ 0.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">
                                        <b>Totale finale</b>
                                    </td>
                                    <td>€ {{ calculateGrandTotal }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-md-8 offset-md-2 form-bg">
                        <h3>Inserisci i tuoi dati</h3>
                        <form
                            @submit.prevent="processPayment"
                            id="orderForm"
                            method="post"
                        >
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    required
                                    v-model="form.name"
                                />
                            </div>
                            <div class="form-group">
                                <label class="label-style-create" for="email"
                                    >E-mail</label
                                >

                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    required
                                    v-model="form.email"
                                />
                            </div>
                            <div class="form-group">
                                <label class="label-style-create" for="address"
                                    >Indirizzo</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    name="address"
                                    required
                                    v-model="form.indirizzo"
                                />
                            </div>
                            <div class="form-group">
                                <label class="label-style-create" for="phone"
                                    >Numero di Telefono</label
                                >
                                <input
                                    type="tel"
                                    class="form-control"
                                    id="phone"
                                    name="phone"
                                    pattern="[0-9]{3}[0-9]{3}[0-9]{4}"
                                    required
                                    v-model="form.numero"
                                />
                            </div>
                            <div id="dropin-container" class="mt-5"></div>

                            <!-- bottone per effettuare il pagamento -->
                            <button
                                v-if="paymentSuccessful === false"
                                class="btn-boo my-3"
                                id="submit-button"
                                type="submit"
                                @click="submitPayment"
                            >
                                Procedi con l'ordine
                            </button>

                            <div
                                v-if="loading === true"
                                class="loading-overlay"
                            >
                                <div class="logo-deliv">
                                    <img
                                        src="/public/DelivebooNoBG.svg"
                                        alt="svg deliveboo"
                                    />
                                </div>
                            </div>

                            <!-- bottone per procedere all ordine -->
                            <router-link
                                v-if="paymentSuccessful"
                                class="text-center"
                                :to="{ name: 'PaymentCompleted' }"
                            >
                                <button class="btn-boo">
                                    Procedi con l'ordine
                                </button>
                            </router-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="animation">
            <div class="img animation1">
                <img src="../../public/hamburger.png" alt="hamburger" />
            </div>
            <div class="img animation2">
                <img src="../../public/pizza.png" alt="pizza" />
            </div>
            <div class="img animation4">
                <img
                    src="../../public/patatine-fritte.png"
                    alt="patatine fritte"
                    style="width: 30px"
                />
            </div>
            <div class="img animation3">
                <img src="../../public/sushi.png" alt="sushi" />
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

.loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 50;
}

.logo-deliv {
    transform: scale(1);
    border-radius: 50%;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 $boo-color;
    }

    70% {
        transform: scale(1);
        box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
    }

    100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 $boo-color;
    }
}

.form-bg {
    background-color: #292929;
    padding: 40px;
    border-radius: 17px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.8);
    color: white;
    margin-bottom: 40px;
}

.my_table {
    border-collapse: collapse;
    overflow: hidden;
    border: solid #000000 2px;
}

.btn-boo {
    background-color: $boo-color;
    border: 1px solid $boo-color;
    margin-top: 12px;
}

.bg {
    background-color: $boo-color;
}

// animation
@keyframes MoveOne {
    0% {
        top: 0;
        left: 0;
    }

    20% {
        top: 20%;
        left: 20%;
    }

    50% {
        top: 40%;
        right: 40%;
    }

    70% {
        top: 80%;
        right: 20%;
    }

    100% {
        top: 0;
        left: 0;
    }
}

@keyframes MoveTwo {
    0% {
        bottom: 0;
        right: 0;
    }

    20% {
        bottom: 20%;
        right: 70%;
    }

    50% {
        bottom: 30%;
        right: 30%;
    }

    70% {
        bottom: 50%;
        right: 80%;
    }

    100% {
        bottom: 0;
        right: 0;
    }
}

@keyframes MoveThree {
    0% {
        bottom: 0;
        left: 0;
    }

    25% {
        bottom: 10%;
        left: 10%;
    }

    50% {
        bottom: 50%;
        left: 20%;
    }

    75% {
        bottom: 70%;
        left: 10%;
    }

    100% {
        bottom: 0;
        left: 0;
    }
}

@keyframes MoveFour {
    0% {
        top: 0;
        left: 20%;
    }

    25% {
        top: 86%;
        left: 60%;
    }

    50% {
        top: 70%;
        left: 70%;
    }

    75% {
        top: 70%;
        left: 30%;
    }

    100% {
        top: 0;
        left: 20%;
    }
}

.animation {
    width: 40%;
    position: relative;
    display: flex;
    overflow: hidden;
}

.animation1 {
    position: absolute;
    animation: MoveOne 15s linear infinite;
}

.animation2 {
    position: absolute;
    animation: MoveTwo 10s linear infinite;
}

.animation3 {
    position: absolute;
    animation: MoveThree 8s linear infinite;
}

.animation4 {
    position: absolute;
    animation: MoveFour 16s linear infinite;
}

.img {
    width: 70px;
}

img {
    width: 100%;
}

@media screen and (max-width: 1000px) {
    .animation {
        display: none;
    }
}

@media screen and (min-width: 768px) {
    .container {
        min-width: 768px;
    }
}
</style>
