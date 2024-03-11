<script>
export default {
    name: "Login",
};
</script>

<template>
    <form action="#" class="login">
        <h2>Accedi</h2>
        <div class="input">
            <label class="label" for="email">Indirizzo email</label>
            <input type="text" name="email" placeholder="es:name@example.com" class="p-2">
        </div>
        <div class="input">
            <label class="label" for="password">Password</label>
            <input type="text" name="password" placeholder="password" class="p-2">
        </div>

        <div class="button">
            <button>LOGIN</button>
        </div>
        <div>Non sei ancora registrato?<a href="#">Registrati</a></div>

    </form>
</template>

<style lang="scss" scoped>
.login {
    padding: 50px;
    width: 477px;
    margin: 20px auto;
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
</style>
