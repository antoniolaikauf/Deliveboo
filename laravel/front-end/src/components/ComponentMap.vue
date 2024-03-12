<script>
export default {
    name: "ComponentMap",
};
</script>

<template>
    <div class="container-fluid gx-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 p-0">
                    <div class="text-map p-4">
                        <h1 >Segui gli ordini passo passo</h1>
                        <p >I piatti e i prodotti che ami, consegnati in pochissimo tempo. Vedrai quando il rider ha ritirato l'ordine, che potrai seguire passo passo, e riceverai una notifica quando sarà quasi da te.</p>
                        <a href="#"
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
                <div class="col-12 col-lg-6 p-0">
                    <div class="img-map">
                        <img src="/public/Mappa.png" alt="map">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>

.container {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
}

.img-map {

    img{
        width: 100%;
    }

}

.text-map{

    img {
        width: 180px;
        margin-top: 40px;
    }

}

</style>
