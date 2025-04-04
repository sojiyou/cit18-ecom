@extends('layouts.default')

@section('title', 'Thrift Store | Home')

@section('content')

<main class="container px-4 max-w-[900px] mx-auto">
   <section>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
         @foreach($products as $product)
         <div class="w-full">
            <div class="shadow-sm p-3 bg-gray-50 rounded-lg">
               <img class="h-40 w-full object-contain rounded" src="{{ $product->image }}" alt="{{ $product->title }}">
               <div class="mt-2 text-center">
                  <a href="{{ route('products.details', $product->slug) }}" class="text-lg font-semibold text-blue-600 hover:underline">
                     {{ $product->title }}
                  </a>
                  <p class="text-gray-700 font-bold">₱{{ $product->price }}</p>
               </div>
            </div>
         </div>
         @endforeach
      </div>

      <div class="mt-6 flex justify-center">
         {{ $products->links() }}
      </div>

   </section>
</main>

@endsection
