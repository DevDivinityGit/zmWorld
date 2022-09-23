window._ = require('lodash');


// try {
//     window.Popper = require('popper.js').default;
//     window.$ = window.jQuery = require('jquery');
//
//     require('bootstrap');
// } catch (e) {}
//
import "nprogress/nprogress.css";
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// window.axios.defaults.headers.post['X-Requested-With'] = 'XMLHttpRequest';


import NProgress from "nprogress";
window.NProgress = NProgress;
import { loadProgressBar } from 'x-axios-progress-bar'

loadProgressBar();
window.Vue = require('vue');
import VueRouter from 'vue-router';
window.VueRouter= VueRouter;
import Vuex from "vuex";
window.Vuex = Vuex;



window.APIURL = "http://127.0.0.1:8000";
window.ADMINURL = "/admin/dashboard";

function isAdmin(user) {
    if(user.role_id === 2) return true;
    return false;
}
window.isAdmin = isAdmin;

Vue.component('pagination', require('laravel-vue-pagination'));






import 'vue-toast-notification/dist/theme-sugar.css';


import VueToast from 'vue-toast-notification';
Vue.use(VueToast, {
    position: 'top',

});

window.VueToast = VueRouter;

window.BUS = new Vue();





