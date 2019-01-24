import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Accueil'
import EnTantQue from './views/En-Tant-Que'
import Client from './views/Connexion.vue'
import Artiste from './views/Connexion.vue'
import Intervenant from './views/Connexion.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/connexion',
      name: 'connexion',
      component: EnTantQue
    },
    {
      path: '/connexion/client',
      name: 'client',
      component: Client
    },
    {
      path: '/connexion/artiste',
      name: 'artiste',
      component: Artiste
    },
    {
      path: '/connexion/intervenant',
      name: 'intervenant',
      component: Intervenant
    }
  ]
})
