//window.Vue = require('vue');
import Vue from 'vue'
import FullCalendar from 'vue-full-calendar'
Vue.use(FullCalendar)

Vue.component('home-component', require('./Home.vue'));


new Vue({
    el: '#vueApp'
});