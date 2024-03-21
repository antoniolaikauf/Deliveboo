<script>
import { store } from "../store";
// import braintree from 'braintree-web-drop-in';

export default {
    name: "success",
    data() {
        return {
            store,
        };
    },
  //   methods: {
  //   initBraintree() {
  //     braintree.dropin.create({
  //       authorization: 'sandbox_24s8gdx7_7txby8fhqzdjpvtw',
  //       container: '#dropin-container'
  //     }, (createErr, instance) => {
  //       if (createErr) {
  //         console.error('Errore durante la creazione di Braintree Drop-in:', createErr);
  //         return;
  //       }
  //       this.instance = instance;
  //     });
  //   },
  //   processPayment() {
  //     this.instance.requestPaymentMethod((requestPaymentMethodErr, payload) => {
  //       if (requestPaymentMethodErr) {
  //         console.error('Errore durante la richiesta del metodo di pagamento:', requestPaymentMethodErr);
  //         return;
  //       }

  //       // Invia il payload.nonce al server per elaborare il pagamento
  //       fetch('process_payment.php', {
  //         method: 'POST',
  //         headers: {
  //           'Content-Type': 'application/json',
  //         },
  //         body: JSON.stringify({ payment_method_nonce: payload.nonce })
  //       })
  //       .then(response => response.json())
  //       .then(data => {
  //         // Gestisci la risposta dal server
  //         if (data.success) {
  //           console.log('Pagamento completato:', data.message);
  //           // Esegui le azioni necessarie se il pagamento è stato completato con successo
  //         } else {
  //           console.error('Errore durante il pagamento:', data.message);
  //           // Esegui le azioni necessarie se il pagamento non è riuscito
  //         }
  //       })
  //       .catch(error => {
  //         console.error('Errore durante la richiesta al server:', error);
  //         // Gestisci l'errore di rete o altri errori
  //       });
  //     });
  //   }
  // },
  // mounted() {
  //   this.initBraintree();
  // }
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
                    <tr v-for="item in store.orders" >
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
                        <td>€ 13,00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="container mt-5">
   <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3>Inserisci i tuoi dati</h3>
            <form id="orderForm" method="post" action="process_payment.php">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="phone">Numero di Telefono</label>
                    <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                </div>
                <button type="submit" class="btn btn-primary" id="submit-button" @click.prevent="processPayment">Paga adesso</button>
            </form>
        </div>
   </div>
   <div id="dropin-container" class="col-md-6 offset-md-3"></div>
</div>
</template>

<style lang="scss">
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

#orderForm{
    button{
        margin: 15px 0;
    }
}
</style>
