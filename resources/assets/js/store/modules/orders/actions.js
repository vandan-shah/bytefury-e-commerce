import * as types from './mutation-types'

export const fetchOrders = ({ commit, dispatch, state }, params) => {
  return new Promise((resolve, reject) => {
    window.axios
      .get(`/api/orders`, { params })
      .then((response) => {
        commit(types.SET_ORDERS, response.data.data.orders.data)
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const fetchOrder = ({ commit, dispatch, state }, id) => {
  return new Promise((resolve, reject) => {
    window.axios
      .get(`/api/orders/${id}`)
      .then((response) => {
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const approveStatus = ({ commit, dispatch, state }, id) => {
  return new Promise((resolve, reject) => {
    window.axios
      .post(`/api/orders/${id}/approve`)
      .then((response) => {
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}

export const rejectStatus = ({ commit, dispatch, state }, id) => {
  return new Promise((resolve, reject) => {
    window.axios
      .post(`/api/orders/${id}/reject`)
      .then((response) => {
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}
