import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Accueil'
import EnTantQue from './views/En-Tant-Que'
import Client from './views/Connexion.vue'
import Artiste from './views/Connexion.vue'
import Intervenant from './views/Connexion.vue'
import Inscription from './views/Inscription'
import InfoEvent from './views/Info-Event'
import Consultation from './views/Consultation'
import Planning from './views/Planning'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      component: Home
    },
    {
      path: '/connexion',
      component: EnTantQue
    },
    {
      path: '/connexion/client',
      component: Client
    },
    {
      path: '/connexion/artiste',
      component: Artiste
    },
    {
      path: '/connexion/intervenant',
      component: Intervenant
    },
    {
      path: '/inscription',
      component: Inscription
    },
    {
      name: 'evenement',
      path: '/evenement',
      component: InfoEvent,
      props: true
    },
    {
      path: '/consultation',
      name: 'consultation',
      component: Consultation      
    },
    {
      path: '/planning',
      name: 'planning',
      component: Planning
    }
  ]
})
