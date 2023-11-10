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
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through the cart items and display them here -->
                        <tr v-for="item in store.getCartItems" :key="item.id">
                            <td>{{ item.name }}</td>
                            <td>{{ item.quantity }}</td>
                            <td>{{ store.calculateItemTotal(item)}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="total-amount">
                    <p>Total:RM {{ store.calculateSubTotal() }}</p>
                </div>
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
import {useRouter} from 'vue-router';
import { useCartStore } from "../stores/cart";
import { onMounted } from "vue";
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const router = useRouter();
const store = useCartStore();
// Retrieve the user object from local storage
const userString = localStorage.getItem('user');
const user = JSON.parse(userString);

// Get the user ID
const userId = user.id;

// Get the current date
const currentDate = new Date();
const year = currentDate.getFullYear();
const month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
const day = currentDate.getDate().toString().padStart(2, '0');

// Format the date as a string (e.g., "YYYY-MM-DD")
const formattedDate = `${year}-${month}-${day}`;
const total = store.calculateSubTotal();
// Create the checkout object
const checkout = {
    user_id: userId,
    total: total, // Set your total here
    status: 'Pending',
    address: '', // Set the address here
    date: formattedDate,
    product: store.getCartItems,
};

// Now, the 'checkout' object contains the user ID and the formatted date
const processPayment =()=>{
    if(!checkout.address || !cardNumber || !cvv || !expiryDate || !phoneNumber || !recipientName){
        toast.warning('Please fill all the blanks',{position:'top-right'}, {duration: 2000});
        return;
    }
    axiosClient.post('/checkout',checkout).then((res)=>{
        console.log(res.data);
        store.clearCart();
        toast.success('Payment Success',{position:'top-right'}, {duration: 2000});
        setTimeout(()=>{
            router.push('/');
        },2000)
       
        
    }).catch((err)=>{
        console.log(err);
    })
}

onMounted(() => {
    store.loadCartItemsFromLocalStorage();
   console.log(checkout)
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