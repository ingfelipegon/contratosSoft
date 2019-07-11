/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuetify from 'vuetify';
import VueAlertify from "vue-alertify";
import Vue2Filters from 'vue2-filters';
import VeeValidate from 'vee-validate';
import moment from 'moment';
// import store from './store'
// import * as actions from './store/action-types'
// import * as mutations from './store/mutation-types'
//
// import { mapGetters } from 'vuex'
// import withSnackbar from './components/mixins/withSnackbar'
import myMixins from './mixins.js';



Vue.mixin(myMixins);

import 'vuetify/dist/vuetify.min.css';

import router from './router'
import Auth from './Auth'

if(window.user)
{Vue.prototype.$auth= new Auth(window.user)}
else {
  Vue.prototype.$auth=null;
}
Vue.prototype.moment = moment
 moment.locale('es');

//console.log(Vue.prototype.$auth);

Vue.use(Vuetify)
Vue.use(VueAlertify)
Vue.use(Vue2Filters)
Vue.use(VeeValidate);





/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('Home', require('./home.vue').default)
Vue.component('Publico', require('./publico.vue').default)
// Vue.component('Publico', require('./components/Publico.vue').default)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
    router
});

Vue.use(Vuetify, {
  theme: {
    primary: '#3f51b5',
    secondary: '#b0bec5',
    accent: '#8c9eff',
    error: '#b71c1c'
  }
})
