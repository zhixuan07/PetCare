<template>
    <div >
        <!-- Header Component -->
        <Header />
    
        <div class="date-selection-page">
            <h1 class="title">Select a Date</h1>
            
            <!-- List of available dates -->
            <div class="date-buttons">
                <!-- Loop through available dates and display date buttons -->
                <button class="date-button" @click="selectDate(date)">Date 1</button>
                <button class="date-button" @click="selectDate(date)">Date 2</button>
                <!-- Add more date buttons here -->
            </div>
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
        selectDate(date) {
            // Implement navigation to the Grooming Time Slot Selection page for the selected date.
        },
    },
};
</script>

<style scoped>
.grooming-date-selection {
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

.date-selection-page {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.date-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.date-button {
    background-color: #dcdcdc; /* Grey background color */
    color: black;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}
</style>
