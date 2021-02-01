import * as types from './mutation-types'

export default {

  [types.SET_BRANDS](state, brands) {
    // console.log('mutation', brands);
    state.brands = brands
  },

  [types.SET_TOTAL_BRANDS](state, totalBrands) {
    state.totalBrands = totalBrands
  },

    [types.ADD_BRAND](state, data) {
    state.brands.push(data.brand)
  },

  [types.UPDATE_BRAND](state, data) {
    console.log(data, 'data in mutation')
    let pos = state.brands.findIndex((brand) => brand.id === data.data.Brand.id)

    state.brands[pos] = data.brand
  },

  [types.DELETE_BRAND](state, id) {
    let index = state.brands.findIndex((brand) => brand.id === id)
    state.brands.splice(index, 1)
  },
}
