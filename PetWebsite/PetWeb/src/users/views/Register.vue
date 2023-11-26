<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import { useUserStore } from "../stores/user";


const errmsg = ref(null);
const store = useUserStore();
const user = {
    name: "",
    email: "",
    password: "",
};

function register(ev) {
    ev.preventDefault();
    store.register(user);
 
}
</script>
<template>
    <div
        class="z-0 bg-theme overflow-hidden relative w-screen h-screen bg-cover bg-no-repeat p-12 object-fill"
        style="background-image: url('src/admin/assets/animal_background.jpg')"
    >
        <div class="flex flex-col items-center justify-center h-full">
            <h1 class="text-5xl text-white font-bold mb-4">PetWeb</h1>
            <h2 class="text-2xl text-white font-bold mb-8">User Register</h2>

            <form class="bg-white p-10 rounded-lg shadow-md" @submit="register">
                <div class="mb-4">
                    <label class="text-gray-800 block mb-2">Name:</label>
                    <input
                        type="text"
                        v-model="user.name"
                        name="username"
                        class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your username"
                        required
                    />
                </div>
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
                <div class="mb-4">
                    <label class="text-gray-800 block mb-2">Password:</label>
                    <input
                        type="password"
                        v-model="user.password"
                        name="password"
                        class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your password"
                        required
                    />
                </div>
              
                 
                <div class="mb-4">
                    <router-link to="/login" class="text-blue-500 underline"
                        >Already have an account? </router-link
                    >
                </div>
                <div class="flex justify-center">
                    <button
                    type="submit"
                    class="bg-theme text-white bg-red-400 text-lg font-semibold py-2 px-4 rounded-lg hover:bg-opacity-80"
                >
                    Register
                </button>
                </div>

                <p class="text-red-500 text-sm mt-2">{{ errmsg }}</p>
            </form>
        </div>
    </div>
</template>
