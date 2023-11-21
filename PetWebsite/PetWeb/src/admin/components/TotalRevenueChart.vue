<!-- Chart.vue -->
<template>
    <div class="bg-slate-100">
        <canvas ref="chartCanvas" width="400" height="400"></canvas>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";
import axiosClient from "../axiosClient";
import Chart from "chart.js/auto";
const chartCanvas = ref(null);
const apiData = ref([]);

onMounted(async () => {
    axiosClient.get("/admin/getTotalRevenueChart").then((res) => {
        apiData.value = res.data;

        // After receiving the data, create and configure the chart
        createAndConfigureChart();
    });
});

const createAndConfigureChart = () => {
    if (chartCanvas.value) {
        const labels = apiData.value.map((item) => item.years);
        const dataPoints = apiData.value.map((item) => item.total);


        // Data set for chart
        const data = {
            labels: labels,
            datasets: [
                {
                    label: "Sales (RM)",
                    data: dataPoints,
                    fill: false,
                    borderColor: "rgb(75, 192, 192)",
                    tension: 0.1,
                },
            ],
        };

        new Chart(chartCanvas.value, {
            type: "line",
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
                        text: "Total Revenue By Year ",
                        align: "start",
                        font: {
                            size: 20,
                        },
                    },
                },
                elements: {},
            },
        });
    }
};
</script>
