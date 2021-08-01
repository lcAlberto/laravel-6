<template>
  <div style="padding: 0">
    <div class="col-md-6 float-left" style="z-index: 100 !important">

      <div class="form-group">
        <label for="code" class="float-left">Código: </label>
        <div class="input-group" :class="hasErrors('code')">
          <div class="input-group-prepend">
          <span class="input-group-text">
            <i class="fa fa-bar-code"></i>
          </span>
          </div>
          <input
              type="number"
              name="code"
              class="form-control"
              id="code"
              placeholder="Código de Identificação"
              v-model="code">
        </div>
        <small
            class="badge badge-danger text-danger float-right mt-2"
            v-if="hasErrors('code')">
          Código válido com no máximo 20 caracteres
        </small>
      </div>

      <div class="form-group">
        <label for="name" class="float-left">Nome: </label>
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
              id="name"
              placeholder="Nome do animal"
              v-model="name">
        </div>
        <small
            class="badge badge-danger text-danger float-right mt-2"
            v-if="hasErrors('name')">
          Nome válido entre 5 e 255 caracteres
        </small>
      </div>

      <div class="form-group">
        <label for="born_date" class="float-left">Data de Nascimento:</label>
        <div class="input-group" :class="hasErrors('born_date')">
          <div class="input-group-prepend">
            <span class="input-group-text" id="">
              <i class="fa fa-calendar"></i>
            </span>
          </div>
          <datepiker
              name="born_date"
              class="form-control rounded-right"
              placeholder="Data de nascimento do animal"
              v-model="bornDate">
          </datepiker>
        </div>
        <small
            class="badge badge-danger text-danger float-right mt-2"
            v-if="hasErrors('born_date')">
          Data inválida!
        </small>
      </div>

      <div class="form-group">
        <label for="born_date" class="float-left">Raça:</label>
        <div class="input-group" :class="hasErrors('breed')">
          <multiselect
              v-model="breed"
              :searchable="true"
              :close-on-select="true"
              :show-labels="false"
              label="name"
              placeholder="Selecione uma Reça"
              :allow-empty="false"
              :options="breeds">
          </multiselect>
        </div>
        <small
            class="badge badge-danger text-danger float-right mt-2"
            v-if="hasErrors('breed')">
          Selecione uma raça!
        </small>
      </div>

      <div class="form-group mt-5 mb-5">
        <label class="float-left d-flex flex-row align-items-start">Sexo:</label>
        <div class="input-group justify-content-center" :class="hasErrors('sex')">

          <input type="radio" name="sex" v-model="sex"
                 id="female" value="female" required class="custom-radio m-1"
                 :class="hasErrors('sex')">
          <label for="female" class="mr-3"><i class="fa fa-venus"></i> Fêmea </label>

          <input type="radio" name="sex" v-model="sex"
                 id="male" value="male" required class="custom-radio m-1"
                 :class="hasErrors('sex')">
          <label for="male" class="mr-3"><i class="fa fa-mars"></i> Macho </label>

        </div>
        <small
            class="badge badge-danger text-danger float-right mt-2"
            v-if="hasErrors('sex')">
          Verifique o sexo!
        </small>
      </div>

    </div>

    <div class="col-md-6 float-right">

      <div class="form-group">
        <label for="born_date" class="float-left">Mãe:</label>
        <i class="fa fa-info-circle float-right"
           data-toggle="popover"
           data-trigger="hover"
           data-placement="top"
           data-content="title example"
           title="hey"></i>
        <div class="input-group" :class="hasErrors('mother_id')">
          <multiselect
              v-model="mother"
              :searchable="true"
              :close-on-select="true"
              :show-labels="false"
              label="name"
              placeholder="Mãe"
              :allow-empty="false"
              :options="mothers">
          </multiselect>
        </div>
        <small
            class="badge badge-danger text-danger float-right mt-2"
            v-if="hasErrors('mother_id')">
          Selecione a mãe!
        </small>
      </div>

      <div class="form-group">
        <label for="born_date" class="float-left">Pai:</label>
        <i class="fa fa-info-circle float-right"
           data-toggle="popover"
           data-trigger="hover"
           data-placement="top"
           data-content="title example"
           title="hey"></i>
        <div class="input-group" :class="hasErrors('father_id')">
          <multiselect
              v-model="father"
              :searchable="true"
              :close-on-select="true"
              :show-labels="false"
              label="name"
              placeholder="Pai"
              :allow-empty="false"
              :options="fathers">
          </multiselect>
        </div>
        <small
            class="badge badge-danger text-danger float-right mt-2"
            v-if="hasErrors('mother_id')">
          Selecione a mãe!
        </small>
      </div>

      <div class="form-group">
        <label for="born_date" class="float-left">Situação:</label>
        <i class="fa fa-info-circle float-right"
           data-toggle="popover"
           data-trigger="hover"
           data-placement="top"
           data-content="title example"
           title="hey"></i>
        <div class="input-group" :class="hasErrors('situation_status')">
          <multiselect
              v-model="animalSituation"
              :searchable="true"
              :close-on-select="true"
              :show-labels="false"
              label="name"
              placeholder="Como este animal está atualmente"
              :allow-empty="false"
              :options="situation">
          </multiselect>
        </div>
        <small
            class="badge badge-danger text-danger float-right mt-2"
            v-if="hasErrors('situation_status')">
          Selecione a situação!
        </small>
      </div>

      <div class="form-group">
        <label for="born_date" class="float-left">Produção:</label>
        <i class="fa fa-info-circle float-right"
           data-toggle="popover"
           data-trigger="hover"
           data-placement="top"
           data-content="title example"
           title="hey"></i>
        <div class="input-group" :class="hasErrors('situation_status')">
          <multiselect
              v-model="animalProduction"
              :searchable="true"
              :close-on-select="true"
              :show-labels="false"
              label="name"
              placeholder="Este animal está produzindo?"
              :allow-empty="false"
              :options="production">
          </multiselect>
        </div>
        <small
            class="badge badge-danger text-danger float-right mt-2"
            v-if="hasErrors('situation_status')">
          Selecione a situação!
        </small>
      </div>

      <div class="form-group">
        <label for="thumbnail" class="float-left">Imagem de perfil</label>
        <div class="input-group" :class="hasErrors('thumbnail')">
          <div class="input-group d-flex justify-content-center">
            <a href="#" data-toggle="modal"
               data-target="#upload-modal">
              <img
                  :src="thumbnail.path"
                  alt="animal-img"
                  id="imgUpload"
                  width="200" height="200"
                  class="img-thumbnail">
            </a>
            <label v-if="thumbnail && thumbnail.name">{{thumbnail.name}}</label>
            <upload-image-modal>
            </upload-image-modal>
            <input type="hidden" :value="thumbnail.path">
          </div>
        </div>
        <small
            class="badge badge-danger text-danger float-right mt-2"
            v-if="hasErrors('thumbnail')">
          Escolha um arquivo de imagem válido no formato jpg, jpeg, gif ou png
        </small>
      </div>
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import Datepiker from "../../Layouts/Datepiker";
import UploadImageModal from "../../Layouts/Image-upload/upload-image-modal";

