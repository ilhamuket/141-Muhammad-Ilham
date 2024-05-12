<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>TeknoTribuneJabar || Beranda</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.4/tailwind.min.css'>

</head>

<body>

  <div class="bg-gray-100 overflow-x-hidden">
    @include('partials.header')
    <div class="px-6 py-8">
        <div class="flex justify-between container mx-auto">
            @yield('content')
            @include('partials.sidebar')
        </div>
    </div>

    <!-- include footer -->
    @include('partials.footer')
  </div>
</body>

</html>
