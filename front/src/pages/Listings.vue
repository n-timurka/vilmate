<template>
  <main class="container">
    <p v-if="loading">Loading...</p>
    <div v-else class="items">
      <h3 v-if="!listings.length">No listings are here!</h3>
      <listing-item v-for="listing in listings" :listing="listing" :key="listing.id"/>
    </div>
  </main>
</template>

<script>
import { mapGetters } from 'vuex'
import ListingItem from '@/components/ListingItem'

export default {
  name: 'Listings',
  components: {
    ListingItem
  },
  computed: {
    ...mapGetters({
      listings: 'allListings',
      loading: 'getLoading'
    })
  },
  created () {
    if (this.listings.length === 0) {
      this.$store.dispatch('getAllListings')
    }
  }
}
</script>

<style lang="sass">
.items
  display: flex
  flex-wrap: wrap
  width: 100%
  margin: 20px 0
</style>
