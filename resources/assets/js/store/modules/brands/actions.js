import * as types from './mutation-types'

export const fetchBrands = ({ commit, dispatch, state }, params) => {
  return new Promise((resolve, reject) => {
    window.axios
      .get(`/api/brand`, { params })
      .then((response) => {
        if (params.limit !== 'all') {
          commit(types.SET_BRANDS, response.data.data.Brand.data)
        } else {
          commit(types.SET_BRANDS, response.data.data.Brand)
        }
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const fetchBrand = ({ commit, dispatch, state }, id) => {
  return new Promise((resolve, reject) => {
    window.axios
      .get(`/api/brand/${id}`)
      .then((response) => {
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const addBrand = ({ commit, dispatch, state }, data) => {
  return new Promise((resolve, reject) => {
    window.axios
      .post('/api/brand', data)
      .then((response) => {
        commit(types.ADD_BRAND, response.data)
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const updateBrand = ({ commit, dispatch, state }, data) => {
  return new Promise((resolve, reject) => {
    window.axios
      .put(`/api/brand/${data.id}`, data)
      .then((response) => {
        if (response.data.success) {
          commit(types.UPDATE_BRAND, response.data)
        }
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const deleteBrand = ({ commit, dispatch, state }, id) => {
  return new Promise((resolve, reject) => {
    window.axios
      .delete(`/api/brand/${id}`)
      .then((response) => {
        commit(types.DELETE_BRAND, id)
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}
