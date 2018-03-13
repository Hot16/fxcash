
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import ImagesIndex from './components/ImagesIndex.vue';
import ImagesStore from './components/ImagesStore.vue';
import ImagesDestroy from './components/ImagesDestroy.vue';


const routes = [
    {
        path: '/',
        components: {
            ImagesIndex: ImagesIndex
        }
    },
    {path: '/images/store', component: ImagesStore, name: 'ImagesStore'},
    {path: '/images/destroy', component: ImagesDestroy, name: 'ImagesDestroy'},
]

const router = new VueRouter({
    routes });

const app = new Vue({
    router
}).$mount('#app');
