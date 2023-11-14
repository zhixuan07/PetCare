<template>
  <div>
    <!-- Header Component -->
    <Header />

    <div class="cart-page">
      <h1 class="title">CART</h1>

      <table class="cart-table">
        <thead>
          <tr>
            <th>Products</th>
            <th>Qty</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example cart items - Replace with your actual data -->
          <tr v-for="item in store.getCartItems" :key="item.id">
            <td class="product-cell">
              <div class="product-info">
                <img :src="item.image_path" alt="Product Image" class="product-image" />
                
              </div>
              <div class="product-details">
                  <p class="product-name">{{ item.name }}</p>
                  <p class="unit-price">RM {{ item.price }}</p>
              </div>
            </td>
            
            <td class="quantity-cell">
              <input type="number" v-model="item.quantity" min="1"  @input="store.updateItemQuantity(item,$event)"/>
              <button @click="store.removeFromCart(item)" class="remove-item">Remove</button>
            </td>

            <td class="total-cell">RM {{ store.calculateItemTotal(item)  }}</td>
          </tr>

          <!-- Example cart items - Replace with your actual data -->
          <tr>
            <td class="product-cell">
              <div class="product-info">
                <img src="../assets/square.png" alt="Product Image" class="product-image" />
                
              </div>
              <div class="product-details">
                  <p class="product-name">Product 1</p>
                  <p class="unit-price">RM 10.99</p>
              </div>
            </td>
            
            <td class="quantity-cell">
              <input type="number" value="1" min="1"  />
              <button @click="removeItem(0)" class="remove-item">Remove</button>
            </td>
            
            <td class="total-cell">RM 10.99</td>
          </tr>
          
        </tbody>
      </table>

      <div class="subtotal"  >
        <p>SUBTOTAL: RM {{ store.calculateSubTotal() }}</p>
      </div>

      <button class="checkout-button" @click="proceedToCheckout">Checkout</button>
    </div>

    <!-- Footer Component -->
    <Footer />
  </div>
</template>

<script setup>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
import { useCartStore } from '../stores/cart';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import{useRouter} from 'vue-router';
import { computed, onMounted, ref, watch } from 'vue';

const store = useCartStore();
const router = useRouter();
const proceedToCheckout=() =>{
  if(store.getCartItems.length==0){
    toast.warning('Your cart is empty', {position: 'top-right', duration: 1000});
    return;
  }else{
    router.push({name:'Checkout'});
  }

}

onMounted(() => {

  store.loadCartItemsFromLocalStorage();
  });

</script>

<style scoped>
.cart-page {
  background-color: white;
  color: black;
  text-align: center;
  padding: 20px;
  margin-left: 50px;
  margin-right: 50px;
}

.title {
  font-size: 40px;
  font-weight: bold;
  margin-top: 20px;
  margin-bottom: 35px;
}

.cart-table {
  width: 100%;
  border-collapse: collapse;
  border-bottom: 1px solid #ccc;
}


.cart-table th {
  padding: 10px;
  border-bottom: 1px solid #ccc;
  text-align: left;
  font-weight: normal;
  color: #424242;
}

.cart-table td {
  padding: 10px;
  text-align: left;
}

.product-cell {
  display: flex;
  align-items: center;
}

.product-image {
  width: 200px; /* Adjust the size as needed */
  height: 200px; /* Adjust the size as needed */
}



.product-details {
  margin-left: 10px;
  text-align: left;
}

.product-name {
  font-weight: bold;
}

.unit-price {
  font-size: 14px;
  color: #888;
}

.quantity-cell {
 
  align-items: center;
  justify-content: center;
}

input[type="number"] {
  width: 90px;
  height: 40px;
  text-align: center;
  margin-right: 10px;
  border: 2px solid #3b3b3b;
  border-radius: 5px;
}

.remove-item {
  color: #888;
}

.total-cell {
  font-weight: bold;
}

.subtotal {
  margin-top: 20px;
  font-size: 25px;
}

.checkout-button {
  background-color: #2a2a2a;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 18px;
  margin-top: 20px;
  width: 300px;
}

.checkout-button:hover {
  background-color: #4d4d4d;
}

/* Media query for mobile */
@media screen and (max-width: 768px) {

  .product-cell {
    flex-direction: column;
    align-items: flex-start;
  }

  .product-image {
    width: 75px;
    height: 75px;
  }

  .product-details {
    margin-top: 10px; /* Add some spacing between product-info and product-details */
    margin-left: 0;
  }


  .cart-page {
    background-color: white;
    color: black;
    text-align: center;
    margin: 0px;
  }

  input[type="number"] {
    width: 60px;
    height: 30px;
    text-align: center;
    margin-right: 10px;
    border: 2px solid #ebebeb;
    border-radius: 5px;
  }

  
}


</style>
