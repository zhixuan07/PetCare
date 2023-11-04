<script setup>
import {ref,onMounted}  from 'vue';
import axiosClient from '../axiosClient';

const total_order =ref()
onMounted (async () =>{
    await axiosClient.get('/admin/getTodayOrder').then((res)=>
    {
        total_order.value = res.data.today_order;
    });
})

</script>
<template>
    <div class="flex items-center justify-between">
        <div class="p-4">
            <p class="font-semibold text-gray-500">Today Orders</p>
            <p class="mt-2 font-bold text-2xl text-gray-500">{{ total_order }}</p>
        </div>
        <div class="mr-3">
            <img
                src="../assets/order.svg"
                alt="order"
                class="h-10 w-10 "
            />
        </div>
    </div>
</template>
