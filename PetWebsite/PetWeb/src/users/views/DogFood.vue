<template>
  <div class="food">
      <!-- Header Component -->
      <Header />

      <div class="food-page">
          <h1 class="title">DOG TOYS</h1>

          <!--filters-->
          <div class="filters d-flex align-items-center">
              <div class="filter">
                  <label for="sort-by">Sort By : </label>
                  <select
                      id="sort-by"
                      v-model="sortBy"
                      @change="sortProducts"
                      class="custom-select"
                  >
                      <option value="best selling">Best Selling</option>
                      <option value="a-z">A-Z</option>
                      <option value="z-a">Z-A</option>
                      <option value="price-low-to-high">
                          Price, Low to High
                      </option>
                      <option value="price-high-to-low">
                          Price, High to Low
                      </option>
                  </select>
              </div>
          </div>
          <div
              v-if="sortBy === 'best selling'"
              class="card card-compact bg-base-100 shadow-xl"
              v-for="product in products"
              :key="product.id"
              @click="navigateProductDetails(product)"
          >
          
              <figure>
                  <img :src="product.image_path" :alt="product.name" />
              </figure>
              <div class="card-body">
                  <h2 class="card-title">{{ product.name }}</h2>
                  <h2 class="card-title">RM {{ product.price }}</h2>
               
              </div>
          </div>

      
          <div 
              class="card card-compact bg-base-100 shadow-xl"
              v-for="product in filteredProducts"
              :key="product.id"
              @click="navigateProductDetails(product)"
          >
     
              <figure>
                  <img :src="product.image_path" :alt="product.name" />
              </figure>
              <div class="card-body">
                  <h2 class="card-title">{{ product.name }}</h2>
                  <h2 class="card-title">RM {{ product.price }}</h2>

              </div>
          </div>
          <!--end of cards-->
      </div>

      <!-- Footer Component -->
      <Footer />
  </div>
</template>

<script setup>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import axiosClient from "../../admin/axiosClient";
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();
const products = ref([]); // Store the list of products
const filteredProducts = ref([]); // Store the filtered list

const sortBy = ref("best selling"); // Default sorting option

const navigateProductDetails = (product) => {
  router.push({ name: "Product", params: { id: product.id } });
};

onMounted((async) => {
  // Fetch the list of products from the API
  axiosClient
      .get("/dogFood")
      .then((response) => {
          products.value = response.data.dog_food_products;
      })
      .catch((error) => {
          console.log(error);
      });
});

const sortProducts = () => {
  filteredProducts.value = [...products.value];
  switch (sortBy.value) {
      case "best selling":
          filteredProducts.value = null
      case "a-z":
          filteredProducts.value.sort((a, b) => a.name.localeCompare(b.name));
          break;
      case "z-a":
          filteredProducts.value.sort((a, b) => b.name.localeCompare(a.name));
          break;
      case "price-low-to-high":
          filteredProducts.value.sort((a, b) => a.price - b.price);
          break;
      case "price-high-to-low":
          filteredProducts.value.sort((a, b) => b.price - a.price);
          break;
      default:
          // Default sorting or no action needed
          break;
  }
};
</script>

<style scoped>
.title {
  font-size: 40px;
  font-weight: bold;
  margin-top: 20px;
  margin-bottom: 35px;
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

.custom-search-button {
  background-color: #26243a; /* Change the background color as desired */
  color: white; /* Change the text color as desired */
  border: none;
  padding: 5px;
  border-radius: 5px;
  width: 100px;
  margin: 0 5px;
  cursor: pointer;
  font-weight: bold;
}

.card {
  display: inline-block;
  width: 100%;
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
