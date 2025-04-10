@extends('layouts.default')

@section('title', 'Faith Wear | Product Details')

@section('content')

<main class="container px-4 max-w-[900px] mx-auto">
   <section class="bg-white shadow-lg p-6 rounded-lg">
      <img src="{{ $product->image }}" class="w-40 h-40 object-contain mx-auto rounded" alt="{{ $product->title }}">

      @if(session()->has("success"))
      <div class="bg-green-100 text-green-800 p-3 rounded-md mt-4">
         {{ session()->get("success") }}
      </div>
      @endif

      @if(session("error"))
      <div class="bg-red-100 text-red-800 p-3 rounded-md mt-4">
         {{ session("error") }}
      </div>
      @endif

      <h1 class="text-xl font-bold mt-4 text-center">{{ $product->title }}</h1>
      <p class="text-lg text-gray-700 font-semibold text-center">₱{{ $product->price }}</p>
      <p class="text-sm text-gray-600 mt-2 text-center">{{ $product->description }}</p>

      <div class="mt-6 flex justify-center">
         <a href="{{ route('cart.add', $product->id) }}" class="btn">
            Add to Cart
         </a>
      </div>
   </section>
</main>

@endsection
