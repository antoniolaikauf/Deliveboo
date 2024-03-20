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
            // import store
            store,
        };
    },

    methods: {
        check() {
            this.showRestaurant = true;
            axios
                .post("http://localhost:8000/api/v1/types/select", this.checked)
                .then((risposta) => {
                    // controllo se non ritorna niente
                    if (risposta.data.risposta.length === 0) {
                        this.showRestaurant = false;
                    }

                    // this.arrayRestaurantsSelect = [];
                    // this.arrayRestaurantsSelect.push(risposta.data.risposta);
                    this.arrayRestaurantsSelect = risposta.data.risposta;
                    // console.log(risposta.data.risposta);
                    console.log(this.arrayRestaurantsSelect);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        selectedRestaurantWithType(index, nRestaurants) {
            console.log(this.arrayRestaurantsSelect[index][nRestaurants]);
            store.restaurantselected =
                this.arrayRestaurantsSelect[index][nRestaurants];
        },
        groupRestaurant(index) {
            console.log(this.restaurants[index]);
            store.restaurantselected = this.restaurants[index];
        },

        //al click della label cambia classe
        toggleLabelClicked(event) {
            event.currentTarget.classList.toggle("label-clicked");
        },
        // toggleCheckbox() {
        //     this.check();
        // },
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
    <section class="mb-5">
        <div class="container-fluid gx-0 bg-dark">
            <div class="container">
                <!-- TESTO RICERCA RISTORANTI -->
                <div class="title">
                    <h1 class="text-white text-center m-5">
                        Ecco una varietà di opzioni tra cui puoi scegliere,
                        <br />
                        seleziona la tipologia che ti interessa e esplora
                        ulteriori dettagli!
                    </h1>
                </div>
                <div class="row">
                    <!-- INPUT TYPE RISTORANTI -->

                    <div
                        class="text-center col-12 col-md-6 col-lg-2"
                        v-for="(type, i) in arrayTypes"
                        :key="i"
                    >
                        <div class="my-2 checkbox-type">
                            <!-- Input Checkbox -->
                            <input
                                class="form-check-input"
                                type="checkbox"
                                :value="i"
                                :id="'checkbox_' + i"
                                v-model="checked"
                                @change="check"
                                style="display: none"
                            />

                                    <!-- Label con immagine -->
                                    <label
                                        :for="'checkbox_' + i"
                                        class="text-center mx-2"
                                        style="background-color: transparent; color: white; "
                                    >
                                        <img
                                            :src="type.img"
                                            alt="img type"
                                            style="cursor: pointer; width: 100%;"
                                        />
                                        {{ type.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                <div v-if="!showRestaurant" class="row my-3 p-5">
                    <div
                        class="card col-12 col-lg-3 my-3 bg-transparent border-0"
                        v-for="(restaurant, i) in restaurants"
                    >
                        <router-link
                            class="bg-white text-dark"
                            :to="{ name: 'Restaurant', params: { id: i + 1 } }"
                            @click="groupRestaurant(i)"
                        >
                            <div class="bg-white" style="min-height: 416px">
                                <img
                                    :src="restaurant.img"
                                    class="card-img-top"
                                    style="height: 208px"
                                />
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <strong> {{ restaurant.name }}</strong>
                                    </h2>
                                    <h5 class="card-title locality">
                                        <i class="fa-solid fa-city"></i>
                                        Località:
                                        {{ restaurant.city }}
                                    </h5>
                                    <h5 class="type">
                                        Genere:
                                        <ul>
                                            <li
                                                v-for="(
                                                    types, i
                                                ) in restaurant.types"
                                            >
                                                <i
                                                    class="fa-solid fa-bowl-food pe-2"
                                                ></i>
                                                <strong>
                                                    {{ types.name }}</strong
                                                >
                                            </li>
                                        </ul>
                                    </h5>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
                <!-- vedere se tenerla o no questa altezza -->
                <div class="col-12">
                    <div
                        v-for="(RestaurantsSelect, i) in arrayRestaurantsSelect"
                        class="col-12 row px-5"
                    >
                        <div
                            :class="
                                arrayRestaurantsSelect[0].length === 0
                                    ? 'animation-error'
                                    : ''
                            "
                            class="text-white text-center fs-3 mb-5"
                            v-if="arrayRestaurantsSelect[0].length === 0"
                        >
                            <span class="bg-danger d-inline-block p-2 rounded">
                                Non ci sono ristoranti con queste tipologie
                            </span>
                        </div>
                        <div
                            v-else
                            class="card col-12 col-lg-3 bg-transparent border-0 p-2"
                            v-for="(Restaurant, x) in RestaurantsSelect"
                            style="min-height: 416px"
                        >
                            <router-link
                                class="bg-white text-dark"
                                :to="{
                                    name: 'Restaurant',
                                    params: { id: x + 1 },
                                }"
                                @click="selectedRestaurantWithType(i, x)"
                            >
                                <img
                                    :src="Restaurant.img"
                                    class="card-img-top"
                                    :alt="x"
                                    style="height: 208px"
                                />
                                <div class="card-body">
                                    <h3 class="">
                                        <strong>{{ Restaurant.name }}</strong>
                                    </h3>
                                    <h5 class="locality card-title">
                                        <i class="fa-solid fa-city"></i>
                                        Località:
                                        {{ Restaurant.city }}
                                    </h5>

                                <!-- controllo se esiste la key che ha ritornato l'oggetto essendo che ritorna due oggetti un po' diversi -->
                                <h5
                                    class="type card-title"
                                    v-if="Restaurant.hasOwnProperty('pivot')"
                                >
                                    <i class="fa-solid fa-bowl-food"></i>
                                    Genere:
                                    {{
                                        arrayTypes[Restaurant.pivot.type_id - 1]
                                            .name
                                    }}
                                </h5>

                                <h5
                                    v-else
                                    class="type card-title"
                                    v-for="(types, i) in Restaurant.types"
                                >
                                    <i class="fa-solid fa-bowl-food"></i>
                                    Genere:
                                    {{ types.name }}
                                </h5>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
// .swiper {
//     width: 100%;
//     height: 450px;
//     .container-img {
//         position: relative;
//         height: 100%;
//         div {
//             padding: 4px 4px 4px 0px;
//             top: 10px;
//             position: absolute;
//             background-color: rgb(255, 0, 0);
//             color: white;
//         }
//     }
// }

// .swiper-slide {
//     text-align: center;
//     font-size: 18px;
//     background: #fff;
//     display: flex;
//     justify-content: center;
//     align-items: center;
// }

// .swiper-slide img {
//     // display: block;
//     width: 100%;
//     height: 100%;
//     // object-fit: cover;
// }

.checkbox-type {
    border-radius: 7px;
    border: 1px;
    .form-check-input:checked {
        background-color: #00ccbc;
        border-color: #00ccbc;
    }
    img {
        width: 100%;
        height: 100px;
        border-radius: 10px;
        object-fit: cover;
    }
}

label {
    width: 200px;
    transition: transform 0.3s ease;
    border-radius: 10px;

    &:hover {
        transform: scale(1.05);
    }
}

.label-clicked {
    border: 1px solid #00ccbc; /* Applica il bordo quando l'elemento è cliccato */
}

// .container-fluid{
//     overflow-x: hidden;
// }

// .swiper-button-prev {
//     left: 10px;
//     color: #00ccbc;
//     background-color: white;
//     padding: 35px;
//     border-radius: 46% 16%;
// }

// .swiper-button-next {
//     right: 10px;
//     color: #00ccbc;
//     background-color: white;
//     padding: 35px;
//     border-radius: 16% 46%;
// }
.locality {
    color: rgb(64, 64, 255);
    i {
        color: orange;
    }
}
.type {
    color: rgb(255, 83, 83);
}

.animation-error {
    animation-name: message-error;
    animation-timing-function: ease;
    animation-duration: 2s;
}

@keyframes message-error {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>
