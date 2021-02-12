import * as types from './mutation-types'

export const fetchCategories = ({ commit, dispatch, state }, params) => {
  return new Promise((resolve, reject) => {
    window.axios
      .get(`/api/categories`, { params })
      .then((response) => {
        if (params) {
          commit(types.SET_CATEGORIES, response.data.data.categories)
        } else {
          commit(types.SET_CATEGORIES, response.data.data.categories.data)
        }
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const fetchCategory = ({ commit, dispatch, state }, id) => {
  return new Promise((resolve, reject) => {
    window.axios
      .get(`/api/categories/${id}`)
      .then((response) => {
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const addCategory = ({ commit, dispatch, state }, data) => {
  return new Promise((resolve, reject) => {
    window.axios
      .post('/api/categories', data)
      .then((response) => {
        commit(types.ADD_CATEGORY, response.data)
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const updateCategory = ({ commit, dispatch, state }, data) => {
  return new Promise((resolve, reject) => {
    console.log(data)
    window.axios
      .put(`/api/categories/${data.id}`, data)
      .then((response) => {
        if (response.data.success) {
          commit(types.UPDATE_CATEGORY, response.data)
        }
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const deleteCategory = ({ commit, dispatch, state }, id) => {
  return new Promise((resolve, reject) => {
    window.axios
      .delete(`/api/categories/${id}`)
      .then((response) => {
        commit(types.DELETE_CATEGORY, id)
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}
