/* Data list filters */
require('./DataListFilters');

/* Data lists */
Vue.component('data-list', require('./DataList.vue').default);

/* Breadcrumb */
Vue.component('breadcrumb', require('./Breadcrumb.vue').default);
Vue.component('breadcrumb-item', require('./BreadcrumbItem.vue').default);

/* Auxiliary */
Vue.component('select-box', require('./SelectBox.vue').default);
Vue.component('confirmable', require('./Confirmable.vue').default);
Vue.component('delete-button', require('./DeleteButton').default);
Vue.component('input-phone', require('./inputPhone').default);

/*LAYOUTS*/
Vue.component('layout-header', require('./Layouts/layoutHeader').default);

/* Forms */
Vue.component('register-form', require('./Forms/Auth/RegisterForm').default);

Vue.component('farm-form', require('./Forms/FarmForm').default);
Vue.component('user-form', require('./Forms/Users/UsersForm').default);

/*Extras*/
Vue.component('validate-password', require('./Forms/extras/ValidatePassword').default);

/* Main */
const app = new Vue(require('./App.vue').default);
