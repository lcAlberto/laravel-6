<template>
  <div class="card shadow">
    <div class="row justify-content-center">
      <div class="col-lg-3 order-lg-2">
        <div class="card-profile-image">
          <a href="#">
            <img :src="imgUrl" class="rounded-circle">
          </a>
        </div>
      </div>
    </div>
    <div class="card-body mt-5 pt-0 pt-md-4">
      <div class="row">
        <div class="col">
          <div class="card-profile-stats d-flex justify-content-center mt-md-5">
            <div>
              <span class="heading">22</span>
              <span class="description">Animais Cadastrados</span>
            </div>
            <div>
              <span class="heading">10</span>
              <span class="description">Cios Cadastrados</span>
            </div>
            <div>
              <span class="heading">89</span>
              <span class="description">Tratamentos Pendentes</span>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <h3>
          {{ data.name }}<span class="font-weight-light"></span>
        </h3>
        <div class="h5">
          <span v-if="role" class="badge badge-primary">Adminstrador</span>
          <span v-else class="badge badge-info">Colaborador</span>
          <i class="ni location_pin mr-2"></i>
        </div>
        <div class="h4 mt-4">
          <i class="ni business_briefcase-24 mr-2"></i>{{ farm }}
        </div>
        <hr class="my-4" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
name: "UserThumbnailForm",
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
    },
    imgUrl:{
      type: String,
      required: false,
      default: 'http://localhost:8000/default.jpg',
    },
    role:{
      type: Boolean,
      default: false,
    },
    farm:{
      type: String,
      default: 'Não está alocado á nenhuma fazenda'
    }
  },
  data() {
    return {
      thumbnail: undefined,

      dropzoneOptions: {
        url: 'http://localhost:8000/admin/user',
        method: "post",
        uploadMultiple: false,
        maxFiles:1,
        acceptedFiles: 'image/png,image/gif,image/jpeg,image/webp',
        thumbnailWidth: 400,
        maxFilesize: 2,
        dictDefaultMessage: "<i class='fa fa-upload mr-2'></i>Clique aqui ou arraste sua foto aqui"
      }
    }
  },
  created() {
    this.setFormData();
    console.log(this.imgUrl)
  },
  methods: {
    setFormData() {
      if (this.data) {
        this.thumbnail = this.data.thumbnail;
      } else if (this.old) {
        this.thumbnail = this.old.thumbnail;
      }
    },

    hasErrors(field) {
      return this.errors[field] ? 'text-danger border border-danger' : '';
    },
  },
  components: {
    // vueDropzone: vue2Dropzone,
    // VueMask,
  },
}
</script>

<style scoped>
/*.dz-details{*/
/*  background-color: rgba(0,0,0,0.31) !important;*/
/*}*/

/*.dz-error-message{*/
/*  background: linear-gradient(to bottom, rgba(0,0,0,0.31), rgba(81, 23, 23, 0.31)) !important;*/
/*}*/
</style>