import * as types from './mutation-types'

// export const fetchOrders = ({ commit, dispatch, state }, params) => {
//   return new Promise((resolve, reject) => {
//     window.axios
//       .get(`/api/orders`, { params })
//       .then((response) => {
//         // console.log(response.data.data.orders.data, 'action');
//         commit(types.SET_ORDERS, response.data.data.orders.data)
//         // commit(types.SET_TOTAL_CATEGORIES, response.data.data.orders.total)
//         resolve(response)
//       })
//       .catch((err) => {
//         reject(err)
//       })
//   })
// }

export const fetchOrders = ({ commit, dispatch, state }, params) => {
  return new Promise((resolve, reject) => {
    // let params =params
    window.axios
      .get(`/api/orders`, { params })
      .then((response) => {
        // console.log(response.data.data.orders.data, 'action');
        commit(types.SET_ORDERS, response.data.data.orders.data)
        // commit(types.SET_TOTAL_CATEGORIES, response.data.data.orders.total)
        resolve(response)
      })
      .catch((err) => {
        reject(err)
      })
  })
}


// export const fetchOrders = ({ commit, dispatch, state }, data) => {
//   return new Promise((resolve, reject) => {
//     let params = data.params
//     window.axios
//       .get(`/api/orders`, {
//         params,
//       })
//       .then((response) => {
//         commit(types.SET_ORDERS, response.data.orders)
//         commit(types.SET_TOTAL_ORDERS, response.data.orders.total)
//         resolve(response)
//       })
//       .catch((err) => {
//         reject(err)
//       })
//   })
// }

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

// export const fetchOrderItem = ({ commit, dispatch, state }, id) => {
//   return new Promise((resolve, reject) => {
//     window.axios
//       .get(`/api/orders/${order}`)
//       .then((response) => {
//         resolve(response)
//         console.log(response)
//       })
//       .catch((err) => {
//         reject(err)
//       })
//   })
// }

// export const addOrder = ({ commit, dispatch, state }, pData) => {
//   return new Promise((resolve, reject) => {
//     // console.log(data, 'vandan')
//     window.axios
//       .post(`/api/orders`, pData)
//       .then((response) => {
//         console.log(response)
//         commit(types.ADD_ORDER, response.data)
//         resolve(response)
//         // console.log(response, 'vandan')
//       })
//       .catch((err) => {
//         reject(err)
//       })
//   })
// }

// export const updateOrder = ({ commit, dispatch, state }, {data, id}) => {
//   return new Promise((resolve, reject) => {
//     console.log({data, id}, 'vandan')
//     window.axios
//       .post(`/api/orders/${id}`, data)
//       .then((response) => {
//         if (response.data.success) {
//           commit(types.UPDATE_ORDER, response.data)
//           // console.log(response, 'response')
//         }
//         resolve(response)
//       })
//       .catch((err) => {
//         reject(err)
//       })
//   })
// }

// export const deleteOrder = ({ commit, dispatch, state }, id) => {
//   return new Promise((resolve, reject) => {
//     window.axios
//       .delete(`/api/orders/${id}`)
//       .then((response) => {
//         commit(types.DELETE_ORDER, id)
//         resolve(response)
//       })
//       .catch((err) => {
//         reject(err)
//       })
//   })
// }

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
