<template>
  <section class="listing__item">
    <div class="listing__wrapper">
      <img class="listing__image" v-if="listing.attributes.photo" :src="photoLink">
      <h3 class="listing__header">{{ listing.attributes.title }}</h3>
      <p>
        <strong>Address:</strong> {{ listing.attributes.address }}
        <span v-if="listing.attributes.lat || listing.attributes.lng">(<a target="_blank" :href="googleMapsLink">map</a>)</span>
      </p>
      <p><strong>Area:</strong> {{ listing.attributes.area }} m<sup>2</sup></p>
      <p v-if="listing.attributes.name || listing.attributes.phone || listing.attributes.email">
        <strong>Contacts:</strong>
        {{ listing.attributes.name }}
        {{ listing.attributes.phone }}
        <a :href="'mailto:'+listing.attributes.email">{{ listing.attributes.email }}</a>
      </p>
      <p class="listing__price">{{ listing.attributes.price }} €</p>
      <div class="flex">
        <form-button class="listing__link" classname="main" title="Edit" @click="editListing"/>
        <form-button class="listing__link" classname="danger" title="Delete" @click="deleteListing"/>
      </div>
    </div>
  </section>
</template>

<script>
import config from '@/config'
import FormButton from '@/components/FormButton'

export default {
  name: 'ListingItem',
  components: {
    FormButton
  },
  props: ['listing'],
  computed: {
    googleMapsLink () {
      return config.maps_url + this.listing.attributes.lat + ',' + this.listing.attributes.lng
    },
    photoLink () {
      return config.image_url + this.listing.attributes.photo
    }
  },
  methods: {
    deleteListing: function () {
      this.$store.dispatch('deleteListing', this.listing)
    },
    editListing: function () {
      this.$router.push({
        name: 'EditListing',
        params: { id: this.listing.id }
      })
    }
  },
  data () {
    return {}
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="sass">
.listing__item
  width: 50%

  @media only screen and (max-width: 640px)
    width: 100%

  .listing__wrapper
    margin: 0 5% 5%
    background: #fff
    border: 1px solid #dedede
    box-shadow: 0 1px 2px rgba(0,0,0,.1)
    text-align: center

    .listing__header
      margin: 10px 0

    .listing__image
      width: 100%

    .listing__price
      font-size: 120%
      font-weight: bold

    p
      font-size: 80%
      margin: 5px
      text-align: left

    .listing__link
      width: 50%
      margin: 0
      font-size: 100%
</style>
