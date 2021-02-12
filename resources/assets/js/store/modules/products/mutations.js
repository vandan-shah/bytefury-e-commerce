import * as types from './mutation-types'

export default {

  [types.SET_PRODUCTS](state, products) {
    state.products = products
  },

    [types.ADD_PRODUCT](state, data) {
    state.products.push(data.product)
  },

  [types.UPDATE_PRODUCT](state, data) {
    console.log(data, 'data in mutation')
    let pos = state.products.findIndex((pro) => pro.id === data.data.product.id)
    state.products[pos] = data.product
  },

  [types.DELETE_PRODUCT](state, id) {
    let index = state.products.findIndex((product) => product.id === id)
    state.products.splice(index, 1)
  },
}
