<template>
        <div>
            <base-header></base-header>
            <div class="flex justify-center items-center mt-20">
                <div class="w-1/2 bg-blue-900 mx-auto justify-center items-center p-10 rounded-lg shadow-lg">
                    <h1 class="text-4xl text-white font-bold mb-6">Log in</h1>
                    <form @submit.prevent="submitForm" class="p-8">
                        <div class="mb-4">
                            <label for="name" class="text-xl text-white">Name:</label>
                            <input v-model="formData.name" type="text" id="name" placeholder="Your Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:bg-white focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="text-xl text-white">Email:</label>
                            <input v-model="formData.email" type="email" id="email" placeholder="Your Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:bg-white focus:border-blue-500">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="text-xl text-white">Password:</label>
                            <input v-model="formData.password" type="password" id="password" placeholder="Choose a Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:bg-white focus:border-blue-500">
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-10 text-lg rounded-3xl focus:outline-none focus:shadow-outline">Submit</button>
                    </form>
                </div>
            </div>
        </div>
</template>

<script setup>
import BaseHeader from "../BaseHeader.vue";
import { ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

const router = useRouter();
const formData = ref({
    name: "",
    email: "",
    password: "",
});

const submitForm = async () => {
    try {
        const response = await axios.post("/api/login", formData.value);
        const { token } = response.data;
        localStorage.setItem('token', token);
        await router.push("/dashboard");
    } catch (error) {
        console.log('Login error:', error.response.data);
    }
};
</script>
