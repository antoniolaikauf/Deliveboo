import { createRouter, createWebHistory } from "vue-router";
// importazione file per rotte
// import AppAbout from "./pages/AppAbout.vue";
// import AppSkils from './pages/AppSkils.vue'
// import AppHome from "./pages/AppHome.vue";

import Home from "./pages/AppHome.vue"
import Login from "./pages/AppLogin.vue"
import Restaurant from "./pages/AppRestaurant.vue"
import success from "./pages/AppSuccess.vue"
import Advance from "./pages/AppAdvanced.vue"
 
 
// creazione delle rotte e il loro 'percorso'
const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "home",
      component: Home
    },
    {
      path: "/Login",
      name: "Login",
      component: Login
    },
    {
      path: "/Restaurant",
      name: "Restaurant",
      component:Restaurant
    },
    {
      path: "/success",
      name: "success",
      component:success
    },
    {
      path: "/Advance",
      name: "Advance",
      component:Advance
    },
  ],
});
export { router };