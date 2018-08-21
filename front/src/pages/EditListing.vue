<template>
  <main class="container">
    <h1>Edit listing</h1>
    <alert :message="message" :className="result"/>
    <listing-form
      :listing="listing"
      :errors="errors"
      @submit="editListing"
      @setErrors="setErrors"
      @updateContact="updateContact"
      title="Edit Listing"/>
  </main>
</template>

<script>
import store from '@/store'
import ListingForm from '@/components/ListingForm'
import Alert from '@/components/Alert'

export default {
  name: 'EditListing',
  components: {
    ListingForm,
    Alert
  },
  data () {
    return {
      message: null,
      result: null,
      listing: {},
      errors: {}
    }
  },
  beforeRouteEnter: function (to, from, next) {
    if (store.state.listing.all.length === 0) {
      store.dispatch('getAllListings').then(() => {
        next()
      })
    } else {
      next()
    }
  },
  created () {
    this.listing = this.$store.getters.getListingById(this.$route.params.id)
  },
  methods: {
    setErrors: function (errors) {
      this.errors = errors
    },
    updateContact: function (contact) {
      this.listing.attributes.name = contact.name
      this.listing.attributes.email = contact.email
      this.listing.attributes.phone = contact.phone
    },
    editListing: function () {
      this.errors = {}
      this.$store.dispatch('editListing', this.listing).then(() => {
        this.message = 'Listing updated successfully!'
        this.result = 'success'
        this.$router.push('/')
      }).catch((error) => {
        this.message = error.response.data.message
        this.errors = error.response.data.errors
        this.result = 'danger'
      })
    }
  }
}
</script>
