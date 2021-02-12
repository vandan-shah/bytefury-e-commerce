<template>
    <div>
        <sw-page-header title="View Order">
            <template v-slot:breadcrumbs>
                <sw-breadcrumb>
                    <sw-breadcrumb-item title="Home" />
                    <sw-breadcrumb-item title="View Order" to="/admin/order/view-order" />
                    <!-- <sw-breadcrumb-item title="Items" active /> -->
                </sw-breadcrumb>
            </template>
            <template slot="actions">
                <sw-button @click="approveOrder()" class="mr-5" variant="primary">
                    Approve
                </sw-button>
                <sw-button @click="rejectOrder()" variant="danger">
                    Reject
                </sw-button>
            </template>
        </sw-page-header>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-1">
            <div>
                <h3 class="pt-6 sw-section-title">Orders</h3>
                <sw-table-component ref="table" :data="fetchOrderItem">
                    <!-- <sw-table-column label="Image">
                      <template slot-scope="row">
                        <img alt="image" :src="row.url" />
                      </template>
                    </sw-table-column>  -->
                    <sw-table-column label="Order name" show="name" />
                    <sw-table-column label="Quantity" show="quantity" />
                    <sw-table-column label="Price" show="price" />
                    <sw-table-column label="Total" show="total" />
                    <!-- <sw-table-column label="User" show="user.name" /> -->
                    <!-- <sw-table-column label="Action">
                        <template class="d-inline" slot-scope="row">
                            <sw-button variant="primary-outline" tag-name="router-link" :to="`/admin/order/${row.id}`">
                                <svg class="h-5 mr-1 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                 View
                            </sw-button>
                            <sw-button variant="danger" @click="onDelete(row.id)">
                                <svg class="h-5 mr-1 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg> 
                                Delete
                            </sw-button>        
                        </template>
                    </sw-table-column> -->
                </sw-table-component>
            </div>
        </div>
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex'

export default {
  data() {
    return {
      isRequestOnGoing: true,
      approveURL: `orders/{id}/approve`
    }
  },
  computed: {
    ...mapGetters('orders', ['orders'])
  },

  methods: {
    ...mapActions('orders', ['fetchOrder', 'approveStatus', 'rejectStatus']),
   async onDelete(id) {
      await this.deleteOrder(id)
      this.$refs.table.refresh()
    },

    refreshTable() {
      this.$refs.table.refresh()
    },

    async fetchOrderItem({ page, filter, sort }) {
      let data = {
        page
      }

      this.isRequestOnGoing = true
      let response = await this.fetchOrder(this.$route.params.id)
      this.isRequestOnGoing = false
      // console.log(response.data.data.order.order_items);
      return {
        data: response.data.data.order.order_items
      }
    },
    approveOrder() {
      this.approveStatus(this.$route.params.id)
    },
    rejectOrder() {
      this.rejectStatus(this.$route.params.id)
    }
  }
}
</script>