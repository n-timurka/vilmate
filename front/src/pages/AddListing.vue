<template>
  <main class="container">
    <h1>New listing</h1>
    <alert :message="message" :className="result"/>
    <listing-form
      :listing="listing"
      :errors="errors"
      @submit="addListing"
      @setErrors="setErrors"
      @updateContact="updateContact"
      title="Add Listing"/>
  </main>
</template>

<script>
import Alert from '@/components/Alert'
import ListingForm from '@/components/ListingForm'

export default {
  name: 'AddListingPage',
  components: {
    Alert,
    ListingForm
  },
  data () {
    return {
      message: null,
      result: null,
      listing: {},
      errors: {}
    }
  },
  created () {
    this.listing = this.$store.getters.getListing
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
    addListing: function () {
      this.errors = {}
      this.$store.dispatch('createListing', this.listing).then(() => {
        this.message = 'Listing added successfully!'
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
