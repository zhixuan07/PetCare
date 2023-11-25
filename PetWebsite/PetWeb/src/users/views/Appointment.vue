<template>
  <div>
      <!-- Header Component -->
      <Header />
      
      <div class="appointment-page">

        <h1 class="title">APPOINTMENT HISTORY</h1>
        <div class="tab-container">
            <div
            class="tab"
            v-for="(tab, index) in tabs"
            :key="index"
            @click="activeTab = tab"
            :class="{ 'active-tab': activeTab === tab }"
            >
            {{ tab }}
            </div>
        </div>
    
        <div class="order-cards">
          <router-link
            v-for="appointment in filteredAppointment"
            :key="appointment.id"
            :to="'/userOrderDetails/' + appointment.id"
          >
            <div class="order-card" :class="appointment.status">
              <div class="order-id"> ID: {{ appointment.id }}</div>
              <div class="order-date">Date: {{ appointment.Date }}</div>
              <div class="order-date">Time: {{ appointment.Time }}</div>
              <div class="order-amount">Total Amount: ${{ appointment.Type_service }}</div>
              <div class="order-status">Status: {{ appointment.Status }}</div>
            </div>
          </router-link>
        </div>

        <div class="container my-3 text-center">
          <router-link to="/userprofile">
              <button class="btn btn-link">Back to Profile</button>
          </router-link>
        </div>


      </div>
      

      <!-- Footer Component -->
      <Footer />
  </div>
</template>

<script setup>
import { ref, computed,onMounted } from 'vue';
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
import { useRouter } from "vue-router";
import axiosClient from '../../admin/axiosClient';
const router = useRouter();
onMounted(async () => {
  const userString = localStorage.getItem('user');
  const user = JSON.parse(userString);
  try {
      // fetch appointment data
      const response = await axiosClient.get(`/userAppointment/${user.id}`);
      // insert appointment data into appointment ref
      appointment.value = response.data.Appointment;

    } catch (error) {
      console.error('Error fetching appointment:', error);
    }
    
});

// appointment data
const appointment = ref([]);

const tabs = ['All', 'Pending','Completed', 'Cancelled'];
const activeTab = ref('All');
// filter appointment based on active tab
const filteredAppointment = computed(() => {
  if (activeTab.value === 'All') {
    return appointment.value;
  } else {
    return appointment.value.filter(appointment => appointment.Status === activeTab.value);
  }
});
</script>

<style scoped>

.appointment-page {
  padding: 20px;
  margin-left: 100px;
  margin-right: 100px;
}

.title {
  font-size: 40px;
  font-weight: bold;
  margin-top: 20px;
  margin-bottom: 35px;
  text-align: center;
}
.tab-container {
  display: flex;
  margin-bottom: 20px;
  justify-content: center;
}

.tab {
  width: 100px;
  cursor: pointer;
  user-select: none;
  color: black;
  border-bottom: 3px solid  #ffffff;
}

.tab::before {
  content: '';
  position: absolute;
  top: 0;
  right: -1px; 
  bottom: 0;
  width: 1px;
  background-color: #ccc; /* Vertical line color */
}

.tab::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0px; 
  bottom: 0;
  width: 1px;
  background-color: #ccc; /* Vertical line color */
}

.active-tab {
  border-bottom: 3px solid  #5d5e5e;
}

.order-cards {
  display: flex;
  flex-direction: column; /* Each card is displayed in a new row */
}

.order-card {
  border: 2px solid #ccc;
  padding: 10px;
  background-color: #fff;
  margin-bottom: 10px; /* Add some spacing between cards */
  border-radius: 10px;
}

.completed {
  border-color: green;
  background-color: rgb(144, 196, 144);
}

.canceled {
  border-color: rgb(255, 33, 88);
  background-color: rgb(243, 152, 152);
}

.pending {
  border-color: orange;
  background-color: rgb(255, 217, 145);
}

@media screen and (max-width: 768px) {
  .appointment-page {
    margin: 15px 15px 200px 15px;
  }

}
</style>
