<script>
import { store } from "../store";
export default {
    name: "success",
    data() {
        return {
            store,
        };
    },
};
</script>

<template>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ store.restaurantselected.name }}</h1>  
            <h3>Riepilogo Ordine</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Prodotto</th>
                        <th>Quantità</th>
                        <th>Prezzo unitario</th>
                        <th>Totale</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Inizio dettagli ordine -->
                    <tr>
                        <td>Pasta</td>
                        <td>2</td>
                        <td>€ 5,00</td>
                        <td>€ 10,00</td>
                    </tr>
                    <tr>
                        <td>Pomodoro</td>
                        <td>3</td>
                        <td>€ 1,00</td>
                        <td>€ 3,00</td>
                    </tr>
                    <!-- Fine -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right">Totale</td>
                        <td>€ 13,00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="container mt-5">
   <div class="row">
        <div class="col-md-6 offset-md-3">
            <h3>Inserisci i tuoi dati</h3>
            <form id="orderForm" method="post" action="process_order.php">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <div class="invalid-feedback">Inserisci il tuo nome.</div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <div class="invalid-feedback">Inserisci un indirizzo email valido.</div>
                </div>
                <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                    <div class="invalid-feedback">Inserisci il tuo indirizzo.</div>
                </div>
                <div class="form-group">
                    <label for="phone">Numero di Telefono</label>
                    <input type="number" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                    <div class="invalid-feedback">Inserisci un numero di telefono valido (formato: xxx-xxx-xxxx).</div>
                </div>
                <button type="submit" class="btn btn-primary">Invia Ordine</button>
            </form>
        </div>
   </div>
</div>
</template>

<style lang="scss">

</style>
