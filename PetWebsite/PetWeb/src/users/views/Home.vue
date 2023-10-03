<template>
    <div class="homepage">
      <!-- Header Component -->
      <Header />
  
      <!-- Banner/Slider Component -->

  
      <!-- Product Categories Component -->
      <ProductCategories />
  
      <!-- Promotional Content Component -->
      <PromotionalContent />
  
      <!-- Testimonials Component  -->
      <Testimonials />
  
      <!-- Shop Now Call to Action -->
      <div class="shop-now">
        <button @click="redirectToShop">Shop Now</button>
      </div>
  
      <!-- Footer Component -->
      <Footer />
    </div>
  </template>
  
  <script>
  import Header from '../components/Header.vue';
  import BannerSlider from '../components/BannerSlider.vue';
  import ProductCategories from '../components/ProductCategories.vue';
  import PromotionalContent from '../components/PromotionalContent.vue';
  import Testimonials from '../components/Testimonials.vue';
  import Footer from '../components/Footer.vue';
  
  export default {
    components: {
      Header,
      BannerSlider,
      ProductCategories,
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
  /* Add your homepage-specific styles here */
  </style>
  