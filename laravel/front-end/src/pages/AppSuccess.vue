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
            error: "",
        };
    },
    // computed: {
    //     calculateTotal() {
    //         // Implementa il calcolo del totale del carrello
    //         return this.store.cart.reduce(
    //             (acc, item) => acc + item.totalPrice,
    //             0
    //         );
    //     },
    // },
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
        // initializeBraintree() {
        //     const self = this;
        //     dropin.create(
        //         {
        //             authorization: this.token,
        //             container: "#dropin-container",
        //             translations: {
        //                 payingWith: "Pagamento con {{paymentSource}}", // Pagamento con il metodo di pagamento specificato
        //                 chooseAnotherWayToPay:
        //                     "Scegli un altro metodo di pagamento", // Scegli un altro metodo di pagamento
        //                 chooseAWayToPay: "Scegli il metodo di pagamento", // Scegli il metodo di pagamento
        //                 otherWaysToPay: "Altri metodi di pagamento", // Altri metodi di pagamento disponibili
        //                 cardVerification: "Verifica della carta", // Verifica della carta di credito
        //                 payWithCard: "Paga con carta di credito", // Paga utilizzando una carta di credito
        //                 expirationDate: "Data di scadenza", // Data di scadenza della carta di credito
        //                 cvv: "Codice di sicurezza", // Codice di sicurezza della carta di credito
        //                 postalCode: "Codice postale", // Codice postale (se richiesto per il paese)
        //                 cardholderName: "Nome del titolare della carta", // Nome del titolare della carta di credito
        //                 cardNumber: "Numero della carta", // Numero della carta di credito
        //             },
        //         }, // Qui mancava una virgola
        //         (error, dropinInstance) => {
        //             if (error) {
        //                 console.error(error);
        //             } else {
        //                 self.dropinInstance = dropinInstance;
        //                 dropinInstance.on(
        //                     "paymentMethodRequestable",
        //                     (event) => {
        //                         // Esegui qualche azione quando un metodo di pagamento è disponibile
        //                     }
        //                 );
        //                 dropinInstance.on(
        //                     "noPaymentMethodRequestable",
        //                     (event) => {
        //                         // Esegui qualche azione quando non ci sono metodi di pagamento disponibili
        //                     }
        //                 );
        //             }
        //         }
        //     );
        // },
    },
    mounted() {
    axios.get("http://localhost:8000/api/v1/generate").then((res) => {
        this.token = res.data.token;

        dropin.create(
            {
                authorization: this.token,
                container: "#dropin-container",
                translations: {
                    pleaseFillOutCardNumber: "Si prega di compilare il numero di carta.",
                    pleaseCheckInformationAndTryAgain: "Si prega di controllare le informazioni e riprovare.",
                    payingWith: "Pagamento con {{paymentSource}}",
                    expirationDate: "Data di scadenza",
                    chooseAnotherWayToPay: "Scegli un altro metodo di pagamento",
                    chooseAWayToPay: "Scegli il metodo di pagamento",
                    otherWaysToPay: "Altri metodi di pagamento",
                    cardVerification: "Verifica della carta",
                    payWithCard: "Paga con carta di credito",
                    cvv: "CVV",
                    postalCode: "CAP",
                    cardholderName: "Nome del titolare",
                    cardNumber: "Numero carta",
                    expirationDatePlaceholder: "MM/AA",
                    postalCodePlaceholder: "12345",
                    cardholderNameLabel: "Nome del titolare",
                    cardNumberLabel: "Numero carta",
                    cvvLabel: "CVV",
                    expirationDateLabel: "Data di scadenza",
                    postalCodeLabel: "CAP",
                    submitButton: "Invia",
                    payWithCardTitle: "Paga con carta di credito",
                    orUseAnotherWayToPay: "O usa un altro metodo di pagamento",
                    cardNotSupported: "La carta non è supportata. Usa un'altra carta.",
                    fieldEmptyForCvv: "Inserisci il CVV.",
                    fieldEmptyForExpirationDate: "Inserisci la data di scadenza.",
                    fieldEmptyForPostalCode: "Inserisci il CAP.",
                    fieldInvalidForCvv: "Questo CVV non sembra valido.",
                    fieldInvalidForExpirationDate: "Questa data di scadenza non sembra valida.",
                    fieldInvalidForPostalCode: "Questo CAP non sembra valido.",
                    genericError: "Si è verificato un errore durante il pagamento. Si prega di riprovare.",

                },
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
                        <!-- <tr>
                            <td>Pomodoro</td>
                            <td>3</td>
                            <td>€ 1,00</td>
                            <td>€ 3,00</td>
                        </tr> -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right">Totale</td>
                            <td>€ {{ calculateTotal }}</td>
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
                            />
                        </div>
                        <!-- <button
                            type="submit"
                            class="btn btn-primary"
                            id="submit-button"
                            @click.prevent="processPayment"
                        >
                            Paga adesso
                        </button> -->
                    </form>
                </div>
            </div>
            <div id="dropin-container" class="mt-5"></div>
            <button class="btn btn-primary mt-3" @click="submitPayment">
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
