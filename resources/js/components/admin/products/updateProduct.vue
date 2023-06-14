<template>
    <el-button
        type="primary"
        size="small"
        plain
        @click="getProduct(product_id)"
    >
        <el-icon> <Edit /> </el-icon>
    </el-button>

    <div class="col-12">
        <el-dialog v-model="visible">
            <div class="col-12 text-center">
                <div class="fs-5 form-label">Create mew Product</div>
                <div class="row px-4">
                    <div class="col-12 text-start pb-2 form-label">
                        Product Name *
                    </div>
                    <div class="col-12">
                        <el-input
                            v-model="name"
                            clearable
                            class="form-input"
                            :class="{ 'is-invalid': errorName }"
                        />
                        <div
                            class="text-danger font-weight-light"
                            v-if="errorName"
                        >
                            {{ errorName[0] }}
                        </div>
                    </div>
                    <div class="col-12 text-start pb-2 pt-4 form-label">
                        Sku *
                    </div>
                    <div class="col-12">
                        <el-input
                            v-model="sku"
                            clearable
                            class="form-input"
                            :class="{ 'is-invalid': errorSku }"
                        />
                        <div
                            class="text-danger font-weight-light"
                            v-if="errorSku"
                        >
                            {{ errorSku[0] }}
                        </div>
                    </div>
                    <div class="col-12 text-start pb-2 pt-4 form-label">
                        Price *
                    </div>
                    <div class="col-12">
                        <el-input
                            v-model="price"
                            clearable
                            class="form-input"
                            :class="{ 'is-invalid': errorPrice }"
                        />
                        <div
                            class="text-danger font-weight-light"
                            v-if="errorPrice"
                        >
                            {{ errorPrice[0] }}
                        </div>
                    </div>

                    <div class="col-12 py-4">
                        <el-button
                            type="primary"
                            size="large"
                            @click="submit(product_id)"
                            >Submit</el-button
                        >
                    </div>
                </div>
            </div>
        </el-dialog>
    </div>
</template>

<script>
import axios from "axios";

export default {
    emits: ["reload-products"],
    props: ["product_id"],

    data() {
        return {
            visible: false,
            name: "",
            sku: "",
            price: "",
            errorPrice: "",
            errorName: "",
            errorSku: "",
        };
    },

    methods: {
        getProduct(product_id) {
            this.visible = true;
            axios.get(`/admin/product/show/${product_id}`).then((response) => {
                let product = response.data;

                console.log(product);
                (this.name = product.name),
                    (this.sku = product.sku),
                    (this.price = product.price);
            });
        },

        submit(product_id) {
            axios
                .post(`/admin/product/update/${product_id}`, {
                    name: this.name,
                    sku: this.sku,
                    price: this.price,
                })
                .then(() => {
                    this.visible = false;
                    this.$emit("reload-products");
                })
                .catch((error) => {
                    if (error) {
                        let errors = error.response.data.errors;
                        (this.errorPrice = errors.price),
                            (this.errorSku = errors.sku),
                            (this.errorName = errors.name);
                    }
                });
        },
    },
};
</script>

<style></style>
