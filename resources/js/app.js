/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/Friend.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import {store} from './store';

Vue.component('post', require('./components/Post.vue').default);
Vue.component('search', require('./components/Search.vue').default);
Vue.component('init', require('./components/Init.vue').default);
Vue.component('feed', require('./components/Feed.vue').default);
Vue.component('friend', require('./components/Friend.vue').default);
Vue.component('unread', require('./components/UnreadNots.vue').default);
Vue.component('notification', require('./components/Notification.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
    store
});
