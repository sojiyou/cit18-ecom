@extends('layouts.default')

@section('title', 'Faith Wear | Home')

@section('content')

<main class="container px-4 max-w-[900px] mx-auto">

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

   <section>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
         @foreach($products as $product)
         <div class="w-full">
            <div class="shadow-sm p-3 bg-gray-50 rounded-lg">
            <a href="{{ route('products.details', $product->slug) }}">
               <img class="h-40 w-full object-contain rounded" src="{{ $product->image }}" alt="{{ $product->title }}">
               <div class="mt-2 text-center">
                  <p class="text-red-500 font-bold"> {{ $product->title }} </p>
                  <p class="text-gray-700 font-bold">₱{{ $product->price }}</p>
               </div>
            </div>
                     </a>
         </div>

         @endforeach
      </div>

      <div class="mt-6 flex justify-center">
         {{ $products->links() }}
      </div>

   </section>
</main>

@endsection
