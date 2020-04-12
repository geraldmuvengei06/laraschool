
require('./bootstrap');

import Vue from 'vue'
window.Vue = require('vue');

import VueRoute from 'vue-router';
Vue.use(VueRoute);

import vuetify from './plugins/vuetify.js'

import Axios from 'axios'
import VueAxios from 'axios'

Vue.use({Axios, VueAxios});

// import { Form, HasError, AlertError } from 'vform'
// Vue.use(Form)
// Vue.component(HasError.name, HasError)
// Vue.component(AlertError.name, AlertError)

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home-component', require('./components/Home.vue').default);
Vue.component('welcome-component', require('./components/Welcome.vue').default);

import router from "./router/router";

const app = new Vue({
    vuetify,
    el: '#app',
    router
});
