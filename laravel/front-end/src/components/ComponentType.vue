<script>
import axios from "axios";
export default {
    name: "TypeRestaurant",

    data() {
        return {
            // arrray per tutti i types
            arrayTypes: [],
            // array con dentro i ristoranti
            arrayRestaurants: [],
            // variabile per mostrare risrtoranti
            showRestaurant: false,
        };
    },

    methods: {
        // metodo per ottenere i ristoranti
        typeSpecific(index) {
            let indice = index + 1;
            this.showRestaurant = true;
            // chiamata per ottenere i ristoranti
            axios
                .get("http://localhost:8000/api/v1/types/" + indice)
                .then((risposta) => {
                    let array = risposta.data.risposta;
                    for (let i = 0; i < array.length; i++) {
                        array[i].type = this.arrayTypes[index].name;
                        console.log(array[i]);
                        this.arrayRestaurants.push(array[i]);
                    }
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
            <!-- div contenete i types dei ristoranti -->
            <div
                class="col-12 col-lg-2 my-3"
                v-for="(type, i) in arrayTypes"
                :key="i"
            >
                <div
                    class="p-2 border text-center rounded"
                    @click="typeSpecific(i)"
                >
                    <strong>{{ type.name }}</strong>
                </div>
            </div>
            <!-- div contenente i ristoranti -->
            <div v-if="showRestaurant" class="col-12">
                <div class="row p-3">
                    <div
                        v-for="(Restaurants, i) in arrayRestaurants"
                        :key="i"
                        class="col-4 card-restaurant p-5"
                    >
                        <div class="card">
                            <img
                                :src="Restaurants.img"
                                class="card-img-top img-restaurants"
                                :alt="i"
                            />
                            <div class="card-body">
                                <h5 class="card-title">
                                    nome ristorante:
                                    <strong>{{ Restaurants.name }}</strong>
                                </h5>
                                <h5 class="card-title">
                                    città ristorante:
                                    <strong>{{ Restaurants.city }}</strong>
                                </h5>
                                <h5 class="card-title">
                                    tipo ristorante:
                                    <strong>{{ Restaurants.type }}</strong>
                                </h5>
                                <a href="#" class="btn btn-primary">show</a>
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
