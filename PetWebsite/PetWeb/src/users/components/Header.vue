<template>
  <header>
    <div class="desktop-view">
      <div class="logo">
        <img src="../assets/logo.png" alt="PetCare Logo">
      </div>
  
      
  
      <nav class="navigation">
        <!-- Navigation links -->
        <router-link to="/home">HOME</router-link>
        <router-link to="/all">ALL</router-link>
  
        <!-- Dropdown for FOOD -->
        <div class="dropdown" @mouseover="showDropdown('food')" @mouseleave="hideDropdown('food')">
          <router-link to="/food">FOOD</router-link>
          <div class="dropdown-content" v-if="foodDropdownOpen">
            <router-link to="/food/cat">CAT FOOD</router-link>
            <router-link to="/food/dog">DOG FOOD</router-link>
          </div>
        </div>
  
        <!-- Dropdown for TOYS -->
        <div class="dropdown" @mouseover="showDropdown('toys')" @mouseleave="hideDropdown('toys')">
          <router-link to="/toys">TOYS</router-link>
          <div class="dropdown-content" v-if="toysDropdownOpen">
            <router-link to="/toys/cat">CAT TOYS</router-link>
            <router-link to="/toys/dog">DOG TOYS</router-link>
          </div>
        </div>
  
        <router-link to="/grooming">GROOMING</router-link>
        <router-link to="/services">PET SERVICES</router-link>
        <router-link to="/test2">6est2</router-link>
      </nav>
  
      
  
      <div class="actions">
        <router-link to="/cart">
          <i class="fas fa-shopping-cart" style="font-size: 25px;"></i>
        </router-link>
      </div>
    </div>

    <div class="mobile-view">
      <!-- Mobile menu -->

      <div class="mobile-menu-button" @click="toggleMobileMenu">
        <i class="fas fa-bars" style="font-size: 20px;"></i>
      </div>

      <div class="mobile-menu" v-if="mobileMenuOpen">

        <!-- Close button -->
        <div class="close-button" @click="closeMobileMenu">
          <i class="fas fa-times" style="font-size: 20px;"></i>
        </div>

        <!-- Mobile menu links -->
        <router-link to="/home">HOME</router-link>
        <router-link to="/all">ALL</router-link>
        <router-link to="/food/cat">CAT FOOD</router-link>
        <router-link to="/food/dog">DOG FOOD</router-link>
        <router-link to="/toys/cat">CAT TOYS</router-link>
        <router-link to="/toys/dog">DOG TOYS</router-link>
        <router-link to="/grooming">GROOMING</router-link>
        <router-link to="/services">PET SERVICES</router-link>
      </div>


      <div class="logo">
        <img src="../assets/logo.png" alt="PetCare Logo">
      </div>



      <!--cart-->
      <div class="actions">
        <router-link to="/cart">
          <i class="fas fa-shopping-cart" style="font-size: 25px;"></i>
        </router-link>
      </div>
    </div>
    
  </header>
</template>

<script>
export default {
  data() {
    return {
      foodDropdownOpen: false,
      toysDropdownOpen: false,
      mobileMenuOpen: false,
    };
  },
  methods: {
    showDropdown(category) {
      if (category === 'food') {
        this.foodDropdownOpen = true;
        this.toysDropdownOpen = false;
      } else if (category === 'toys') {
        this.toysDropdownOpen = true;
        this.foodDropdownOpen = false;
      }
    },
    hideDropdown(category) {
      if (category === 'food') {
        this.foodDropdownOpen = false;
      } else if (category === 'toys') {
        this.toysDropdownOpen = false;
      }
    },
    toggleMobileMenu() {
      this.mobileMenuOpen = !this.mobileMenuOpen;
    },
    closeMobileMenu() {
    this.mobileMenuOpen = false;
  },
  },
};
</script>

<style scoped>
/* Add your header styles here */



.desktop-view{
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 25px;
  background-color: #fff;
  color: #333;
  border-bottom: 1px solid grey;
}

.mobile-view {
  display: none;
}

.logo img {
  max-width: 150px;
}

.mobile-menu-button {
  display: none; /* Hide by default on larger screens */
  cursor: pointer;
}

/* Navigation styles */
.navigation {
  display: flex;
  align-items: center;
}

.navigation a {
  text-decoration: none;
  color: #333;
  margin: 0 14px;
}

.navigation a:hover {
  text-decoration: underline;
}

/* Dropdown styles */
.dropdown {
  position: relative;
  cursor: pointer;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}

/* Style for individual dropdown items */
.dropdown-content a {
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  color: #333;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

/* Media query for mobile */
@media screen and (max-width: 768px) {

  .desktop-view{
    display: none;
  }

  .mobile-view {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #fff;
    color: #333;
    border-bottom: 1px solid grey;
  }


  .logo {
    text-align: center;
  }

  .mobile-menu-button {
    display: block; /* Show on mobile screens */
    margin-left: 10px;
  }

  .navigation {
    display: none; /* Hide by default on mobile screens */
  }

 

  .mobile-menu {
    display: block;
    background-color: #b8f8e8;
    padding: 20px;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 2;
  }

  .mobile-menu a {
    display: block;
    color: #333;
    margin-bottom: 15px;
    font-size: 18px;
    text-decoration: none;
  }

  .mobile-menu a:hover {
    text-decoration: underline;
  }

  .close-button {
    cursor: pointer;
    position: absolute;
    top: 20px;
    right: 20px;
   
  }

  .actions {
    margin-right: 10px;
  }

}
</style>