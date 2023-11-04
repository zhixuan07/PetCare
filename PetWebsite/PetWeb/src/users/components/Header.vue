<template>
  <header class="header">
    <div class="logo">
      <img src="../assets/icon1.svg" alt="PetCare Logo">
    </div>
  
    <nav class="navigation">
      <!-- Navigation links -->
      <router-link to="/">HOME</router-link>
      <router-link to="/all">ALL</router-link>
      <router-link to="/food">FOOD</router-link>
      <router-link to="/grooming">GROOMING</router-link>
      <router-link to="/toys">TOYS</router-link>
      <router-link to="/services">PET SERVICES</router-link>
      <router-link to="/product">individuall product test</router-link>
      <router-link to="/checkout">checkout test</router-link>

      <router-link to="/test">test page from gpt</router-link>
      <router-link to="/test2">test page 2</router-link>
      <a @click="store.logout">LogOut</a>
    </nav>
    <div class="actions">
      

      <router-link to="/cart">
        <i class="fas fa-shopping-cart" style='font-size:25px'></i>
      </router-link>

    </div>
  </header>
</template>




<script setup>
import { useUserStore } from '../stores/user';
const store = useUserStore();

</script>


<style scoped>
/* Add your header styles here */

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 25px;
  background-color: #fff;
  color: #333;
  border-bottom: 1px solid grey;
}

.logo img {
  max-width: 150px;
}

/* Navigation styles */
.navigation {
  display: flex;
  align-items: center;
}

.navigation a {
  text-decoration: none;
  color: #333;
  margin: 0 10px;
}

.navigation a:hover {
  text-decoration: underline;
}

/* Hamburger menu button styles */
.menu-button {
  display: none; /* Initially hide the button */
  background: none;
  border: none;
  cursor: pointer;
  font-size: 24px;
  color: #fff;
  padding: 0;
  margin-right: 10px;
}
</style>