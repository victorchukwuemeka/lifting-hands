<!-- resources/views/layouts/app.blade.php -->
<!doctype html>
<html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

      @vite('resources/css/app.css')
      <title>App Name - @yield('title')</title>
    </head>
    <header>

    </header>
    <body class="main-nav bg-gray-200 p-4">
        @section('sidebar')

        <!-- Navbar goes here -->
        <nav class="sticky bg-white shadow-lg">
          <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between">
              <div class="flex space-x-7">
                <div>
                  <!-- Website Logo -->
                  <a href="#" class="flex items-center py-4 px-2">
                    <img src="{{ asset('/img/white.jpeg') }}" alt="Logo" class="h-8 w-8 mr-2">
                    <span class="font-semibold text-gray-500 text-lg">LiftingHands</span>
                  </a>
                </div>
                <!-- Primary Navbar items -->
                <div class="hidden md:flex items-center space-x-1">
                  <a href="{{url('/dashboard')}}" class="py-4 px-2 text-gray-500  hover:text-blue-500font-semibold ">DashBoard</a>
                  <a href="{{ url('/bank')}}" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">Bank</a>
                  <a href="{{url('/referrerLink')}}" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">RefererLink</a>
                  <a href="{{url('/support')}}" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">Support</a>
                  <a href="{{ url('/refererBonus')}}" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">RefererBonus</a>
                  <a href="{{ url('/about') }} " class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">About</a>
                <!--</div>-->
                <!--<div class="hidden md:flex md:ml-4">-->
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-500 hover:bg-gray-700 
                    hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                </form>
               </div>





                
              </div>

              <!-- Mobile menu button -->
              <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                <svg class=" w-6 h-6 text-gray-500 hover:text-blue-500 "
                  x-show="!showMenu"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
              </button>
              </div>
            </div>
          </div>
          <!-- mobile menu -->
          <div class="hidden mobile-menu">
            <ul class="">
              <li ><a href="{{url('/dashboard')}}" class="block text-sm px-2 py-4 text-white bg-blue-500 font-semibold">DashBoard</a></li>
              <li><a href="{{ url('/bank')}}" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">Bank</a></li>
              <li><a href="{{ url('/referrerLink')}}" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">RefererLink</a></li>
              <li><a href="{{url('/support')}}" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">Support</a></li>
              <li><a href="{{ url('/refererBonus')}}" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">RefererBonus</a></li>
              <li><a href="{{ url('/about')}}" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">About</a></li>


              <!--<div class="vr bg-white mx-2 d-none d-lg-block"></div>-->
              <form id="logout" action="{{ route('logout') }}" method="POST">
                @csrf
                <li><a role="button" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300"
                   onclick="document.getElementById('logout').submit();">
                    Logout </a></li>
              </form>
            </ul>
          </div>
          <script>
            const btn = document.querySelector("button.mobile-menu-button");
            const menu = document.querySelector(".mobile-menu");

            btn.addEventListener("click", () => {
              menu.classList.toggle("hidden");
            });
          </script>
        </nav>

        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
