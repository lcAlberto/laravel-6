<template>
  <div style="padding: 0">
    <div class="col-md-6 float-left">
      <div class="form-group">
        <label for="userName" class="float-left">Nome: </label>
        <div class="input-group">
          <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-user"></i>
          </span>
          </div>
          <input
            type="text"
            name="name"
            class="form-control"
            :class="hasErrors('name')"
            id="userName"
            placeholder="Nome do usuário"
            v-model="name">
        </div>
        <small class="badge badge-danger text-danger float-right mt-2">
          Nome válido entre 5 e 255 caracteres
        </small>
      </div>

      <div class="form-group">
        <label for="userEmail" class="float-left">email</label>
        <div class="input-group">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <i class="ni ni-email-83"></i>
          </span>
          </div>
          <input
            type="email"
            name="email"
            class="form-control"
            :class="hasErrors('name')"
            id="userEmail"
            placeholder="Digite o email"
            v-model="email">
        </div>
        <small class="badge badge-danger text-danger float-right mt-2">
          Endereço de email válido entre 5 e 255 caracteres
        </small>
      </div>

      <div class="form-group">
        <label for="userPassword" class="float-left">Senha</label>
        <div class="input-group">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <i class="ni ni-lock-circle-open"></i>
          </span>
          </div>
          <input
            type="password"
            name="password"
            class="form-control"
            :class="hasErrors('name')"
            id="userPassword"
            placeholder="Use no mínimo 8 caracteres"
            v-model="password">
        </div>
        <small class="badge badge-danger text-danger float-right mb-5">
          8 caracteres, letras maúsculas e minúsculas, números e símbolos
        </small>
      </div>
    </div>

    <div class="col-md-6 float-right">
      <div class="form-group">
        <label for="confirmPassword" class="float-left">Repita a senha para confirmar</label>
        <div class="input-group">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <i class="ni ni-lock-circle-open"></i>
          </span>
          </div>
          <input
            type="password"
            name="password_confirmation"
            class="form-control"
            :class="hasErrors('name')"
            id="confirmPassword"
            placeholder="Ambas devem ser iguais"
            v-model="confirmPassword">
        </div>
        <small class="badge badge-danger text-danger float-right mt-2">
          A senhas senhas devem ser idênticas
        </small>
      </div>

      <div class="form-group">
        <label for="thumbnail" class="float-left">Imagem de Perfil</label>
        <div class="custom-file">
          <input
            type="file" @change="thumbnailUpload()" ref="file" name="thumbnail" class="custom-file-input"
            id="thumbnail" lang="pt-br">
          <label class="custom-file-label"
                 for="thumbnail">
<!--            {{ this.thumbnail ? this.thumbnail.name : "Nenhuma imagem selecionada" }}-->
          </label>
        </div>
        <small class="badge badge-danger text-danger float-right mt-2">
          Escolha um arquivo de imagem válido no formato jpg, jpeg, gif ou png
        </small>
<!--        <div v-if="this.thumbnail">-->
<!--          <img :src="this.thumbnail" class="img-thumbnail">-->
<!--        </div>-->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "UsersForm",

  props: {
    old: {
      type: Array,
      required: false,
    },
    errors: {
      required: false,
    }
  },

  data() {
    return {
      name: undefined,
      email: undefined,
      phone: undefined,
      password: undefined,
      confirmPassword: undefined,
      thumbnail: '',
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
        this.thumbnail = this.old.thumbnail;
      }
    },

    hasErrors(field) {
      return this.errors[field] ? 'text-danger has-error' : '';
    },

    thumbnailUpload(e) {
      let file = this.$refs.file.files[0];
      if (this.file.type() === 'image/jpeg') {
        this.thumbnail = file;
      }
      console.log(this.thumbnail)
    },
  },
}
</script>

<style scoped>

</style>