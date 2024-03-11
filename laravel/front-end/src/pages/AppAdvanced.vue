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
                    piatti: [
                        { nomePiatto: "Pasta alla carbonara", prezzo: 12.99 },
                        { nomePiatto: "Pizza Margherita", prezzo: 9.99 },
                    ],
                },
                {
                    nome: "Sushi Express",
                    tipoCibo: "Sushi e cucina giapponese",
                    indirizzo: "Via Sakura, 456",
                    piatti: [
                        { nomePiatto: "Sashimi misto", prezzo: 18.99 },
                        { nomePiatto: "Tempura di gamberi", prezzo: 15.99 },
                    ],
                },
                {
                    nome: "Steakhouse Royale",
                    tipoCibo: "Cucina americana",
                    indirizzo: "Piazza Angus, 789",
                    piatti: [
                        { nomePiatto: "Bistecca alla griglia", prezzo: 22.99 },
                        { nomePiatto: "Hamburger deluxe", prezzo: 14.99 },
                    ],
                },
            ],
        };
    },
};
</script>

<template>
    <!-- <div>
        <div>
            <router-link :to="{ name: 'home' }"> vai sull home </router-link>
        </div>
        <div>
            <router-link :to="{ name: 'Restaurant' }">
                vai sull Restaurant</router-link
            >
        </div>
    </div> -->

    <div class="container-fluid">
        <div class="row">
            <h2>tutti i ristoranti nella zona selezionata</h2>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <div class="d-flex" style="width: 100%">
                        <div class="col-3">
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
                                        <div class="accordion-item">
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
                                                    Accordion Item #1
                                                </button>
                                            </h2>
                                            <div
                                                id="panelsStayOpen-collapseOne"
                                                class="accordion-collapse collapse show"
                                                aria-labelledby="panelsStayOpen-headingOne"
                                            >
                                                <div class="accordion-body">
                                                    <input
                                                        type="checkbox"
                                                        id="vehicle1"
                                                        name="vehicle1"
                                                        value="Bike"
                                                    />
                                                    <label for="vehicle1">
                                                        prima opzione</label
                                                    ><br />
                                                    <input
                                                        type="checkbox"
                                                        id="vehicle1"
                                                        name="vehicle1"
                                                        value="Bike"
                                                    />
                                                    <label for="vehicle1">
                                                        prima opzione</label
                                                    ><br />
                                                    <input
                                                        type="checkbox"
                                                        id="vehicle1"
                                                        name="vehicle1"
                                                        value="Bike"
                                                    />
                                                    <label for="vehicle1">
                                                        prima opzione</label
                                                    ><br />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
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
                                                    Accordion Item #2
                                                </button>
                                            </h2>
                                            <div
                                                id="collapseTwo"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo"
                                                data-bs-parent="#accordionExample"
                                            >
                                                <div class="accordion-body">
                                                    <input
                                                        type="checkbox"
                                                        id="vehicle1"
                                                        name="vehicle1"
                                                        value="Bike"
                                                    />
                                                    <label for="vehicle1">
                                                        prima opzione</label
                                                    ><br />
                                                    <input
                                                        type="checkbox"
                                                        id="vehicle1"
                                                        name="vehicle1"
                                                        value="Bike"
                                                    />
                                                    <label for="vehicle1">
                                                        prima opzione</label
                                                    ><br />
                                                    <input
                                                        type="checkbox"
                                                        id="vehicle1"
                                                        name="vehicle1"
                                                        value="Bike"
                                                    />
                                                    <label for="vehicle1">
                                                        prima opzione</label
                                                    ><br />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-8">
   
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<style lang="scss"></style>
