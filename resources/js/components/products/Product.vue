<template>
    <div class="flex items-start mt-20 justify-center w-full px-20">
        <div class="space-y-2 w-1/2 p-4 flex items-start shadow-lg justify-between">
            <img :src="image" alt="">
            <div class="flex flex-col space-y-5">
                <h1>Name: {{ product.name }}</h1>
                <h1>Price: ${{ product.price }}</h1>
                <div class="flex space-x-4 ">
                    <label for="">Quantity:</label>
                    <input type="number" v-model.number="product.quantity" min="1" @input="updateQuantity" class="outline-0 border-0">
                </div>

                <button
                    @click="addToCart"
                    class="py-2 px-4 bg-blue-900 text-white rounded-xl hover:bg-white hover:text-blue-900
                hover:border-blue-900 border outline-0 mt-2">
                    Add to Cart
                </button>

            </div>

        </div>

        <div class="mx-auto flex flex-col shadow w-1/3 p-6 bg-gray-200">
            <h1 class="text-2xl">Products</h1>
            <ul class="flex flex-col items-start space-y-2">
                <li v-for="product in products" :key="product.id" class="justify-between flex w-full">
                    Name: {{ product.name }} / Price: ${{ product.price }} / Quantity: {{ product.quantity }}
                    <button @click="remove(product.id)" class="text-red-600">remove</button>
                </li>
                <button
                    @click="buy"
                    class="py-2 px-7 bg-blue-900 text-white rounded-lg hover:bg-white hover:text-blue-900
                hover:border-blue-900 border outline-0 mt-2">
                    Buy
                </button>
            </ul>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from 'vue';
import axiosInstance from "../../config/axios.js";
import image from '../../../../public/assets/chess.jpeg'

const products = ref([]);
const cart = ref([]);
const product = ref({
    name: 'Chess',
    price: 100,
    quantity: 1
});
onMounted(() => {
    fetchProducts();
});
const fetchProducts = () => {
    axiosInstance.get('/api/products')
        .then(response => {
            products.value = response.data;
            console.log(products.value)
        })
        .catch(error => {
            console.error(error);
        });
};

const addToCart = () => {
    axiosInstance.post('/api/products', product.value, )
        .then(response => {
            products.value.push(response.data);
        })
        .catch(error => {
            console.error(error);
        });
};
const remove = (productId) => {
    axiosInstance.delete(`/api/products/${productId}` )
        .then(response => {
            const index = products.value.findIndex(product => product.id === productId);
            if (index !== -1) {
                products.value.splice(index, 1);
            }
        })
        .catch(error => {
            console.error(error);
        });
};

const buy = () => {
    addToCart();
};

const updateQuantity = (event) => {
    product.value.quantity = event.target.value;
    product.value.price = product.value.quantity * 100;
};
</script>
