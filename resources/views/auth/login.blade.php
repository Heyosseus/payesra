<x-layout>
    <x-header> </x-header>
    <div class="flex justify-center items-center mt-20">
        <div class="w-1/2 bg-blue-900 mx-auto justify-center  items-center p-10 rounded-lg shadow-lg ">
            <h1 class="text-4xl text-white font-bold mb-6">Log in</h1>
            <form action="/login" method="POST" class="p-8">
                @csrf
                <div class="mb-4">
                    <label for="name" class="text-xl text-white">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Your Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:bg-white focus:border-blue-500 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="text-xl text-white">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Your Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:bg-white focus:border-blue-500 @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="text-xl text-white">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Choose a Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:bg-white focus:border-blue-500 @error('password') border-red-500 @enderror">
                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-10  text-lg rounded-3xl focus:outline-none focus:shadow-outline" type="submit">Submit</button>
            </form>
        </div>
    </div>
</x-layout>
