require('./bootstrap');
window.Vue = require('vue');

import Snotify, { SnotifyPosition } from 'vue-snotify';
import Datepicker from 'vuejs-datepicker';
import VueMask, {VueMaskDirective} from 'v-mask';
import Vue from 'vue';

require('./Components');

Vue.use(Snotify, {
  toast: {
    timeout: 3000,
    showProgressBar: true,
    position: SnotifyPosition.rightTop
  }
});

Vue.use(VueMask)
Vue.config.productionTip = false

export default {
  el: '#app',
  components: {
    Datepicker,
    Snotify,
  }
}