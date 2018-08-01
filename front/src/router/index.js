import Vue from 'vue'
import Router from 'vue-router'
import Listings from '@/pages/Listings'
import AddListing from '@/pages/AddListing'
import EditListing from '@/pages/EditListing'
import Error from '@/pages/Error'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/listing/:id',
      name: 'EditListing',
      component: EditListing
    },
    {
      path: '/listing',
      name: 'AddListing',
      component: AddListing
    },
    {
      path: '/',
      name: 'Main',
      component: Listings
    },
    {
      path: '*',
      name: 'Error',
      component: Error
    }
  ]
})
