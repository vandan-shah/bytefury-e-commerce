<template>
  <div>
    <sw-page-header title="Brands">
      <template v-slot:breadcrumbs>
        <sw-breadcrumb>
          <sw-breadcrumb-item title="Home" />
          <sw-breadcrumb-item title="Brands" to="/admin/brand" />
        </sw-breadcrumb>
      </template>
      <template slot="actions">
        <sw-button tag-name="router-link" to="/admin/brand/create" variant="primary">
          Add New
        </sw-button>
      </template>
    </sw-page-header>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-1">
      <div>
        <h3 class="pt-6 sw-section-title">Brands</h3>
        <sw-table-component ref="table" :data="fetchBrand">
          <sw-table-column label="Brand" show="name" />
          <sw-table-column label="Description" show="description" />
          <sw-table-column label="action">
            <template class="d-inline" slot-scope="row">
              <sw-button variant="primary-outline" tag-name="router-link" :to="`/admin/brand/${row.id}/edit`">
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
    ...mapGetters('brands', ['brands'])
  },

  methods: {
    ...mapActions('brands', ['fetchBrands', 'deleteBrand']),
   async onDelete(id) {
      await this.deleteBrand(id)
      this.$refs.table.refresh()
    },

    refreshTable() {
      this.$refs.table.refresh()
    },

    async fetchBrand({ page, filter, sort }) {
      let data = {
        page
      }

      this.isRequestOnGoing = true
      let response = await this.fetchBrands(data)
      this.isRequestOnGoing = false

      return {
        data: response.data.data.brands.data,
        pagination: {
          totalPages: response.data.data.brands.last_page,
          currentPage: page
        }
      }
    }
  }
}
</script>

<style scoped>

  .button {
    max-width: 40%;
  }

</style>