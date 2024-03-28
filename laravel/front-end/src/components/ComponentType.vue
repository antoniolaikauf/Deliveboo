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
        reveal() {
            let reveals = document.querySelectorAll(".reveal");

            for (let i = 0; i < reveals.length; i++) {
                // La linea di codice let windowHeight = window.innerHeight; serve a ottenere l'altezza della finestra di visualizzazione del browser, ovvero la quantità di spazio verticale disponibile sulla pagina web visibile allo spettatore
                let windowHeight = window.innerHeight;

                // getBoundingClientRect().top restituisce la distanza tra il bordo superiore dell'elemento e il bordo superiore della finestra di visualizzazione.
                let elementTop = reveals[i].getBoundingClientRect().top;
                let elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        },

        // applicazioni filtri
        check() {
            // mostra ristoranti selezionati
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
                        // ricerca dei ristoranti ce hanno l'immagine che inizia con i
                        // quindi sono immagini salvate nello storage
                        if (risposta.data.risposta[0][i].img.startsWith("i")) {
                            // chiamata axios
                            let foto = risposta.data.risposta[0][i].img;
                            // chiamata per modificare il path dell'immagine
                            axios
                                .post(
                                    "http://localhost:8000/api/v1/edit/foto",
                                    { data: foto } // Invia il percorso dell'immagine all'interno di un oggetto con chiave 'data'
                                )
                                .then((res) => {
                                    this.imgChange = res.data.risposta;
                                    // console.log(res.data.risposta);
                                })
                                .catch((err) => {
                                    console.log(err);
                                });
                        }
                    }
                    this.countDisplayedRestaurants = count;
                    // associato la risposta della chiamata ad un array
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
            const selectedRestaurant =
                this.arrayRestaurantsSelect[index][nRestaurants];
            localStorage.setItem(
                "restaurantselected",
                JSON.stringify(selectedRestaurant)
            );
        },

        groupRestaurant(index) {
            const selectedRestaurant = this.restaurants[index];
            console.log(selectedRestaurant.name);
            localStorage.setItem(
                "restaurantselected",
                JSON.stringify(selectedRestaurant)
            );
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
                    // controllo se ci sono immagini che sono state caricate dallo storage
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

        window.addEventListener("scroll", this.reveal);
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
                    <!-- ciclo su i typi dei ristoranti -->
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
            <!-- tag contenete tutti i ristoranti  -->
            <div v-if="!showRestaurant" class="row my-3 p-3">
                <div
                    class="col-12 col-md-6 col-lg-3 my-3 bg-transparent border-0 bg-white reveal"
                    v-for="(restaurant, i) in restaurants"
                >
                    <div class="card-hover">
                        <router-link
                            class="text-dark"
                            :to="{
                                name: 'Restaurant',
                                params: { id: restaurant.name },
                            }"
                            @click="groupRestaurant(i)"
                        >
                            <div>
                                <img
                                    :src="
                                        restaurant.user_id > 30
                                            ? imgChange
                                            : restaurant.img
                                    "
                                />
                                <div class="card-body">
                                    <div class="card-hover__content">
                                        <h4 class="card-hover__title">
                                            <strong>{{
                                                restaurant.name
                                            }}</strong>
                                        </h4>
                                        <h5 class="card-hover__text locality">
                                            <i class="fa-solid fa-city"></i>
                                            Località: {{ restaurant.city }}
                                        </h5>
                                        <h5 class="card-hover__text">
                                            Genere: <br />
                                            <span
                                                v-for="(
                                                    types, i
                                                ) in restaurant.types"
                                            >
                                                <i
                                                    class="fa-solid fa-bowl-food pe-2"
                                                ></i>
                                                <strong>{{
                                                    types.name
                                                }}</strong>
                                            </span>
                                        </h5>
                                    </div>
                                    <router-link
                                        class="card-hover__link"
                                        :to="{
                                            name: 'Restaurant',
                                            params: { id: i + 1 },
                                        }"
                                    >
                                        Vai al ristorante
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </router-link>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>

            <!-- RISTORANTI SELEZIONATI -->
            <div
                v-for="(RestaurantsSelect, i) in arrayRestaurantsSelect"
                class="row my-3 p-3"
            >
                <p class="count">
                    Numero di ristoranti trovati:
                    {{ countDisplayedRestaurants }}
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
                <!-- ciclo su i ristoranti  -->
                <div
                    v-else
                    class="col-12 col-md-6 col-lg-3 bg-transparent border-0 p-2"
                    v-for="(Restaurant, x) in RestaurantsSelect"
                    style=""
                >
                    <div class="card-hover">
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
                                <div class="card-hover__content">
                                    <h4 class="card-hover__title">
                                        <strong>{{ Restaurant.name }}</strong>
                                    </h4>
                                    <h5 class="locality card-hover__text">
                                        <i class="fa-solid fa-city"></i>
                                        Località:
                                        {{ Restaurant.city }}
                                    </h5>

                                    <div class="label-type">
                                        <!-- controllo se esiste la key che ha ritornato l'oggetto essendo che ritorna due oggetti un po' diversi -->
                                        <h5
                                            class="card-hover__text"
                                            v-if="
                                                Restaurant.hasOwnProperty(
                                                    'pivot'
                                                )
                                            "
                                        >
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

                                        <h5
                                            v-else
                                            class="card-hover__text"
                                            v-for="(
                                                types, i
                                            ) in Restaurant.types"
                                        >
                                            <i
                                                class="fa-solid fa-bowl-food"
                                            ></i>
                                            Genere:
                                            {{ types.name }}
                                        </h5>
                                    </div>
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
// CARD
h1,
h2,
h3,
h4,
h5 {
    font-weight: 800;
    margin-top: 0;
    margin-bottom: 0;
}

