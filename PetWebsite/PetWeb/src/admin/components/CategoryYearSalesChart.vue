<!-- DoughnutChart.vue -->
<template>
    <div class="bg-slate-100">
        <canvas
            v-if="apiData.values != null"
            ref="barChartCanvas"
            width="400"
            height="400"
        ></canvas>
        <h1 v-else class="flex justify-center items-center h-full">
            No data display
        </h1>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";
import axiosClient from "../axiosClient";
import Chart from "chart.js/auto";

const apiData = ref([]);
const barChartCanvas = ref(null);

onMounted(async () => {
    axiosClient.get("/admin/getTotalSalesByCategoryYearChart").then((res) => {
        apiData.value = res.data;

        // After receiving the data, create and configure the chart
        createAndConfigureChart();
    });
});

const createAndConfigureChart = () => {
    if (barChartCanvas.value) {
        const years = Array.from(
            new Set(apiData.value.map((item) => item.years))
        );
        const categories = Array.from(
            new Set(apiData.value.map((item) => item.category))
        );

        const data = {
            labels: years.map(String),
            datasets: categories.map((category) => ({
                label: category,

                data: years.map((year) =>
                    apiData.value
                        .filter(
                            (item) =>
                                item.years === year &&
                                item.category === category
                        )
                        .reduce(
                            (total, item) => total + parseInt(item.quantity),
                            0
                        )
                ),
                barPercentage: 0.5,
                barThickness: 9,
                maxBarThickness: 8,
               
                backgroundColor: getRandomColor(),
            })),
        };

        new Chart(barChartCanvas.value, {
            type: "bar",
            data: data,
            
            options: {
                layout:{
                    padding:30
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        
                        suggestedMin:0,
                        stepSize: 10,
                        
                    },
                },
                plugins:{
                    title:{
                        display:true,
                        text:'Statistics',
                        align:'start',
                        font:{
                            size:20
                        }
                        
                        
                    }
                }
            },
        });
    } else {
        console.log("Error");
    }
};

function getRandomColor() {
    // Define a function to generate random colors
    const letters = "0123456789ABCDEF";
    let color = "#";
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
</script>
