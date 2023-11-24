<template>
    <div>
        <!-- Header Component -->
        <Header />

        <div class="orders-page">
            <h1 class="title">ORDER HISTORY</h1>
            <div class="tab-container">
                <div
                    class="tab"
                    v-for="(tab, index) in tabs"
                    :key="index"
                    @click="activeTab = tab"
                    :class="{ 'active-tab': activeTab === tab }"
                >
                    {{ tab }}
                </div>
            </div>

            <div
                class="order-cards"
                v-for="order in filteredOrders"
                :key="order.id"
            >
                <div class="order-card" :class="order.status">
                    <div class="order-id">Order ID: {{ order.id }}</div>

                    <div class="order-date">Date: {{ order.date }}</div>
                    <div class="order-amount">
                        Total Amount: RM{{ order.total }}
                    </div>
                    <div class="order-status">Status: {{ order.status }}</div>
                    <router-link :to="'/userOrderDetails/' + order.id">
                        <button class="btn btn-link">View details</button>
                    </router-link>
                    <button
                        v-if="
                            order.status == 'Pending' ||
                            order.status == 'Processing'
                        "
                        class="btn btn-link"
                        @click="cancelOrder(order.id)"
                    >
                        Cancel order
                    </button>
                </div>
            </div>

            <div class="container my-3 text-center">
                <router-link to="/userprofile">
                    <button class="btn btn-link">Back to Profile</button>
                </router-link>
            </div>
        </div>

        <!-- Footer Component -->
        <Footer />
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import Header from "../components/Header.vue";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

import axiosClient from "../../admin/axiosClient";

onMounted(async () => {
    const userString = localStorage.getItem("user");
    const user = JSON.parse(userString);
    try {
        // fetch orders data
        const response = await axiosClient.get(`/userOrder/${user.id}`);
        // insert orders data into orders array
        orders.value = response.data.orders;
    } catch (error) {
        console.error("Error fetching orders:", error);
    }
});


// orders data
const orders = ref([]);

const tabs = ["All", "Pending", "Shipped", "Delivered", "Cancelled"];
const activeTab = ref("All");

const filteredOrders = computed(() => {
    if (activeTab.value === "All") {
        return orders.value;
    } else {
        return orders.value.filter((order) => order.status === activeTab.value);
    }
});

const cancelOrder = async (id) => {
    try {
        await axiosClient.patch(`/admin/deleteOrder/${id}`);
        toast.success("Order canceled successfully!", {
            position: "top-right",
            duration: 2000,
        });
        setTimeout(() => {
            location.reload();
        }, 2000)
        
       
    } catch (error) {
        console.error("Error canceling order:", error);
        toast.error("Error canceling order!", {
            position: "top-right",
            duration: 2000,
        });

  

};
</script>

<style scoped>
.orders-page {
    padding: 20px;
    margin-left: 100px;
    margin-right: 100px;
}

.title {
    font-size: 40px;
    font-weight: bold;
    margin-top: 20px;
    margin-bottom: 35px;
    text-align: center;
}
.tab-container {
    display: flex;
    margin-bottom: 20px;
    justify-content: center;
}

.tab {
    width: 100px;
    cursor: pointer;
    user-select: none;
    color: black;
    border-bottom: 3px solid #ffffff;
}

.tab::before {
    content: "";
    position: absolute;
    top: 0;
    right: -1px;
    bottom: 0;
    width: 1px;
    background-color: #ccc; /* Vertical line color */
}

.tab::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0px;
    bottom: 0;
    width: 1px;
    background-color: #ccc; /* Vertical line color */
}

.active-tab {
    border-bottom: 3px solid #5d5e5e;
}

.order-cards {
    display: flex;
    flex-direction: column; /* Each card is displayed in a new row */
}

.order-card {
    border: 2px solid #ccc;
    padding: 10px;
    background-color: #fff;
    margin-bottom: 10px; /* Add some spacing between cards */
    border-radius: 10px;
}

.completed {
    border-color: green;
    background-color: rgb(144, 196, 144);
}

.canceled {
    border-color: rgb(255, 33, 88);
    background-color: rgb(243, 152, 152);
}

.pending {
    border-color: orange;
    background-color: rgb(255, 217, 145);
}

@media screen and (max-width: 768px) {
    .orders-page {
        margin: 15px 15px 200px 15px;
    }
}
</style>
