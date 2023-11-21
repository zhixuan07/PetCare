<script setup>

import { RouterLink } from "vue-router";
import DailySales from "../components/DailySales.vue";
import YearRevenue from "../components/YearRevenue.vue";
import TotalSales from "../components/TotalSales.vue";
import DayRevenue from "../components/DayRevenue.vue";
import DailySalesChart from "../components/DailySalesChart.vue";
import TotalRevenueChart from "../components/TotalRevenueChart.vue";
import CategoryYearSalesChart from "../components/CategoryYearSalesChart.vue";
import MonthlySalesChart from "../components/MonthlySalesChart.vue";
</script>
<template>
    <div class="flex items-center justify-between m-10">
        <p class="font-semibold text-[20px] text-slate-600">Dashboard</p>
        <p class="font-light text-sm">Pet Admin > Dashboard</p>
    </div>
    <div class="grid grid-col-4 gap-4 sm:grid-cols-1 md:grid-cols-4 m-4">
        <DailySales class="bg-slate-100 " />
        <TotalSales class="bg-slate-100"/>
        <DayRevenue class="bg-slate-100"/>
        <YearRevenue class="bg-slate-100 "/>
        
        
    </div>
    <div class="flex flex-col sm:flex-row md:m-4 md:flex-row gap-3 ml-4 mr-2">
        <DailySalesChart class="w-full lg:w-1/3"/>
        <TotalRevenueChart class="w-full lg:w-1/3"/>
        <CategoryYearSalesChart class="w-full lg:w-1/3"/>
        

    </div>
    <MonthlySalesChart class="w-full lg:w-1/3"/>
</template>
