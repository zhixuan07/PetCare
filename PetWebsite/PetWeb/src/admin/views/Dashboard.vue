<script setup>
import { RouterLink } from "vue-router";
import DailySales from "../components/DailySales.vue";
</script>
<template>
    <div class="flex items-center justify-between m-10">
        <p class="font-semibold text-[20px] text-slate-600">Dashboard</p>
        <p class="font-light text-sm">Pet Admin > Dashboard</p>
    </div>
    <div class="grid grid-col-4 gap-4 sm:grid-cols-1 md:grid-cols-4 m-3">
        <DailySales class="bg-slate-200 shadow-md" />
        <p class="bg-slate-200 shadow-md">Pet Admin > Dashboard</p>
        <p class="font-light text-sm bg-slate-200 shadow-md">
            Pet Admin > Dashboard
        </p>
        <p class="font-light text-sm bg-slate-200 shadow-md">
            Pet Admin > Dashboard
        </p>
    </div>
</template>
