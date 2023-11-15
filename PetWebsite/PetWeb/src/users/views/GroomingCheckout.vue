<template>
    <div>
      <!-- Header Component -->
      <Header_checkout />
  
      <div class="checkout-page">
        <div class="checkout-container">
          <h2 class="checkout-title">Checkout</h2>
          <div class="user-info">
            <label for="recipientName">Recipient Name</label>
            <input type="text" id="recipientName" v-model="checkout.recipientName" />
  
            
  
            <label for="phoneNumber">Phone Number</label>
            <input type="tel" id="phoneNumber" v-model="checkout.phoneNumber" @input="formatPhoneNumber"/>
  
            <label for="cardNumber">Card Number</label>
            <input type="text" id="cardNumber" v-model="cardNumber" @input="formatCardNumber" />
  
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" v-model="cvv" />
  
            <label for="expiryDate">Expiry Date</label>
            <input type="date" id="expiryDate" v-model="expiryDate" class="custom-date-input"/>
  
            <!-- You can add a date picker component here if needed -->
          </div>
          <button class="checkout-button" @click="processPayment">Pay Now</button>
          <button class="checkout-button mt-2" @click="cancelAppointment">Cancel Appointment</button>
        </div>
  
        <div class="cart-summary">
            <h2 class="summary-title">Order Summary</h2>
            <table class="summary-table table">
                <thead>
                <tr>
                    <th>Type Service</th>
                    <th>Date</th>
                    <th>Time</th>
              
                    <th>Type of pet</th>
                    <th>Number of pet</th>
                </tr>
                </thead>
                <tbody>
                <!-- Loop through the cart items and display them here -->
                <tr>
                    <td>{{service.typeService }}</td>
                    <td>{{service.appointmentDate }}</td>
                    <td>{{service.appointmentTime }}</td>
                    <td>{{service.typePet}}</td>
                    <td>{{service.numberPet }}</td>
                </tr>
                </tbody>
            </table>
            <div class="total-amount">
                <p>Total:{{ store.calculateTotal() }} </p>
            </div>
        </div>

        
      </div>
  
   
    </div>
  </template>
  
  <script setup>
  import Header from "../components/Header.vue";
  import Footer from "../components/Footer.vue";
  import axiosClient from "../../admin/axiosClient";
  import {useRouter} from 'vue-router';
  import { useServiceStore } from "../stores/service";
  import { onMounted } from "vue";
  import { toast } from 'vue3-toastify';
  import 'vue3-toastify/dist/index.css';
  
  const router = useRouter();
  const store = useServiceStore();
  // Retrieve the user object from local storage
  const userString = localStorage.getItem('user');
  const user = JSON.parse(userString);

  const serviceString  = localStorage.getItem('service');
  const service = JSON.parse(serviceString);
  
  // Get the user ID
  const userId = user.id;
  
  // Get the current date
  const currentDate = new Date();
  const year = currentDate.getFullYear();
  const month = (currentDate.getMonth() + 1).toString().padStart(2, '0');
  const day = currentDate.getDate().toString().padStart(2, '0');
  
  // Format the date as a string (e.g., "YYYY-MM-DD")
  const formattedDate = `${year}-${month}-${day}`;
  
  // Create the checkout object
  const checkout = {
      user_id: userId,
      status: 'Pending',
      total:store.calculateTotal(),
      appointmentDate: service.appointmentDate,
      appointmentTime: service.appointmentTime,
      typeService : service.typeService,
      typePet: service.typePet,
      numberPet: service.numberPet,
  };
  const cancelAppointment =()=>{
      store.clearService();
      router.push('/');
  };
  // Now, the 'checkout' object contains the user ID and the formatted date
  const processPayment =()=>{
      if( !cardNumber || !cvv || !expiryDate || !phoneNumber || !recipientName){
          toast.warning('Please fill all the blanks',{position:'top-right'}, {duration: 2000});
          return;
      }
      axiosClient.post('/service/checkout',checkout).then((res)=>{
          console.log(res.data);
          store.clearService();
          toast.success('Payment Success',{position:'top-right'}, {duration: 2000});
          setTimeout(()=>{
              router.push('/');
          },2000)
         
          
      }).catch((err)=>{
          console.log(err);
      })
  };
  
  onMounted(()=>{
      store.loadServiceItemsFromLocalStorage();
      console.log(store.getServiceItems);
  })
  
  
  </script>
  
  <style scoped>
  /* Checkout container styles */
  .checkout-page {
    display: flex;
    justify-content: space-between;
    margin: 60px;
  }
  
  .checkout-container {
    width: 45%;
    padding: 40px;
    border: 1px solid #ccc;
  }
  
  .checkout-title {
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  .user-info {
    margin-bottom: 20px;
  }
  
  input[type="text"],
  input[type="tel"],
  input[type="number"],
  textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .custom-date-input {
    appearance: textfield; /* Makes it look like a text input */
    -moz-appearance: textfield; /* Firefox support */
    -webkit-appearance: textfield; /* WebKit support */
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
  }
  
  button.checkout-button {
    background-color: #494949;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    width: 280px;
  }
  
  button.checkout-button:hover {
    background-color: #707070;
    
  }
  /* Cart summary styles */
  .cart-summary {
    width: 45%;
    padding: 40px;
    border: 1px solid #ccc;
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
  
  </style>
  