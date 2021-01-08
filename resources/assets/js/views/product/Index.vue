<template>
    <div>
        <sw-page-header title="Products">
            <template v-slot:breadcrumbs>
                <sw-breadcrumb>
                    <sw-breadcrumb-item title="Home" />
                    <sw-breadcrumb-item title="Product" to="/admin/product" />
                    <!-- <sw-breadcrumb-item title="Items" active /> -->
                </sw-breadcrumb>
            </template>
            <template slot="actions">
                <sw-button tag-name="router-link" to ="/admin/product/add-product" variant="primary">
                    Add New
                </sw-button>
            </template>
        </sw-page-header>

        <sw-card>
        <!-- <div class="flex justify-end w-full">

        </div> -->
        </sw-card>
    </div>
</template>
