<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Faith Wear</title>
   @vite('resources/css/app.css')
</head>
<body>
   <main class="min-h-screen flex justify-center text-center items-center bg-red-50">
      <div class="text-center p-8 bg-white shadow-lg rounded-lg max-w-[500px] w-full">
         <img src="{{asset('images/shop-icon.png')}}" class="mx-auto h-20 w-20 mb-4" alt="Faithwear Logo">
         <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to Faithwear</h1>
         <p class="text-lg text-gray-600 mb-6">"Wear your faith, speak your truth."</p>

         <div class="flex justify-center space-x-4">
            <!-- Login Button -->
            <a href="{{ route('login') }}" class="px-6 py-3 text-white bg-red-600 rounded-lg hover:bg-red-700 transition duration-300">
               Login
            </a>

            <!-- Register Button -->
            <a href="{{ route('register') }}" class="px-6 py-3 text-white bg-red-600 rounded-lg hover:bg-red-700 transition duration-300">
               Register
            </a>
         </div>
      </div>
   </main>
</body>
</html>