@extends('layouts.default')

@section('title', 'Thrift Store | Cart')

@section('content')

<main class="container px-4 max-w-[900px] mx-auto">
   <section>
      <!-- Grid layout to ensure 4 items per row -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

         @if(session()->has("success"))
         <div class="alert alert-success">
            {{ session()->get("success") }}
         </div>
         @endif

         @if(session("error"))
         <div class="alert alert-danger">
            {{ session("error") }}
         </div>
         @endif

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

      <!-- Pagination -->
      <div class="mt-4">
         {{ $cartItems->links() }}
      </div>

      <!-- Checkout Button - Separate from the Grid -->
      <div class="mt-6 flex justify-center">
         <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" href="{{route('checkout.show')}}">
            Checkout
         </a>
      </div>

   </section>
</main>

@endsection
