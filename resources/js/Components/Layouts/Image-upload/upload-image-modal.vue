<template>
  <div>
    <div class="modal fade" id="upload-modal" tabindex="-1" role="dialog" aria-labelledby="upload-modalTitle"
         aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            Carregar imagem
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div v-if="failResponse" class="alert alert-danger">
              Erro ao carregar a imagem
            </div>

            <div id="my-strictly-unique-vue-upload-multiple-image" style="display: flex; justify-content: center;">
              <vue-upload-multiple-image
                  v-if="!enableCrop"
                  @upload-success="uploadImageSuccess"
                  @before-remove="beforeRemove"
                  @edit-image="editImage"
                  :data-images="dataImage"
                  dragText="Arraste aqui a imagem"
                  popupText="popupText"
                  browseText="ou carregue ela do seu computador"
                  dropText="Remover imagem"
                  accept="image/gif,image/jpeg,image/png,image/bmp,image/jpg"
                  idUpload="myIdUpload"
                  editUpload="myIdEdit"
                  :multiple="false"
                  :showPrimary="false"
                  :showAdd="false">
              </vue-upload-multiple-image>
              <cropper
                  v-if="enableCrop"
                  ref="cropper"
                  class="cropper"
                  :src="thumbnail.path"
                  :stencil-props="{
                    aspectRatio: 30/30
                   }"
                  @change="cropedImage"
              />

            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" @click="submitForm()" class="btn btn-primary">
              <i class="fa fa-check mr-2"></i> Enviar
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import VueUploadMultipleImage from 'vue-upload-multiple-image'
import { Cropper } from 'vue-advanced-cropper'

export default {
  name: "upload-image-modal",

  props: {
    data: {
      required: false,
    },
  },

  data() {
    return {
      dataImage: [],
      thumbnail: '',
      failResponse: false,

      enableCrop: false,
      cropedThumbnail: undefined,
    }
  },

  mounted() {
    $('#upload-modal').appendTo('body');
  },

  methods: {
    uploadImageSuccess(formData, index, fileList) {
      this.thumbnail = fileList[0]
    },
    beforeRemove(index, done, fileList) {
      var r = confirm("Deseja mesmo remover a imagem?")
      if (r)
        done()
    },
    editImage(formData, index, fileList) {
      this.thumbnail = fileList[0].path
    },

    cropedImage({ coordinates, canvas}) {
      this.cropedThumbnail = this.$refs.cropper.getResult();
    },

    cropedSuccess() {
      this.thumbnail.path = this.cropedThumbnail.image.src;
      this.enableCrop = false;
      this.submitForm();
    },

    submitForm() {
      this.$root.$emit('uploaded-image', this.thumbnail);
      $('#upload-modal').modal('hide');
    },
  },

  components: {
    VueUploadMultipleImage, Cropper
  },
}
</script>

<style scoped>
@import '~vue-advanced-cropper/dist/style.css';
</style>