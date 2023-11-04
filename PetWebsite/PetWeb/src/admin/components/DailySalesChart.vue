<!-- DoughnutChart.vue -->
<template>
    <div class="bg-slate-100">
        <canvas v-if="apiData.values != null" ref="doughnutChartCanvas" width="400" height="200"></canvas>
        <h1 v-else class="flex justify-center items-center h-full"> No data display</h1>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";
import axiosClient from "../axiosClient";
import Chart from "chart.js/auto";

const apiData = ref([]);
const doughnutChartCanvas = ref(null);

onMounted(async () => {
    axiosClient.get("/admin/getTodayOrderChart").then((res) => {
        apiData.value = res.data;

        // After receiving the data, create and configure the chart
        createAndConfigureChart();
    });
});

const createAndConfigureChart = () => {
    if (doughnutChartCanvas.value) {
        const labels = apiData.value.map((item) => item.category);
        const dataPoints = apiData.value.map((item) => item.total);
        const data = {
            labels: labels,
            datasets: [
                {
                    label: "Sales",
                    data: dataPoints,
                    backgroundColor: ["#30B850", "#1443C4", "#f2f2f2"],
                },
            ],
        };

        new Chart(doughnutChartCanvas.value, {
            type: "doughnut",
            data: data,
            options: {
                cutout:100,
                layout: {
                    padding: 30,
                    
                },
                plugins: {
                    title: {
                        display: true,
                        text: "Daily Sales",
                        align: "start",
                        font: {
                            size: 20,
                        },
                    },
                },
                elements: {
                   
                },
            },
        });
    }else{
        console.log('Error')
    }
};
</script>
