<script setup>
import { ref,onMounted } from 'vue';
import axiosClient from '../axiosClient';
import { useRouter } from 'vue-router';
import updateOrderModal from '../components/updateOrderModal.vue';
import Order from '../order';

const {deleteOrder} = Order();
const router = useRouter();
const orders = ref([]);
const orderID = ref('');
const orderInfo = ref([])
const openModal = ref(false);

onMounted (async() => {
  await axiosClient.get('/admin/orders').then((response) => {
    orders.value = response.data.orders;
    
  });
});

const openOrderDetails = (order) => {
  router.push({ name: 'adminOrderDetails', params: { id: order.id } });
};
const openUpdateOrderModal = (order) => {
  orderInfo.value = order;
  console.log(orderInfo.value);
  openModal.value = true;

};

const closeUpdateOrderModal = () => {
  openModal.value = false;

};
const cancelOrder = async(id) =>{
   deleteOrder(id);
};

</script> 

<template>
  
   

   <div class="overflow-x-auto overflow-y-auto border-gray-200   flex flex-col "> 
    <div class=" flex flex-row sm:flex-col justify-between p-10 items-center">
        <h1 class="text-2xl text-black ">Orders</h1>
        <p class="font-light text-sm ">Pet Admin > Dashboard</p>
       
   </div>
   <div class="flex flex-row md:flex-col justify-end mr-4 mb-2">
    <input type="text" placeholder="Search order" class="border-2 border-gray-300 py-2 px-4  rounded-lg" v-model="searchInput">
   </div>
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
        <td class="border py-2 px-4  border-gray-200 underline " @click="openOrderDetails(order)">  {{ order.id }}</td>
          <td class="border py-2 px-4  border-gray-200 ">{{ order.user.name }}</td>
          <td class="border py-2 px-4  border-gray-200">{{ order.total }}</td>
          <td class="border py-2 px-4  border-gray-200">{{ order.date }}</td>
          <td class="border py-2 px-4  border-gray-200">{{ order.address }}</td>
          <td class="border py-2 px-4  border-gray-200">{{ order.status }}</td>
          
          <td class="border border-gray-200 py-2 px-4 " v-if="order.status!== 'Cancelled' && order.status !=='Delivered' ">
                <button  class="bg-orange-600 rounded-lg h-10 w-20  m-1 text-white hover:bg-orange-500" @click="openUpdateOrderModal(order)" > Update Order</button>
                <button class="bg-red-600 rounded-lg h-10 w-20  m-1 text-white hover:bg-red-500" @click="cancelOrder(order.id)"> Cancel Order </button>

        </td>
        <td v-else class="border border-gray-200 py-2 px-4 " >
                No action 
        </td>

        </tr>
        <p v-if="!orders.values">Product Not Found</p>
       
      </tbody>
    </table>
    <Teleport to="body">
        <div
          v-if="openModal"
          class="fixed inset-0 flex items-center justify-center h-full bg-gray-400 bg-opacity-50"
        >
          <updateOrderModal
            @close="closeUpdateOrderModal"
            :order_id="orderInfo.id"
           
          />
        </div>
      </Teleport>
    </div>  
</template>