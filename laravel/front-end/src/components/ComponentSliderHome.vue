<script>
export default {
    name: "ComponentSliderHome",
};
</script>

<template>
    <div class="container-slider">
        <div class="center">
            <div class="slider">
                <div class="items">
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />

                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                </div>
            </div>
        </div>


        <div class="center">
            <div class="slider">
                <div class="items">
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />

                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                    <img src="/public/1.jpeg" alt="" class="item" />
                </div>
            </div>
        </div>
    </div>
</template>

<style>

.container-slider{
    z-index: 500;
    position: absolute;
    top: 30%;

}

.center {
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.slider {
    width: 99vw;
    height: fit-content;
    overflow: hidden;
}
.items {
    width: fit-content;
    display: flex;
    animation: slide 50s linear infinite;
}
.item {
    width: 250px;
    border-radius: 5mm;
    margin: 5px;
}
@keyframes slide {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}
</style>
