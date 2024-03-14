<script>
export default {
    name: "ComponentPartner",
};
</script>

<template>
    <div class="container-fluid gx-0">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="ristoratore">
                            <h1 class="text-white">Diventa nostro partner</h1>
                            <p class="text-white">
                                <b>
                                    Raggiungi più clienti con Deliveboo
                                    registrandoti da ristoratore. Gestiamo noi
                                    la consegna, così tu puoi dedicarti a
                                    offrire i migliori piatti e prodotti.
                                </b>
                            </p>
                            <div>
                                <!-- <router-link :to="{ name: 'Login' }"> -->
                                <!-- <button class="d-flex btn-boo">
                                    <div class="mx-3">
                                        <i class="fa-solid fa-house color"></i>
                                    </div>

                                    <div>
                                        <span>Registrati o Accedi</span>
                                    </div>
                                </button> -->
                                <!-- </router-link> -->
                                <a href="http://localhost:8000/register"><button class="d-flex btn-boo">
                                        <div class="mx-3">
                                            <i class="fa-solid fa-house color"></i>
                                        </div>

                                        <div>
                                            <span>Registrati</span>
                                        </div>
                                    </button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="user">
                            <h1 class="text-white">
                                Ordina comodamente da casa
                            </h1>
                            <p class="text-white">
                                <b>
                                    Scegli tra una vasta selezione di piatti
                                    deliziosi o prodotti preferiti direttamente
                                    dalla comodità del tuo divano. Concediti il
                                    lusso di ordinare ciò che desideri mentre
                                    godi della tua serie o film preferito,
                                    rendendo l'esperienza di ordinare cibo o
                                    prodotti ancora più piacevole e senza
                                    stress.
                                </b>
                            </p>

                            <div>
                                <router-link :to="{ name: 'Login' }">
                                    <button class="d-flex btn-boo">
                                        <div class="mx-3">
                                            <i class="fa-solid fa-house color"></i>
                                        </div>

                                        <div>
                                            <span>Registrati o Accedi</span>
                                        </div>
                                    </button>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.card {
    border: none !important;
}

.ristoratore {
    background-image: url(/public/ristoratore.jpg);
    background-size: cover;
    height: 500px;
    border-radius: 20px;
    box-shadow: 0 0 12px rgba(0, 0, 0, 0.8);
    display: flex;
    flex-direction: column;
    justify-content: end;
    padding: 30px;
    margin-bottom: 20px;
}

.user {
    background-image: url(/public/user.jpg);
    background-size: cover;
    height: 500px;
    border-radius: 20px;
    box-shadow: 0 0 12px rgba(0, 0, 0, 0.8);
    display: flex;
    flex-direction: column;
    justify-content: end;
    padding: 30px;
}
</style>
