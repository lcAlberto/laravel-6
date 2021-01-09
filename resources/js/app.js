require('./bootstrap');
window.Vue = require('vue');

import Snotify, { SnotifyPosition } from 'vue-snotify';
import Datepicker from 'vuejs-datepicker';

// Import and use Vue Froala lib.

Vue.use(Snotify, {
  toast: {
    timeout: 3000,
    showProgressBar: true,
    position: SnotifyPosition.rightTop
  }
});

import Vue from 'vue'
import VueMask from 'v-mask'
Vue.use(VueMask)
Vue.config.productionTip = false
require('./Components');

export default {
  // ...
  components: {
    Datepicker
  }
  // ...
}