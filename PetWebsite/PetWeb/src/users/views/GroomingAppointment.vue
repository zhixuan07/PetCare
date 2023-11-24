<script setup>
import Header from "../components/Header.vue";
import Footer from "../components/Footer.vue";
import {useRouter} from 'vue-router';
import {ref} from 'vue';
import { useServiceStore } from "../stores/service";
const router = useRouter();
const serviceStore = useServiceStore();
const service = {
   typeService:"",
   appointmentDate:"",
   appointmentTime:"",
   typePet:"",
   numberPet:""
};


const proceedCheckout = () => {
  if(service.typeService == "" || service.appointmentDate == "" || service.appointmentTime == "" || service.typePet == "" || service.numberPet == ""){
      alert("Please fill in all the information");
   }else{
       localStorage.setItem("service",JSON.stringify(service));
       router.push("/groomingCheckout");
   }
     
     
  
};




</script>


<template>
   <Header></Header>
   <div class="flex justify-center w-screen h-screen">
       <div class="shadow-lg h-fit px-20 py-10">
           <div class="">
               <label class="label"> Type of Service </label>
               <select class="select select-bordered" v-model="service.typeService">
                   <option  >Pick one</option>
                   <option value="Bath and brush">Bath and Brush-RM50</option>
                   <option value="Haircut and Styling">
                       Haircut and Styling-RM65
                   </option>
               </select>
           </div>
           <div class="flex flex-col">
               <label>Date</label>
               <input
                   type="date"
                   id="expiryDate"
                   v-model="service.appointmentDate"
                   class="bg-white py-2 px-1 rounded-lg border"
               />
               <label>Time</label>
               <input
                   type="time"
                   id="expiryDate"
                   v-model="service.appointmentTime"
                   class="bg-white py-2 px-1 rounded-lg border"
               />
               <label>Type of pet</label>
             <select class="bg-white py-2 px-2 rounded-lg border" v-model="service.typePet">
               <option value="Dog">Dog</option>
               <option value="Cat">Cat</option>
             </select>
             <label>Number of pet</label>
             <input
             type="number"
           
             v-model="service.numberPet"
             class="bg-white py-2 px-1 rounded-lg border"/>
             <button class="btn btn-secondary mt-3" @click="proceedCheckout">Submit</button>
           </div>
          


       </div>
   </div>
   <Footer></Footer>
</template>