<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>@yield('title', "Faith Wear")</title>
   @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex flex-col">
   @include('includes.header')

   <main class="flex-grow">
      @yield('content')
   </main>

   @include('includes.footer')
</body>
</html>
