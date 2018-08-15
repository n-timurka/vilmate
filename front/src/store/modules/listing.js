import api from '@/api/modules/listings'

// initial state
const state = {
  all: [],
  loading: false,
  listing: {
    id: null,
    attributes: {
      title: '',
      price: '',
      area: '',
      country: '',
      city: '',
      postal: '',
      address: '',
      lat: null,
      lng: null,
      photo: null,
      name: '',
      email: '',
      phone: ''
    }
  }
}

// getters
const getters = {
  allListings () {
    return state.all
  },
  getListingById: state => id => {
    return state.all.find(listing => listing.id === id)
  },
  getListing () {
    return state.listing
  },
  getLoading () {
    return state.loading
  },
  getContacts () {
    return state.all.map(listing => {
      return {
        name: listing.attributes.name,
        email: listing.attributes.email,
        phone: listing.attributes.phone
      }
    })
  }
}

// actions
const actions = {
  getAllListings ({ commit }) {
    state.loading = true
    return new Promise((resolve, reject) => {
      api.getAllListings().then((response) => {
        commit('setListings', response.data.data)
        state.loading = false
        resolve()
      }).catch((error) => {
        state.loading = false
        reject(error)
      })
    })
  },
  getListing ({ commit }, id) {
    state.loading = true
    return new Promise((resolve, reject) => {
      api.getListing(id).then((response) => {
        console.log(response)
        state.loading = false
        resolve(response.data)
      }).catch((error) => {
        state.loading = false
        reject(error)
      })
    })
  },
  createListing ({ state, commit }, listing) {
    state.loading = true
    return new Promise((resolve, reject) => {
      api.addListing(listing).then((response) => {
        commit('addListing', response.data)
        state.loading = false
        resolve()
      }).catch((error) => {
        state.loading = false
        reject(error)
      })
    })
  },
  editListing ({ state, commit }, listing) {
    state.loading = true
    return new Promise((resolve, reject) => {
      api.editListing(listing).then((response) => {
        commit('updateListing', response.data)
        state.loading = false
        resolve()
      }).catch((error) => {
        state.loading = false
        reject(error)
      })
    })
  },
  deleteListing ({ commit }, listing) {
    api.deleteListing(listing.id).then((response) => {
      commit('deleteListing', listing)
    }).catch((error) => {
      console.log(error.response.data)
    })
  }
}

// mutations
const mutations = {
  setListings (state, listings) {
    state.all = listings
  },
  setListing (state, listing) {
    state.listing = listing
  },
  addListing (state, listing) {
    state.all.unshift(listing)
  },
  updateListing (state, listing) {
    state.all[state.all.indexOf(listing)] = listing
  },
  deleteListing (state, listing) {
    state.all.splice(state.all.indexOf(listing), 1)
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
