<template>
  <section class="product-categories">
    <h1 class="category-header">Product Categories</h1>
    <div class="category" @mouseover="highlightCategory" @mouseleave="unhighlightCategory">
      <div class="category-icon-container">
        <img src="../assets/icon1.svg" alt="Dog Supplies" class="category-icon" />
      </div>
      <p>Dog Supplies</p>
    </div>
    <div class="category" @mouseover="highlightCategory" @mouseleave="unhighlightCategory">
      <div class="category-icon-container">
        <img src="../assets/icon2.svg" alt="Cat Supplies" class="category-icon" />
      </div>
      <p>Cat Supplies</p>
    </div>
    <div class="category" @mouseover="highlightCategory" @mouseleave="unhighlightCategory">
      <div class="category-icon-container">
        <img src="../assets/icon2.svg" alt="Pet Grooming" class="category-icon" />
      </div>
      <p>Pet Grooming</p>
    </div>
    <div class="category" @mouseover="highlightCategory" @mouseleave="unhighlightCategory">
      <div class="category-icon-container">
        <img src="../assets/icon2.svg" alt="Pet Hotel" class="category-icon" />
      </div>
      <p>Pet Hotel</p>
    </div>
    <div class="category" @mouseover="highlightCategory" @mouseleave="unhighlightCategory">
      <div class="category-icon-container">
        <img src="../assets/icon2.svg" alt="Pet Daycare" class="category-icon" />
      </div>
      <p>Pet Daycare</p>
    </div>
    
    
    
    
    <!-- Add more category items as needed -->
  </section>
</template>

<style scoped>
/* Add your product categories styles here */
.product-categories {
  text-align: center;
  font-weight: bold;
  color: #007f5f; /* Emerald green color */
  background-color: #c9ebe3;
}

.category {
  display: inline-block;
  margin: 10px; /* Reduced space between categories */
  text-align: center;
}

.category-icon-container {
  width: 200px; /* Adjust the size as needed */
  height: 200px; /* Adjust the size as needed */
  border-radius: 50%; /* Makes the container round-edged */
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: background-color 0.3s, box-shadow 0.3s;
}

.category-icon {
  width: 80%; /* Adjust the size of the icon inside the container */
  height: 80%; /* Adjust the size of the icon inside the container */
}

.category-icon-container:hover {
  background-color: #007f5f; /* Highlight color on hover */
  box-shadow: 0 0 10px rgba(0, 127, 95, 0.5); /* Add a shadow on hover */
}
</style>

<script>
export default {
  methods: {
    highlightCategory(event) {
      // You can add custom logic here when hovering
    },
    unhighlightCategory(event) {
      // You can add custom logic here when unhovering
    },
  },
};
</script>
