
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
import ImadesDestroy from './components/ImagesDestroy.vue';


const routes = [
    {
        path: '/',
        components: {
            ImadesIndex: ImagesIndex
        }
    },
    {path: '/store', component: ImagesStore, name: 'storeImages'},
    {path: '/destroy', component: ImadesDestroy, name: 'destroyImages'},
]

const router = new VueRouter({ routes });

const app = new Vue({
    router
}).$mount('#app');
