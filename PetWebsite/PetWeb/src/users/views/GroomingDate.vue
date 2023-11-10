<template>
    <div >
        <!-- Header Component -->
        <Header />
    
        <div class="date-selection-page">
            <h1 class="title">Select a Date</h1>
            
            <!-- List of available dates -->
            <div class="date-buttons">
                
                <button class="date-button" @click="selectDate(date)">Date 1</button>
                <button class="date-button" @click="selectDate(date)">Date 2</button>
                
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
    margin: 30px 30px 350px 30px;
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


  /* Media query for mobile */
  @media screen and (max-width: 768px) {
    .date-selection-page {
        
        margin: 30px;
    }
  }
</style>
