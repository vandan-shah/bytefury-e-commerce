import Vue from 'vue'
import Vuex from 'vuex'

import * as getters from './getters'
import mutations from './mutations'
import actions from './actions'

import brands from './modules/brands'
import categories from './modules/categories'
import products from './modules/products'
import orders from './modules/orders'

Vue.use(Vuex)

export default new Vuex.Store({
    strict: true,
    // state: initialState,
    getters,
    mutations,
    actions,

    modules: {
        brands,
        categories,
        products,
        orders
    }
})
