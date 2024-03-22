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
            dropInInstance: null,
            form: {
                name: "anton",
                email: "anto@gmail.com",
                indirizzo: "via dcomo",
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
            // in order metti id dell'ordine
            form_order: {
                token: "",
                order: 1,
            },
        };
    },
    methods: {
        // Rimuovi il resto dei metodi per mantenere la risposta concisa
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
        // metodo per pagamento
        sendFormDataToServer() {
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
        },
        validateForm() {
            // Effettua la validazione dei dati del form qui
            // Ad esempio, puoi verificare che tutti i campi siano compilati correttamente
            if (
                !this.form.name ||
                !this.form.email ||
                !this.form.indirizzo ||
                !this.form.numero ||
                !this.form.selezione
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
            // Implementa cosa fare dopo aver ottenuto il nonce, es. inviare al server per processare il pagamento tramite Braintree
            console.log("Pagamento riuscito con nonce:", nonce);
            // Puoi qui anche navigare a una pagina di successo o mostrare un messaggio
        },
        onError(error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7 offset-md-3">
                <h1 class="text-center">
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
                            <tr v-for="item in store.cart" :key="item.dish.id">
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
                <div class="col-md-7 offset-md-3 form-bg">
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
                        <div>
                            <div>
                                <label for="selezionametodo"
                                    >Inserisci un metodo di pagamento:</label
                                >
                                <select
                                    name="selezionametodo"
                                    id=""
                                    v-model="form.selezione"
                                >
                                    <option value="Visa">Visa</option>
                                    <option value="Mastercard">
                                        Mastercard
                                    </option>
                                    <option value="Paypal">Paypal</option>
                                    <option value="American Express">
                                        American Express
                                    </option>
                                </select>
                            </div>
                        </div>
                        <button
                            type="submit"
                            class="btn btn-primary"
                            id="submit-button"
                        >
                            Invia dati
                        </button>
                    </form>
                </div>
            </div>
            <div id="dropin-container" class="mt-5"></div>
            <button
                class="btn btn-primary my-3"
                id="submit-button"
                type="submit"
                @click="submitPayment"
            >
                Paga adesso
            </button>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

#orderForm {
    button {
        margin: 15px 0;
    }
}
</style>