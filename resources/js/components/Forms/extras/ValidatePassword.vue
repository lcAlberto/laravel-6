<template>
  <div class="progress">
    <div
      class="progress-bar"
      :class="progressbarClass"
      role="progressbar"
      aria-valuenow="60"
      aria-valuemin="0"
      aria-valuemax="100"
      id="password-progress">
    </div>
  </div>
</template>

<script>
export default {
  name: "ValidatePassword",

  data() {
    return {
      contains_eight_characters: false,
      contains_number: false,
      contains_uppercase: false,
      contains_special_character: false,
      valid_password: false,

      progressbarClass: undefined,
    }
  },

  mounted() {
    this.setUpEventListeners();
  },

  methods: {

    setUpEventListeners() {
      const vm = this;

      this.$root.$on('strongpassword', (password) => {
        return this.strongPassword(password);
      })
    },

    strongPassword(password) {
      const format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
      this.contains_number = /\d/.test(password);
      this.contains_uppercase = /[A-Z]/.test(password);
      this.contains_special_character = format.test(password);

      let width = 5;

      if (password.length > 8 || this.contains_eight_characters) {
        this.contains_eight_characters = true;
        this.progressbarClass = 'bg-danger'
        $('#password-progress').css("width", width + 5 + "%");
      }
      if (password.length > 8 && password.length || this.contains_eight_characters) {
        this.contains_eight_characters = true;
        this.progressbarClass = 'bg-warning'
        $('#password-progress').css("width", width + 10 + "%");
      } else {
        this.contains_eight_characters = false;
        this.progressbarClass = 'bg-danger'
        $('#password-progress').css("width", "5%");
      }

      if (this.contains_eight_characters === true &&
        this.contains_special_character === true &&
        this.contains_uppercase === true &&
        this.contains_number === true) {

        this.valid_password = true;
        this.progressbarClass = 'bg-success'
        $('#password-progress').css("width", "100%");
      } else {
        this.valid_password = false;
      }
    },
  },
}
</script>

<style scoped>

</style>