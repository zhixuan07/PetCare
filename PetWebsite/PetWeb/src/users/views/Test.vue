<template>
    <div class="grooming-service-payment">
        <!-- Header Component -->
        <Header />
    
        <div class="payment-page">
            <h1 class="title">Service Payment</h1>
            
            <!-- Display details of the selected service, date, and time slot -->
            <div class="service-details">
                <p>Service: Grooming Service Name</p>
                <p>Date: Selected Date</p>
                <p>Time Slot: Selected Time Slot</p>
                <p>Price: RM XX.XX</p>
            </div>

            <!-- User details and payment form -->
            <form @submit.prevent="submitPayment">
                <!-- Input fields for user details, address, contact, and payment information -->
                <!-- Implement payment processing functionality here -->
                <button type="submit">Pay</button>
            </form>
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
        submitPayment() {
            // Implement payment processing logic using a payment gateway (e.g., Stripe).
            // Display a confirmation message after successful payment.
        },
    },
};
</script>

<style scoped>
/* Add your styling for the Grooming Service Payment page here */
</style>
