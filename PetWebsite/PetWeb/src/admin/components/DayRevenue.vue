<script setup>
import {ref,onMounted} from 'vue'
import axiosClient from '../axiosClient';

onMounted (async () =>{
    await axiosClient.get('/admin/getTodayRevenue').then((res)=>
    {
        revenue.value = res.data.today_revenue;
    });
})

const revenue = ref();

</script>
<template>
     <div class="flex items-center justify-between">
        <div class="p-3">
            <p class="font-semibold text-gray-500">Today Revenue</p>
            <p class="mt-2 font-bold text-2xl text-gray-500">RM {{ revenue }}</p>
            
        </div>
        <div class="mr-3">
            <img
                src="../assets/revenue.svg"
                alt="order"
                class="h-10 w-10 "
            />
        </div>
    </div>
</template>