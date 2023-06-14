export const chartOptions = {
    series: [
        {
            name: "Profit Earned",
            data: [44, 42, 57, 86, 58, 55, 70],
        },
        {
            name: "Total Sales",
            data: [34, 22, 37, 56, 21, 35, 60],
        },
    ],
    chart: {
        type: "bar",
        height: 180,
        toolbar: {
            show: false,
        },
    },
    grid: {
        borderColor: "#f1f1f1",
        strokeDashArray: 3,
    },
    colors: ["rgb(132, 90, 223)", "#e4e7ed"],
    plotOptions: {
        bar: {
            colors: {
                ranges: [
                    {
                        from: -100,
                        to: -46,
                        color: "#ebeff5",
                    },
                    {
                        from: -45,
                        to: 0,
                        color: "#ebeff5",
                    },
                ],
            },
            columnWidth: "60%",
            borderRadius: 5,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        show: true,
        width: 2,
        colors: undefined,
    },
    legend: {
        show: false,
        position: "top",
    },
    yaxis: {
        title: {
            style: {
                color: "#adb5be",
                fontSize: "13px",
                fontFamily: "poppins, sans-serif",
                fontWeight: 600,
                cssClass: "apexcharts-yaxis-label",
            },
        },
        labels: {
            formatter: function (y) {
                return y.toFixed(0) + "";
            },
        },
        xaxis: {
            type: "week",
            categories: ["S", "M", "T", "W", "T", "F", "S"],
            axisBorder: {
                show: true,
                color: "rgba(119, 119, 142, 0.05)",
                offsetX: 0,
                offsetY: 0,
            },
            axisTicks: {
                show: true,
                borderType: "solid",
                color: "rgba(119, 119, 142, 0.05)",
                width: 6,
                offsetX: 0,
                offsetY: 0,
            },
            labels: {
                rotate: -90,
            },
        },
    },
};

export const series = [
    {
        name: "Profit Earned",
        data: [44, 42, 57, 86, 58, 55, 70],
    },
    {
        name: "Total Sales",
        data: [34, 22, 37, 56, 21, 35, 60],
    },
];
