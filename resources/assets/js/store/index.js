import Vue from 'vue'
import Vuex from 'vuex'

import * as getters from './getters'
import mutations from './mutations'
import actions from './actions'

// import auth from './modules/auth'
import brands from './modules/brands'
import categories from './modules/categories'
import products from './modules/products'
// import posts from './modules/posts'
// import banner from './modules/banner'
// import dashboard from './modules/dashboard'
// import inquiries from './modules/inquiries'

Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,
    // state: initialState,
    getters,
    mutations,
    actions,

    modules: {
        // auth,
        brands,
        categories,
        // posts,
        products
        // banner,
        // dashboard,
        // inquiries
    }
})
