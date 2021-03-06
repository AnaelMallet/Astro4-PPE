import Vue from 'vue'
import './plugins/vuetify'
import App from './App.vue'
import router from './router'
import VueSession from 'vue-session'

var options = {
  persist: true
}

Vue.config.productionTip = false
Vue.use(VueSession, options)

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
