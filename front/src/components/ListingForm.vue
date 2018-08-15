<template>
  <form @submit.prevent="submit">
    <div class="flex">
      <div class="column">
        <form-input v-model="listing.attributes.title" title="Title" :error="errors.title"/>
        <form-input v-model="listing.attributes.price" title="Price" :error="errors.price"/>
        <form-input v-model="listing.attributes.area" title="Area" :error="errors.area"/>
        <h3>Address</h3>
        <form-input v-model="listing.attributes.country" title="Country" :error="errors.country"/>
        <form-input v-model="listing.attributes.city" title="City" :error="errors.city"/>
        <form-input v-model="listing.attributes.postal" title="Postal code" :error="errors.postal"/>
        <form-input v-model="listing.attributes.address" title="Address" :error="errors.address"/>
        <div class="flex">
          <form-input class="column" v-model="listing.attributes.lat" title="Latitude" :error="errors.lat"/>
          <form-input class="column" v-model="listing.attributes.lng" title="Langitude" :error="errors.lng"/>
        </div>
      </div>
      <div class="column">
        <form-file-input v-model="listing.attributes.file" title="Image" :error="errors.photo"/>
        <p v-if="listing.attributes.photo">{{ listing.attributes.photo }}</p>
        <h3>Contacts</h3>
        <form-input v-model="listing.attributes.name" title="Name" :error="errors.name"/>
        <form-input v-model="listing.attributes.email" title="Email" :error="errors.email"/>
        <form-input v-model="listing.attributes.phone" title="Phone" :error="errors.phone"/>
        <div v-if="contacts.length > 0">
          <h4>Early used contacts</h4>
          <p v-for="contact in contacts" :key="contact.id">
            <a @click.prevent="useContact(contact)" href="#">{{ contact.name }} {{ contact.phone }} {{ contact.email }}</a>
          </p>
        </div>
      </div>
    </div>
    <form-button classname="main" :title="title" :disabled="loading"/>
    <form-button classname="default" title="Back" @click="linkBack" :disabled="loading"/>
  </form>
</template>

<script>
import { mapGetters } from 'vuex'
import FormInput from '@/components/FormInput'
import FormFileInput from '@/components/FormFileInput'
import FormButton from '@/components/FormButton'

export default {
  name: 'ListingForm',
  components: {
    FormInput,
    FormFileInput,
    FormButton
  },
  props: ['listing', 'title', 'errors'],
  computed: {
    ...mapGetters({
      loading: 'getLoading',
      contacts: 'getContacts'
    })
  },
  methods: {
    linkBack: function () {
      this.$router.push('/')
    },
    useContact: function (contact) {
      this.$emit('updateContact', contact)
    },
    submit: function () {
      this.$validator.validate().then(result => {
        if (result) {
          this.$emit('submit')
        }
      })
    }
  }
}
</script>
