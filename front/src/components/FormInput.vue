<template>
  <div class="form__item">
    <label class="form__label">{{ title }}:</label>
    <input :name="title" type="text" class="form__input" :class="{ error: error, error: err.has(title) }" v-model="inputVal" v-validate="rule"/>
    <span v-show="err.has(title)" class="form__error">{{ err.first(title) }}</span>
    <span v-if="error" class="form__error">
      <span v-for="(message, index) in error" v-bind:key="index">
        {{ message }}
      </span>
    </span>
  </div>
</template>

<script>
import rules from '@/validation'
export default {
  name: 'FormItem',
  props: ['title', 'value', 'error'],
  data () {
    return {
      inputVal: this.value,
      rule: null
    }
  },
  created () {
    this.rule = rules[this.title] || ''
  },
  inject: ['$validator'],
  watch: {
    inputVal (val) {
      this.$emit('input', val)
    },
    value (val) {
      this.inputVal = val
    }
  }
}
</script>

<style lang="sass">
.form__item
  margin: 10px 0

  .form__input
    border: 1px solid #dedede
    border-radius: 5px
    padding: 5px
    font-size: 14px
    width:  100%

  .form__error
    color: red

  .form__input.error
    border-color: red

  .form__input:focus, form__input:active
    box-shadow: 0 1px 2px rgba(0,0,0,.1)
    outline: none
</style>
