<script>
export default {
    name: "ComponentMap",
};
</script>

<template>
    <div class="container-fluid gx-0">
        <div class="container">
            <div class="row">
                <div class="col-6 p-0">
                    <div class="text-map">

                    </div>
                </div>
                <div class="col-6 p-0">
                    <div class="img-map">
                        <img src="/public/Mappa.png" alt="map">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>


.text-map{
    background-color: aqua;
    height: 200px;

}

.img-map {

    img{
        width: 100%;
    }
}
</style>
