<template>
    <div class="all">
        <!-- Header Component -->
        <Header />
    
        <div class="food-page">
            <h1 class="title">ALL</h1>

            <!--search bar-->
            <div class="search-bar ml-auto">
                <input type="text" v-model="searchQuery" placeholder="Search for products">
                <button @click="searchProducts" class="custom-search-button">
                    Search
                </button>
            </div>
            

            <!--filters-->
            <div class="filters ">
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
            
                
            </div>


            <!--cards-->
            <div class="row product-cards">
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
        data() {
            return {
                products: [], // Store the list of products
                filteredProducts: [], // Store the filtered list
                searchQuery: '', // User's search query
                selectedAvailability: 'in-stock', // Default availability filter
                minPrice: null, // Minimum price filter
                maxPrice: null, // Maximum price filter
                sortBy: 'featured', // Default sorting option
            };
        },
        methods: {
            
            searchProducts() {
                // Filter products based on the search query and filters
                this.filteredProducts = this.products.filter(product => {
                    // Filter based on availability
                    if (this.selectedAvailability === 'in-stock' && !product.inStock) {
                        return false;
                    }
                    if (this.selectedAvailability === 'out-of-stock' && product.inStock) {
                        return false;
                    }

                    // Filter based on price range
                    if ((this.minPrice !== null && product.price < this.minPrice) || 
                        (this.maxPrice !== null && product.price > this.maxPrice)) {
                        return false;
                    }

                    // Implement other filters as needed

                    // Filter based on the search query (keyword relevance)
                    if (this.searchQuery !== '' && !product.name.toLowerCase().includes(this.searchQuery.toLowerCase())) {
                        return false;
                    }

                    return true;
                });

                // Sort the filtered products based on the selected sorting option
                this.sortProducts();
            },

            sortProducts() {
                // Implement the logic to sort the products based on the selected sorting option
            },
            

            
            navigateToProductPage() {
            // Implement the navigation logic to the product page when a card is clicked
            // You may use Vue Router or other navigation methods.
            },
        },
    };
</script>

<style scoped>
.food-page {
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

input[type="text"],
  textarea {
    width: 800px;
    height: 45px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.custom-search-button {
    background-color: #26243a; 
    color: white; 
    border: none;
    padding: 5px; 
    border-radius: 5px; 
    width: 100px;
    height: 45px;
    margin: 0 5px;
    cursor: pointer;
    font-weight: bold;
}

.custom-search-button:hover {
    background-color: #3e3d49; 

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




.card {
  display: inline-block;
  width: 100%;
  margin: 10px;
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