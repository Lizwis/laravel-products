<template>
    <div>
        <apexchart
            type="line"
            :options="chartOptions"
            :series="series"
        ></apexchart>
    </div>
</template>

<script>
import chartData from "../../../data/RevenueAnalyticsData";

export default {
    data() {
        return chartData;
    },
};
</script>
