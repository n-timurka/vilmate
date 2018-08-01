<template>
  <header class="header">
    <div class="container">
      <router-link class="header__title" to="/">{{ header }}</router-link>
      <form-button classname="success" title="Add new" @click="addLinkClick"/>
    </div>
  </header>
</template>

<script>
import FormButton from '@/components/FormButton'

export default {
  name: 'AppHeader',
  components: {
    FormButton
  },
  methods: {
    addLinkClick: function () {
      this.$router.push('/listing')
    }
  },
  data () {
    return {
      header: 'Listings Test'
    }
  }
}
</script>

<style lang="sass">
.header
  height: 50px
  background: #f60
  color: white
  padding: 0 5%

  .header__title
    margin: 0;
    line-height: 50px;
    font-size: 24px;
    text-decoration: none;
    color: #fff;
    font-weight: bold;
</style>
