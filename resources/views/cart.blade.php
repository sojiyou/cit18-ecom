@extends('layouts.default')

@section('title', 'Faith Wear | Cart')

@section('content')

@if($cartItems->isEmpty())
<p class="text-center text-gray-500 font-semibold">Your cart is currently empty.</p>
@endif

<main class="container px-4 max-w-[900px] mx-auto">
   <section>
      <!-- Grid layout to ensure 4 items per row -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

         @foreach($cartItems as $cart)
         <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="flex">
               <!-- Image Section -->
               <div class="w-1/3">
                  <img src="{{ $cart->image }}" class="h-full w-full object-contain rounded-l-lg" alt="...">
               </div>

               <!-- Content Section -->
               <div class="w-2/3 p-4">
                  <h5 class="text-lg font-semibold">
                     <a href="{{ route('products.details', $cart->slug) }}" class="text-blue-600 hover:underline">
                        {{ $cart->title }}
                     </a>
                  </h5>
                  <p class="text-sm text-gray-700">
                     <span class="font-bold">Price: ₱{{ $cart->price }} | Quantity: {{$cart->quantity}}</span>
                  </p>
               </div>
            </div>
         </div>
         @endforeach
      </div>


      <div class="mt-4">
         {{ $cartItems->links() }}
      </div>


   <div class="mt-6 flex justify-center">
      @if($cartItems->isNotEmpty())
      <a class="btn" href="{{ route('checkout.show') }}">
         Checkout
      </a>
      @endif
   </div>


   </section>
</main>

@endsection
