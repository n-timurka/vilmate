import Vue from 'vue'
import App from './App'
import VeeValidate from 'vee-validate'
import config from './config'
import router from './router'
import store from './store'

Vue.use(VeeValidate, {
  errorBagName: 'err',
  events: '',
  inject: true
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  config,
  components: { App },
  template: '<App/>'
})
