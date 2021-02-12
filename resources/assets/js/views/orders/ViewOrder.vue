<template>
  <div>
    <sw-page-header title="View Order">
      <template v-slot:breadcrumbs>
        <sw-breadcrumb>
          <sw-breadcrumb-item title="Home" />
          <sw-breadcrumb-item title="View Order" to="/admin/order/view-order" />
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
          <sw-table-column label="Order name" show="name" />
          <sw-table-column label="Quantity" show="quantity" />
          <sw-table-column label="Price" show="price" />
          <sw-table-column label="Total" show="total" />
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
      return {
        data: response.data.data.order.order_items
      }
    },
    approveOrder() {
      this.approveStatus(this.$route.params.id)
      this.refreshTable()
      this.$router.push (
        `/admin/order`
      )
    },
    rejectOrder() {
      this.rejectStatus(this.$route.params.id)
      this.refreshTable()
      this.$router.push (
        `/admin/order`
      )
    }
  }
}
</script>