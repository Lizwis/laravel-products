<template>
    <div>
        <apexchart
            type="bar"
            :options="chartOptions"
            :series="series"
        ></apexchart>
    </div>
</template>

<script>
import { chartOptions, series } from "../../../data/ProfitEarnedData";

export default {
    data() {
        return {
            chartOptions,
            series,
        };
    },
};
</script>
