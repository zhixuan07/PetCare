<template>
  <header class="header">
    <div class="logo">
      <img src="../assets/icon1.svg" alt="PetCare Logo">
    </div>
  
    <nav class="navigation">
      <!-- Navigation links -->
      <router-link to="/">Home</router-link>
      <router-link to="/products">Products</router-link>
      <router-link to="/about">About Us</router-link>
      <router-link to="/contact">Contact</router-link>
    </nav>
    <div class="actions">
      

      <router-link to="/cart">
        <i class="fas fa-shopping-cart" style='font-size:25px'></i>
      </router-link>

    </div>
  </header>
</template>


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