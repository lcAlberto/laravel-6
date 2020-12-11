require('./bootstrap');
window.Vue = require('vue');

import Snotify, { SnotifyPosition } from 'vue-snotify';
import Datepicker from 'vuejs-datepicker';
import 'froala-editor/js/plugins.pkgd.min.js';
import 'froala-editor/css/froala_editor.pkgd.min.css';

// Import and use Vue Froala lib.
import VueFroala from 'vue-froala-wysiwyg';

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
Vue.use(VueFroala)
Vue.config.productionTip = false
require('./Components');

export default {
  // ...
  components: {
    Datepicker
  }
  // ...
}