require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue');

// import dependecies tambahan
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import Axios from 'axios';
import titleMixin from './mixins/titleMixins.js';
import VueSweetalert2 from 'vue-sweetalert2';
import vuetify from './plugins/vuetify.js';

import 'vue2-dropzone/dist/vue2Dropzone.min.css'

Vue.mixin(titleMixin);
Vue.use(VueRouter, VueAxios, Axios, VueSweetalert2);

import Index from './components/index.vue';
import UserLists from './components/user-lists.vue';
import userForm from './components/userForm.vue';
import overviewIncident from './components/incidentForm.vue'

// membuat router
const routes = [{
    name: 'home',
    path: '/',
    component: Index
}, {
    name: 'user',
    path: '/users-management',
    component: UserLists
}, {
    name: 'update-user',
    path: '/detail/user/:id',
    component: userForm,
}, {
    name: 'incident-overview',
    path: '/incident/overview',
    component: overviewIncident,
}]

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    scrollBehavior(to, from, savedPosition) {
        return {
            x: 0,
            y: 0
        }
    },
    linkActiveClass: 'mm-active'
});
new Vue(Vue.util.extend({
    router,
    vuetify
})).$mount("#App");