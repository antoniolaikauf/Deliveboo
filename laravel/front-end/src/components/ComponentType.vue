<script>
import axios from "axios";
import { store } from "../store";

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
            // variabile controllo select
            control: true,
        };
    },

    methods: {
        takevalue() {
            if (this.checked.length == 0) {
                this.control = false;
            } else {
                this.control = true;
            }
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
                        console.log(carousels);

                        for (let i = 0; i < carousels.length; i++) {
                            // controllo se esiste gia un carousel
                            if (carousels[i].swiper) {
                                //   codice per disintegrare il carousel
                                carousels[i].swiper.destroy(true, true);
                            }
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
                                navigation: {
                                    nextEl: ".swiper-button-next",
                                    prevEl: ".swiper-button-prev",
                                },
                            });
                        }
                    }, 500);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        ciao(index, x) {
            console.log(this.arrayRestaurantsSelect[index][x]);
            store.restaurantselected = this.arrayRestaurantsSelect[index][x];
        },
    },
    mounted() {
        // chiamata axios per ottenere i types
        axios
            .get("http://localhost:8000/api/v1/types")
            .then((risposta) => {
                this.arrayTypes = risposta.data.types;
                this.restaurants = risposta.data.restaurants;
                // console.log(this.restaurants);
                // console.log(this.arrayTypes);
            })
            .catch((err) => {
                console.log(err);
            });
    },
};
</script>

<template>
    <section class="py-4 mb-5">
        <div class="container-fluid bg-dark">
            <div class="row">
                <form @submit.prevent="takevalue()" class="px-5 pt-3">
                    <h1 class="text-white text-center m-5">
                        Ecco una varietà di opzioni tra cui puoi scegliere,
                        <br />
                        seleziona la tipologia che ti interessa e esplora
                        ulteriori dettagli!
                    </h1>
                    <div class="d-flex flex-wrap">
                        <div
                            class="form-check col-12 col-lg-2"
                            v-for="(type, i) in arrayTypes"
                        >
                            <div class="my-2 checkbox-type ps-5">
                                <input
                                    class="form-check-input"
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
                                <span>Cerca</span>
                            </div>
                        </button>
                    </div>
                    <div v-if="!control" class="text-white text-center">
                        <div
                            class="bg-danger d-inline-block p-1 mb-3 fs-5 text"
                        >
                            Inserisci una tipologia!
                        </div>
                    </div>
                </form>
                <!-- div contenente tutti i ristoranti nel database -->
                <!-- VEDERE SE TENERLO O NO SE NON SI TIENE ELIMINARE CHIAMATA AXIOS -->
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
                    >
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div
                                    class="swiper-slide d-block border rounded shadow"
                                    v-for="(Restaurant, x) in RestaurantsSelect"
                                >
                                    <div class="p-2 text-start">
                                        <h3>
                                            <strong>{{
                                                Restaurant.name
                                            }}</strong>
                                        </h3>
                                        <h5 class="locality">
                                            <i class="fa-solid fa-city"></i>
                                            Località:
                                            {{ Restaurant.city }}
                                        </h5>
                                        <h5 class="type">
                                            <i
                                                class="fa-solid fa-bowl-food"
                                            ></i>
                                            Genere:

                                            {{
                                                arrayTypes[
                                                    Restaurant.pivot.type_id - 1
                                                ].name
                                            }}
                                        </h5>
                                        <div
                                            class="btn-group"
                                            role="group"
                                            aria-label="Basic example"
                                        >
                                            <router-link
                                                :to="{ name: 'Restaurant' }"
                                            >
                                                <div
                                                    class="btn-group"
                                                    role="group"
                                                    aria-label="Basic example"
                                                >
                                                    <button
                                                        @click="ciao(i, x)"
                                                        type="button"
                                                        class="btn-boo ms-2 border"
                                                    >
                                                        Dettagli
                                                    </button>
                                                </div></router-link
                                            >
                                        </div>
                                    </div>
                                    <div class="container-img">
                                        <div>Consegna Gratuita</div>
                                        <img :src="Restaurant.img" :alt="i" />
                                    </div>
                                </div>
                            </div>
                            <!-- Frecce di navigazione -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
// .img-restaurants {
//     height: 300px;
// }

.swiper {
    width: 100%;
    height: 450px;
    .container-img {
        position: relative;
        height: 100%;
        div {
            padding: 4px 4px 4px 0px;
            top: 10px;
            position: absolute;
            background-color: rgb(255, 0, 0);
            color: white;
        }
    }
    .locality {
        color: rgb(64, 64, 255);
        i {
            color: orange;
        }
    }
    .type {
        color: rgb(255, 83, 83);
    }
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
    // display: block;
    width: 100%;
    height: 100%;
    // object-fit: cover;
}

.checkbox-type {
    padding: 5px 15px;
    border-radius: 7px;
    background-color: #f0f0f0;
    border: 1px;
    .form-check-input:checked {
        background-color: #00ccbc;
        border-color: #00ccbc;
    }
}

.swiper-button-prev {
    left: 10px;
    color: #00ccbc;
    background-color: white;
    padding: 35px;
    border-radius: 46% 16%;
}

.swiper-button-next {
    right: 10px;
    color: #00ccbc;
    background-color: white;
    padding: 35px;
    border-radius: 16% 46%;
}
</style>
