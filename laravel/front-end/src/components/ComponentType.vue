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
            // variabile con img cambiata
            imgChange: "",
            //count ristoranti
            countDisplayedRestaurants: 0,
        };
    },

    methods: {

        // applicazioni filtri 
        check() {
            this.showRestaurant = true;

            //variabile interna di count
            let count = 0;
            axios
                .post("http://localhost:8000/api/v1/types/select", this.checked)
                .then((risposta) => {


                    // controllo se non ritorna niente
                    if (risposta.data.risposta.length === 0) {
                        this.showRestaurant = false;
                    }

                    for (let i = 0; i < risposta.data.risposta[0].length; i++) {

                        //incremento count ristoranti
                        count++;
                        if (risposta.data.risposta[0][i].img.startsWith("i")) {
                            
                            
                            // chiamata axios
                            let foto = risposta.data.risposta[0][i].img;
                            axios
                                .post(
                                    "http://localhost:8000/api/v1/edit/foto",
                                    { data: foto } // Invia il percorso dell'immagine all'interno di un oggetto con chiave 'data'
                                )
                                .then((res) => {
                                    this.imgChange = res.data.risposta;
                                    console.log(res.data.risposta);
                                })
                                .catch((err) => {
                                    console.log(err);
                                });
                            }
                        }
                        this.countDisplayedRestaurants = count;
                        this.arrayRestaurantsSelect = risposta.data.risposta;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
                },

                //al click della label cambia classe
                toggleLabelClicked(event) {
                    event.currentTarget.classList.toggle("label-clicked");
                },

                // metodi selezione ristoranti inizio 
                selectedRestaurantWithType(index, nRestaurants) {
                const selectedRestaurant = this.arrayRestaurantsSelect[index][nRestaurants];
                localStorage.setItem('restaurantselected', JSON.stringify(selectedRestaurant));
                },

                groupRestaurant(index) {
                const selectedRestaurant = this.restaurants[index];
                localStorage.setItem('restaurantselected', JSON.stringify(selectedRestaurant));
                },
                
                // metodi selezione ristoranti fine

    },
    mounted() {
        // chiamata axios per ottenere i types di tutti i ristoranti
        axios
            .get("http://localhost:8000/api/v1/types")
            .then((risposta) => {

                this.arrayTypes = risposta.data.types;
                this.restaurants = risposta.data.restaurants;
                this.countRestaurantsFound = this.restaurants.length;
                for (let i = 0; i < risposta.data.restaurants.length; i++) {

                    // console.log(risposta.data.restaurants[i]);
                    if (risposta.data.restaurants[i].img.startsWith("i")) {
                        // chiamata axios
                        let foto = risposta.data.restaurants[i].img;
                        axios
                            .post("http://localhost:8000/api/v1/edit/foto", {
                                data: foto,
                            })
                            .then((res) => {
                                this.imgChange = res.data.risposta;
                                console.log(res.data.risposta);
                            })
                            .catch((err) => {
                                console.log(err);
                            });
                    }
                }
            })
            .catch((err) => {
                console.log(err);
            });
    },
};
</script>

<template>
    <section class="mb-5">
        <div class="container-fluid bg-dark">
            <div class="container mt-5">
                <!-- TESTO RICERCA RISTORANTI -->
                <div class="title" style="padding: 8px">
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
                                style="
                                    background-color: transparent;
                                    color: white;
                                "
                                @click="toggleLabelClicked"
                            >
                                <img
                                    :src="type.img"
                                    alt="img type"
                                    style="cursor: pointer"
                                />
                                {{ type.name }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="!showRestaurant" class="row my-3 p-3">
                <div
                    class="col-12 col-md-6 col-lg-3 my-3 bg-transparent border-0 bg-white"
                    v-for="(restaurant, i) in restaurants"
                >
                    <div class="card">
                        <!-- carico i ristoranti  -->
                        <router-link
                            class="text-dark"
                            :to="{ name: 'Restaurant', params: { id: i + 1 } }"
                            @click="groupRestaurant(i)"
                        >
                            <div style="height: 420px">
                                <img
                                    :src="
                                        restaurant.user_id > 30
                                            ? imgChange
                                            : restaurant.img
                                    "
                                />
                                <!-- <img :src="restaurant.img" /> -->
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <strong> {{ restaurant.name }}</strong>
                                    </h4>
                                    <h5 class="card-title locality">
                                        <i class="fa-solid fa-city"></i>
                                        Località:
                                        {{ restaurant.city }}
                                    </h5>
                                    <h5 class="type">
                                        Genere:
                                        <div
                                            v-for="(
                                                types, i
                                            ) in restaurant.types"
                                        >
                                            <i
                                                class="fa-solid fa-bowl-food pe-2"
                                            ></i>
                                            <strong> {{ types.name }}</strong>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
            <!-- vedere se tenerla o no questa altezza -->

            <div
                v-for="(RestaurantsSelect, i) in arrayRestaurantsSelect"
                class="row my-3 p-3"
            >

                <p class="count">
                    Numero di ristoranti trovati: {{ countDisplayedRestaurants  }}
                </p>
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
                    class="col-12 col-md-6 col-lg-3 bg-transparent border-0 p-2"
                    v-for="(Restaurant, x) in RestaurantsSelect"
                    style="height: 420px"
                >
                    <div class="card">
                        <router-link
                            class="text-dark"
                            :to="{
                                name: 'Restaurant',
                                params: { id: x + 1 },
                            }"
                            @click="selectedRestaurantWithType(i, x)"
                        >
                            <img
                                :src="
                                    Restaurant.user_id > 30
                                        ? imgChange
                                        : Restaurant.img
                                "
                            />
                            <div class="card-body">
                                <h4>
                                    <strong>{{ Restaurant.name }}</strong>
                                </h4>
                                <h5 class="locality card-title">
                                    <i class="fa-solid fa-city"></i>
                                    Località:
                                    {{ Restaurant.city }}
                                </h5>

                                <div class="label-type">
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


//COUNT
.count{
    font-size: 30px;
    color: #00ccbc;
}

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

// CARD
.card {
    border-radius: 80px;
    overflow: hidden;

    img {
        object-fit: cover;
        height: 208px;
        width: 100%;
        transition: transform 0.3s ease;
    }

    &:hover img {
        transform: scale(1.1);
    }
}

//LABEL
label {
    width: 100%;
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
    color: black;
    background-color: #00ccbc;
    border-radius: 10px 0;
    width: 230px;
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
