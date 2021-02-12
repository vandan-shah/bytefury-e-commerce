import Vue from 'vue'

// import HoverHover from './components/HoverHover.vue';
// Vue.component('hover-hover', HoverHover);

import Count from './components/Count.vue';
Vue.component('count', Count);

var app = new Vue({
   el: '#front'
});