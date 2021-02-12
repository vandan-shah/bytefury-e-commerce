import Vue from 'vue'
import VueRouter from 'vue-router'

/*
 |--------------------------------------------------------------------------
 | Admin Views
 |--------------------------------------------------------------------------|
 */

// Layouts
import LayoutBasic from './views/layouts/LayoutBasic.vue'
import LayoutLogin from './views/layouts/LayoutLogin.vue'

// categories
import CategoryIndex from './views/category/Index.vue'
import CreateCategory from './views/category/Create.vue'

// brands
import BrandIndex from './views/brand/Index.vue'
import CreateBrand from './views/brand/Create.vue'

// products
import ProductIndex from './views/product/Index.vue'
import CreateProduct from './views/product/AddProduct.vue'

// orders
import OrderIndex from './views/orders/Index.vue'
import ViewOrder from './views/orders/ViewOrder.vue'

// Auth
import Login from './views/auth/Login.vue'

import NotFoundPage from './views/errors/404.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: LayoutLogin,
    meta: { redirectIfAuthenticated: true },
    children: [
      {
        path: '/',
        component: Login
      }
    ]
  },
  {
    path: '/admin',
    component: LayoutBasic,
    meta: { requiresAuth: true },
    children: [
      // Category
      {
        path: 'category',
        component: CategoryIndex,
        name: 'category.index'
      },
      {
        path: 'category/create',
        component: CreateCategory,
        name: 'category.create'
      },
      {
        path: 'category/:id/edit',
        component: CreateCategory,
        name: 'category.edit'
      },
      // Brand
      {
        path: 'brand',
        component: BrandIndex,
        name: 'brand.index'
      },
      {
        path: 'brand/create',
        component: CreateBrand,
        name: 'brand.create'
      },
      {
        path: 'brand/:id/edit',
        component: CreateBrand,
        name: 'brand.edit'
      },
      // Product
      {
        path: 'product',
        component: ProductIndex,
        name: 'product.index'
      },
      {
        path: 'product/add-product',
        component: CreateProduct,
        name: 'product.add-product'
      },
      {
        path: 'product/:id/edit',
        component: CreateProduct,
        name: 'product.edit'
      },
      // Order
      {
        path: 'order',
        component: OrderIndex,
        name: 'order.index'
      },
      {
        path: 'order/:id',
        component: ViewOrder,
        name: 'product.view-order'
      },
    ]
  },
  //  DEFAULT ROUTE
  { path: '*', component: NotFoundPage }
]
const router = new VueRouter({
  routes,
  mode: 'history',
  linkActiveClass: 'active'
})

export default router
