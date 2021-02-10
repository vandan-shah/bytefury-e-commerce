import * as types from './mutation-types'

export default {

  [types.SET_ORDERS](state, orders) {
    // console.log('mutation', orders);
    state.orders = orders
  },

  [types.SET_TOTAL_ORDERS](state, totalOrders) {
    state.totalOrders = totalOrders
  },

    [types.ADD_ORDER](state, data) {
      // console.log(data, "abcd")
    state.orders.push(data.order)
  },

  [types.UPDATE_ORDER](state, data) {
    console.log(data, 'data in mutation')
    let pos = state.orders.findIndex((ord) => ord.id === data.data.order.id)

    state.orders[pos] = data.order
  },

  [types.DELETE_ORDER](state, id) {
    let index = state.orders.findIndex((order) => order.id === id)
    state.orders.splice(index, 1)
  },
}
