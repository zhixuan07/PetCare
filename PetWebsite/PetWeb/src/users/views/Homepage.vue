<template>
  <div class="homepage">
    <!-- Header Component -->
    <Header />


    <!-- Promotional Content Component -->
    <PromotionalContent />
    <div class="home-page">
      <h1 class="title">BEST SELLER</h1>

      <!--cards-->
      <div class="row product-cards">
          <div class="col-md-3 col-sm-6 mb-4">
              <div class="card" @click="navigateToProductPage">
              <img class="card-img" src="../assets/girl.jpg" alt="Product Image">
              <p class="product-name">Product Name 1</p>
              <p class="unit-price">RM 10.99</p>
              </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
              <div class="card" @click="navigateToProductPage">
              <img class="card-img" src="../assets/girl.jpg" alt="Product Image">
              <p class="product-name">Product Name 2</p>
              <p class="unit-price">RM 15.99</p>
              </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
              <div class="card" @click="navigateToProductPage">
              <img class="card-img" src="../assets/guy.jpg" alt="Product Image">
              <p class="product-name">Product Name 3</p>
              <p class="unit-price">RM 8.99</p>
              </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
              <div class="card" @click="navigateToProductPage">
              <img class="card-img" src="../assets/guy.jpg" alt="Product Image">
              <p class="product-name">Product Name 4</p>
              <p class="unit-price">RM 12.49</p>
              </div>
          </div>
      </div>
      <!--end of cards-->

    </div>





    <!-- Testimonials Component  -->
    <Testimonials />

    

    <!-- Footer Component -->
    <Footer />
  </div>
</template>

<script>
import Header from '../components/Header.vue';
import PromotionalContent from '../components/PromotionalContent.vue';
import Testimonials from '../components/Testimonials.vue';
import Footer from '../components/Footer.vue';

export default {
  components: {
    Header,
    PromotionalContent,
    Testimonials,
    Footer,
  },
  methods: {
    redirectToShop() {
      // Implement navigation to the shop page
      // You may use Vue Router for this purpose.
    },
  },
};
</script>

<style scoped>

.home-page {
  background-color: white;
  color: black;
  text-align: center;
  padding: 20px;
}

/* Add your homepage-specific styles here */
.card {
  display: inline-block;
  width: 100%;
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
