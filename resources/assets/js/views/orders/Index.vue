<template>
  <div>
    <sw-page-header title="Orders">
      <template v-slot:breadcrumbs>
        <sw-breadcrumb>
          <sw-breadcrumb-item title="Home" />
          <sw-breadcrumb-item title="Orders" to="/admin/order" />
        </sw-breadcrumb>
      </template>
      <template slot="actions">
      </template>
    </sw-page-header>
    <sw-tabs @update="setActiveTab">
      <sw-tab-item title="Pending" filter="Pending" />
      <sw-tab-item title="Approved" filter="Approved" />
      <sw-tab-item title="Rejected" filter="Rejected" />
    </sw-tabs>
    <sw-table-component ref="table" :data="fetchOrder">
      <sw-table-column label="Order Code" show="order_code" />
      <sw-table-column label="Order Date" show="order_date" />
      <sw-table-column label="Total Amount" show="total" />
      <sw-table-column label="User" show="user.name" />
      <sw-table-column>
        <template slot-scope="row">
          <sw-dropdown>
            <div slot="activator">
              <i class="fas fa-ellipsis-h"></i>
            </div>
            <sw-dropdown-item tag-name="router-link" :to="`/admin/order/${row.id}`">
              <i class="fas fa-eye my-auto mr-5 text-blue-600"></i>
              View
            </sw-dropdown-item>
            <sw-dropdown-item @click="approveOrder(row.id)">
              <i class="fas fa-thumbs-up my-auto mr-5 text-green-600"></i>
              Approve
            </sw-dropdown-item>
            <sw-dropdown-item @click="rejectOrder(row.id)">
              <i class="fas fa-thumbs-down my-auto mr-5 text-red-600"></i>
              Reject
            </sw-dropdown-item>
          </sw-dropdown>
        </template>
      </sw-table-column>
    </sw-table-component>
  </div>
</template>


<script>
import {mapGetters, mapActions} from 'vuex'
export default {
  data() {
    return {
      isRequestOnGoing: true,
      filters: {
        status: 'Pending'
      }
    }
  },
  watch: {
    filters: {
      handler: 'setFilters',
      deep: true,
    },
  },

  computed: {
    ...mapGetters('orders', ['orders'])
    
  },
  methods: {
    ...mapActions('orders', ['fetchOrders', 'deleteOrder', 'approveStatus', 'rejectStatus']),
   async onDelete(id) {
      await this.deleteOrder(id)
      this.$refs.table.refresh()
    },
    refreshTable() {
      this.$refs.table.refresh()
    },
    async fetchOrder({ page, filter, sort }) {
      let data = {
        status: this.filters.status,
        page
      }
      this.isRequestOnGoing = true
      let response = await this.fetchOrders(data)
      this.isRequestOnGoing = false
      return {
        data: response.data.data.orders.data,
        pagination: {
          totalPages: response.data.data.orders.last_page,
          currentPage: page
        }
      }
    },

    getStatus(val) {
      this.filters.status = val
    },
    
    setActiveTab(data) {
      switch(data.title) {
        case 'Approved': 
        return this.filters.status = 'Approved'
          break
        case 'Rejected':
          return this.filters.status = 'Rejected'
          break
        case 'Pending':
          return this.filters.status = 'Pending'
          break
        default: 
          return  this.filters.status = ''
          break
      }
    },
    setFilters() {
      this.refreshTable()
    },
    approveOrder(id) {
      this.approveStatus(id)
      this.refreshTable()
      this.$router.push (
        `/admin/order`
      )
    },
    rejectOrder(id) {
      this.rejectStatus(id)
      this.refreshTable()
      this.$router.push (
        `/admin/order`
      )
    }
  }
}
</script>