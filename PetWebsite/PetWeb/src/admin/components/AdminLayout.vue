
<script setup>
import { RouterView } from 'vue-router';
import sideBar from '../components/sideBar.vue';

</script>

<template>
 
  
 <div class="flex">
    <sideBar />
    <div class="flex-grow">
       <RouterView />
       
    </div>
</div>





</template>