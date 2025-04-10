@extends('layouts.default')

@section('title', 'Faith Wear | Payment')

@section('content')
<main class="container max-w-5xl mx-auto p-6">
   <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white rounded-lg shadow-lg p-6">
      <!-- Left Side: Order Summary -->
      <div>
         <h2 class="text-xl font-semibold mb-4">🛒 Order Summary</h2>
         <p class="text-3xl font-bold text-gray-800 mb-4">₱{{ $total->total_price}}</p>

         @foreach ($cartItems as $item)
         <div class="mb-3">
            <div class="flex justify-between font-medium text-gray-700">
               <span> {{ $item->title }} </span>
               <span>₱{{ $item->price * $item->quantity }}</span>
            </div>
         </div>
         @endforeach
      </div>


      <!-- Right Side: Payment Form -->
      <div>
         <h2 class="text-xl font-semibold mb-4">💳 Pay with Card</h2>
         <form action="{{ route('payment.post') }}" method="POST" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Email" required class="w-full p-2 border rounded" />

            <input type="text" name="card_number" placeholder="Card Number" required class="w-full p-2 border rounded" />

            <div class="grid grid-cols-2 gap-4">
               <input type="text" name="expiry" placeholder="MM / YY" required class="p-2 border rounded" />
               <input type="text" name="cvc" placeholder="CVC" required class="p-2 border rounded" />
            </div>

            <input type="text" name="card_name" placeholder="Cardholder Name" required class="w-full p-2 border rounded" />

            <select name="country" required class="w-full p-2 border rounded">
               <option value="Philippines">Philippines</option>
               <option value="USA">USA</option>
               <option value="India">India</option>
               <!-- add more countries if needed -->
            </select>

            <input type="text" name="address" placeholder="Address Line" class="w-full p-2 border rounded" />
            <input type="text" name="city" placeholder="City" class="w-full p-2 border rounded" />
            <input type="text" name="zip" placeholder="Postal Code" class="w-full p-2 border rounded" />

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded">
               Pay
            </button>
         </form>
      </div>
   </div>
</main>
@endsection
