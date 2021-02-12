import * as types from './mutation-types'

export default {

  [types.SET_ORDERS](state, orders) {
    state.orders = orders
  }
}
