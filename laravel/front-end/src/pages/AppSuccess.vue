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
        };
    },
    methods: {
        onSuccess(payload) {
            let nonce = payload.nonce;
            // Do something great with the nonce...
        },
        onError(error) {
            let message = error.message;
            // Whoops, an error has occured while trying to get the nonce
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
    computed: {
    calculateGrandTotal() {
      return this.store.cart.reduce((total, item) => {
        return total + (item.quantity * item.dish.price);
      }, 0).toFixed(2);
    }
  }
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
                    <!-- Inizio dettagli ordine -->
                    <tr v-for="(item, index) in store.cart" :key="index" >
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
                    <!-- Fine -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right">Totale</td>
                        <td>{{ calculateGrandTotal }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3>Inserisci i tuoi dati</h3>
                <form id="orderForm" method="post" action="process_order.php">
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
                    <button
                        type="submit"
                        class="btn btn-primary"
                        id="submit-button"
                        @click.prevent="processPayment"
                    >
                        Paga adesso
                    </button>
                </form>
            </div>
        </div>
        <div id="dropin-container" class="col-md-6 offset-md-3"></div>
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