export default {
  name: "AnimalForm",

  props: {
    // old: {type: Array, required: false},
    errors: {required: false},
    data: {required: false},
    mothers: {type: Array, required: true},
    fathers: {type: Array, required: true},
    situation: {type: Array, required: true},
    production: {type: Array, required: true},

    today: {required: false}
  },

  mounted() {
    this.getBreeds();

    this.$root.$on('uploaded-image', (selected) => {
      this.thumbnail.path = selected.path;
      this.thumbnail.name = selected.name;
    });


  },

  computed: {
    animalProduction() {
      return this.production;
    },

    animalSituation() {
      return this.situation;
    },
  },

  data() {
    return {
      code: '',
      name: '',
      sex: undefined,
      bornDate: undefined,
      mother: '',
      father: '',
      breed: [],//
      breeds: [],//
      thumbnail: {
        name: '',
        path: 'http://localhost:8000/img/cow-default.png'
      },
    }
  },

  methods: {
    hasErrors(field) {
      return this.errors.field ? 'has-error' : '';
    },

    setData() {
      if (this.data) {
        this.code = this.data.code;
        this.name = this.data.name;
        this.sex = this.data.sex;
        this.bornDate = this.data.bornDate;
        this.mother = this.data.mother;
        this.father = this.data.father;
        this.breed = this.data.breed;
        this.thumbnail = this.data.thumbnail;
      }
    },

    getBreeds() {
      axios.get('/get-breeds/')
          .then((response) => {
            if (response.statusText === "OK") {
              this.breeds = response.data
            }
          }).catch((error) => {
        console.log(error)
      })
    },

    /*
    setProduction() {
      let filtredProductionData = [];
      if (this.sex === 'female') {
        filtredProductionData = this.productionData.filter((element, index, array) => {
          array.indexOf(element);
          if (element.value === 'bull-castrated') {
            array.splice(index, 1);
          }
          if (element.value === 'bull-reproductive') {
            array.splice(index, 1);
          }
          if (element.value === 'bull-ruffian') {
            array.splice(index, 1);
          }
        })

      } else if (this.sex === 'male') {
        filtredProductionData = this.productionData.filter((element, index, array) => {
          array.indexOf(element);
          if (element.value === 'lactating') {
            array.splice(index, 1);
          }
          if (element.value === 'non lactating') {
            array.splice(index, 1);
          }
          if (element.value === 'pregnant') {
            array.splice(index, 1);
          }
          if (element.value === 'dry') {
            array.splice(index, 1);
          }
        })
      }
      console.log(this.productionData);
      // return this.productionData;
    },*/
  },
  components: {
    UploadImageModal,
    Multiselect, Datepiker
  },
}
</script>

<style scoped>
.modal-content {
  z-index: 1000 !important;
}
</style>