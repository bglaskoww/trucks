
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

Vue.prototype.isLogged = isLogged;
// komponentite koito gi inicializiram (registriram) vuv vue-to
Vue.component('plowings', require('./components/Plowings.vue'));
Vue.component('plots', require('./components/Plots.vue'));
Vue.component('tractors', require('./components//Tractors.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    el: '#app'
});

$('div.alert').not('.alert-important').delay(3000).fadeOut(350);

$(function() {
    $(".datepicker").datepicker({
        onSelect: function() {
            this.dispatchEvent(new Event('input'));
        }
    });
});
