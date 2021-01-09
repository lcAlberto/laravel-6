<template>
  <div>
    <div class="form-group p-0">
      <div class="input-group input-group-alternative" :class="hasErrors('name')">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="ni ni-hat-3 text-success" v-if="name && !hasErrors('name')"></i>
            <i class="ni ni-hat-3" :class="hasErrors('name')" v-else></i>
          </span>
        </div>
        <input
          type="text"
          name="name"
          v-model="name"
          required autofocus
          class="text-dark form-control"
          placeholder="Seu nome">
      </div>
      <small v-if="errors.name" class="badge badge-danger">
        Nome válido com no mínimo 5 e no máximo 255 caracteres!
      </small>
    </div>
    <div class="text-dark form-group">
      <div class="input-group input-group-alternative mb-3" :class="hasErrors('email')">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="ni ni-email-83 text-success" v-if="email && !hasErrors('email')"></i>
            <i class="ni ni-email-83" :class="hasErrors('email')" v-else></i>
          </span>
        </div>
        <input
          type="email"
          name="email"
          v-model="email"
          required
          class="text-dark form-control"
          placeholder="Email">
      </div>
      <div v-if="errors.email">
        <span class="badge badge-danger" style="display: block;" role="alert">
          Email válido com mínimo 5 e no máximo 255 caracteres!
        </span>
        <span class="badge badge-danger" style="display: block;" role="alert">
          Talvez esse email já existe em nossos registros.
        </span>
      </div>
    </div>

    <div class="text-dark form-group">
      <div class="input-group input-group-alternative mb-3" :class="hasErrors('phone')">
        <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-phone text-success" v-if="phone && !hasErrors('phone')"></i>
            <i class="fa fa-phone" :class="hasErrors('phone')" v-else></i>
          </span>
        </div>
        <input
          type="text"
          name="phone"
          v-model="phone"
          required
          class="text-dark form-control"
          :class="hasErrors('phone')"
          placeholder="Telefone"
          v-mask="'(##) ####-####'">
      </div>
      <small v-if="errors.phone" class="badge badge-danger">
        Telefone inválido!
      </small>
    </div>

    <div class="text-dark form-group">
      <div class="input-group input-group-alternative" :class="hasErrors('password')">
        <div class="input-group-prepend">
            <span class="input-group-text">
             <i class="ni ni ni-lock-circle-open text-success" v-if="password && !hasErrors('password')"></i>
            <i class="ni ni-lock-circle-open" :class="hasErrors('password')" v-else></i></span>
        </div>
        <input
          type="password"
          name="password"
          v-model="password"
          @keyup="strongPassword(password)"
          required
          class="text-dark form-control"
          :class="hasErrors('password')"
          placeholder="Senha">
      </div>
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
    </div>

    <div class="form-group border border" v-if="this.valid_password">
      <div class="input-group input-group-alternative" :class="hasErrors('password_confirmation')">
        <div class="input-group-prepend">
            <span class="input-group-text">
              <i class="ni ni ni-lock-circle-open text-success"
                 v-if="confirmPassword && !hasErrors('password_confirmation')"></i>
              <i class="ni ni-lock-circle-open" :class="hasErrors('password_confirmation')" v-else></i>
            </span>
        </div>
        <input
          type="password"
          name="password_confirmation"
          v-model="confirmPassword"
          required
          class="text-dark form-control"
          :class="hasErrors('password_confirmation')"
          placeholder="Confirmação de senha">
      </div>
    </div>

    <div class="row my-4">
      <div class="col-12">
        <div class="custom-control custom-control-alternative custom-checkbox">
          <input
            type="checkbox"
            name="terms-check"
            v-model="termsCheck"
            required
            class="custom-control-input"
            :class="hasErrors('password_confirmation')"
            id="customCheckRegister">
          <label
            class="custom-control-label"
            for="customCheckRegister">
              <span class="text-mute">Eu concordo com os
                <a href="#">Termos de uso</a>
              </span>
          </label>
        </div>
      </div>
    </div>
    <div class="text-center p-0">
      <button type="submit"
              class="btn btn-block btn-primary mt-4"
              v-if="formValidate()">
        Criar minha conta!
      </button>
    </div>
  </div>
</template>

<script>
import DynamicSelect from "vue-dynamic-select";

export default {
  name: "RegisterForm",

  props: {
    old: {
      type: Array,
      required: false,
    },
    errors: {
      required: false,
    },
  },

  data() {
    return {
      name: undefined,
      email: undefined,
      phone: undefined,
      password: undefined,
      confirmPassword: undefined,
      termsCheck: undefined,

      progressbarClass: undefined,

      password_length: 0,
      contains_eight_characters: false,
      contains_number: false,
      contains_uppercase: false,
      contains_special_character: false,
      valid_password: false
    }
  },
  created() {
    this.setFormData();
  },

  methods: {
    setFormData() {
      if (this.old) {
        this.name = this.old.name;
        this.email = this.old.email;
        this.phone = this.old.phone;
        this.password = this.old.password;
        this.confirmPassword = this.old.confirmPassword;
        this.termsCheck = this.old.termsCheck;
      }
    },

    hasErrors(field) {
      return this.errors[field] ? 'text-danger has-error' : '';
    },

    strongPassword(password) {
      this.password_length = this.password.length;
      const format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
      let width = 5;

      if (this.password.length > 8 || this.contains_eight_characters) {
        this.contains_eight_characters = true;
        this.progressbarClass = 'bg-danger'
        $('#password-progress').css("width", width + 5 + "%");
      }
      if (this.password.length > 8 && this.password.length || this.contains_eight_characters) {
        this.progressbarClass = 'bg-warning'
        $('#password-progress').css("width", width + 10 + "%");
      } else {
        this.contains_eight_characters = false;
        this.progressbarClass = 'bg-danger'
        $('#password-progress').css("width", "5%");
      }

      this.contains_number = /\d/.test(this.password);
      this.contains_uppercase = /[A-Z]/.test(this.password);
      this.contains_special_character = format.test(this.password);

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

    formValidate() {
      if (this.valid_password) {
        if ((this.password === this.confirmPassword)
          && this.name && this.email && this.phone && this.termsCheck) {
          return true
        }
      }
    }
  },

  components: {
    DynamicSelect
  },
}
</script>

<style scoped>

</style>