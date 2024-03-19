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
                            <h6><a href="https://www.youtube.com/@mattiaruta">Investitori</a></h6>
                            <h6><a href="#">Chi siamo</a></h6>
                            <h6><a href="http://localhost:5173">Ristoranti</a></h6>
                            <h6><a href="#">Altro</a></h6>
                            <h6><a href="#">Pressroom</a></h6>
                            <h6><a href="https://boolean.careers/">Programmazione</a></h6>
                            <h6><a href="#">Design</a></h6>
                            <h6><a href="https://boolean.careers/">Lavora con noi</a></h6>
                            <h6><a href="https://tinder.com/it">Diventa nostro partner</a></h6>
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
                        <a class="mb-3" href="https://www.apple.com/it/app-store/"
                            ><img
                                src="/public/180px-Download_on_the_App_Store_Badge_IT_RGB_blk.svg.png"
                                alt="AppStore"
                        /></a>
                        <a href="https://play.google.com/store/games?hl=it&gl=US&pli=1"
                            ><img
                                src="/public/google_play_store_badge_it.svg_.png"
                                alt="GooglePlay"
                        /></a>
                    </div>
                </div>
            </div>

            <div class="social d-flex justify-content-between">
                <div>
                    <a href="https://www.facebook.com/?locale=it_IT"
                        ><i class="fa-brands fa-facebook-f"></i
                    ></a>
                    <a href="https://twitter.com/?lang=it"
                        ><i class="fa-brands fa-twitter"></i
                    ></a>
                    <a href="https://www.instagram.com"
                        ><i class="fa-brands fa-instagram"></i
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
            color: white;
        }

        .fa-facebook-f:hover{
            color:#3b5998;
        }

        .fa-twitter:hover{
            color:#00acee;
        }

        .fa-instagram:hover{
            color:#D62976;
        }
    }
}
</style>
