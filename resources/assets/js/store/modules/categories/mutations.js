import * as types from './mutation-types'

export default {

  [types.SET_CATEGORIES](state, categories) {
    // console.log('mutation', categories);
    state.categories = categories
  },

  [types.SET_TOTAL_CATEGORIES](state, totalCategories) {
    state.totalCategories = totalCategories
  },

    [types.ADD_CATEGORY](state, data) {
    state.categories.push(data.category)
  },

  [types.UPDATE_CATEGORY](state, data) {
    console.log(data, 'data in mutation')
    let pos = state.categories.findIndex((cat) => cat.id === data.data.category.id)

    state.categories[pos] = data.category
  },

  [types.DELETE_CATEGORY](state, id) {
    let index = state.categories.findIndex((category) => category.id === id)
    state.categories.splice(index, 1)
  },
}
