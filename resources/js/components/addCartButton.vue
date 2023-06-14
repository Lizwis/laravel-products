<template>
    <button
        type="button"
        @click="addToCart(product)"
        class="btn btn-sm btn-outline-secondary"
    >
        Add to Cart
    </button>
</template>

<script>
export default {
    props: ["product"],
    methods: {
        addToCart(product) {
            let cartItems = localStorage.getItem("cart");
            if (!cartItems) {
                cartItems = [];
            } else {
                cartItems = JSON.parse(cartItems);
                if (!Array.isArray(cartItems)) {
                    cartItems = [];
                }
            }

            // Check if the product already exists in the cart
            const existingProductIndex = cartItems.findIndex(
                (item) => item.id === product.id
            );
            if (existingProductIndex !== -1) {
                // Increment the quantity and price of the existing product
                cartItems[existingProductIndex].quantity += 1;
                cartItems[existingProductIndex].price = (
                    parseFloat(cartItems[existingProductIndex].price) +
                    parseFloat(product.price)
                ).toFixed(2);
            } else {
                // Add the product to the cart with a quantity of 1
                product.quantity = 1;
                cartItems.push(product);
            }

            localStorage.setItem("cart", JSON.stringify(cartItems));

            // Emit an event to notify other components that the cart has been updated
            this.emitter.emit("cart-updated");
        },
    },
};
</script>
