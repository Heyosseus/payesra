<x-layout>
    <div class="flex items-center justify-between bg-gray-200 p-8">
        <h1 class="text-4xl">Paysera</h1>
        <div class="space-x-4">
            @auth
                <a href="/dashboard" class="py-4 px-6 bg-white text-blue-900 border-blue-900 border rounded-3xl hover:bg-blue-900 hover:text-white transition-colors outline-0">Dashboard</a>
            @else
                <a href="/login" class="py-4 px-6 bg-white text-blue-900 border-blue-900 border rounded-3xl hover:bg-blue-900 hover:text-white transition-colors outline-0">Log in</a>
            @endauth
            <a href="/register" class="py-4 px-6 bg-blue-900 text-white rounded-3xl hover:bg-white hover:text-blue-900 hover:border-blue-900 border outline-0">Register</a>
        </div>
    </div>
</x-layout>
