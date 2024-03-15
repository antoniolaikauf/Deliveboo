<script>
import axios from "axios";
export default {
    name: "TypeRestaurant",

    data() {
        return {
            // arrray per tutti i types
            arrayTypes: [],
            // array con dentro tutti i ristoranti
            restaurants: [],
            // variabile per mostrare risrtoranti
            showRestaurant: false,
            checked: [],

            arrayRestaurantsSelect: "",
        };
    },

    methods: {
        takevalue() {
            this.showRestaurant = true;
            axios
                .post("http://localhost:8000/api/v1/types/select", this.checked)
                .then((risposta) => {
                    if (risposta.data.risposta.length === 0) {
                        this.showRestaurant = false;
                    }

                    this.arrayRestaurantsSelect = risposta.data.risposta;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    mounted() {
        // chiamata axios per ottenere i types
        axios
            .get("http://localhost:8000/api/v1/types")
            .then((risposta) => {
                this.arrayTypes = risposta.data.types;
                this.restaurants = risposta.data.restaurants;
                console.log(this.arrayTypes);
            })
            .catch((err) => {
                console.log(err);
            });
    },
};
</script>

<template>
    <div class="container-fluid my-5">
        <div class="row">
            <form @submit.prevent="takevalue()">
                <div class="form-check" v-for="(type, i) in arrayTypes">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        :value="i"
                        :id="i"
                        v-model="checked"
                    />
                    <label class="form-check-label" :for="i">
                        {{ type.name }}
                    </label>
                </div>
                <button type="submit">Invia</button>
            </form>
            <!-- div contenente tutti i ristoranti nel database -->
            <div v-if="!showRestaurant" class="row my-3">
                <h2 class="text-center">Ristoranti Disponibili</h2>
                <div
                    v-for="(restaurant, i) in restaurants"
                    :key="i"
                    class="col-4 card-restaurant p-5"
                >
                    <div class="card">
                        <img
                            :src="restaurant.img"
                            class="card-img-top img-restaurants"
                            :alt="i"
                        />
                        <div class="card-body">
                            <h5 class="card-title">
                                nome ristorante:
                                <strong> {{ restaurant.name }}</strong>
                            </h5>
                            <h5 class="card-title">
                                città ristorante:
                                <strong>{{ restaurant.city }}</strong>
                            </h5>
                            <a href="#" class="btn btn-primary">show</a>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="showRestaurant">
                <div
                    class="col-12"
                    v-for="(RestaurantsSelect, i) in arrayRestaurantsSelect"
                >
                    <div class="row p-3">
                        <div
                            class="col-4 card-restaurant p-5"
                            v-for="(Restaurant, i) in RestaurantsSelect"
                        >
                            <div class="card">
                                <img
                                    :src="Restaurant.img"
                                    class="card-img-top img-restaurants"
                                    :alt="i"
                                />
                                <div class="card-body">
                                    <h5 class="card-title">
                                        nome ristorante:
                                        <strong>{{ Restaurant.name }}</strong>
                                    </h5>
                                    <h5 class="card-title">
                                        città ristorante:
                                        <strong>{{ Restaurant.city }}</strong>
                                    </h5>

                                    <a href="#" class="btn btn-primary">show</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.img-restaurants {
    height: 300px;
}
</style>
