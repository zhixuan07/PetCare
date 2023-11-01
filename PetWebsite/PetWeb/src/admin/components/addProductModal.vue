<script setup>
import axiosClient from '../axiosClient';
import Product from '../product'

const {addProduct} = Product();

const product = {
    sku: '',
    name: '',
    description:'',
    price: '',
    brand: '',
    image_path: '',
    stock: '',
    category: '',
    ingredients: '',
};

defineEmits('close')

function add(){
    console.log(product)
    addProduct(product)
}

</script>
<template>
    <div class="h-full w-3/5  p-6 bg-white rounded-md shadow-xl overflow-auto">
        <div class="flex items-center justify-between p-3">
            <h3 class="text-2xl">Add Product</h3>

            <svg
                @click="$emit('close')"
                xmlns="http://www.w3.org/2000/svg"
                class="w-8 h-8 text-red-900 cursor-pointer"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
            </svg>
        </div>
        
            <div class="mb-4">
                <label class="block text-gray-700">SKU Code</label>
                <input
                    type="text"
                    v-model="product.sku"
                    class="w-full px-3 py-2 border rounded-md"
                />
            </div>
            <div class="mb-4">
                <label  class="block text-gray-700"
                    >Product Name</label
                >
                <input
                    type="text"
                  
                    v-model="product.name"
                    class="w-full px-3 py-2 border rounded-md"
                />
            </div>
            <div class="mb-4">
                <label  class="block text-gray-700"
                    >Product Description</label
                >
                <input
                    type="text"
                  
                    v-model="product.description"
                    class="w-full px-3 py-2 border rounded-md"
                />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700"
                    >Product Price</label
                >
                <input
                    type="text"
                  
                    v-model="product.price"
                    class="w-full px-3 py-2 border rounded-md"
                />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700"
                    >Product Brand</label
                >
                <input
                    type="text"
                    v-model="product.brand"
                    class="w-full px-3 py-2 border rounded-md"
                />
            </div>
            <div class="mb-4">
                <label  class="block text-gray-700"
                    >Product Image</label
                >
                <input
                    type="text"
                    v-model="product.image_path"
                    class="w-full px-3 py-2 border rounded-md"
                />
            </div>
            <div class="mb-4">
                <label  class="block text-gray-700"
                    >Stock</label
                >
                <input
                    type="text"
            
                    v-model="product.stock"
                    class="w-full px-3 py-2 border rounded-md"
                />
            </div>
            <div class="mb-4">
                <label  class="block text-gray-700"
                    >Category</label
                >
                <select
                
                    v-model="product.category"
                    class="w-full px-3 py-2 border rounded-md"
                >
                    <option value="Dog Food">Dog Food</option>
                    <option value="Cat Food">Cat Food</option>
                    <option value="Dog Cage">Dog Cage</option>
                    <option value="Toy">Toy</option>
                </select>
            </div>
            <div class="mb-4">
                <label  class="block text-gray-700"
                    >Ingredients</label
                >
                <input
                    type="text"
                    v-model="product.ingredients"
                    class="w-full px-3 py-2 border rounded-md"
                />
            </div>
            <div class="text-center">
                <button
                    @click="add"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                   
                >
                    Add Product
                </button>
            </div>
       
    </div>
</template>
