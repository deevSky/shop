require('./bootstrap');
window.Vue = require('vue');

// Vuex
import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);


import storeData from './store/index';
const store =  new Vuex.Store(
    storeData
    );

// vue-router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import {routes} from "./routes";
// Vue.component('home', require('./components/admin/AdminHome').default);
Vue.component('admin-master', require('./components/admin/AdminMaster').default);
Vue.component('public-master', require('./components/public/PublicMaster').default);

//v-form
import { Form, HasError, AlertError } from 'vform';


Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

window.Form =Form;

//filters

 import {filter} from './filter';


//sweet alert
import Swal from 'sweetalert2';
window.Swal= Swal;

const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
});


window.toast = toast;

//editor
import 'v-markdown-editor/dist/v-markdown-editor.css';
import Editor from 'v-markdown-editor';
Vue.use(Editor);


//image
import UploadImage from 'vue-upload-image';

const router = new VueRouter({
    routes,
    mode: 'history'
});

const app = new Vue({
    el: '#app',
    router,
    store,
    UploadImage
});
