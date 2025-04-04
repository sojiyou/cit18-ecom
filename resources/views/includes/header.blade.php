<nav class=" bg-gray-200 p-4">
   <div class="container mx-auto flex justify-between items-center">
      <img src="{{asset('images/shop-icon.png')}}" class="h-10 w-10" alt="">
      <a class="text-xl font-semibold" href="#">FaithWear</a>
      <button class="block lg:hidden text-gray-500" id="menu-btn">
         <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
         </svg>
      </button>
      <div class="hidden lg:flex items-center space-x-4 w-full justify-between" id="menu">
         <ul class="flex space-x-4 ml-auto mb-2 lg:mb-0">
         <li>
            <a class="text-gray-900 font-medium" href="{{route('home')}}">Home</a>
         </li>
         <li>
            <a class="text-gray-600 hover:text-gray-900" href=" {{ route('cart.show') }} ">Cart</a>
         </li>
         <li>
            <a class="text-gray-600 hover:text-gray-900" href=" {{ route('order.history') }} ">History</a>
         </li>
         @auth
         <li>
            <a class="text-gray-600 hover:text-gray-900" href="{{ route('logout') }}">Logout</a>
         </li>
         @endauth
         </ul>
      </div>
   </div>
</nav>

   <script>
   const menuBtn = document.getElementById('menu-btn');
   const menu = document.getElementById('menu');

   menuBtn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
   });
   </script>
