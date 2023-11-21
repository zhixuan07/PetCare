<template>
    <div class="bg-slate-100">
        <canvas ref="chartCanvas" width="400" height="400"></canvas>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axiosClient from "../axiosClient";
import Chart from "chart.js/auto";

const chartCanvas = ref(null);
const apiData = ref([]);

onMounted(() => {
    fetchData();
});

const fetchData = () => {
    axiosClient.get("/admin/getMonthlySalesChart").then((res) => {
        apiData.value = res.data;

        // After receiving the data, create and configure the chart
        createAndConfigureChart();
    });
};

const createAndConfigureChart = () => {
    const labels = Array.from({ length: 12 }, (_, index) => index + 1); // Generate labels for all 12 months
    const dataPoints = Array.from({ length: 12 }, () => 0); // Initialize data points for all 12 months with zero values

    // Update data points with values from API data for available months
    apiData.value.forEach((item) => {
        const monthIndex = item.month - 1; // Months are 1-indexed, so adjust to 0-indexed
        dataPoints[monthIndex] = item.total_sales;
    });

    const data = {
        labels: labels,
        datasets: [
            {
                label: "Sales (RM)",
                data: dataPoints,
                fill: false,
          
                tension: 0.1,
                backgroundColor: "rgb(255, 99, 132)",
            },
            
        ],
    };

    new Chart(chartCanvas.value, {
        type: "bar",
        data: data,
        options: {
            layout: {
                padding: 30,
            },
            scales: {
                y: {
                    suggestedMin: 0,
                },
            },
            plugins: {
                title: {
                    display: true,
                    text: "Total Sales by Month",
                    align: "start",
                    font: {
                        size: 20,
                    },
                },
            },
            elements: {},
        },
    });
};
</script>
