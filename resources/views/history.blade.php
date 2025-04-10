@extends('layouts.default')

@section('title', 'Faith Wear | History')

@section('content')

<main class="container px-4 max-w-[900px] mx-auto min-h-screen">
   @foreach ($ordersWithItems as $order)
   <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white rounded-lg shadow-lg p-6 mb-6">
      <div>
         <h2 class="text-xl font-semibold mb-4">🛒 Order Summary</h2>
         <p class="text-3xl font-bold text-gray-800 mb-4">Total Price: ₱{{ number_format($order['total_price'], 2) }}</p>

         <!-- Loop through the products in the order -->
         @foreach ($order['products'] as $index => $product)
         <div class="mb-3">
            <div class="flex justify-between font-medium text-gray-700">
               <span>{{ $product->title }}</span> <!-- Product Title -->
               <!-- Multiply price by corresponding quantity from the 'quantity' array -->
               <span>₱{{ number_format($product->price * (int)$order['quantities'][$index], 2) }}</span> <!-- Total Price (Product Price * Quantity) -->
            </div>
         </div>
         @endforeach

         <p class="text-gray-600">Address: {{ $order['order']->address }}</p> <!-- Display Order Address -->
      </div>
   </div>
   @endforeach

   <!-- Pagination Links -->
   <div class="flex justify-center">
      {{ $orders->links() }}
   </div>
</main>

@endsection
