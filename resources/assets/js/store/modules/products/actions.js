import * as types from './mutation-types'

export const fetchProducts = ({ commit, dispatch, state }, params) => {
  return new Promise((resolve, reject) => {
    window.axios
      .get(`/api/products`, { params })
      .then((response) => {
        commit(types.SET_PRODUCTS, response.data.data.products.data)
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const fetchProduct = ({ commit, dispatch, state }, id) => {
  return new Promise((resolve, reject) => {
    window.axios
      .get(`/api/products/${id}`)
      .then((response) => {
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const addProduct = ({ commit, dispatch, state }, pData) => {
  return new Promise((resolve, reject) => {
    window.axios
      .post(`/api/products`, pData)
      .then((response) => {
        console.log(response)
        commit(types.ADD_PRODUCT, response.data)
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const updateProduct = ({ commit, dispatch, state }, {data, id}) => {
  return new Promise((resolve, reject) => {
    console.log({data, id}, 'vandan')
    window.axios
      .post(`/api/products/${id}`, data)
      .then((response) => {
        if (response.data.success) {
          commit(types.UPDATE_PRODUCT, response.data)
        }
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const deleteProduct = ({ commit, dispatch, state }, id) => {
  return new Promise((resolve, reject) => {
    window.axios
      .delete(`/api/products/${id}`)
      .then((response) => {
        commit(types.DELETE_PRODUCT, id)
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}
