<template>
    <div >
        <!-- Header Component -->
        <Header />
    
        <div class="time-selection-page">
            <h1 class="title">Select a Time</h1>
            
            <!-- List of available dates -->
            <div class="time-buttons">
                <!-- Loop through available dates and display date buttons -->
                <button class="time-button" @click="selectTime(time)">Date 1</button>
                <button class="time-button" @click="selecttime(time)">Date 2</button>
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
        selectTime(time) {
            // Implement navigation to the Grooming Time Slot Selection page for the selected date.
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

.time-selection-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 30px 30px 350px 30px;
}

.time-buttons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.time-button {
    background-color: #dcdcdc; /* Grey background color */
    color: black;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}



/* Media query for mobile */
@media screen and (max-width: 768px) {
    .time-selection-page {
        
        margin: 30px;
    }
}
</style>
