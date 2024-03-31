<template>
    <div class="flex items-center justify-between bg-gray-200 p-8">
        <a href="/" class="text-4xl" >Paysera</a>
        <div class="  flex ">
            <a href="/profile" class="py-4 px-6 text-lg text-blue-900 rounded-3xl  hover:underline outline-0">Profile</a>
            <p @click="logout" class="py-4 px-6 text-lg text-red-600  font-bold hover:underline    outline-0">Log out</p>
        </div>
    </div>
    <div class="container flex flex-col w-1/3 mx-auto p-8 shadow rounded mt-10">
        <div class="col">
            <div class="flex flex-col space-y-2">
                <h1 class="text-2xl">Profile</h1>
                <label for=""> Name:</label>
                <input type="text" placeholder="name" v-model="user.name"
                       class="p-4 border border-black outline-0 rounded ">
                <label for=""> Email:</label>
                <input type="email" placeholder="email" v-model="user.email"
                       class="p-4 border border-black outline-0 rounded ">
                <label for=""> Password:</label>
                <input type="password" placeholder="password" v-model="user.password"
                       class="p-4 border border-black outline-0 rounded ">

                <button
                    @click="updateUserProfile"
                    class="py-3  px-8 bg-blue-900 text-white rounded-lg hover:bg-white hover:text-blue-900
                hover:border-blue-900 border outline-0  w-fit mx-auto">Update
                </button>
            </div>
        </div>
    </div>
</template>
<script setup>
import {onMounted, ref} from 'vue';
import axiosInstance from "../../config/axios.js";

onMounted(() => {
    fetchUserData();
});

const user = ref({
    name: '',
    email: '',
    password: ''
});
const fetchUserData = () => {
    axiosInstance.get('/api/profile')
        .then(response => {
            user.value = response.data;
        })
        .catch(error => {
            console.error(error);
        });
};

const updateUserProfile = () => {
    axiosInstance.put('/api/profile', {
        name: user.value.name,
        email: user.value.email,
        password: user.value.password
    })
        .then(response => {
            if(response.status === 200){
                let message = document.createElement('div');
                message.innerHTML = '<p class="success">Profile updated successfully</p>';
                document.body.appendChild(message);
                setTimeout(() => {
                    document.querySelector('.success').remove();
                }, 3000);
            }
        })
        .catch(error => {
            console.error(error);
        });
};
</script>
<style>
.success{
    background: green;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    color: white;
    border-radius: 5px;
    position: absolute;
    top: 10px;
    right: 10px;
}
</style>
