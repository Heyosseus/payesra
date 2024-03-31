<template>
    <div class="flex items-center justify-between bg-gray-200 p-8">
        <h1 class="text-4xl">Paysera</h1>
        <div class="space-x-4">
            <router-link to="/dashboard"
                         class="py-4 px-6 bg-white text-blue-900 border-blue-900 border rounded-3xl hover:bg-blue-900 hover:text-white transition-colors outline-0">
                Log in
            </router-link>

            <router-link to="/register"
                         class="py-4 px-6 bg-blue-900 text-white rounded-3xl hover:bg-white hover:text-blue-900 hover:border-blue-900 border outline-0">
                Register
            </router-link>
        </div>
    </div>

</template>
