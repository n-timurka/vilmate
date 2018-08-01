<template>
  <button class="button" :class="classname" @click="$emit('click')" :disabled="loading">{{ title }}</button>
</template>

<script>
export default {
  name: 'FormButton',
  props: ['title', 'classname', 'loading']
}
</script>

<style lang="sass">
.button
  padding: 5px 10px
  cursor: pointer
  margin: 10px 0
  text-transform: uppercase
  text-decoration: none
  border: none

.button:active
  outline: none

.button.default
  background: #cdcdcd
  color: #fff

.button.default:hover
  opacity: .6
  box-shadow: 0 1px 2px rgba(0,0,0,.1)

.button.main
  background: rgba(20, 255, 20, .8)
  color: #fff

.button.main:hover
  background: rgba(20, 255, 20, 1)
  box-shadow: 0 1px 2px rgba(0,0,0,.1)

.button.success
  position: absolute
  right: 0
  top: 0
  background: rgba(20, 255, 20, .8)
  color: #fff

.button.success:hover
  background: rgba(20, 255, 20, 1)

.button.danger
  background: red
  color: white

.button.danger:hover
  opacity: .6

.button:disabled
  background: #dddddd

</style>
