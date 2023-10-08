<script setup>
import { ref,onMounted } from 'vue';
import axiosClient from '../axiosClient';
import { useRouter } from 'vue-router';

const router = useRouter();
const orders = ref([]);
const searchInput = ref('');

onMounted (async() => {
  await axiosClient.get('/admin/orders').then((response) => {
    orders.value = response.data.orders;
    
  });
});

const openOrderDetails = (order) => {
  router.push({ name: 'adminOrderDetails', params: { id: order.id } });
};

const cancelOrder = (id) =>{
    axiosClient.patch(`admin/deleteOrder/${id}}`).then((response) => {
       return response.data;
    });
};

</script>

<template>
  
   <div class=" flex justify-between p-10">
        <h1 class="text-2xl text-black">Orders</h1>
        <input type="text" placeholder="Search order" class="border-2 border-gray-300 p-2 rounded-lg" v-model="searchInput">
   </div>
   <div class="overflow-x-auto border-gray-200 max-h-screen w-full "> 
    <table class="table-auto  bg-white border-collapse border-r-2 border-l-2 border-gray-100  ml-2 mr-2 ">
      <thead>
        <tr class="text-xs w-full text-center ">
          <th  class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">ID</th>
          <th  class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Name</th>
          <th class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Total</th>
          <th class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Date</th>
          <th class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Delivery Address</th>
          <th class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Order Status</th>
          <th class="py-2 px-4   bg-gray-200 text-gray-600 font-semibold uppercase border-b border-r border-gray-100">Action</th>

        
        </tr>
      </thead>
      <tbody>
        <tr  v-for="order in orders" :key="order[i]" class="text-xs">
        <td class="border border-gray-200 underline " @click="openOrderDetails(order)">  {{ order.id }}</td>
          <td class="border border-gray-200">{{ order.user.name }}</td>
          <td class="border border-gray-200">{{ order.total }}</td>
          <td class="border border-gray-200">{{ order.date }}</td>
          <td class="border border-gray-200">{{ order.address }}</td>
          <td class="border border-gray-200">{{ order.status }}</td>
          
          <td class="border border-gray-200 p-2" v-if="order.id=='Cancelled'">
                <button  class="bg-orange-600 rounded-lg h-10 w-20  m-1 text-white" > Update Order</button>
                <button class="bg-red-600 rounded-lg h-10 w-20  m-1 text-white" @click="cancelOrder(order.id)"> Cancel Order </button>

        </td>
        <td class="border border-gray-200 p-2" v-else>
                No action 
        </td>
        
      

        </tr>
        <p v-if="!orders.values">Product Not Found</p>
       
      </tbody>
    </table>
    </div>  
</template>