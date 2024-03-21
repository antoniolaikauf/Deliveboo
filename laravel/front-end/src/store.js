import { reactive } from "vue";

export const store = reactive({

  restaurantselected: '', // Dati del ristorante selezionato
  cart: [], // Array per memorizzare i piatti nel carrello
  orders: [], // Array per memorizzare i dettagli degli ordini
});