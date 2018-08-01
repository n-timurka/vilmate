<template>
  <div id="app">
    <app-header/>
    <router-view/>
  </div>
</template>

<script>
import AppHeader from '@/components/AppHeader'
export default {
  name: 'App',
  components: {
    AppHeader
  }
}
</script>

<style lang="sass">
@import url('https://fonts.googleapis.com/css?family=Open+Sans')

body
  margin: 0
  background: #ededed

*
  font-family: 'Open Sans', sans-serif

.container
  max-width: 1024px
  margin: 0 auto
  position: relative

  @media only screen and (max-width: 640px)
    margin: 5%

.flex
  display: flex

  @media only screen and (max-width: 640px)
    flex-wrap: wrap

.column
  width: 50%
  padding-right: 5%

  @media only screen and (max-width: 640px)
    width: 100%

</style>
