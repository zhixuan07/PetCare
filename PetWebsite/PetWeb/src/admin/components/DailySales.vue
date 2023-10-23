<script setup>
import {ref,onMounted}  from 'vue';
import axiosClient from '../axiosClient';

const total_order =ref()
onMounted (async () =>{
    await axiosClient.get('/admin/getTotalOrder').then((res)=>
    {
        total_order.value = res.data.total_order;
    });
})

</script>
<template>
    <div class="flex items-center justify-between">
        <div class="p-3">
            <p class="font-semibold">Orders</p>
            <p >{{ total_order }}</p>
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
