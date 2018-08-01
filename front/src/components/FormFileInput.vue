<template>
  <div class="form__file">
    <label class="form__label">{{ title }}:</label>
    <input type="file" @change="onFileSelected" class="form__input" />
    <span v-if="error" class="form__error">
      <span v-for="(message, index) in error" v-bind:key="index">
        {{ message }}
      </span>
    </span>
  </div>
</template>

<script>
export default {
  name: 'FormFileInput',
  props: ['title', 'value', 'error'],
  methods: {
    onFileSelected: function (e) {
      let files = e.target.files || e.dataTransfer.files
      if (!files.length) {
        return
      }
      this.$emit('input', files[0])
    }
  }
}
</script>

<style lang="sass">
.form__file
  margin: 10px 0

  .form__input
    border: 1px solid #dedede
    border-radius: 5px
    padding: 5px
    font-size: 14px
    width:  100%

  .form__error
    color: red
</style>
