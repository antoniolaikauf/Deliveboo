<script>
export default {
    name: "Login",
    data() {
        return {
            login: true,
            registrazione: true,
            registraAzienda: true,
        }
    },
    methods: {
        clickRegistration() {
            this.login = false
        },

        registerCompany() {
            this.registrazione = false
        },

        log() {

            this.login = true
            this.registrazione = true
            this.registraAzienda = true
        }
    }
};
</script>

<template>
    <div class="container_log">

        <div class="animation">
            <div class="img animation1">
                <img src="../../public/hamburger.png" alt="hamburger">
            </div>
            <div class="img animation2">
                <img src="../../public/pizza.png" alt="pizza">
            </div>
            <div class="img animation4">
                <img src="../../public/patatine-fritte.png" alt="patatine fritte" style="width: 30px;">
            </div>
            <div class="img animation3">
                <img src="../../public/sushi.png" alt="sushi">
            </div>
        </div>

        <!-- Accedi -->
        <form action="#" class="login" v-if="login === true">
            <h2>Accedi</h2>
            <div class="input">
                <label class="label" for="email">Indirizzo email</label>
                <input type="text" name="email" placeholder="es:name@example.com" class="p-2">
            </div>
            <div class="input">
                <label class="label" for="password">Password</label>
                <input type="password" name="password" placeholder="password" class="p-2">
            </div>

            <div class="button">
                <button>LOGIN</button>
            </div>
            <div>Non sei ancora registrato?<a href="#" @click="clickRegistration">Registrati</a></div>

        </form>

        <!-- Registra Utente -->
        <form action="#" class="login" v-if="registrazione === true & login === false">
            <h2>Registrati</h2>
            <div class="input">
                <label class="label" for="name">Nome</label>
                <input type="text" name="name" class="p-2">
            </div>
            <div class="input">
                <label class="label" for="email">Indirizzo email</label>
                <input type="text" name="email" placeholder="es:name@example.com" class="p-2">
            </div>
            <div class="input">
                <label class="label" for="password">Password</label>
                <input type="password" name="password" placeholder="password" class="p-2">
            </div>
            <div class="input">
                <label class="label" for="password">Confirm Password</label>
                <input type="password" name="password" placeholder="password" class="p-2">
            </div>

            <div class="button">
                <button>REGISTRATI</button>
            </div>
            <div>Vuoi registrarti come ristoratore?<a href="#" @click="registerCompany">Registra Azienda</a></div>

        </form>


        <!-- Registra Azienda -->
        <form action="#" class="login" v-if="registrazione === false & login === false & registraAzienda === true">
            <h2>Registra azienda</h2>
            <div class="input">
                <label class="label" for="name">Nome Azienda</label>
                <input type="text" name="name" class="p-2">
            </div>
            <div class="input">
                <label class="label" for="email">Indirizzo email</label>
                <input type="text" name="email" placeholder="es:name@example.com" class="p-2">
            </div>
            <div class="input">
                <label class="label" for="password">Password</label>
                <input type="password" name="password" placeholder="password" class="p-2">
            </div>
            <div class="input">
                <label class="label" for="piva">PIVA</label>
                <input type="text" name="piva" class="p-2">
            </div>
            <label for="tipo">Tipo di Azienza</label>
            <select name="tipo" id="tipo" class="my-3 ms-3">
                <option value="#">Sushi</option>
                <option value="#">Pizzeria</option>
                <option value="#">Kebab</option>
                <option value="#">Gelateria</option>
                <option value="#">Bar</option>
            </select>

            <div class="button">
                <button>REGISTRATI</button>
            </div>
            <div><a href="#" @click="log">Accedi</a></div>

        </form>

        <div class="animation">
            <div class="img animation3">
                <img src="../../public/hamburger.png" alt="hamburger">
            </div>
            <div class="img animation1">
                <img src="../../public/pizza.png" alt="pizza">
            </div>
            <div class="img animation2">
                <img src="../../public/patatine-fritte.png" alt="patatine fritte" style="width: 30px;">
            </div>
            <div class="img animation4">
                <img src="../../public/sushi.png" alt="sushi" style="width: 50px;">
            </div>
        </div>

    </div>


</template>

<style lang="scss" scoped>
.container_log {
    display: flex;
    justify-content: center;
}


.login {
    padding: 50px;
    width: 477px;
}

.input {
    margin: 15px 0;
}

.label {
    margin-bottom: 5px;
}

.button {
    text-align: center;
}

button {
    width: 100%;
    height: 40px;
    border-radius: 7px;
    background-color: #E2E5E5;
    margin-bottom: 7px;
}

button:hover {
    background-color: #22cdd0;
    color: white;
}

input {
    border: 1px solid rgb(195, 192, 192);
    border-radius: 5px;
    height: 40px;
    width: 100%;
}

input:focus {
    border-color: #22cdd0;
}

a {
    color: #22cdd0;
    margin-left: 3px;
}

// animation
@keyframes MoveOne {

    0% {
        top: 0;
        left: 0
    }

    20% {

        top: 20%;
        left: 20%;

    }

    50% {

        top: 40%;
        right: 40%;

    }

    70% {

        top: 80%;
        right: 20%;

    }

    100% {
        top: 0;
        left: 0;
    }
}

@keyframes MoveTwo {

    0% {
        bottom: 0;
        right: 0
    }

    20% {

        bottom: 20%;
        right: 20%;

    }

    50% {

        bottom: 30%;
        right: 30%;

    }

    70% {

        bottom: 70%;
        right: 50%;

    }

    100% {
        bottom: 0;
        right: 0;
    }
}

@keyframes MoveThree {

    0% {
        bottom: 0;
        left: 0;
    }

    25% {
        bottom: 10%;
        left: 40%;
    }

    50% {
        bottom: 50%;
        left: 50%;
    }

    75% {
        bottom: 70%;
        left: 30%;
    }

    100% {
        bottom: 0;
        left: 0;
    }
}

@keyframes MoveFour {

    0% {
        top: 0;
        left: 20%;
    }

    25% {
        top: 86%;
        left: 60%;
    }

    50% {
        top: 70%;
        left: 70%;
    }

    75% {
        top: 70%;
        left: 30%;
    }

    100% {
        top: 0;
        left: 20%;
    }
}

.animation {
    width: 40%;
    position: relative;
    display: flex;
}

.animation1 {
    position: absolute;
    animation: MoveOne 15s linear infinite;

}

.animation2 {
    position: absolute;
    animation: MoveTwo 10s linear infinite;
}

.animation3 {
    position: absolute;
    animation: MoveThree 8s linear infinite;

}

.animation4 {
    position: absolute;
    animation: MoveFour 16s linear infinite;

}

.img {
    width: 70px;
}

img {
    width: 100%;
}

@media screen and (max-width: 800px) {
    .animation {
        display: none;
    }
}
</style>
