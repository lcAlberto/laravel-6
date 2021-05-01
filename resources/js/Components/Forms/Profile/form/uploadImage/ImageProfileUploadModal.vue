<template>
  <div>
    <!-- Modal -->
    <div class="modal fade" id="upload-modal" tabindex="-1" role="dialog" aria-labelledby="upload-modalTitle"
         aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" onclick="alert('oi')" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">


            <div class="example-avatar">
              <div v-show="$refs.upload && $refs.upload.dropActive" class="drop-active">
                <h3>Drop files to upload</h3>
              </div>
              <div class="avatar-upload" v-show="!edit">
                <div class="text-center p-2">
                  <label for="avatar">
                    <img :src="files.length ? files[0].url : 'https://www.gravatar.com/avatar/default?s=200&r=pg&d=mm'"
                         class="rounded-circle"/>
                    <h4 class="pt-2">or<br/>Drop files anywhere to upload</h4>
                  </label>
                </div>
                <div class="text-center p-2">
                  <file-upload
                    extensions="gif,jpg,jpeg,png,webp"
                    accept="image/png,image/gif,image/jpeg,image/webp"
                    name="avatar"
                    class="btn btn-primary"
                    post-action="/upload/post"
                    :drop="!edit"
                    v-model="files"
                    @input-filter="inputFilter"
                    @input-file="inputFile"
                    ref="upload">
                    Upload avatar
                  </file-upload>
                </div>
              </div>

              <div class="avatar-edit" v-show="files.length && edit">
                <div class="avatar-edit-image" v-if="files.length">
                  <img ref="editImage" :src="files[0].url"/>
                </div>
                <div class="text-center p-4">
                  <button type="button" class="btn btn-secondary" @click.prevent="$refs.upload.clear">Cancel</button>
                  <button type="submit" class="btn btn-primary" @click.prevent="editSave">Save</button>
                </div>
              </div>
              <div class="pt-5 source-code">
                Source code: <a
                href="https://github.com/lian-yue/vue-upload-component/blob/master/docs/views/examples/Avatar.vue">/docs/views/examples/Avatar.vue</a>
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import Cropper from 'cropperjs'
//https://vuejsexamples.com/a-little-image-uploader-component-for-vue/
//https://jsfiddle.net/chregu/5pLo13n6/
import FileUpload from 'vue-upload-component'

export default {
  name: "image-profile-upload-modal",

  data() {
    return {
      files: [],
      edit: false,
      cropper: false,
    }
  },
  watch: {
    edit(value) {
      if (value) {
        this.$nextTick(function () {
          if (!this.$refs.editImage) {
            return
          }
        })
      } else {
        console.log('tem nd')
      }
    }
  },
  methods: {
    editSave() {
      this.edit = false
      let oldFile = this.files[0]
      let binStr = atob(this.cropper.getCroppedCanvas().toDataURL(oldFile.type).split(',')[1])
      let arr = new Uint8Array(binStr.length)
      for (let i = 0; i < binStr.length; i++) {
        arr[i] = binStr.charCodeAt(i)
      }
      let file = new File([arr], oldFile.name, {type: oldFile.type})
      this.$refs.upload.update(oldFile.id, {
        file,
        type: file.type,
        size: file.size,
        active: true,
      })
    },
    alert(message) {
      alert(message)
    },
    inputFile(newFile, oldFile, prevent) {
      if (newFile && !oldFile) {
        this.$nextTick(function () {
          this.edit = true
        })
      }
      if (!newFile && oldFile) {
        this.edit = false
      }
    },
    inputFilter(newFile, oldFile, prevent) {
      if (newFile && !oldFile) {
        if (!/\.(gif|jpg|jpeg|png|webp)$/i.test(newFile.name)) {
          this.alert('Your choice is not a picture')
          return prevent()
        }
      }
      if (newFile && (!oldFile || newFile.file !== oldFile.file)) {
        newFile.url = ''
        let URL = window.URL || window.webkitURL
        if (URL && URL.createObjectURL) {
          newFile.url = URL.createObjectURL(newFile.file)
        }
      }
    },

    components: {
      FileUpload,
    },
  }
}
</script>

<style scoped>
.modal-content {
  z-index: 1000 !important;
}
</style>