<template>
    <div class="food">
        <!-- Header Component -->
        <Header />
    
        <div class="food-page">
            <h1 class="title">FOOD</h1>

            <!--filters-->
            <div class="filters d-flex align-items-center">
                <div class="filter">
                    <label for="availability">Availability :</label>
                    <select id="availability" class="custom-select">
                        <option value="in-stock">In Stock</option>
                        <option value="out-of-stock">Out of Stock</option>
                    </select>
                </div>
                <div class="filter">
                    <label for="price-range">Price Range (MYR) :</label>
                    <input type="number" id="from-price" placeholder="From" class="price-input">
                    <span> to </span>
                    <input type="number" id="to-price" placeholder="To" class="price-input">
                </div>
                <div class="filter">
                    <label for="sort-by">Sort By : </label>
                    <select id="sort-by" class="custom-select">
                        <option value="featured">Featured</option>
                        <option value="best-selling">Best Selling</option>
                        <option value="a-z">A-Z</option>
                        <option value="z-a">Z-A</option>
                        <option value="price-low-to-high">Price, Low to High</option>
                        <option value="price-high-to-low">Price, High to Low</option>
                        <option value="date-old-to-new">Date, Old to New</option>
                        <option value="date-new-to-old">Date, New to Old</option>
                    </select>
                </div>
                <div class="ml-auto">
                    <button @click="searchProducts" class="btn btn-primary custom-search-button">
                        Search
                    </button>
                </div>
            </div>


            <!--cards-->
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card" @click="navigateToProductPage">
                    <img class="card-img" src="../assets/girl.jpg" alt="Product Image">
                    <p class="product-name">Product Name 1</p>
                    <p class="unit-price">RM 10.99</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card" @click="navigateToProductPage">
                    <img class="card-img" src="../assets/girl.jpg" alt="Product Image">
                    <p class="product-name">Product Name 2</p>
                    <p class="unit-price">RM 15.99</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card" @click="navigateToProductPage">
                    <img class="card-img" src="../assets/guy.jpg" alt="Product Image">
                    <p class="product-name">Product Name 3</p>
                    <p class="unit-price">RM 8.99</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card" @click="navigateToProductPage">
                    <img class="card-img" src="../assets/guy.jpg" alt="Product Image">
                    <p class="product-name">Product Name 4</p>
                    <p class="unit-price">RM 12.49</p>
                    </div>
                </div>
            </div>
            <!--end of cards-->

            



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
            searchProducts() {
            // Implement the logic to process the selected filter options
            // You can access the filter values using the element IDs and then fetch the relevant products.
            },
            navigateToProductPage() {
            // Implement the navigation logic to the product page when a card is clicked
            // You may use Vue Router or other navigation methods.
            },
        },
    };
</script>

<style scoped>
 

.title {
  font-size: 40px;
  font-weight: bold;
  margin-top: 20px;
  margin-bottom: 35px;
}

.filters {
  margin: 20px 0;
}

.filter {
  display: inline-block;
  margin-right: 20px;
}

.price-input {
    border: 1px solid #ccc;
    padding: 5px;
    width: 170px; 
    margin: 0 5px;
    border-radius: 5px;
}
.custom-select {
    border: 1px solid #ccc;
    padding: 5px;
    width: 170px; 
    margin: 0 5px;
    border-radius: 5px;
}


.custom-search-button {
    background-color: #26243a; /* Change the background color as desired */
    color: white; /* Change the text color as desired */
    border: none;
    padding: 5px; 
    border-radius: 5px; 
    width: 100px;
    margin: 0 5px;
    cursor: pointer;
    font-weight: bold;
  }

.card {
  display: inline-block;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  text-align: center;
  cursor: pointer;
}

.card-img {
    height: 250px;
    object-fit: cover;
}

.product-name {
  font-weight: bold;
}

.unit-price {
  margin-top: 10px;
}
</style>