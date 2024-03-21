<script>
import { store } from "../store";
// import braintree from "braintree-web-drop-in";
import dropin from "braintree-web-drop-in";

import axios from "axios";

export default {
    name: "success",
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
            const message = error.message;
            console.error("Errore nel processo di pagamento:", message);
            console.log(message);
        },
    },
    mounted() {
        axios.get("http://localhost:8000/api/v1/generate").then((res) => {
            this.token = res.data.token;
            // Assicurati di inizializzare il drop-in UI qui, dopo aver ricevuto il token
            dropin.create(
                {
                    authorization: this.token,
                    container: "#dropin-container",
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
                            <td colspan="3" class="text-right">Totale</td>
                            <td>€ {{ calculateTotal }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div id="dropin-container" class="mt-5"></div>
        <button class="btn btn-primary mt-3" @click="submitPayment">
            Paga adesso
        </button>
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
