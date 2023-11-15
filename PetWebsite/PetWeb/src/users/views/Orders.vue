<template>
    <div>
        <!-- Header Component -->
        <Header />
        
        <div class="orders-page">

          <h1 class="title">ORDER HISTORY</h1>
          <div class="tab-container">
              <div
              class="tab"
              v-for="(tab, index) in tabs"
              :key="index"
              @click="activeTab = tab"
              :class="{ 'active-tab': activeTab === tab }"
              >
              {{ tab }}
              </div>
          </div>
      
          <div class="order-cards">
            <router-link
              v-for="order in filteredOrders"
              :key="order.id"
              :to="'/userOrderDetails/' + order.id"
            >
              <div class="order-card" :class="order.status">
                <div class="order-id">Order ID: {{ order.id }}</div>
                <div class="order-date">Date: {{ order.date }}</div>
                <div class="order-amount">Total Amount: ${{ order.total }}</div>
                <div class="order-status">Status: {{ order.status }}</div>
              </div>
            </router-link>
          </div>

          <div class="container my-3 text-center">
            <router-link to="/userprofile">
                <button class="btn btn-link">Back to Profile</button>
            </router-link>
          </div>


        </div>
        

        <!-- Footer Component -->
        <Footer />
    </div>
  </template>
  
  <script setup>
  import { ref, computed,onMounted } from 'vue';
  import Header from '../components/Header.vue';
  import Footer from '../components/Footer.vue';
  import { useRouter } from "vue-router";
  import axiosClient from '../../admin/axiosClient';
  const router = useRouter();
  onMounted(async () => {
    const userString = localStorage.getItem('user');
    const user = JSON.parse(userString);
    try {
        const response = await axiosClient.get(`/userOrder/${user.id}`);
        orders.value = response.data.orders;
        console.log(orders.value)
      } catch (error) {
        console.error('Error fetching orders:', error);
      }
      
});
  
  // Sample orders data
  const orders = ref([]);
  
  const tabs = ['ALL', 'DELIVERED', 'CANCELLED', 'PENDING','SHIPPED'];
  const activeTab = ref('ALL');
  
  const filteredOrders = computed(() => {
    if (activeTab.value === 'ALL') {
      return orders.value;
    } else {
      return orders.value.filter(order => order.status === activeTab.value.toLowerCase());
    }
  });
  </script>
  
  <style scoped>

  .orders-page {
    padding: 20px;
    margin-left: 100px;
    margin-right: 100px;
  }

  .title {
    font-size: 40px;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 35px;
    text-align: center;
  }
  .tab-container {
    display: flex;
    margin-bottom: 20px;
    justify-content: center;
  }

  .tab {
    width: 100px;
    cursor: pointer;
    user-select: none;
    color: black;
    border-bottom: 3px solid  #ffffff;
  }

  .tab::before {
    content: '';
    position: absolute;
    top: 0;
    right: -1px; 
    bottom: 0;
    width: 1px;
    background-color: #ccc; /* Vertical line color */
  }
  
  .tab::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0px; 
    bottom: 0;
    width: 1px;
    background-color: #ccc; /* Vertical line color */
  }
  
  .active-tab {
    border-bottom: 3px solid  #5d5e5e;
  }
  
  .order-cards {
    display: flex;
    flex-direction: column; /* Each card is displayed in a new row */
  }
  
  .order-card {
    border: 2px solid #ccc;
    padding: 10px;
    background-color: #fff;
    margin-bottom: 10px; /* Add some spacing between cards */
    border-radius: 10px;
  }
  
  .completed {
    border-color: green;
    background-color: rgb(144, 196, 144);
  }
  
  .canceled {
    border-color: rgb(255, 33, 88);
    background-color: rgb(243, 152, 152);
  }
  
  .pending {
    border-color: orange;
    background-color: rgb(255, 217, 145);
  }

  @media screen and (max-width: 768px) {
    .orders-page {
      margin: 15px 15px 200px 15px;
    }
  
  }
  </style>
  