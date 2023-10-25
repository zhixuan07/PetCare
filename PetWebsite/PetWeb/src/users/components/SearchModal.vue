<template>
    <div class="search-modal" :class="{ 'visible': isSearchModalVisible }">
      <input v-model="searchQuery" @input="updateSearchQuery" placeholder="Enter your search query">
      <button @click="search">Search</button>
    </div>
</template>
  


<script>
    export default {
        data() {
            return {
            isSearchModalVisible: false,
            };
        },
        methods: {
            toggleSearchModal() {
            this.isSearchModalVisible = !this.isSearchModalVisible;
            },
        },
    };
</script>
  
<style scoped>



/* Additional styling for the input and button elements */
input {
  width: 100%;
  padding: 5px;
  margin-bottom: 10px;
}

button {
  background-color: #333;
  color: #fff;
  padding: 5px 10px;
  border: none;
  cursor: pointer;
}

button:hover {
  background-color: #555;
}
</style> 