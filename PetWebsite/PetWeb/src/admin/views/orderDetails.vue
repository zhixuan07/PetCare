<script setup>
import{ ref,onMounted } from 'vue';
import { RouterLink,useRoute } from 'vue-router';
import axiosClient from '../axiosClient';

const route = useRoute();
const ordersDetails = ref([]);
onMounted (async() => {
  await axiosClient.get(`/admin/orders/${route.params.id}`).then((response) => {
    ordersDetails.value = response.data.order_details;
    console.log(ordersDetails.value)
    
  });
});

</script>

<template>
<div class=" flex justify-between p-10">
        <h1 class="text-2xl text-black">Orders Details</h1>
        <input type="text" placeholder="Search order" class="border-2 border-gray-300 p-2 rounded-lg" v-model="searchInput">
   </div>
   <div class="overflow-x-auto border-gray-200 max-h-screen w-full "> 
    <table class="table-auto  bg-white border-collapse border-r-2 border-l-2 border-gray-100  ml-2 mr-2 ">
      <thead>
        <tr class="text-xs w-full text-center ">
          <th  class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Order ID</th>
          <th  class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Product Name</th>
          <th class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Product SKU</th>
          <th class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Product Category</th>
          <th class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Product Image</th>
          <th class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Product Quantity</th>

        
        </tr>
      </thead>
      <tbody>
        <tr  v-for="order in ordersDetails" :key="order[i]" class="text-xs">
        <td class="border border-gray-200 text-center " >  {{order.id}}</td>
          <td class="border border-gray-200 text-center">{{order.product.name }}</td>
          <td class="border border-gray-200 text-center">{{ order.product.sku }}</td>
          <td class="border border-gray-200 text-center">{{order.product.category }}</td>
          <td class="border border-gray-200 "><img :src="order.product.image_path"  alt="Product Image" class="h-12 w-12 object-cover mx-auto"/></td>
          <td class="border border-gray-200 text-center">{{order.quantity }}</td>
        
      

        </tr>
      
       
      </tbody>
    </table>
 
    </div>  
</template>