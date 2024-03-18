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
                    "Esplora e condividi le straordinarie esperienze culinarie della tua zona attraverso la nostra piattaforma. La nostra community guida la tua scelta, accompagnandoti a scoprire e apprezzare i ristoranti più rinomati e apprezzati della tua regione, creando un viaggio gastronomico indimenticabile."
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
                                    background-image: url(https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>Al Dente Trattoria</h1>
                                    <span>Città: Bergamo</span>
                                    <!-- <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div> -->
                                </div>
                            </div>

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://images.pexels.com/photos/11794317/pexels-photo-11794317.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>Ristorante Crack</h1>
                                    <span>Città: Gubbio</span>
                                    <!-- <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div> -->
                                </div>
                            </div>

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://images.pexels.com/photos/17056969/pexels-photo-17056969/free-photo-of-ristorante-lusso-preparazione-articoli-per-la-tavola.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>La Trattoria del Nonno</h1>
                                    <span>Città: Grottaglie</span>
                                    <!-- <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div> -->
                                </div>
                            </div>

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://images.pexels.com/photos/11775402/pexels-photo-11775402.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>Osteria del Sole</h1>
                                    <span>Città: Alghero</span>
                                    <!-- <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div> -->
                                </div>
                            </div>

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://images.pexels.com/photos/1653702/pexels-photo-1653702.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>Kebab Da Samir</h1>
                                    <span>Città: Gubbio</span>
                                    <!-- <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div> -->
                                </div>
                            </div>

                            <div
                                class="swiper-slide"
                                style="
                                    background-image: url(https://images.pexels.com/photos/19130144/pexels-photo-19130144/free-photo-of-mesa-con-pizze.png?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2);
                                    background-size: cover;
                                "
                            >
                                <div class="card_obj">
                                    <h1>La Bottega del Gusto</h1>
                                    <span>Città: Grottaglie</span>
                                    <!-- <div class="star">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div> -->
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
