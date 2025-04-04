@extends('layouts.auth')

@section('content')

<main class="form-signin w-full max-w-md mx-auto">
   <form method="POST" action="{{ route('register.post') }}">
      @csrf
      
      <img class="mb-4 w-20 h-20 mx-auto" src="{{ asset('images/shop-icon.png') }}" alt="">
      <h1 class="text-3xl font-semibold mb-4 text-center">Please sign up</h1>

      <div class="mb-4">
         <div class="relative">
            <input name="name" type="text" class="form-input block w-full px-4 py-2 text-base rounded-md border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500" id="floatingInput" placeholder="Name">
         </div>
         
         @error('name')
         <span class="text-sm text-red-500">{{ $message }}</span>
         @enderror
      </div>

      <div class="mb-4">
         <div class="relative">
            <input name="email" type="email" class="form-input block w-full px-4 py-2 text-base rounded-md border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500" id="floatingInput" placeholder="Email Address">
         </div>
         
         @error('email')
         <span class="text-sm text-red-500">{{ $message }}</span>
         @enderror
      </div>

      <div class="mb-4">
         <div class="relative">
            <input name="password" type="password" class="form-input block w-full px-4 py-2 text-base rounded-md border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500" id="floatingPassword" placeholder="Password">
         </div>
         
         @error('password')
         <span class="text-sm text-red-500">{{ $message }}</span>
         @enderror
      </div>

      @if(session()->has('success'))
      <div class="mb-4 text-green-600 bg-green-100 p-2 rounded-md">
         {{ session()->get('success') }}
      </div>
      @endif

      @if(session('error'))
      <div class="mb-4 text-red-600 bg-red-100 p-2 rounded-md">
         {{ session('error') }}
      </div>
      @endif

      <button class="btn btn-primary w-full py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" type="submit">
         Sign Up
      </button>

      <a href="{{ route('login') }}" class="mt-4 text-center text-indigo-600 hover:underline block">
         Log in
      </a>

      <p class="text-sm text-center text-gray-400">© 2025 FaithWear. All rights reserved.</p>
   </form>
</main>

@endsection
