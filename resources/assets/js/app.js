/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import Vuelidate from 'vuelidate'
import utils from './helpers/utilities'
import router from './router.js'
import store from './store/index'

////////////inline template////////////////////

// import HoverHover from './views/category/HoverHover.vue'

// Vue.component('hover-hover', HoverHover)







Vue.use(Vuelidate)

require('./bootstrap')

window.Vue.prototype.$utils = utils

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.hub = new Vue()

new Vue({
  router,
  store
}).$mount('#app')
