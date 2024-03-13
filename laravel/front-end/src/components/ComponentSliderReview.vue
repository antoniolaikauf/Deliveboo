<script>
export default {
    name: "ComponentSliderReview",

    mounted() {
        var swiper = new Swiper(".cubeSwiper", {
            // swiper effect
            effect: "cube",
            grabCursor: true,
            speed: 2000,
            loop: true,
            autoplay: {
                delay: 2500,

                // Pause on hover
                pauseOnMouseEnter: true,

                disableOnInteraction: false,
            },

            // Pagination as slide count

            pagination: {
                el: ".cube-pagination-fraction",
                type: "fraction",
            },

            // prev next buttons

            navigation: {
                nextEl: ".cube-button-next",
                prevEl: ".cube-button-prev",
            },
        });
    },
};
</script>

<template>
    <div class="container d-flex justify-content-center mb-5">
        <div class="row">
            <div class="col-12 col-lg-6 ">
                <p class="description">
                    "Esplora e condividi le straordinarie esperienze culinarie della tua zona attraverso la nostra piattaforma. Attraverso recensioni autentiche, la nostra community guida la tua scelta, accompagnandoti a scoprire e apprezzare i ristoranti più rinomati e apprezzati della tua regione, creando un viaggio gastronomico indimenticabile."
                </p>
            </div>

            <div class="col-12 col-lg-6 d-flex justify-content-end cube">
                <figure class="cube-parent-container">
                    <!-- Swiper -->
                    <div class="swiper cubeSwiper">
                        <div class="swiper-wrapper">
                            <!-- begin slides -->

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://www.todis.it/wp-content/uploads/2023/05/sushi-fatto-in-casa.jpg);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>Sushi Kimo</h1>
                                    <span>Via Roma, 32</span>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://ilfattoalimentare.it/wp-content/uploads/2022/12/Depositphotos_505971914_L-1.jpg);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>Pizzeria da Francesco</h1>
                                    <span>Via Napoli, 18</span>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://www.agendaonline.it/wp-content/uploads/2021/07/bistecca-fiorentina.jpg);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>Steack House</h1>
                                    <span>Via Firenze, 10</span>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://www.grottapalazzese.it/wp-content/uploads/2018/03/Grotta-Palazzese-tavolo-centrale.jpg);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>Grotta Palazzese</h1>
                                    <span>Polignano a Mare</span>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://www.informacibo.it/wp-content/uploads/2019/10/cibo-vegano.jpg);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>Vegan Flavour</h1>
                                    <span>Via Brescia, 15</span>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://caffetterialeonardo.com/wp-content/uploads/2019/10/Pasticceria-1.jpg);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>Pastry</h1>
                                    <span>Via Torino, 19</span>
                                    <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- end slides -->
                        </div>
                        <!-- // end swiper wrapper  -->

                        <!-- Pagination as three column grid  -->

                        <div class="pagination-container">
                            <!-- Using non breaking space - &nbsp; - to layout text/entity icon in button   -->
                            <button class="cube-button-prev btn-boo">
                                <i class="fa-solid fa-arrow-left"></i>
                            </button>
                            <div class="cube-pagination-fraction"></div>
                            <button class="cube-button-next btn-boo">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                        <!-- // end pagination container  -->
                    </div>
                    <!-- // end swiper  -->
                </figure>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.description {
    font-size: 25px;
    text-align: center;
    padding-right: 25px;
}

.cube-parent-container {
    width: 100%;
    max-width: 500px;
    margin: 0;
}

.swiper-slide {
    display: flex;
    flex-direction: column;
    justify-content: end;

    .card_obj {
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.862);
    }
}

/*  Aspect ratio as 1/1 or square */

.cubeSwiper .swiper-slide {
    aspect-ratio: 1/1;
}

/*  Set slide image to cover */

.cubeSwiper .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/*  Pagination as three column grid  */
.cubeSwiper .pagination-container {
    padding-top: 25px;
    /*  pagination grid container width set in absolute pixels as using
      transform scale for responsiveness.  */
    width: 250px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 100px 1fr;
    grid-template-rows: 1fr;
    grid-column-gap: 0px;
    grid-row-gap: 0px;

    /* Scale down pagination - i.e. bigger or smaller at your break points */
    transform: scale(0.8);
}

/* fraction/slide count */

.cubeSwiper .cube-pagination-fraction {
    color: black;
    font-size: 18px;
    font-weight: 700;
    margin-top: 15px;
    text-align: center;
    position: relative;
}

/* prev/next buttons */

.cube-button-prev,
.cube-button-next {
    cursor: pointer;
    transition: all 500ms ease;
    font-weight: 700;
}

.cube-button-prev:hover,
.cube-button-next:hover {
    filter: brightness(0.95);
}

body {
    font-size: 14px;
    color: white;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100vh;
}

.star {
    color: rgb(214, 214, 20);
}

@media screen and (max-width: 993px) {
    .cube{

        justify-content: center !important;
    }

}

</style>
