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
            // variabile per mostrare ristoranti
            showRestaurant: false,
            // array di input checked
            checked: [],
            // restaurants selezionati dall'utente
            arrayRestaurantsSelect: "",
        };
    },

    methods: {
        takevalue() {
            this.showRestaurant = true;
            axios
                .post("http://localhost:8000/api/v1/types/select", this.checked)
                .then((risposta) => {
                    // controllo se non ritorna niente
                    if (risposta.data.risposta.length === 0) {
                        this.showRestaurant = false;
                    }

                    this.arrayRestaurantsSelect = risposta.data.risposta;
                    console.log(this.arrayRestaurantsSelect);
                    setTimeout(() => {
                        let carousels = document.querySelectorAll(".mySwiper");

                        for (let i = 0; i < carousels.length; i++) {
                            var swiper = new Swiper(carousels[i], {
                                centeredSlides: true,
                                loop: true,
                                autoplay: {
                                    delay: 2500,
                                    disableOnInteraction: false,
                                },
                                breakpoints: {
                                    640: {
                                        slidesPerView: 1,
                                        spaceBetween: 20,
                                    },
                                    768: {
                                        slidesPerView: 3,
                                        spaceBetween: 20,
                                    },
                                },
                            });
                        }

                        console.log(carousels);
                    }, 500);
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
                console.log(this.restaurants);
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
            <form @submit.prevent="takevalue()" class="px-5">
                <div class="d-flex flex-wrap">
                    <div
                        class="form-check col-12 col-lg-2"
                        v-for="(type, i) in arrayTypes"
                    >
                        <div class="my-2 checkbox-type ps-5">
                            <input
                                class="form-check-input me-3"
                                type="checkbox"
                                :value="i"
                                :id="i"
                                v-model="checked"
                            />

                            <label :for="i" class="form-check-label">
                                {{ type.name }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-4">
                    <button type="submit" class="btn-boo mx-3 border">
                        <div>
                            <span>cerca</span>
                        </div>
                    </button>
                </div>
            </form>
            <!-- div contenente tutti i ristoranti nel database -->
            <!-- <div v-if="!showRestaurant" class="row my-3">
                <h2 class="text-center">Ristoranti Disponibili</h2>
                <div
                    v-for="(restaurant, i) in restaurants"
                    :key="i"
                    class="col-12 col-md-6 col-xl-4 card-restaurant p-5"
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
                                località:
                                <strong>{{ restaurant.city }}</strong>
                            </h5>
                            <h5>
                                <div v-for="(type, i) in restaurant.types">
                                    genere:
                                    <strong>
                                        {{ type.name }}
                                    </strong>
                                </div>
                            </h5>

                            <div
                                class="btn-group"
                                role="group"
                                aria-label="Basic example"
                            >
                                <button
                                    type="button"
                                    class="btn-boo mx-3 border"
                                >
                                    dettagli
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- vedere se tenerla o no questa altezza -->
            <div class="container-carousel">
                <div
                    v-for="(RestaurantsSelect, i) in arrayRestaurantsSelect"
                    class="my-5"
                    style="height: 350px"
                >
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div
                                class="swiper-slide d-block border rounded"
                                v-for="(Restaurant, i) in RestaurantsSelect"
                            >
                                <div class="p-2">
                                    <h5>
                                        località:
                                        <strong>{{ Restaurant.city }}</strong>
                                    </h5>
                                    <h5>
                                        città ristorante:
                                        <strong>{{ Restaurant.name }}</strong>
                                    </h5>
                                    <h5>
                                        genere:
                                        <strong>
                                            {{
                                                arrayTypes[
                                                    Restaurant.pivot.type_id - 1
                                                ].name
                                            }}</strong
                                        >
                                    </h5>
                                    <div
                                        class="btn-group"
                                        role="group"
                                        aria-label="Basic example"
                                    >
                                        <button
                                            type="button"
                                            class="btn-boo mx-3 border"
                                        >
                                            dettagli
                                        </button>
                                    </div>
                                </div>
                                <img :src="Restaurant.img" :alt="i" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
// .img-restaurants {
//     height: 300px;
// }

.swiper {
    width: 100%;
    height: 100%;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.checkbox-type {
    padding: 5px 15px;
    border-radius: 7px;
    background-color: #f0f0f0;
    border: 1px;
    -webkit-box-shadow: 0px 0px 6px 0px rgba(45, 255, 196, 1);
    -moz-box-shadow: 0px 0px 6px 0px rgba(45, 255, 196, 1);
    box-shadow: 0px 0px 6px 0px rgba(45, 255, 196, 1);
    .form-check-input:checked {
        background-color: #00ccbc;
        border-color: #00ccbc;
    }
}
</style>
