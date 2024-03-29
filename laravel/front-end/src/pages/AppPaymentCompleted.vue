<script>
    export default {
    name: "PaymentCompleted",
    data() {
      return {



      };
    },
    methods: {
        // Funzione per scrivere il testo con animazione
        writeTextWithAnimation(text, element) {
            // Dividi il testo in caratteri
            const characters = text.split('');
            // Inizializza l'indice del carattere
            let charIndex = 0;
            // Crea un intervallo per aggiungere un carattere ogni 100ms
            const intervalId = setInterval(() => {
                // Se abbiamo aggiunto tutti i caratteri, cancella l'intervallo
                if (charIndex === characters.length) {
                    clearInterval(intervalId);
                } else {
                    // Altrimenti, aggiungi il prossimo carattere allo span
                    element.textContent += characters[charIndex++];
                }
            }, 50);
        }
    },

    mounted() {
        // Testo da scrivere
        const textToWrite = "Il tuo ordine è confermato";
        // Ottenere il riferimento allo span
        const textSpan = this.$refs.textSpan;
        // Funzione per scrivere il testo con animazione
        this.writeTextWithAnimation(textToWrite, textSpan);
    },
}
</script>

<template>
    <div class="container-fluid gx-0">
        <div class="bg text-center">
            <h1 class="py-5"><span ref="textSpan"></span></h1>

            <div class="row w-100">
                <div class="col-12 d-flex flex-column">
                    <div class="card">
                        <img src="/public/DelivebooNoBG.svg" alt="svg deliveboo">

                        <div>
                            <h4>Tieniti pronto, il driver è in arrivo!</h4>
                        </div>
                    </div>

                    <router-link :to="{ name: 'home' }">
                        <button class="btn-boo m-5">Ritorna alla Home</button>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped >
@use "../styles/partials/mixins" as *;
@use "../styles/partials/variables" as *;
@use "../styles/general.scss" as *;

.bg {
    background-color: $boo-color;
    height: 100%;

    img {
        width: 150px;
        animation: moveBackAndForth 4s infinite;
    }

    .card{
        margin: auto;
        background-color: transparent;
        border: none;
    }
}

@keyframes moveBackAndForth {
    0% { transform: translateX(0) scaleX(1); }
    50% { transform: translateX(100%) scaleX(1); }
    51% { transform: translateX(100%) scaleX(-1); }
    100% { transform: translateX(0) scaleX(-1); }
}
</style>

