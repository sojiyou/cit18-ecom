@extends('layouts.default')

@section('title', 'Thrift Store | Checkout')

@section('content')

<main class="container max-w-3xl mx-auto p-4">
   <section>
      <h2 class="text-2xl font-semibold mb-4">Checkout</h2>

      @if(session()->has("success"))
      <div class="alert alert-success bg-green-100 text-green-800 p-3 rounded-md mb-4">
         {{ session()->get("success") }}
      </div>
      @endif

      @if(session("error"))
      <div class="alert alert-danger bg-red-100 text-red-800 p-3 rounded-md mb-4">
         {{ session("error") }}
      </div>
      @endif

      <form action="{{ route('checkout.post') }}" method="POST">
         @csrf
         <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" class="form-input mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="address" name="address" required>
         </div>

         <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="text" class="form-input mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="phone" name="phone" required>
         </div>

         <div class="mb-4">
            <label for="pincode" class="block text-sm font-medium text-gray-700">Pin Code</label>
            <input type="text" class="form-input mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" id="pincode" name="pincode" required>
         </div>

         <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Proceed to Payment
         </button>
      </form>
   </section>
</main>

@endsection
