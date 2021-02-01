<template>
    <div>
    <sw-card class="my-4">

        <template v-slot:header>
            <span class="sw-section-title">{{isEdit ? 'Edit' : 'Create'}} Brand</span>
        </template>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
            <div class="col-span-4">

                <sw-input-group 
                required 
                variant="horizontal" 
                label="Brand Name" 
                class="my-10"
                :error="errorUsername"
                >
                    <sw-input 
                    :invalid="$v.brandData.name.$error"
                    v-model="brandData.name"
                    @input="$v.brandData.name.$touch()" 
                    />
                </sw-input-group>

                <!-- <sw-input-group
                required
                variant="horizontal" 
                label="Description" 
                class="my-10"
                :error="errorDescription"
                >
                    <sw-textarea 
                    :invalid="$v.formData.description.$error"
                    v-model="formData.description"
                    @input="$v.formData.description.$touch()" 
                    />
                </sw-input-group> -->

            </div>
        </div>

        <template v-slot:footer>
            <div class="flex justify-end">
                <sw-button variant="primary-outline" class="mr-2" tag-name="router-link" to="/admin/brand">Cancel</sw-button>
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
import { required, minLength, between } from 'vuelidate/lib/validators'

export default {
    data() {
        return {
            brandData: {
                name: ''
                // description: ''
            }
        }
    },
    validations: {
        brandData: {
            name: {
                required,
                minLength: minLength(1)
            }
            // description: {
            //     required,
            //     minLength: minLength(10)
            // }
        }
    },
    computed: {
        isEdit() { 
            return this.$route.name === 'brand.edit'
        },
        errorUsername() {
            if (!this.$v.brandData.name.$error) {
                return ''
            }
            if (!this.$v.brandData.name.minLength) {
                return 'Brand Name must be at least 1 characters long'
            } 
            if (!this.$v.brandData.name.required) { 
                return 'Brand Name is required'
            }
        }
        // errorDescription() {
        //     if (!this.$v.formData.description.$error) {
        //         return ''
        //     }
        //     if (!this.$v.formData.description.minLength) {
        //         return 'Description must be at least 10 characters long'
        //     } 
        //     if (!this.$v.formData.description.required) { 
        //         return 'Description is required'
        //     }
        // }
    },
    mounted() {
        if (this.isEdit) {
            this.loadBrand()
            return true
        }
    },
    methods: {
        ...mapActions('brands', ['addBrand', 'updateBrand', 'fetchBrand']),
        async Save() {
            this.$v.brandData.$touch()
            let validate = await this.touchCustomField
            if (this.$v.$invalid) {
                return true
            }
            if (this.isEdit) {
                await this.updateBrand(this.brandData) 
            } else {
                this.addBrand(this.brandData)
            }
            this.$router.push (
                `/admin/brand`
            )
        },
        async loadBrand() {
        let response = await this.fetchBrand(this.$route.params.id)
        this.brandData = { ...this.brandData, ...response.data.data.Brand }
        }
    }
}
</script>