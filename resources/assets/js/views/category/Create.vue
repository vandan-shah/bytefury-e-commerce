<template>
    <div>
    <sw-card class="my-4">

        <template v-slot:header>
            <span class="sw-section-title">{{isEdit ? 'Edit' : 'Create'}} Category</span>
        </template>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
            <div class="col-span-4">

                <sw-input-group variant="horizontal" label="Category Name" class="my-10">
                    <sw-input v-model="formData.name" />
                </sw-input-group>

                <sw-input-group variant="horizontal" label="Description" class="my-10">
                    <sw-textarea v-model="formData.description" />
                </sw-input-group>

            </div>
        </div>

        <template v-slot:footer>
            <div class="flex justify-end">
                <sw-button variant="primary-outline" class="mr-2" tag-name="router-link" to="/admin/category">Cancel</sw-button>
                <sw-button variant="primary" @click.prevent="Save">
                    <svg class="h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z"></path>
                    </svg>
                    {{isEdit ? 'Update' : 'Save'}}
                </sw-button>
            </div>
        </template>

    </sw-card>
    </div>
</template>

<script>

import { mapActions } from 'vuex'

export default {
    data() {
        return {
            formData: {
                name: '',
                description: ''
            }
        }
    },
    computed: {
        // ...mapGetters('categories', ['categories']),
        isEdit() {
            // console.log(this.$route) 
            return this.$route.name === 'category.edit'
        }
    },
    mounted() {
        if (this.isEdit) {
            this.loadCategory()
            return true
        }
    },
    methods: {
        ...mapActions('categories', ['addCategory', 'updateCategory', 'fetchCategory']),
        async Save() {
            if (this.isEdit) {
                await this.updateCategory(this.formData) 
            } else {
                this.addCategory(this.formData)
            }
            this.$router.push (
                `/admin/category`
            )
        },
        async loadCategory() {
        let response = await this.fetchCategory(this.$route.params.id)
        this.formData = { ...this.formData, ...response.data.data.category }
        }
    }
}
</script>

/* // this.$store.dispatch('setCurrentCategory', { addCategory: this.addCategory })
            if (this.isEdit) {
          response = await this.updateCustomer(this.formData)
          if (response.data.success) {
            this.$router.push(
              `/admin/customers/${response.data.customer.id}/view`
            )
            window.toastr['success'](this.$t('customers.updated_message'))
          }
          if (response.data.error) {
            window.toastr['error'](this.$t('validation.email_already_taken'))
          }
        } else {
          response = await this.addCustomer(this.formData)
          if (response.data.success) {
            this.$router.push(
              `/admin/customers/${response.data.customer.id}/view`
            )
            window.toastr['success'](this.$t('customers.created_message'))
          }
        }
            // this.addCategory = []*/