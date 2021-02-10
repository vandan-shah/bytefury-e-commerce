<template>
    <div>
        <sw-page-header title="Orders">
            <template v-slot:breadcrumbs>
                <sw-breadcrumb>
                    <sw-breadcrumb-item title="Home" />
                    <sw-breadcrumb-item title="Orders" to="/admin/order" />
                    <!-- <sw-breadcrumb-item title="Items" active /> -->
                </sw-breadcrumb>
            </template>
            <template slot="actions">
                <!-- <sw-button tag-name="router-link" to ="/admin/product/add-product" variant="primary">
                    Add New
                </sw-button> -->
            </template>
        </sw-page-header>

        <!-- <sw-card class="md:mt-5"> -->
      <!-- <template v-slot:header>
        <h3 class="sw-section-title">Orders</h3>
      </template> -->
      <!-- <sw-tabs :active-tab="activeTab" @update="setActiveTab"> -->
      <sw-tabs>
        <sw-tab-item title="Pending" :isActive="filters.status === 'pending'"
            @onSelect="getStatus('pending')" />
        <sw-tab-item title="Approved" :isActive="filters.status === 'Approved'"
            @onSelect="getStatus('Approved')" />
        <sw-tab-item title="Rejected" />
      </sw-tabs>

        <!-- <div class="grid grid-cols-1 gap-6 md:grid-cols-1">
            <div>
                <h3 class="pt-6 sw-section-title">Orders</h3> -->
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
                            <i class="fas fa-eye my-auto mr-5"></i>
                            View
                          </sw-dropdown-item>

                          <sw-dropdown-item>
                            <i class="fas fa-thumbs-up my-auto mr-5"></i>
                            Approve
                          </sw-dropdown-item>

                          <sw-dropdown-item>
                            <i class="fas fa-thumbs-down my-auto mr-5"></i>
                            Reject
                          </sw-dropdown-item>

                        </sw-dropdown>
                      </template>
                    </sw-table-column>
                </sw-table-component>
            </div>
        <!-- </div>
    </div> -->
</template>

<script>

import {mapGetters, mapActions} from 'vuex'

export default {
  data() {
    return {
      isRequestOnGoing: true,
      activeTab: 'Pending',
      allStatus: ['pending', 'Approved', 'Rejected'],
      filters: {
        status: ''
      }
    }
  },
  computed: {
    ...mapGetters('orders', ['orders'])
  },
  mounted(){
    this.fetchOrders()
  },
  methods: {
    ...mapActions('orders', ['fetchOrders', 'deleteOrder']),
   async onDelete(id) {
      await this.deleteOrder(id)
      this.$refs.table.refresh()
    },

    refreshTable() {
      this.$refs.table.refresh()
    },

    async fetchOrder({ page, filter, sort }) {
      let data = {
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
      console.log(data.title);
      switch(data.title) {
        case 'Approved': 
        // response.data.data.orders.data.filter((_o) => _o.status === 'Approved')
          this.orders.filter((_o) => _o.status === 'Approved')
          break
         
        case 'Rejected':
          this.orders.filter((_o) => _o.status === 'Rejected')
          break
        
        case 'Pending':
          this.orders.filter((_o) => _o.status === 'pending')
          break
      }
    }
  }
}
</script>