<template>
  <div>
    <div class="form-group">
      <label for="farmName" class="float-left">Nome: </label>
      <small v-if="errors.name" class="float-right badge badge-danger ml-2">{{ errors.name }}</small>
      <input
        type="text"
        name="name"
        id="farmName"
        v-model="name"
        class="form-control"
        :class="hasErrors('name')"
        placeholder="Nome da fazenda">
    </div>

    <div class="form-group">
      <label for="farmCep" class="float-left">CEP:</label>
      <small v-if="errors.cep" class="float-right badge badge-danger ml-2">{{ errors.cep }}</small>
      <input
        type="text"
        name="cep"
        id="farmCep"
        v-model="cep"
        @keyup="searchCep()"
        class="form-control"
        v-mask="'#####-###'"
        :class="hasErrors('cep')"
        placeholder="Digite o CEP">
    </div>

    <div class="form-group">
      <label for="farmCity" class="float-left">Cidade:</label>
      <small v-if="errors.city" class="float-right badge badge-danger ml-2">{{ errors.city }}</small>
      <input
        type="text"
        name="city"
        id="farmCity"
        v-model="city"
        class="form-control"
        :class="hasErrors('cep')"
        placeholder="Cidade">
    </div>

    <div class="form-group">
      <label for="farmState" class="float-left">Estado:</label>
      <small v-if="errors.state_id" class="float-right badge badge-danger ml-2">{{ errors.state_id }}</small>
      <br>
      <multiselect
        v-model="state"
        :searchable="true"
        :close-on-select="true"
        :show-labels="true"
        label="name"
        placeholder="Selecione um Estado"
        :allow-empty="false"
        :options="states">
      </multiselect>
      <input type="hidden" :value="stateId" name="state_id">
    </div>
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

Vue.component('multiselect', Multiselect)

export default {
  name: "FarmForm", props: {
    old: {
      type: Array,
      required: false,

    },
    errors: {
      required: false,
    },
    states: {
      type: Array,
      required: false,
    }
  },

  data() {
    return {
      name: undefined,
      cep: undefined,
      state: undefined,
      stateId: undefined,
      city: undefined,
    }
  },
  created() {
    this.setFormData();
  },

  methods: {
    searchCep() {
      if ((this.cep) && (this.cep.length >= 9)) {
        axios.get(`https://viacep.com.br/ws/${this.cep}/json/`)
          .then((response) => {
            if (response.statusText === "OK") {
              this.cep = response.data.cep
              this.city = response.data.localidade

              if (response.data.uf) {
                this.state = this.states.find((item) => item.abbr === response.data.uf)
                this.stateId = this.state.id;
              }
            }
          }).catch((error) => {
          console.log('CEP não encontrado!')
        })
      }
    },

    setFormData() {
      if (this.old) {
        this.name = this.old.name;
        this.state = this.old.state;
        this.city = this.old.city;
        this.cep = this.old.cep;
      }
    },

    hasErrors(field) {
      return this.errors.field ? 'has-error' : '';
    },
  },
  components: {
    Multiselect
  },
}
</script>

<style>
@import "~vue-multiselect/dist/vue-multiselect.min.css";
.multiselect__option--highlight:after{
  background: #5e72e4 !important;
}
.multiselect__option--highlight{
  background: linear-gradient(87deg, #5e72e4 0, #825ee4 100%) !important;
}
</style>
