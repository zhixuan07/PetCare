<template>
  <header class="header">
    <div class="logo">
      <img src="../assets/logo.png" alt="PetCare Logo">
    </div>
    
    
    <div class="actions">
      
      <router-link to="/cart">
        <i class="fas fa-shopping-cart" style='font-size:25px'></i>
      </router-link>

    </div>
  </header>
</template>




<script>


export default {
  components: {
    
  },
  data() {
    return {
      
    };
  },
  methods: {
    
  },
};
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


/* Media query for mobile */
@media screen and (max-width: 768px) {

  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #fff;
    color: #333;
    border-bottom: 1px solid grey;
  }

  .actions {
    margin-right: 20px;
  }
}
</style>