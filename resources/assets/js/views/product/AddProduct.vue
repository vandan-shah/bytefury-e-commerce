<template>
    <div>
    <sw-card class="my-4">

        <template v-slot:header>
            <span class="sw-section-title">{{isEdit ? 'Edit' : 'Add'}} Product</span>
        </template>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
            <div class="col-span-4">

                <!-- <sw-input-group variant="horizontal" label="Brand" class="my-10">
                    <sw-input
                    v-model="productData.brand" 
                    />
                </sw-input-group> -->

                <sw-input-group
                required
                variant="horizontal" 
                label="Name" 
                class="my-10"
                :error="errorProductname"
                >
                    <sw-input 
                    :invalid="$v.productData.name.$error"
                    v-model="productData.name"
                    @input="$v.productData.name.$touch()" 
                    />
                </sw-input-group>

                <sw-input-group
                required 
                variant="horizontal" 
                label="Description" 
                class="my-10"
                :error="errorDescription"
                >
                    <sw-textarea
                    :invalid="$v.productData.description.$error"
                    v-model="productData.description"
                    @input="$v.productData.description.$touch()" 
                    />
                </sw-input-group>

                 <sw-input-group 
                 required
                 variant="horizontal" 
                 label="Category" 
                 class="my-10"
                 :error="errorCategory"
                 >
                    <sw-select
                    :invalid="$v.productData.selectedCategory.$error"
                    v-model="productData.selectedCategory"
                    :options="categories"
                    :searchable="true"
                    placeholder="select a category"
                    label="name"
                    @input="$v.productData.selectedCategory.$touch()" 
                />
                </sw-input-group> 
                

                <sw-input-group
                required 
                variant="horizontal" 
                label="Price" 
                class="my-10"
                :error="errorPrice"
                >
                    <sw-input
                    :invalid="$v.productData.price.$error"
                    type="number" 
                    name="Price" 
                    v-model="productData.price"
                    @input="$v.productData.price.$touch()" 
                    >
                        <template v-slot:leftIcon>
                            <i class="fas fa-rupee-sign ml-3 mr-2"></i>
                        </template>
                    </sw-input>
                </sw-input-group>

                <input type="file" @change="onFileSelected" class="d-flex justify-content-end sw-section-title" variant="primary" />
                
                <sw-button variant="primary" class="d-flex" @click="onUpload">Upload</sw-button>

            </div>
        </div>

        <template v-slot:footer>
            <div class="flex justify-end">
                <sw-button variant="primary-outline" class="mr-2" tag-name="router-link" to="/admin/product">Cancel</sw-button>
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

import * as FormData from 'form-data'
import axios from 'axios'
import { mapGetters, mapActions } from 'vuex'
import Multiselect from 'vue-multiselect'
import { required, minLength, between } from 'vuelidate/lib/validators'

export default {
    data() {
        return {
            productData: {
                name: '',
                description: '',
                selectedCategory: null,
                price: ''
                // url: ''
            },
            
            selectedFile: null,

            options: [],
        }
    },
    validations: {
        productData: {
            name: {
                required,
                minLength: minLength(3)
            },
            description: {
                required,
                minLength: minLength(10)
            },
            selectedCategory: {
                required
            },
            price: {
                required,
                minLength: minLength(2)
            }
        }
    },
    computed: {
        ...mapGetters('categories', ['categories']),
        isEdit() { 
            return this.$route.name === 'product.edit'
        },
        errorProductname() {
            if (!this.$v.productData.name.$error) {
                return ''
            }
            if (!this.$v.productData.name.minLength) {
                return 'Product Name must be at least 3 characters long'
            } 
            if (!this.$v.productData.name.required) { 
                return 'Product Name is required'
            }
        },
        errorDescription() {
            if (!this.$v.productData.description.$error) {
                return ''
            }
            if (!this.$v.productData.description.minLength) {
                return 'Description must be at least 10 characters long'
            } 
            if (!this.$v.productData.description.required) { 
                return 'Description is required'
            }
        },
        errorCategory() {
            if (!this.$v.productData.selectedCategory.$error) {
                return ''
            }
            if (!this.$v.productData.selectedCategory.required) { 
                return 'Category required'
            }
        },
        errorPrice() {
            if (!this.$v.productData.price.$error) {
                return ''
            }
            if (!this.$v.productData.price.minLength) {
                return 'Price must be at least 2 characters long'
            } 
            if (!this.$v.productData.name.required) { 
                return 'Price is required'
            }
        }
    },
    created() {
        this.fetchCategories()
    },
    mounted() {
        if (this.isEdit) {
            this.loadProduct()
            return true
        }
    },
    methods: {
        ...mapActions('products', ['addProduct', 'updateProduct', 'fetchProduct']),
        ...mapActions('categories', ['fetchCategories']),
        onUpload() {
            // var formData = new FormData();
            // formData.append('image', this.selectedFile, this.selectedFile.name)
            // axios.post(`/api/products`, formData)
            // .then(response => {
            //     console.log(response)
            // })
        },
        async Save() {
            this.$v.productData.$touch()
            let validate = await this.touchCustomField
            if (this.$v.$invalid) {
                return true
            }

            if (this.isEdit) {
                await this.updateProduct(this.productData) 
            } else {
                this.addProduct(this.productData)
            }
            this.$router.push (
                `/admin/product`
            )
        },
        async loadProduct() {
        let response = await this.fetchProduct(this.$route.params.id)
        this.productData = { ...this.productData, ...response.data.data.product }
        },
        onFileSelected(event) {
            console.log(event)
            this.selectedFile = event.target.files[0]
        },
    }
}
</script>



<style scoped>

i {
    font-size: 13px;
}

</style>
