<template>
  <div class="grooming">
      <!-- Header Component -->
      <Header />
  
      <div class="grooming-page">
          <h1 class="title">GROOMING SERVICES</h1>
          <p class="service-comment">Select a service to book an appointment!</p>

          <!-- List of Grooming Services -->
          <div class="grooming-services">
              <!-- You can loop through your grooming services data and display them as cards or a list -->
              <div class="card" @click="bookBathService">
                  <img class="card-img" src="../assets/bathservice.jpg" alt="Grooming Service Image">
                  <p class="service-name">Bath and Brush</p>
                  <p class="service-price">RM 50.00</p>
              </div>
              <div class="card" @click="bookStylingService">
                  <img class="card-img" src="../assets/stylingservice.png" alt="Grooming Service Image">
                  <p class="service-name">Haircut and Styling</p>
                  <p class="service-price">RM 65.00</p>
              </div>
          </div>
      </div>

      <!-- Footer Component -->
      <Footer />
  </div>
</template>

<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';

export default {
  components: {
      Header,
      Footer
  },
  methods: {
      bookBathService() {
          // Implement the logic to navigate to the booking page for the selected grooming service.
          // You may use Vue Router or other navigation methods.
          this.$router.push('/groomingAppointment'); // Navigate to the Bath Service page
      },
      bookStylingService() {
          // Implement the logic to navigate to the booking page for the selected grooming service.
          // You may use Vue Router or other navigation methods.
          this.$router.push('/groomingAppointment'); // Navigate to the Bath Service page
      },
  },
};
</script>

<style scoped>
.grooming-page {
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

.service-comment {
  justify-content: center;
  margin-bottom: 35px;
}

.grooming-services {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px; /* Adjust the gap between grooming service cards as desired */
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
  margin: 10px;
}

.service-name {
  font-weight: bold;
}

.service-price {
  margin-top: 10px;
}
</style>
