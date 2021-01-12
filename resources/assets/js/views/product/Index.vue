<template>
    <div>
        <sw-page-header title="Products">
            <template v-slot:breadcrumbs>
                <sw-breadcrumb>
                    <sw-breadcrumb-item title="Home" />
                    <sw-breadcrumb-item title="Products" to="/admin/product" />
                    <!-- <sw-breadcrumb-item title="Items" active /> -->
                </sw-breadcrumb>
            </template>
            <template slot="actions">
                <sw-button tag-name="router-link" to ="/admin/product/add-product" variant="primary">
                    Add New
                </sw-button>
            </template>
        </sw-page-header>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-1">
            <div>
                <h3 class="pt-6 sw-section-title">Products</h3>
                <sw-table-component ref="table" :data="fetchProduct">
                    <sw-table-column label="Product Name" show="name" />
                    <sw-table-column label="Description" show="description" />
                    <sw-table-column label="Category" show="id.name" />
                    <sw-table-column label="Price" show="price" />
                    <sw-table-column label="action">
                        <template class="d-inline" slot-scope="row">
                            <sw-button variant="primary-outline" tag-name="router-link" :to="`/admin/product/${row.id}/edit`">
                                <svg class="h-5 mr-1 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                 Edit
                            </sw-button>
                            <sw-button variant="danger" @click="onDelete(row.id)">
                                <svg class="h-5 mr-1 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg> 
                                Delete
                            </sw-button>        
                        </template>
                    </sw-table-column>
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
      isRequestOnGoing: true
    }
  },
  computed: {
    ...mapGetters('categories', ['categories']),
    ...mapGetters('products', ['products'])
  },

  methods: {
    ...mapActions('products', ['fetchProducts', 'deleteProduct']),
    ...mapActions('categories', ['fetchCategories']),
   async onDelete(id) {
      await this.deleteProduct(id)
      this.$refs.table.refresh()
    },

    refreshTable() {
      this.$refs.table.refresh()
    },

    async fetchProduct({ page, filter, sort }) {
      let data = {
        page
      }

      this.isRequestOnGoing = true
      let response = await this.fetchProducts(data)
      this.isRequestOnGoing = false

      return {
        data: response.data.data.products.data,
        pagination: {
          totalPages: response.data.data.products.last_page,
          currentPage: page
        }
      }
    }
  }
}
</script>