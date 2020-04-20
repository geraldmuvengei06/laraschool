
require('./bootstrap');

import Vue from 'vue'
window.Vue = require('vue');

import VueRoute from 'vue-router';
Vue.use(VueRoute);

import vuetify from './plugins/vuetify.js'

// Requests and responses

import Axios from 'axios'
import VueAxios from 'axios'

Vue.use({Axios, VueAxios});

import { Form, HasError, AlertError } from 'vform'
window.Form = Form
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// transition

import VuePageTransition from 'vue-page-transition'

Vue.use(VuePageTransition)

// Progress
import NProgress from 'nprogress'
NProgress.configure({
    // easing: 'ease',
    // speed: 500,
    showSpinner: true,

})
window.NProgress = NProgress

// state management
import { store } from "./store/store"

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home-component', require('./components/Home.vue').default);
Vue.component('welcome-component', require('./components/Welcome.vue').default);

// template components

Vue.component('snackbar-component', require('./components/partials/snackbar.vue').default);


// Event handling

window.Fire = new Vue

import router from "./router/router";

const app = new Vue({
    store,
    vuetify,
    el: '#app',
    router
});
