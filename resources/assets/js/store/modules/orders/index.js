import mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

const initialState = {
    orders: [],
    totalOrders: 0
}

export default {
  namespaced: true,

  state: initialState,

  getters: getters,

  actions: actions,

  mutations: mutations,
}
