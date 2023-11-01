<template>
    <div class="all">
        <!-- Header Component -->
        <Header />

        <div class="food-page">
            <h1 class="title">ALL</h1>

            <!--search bar-->
            <div class="search-bar ml-auto">
                <input
                    type="text"
                    v-model="searchQuery"
                    placeholder="Search for products"
                />
                <button @click="searchProducts" class="custom-search-button">
                    Search
                </button>
            </div>

            <!--filters-->
            <div class="filters">
                <div class="filter">
                    <label for="availability">Availability :</label>
                    <select id="availability" class="custom-select">
                        <option value="in-stock">In Stock</option>
                        <option value="out-of-stock">Out of Stock</option>
                    </select>
                </div>
                <div class="filter">
                    <label for="price-range">Price Range (MYR) :</label>
                    <input
                        type="number"
                        id="from-price"
                        placeholder="From"
                        class="price-input"
                    />
                    <span> to </span>
                    <input
                        type="number"
                        id="to-price"
                        placeholder="To"
                        class="price-input"
                    />
                </div>
                <div class="filter">
                    <label for="sort-by">Sort By : </label>
                    <select id="sort-by" class="custom-select">
                        <option value="featured">Featured</option>
                        <option value="best-selling">Best Selling</option>
                        <option value="a-z">A-Z</option>
                        <option value="z-a">Z-A</option>
                        <option value="price-low-to-high">
                            Price, Low to High
                        </option>
                        <option value="price-high-to-low">
                            Price, High to Low
                        </option>
                        <option value="date-old-to-new">
                            Date, Old to New
                        </option>
                        <option value="date-new-to-old">
                            Date, New to Old
                        </option>
                    </select>
                </div>
            </div>

            <!--cards-->
            
                <div class="card card-compact bg-base-100 shadow-xl"  v-for="product in products" :key="product[0]">
                    <figure>
                        <img
                            :src="product.image_path"
                            alt="girl"
                            @click=navigateProductDetails(product)
                        />
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">{{ product.name }}</h2>
                        
                      
                    </div>
                </div>
               
          

            <!--end of cards-->
        </div>

        <!-- Footer Component -->
        <Footer />
    </div>
</template>

<script setup >
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import axiosClient from "../../admin/axiosClient";
import { onMounted,ref } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
const products = ref([]); // Store the list of products
const filteredProducts = ref([]); // Store the filtered list
const searchQuery = ref(''); // User's search query
const selectedAvailability = ref('in-stock'); // Default availability filter
const minPrice = ref(null); // Minimum price filter
const maxPrice = ref(null); // Maximum price filter
const sortBy = ref('featured'); // Default sorting option

const navigateProductDetails = (product)=>{
    router.push({name:'Product',params:{id:product.id}})
}

onMounted (async => {
    // Fetch the list of products from the API
    axiosClient
      .get('/products')
      .then((response) => {
        products.value = response.data;
     
      })
      .catch((error) => {
        console.log(error);
      });
  });
const searchProducts = () => {
  // Implement your product filtering logic here.
  filteredProducts.value = products.value.filter((product) => {
    // Filter based on availability
    if (
      selectedAvailability.value === 'in-stock' && !product.inStock
    ) {
      return false;
    }
    if (
      selectedAvailability.value === 'out-of-stock' && product.inStock
    ) {
      return false;
    }

    // Filter based on price range
    if (
      (minPrice.value !== null && product.price < minPrice.value) ||
      (maxPrice.value !== null && product.price > maxPrice.value)
    ) {
      return false;
    }

    // Implement other filters as needed

    // Filter based on the search query (keyword relevance)
    if (
      searchQuery.value !== '' &&
      !product.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    ) {
      return false;
    }

    return true;
  });

  // Sort the filtered products based on the selected sorting option
  sortProducts();
};

const sortProducts =()=> {
            // Implement the logic to sort the products based on the selected sorting option
}
const navigateToProductPage= ()=> {
            // Implement the navigation logic to the product page when a card is clicked
            // You may use Vue Router or other navigation methods.
 }

</script>

<style scoped>
.food-page {
    background-color: white;
    color: black;
    text-align: center;
    padding: 20px;
}

.title {
    font-size: 40px;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 35px;
}

input[type="text"],
textarea {
    width: 800px;
    height: 45px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.custom-search-button {
    background-color: #26243a;
    color: white;
    border: none;
    padding: 5px;
    border-radius: 5px;
    width: 100px;
    height: 45px;
    margin: 0 5px;
    cursor: pointer;
    font-weight: bold;
}

.custom-search-button:hover {
    background-color: #3e3d49;
}

.filters {
    margin: 20px 0;
}

.filter {
    display: inline-block;
    margin-right: 20px;
}

.price-input {
    border: 1px solid #ccc;
    padding: 5px;
    width: 170px;
    margin: 0 5px;
    border-radius: 5px;
}
.custom-select {
    border: 1px solid #ccc;
    padding: 5px;
    width: 170px;
    margin: 0 5px;
    border-radius: 5px;
}

.card {
    display: inline-block;

    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
    cursor: pointer;
}

.card-img {
    height: 250px;
    object-fit: cover;
}

.product-name {
    font-weight: bold;
}

.unit-price {
    margin-top: 10px;
}
</style>
