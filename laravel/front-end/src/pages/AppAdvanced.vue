<script>
export default {
    name: "Advance",

    data() {
        return {
            ristoranti: [
                {
                    nome: "Trattoria del Gusto",
                    tipoCibo: "Cucina italiana",
                    indirizzo: "Via Roma, 123",
                    immagine:
                        "https://tse1.mm.bing.net/th?id=OIP.nKQPDz6Nu6BoGnnKj2HAfgHaE8&pid=Api&P=0&h=180",
                },
                {
                    nome: "Sushi Express",
                    tipoCibo: "Sushi e cucina giapponese",
                    indirizzo: "Via Sakura, 456",
                    immagine:
                        "https://tse1.mm.bing.net/th?id=OIP.nKQPDz6Nu6BoGnnKj2HAfgHaE8&pid=Api&P=0&h=180",
                },
                {
                    nome: "Steakhouse Royale",
                    tipoCibo: "Cucina americana",
                    indirizzo: "Piazza Angus, 789",
                    immagine:
                        "https://tse1.mm.bing.net/th?id=OIP.nKQPDz6Nu6BoGnnKj2HAfgHaE8&pid=Api&P=0&h=180",
                },
            ],
        };
    },
};
</script>

<template>
    <div class="container-fluid">
        <div class="row">
            <h2 class="text-center">
                ristoranti che consegnano nella zona ricercata
            </h2>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <div class="d-flex flex-wrap" style="width: 100%">
                        <div class="col-12 col-md-3 contenitore-selezione">
                            <button
                                class="navbar-toggler"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarNav"
                                aria-controls="navbarNav"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                            >
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div
                                class="collapse navbar-collapse"
                                id="navbarNav"
                            >
                                <ul
                                    class="navbar-nav d-block"
                                    style="width: 100%"
                                >
                                    <div
                                        class="accordion"
                                        id="accordionPanelsStayOpenExample"
                                    >
                                        <!-- div con dentro genere ristorante  -->
                                        <div
                                            class="accordion-item border-top rounded-0"
                                        >
                                            <h2
                                                class="accordion-header"
                                                id="panelsStayOpen-headingOne"
                                            >
                                                <button
                                                    class="accordion-button"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#panelsStayOpen-collapseOne"
                                                    aria-expanded="true"
                                                    aria-controls="panelsStayOpen-collapseOne"
                                                >
                                                    Genere ristorante
                                                </button>
                                            </h2>
                                            <div
                                                id="panelsStayOpen-collapseOne"
                                                class="accordion-collapse collapse show"
                                                aria-labelledby="panelsStayOpen-headingOne"
                                            >
                                                <div class="accordion-body">
                                                    <div
                                                        class="form-check py-2"
                                                    >
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="flexRadioDefault"
                                                            id="flexRadioDefault1"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="flexRadioDefault1"
                                                        >
                                                            Default radio
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="form-check py-2"
                                                    >
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="flexRadioDefault"
                                                            id="flexRadioDefault2"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="flexRadioDefault2"
                                                        >
                                                            Default checked
                                                            radio
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="form-check py-2"
                                                    >
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="flexRadioDefault"
                                                            id="flexRadioDefault3"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="flexRadioDefault3"
                                                        >
                                                            Default checked
                                                            radio
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- div con dentro indirizzi -->
                                        <div
                                            class="accordion-item border-top rounded-0"
                                        >
                                            <h2
                                                class="accordion-header"
                                                id="headingTwo"
                                            >
                                                <button
                                                    class="accordion-button collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo"
                                                    aria-expanded="false"
                                                    aria-controls="collapseTwo"
                                                >
                                                    via/indirizzo
                                                </button>
                                            </h2>
                                            <div
                                                id="collapseTwo"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo"
                                                data-bs-parent="#accordionExample"
                                            >
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            value=""
                                                            id="flexCheckDefault"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="flexCheckDefault"
                                                        >
                                                            via n1
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            value=""
                                                            id="flexCheckChecked"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="flexCheckChecked"
                                                        >
                                                            vian2
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- div con dentro prezzi -->
                                        <div
                                            class="accordion-item border-top rounded-0"
                                        >
                                            <h2
                                                class="accordion-header"
                                                id="headingTwo"
                                            >
                                                <button
                                                    class="accordion-button collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree"
                                                    aria-expanded="false"
                                                    aria-controls="collapseThree"
                                                >
                                                    media prezzo
                                                </button>
                                            </h2>
                                            <div
                                                id="collapseThree"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo"
                                                data-bs-parent="#accordionExample"
                                            >
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <!-- <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            value=""
                                                            id="prezzomedio"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="prezzomedio"
                                                        >
                                                            Default checkbox
                                                        </label> -->
                                                        <input type="number" />
                                                        <input type="number" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- div con dentro i genere dei piatti -->
                                        <div
                                            class="accordion-item border-top rounded-0"
                                        >
                                            <h2
                                                class="accordion-header"
                                                id="headingTwo"
                                            >
                                                <button
                                                    class="accordion-button collapsed"
                                                    type="button"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#collapseFour"
                                                    aria-expanded="false"
                                                    aria-controls="collapseFour"
                                                >
                                                    genere cibo
                                                </button>
                                            </h2>
                                            <div
                                                id="collapseFour"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo"
                                                data-bs-parent="#accordionExample"
                                            >
                                                <div class="accordion-body">
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            value=""
                                                            id="idcibo1"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="idcibo1"
                                                        >
                                                            vegano
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            value=""
                                                            id="idcibo2"
                                                        />
                                                        <label
                                                            class="form-check-label"
                                                            for="idcibo2"
                                                        >
                                                            vegetariano
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- div invio dati -->
                                        <div>
                                            <router-link
                                                :to="{ name: 'Restaurant' }"
                                            >
                                                <button
                                                    class="d-flex btn-boo mx-3 ricerca-button my-3"
                                                >
                                                    <div>
                                                        <span
                                                            >ricerca
                                                            avanzata</span
                                                        >
                                                    </div>
                                                </button></router-link
                                            >
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 contenitore-ristoranti">
                            <div class="row m-0">
                                <div
                                    class="card col-12 col-md-4 px-4 border-0"
                                    v-for="(ristorante, i) in ristoranti"
                                >
                                    <div class="border shadow">
                                        <img
                                            :src="ristorante.immagine"
                                            class="card-img-top"
                                            alt="i"
                                        />
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ ristorante.nome }}
                                            </h5>
                                            <p class="card-text">
                                                ristorante specializzato in
                                                <strong>
                                                    {{
                                                        ristorante.tipoCibo
                                                    }}</strong
                                                >
                                            </p>
                                            <p class="card-text">
                                                ci trovi in via{{
                                                    ristorante.indirizzo
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<style lang="scss">
@use "../styles/partials/variables" as *;
h2 {
    font-size: $boo-font;
}
.contenitore-selezione {
    .accordion-item {
        border-top: 2px solid black;
        border: 0px;
    }
    .accordion {
        --bs-accordion-active-bg: transparent;
    }
    .ricerca-button {
        color: white;
        background-color: black;
    }
    .ricerca-button:hover {
        color: black;
        background-color: white;
    }
}

@media screen and (max-width: 768px) {
    .contenitore-selezione {
        margin-bottom: 30px;
    }
}
</style>
