<template>
    <div class="product">
        <!-- Header Component -->
        <Header />

        <div class="product-page"  >
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Image Gallery -->
                        <div class="image-gallery">
                            <!-- Render each image -->
                            <div class="image-item">
                                <img :src="product.image_path" alt="Image 1" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="font-bold text-xl">{{ product.name }}</h1>
                      <p class="product-description">
                               {{ product.description }}
                            </p>
                        <!-- Product Information -->
                        <div class="product-info">
                            <h1 class="product-title"></h1>
                            <p class="unit-price mt-5">Unit Price: RM{{ product.price }}</p>
                            <div class="quantity-control">
                                <button @click="decrementQty">-</button>
                                <span class="quantity" >{{ quantity }}</span>
                                <button @click="incrementQty">+</button>
                            </div>
                            <div class="flex flex-row gap-10 items-center justify-center mt-5">
                                <!-- Use Bootstrap's d-flex and flex-column classes -->
                                <button
                                    @click="store.addToCart(product,quantity)"
                                    class="btn btn-primary mb-2 custom-button"
                                >
                                    Add to Cart
                                </button>
                                <button
                                    @click="buynow(product,quantity)"
                                    class="btn btn-success custom-button"
                                >
                                    Buy Now
                                </button>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
            <Review/>

      
  
        <!-- Footer Component -->
        <Footer />
    </div>
</template>

<script setup>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import Review from "../components/Review.vue";
import axiosClient from "../../admin/axiosClient";
import { useCartStore } from "../stores/cart";
import { RouterLink,useRoute,useRouter } from 'vue-router';
import {ref,onMounted,computed} from "vue";

const store = useCartStore();
function loadCartItemsFromLocalStorage() {
  const items = JSON.parse(localStorage.getItem('cart')) || [];
  store.setCartItems(items); // Call the mutation to set cart items
}
const cartItems = computed(() => store.getCartItems);
const route = useRoute();
const router = useRouter();
const quantity = ref(1);
const product =ref({
  id:"",
  name: "",
  description:"",
  price:"",
  image_path:"",
  brand:"",
  category:"",
  stock:"",
  ingredients:"",

});

onMounted(()=>{
    axiosClient.get(`/product/${route.params.id}`).then((res) => {
        const response= res.data.product;
      product.value = {
        id:response.id,
        name:response.name,
        description:response.description,
        price:response.price,
        image_path:response.image_path,
        brand:response.brand,
        category:response.category,
        stock:response.stock,
        ingredients:response.ingredients,
      }
      loadCartItemsFromLocalStorage();
      
    });
})



const incrementQty = () => {
    
    quantity.value++;
};
const decrementQty = () => {
    if (quantity.value > 1) {
        quantity.value--;
    }
    // Implement logic to decrement quantity
};

const buynow= (product,quantity) => {
    // Implement logic to buy now
    store.buyNow(product,quantity);
    router.push("/cart");
};
</script>


<style scoped>
.product-page {
  background-color: white;
  color: black;
  text-align: center;
  padding: 20px;
  margin-left: 200px;
  margin-right: 200px;
}

.image-gallery {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.image-item {
  width: 100%;
  padding: 10px; /* Add padding for spacing between images if needed */
}

.image-item img {
  width: 100%; /* Ensure the image width is 100% of the image item's width */
  height: auto; /* Maintain the image's aspect ratio */
  object-fit: cover; /* Cover the entire container while maintaining the aspect ratio */
  max-height: 100%; /* Prevent the image from exceeding the height of the container */
}

.product-title {
  font-size: 40px;
  font-weight: bold;
}

.unit-price {
  font-size: 20px;
  font-weight: bold;
}


.quantity-control{
  border: none;
  padding: 5px 10px;
  margin: 5px 5px;
}
.quantity-control button {
  background-color: #303030;
  color: azure;
  border: none;
  margin: 0 10px;
  border-radius: 20%;
  width: 40px; 
  height: 40px; 

}

.custom-button {
  width: 230px; 
}

.product-description {
  margin-top: 20px;
}


@media screen and (max-width: 768px) {
  .product-page {
    margin: 15px 15px 200px 15px;
  }

}
</style>


