<template>
    <div class="flex items-center justify-between bg-gray-200 p-8">
        <a href="/" class="text-4xl" >Paysera</a>
        <div class="  flex ">
            <a href="/profile" class="py-4 px-6 text-lg text-blue-900 rounded-3xl  hover:underline outline-0">Profile</a>
            <p @click="logout" class="py-4 px-6 text-lg text-red-600  font-bold hover:underline    outline-0">Log out</p>
        </div>
    </div>
</template>
<script setup>
import {ref} from "vue";
import axios from "axios";
import router from "./router/index.js";
const logout = async () => {
    console.log(localStorage.getItem('token'));
    try {
        const response = await axios.get("/api/logout", {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`
            }
        });
        console.log('Logout successful');
        localStorage.removeItem('token'); // Remove the token from localStorage
        await router.push("/"); // Redirect to the home page or login page
    } catch (error) {
        console.log('Logout error:', error.response.data);
    }
};
</script>
