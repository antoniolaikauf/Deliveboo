<script>
import { store } from "../store";


export default {
  name: "Restaurant",
  data() {
    return {
        store,
      cart: store.cart,
    };
  },

  methods: {

    getQuantity(dish) {
    const index = this.cart.findIndex(item => item.dish.id === dish.id);
    return index !== -1 ? this.cart[index].quantity : 0;
  },
    // Aggiungi un piatto al carrello
    addToCart(dish) {
      const index = this.cart.findIndex(item => item.dish.id === dish.id);
      if (index !== -1) {
        this.cart[index].quantity++;
        this.cart[index].totalPrice = this.cart[index].quantity * this.cart[index].dish.price;
      } else {
        this.cart.push({ dish: dish, quantity: 1, totalPrice: dish.price });
      }

      // Aggiorna lo store globale
      store.cart = this.cart;

    },


    // Rimuovi un piatto dal carrello
    removeFromCart(dish) {
      const index = this.cart.findIndex(item => item.dish.id === dish.id);
      if (index !== -1) {
        if (this.cart[index].quantity > 1) {
          this.cart[index].quantity--;
          this.cart[index].totalPrice = this.cart[index].quantity * this.cart[index].dish.price;
        } else {
          this.cart.splice(index, 1);
        }
      }

       // Aggiorna lo store globale
       store.cart = this.cart;

    },

    // Calcola il prezzo totale del piatto moltiplicando il prezzo per la quantità
    calculateTotal() {
      let total = 0;
      for (const item of this.cart) {
        total += item.dish.price * item.quantity;
      }
      return total;
    }
  }
};
</script>

<template>
    <section>
      <!-- Sezione ristorante -->
      <section>
        <div class="container p-4">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="card">
                <img class="rounded-3 img_restaurant" :src="store.restaurantselected.img" alt="placeholderrestaurant" />
              </div>
            </div>
            <div class="col-12 col-lg-6 px-3">
  
              <h1 class="restaurantName">{{ store.restaurantselected.name }}</h1>
  
              <div class="my-4">
                <p>Località: <b>{{ store.restaurantselected.city }}</b> <br> Chiude alle 23:00 <br> <b style="color: #00ccbc;">Consegna gratuita!</b></p>
              </div>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-boo border-secondary-subtle" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 250px">
                <h4 class="d-flex">
                  <i class="fa-solid fa-circle-info" style="color: #00ccbc;"><b style="color: black;"> Allergeni</b></i>
                </h4>
                Informazioni e tanto altro
              </button>
  
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Informazioni</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-color: #d8d9d9">
                      <h5>Allergeni</h5>
                      <div>Lista ingredienti</div>
                    </div>
                    <div class="modal-footer">
                      <p>Leggi maggiori informazioni sugli allergeni presenti nei prodotti offerti da questo partner.</p>
                      <a href="https://www.youtube.com/watch?v=nvm2pVrirBQ" style="color: #00ccbc;"><i class="fa-solid fa-circle-info"></i> Visualizza informazioni sugli allergeni</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
        <section class="d-flex">
            <div class="position-relative">
                <!-- Sezione carrello -->
                <section>
                    <div class="container p-3">
                    <div>
                        <h1>Menù</h1>
                    </div>
                    <div class="card col-12 col-lg-6 my-3 p-3" v-for="dish in store.restaurantselected.user.dishes">
                        <h2>{{ dish.name }}</h2>
                        <p>{{ dish.description }} <br> <b>{{ dish.price }} &euro;</b></p>


                        
                        
                        <!-- Bottoni per aggiungere/rimuovere piatti -->
                        <div class="quantity-control">
                            <button @click="removeFromCart(dish)" class="btn btn-primary">-</button>
                        <span>{{ getQuantity(dish) }}</span> <!-- Visualizza la quantità -->
                        <button @click="addToCart(dish)" class="btn btn-primary">+</button>
                        </div>
                    </div>
                    </div>
                </section>
            </div>
        <!-- Carrello -->
            <section class="container col-6 card cart position-sticky p-3 my-5">
                <div>
                    <h1>Carrello</h1>
                </div>
                <!-- Mostra ogni piatto nel carrello -->
                <div v-if="cart.length > 0">
                    <div v-for="item in cart" :key="item.dish.id" class="card col-12 w-100 col-lg-6 my-3 p-3">
                    <div class="d-flex justify-content-between">
                        <div>{{ item.dish.name }}</div>
                        <div>Quantità: {{ item.quantity }}</div>
                        <div>Prezzo: <br> {{ item.dish.price }} &euro;</div>
                        <div>Totale: <br> {{ item.totalPrice }} &euro;</div>
                    </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-center"> <b>Totale: </b> {{ calculateTotal() }} &euro;</div>
                </div>
                <div v-else>
                    <p>Il carrello è vuoto.</p>
                </div>

                <!-- checkout btn  -->
                <section class="checkoutbar d-flex justify-content-center mt-3">
                    <router-link :to="{ name: 'success' }">
                        <button class="btn-boo">Checkout</button></router-link>
                </section>
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
    height: 500px;
}

.quantity-control button {
  margin: 0 5px;
}

</style>
