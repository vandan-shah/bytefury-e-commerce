<template>
  <div>
    <sw-card class="my-4">
      <template v-slot:header>
        <span class="sw-section-title"
          >{{ isEdit ? 'Edit' : 'Add' }} Product</span
        >
      </template>
      <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
        <div class="col-span-4">
          <sw-input-group
            required
            variant="horizontal"
            label="Brand"
            class="my-10"
            :error="errorBrand"
          >
            <sw-select
              :invalid="$v.selectedBrand.$error"
              v-model="selectedBrand"
              :options="brands"
              :searchable="true"
              placeholder="select a Brand"
              label="name"
              @input="$v.selectedBrand.$touch()"
            />
          </sw-input-group>
          
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
              :invalid="$v.selectedCategory.$error"
              v-model="selectedCategory"
              :options="categories"
              :searchable="true"
              placeholder="select a Category"
              label="name"
              @input="$v.selectedCategory.$touch()"
            />
          </sw-input-group>
          <!-- label="name" -->
          <!-- v-for="(pn, index) in productData.name" :key="index" -->
          <!-- <a
            v-show="active" 
            v-for="(category, index) in categories" :key="index"
          >{{ category.name }}<br></a>
          <div @click="mouseOver">dCategories</div> -->
          <!-- <a
            v-show="active" 
            v-model="selectedCategory"
            label="name"
            @mouseover="mouseOver"
            >categories</a
          > -->
          
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
                <i class="ml-3 mr-2 fas fa-rupee-sign"></i>
              </template>
            </sw-input>
          </sw-input-group>
          <input
            type="file"
            @change="onFileSelected"
            class="d-flex justify-content-end sw-section-title"
            variant="primary"
          />
        </div>
      </div>
      <template v-slot:footer>
        <div class="flex justify-end">
          <sw-button
            variant="primary-outline"
            class="mr-2"
            tag-name="router-link"
            to="/admin/product"
            >Cancel</sw-button
          >
          <sw-button variant="primary" @click.prevent="Save">
            <svg
              class="h-5 mr-1 -ml-1"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z"
              ></path>
            </svg>
            {{ isEdit ? 'Update' : 'Save' }}
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
        brand_id: '',
        name: '',
        description: '',
        category_id: '',
        price: '',
      },
      selectedCategory: null,
      selectedBrand: null,
      selectedFile: null,
    }
  },
  validations: {
    selectedBrand: {
      required,
    },
    selectedCategory: {
      required,
    },
    productData: {
      name: {
        required,
        minLength: minLength(3),
      },
      description: {
        required,
        minLength: minLength(10),
      },
      price: {
        required,
        minLength: minLength(2),
      },
    },
  },
  computed: {
    ...mapGetters('categories', ['categories']),
    ...mapGetters('brands', ['brands']),
    isEdit() {
      return this.$route.name === 'product.edit'
    },
    errorBrand() {
      if (!this.$v.selectedBrand.$error) {
        return ''
      }
      if (!this.$v.selectedBrand.required) {
        return 'Brand required'
      }
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
      if (!this.$v.selectedCategory.$error) {
        return ''
      }
      if (!this.$v.selectedCategory.required) {
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
      if (!this.$v.productData.price.required) {
        return 'Price is required'
      }
    },
  },
  created() {
    this.fetchCategories({
      limit: 'all',
    }),
    this.fetchBrands({
      limit: 'all',
    })
  },
  mounted() {
    if (this.isEdit) {
      this.loadProduct()
      return true
    }
  },
  watch: {},
  methods: {
    ...mapActions('products', ['addProduct', 'updateProduct', 'fetchProduct']),
    ...mapActions('categories', ['fetchCategories']),
    ...mapActions('brands', ['fetchBrands']),
    async Save() {
      this.$v.$touch()
      if (this.$v.$invalid) {
        return true
      }
      let pData = new FormData()
      pData.append('brand_id', this.selectedBrand.id)
      pData.append('name', this.productData.name)
      pData.append('description', this.productData.description)
      pData.append('category_id', this.selectedCategory.id)
      pData.append('price', this.productData.price)
      pData.append('url', this.selectedFile)
      // pData.append('_method', 'PUT')
      if (this.isEdit) {
        pData.append('_method', 'PUT')
        await this.updateProduct({
          id: this.$route.params.id,
          data: pData,
        })
      } else {
        pData.append('_method', 'POST')
        this.addProduct(pData)
      }
      this.$router.push(`/admin/product`)
    },
    async loadProduct() {
      let response = await this.fetchProduct(this.$route.params.id)
      this.productData = { ...this.productData, ...response.data.data.product }
      this.selectedBrand = response.data.data.product.brand
      this.selectedCategory = response.data.data.product.category
    },
    onFileSelected(event) {
      // console.log(event)
      this.selectedFile = event.target.files[0]
    }
  },
}
</script>
<style scoped>
i {
  font-size: 13px;
}
</style>




















