@extends('layouts.default')

@section('title', 'Thrift Store | Cart')

@section('content')

<main class="container px-4 max-w-[900px] mx-auto min-h-screen">
   <section>
      <!-- Grid layout to ensure 4 items per row -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

         @foreach($history as $item)
         <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="flex">

               <div class="w-2/3 p-4">
                  <h5 class="text-lg font-semibold">
                     <a href="">
                        {{ $item->title }}
                     </a>
                  </h5>
                  <p class="text-sm text-gray-700">
                     <h1 class="font-bold">Order #{{$item->id}}</h1>
                     <span class="font-bold">Price: ₱{{ $item->total_price }}  Quantity: {{$item->quantity}}</span>
                  </p>
               </div>
            </div>
         </div>
         @endforeach
      </div>

      <div class="mt-4">
         {{ $history->links() }}
      </div>

      <div class="mt-6 flex justify-center">
         <a class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded" href="{{route('home')}}">
            Back to Home
         </a>
      </div>

   </section>
</main>

@endsection
