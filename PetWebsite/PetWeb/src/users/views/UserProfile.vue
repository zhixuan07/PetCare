<template>
    <div class="profile">
        <!-- Header Component -->
        <Header />

        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="title">USER PROFILE</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mt-4 d-flex flex-column align-items-center">
                    <div class="profile-picture-container">
                        <img class="profile-picture" src="../assets/featuredproduct.png" alt="Profile Picture">
                    </div>
                    <br>
                    <button class="btn btn-primary mt-2">Upload New Profile Image</button>
                    <router-link to="/editprofile">
                        <button class="btn btn-primary mt-2">Edit Profile</button>
                    </router-link>
                   
                    <router-link to="/orders">
                        <button class="btn btn-primary mt-2">View Orders</button>
                    </router-link>
                </div>
            

                <div class="col-lg-8 mt-4 user-info">
                    <h4>USER DETAILS</h4><br>
                    <p><strong>Username</strong> <span>JohnDoe123</span></p>
                    <p><strong>Name</strong> <span>John Doe</span></p>
                    <p><strong>Email</strong> <span>john.doe@example.com</span></p>
                    <p><strong>Contacts</strong> <span>123-456-7890</span></p>
                </div>
                  
            </div>
        </div>
      
        <!-- Footer Component -->
        <Footer />
    </div>
</template>

<script setup>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
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

.title {
    font-size: 40px;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 35px;
}

h4 {
    font-size: large;
    font-weight: bold;
}

.btn {
    width: 250px;
}


/*user profile section*/
.user-info p{
    margin-bottom: 20px;
}

.profile-picture-container {
    width: 250px;
    height: 250px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
}

.profile-picture {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.user-info p {
  margin-bottom: 10px;
}

.user-info strong {
  display: inline-block;
  width: 100px; /* Adjust the width as needed */
}

.user-info span {
  display: inline-block;
  margin-left: 80px; /* Adjust the spacing as needed */
}

@media (max-width: 600px) {
  
  .user-info p {
    display: flex;
    flex-wrap: wrap;
    align-items: baseline;
    margin-bottom: 5px; /* Adjust the spacing as needed */
  }


  .user-info strong {
    width: 100px; /* Adjust the width as needed */
  }

  
  .user-info span {
    flex: 1;
    margin-left: 5px; /* Adjust the spacing as needed */
  }
}
  

</style>


