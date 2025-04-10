@extends('layouts.auth')

@section('title', 'Faith Wear | Login')
@section('content')

<main class="form-signin w-full max-w-md mx-auto">
   <form method="POST" action="{{ route('login.post') }}">
      @csrf
      
      <img class="mb-4 w-20 h-20 mx-auto" src="{{ asset('images/shop-icon.png') }}" alt="">
      <h1 class="text-3xl font-semibold mb-4 text-center">Please sign in</h1>

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

      <div class="flex items-center mb-4">
         <input name="rememberme" class="form-checkbox text-indigo-600" type="checkbox" value="remember-me" id="flexCheckDefault">
         <label class="ml-2 text-sm" for="flexCheckDefault">Remember me</label>
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
         Sign in
      </button>

      <a href="{{ route('register') }}" class="mt-4 text-center text-indigo-600 hover:underline block">
         Create New Account
      </a>

      <p class="text-sm text-center text-gray-400 mt-4">© 2025 FaithWear. All rights reserved.</p>
   </form>
</main>

@endsection
