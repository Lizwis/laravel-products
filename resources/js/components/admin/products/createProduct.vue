<template>
    <el-button type="success" circle @click="visible = true">
        <el-icon>
            <Plus />
        </el-icon>
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
                            v-model="form.name"
                            clearable
                            class="form-input"
                            :class="{ 'is-invalid': errorName }"
                        />
                        <span
                            class="text-danger font-weight-light"
                            v-if="errorName"
                            >{{ errorName[0] }}</span
                        >
                    </div>
                    <div class="col-12 text-start pb-2 pt-4 form-label">
                        Sku *
                    </div>
                    <div class="col-12">
                        <el-input
                            v-model="form.sku"
                            clearable
                            class="form-input"
                            :class="{ 'is-invalid': errorSku }"
                        />
                        <span
                            class="text-danger font-weight-light"
                            v-if="errorSku"
                            >{{ errorSku[0] }}</span
                        >
                    </div>
                    <div class="col-12 text-start pb-2 pt-4 form-label">
                        Price *
                    </div>
                    <div class="col-12">
                        <el-input
                            v-model="form.price"
                            clearable
                            class="form-input"
                            :class="{ 'is-invalid': errorPrice }"
                        />
                        <span
                            class="text-danger font-weight-light"
                            v-if="errorPrice"
                            >{{ errorPrice[0] }}</span
                        >
                    </div>

                    <div class="col-12 py-4">
                        <el-button type="primary" size="large" @click="submit"
                            >Submit</el-button
                        >
                    </div>
                </div>
            </div>
        </el-dialog>
    </div>
</template>

<script>
export default {
    emits: ["reload-products"],

    data() {
        return {
            visible: false,
            form: {},
            errorPrice: "",
            errorName: "",
            errorSku: "",
        };
    },

    methods: {
        submit() {
            axios
                .post("/admin/products/store", {
                    name: this.form.name,
                    sku: this.form.sku,
                    price: this.form.price,
                })
                .then(() => {
                    (this.errorPrice = ""),
                        (this.errorSku = ""),
                        (this.errorName = "");
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

<style>
.form-label {
    font-weight: 600;
    color: #000;
}
.form-input {
    height: 45px;
    border: 2px !important;
}
.is-invalid {
    border: 1px solid red !important;
}
</style>
>
