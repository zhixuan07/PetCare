
<script setup>
import { RouterView } from 'vue-router';
import sideBar from '../components/sideBar.vue';

</script>

<template>
 
  
 <div class="flex ">
   <div class="w-1/5">
      <sideBar />
   </div>

    <div class=" w-full overflow-x-auto">
       <RouterView />
       
    </div>
</div>





</template>