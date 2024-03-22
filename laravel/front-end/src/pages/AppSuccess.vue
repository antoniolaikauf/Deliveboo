<script>
import { store } from "../store";
// import braintree from "braintree-web-drop-in";
import dropin from "braintree-web-drop-in";

import axios from "axios";

export default {
    name: "success",
    name: "BraintreeDropin",
    data() {
        return {
            store,
            token: "",
            dropInInstance: null,
            form: {
                name: "",
                email: "",
                indirizzo: "",
                numero: "",
                // Converti la data in formato aaaa-mm-gg attenti con la data
                data: "2024-03-06 00:00:00",
                selezione: "opzione 1",
                price: 7.5,
                dishes: [
                    // Supponiamo che tu cambi `dish_ids` in `dishes` per includere le quantità
                    { id: 2, quantity: 1 }, // Esempio di piatto con ID e quantità
                    { id: 3, quantity: 2 },
                ],
            },
        };
    },
    methods: {
        submitPayment() {
            if (!this.dropInInstance) {
                console.error("Drop-in instance non inizializzata.");
                return;
            }
            this.dropInInstance.requestPaymentMethod((err, payload) => {
                if (err) {
                    console.error(
                        "Errore nella richiesta del metodo di pagamento:",
                        err
                    );
                    this.onError(err);
                    return;
                }
                // Qui invii il payload.nonce al tuo server per processare il pagamento
                console.log("Nonce ottenuto:", payload.nonce);
                this.onSuccess(payload);
            });
        },
        onSuccess(payload) {
            let nonce = payload.nonce;
            // Implementa cosa fare dopo aver ottenuto il nonce, es. inviare al server per processare il pagamento
            console.log("Pagamento riuscito con nonce:", nonce);
            // Puoi qui anche navigare a una pagina di successo o mostrare un messaggio
        },
        onError(error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
        },
        initializeBraintree() {
            const self = this;
            dropin.create(
                {
                    authorization: this.token,
                    container: "#dropin-container",
                    translations: {
                        payingWith: "Pagamento con {{paymentSource}}", // Pagamento con il metodo di pagamento specificato
                        chooseAnotherWayToPay:
                            "Scegli un altro metodo di pagamento", // Scegli un altro metodo di pagamento
                        chooseAWayToPay: "Scegli il metodo di pagamento", // Scegli il metodo di pagamento
                        otherWaysToPay: "Altri metodi di pagamento", // Altri metodi di pagamento disponibili
                        cardVerification: "Verifica della carta", // Verifica della carta di credito
                        payWithCard: "Paga con carta di credito", // Paga utilizzando una carta di credito
                        expirationDate: "Data di scadenza", // Data di scadenza della carta di credito
                        cvv: "Codice di sicurezza", // Codice di sicurezza della carta di credito
                        postalCode: "Codice postale", // Codice postale (se richiesto per il paese)
                        cardholderName: "Nome del titolare della carta", // Nome del titolare della carta di credito
                        cardNumber: "Numero della carta", // Numero della carta di credito
                    },
                }, // Qui mancava una virgola
                (error, dropinInstance) => {
                    if (error) {
                        console.error(error);
                    } else {
                        self.dropinInstance = dropinInstance;
                        dropinInstance.on(
                            "paymentMethodRequestable",
                            (event) => {
                                // Esegui qualche azione quando un metodo di pagamento è disponibile
                            }
                        );
                        dropinInstance.on(
                            "noPaymentMethodRequestable",
                            (event) => {
                                // Esegui qualche azione quando non ci sono metodi di pagamento disponibili
                            }
                        );
                    }
                }
            );
        },
        processPayment() {
            axios
                .post("http://localhost:8000/api/v1/create/order", this.form)
                .then((res) => {
                    console.log(res.data);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    mounted() {
    axios.get("http://localhost:8000/api/v1/generate").then((res) => {
        this.token = res.data.token;

        dropin.create(
            {
                authorization: this.token,
                container: "#dropin-container",

                //traduzione form
                locale: 'it_IT'
            },
            (error, dropinInstance) => {
                if (error) {
                    console.error(error);
                } else {
                    this.dropInInstance = dropinInstance;
                }
            }
        );
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>{{ store.restaurantselected.name }}</h1>
                <h3>Riepilogo Ordine</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Prodotto</th>
                            <th>Quantità</th>
                            <th>Prezzo unitario</th>
                            <th>Totale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in store.cart" :key="item.dish.id">
                            <td>{{ item.dish.name }}</td>
                            <td>{{ item.quantity }}</td>
                            <td>{{ item.dish.price }}</td>
                            <td>{{ item.totalPrice }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><b>Totale finale</b></td>
                            <td>€ {{ calculateGrandTotal }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3>Inserisci i tuoi dati</h3>
                    <form
                        @submit.prevent="processPayment"
                        id="orderForm"
                        method="post"
                        action="process_order.php"
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
                            <label for="email">E-mail</label>
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
                            <label for="address">Indirizzo</label>
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
                            <label for="phone">Numero di Telefono</label>
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
                        <div>
                                <!-- <div>
                                    <label for="selezionametodo">Inserisci un metodo di pagamento:</label>
                                    <select name="selezionametodo" id="" v-model="form.selezione">
                                        <option value="Visa">Visa</option>
                                        <option value="Mastercard">Mastercard</option>
                                        <option value="Paypal">Paypal</option>
                                        <option value="American Express">American Express</option>
                                    </select>
                                </div> -->
                        </div>
                        <!-- <div>pagamento carta credito</div> -->
                    </form>
                </div>
            </div>
            <div id="dropin-container" class="mt-5"></div>
            <button class="btn btn-primary my-3"  id="submit-button" type="submit" @click="submitPayment">
                Paga adesso
            </button>
        </div>
    </div>
</template>

<style lang="scss">
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

#orderForm {
    button {
        margin: 15px 0;
    }
}
</style>
