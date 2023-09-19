<script setup></script>
<template>
    
        <div class="flex flex-col items-center justify-center h-full">
            <h1 class="text-5xl text-white font-bold mb-4">PetWeb</h1>
            <h2 class="text-2xl text-white font-bold mb-8">Admin Login</h2>

            <form class="bg-white p-8 rounded-lg shadow-md">
                <div class="mb-4">
                    <label for="username" class="text-gray-800 block mb-2"
                        >Username:</label
                    >
                    <input
                        type="text"
                        id="username"
                        name="username"
                        class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your username"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="password" class="text-gray-800 block mb-2"
                        >Password:</label
                    >
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Enter your password"
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="bg-theme text-white  bg-red-400 text-lg font-semibold py-2 px-4 rounded-lg hover:bg-opacity-80"
                >
                    Login
                </button>
            </form>
        </div>
   
</template>
