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
                            <h6>
                                <a href="#"
                                    >Richieste da parte delle Autorità
                                    Pubbliche</a
                                >
                            </h6>
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
                        <a class="mb-3" href="#"
                            ><img
                                src="/public/180px-Download_on_the_App_Store_Badge_IT_RGB_blk.svg.png"
                                alt="AppStore"
                        /></a>
                        <a href="#"
                            ><img
                                src="/public/google_play_store_badge_it.svg_.png"
                                alt="GooglePlay"
                        /></a>
                    </div>
                </div>
            </div>

            <div class="social d-flex justify-content-between">
                <div>
                    <a href="#"
                        ><i class="fa-brands fa-facebook-f text-white blue"></i
                    ></a>
                    <a href="#"
                        ><i class="fa-brands fa-twitter text-white blue"></i
                    ></a>
                    <a href="#"
                        ><i class="fa-brands fa-instagram text-white purple"></i
                    ></a>
                </div>

                <div>
                    <h5 class="text-white">© 2024 Deliveboo</h5>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">

.bg_footer {
    background-color: rgb(48, 49, 49);

    .card {
        background-color: grey;
        min-height: 400px;
        margin: 30px 0;
        padding: 20px;

        h6 {
            margin-top: 15px;

            a {
                color: white;
                text-decoration: none;

                &:hover {
                    color: rgb(59, 170, 170);
                }
            }
        }

        img {
            width: 180px;
        }
    }

    .social {
        a {
            margin-right: 10px;
            font-size: 20px;
        }


    }

}
</style>
