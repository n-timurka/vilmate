<template>
  <main class="container">
    <h1>New listing</h1>
    <alert :message="message" :className="result"/>
    <listing-form
      :listing="listing"
      :errors="errors"
      @submit="addListing"
      @setErrors="setErrors"
      title="Add Listing"/>
  </main>
</template>

<script>
import { mapGetters } from 'vuex'
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
      errors: {}
    }
  },
  computed: {
    ...mapGetters({
      listing: 'getListing'
    })
  },
  methods: {
    setErrors: function (errors) {
      this.errors = errors
    },
    addListing: function () {
      this.errors = {}
      this.$store.dispatch('createListing', this.listing).then(() => {
        this.message = 'Listing added successfully!'
        this.result = 'success'
      }).catch((error) => {
        this.message = error.response.data.message
        this.errors = error.response.data.errors
        this.result = 'danger'
      })
    }
  }
}
</script>
