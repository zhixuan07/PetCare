<template>
    <div>
      <!-- Header Component -->
      <Header_checkout />
  
      <div class="checkout-page">
        <div class="checkout-container">
          <h2 class="checkout-title">Checkout</h2>
          <div class="user-info">
            <label for="recipientName">Recipient Name</label>
            <input type="text" id="recipientName" v-model="recipientName" />
  
            <label for="address">Address</label>
            <textarea id="address" v-model="address"></textarea>
  
            <label for="phoneNumber">Phone Number</label>
            <input type="tel" id="phoneNumber" v-model="phoneNumber" @input="formatPhoneNumber"/>
  
            <label for="cardNumber">Card Number</label>
            <input type="text" id="cardNumber" v-model="cardNumber" @input="formatCardNumber" />
  
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" v-model="cvv" />
  
            <label for="expiryDate">Expiry Date</label>
            <input type="date" id="expiryDate" v-model="expiryDate" class="custom-date-input"/>
  
            <!-- You can add a date picker component here if needed -->
          </div>
          <button class="checkout-button" @click="processPayment">Pay Now</button>
        </div>
  
        <div class="cart-summary">
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
                <tr v-for="(item, index) in cartItems" :key="index">
                    <td>{{ item.name }}</td>
                    <td>{{ item.quantity }}</td>
                    <td>{{ item.unitPrice * item.quantity }}</td>
                </tr>
                </tbody>
            </table>
            <div class="total-amount">
                <p>Total: {{ calculateSubtotal() }}</p>
            </div>
        </div>

        
      </div>
  
   
    </div>
  </template>
  
  <script>
  import Header_checkout from '../components/Header_checkout.vue';
  
  export default {
    components: {
      Header_checkout,
    },
    data() {
      return {
        recipientName: '',
        address: '',
        phoneNumber: '',
        cardNumber: '',
        cvv: '',
        expiryDate: '',
        cartItems: [
          // Initialize this array with your cart items (e.g., { name: "Product Name", unitPrice: 10.99, quantity: 1 })
        ],
      };
    },
    methods: {
        formatPhoneNumber() {
            this.phoneNumber = this.phoneNumber.replace(/\D/g, ''); // Remove non-digit characters

            // Ensure the phone number has 10 to 11 digits
            if (/^\d{10,11}$/.test(this.phoneNumber)) {
                // Phone number is valid
            } else {
                // Phone number is invalid
                // You can display an error message or take other actions here
            }
        },
        formatCardNumber() {
            // Ensure the card number has only 16 digits
            this.cardNumber = this.cardNumber.replace(/\D/g, '').substring(0, 16);
        },
        calculateSubtotal() {
            return this.cartItems.reduce((total, item) => total + item.unitPrice * item.quantity, 0);
        },
        processPayment() {
            // Handle the payment process here
            // You can implement payment logic, send data to a server, or navigate to a confirmation page
        },
    },
  };
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
  