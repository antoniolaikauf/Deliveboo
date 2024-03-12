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
                    <img src="/public/panzerotti.jpeg" alt="" class="item-small" />
                    <img src="/public/lospollos.jpeg" alt="" class="item" />
                    <img src="/public/kfc.png" alt="" class="item-small" />
                    <img src="/public/pizzahut.png" alt="" class="item" />
                    <img src="/public/martinucci.png" alt="" class="item-small" />
                    <img src="/public/kfc.png" alt="" class="item-small" />
                    <img src="/public/old wild west.png" alt="" class="item" />

                    <img src="/public/panzerotti.jpeg" alt="" class="item" />
                    <img src="/public/lospollos.jpeg" alt="" class="item" />
                    <img src="/public/kfc.png" alt="" class="item-small" />
                    <img src="/public/pizzahut.png" alt="" class="item" />
                    <img src="/public/martinucci.png" alt="" class="item-small" />
                    <img src="/public/kfc.png" alt="" class="item-small" />
                    <img src="/public/old wild west.png" alt="" class="item" />

                    <img src="/public/panzerotti.jpeg" alt="" class="item" />
                    <img src="/public/lospollos.jpeg" alt="" class="item" />
                    <img src="/public/kfc.png" alt="" class="item-small" />
                    <img src="/public/pizzahut.png" alt="" class="item" />
                    <img src="/public/martinucci.png" alt="" class="item-small" />
                    <img src="/public/kfc.png" alt="" class="item-small" />
                    <img src="/public/old wild west.png" alt="" class="item" />
                </div>
            </div>
        </div>

        <div class="center">
            <div class="slider">
                <div class="items">
                    <img src="/public/baffa.jpeg" alt="" class="item" />
                    <img src="/public/burrata.jpeg" alt="" class="item" />
                    <img src="/public/pizza.jpeg" alt="" class="item-small" />
                    <img src="/public/panzerotti.jpeg" alt="" class="item-small" />
                    <img src="/public/pizza.jpeg" alt="" class="item" />
                    <img src="/public/mcdo.png" alt="" class="item-small" />
                    <img src="/public/pizzahut.png" alt="" class="item" />

                    <img src="/public/burrata.jpeg" alt="" class="item" />
                    <img src="/public/martinucci.png" alt="" class="item" />
                    <img src="/public/pizza.jpeg" alt="" class="item-small" />
                    <img src="/public/panzerotti.jpeg" alt="" class="item-small" />
                    <img src="/public/pizza.jpeg" alt="" class="item" />
                    <img src="/public/mcdo.png" alt="" class="item-small" />
                    <img src="/public/pizzahut.png" alt="" class="item" />

                    <img src="/public/burrata.jpeg" alt="" class="item" />
                    <img src="/public/martinucci.png" alt="" class="item" />
                    <img src="/public/pizza.jpeg" alt="" class="item-small" />
                    <img src="/public/panzerotti.jpeg" alt="" class="item-small" />
                    <img src="/public/pizza.jpeg" alt="" class="item" />
                    <img src="/public/mcdo.png" alt="" class="item-small" />
                    <img src="/public/pizzahut.png" alt="" class="item" />
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
    width: 100%;
    overflow: hidden;
}

.center {
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.slider {
    width: 100%;
    height: fit-content;
}
.items {
    width: fit-content;
    display: flex;
    margin: 0;
    animation: slide 200s linear infinite;
    height: 130px;
}
.item {
    width: 200px;
    border-radius: 5mm;
    margin: 5px;
    box-sizing: border-box;
    object-fit: cover;
}

.item-small{
    width: 120px;
    border-radius: 5mm;
    margin: 5px;
    box-sizing: border-box;
    object-fit: cover;
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
