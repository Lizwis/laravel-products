<template>
    <div>
        <div>
            <el-popover
                placement="bottom"
                title=""
                :width="500"
                trigger="click"
                content=""
            >
                <div class="col-12 px-4">
                    <div v-if="cartItems.length > 0">
                        <div
                            class="col-12 border-bottom py-2 px-4"
                            v-for="item in cartItems"
                            :key="item.id"
                        >
                            <div class="row">
                                <div class="col-8 value">{{ item.name }}</div>
                                <div class="col-4 text-end">
                                    <el-button
                                        @click="removeFromCart(item)"
                                        style="
                                            border: none !important;
                                            font-weight: 800;
                                            font-size: 30px;
                                            color: #bfc4c9;
                                        "
                                    >
                                        <el-icon><Close /></el-icon>
                                    </el-button>
                                </div>

                                <div class="col-12">
                                    <span class="label">Quantity: </span>
                                    <span class="value">{{
                                        item.quantity
                                    }}</span>
                                </div>
                                <div class="col-12 text-end value">
                                    R {{ item.price }}
                                </div>
                            </div>

                            <div class="col-12"></div>
                        </div>
                        <div class="row my-4 pb-4 px-4">
                            <div class="col-6">
                                <div class="text-start value">
                                    <el-button type="primary" @click="checkout"
                                        >Checkout</el-button
                                    >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end value">
                                    Total Price: R {{ total_price }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="text-center py-4">
                        <p>Your Cart is Empty</p>
                    </div>
                </div>

                <template #reference>
                    <div class="row px-4 pt-2 cart">
                        <div class="col-4 text-end">
                            <span class="cart-label">Cart</span>
                        </div>
                        <div class="col-4 text-end">
                            <img src=".././assets/cart.svg" />
                        </div>
                        <div class="col-4 text-center">
                            <div
                                class="cart-label cart-count rounded-circle bg-success"
                            >
                                {{ cartItems.length }}
                            </div>
                        </div>
                    </div>
                </template>
            </el-popover>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { ElNotification } from "element-plus";

export default {
    data() {
        return {
            cartItems: [],
            cartError: false,
        };
    },
    computed: {
        total_price() {
            return this.cartItems
                .reduce((total, item) => total + parseFloat(item.price), 0)
                .toFixed(2);
        },
    },
    mounted() {
        this.loadCartItems();

        this.emitter.on("cart-updated", this.loadCartItems);
    },
    methods: {
        loadCartItems() {
            const cartItems = localStorage.getItem("cart");
            if (cartItems) {
                this.cartItems = JSON.parse(cartItems);
            }
        },
        removeFromCart(item) {
            const index = this.cartItems.indexOf(item);
            if (index !== -1) {
                this.cartItems.splice(index, 1);
                localStorage.setItem("cart", JSON.stringify(this.cartItems));
            }
        },

        errorNotification() {
            ElNotification({
                title: "Error",
                message: "We cleared your cart, because of errors, shop again",
                type: "error",
            });
        },
        checkout() {
            axios
                .post("/validateCart", { cart: this.cartItems })
                .catch((error) => {
                    // this.errors = error.response.data.errors;

                    if (error.response.data.errors) {
                        this.cartError = true;
                        localStorage.removeItem("cart");
                        this.cartItems = [];
                        this.$nextTick(this.errorNotification());
                    }
                });

            if (this.cartError == false) {
                window.location.href = `/checkout`;
            }
        },
    },
};
</script>

<style scoped>
.btn-outline-secondary {
    border: none;
    color: #dbdbdc !important;
    font-weight: 600;
}
.label {
    color: #888888;
}

.value {
    color: #000000;
    font-weight: 600;
}

.cart-label {
    color: #ffff;
}
.cart {
    cursor: pointer;
}
.cart-count {
    width: 25px;
    height: 25px;
}
</style>
