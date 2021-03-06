
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('gridview', require('./components/Grid.vue'));
Vue.component('paginator', require('./components/Paginator.vue'));
Vue.component('tree', require('./components/Tree.vue'));
Vue.component('select-autocomplete', require('./components/SelectAutocomplete.vue'));
require('vue2-autocomplete-js/dist/style/vue2-autocomplete.css');
var app = new Vue({
    el: '#app'
});



