import * as types from './mutation-types'

export default {

  [types.SET_CATEGORIES](state, categories) {
    state.categories = categories
  },

    [types.ADD_CATEGORY](state, data) {
    state.categories.push(data.category)
  },

  [types.UPDATE_CATEGORY](state, data) {
    let pos = state.categories.findIndex((cat) => cat.id === data.data.category.id)
    state.categories[pos] = data.category
  },

  [types.DELETE_CATEGORY](state, id) {
    let index = state.categories.findIndex((category) => category.id === id)
    state.categories.splice(index, 1)
  },
}
