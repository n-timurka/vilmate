import Vue from 'vue'
import Vuex from 'vuex'
import listing from './modules/listing'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    listing
  }
})
