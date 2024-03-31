<template>
    <div class="flex items-center justify-between bg-gray-200 p-8">
        <a href="/" class="text-4xl" >Paysera</a>
        <div class="  flex ">
            <a href="/profile" class="py-4 px-6 text-lg text-blue-900 rounded-3xl  hover:underline outline-0">Profile</a>
            <p @click="logout" class="py-4 px-6 text-lg text-red-600  font-bold hover:underline    outline-0">Log out</p>
        </div>
    </div>
    <product> </product>

</template>
<script setup>
import {ref} from "vue";
import Product from "./components/products/Product.vue";
import axiosInstance from "./config/axios.js";
import router from "./router/index.js";
const logout = async () => {
    console.log(localStorage.getItem('token'));
    try {
        const response = await axiosInstance.get("/api/logout");
        localStorage.removeItem('token');
        await router.push("/");
    } catch (error) {
        console.log('Logout error:', error.response.data);
    }
};
</script>
