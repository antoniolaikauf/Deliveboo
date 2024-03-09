<script>
export default {
    name: "Footer",
};
</script>

<template>
    <div class="container-fluid gx-0 bg_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <h5 class="text-white">Scopri Deliveboo</h5>
                        <div>
                            <h6><a href="#">Investitori</a></h6>
                            <h6><a href="#">Chi siamo</a></h6>
                            <h6><a href="#">Ristoranti</a></h6>
                            <h6><a href="#">Altro</a></h6>
                            <h6><a href="#">Pressroom</a></h6>
                            <h6><a href="#">Programmazione</a></h6>
                            <h6><a href="#">Design</a></h6>
                            <h6><a href="#">Lavora con noi</a></h6>
                            <h6><a href="#">Diventa nostro partner</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <h5 class="text-white">Note legali</h5>
                        <div>
                            <h6><a href="#">Termini & Condizioni</a></h6>
                            <h6><a href="#">Informativa sulla privacy</a></h6>
                            <h6><a href="#">Ristoranti</a></h6>
                            <h6><a href="#">Cookies</a></h6>
                            <h6><a href="#">Classificazione dei partner</a></h6>
                            <h6><a href="#">Richieste da parte delle Autorità Pubbliche</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <h5 class="text-white">Aiuto</h5>
                        <div>
                            <h6><a href="#">Contatti</a></h6>
                            <h6><a href="#">FAQ</a></h6>
                            <h6><a href="#">Tipi di cucina</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <h5 class="text-white">Porta Deliveboo con te</h5>
                        <!-- BOTTONE APPLE STORE -->
                        <!-- BOTTONE GOOGLE PLAY -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
@import "../style/general.scss";

.bg_footer{
    background-color: rgb(48, 49, 49);

    .card{
        background-color: grey;
        min-height: 400px;
        margin: 30px 0;
        padding: 20px;

        h6{
            margin-top: 15px;

            a{
                color: white;

                &:hover{
                    color: rgb(59, 170, 170);
                }
            }

        }

    }

}

</style>
