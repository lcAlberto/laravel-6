<template>
  <input
    class="text-dark form-control"
    placeholder="'Telefone'" type="text" name="phone"
    value="" id="input-phone" v-mask="'(##) #### - #####'" v-model="phoneInput"
    required>
</template>

<script>
export default {
name: "input-phone",

  data: () => ({
    phoneInput: ''
  })
}
</script>

<style scoped>

</style>