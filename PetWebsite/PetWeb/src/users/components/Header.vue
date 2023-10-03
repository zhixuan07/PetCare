<template>
  <header class="header">
    <div class="logo">
      <img src="../assets/icon1.svg" alt="PetCare Logo" />
    </div>
    <!-- Hamburger icon button -->
    <button class="menu-button" @click="toggleMenu">
      <i class="fas fa-bars"></i>
    </button>
    <nav class="navigation" :class="{ 'open': isMenuOpen }">
      <!-- Navigation links -->
      <router-link to="/">Home</router-link>
      <router-link to="/products">Products</router-link>
      <router-link to="/about">About Us</router-link>
      <router-link to="/contact">Contact</router-link>
    </nav>
  </header>
</template>


<style scoped>
/* Add your header styles here */

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
  background-color: #333;
  color: #fff;
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
  color: #fff;
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

/* Media query for smaller screens */
@media (max-width: 768px) {
  .navigation {
    display: none; /* Hide navigation links by default */
    flex-direction: column;
    position: absolute;
    top: 60px; /* Adjust this value as needed to position the menu below the header */
    right: 0;
    background-color: #333;
    z-index: 1;
  }

  .navigation.open {
    display: flex; /* Show navigation links when the menu is open */
  }

  .menu-button {
    display: block; /* Show the menu button on smaller screens */
  }
}
</style>


<script>
export default {
  data() {
    return {
      isMenuOpen: false, // Initially menu is closed
    };
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen; // Toggle menu state
    },
  },
};
</script>
