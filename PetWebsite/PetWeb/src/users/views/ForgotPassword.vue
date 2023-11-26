<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import { useUserStore } from "../stores/user";

const errmsg = ref(null);
const store = useUserStore();

// Create the user object
const user = {
    email: "",

};

// Login function
async function login(ev) {
    ev.preventDefault();
    await store.login(user);

    if (store.errmsg) {
        // Display error message if login fails
        errmsg.value = store.errmsg;
      } else {
        // Redirect to home page if login succeeds



       
  
}

</script>
<template>
    <div
        class="z-0 bg-theme overflow-hidden relative w-screen h-screen bg-cover bg-no-repeat p-12 object-fill"
        style="background-image: url('src/admin/assets/animal_background.jpg')"
    >
        <div class="flex flex-col justify-center items-center h-full">
            <h1 class="text-5xl text-white font-bold mb-4">PetWeb</h1>
            <h2 class="text-2xl text-white font-bold mb-8">Forgot Paswword</h2>

            <form class="bg-white p-8 rounded-lg shadow-md" @submit="forgotPassword">
                <div class="mb-4">
                    <label class="text-gray-800 block mb-2">Email:</label>
                    <input
                        type="email"
                        v-model="user.email"
                        name="email"
                        class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your username"
                        required
                    />
                </div>
               
                <div class="flex justify-center">
                    <button
                        type="submit"
                        class="bg-theme text-white bg-red-400 text-lg font-semibold py-2 px-4 rounded-lg hover:bg-opacity-80"
                    >
                        Submit
                    </button>
                </div>

                <p class="text-red-500 text-sm mt-2">{{ errmsg }}</p>
            </form>
            
        </div>
    </div>
</template>
