import * as types from './mutation-types'

export const fetchBrands = ({ commit, dispatch, state }, params) => {
  return new Promise((resolve, reject) => {
    window.axios
      .get(`/api/brands`, { params })
      .then((response) => {
        // console.log(response.data.data.brands.data, 'action');
        commit(types.SET_BRANDS, response.data.data.brands.data)
        // commit(types.SET_TOTAL_BRANDS, response.data.data.brands.total)
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
      .get(`/api/brands/${id}`)
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
      .post('/api/brands', data)
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
    console.log(data)
    window.axios
      .put(`/api/brands/${data.id}`, data)
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
      .delete(`/api/brands/${id}`)
      .then((response) => {
        commit(types.DELETE_BRAND, id)
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}
