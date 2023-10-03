<template>
  <div class="banner-slider">
    <div class="slide" v-for="(slide, index) in slides" :key="index">
      <img :src="slide.image" :alt="slide.alt" />
      <div class="slide-content">
        <h3>{{ slide.title }}</h3>
        <p>{{ slide.description }}</p>
        <router-link to="/products" class="btn">Shop Now</router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      slides: [
        {
          image: "../assets/promotional_test1.jpg",
          alt: "Slide 1",
          title: "Discover Our Latest Products",
          description: "Shop the best selection of pet supplies!",
        },
        {
          image: "../assets/promotional_test2.jpg",
          alt: "Slide 2",
          title: "Get Free Shipping on Orders Over $50",
          description: "Don't miss out on this limited-time offer.",
        },
        // Add more slides as needed
      ],
    };
  },
};
</script>

<style scoped>
/* Add your banner slider styles here */
.banner-slider {
  /* Add styles for the banner slider container */
}

.slide {
  /* Add styles for individual slides */
  text-align: center;
  position: relative;
}

.slide img {
  max-width: 100%;
  height: auto;
}

.slide-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  color: #fff;
}

.slide-content h3 {
  font-size: 24px;
  margin-bottom: 10px;
}

.slide-content p {
  font-size: 16px;
  margin-bottom: 20px;
}

.btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #ff5733;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  font-weight: bold;
}

/* You can add more specific styles for your banner slider as needed */
</style>
