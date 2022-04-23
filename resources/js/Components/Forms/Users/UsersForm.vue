<template>
  <div style="padding: 0">
    <div class="col-md-6 float-left" style="z-index: 100 !important">

      <div class="form-group">
        <label for="userName" class="float-left">Nome: </label>
        <div class="input-group" :class="hasErrors('name')">
          <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-user"></i>
          </span>
          </div>
          <input
            type="text"
            name="name"
            class="form-control"
            id="userName"
            placeholder="Nome do usuário"
            v-model="name">
        </div>
        <small
          class="badge badge-danger text-danger float-right mt-2"
          v-if="hasErrors('name')">
          Nome válido entre 5 e 255 caracteres
        </small>
      </div>

      <div class="form-group">
        <label for="userEmail" class="float-left">email</label>
        <div class="input-group" :class="hasErrors('email')">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <i class="ni ni-email-83"></i>
          </span>
          </div>
          <input
            type="email"
            name="email"
            class="form-control"
            id="userEmail"
            placeholder="Digite o email"
            v-model="email">
        </div>
        <small
          class="badge badge-danger text-danger float-right mt-2"
          v-if="hasErrors('email')">
          Endereço de email válido entre 5 e 255 caracteres
        </small>
      </div>

      <div class="form-group">
        <label for="userPhone" class="float-left">Telefone: </label>
        <div class="input-group" :class="hasErrors('phone')">
          <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-phone"></i>
          </span>
          </div>
          <input
            type="text"
            name="phone"
            v-model="phone"
            id="userPhone"
            required
            class="text-dark form-control"
            :class="hasErrors('phone')"
            placeholder="Telefone"
            v-mask="'(##) ####-####'">
        </div>
        <small
          class="badge badge-danger text-danger float-right mt-2"
          v-if="hasErrors('phone')">
          Número de telefone válido!
        </small>
      </div>
    </div>

    <div class="col-md-6 float-right">

      <div class="form-group">
        <label for="userPassword" class="float-left">Senha</label>
        <div class="input-group" :class="hasErrors('password')">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <i class="ni ni-lock-circle-open"></i>
          </span>
          </div>
          <input
            type="password"
            name="password"
            class="form-control"
            id="userPassword"
            placeholder="Use no mínimo 8 caracteres"
            v-model="password">
        </div>
        <small
          class="badge badge-danger text-danger float-right mb-5"
          v-if="hasErrors('password')">
          8 caracteres, letras maúsculas e minúsculas, números e símbolos
        </small>
      </div>

      <div class="form-group">
        <label for="confirmPassword" class="float-left">Repita a senha para confirmar</label>
        <div class="input-group" :class="hasErrors('password_confirmation')">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">
            <i class="ni ni-lock-circle-open"></i>
          </span>
          </div>
          <input
            type="password"
            name="password_confirmation"
            class="form-control"
            id="confirmPassword"
            placeholder="Ambas devem ser iguais"
            v-model="confirmPassword">
        </div>
        <small
          class="badge badge-danger text-danger float-right mt-2"
          v-if="hasErrors('password_confirmation')">
          A senhas senhas devem ser idênticas
        </small>
      </div>

      <div class="form-group">
        <label for="thumbnail" class="float-left">Imagem de perfil</label>
        <div class="input-group" :class="hasErrors('thumbnail')">
          <div class="input-group">
            <input
              type="file"
              name="thumbnail"
              class="form-control"
              id="thumbnail">
            <label class="custom-file-label" for="thumbnail">
              {{ thumbnail ? thumbnail.name : "Nenhuma imagem" }}
            </label>
          </div>
        </div>
        <small
          class="badge badge-danger text-danger float-right mt-2"
          v-if="hasErrors('thumbnail')">
          Escolha um arquivo de imagem válido no formato jpg, jpeg, gif ou png
        </small>
      </div>
    </div>
<!--    <div class="custom-file">-->
<!--      <vue-dropzone ref="myVueDropzone" id="dropzone" v-model="thumbnail" :options="dropzoneOptions"></vue-dropzone>-->
<!--    </div>-->
  </div>
</template>

<script>
// import vue2Dropzone from 'vue2-dropzone';
// import 'vue2-dropzone/dist/vue2Dropzone.min.css';

import { VueMaskDirective } from 'v-mask'
Vue.directive('mask', VueMaskDirective);

export default {
  name: "UsersForm",

  props: {
    old: {
      type: Array,
      required: false,
    },
    errors: {
      required: false,
    },
    data:{
      required: false,
    }
  },

  data() {
    return {
      name: '',
      email: '',
      phone: '',
      password: '',
      confirmPassword: '',
      thumbnail: '',
    }
  },

  created() {
    this.setFormData();
  },

  methods: {
    setFormData() {
      if (this.data) {
        this.name = this.data.name;
        this.email = this.data.email;
        this.phone = this.data.phone;
        this.password = this.data.password;
        this.confirmPassword = this.data.confirmPassword;
        this.thumbnail = this.data.thumbnail;
      }else if (this.old) {
        this.name = this.old.name;
        this.email = this.old.email;
        this.phone = this.old.phone;
        this.password = this.old.password;
        this.confirmPassword = this.old.confirmPassword;
        this.thumbnail = this.old.thumbnail;
      }
    },

    hasErrors(field) {
      return this.errors[field] ? 'text-danger border border-danger' : '';
    },

    thumbnailUpload() {
      let file = this.$refs.file.files[0];
      if (this.file.type() === 'image/jpeg') {
        this.thumbnail = file;
      }
      console.log(this.thumbnail)
    },
  },
}
</script>

<style>
/*.dz-details{*/
/*  background-color: rgba(0,0,0,0.31) !important;*/
/*}*/

/*.dz-error-message{*/
/*  background: linear-gradient(to bottom, rgba(0,0,0,0.31), rgba(81, 23, 23, 0.31)) !important;*/
/*}*/
</style>