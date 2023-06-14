<template>
    <el-popconfirm
        title="Are you sure to delete this?"
        @confirm="deleteProduct(product_id)"
    >
        <template #reference>
            <el-button type="danger" size="small" plain>
                <el-icon> <Delete /> </el-icon
            ></el-button>
        </template>
    </el-popconfirm>
</template>

<script>
import axios from "axios";

export default {
    emits: ["reload-products"],
    props: ["product_id"],
    methods: {
        deleteProduct(product_id) {
            axios.delete(`/admin/product/delete/${product_id}`).then(() => {
                this.$emit("reload-products");
            });
        },
    },
};
</script>

<style></style>
