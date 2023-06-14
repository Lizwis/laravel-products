import "./bootstrap";
import { createApp } from "vue";

import VueApexCharts from "vue3-apexcharts";

import ElementPlus from "element-plus";

import "element-plus/dist/index.css";

import * as ElementPlusIconsVue from "@element-plus/icons-vue";

const app = createApp({});

import AddCart from "./components/addCartButton.vue";
app.component("add-cart-button", AddCart);

import CartItems from "./components/cartItems.vue";
app.component("cart-items", CartItems);

import Checkout from "./components/checkout.vue";
app.component("checkout", Checkout);

import ProfitEarned from "./components/admin/charts/profitEarned.vue";
app.component("profit-earned", ProfitEarned);

import RevenueAnalytics from "./components/admin/charts/revenueAnalytics.vue";
app.component("revenue-analytics-chart", RevenueAnalytics);

import RecentOrders from "./components/admin/charts/recentOrders.vue";
app.component("recent-orders", RecentOrders);

import ProductsList from "./components/admin/products/productsList.vue";
app.component("products-list", ProductsList);

import mitt from "mitt";
const emitter = mitt();

app.use(ElementPlus);
app.use(VueApexCharts);

app.config.globalProperties.emitter = emitter;

for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
    app.component(key, component);
}

app.mount("#app");
