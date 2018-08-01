<template>
  <div class="alert" :class="className" v-if="message">{{ message }}</div>
</template>

<script>
export default {
  name: 'Alert',
  props: ['message', 'className'],
  data () {
    return {}
  }
}
</script>

<style lang="sass">
.alert
  color: #fff
  margin: 10px 0
  padding: 10px
.alert.danger
  background: red
.alert.success
  background: green
</style>
