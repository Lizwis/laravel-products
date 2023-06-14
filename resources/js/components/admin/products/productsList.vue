<template>
    <div class="card-body">
        <div class="table-responsive">
            <div class="row border-bottom mb-4">
                <div class="col-6 py-2 text-start fs-5">Products</div>
                <div class="col-6 py-2 text-end">
                    <createProduct @reload-products="loadProducts" />
                </div>
            </div>
            <table class="table text-nowrap table-hover border table-bordered">
                <thead>
                    <tr>
                        <th scope="row" class="ps-4">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Price</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(product, index) in products" :key="index">
                        <th scope="row" class="ps-4">
                            {{ index + 1 }}
                        </th>
                        <td>
                            <div class="d-flex align-items-center fw-semibold">
                                <span
                                    class="avatar avatar-sm me-2 avatar-rounded"
                                >
                                    <!-- <img :src="product.avatar" alt="img" /> -->
                                </span>
                                {{ product.name }}
                            </div>
                        </td>
                        <td>{{ product.sku }}</td>
                        <td>R{{ product.price }}</td>

                        <td>{{ product.date }}</td>
                        <td>
                            <div
                                class="d-flex justify-content-between align-items-center"
                            >
                                <div class="btn-group">
                                    <updateProduct
                                        :product_id="product.id"
                                        @reload-products="loadProducts"
                                    />

                                    <deleteProduct
                                        :product_id="product.id"
                                        @reload-products="loadProducts"
                                    />
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex align-items-center">
            <div>
                Showing {{ products.length }} Entries
                <i class="bi bi-arrow-right ms-2 fw-semibold"></i>
            </div>
            <div class="ms-auto">
                <nav aria-label="Page navigation" class="pagination-style-4">
                    <ul class="pagination mb-0">
                        <li
                            v-for="(page, index) in pageCount"
                            :key="index"
                            @click="nextPage(page)"
                            v-bind:class="{ active: currentPage === page }"
                            class="page-item"
                        >
                            <a class="page-link">{{ page }}</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

import createProduct from "./createProduct.vue";
import updateProduct from "./updateProduct.vue";
import deleteProduct from "./deleteProduct.vue";

export default {
    components: { createProduct, updateProduct, deleteProduct },
    data() {
        return {
            products: [],
            currentPage: 1,
            pageCount: [],
        };
    },
    mounted() {
        this.loadProducts();
    },

    methods: {
        loadProducts() {
            this.pageCount.length = 0;
            axios.get("/admin/products").then((response) => {
                this.products = response.data.data;
                let lastPage = response.data.meta.last_page;

                for (let i = 0; i < lastPage; i++) {
                    this.pageCount.push(i + 1);
                }
            });
        },

        nextPage(page) {
            this.products = null;
            axios.get(`/admin/products?page=${page}`).then((response) => {
                this.products = response.data.data;
                this.currentPage = page;
            });
        },
    },
};
</script>

<style scoped>
.page-item {
    cursor: pointer;
}
</style>
