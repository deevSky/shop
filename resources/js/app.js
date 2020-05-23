require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import {routes} from "./routes";
// Vue.component('home', require('./components/admin/AdminHome').default);
Vue.component('admin-master', require('./components/admin/AdminMaster').default);

import { Form, HasError, AlertError } from 'vform';


Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

window.Form =Form;

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

const router = new VueRouter({
    routes,
    mode: 'history'
});

const app = new Vue({
    el: '#app',
    router
});
