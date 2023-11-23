<template>
    <div class="homepage">
        <!-- Header Component -->
        <Header />

        <!-- Promotional Content Component -->
        <PromotionalContent />
        <div class="home-page">
            <h1 class="title">Best-Selling Products</h1>

            <!--cards-->
            <div class="flex flex-row justify-around" >
                <div  v-for="product in randomProducts" :key="product[0]">
                    <div>
                        <div class="card">
                            <img
                                :src="product.image_path"
                                alt="girl"
                                @click="navigateProductDetails(product)"
                            />
                            <p class="product-name">{{ product.name }}</p>
                            <p class="unit-price">RM {{ product.price }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!--end of cards-->
        </div>

        <!-- Testimonials Component  -->
        <Testimonials />

        <!-- Footer Component -->
        <Footer />
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import Header from "../components/Header.vue";
import PromotionalContent from "../components/PromotionalContent.vue";
import Testimonials from "../components/Testimonials.vue";
import Footer from "../components/Footer.vue";
import axiosClient from "../../admin/axiosClient";

const products = ref([]);
const randomProducts = ref([]);
onMounted(async () => {
    try {
        const response = await axiosClient.get("/products");
        products.value = response.data;

        // Select four random products
        const totalProducts = products.value.length;
        const selectedIndices = new Set();

        while (selectedIndices.size < 4) {
            const randomIndex = Math.floor(Math.random() * totalProducts);
            selectedIndices.add(randomIndex);
        }

        randomProducts.value = Array.from(selectedIndices).map(
            (index) => products.value[index]
        );

        // You can now use randomProducts.value containing four random products
        console.log(randomProducts.value);
    } catch (error) {
        console.error("Error fetching products:", error);
    }
});
</script>

<style scoped>
.home-page {
    background-color: white;
    color: black;
    text-align: center;
    padding: 20px;
}

.title {
    color: #007f5f;
    font-size: 35px;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 35px;
}

/* Add your homepage-specific styles here */
.card {
    display: inline-block;
    width: 100%;
    margin: 0px;
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
