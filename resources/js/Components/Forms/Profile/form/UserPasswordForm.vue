<template>
  <div class="pl-lg-4">
    <div class="form-group" :class="hasErrors('old_password')">
      <label class="form-control-label" for="input-current-password">Senha Atual</label>
      <input
        type="password"
        name="old_password"
        id="input-current-password"
        class="form-control form-control-alternative"
        :class="hasErrors('old_password')"
        placeholder="Senha atual"
        v-model="currentPassword"
        required>

      <span
        v-if="errors['old_password']"
        class="invalid-feedback"
        role="alert">
        <strong>{{ errors['old_password'] }}</strong>
      </span>
    </div>
    <div class="form-group" :class="hasErrors('password')">
      <label class="form-control-label" for="input-password">Nova Senha</label>
      <input
        type="password"
        name="password"
        id="input-password"
        class="form-control form-control-alternative"
        :class="hasErrors('password')"
        v-model="password"
        required>

      <span
        v-if="hasErrors('password')"
        class="invalid-feedback"
        role="alert">
        <strong>{{ errors['password'] }}</strong>
      </span>
    </div>
    <div class="form-group">
      <label class="form-control-label" for="input-password-confirmation">Confirme a nova senha</label>
      <input
        type="password"
        name="password_confirmation"
        id="input-password-confirmation"
        class="form-control form-control-alternative"
        :class="hasErrors('password_confirmation')"
        placeholder="Confirme a nova senha"
        v-model="confirmPassword"
        required>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-success mt-4">
        <i class="fa fa-key mr-2"></i>Alterar Senha
      </button>
    </div>
  </div>
</template>

<script>
export default {
name: "UserPasswordForm",
  props: {
    old: {
      type: Array,
      required: false,
    },
    errors: {
      required: false,
    },
    data: {
      required: false,
    }
  },
  created() {
    this.setFormData();
  },
  data() {
    return {
      currentPassword: undefined,
      password: undefined,
      confirmPassword: undefined,
    }
  },
  methods: {
    setFormData() {
      if (this.data) {
        this.currentPassword = this.data.old_password;
        this.password = this.data.password;
        this.confirmPassword = this.data.confirmPassword;
      }else if (this.old) {
        this.currentPassword = this.old.old_password;
        this.password = this.old.password;
        this.confirmPassword = this.old.confirmPassword;
      }
    },

    hasErrors(field) {
      return this.errors[field] ? 'text-danger border border-danger' : '';
    },
  }
}
</script>

<style scoped>

</style>