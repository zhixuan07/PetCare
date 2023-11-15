<template>
    <header>
        <div class="desktop-view">
            <div class="logo">
                <img src="../assets/logo.png" alt="PetCare Logo" />
            </div>

            <nav class="navigation">
                <!-- Navigation links -->
                <router-link to="/">HOME</router-link>
                <router-link to="/all">ALL</router-link>

                <!-- Dropdown for FOOD -->
                <div class="flex-none z-10">
                    <ul class="menu menu-horizontal px-1">
                        <li>
                            <details>
                                <summary>Food</summary>
                                <ul class="p-2 bg-base-100">
                                    <li>
                                        <router-link to="/food/cat"
                                            >Cat Food</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link to="/food/dog"
                                            >Dog Food</router-link
                                        >
                                    </li>
                                </ul>
                            </details>
                        </li>
                    </ul>
                </div>

                <!-- Dropdown for TOYS -->
                <div class="flex-none z-10">
                    <ul class="menu menu-horizontal px-1">
                        <li>
                            <details>
                                <summary>Toys</summary>
                                <ul class="p-2 bg-base-100">
                                    <li>
                                        <router-link to="/food/cat"
                                            >Cat Toys</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link to="/food/dog"
                                            >Dog Toys</router-link
                                        >
                                    </li>
                                </ul>
                            </details>
                        </li>
                    </ul>
                </div>


                <router-link to="/grooming">GROOMING</router-link>
                <router-link to="/services">PET SERVICES</router-link>

                <router-link to="/orderdetails">order details test</router-link>
            </nav>

            <div class="actions" style="display: flex; align-items: center">
                <!-- If user is logged in, show Cart , profile button and Logout button -->

                <router-link
                    to="/cart"
                    v-if="isUserLoggedIn"
                    style="margin-right: 10px"
                >
                    <i class="fas fa-shopping-cart" style="font-size: 25px"></i>
                </router-link>

                <button
                    class="btn"
                    v-if="isUserLoggedIn"
                    style="margin-right: 10px; align-items: center"
                >
                    <router-link to="/userprofile">
                        <i
                            class="fas fa-user-circle"
                            style="font-size: 25px"
                        ></i>
                        <span style="margin-left: 5px">{{ username }}</span>
                    </router-link>
                </button>

                <button
                    class="btn btn-primary"
                    v-if="isUserLoggedIn"
                    @click="logout"
                >
                    Logout
                </button>

                <!-- If user is not logged in, show Login and Register buttons -->
                <div
                    class="container text-center"
                    style="padding: 0px; display: flex"
                >
                    <router-link to="/login" v-if="!isUserLoggedIn">
                        <button
                            class="btn btn-primary"
                            style="margin-left: 10px"
                        >
                            Login
                        </button>
                    </router-link>
                    <router-link to="/register" v-if="!isUserLoggedIn">
                        <button
                            class="btn btn-primary"
                            style="margin-left: 10px"
                        >
                            Register
                        </button>
                    </router-link>
                </div>
            </div>
        </div>

        <div class="mobile-view">
            <!-- Mobile menu -->

            <div class="mobile-menu-button" @click="toggleMobileMenu">
                <i class="fas fa-bars" style="font-size: 20px"></i>
            </div>

            <div class="mobile-menu" v-if="mobileMenuOpen">
                <!-- Close button -->
                <div class="close-button" @click="closeMobileMenu">
                    <i class="fas fa-times" style="font-size: 20px"></i>
                </div>

                <!-- Mobile menu links -->
                <router-link to="/">HOME</router-link>
                <router-link to="/all">ALL</router-link>
                <router-link to="/food/cat">CAT FOOD</router-link>
                <router-link to="/food/dog">DOG FOOD</router-link>
                <router-link to="/toys/cat">CAT TOYS</router-link>
                <router-link to="/toys/dog">DOG TOYS</router-link>
                <router-link to="/grooming">GROOMING</router-link>
                <router-link to="/services">PET SERVICES</router-link>
                <!-- If user is not logged in, show Login and Register buttons -->
                <div class="container text-center" style="padding: 0px">
                    <router-link to="/login" v-if="!isUserLoggedIn">
                        <button class="btn btn-primary" style="width: 330px">
                            Login
                        </button>
                    </router-link>
                    <router-link to="/register" v-if="!isUserLoggedIn">
                        <button class="btn btn-primary" style="width: 330px">
                            Register
                        </button>
                    </router-link>
                </div>

                <div class="container text-center" style="padding: 0px">
                    <!-- If user is logged in, show log out button at expanded menu-->

                    <button
                        class="btn btn-primary"
                        style="width: 330px"
                        v-if="isUserLoggedIn"
                        @click="logout"
                    >
                        Logout
                    </button>
                </div>
            </div>

            <div class="logo">
                <img src="../assets/logo.png" alt="PetCare Logo" />
            </div>

            <div class="actions">
                <!-- If user is logged in, show Cart at navigation bar-->
                <router-link to="/cart" v-if="isUserLoggedIn">
                    <i
                        class="fas fa-shopping-cart"
                        style="font-size: 25px; margin-right: 10px"
                    ></i>
                </router-link>
                <router-link to="/userprofile" >
                    <i class="fas fa-user-circle" style="font-size: 25px"></i>
                </router-link>
            </div>
        </div>
    </header>
</template>

<script >
import { ref,onMounted } from 'vue';
import { useUserStore } from '../stores/user';

export default {
  setup() {
    const store = useUserStore(); // Use your Pinia store
    onMounted (() => {
        store.loadUserFromLocalStorage();
    })
   
    const isUserLoggedIn = store.isAuth;
    const foodDropdownOpen = ref(false);
    const toysDropdownOpen = ref(false);
    const mobileMenuOpen = ref(false);

    const showDropdown = (category) => {
      foodDropdownOpen.value = category === 'food';
      toysDropdownOpen.value = category === 'toys';
    };

    const hideDropdown = (category) => {
      if (category === 'food') {
        foodDropdownOpen.value = false;
      } else if (category === 'toys') {
        toysDropdownOpen.value = false;
      }
    };

    const toggleMobileMenu = () => {
      mobileMenuOpen.value = !mobileMenuOpen.value;
    };

    const closeMobileMenu = () => {
      mobileMenuOpen.value = false;
    };

    const logout = () => {
      store.logout(); // Assuming you have a logout mutation in your Pinia store
      // Redirect to the login page
      // You may need to use the router or another mechanism for navigation
      // this.$router.push("/login");
    };

    return {
      foodDropdownOpen,
      toysDropdownOpen,
      mobileMenuOpen,
      showDropdown,
      hideDropdown,
      toggleMobileMenu,
      closeMobileMenu,
      isUserLoggedIn,
      logout,
    };
  },
};
</script>
<style scoped>
/* Add your header styles here */

.desktop-view {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 25px;
    background-color: #fff;
    color: #333;
    border-bottom: 1px solid grey;
    margin-bottom: 70px;
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

/*user account button*/
.user-account-button {
    border: 1px solid #000;
    border-radius: 10px;
    background-color: rgb(139, 139, 139);
}

/* Media query for mobile */
@media screen and (max-width: 768px) {
    .desktop-view {
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
        top: 80;
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
