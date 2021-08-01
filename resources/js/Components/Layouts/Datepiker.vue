<template>
  <v-date-picker
      :max-date="new Date()"
      min-date="2010-01-01"
      mode="dateTime"
      timezone="UTC"
      class="piker-class"
      :value="vModel">
    <template v-slot="{ inputValue, inputEvents }">
      <input
          :class="inputClass"
          :value="inputValue"
          v-on="inputEvents"
          :placeholder="placeholder"/>
    </template>
  </v-date-picker>
</template>

<script>
import DatePicker from 'v-calendar/lib/components/date-picker.umd'

export default {
  name: "Datepiker",

  props: {
    minDate: {type: String, required: false},
    maxDate: {type: String, required: false},
    vModel: {required: false},
    inputClass: {type: String, default: 'form-control'},
    buttonText: {type: String, default: 'Data'},
    name: {type: String, required: true},
    placeholder: {type: String, required: false},
  },
  components: {'v-date-picker': DatePicker},
}
</script>

<style scoped>
.piker-class {
  padding: 0;
  border: none;
}
.form-control{
  border-top-left-radius: 0 !important;
  border-bottom-left-radius: 0 !important;
  border-left: none !important;
}
</style>