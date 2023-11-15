<template>
    <div>
        <!-- Header Component -->
        <Header />

        <div class="order-details-page">
           

            <div class="order-summary">
                <h2 class="summary-title">Order Summary</h2>
                <table class="summary-table table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price per unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through the cart items and display them here -->
                        <tr v-for="item in ordersDetails" :key="item[i]">
                            <td>{{ item.product.name }}</td>
                            <td>{{ item.quantity }}</td>
                            <td>{{ item.product.price }}</td>
                            
                        </tr>
                    </tbody>
                </table>
             
            </div>
        </div>

        <div class="container my-3 text-center">
            <button class="btn btn-link" @click="goBack">Back</button>
        </div>
        

        <!-- Footer Component -->
        <Footer />
    </div>
</template>



<script setup>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import axiosClient from "../../admin/axiosClient";
import {useRouter,useRoute} from 'vue-router';

import { ref,onMounted } from "vue";
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
const route = useRoute();
const router = useRouter();
const ordersDetails = ref([]);


onMounted(async() => {
    await axiosClient
        .get(`/admin/orders/${route.params.id}`)
        .then((response) => {
            ordersDetails.value = response.data.order_details;
            console.log(ordersDetails.value);
        });
});


//added method: go back to previous page
const goBack = () => {
    router.go(-1); // Go back to the previous page
}

</script>

<style scoped>
/* Checkout container styles */
.order-details-page {
    display: flex;
    justify-content: space-between;
    margin: 60px;
}





  /* Cart summary styles */
  .order-summary {
    width: 45%;
    padding: 40px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  .summary-title {
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  summary-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  
  summary-table th,
  summary-table td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
  }
  
  .total-amount {
    font-size: 18px;
    font-weight: bold;
  }
  
  /* Media query for mobile */
  @media screen and (max-width: 768px) {
    .order-details-page {
      flex-direction: column;
      margin: 30px 30px 200px 30px;
    }

    .order-summary {
      width: 100%;
      padding: 20px;
      margin-bottom: 30px;
    }


    

    
  }

  
  </style>