.card-hover {
    margin: 0 auto;
    $root: &;
    height: 500px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 0 32px -10px rgba(0, 0, 0, 0.08);

    &:has(#{$root}__link:hover) {
        #{$root}__extra {
            transform: translateY(0);
            transition: transform 0.35s;
        }
    }

    &:hover {
        #{$root} {
            &__content {
                background-color: #dee8c2;
                bottom: 100%;
                transform: translateY(100%);
                padding: 50px 60px;
                transition: all 0.35s cubic-bezier(0.1, 0.72, 0.4, 0.97);
            }

            &__link {
                opacity: 1;
                transform: translate(-50%, 0);
                transition: all 0.3s 0.35s cubic-bezier(0.1, 0.72, 0.4, 0.97);
            }
        }

        img {
            transform: scale(1);
            transition: 0.35s 0.1s transform cubic-bezier(0.1, 0.72, 0.4, 0.97);
        }
    }

    &__content {
        width: 100%;
        text-align: center;
        background-color: #86b971;
        padding: 0 60px 50px;
        position: absolute;
        bottom: 0;
        left: 0;
        transform: translateY(0);
        transition: all 0.35s 0.35s cubic-bezier(0.1, 0.72, 0.4, 0.97);
        will-change: bottom, background-color, transform, padding;
        z-index: 1;

        &::before,
        &::after {
            content: "";
            width: 100%;
            height: 120px;
            background-color: inherit;
            position: absolute;
            left: 0;
            z-index: -1;
        }

        &::before {
            top: -80px;
            clip-path: ellipse(60% 80px at bottom center);
        }

        &::after {
            bottom: -80px;
            clip-path: ellipse(60% 80px at top center);
        }
    }

    &__title {
        font-size: 1.5rem;
        margin-bottom: 1em;

        span {
            color: #2d7f0b;
        }
    }

    &__text {
        font-size: 0.75rem;
    }

    &__link {
        position: absolute;
        bottom: 1rem;
        left: 50%;
        transform: translate(-50%, 10%);
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        text-decoration: none;
        color: #00ccbc;
        background-color: white;
        border-radius: 15px;
        opacity: 0;
        padding: 10px;
        transition: all 0.35s;

        &:hover {
            svg {
                transform: translateX(4px);
            }
        }

        svg {
            width: 18px;
            margin-left: 4px;
            transition: transform 0.3s;
        }
    }

    &__extra {
        height: 50%;
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;
        font-size: 1.5rem;
        text-align: center;
        background-color: #86b971;
        padding: 80px;
        bottom: 0;
        z-index: 0;
        color: #dee8c2;
        transform: translateY(100%);
        will-change: transform;
        transition: transform 0.35s;

        span {
            color: #2d7f0b;
        }
    }

    img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transform: scale(1.2);
        transition: 0.35s 0.35s transform cubic-bezier(0.1, 0.72, 0.4, 0.97);
    }
}

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

.reveal {
    position: relative;
    transform: translateY(150px);
    opacity: 0;
    transition: 1s all ease;
}

.reveal.active {
    transform: translateY(0);
    opacity: 1;
}

//COUNT
.count {
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
    text-align: center;
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
