<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>App Name - @yield('title')</title>
</head>

<body class="bg-gray-100">
  @section('sidebar')
  <nav class="sticky top-0 bg-blue-600 text-white py-4 px-8">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center">
        <span class="text-2xl font-semibold">Logo</span>
      </div>
      <div class="hidden md:flex space-x-4">
        <a href="#" class="hover:text-blue-200">Home</a>
        <a href="#" class="hover:text-blue-200">About</a>
        <a href="#" class="hover:text-blue-200">Services</a>
        <a href="#" class="hover:text-blue-200">Contact</a>
      </div>
      <div class="md:hidden">
        <!-- Hamburger icon for mobile -->
        <button class="mobile-menu-button">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7"></path>
          </svg>
        </button>
      </div>
    </div>
    <!-- Mobile menu (hidden by default) -->
    <div class="md:hidden hidden" id="mobile-menu">
      <ul class="flex flex-col space-y-4 py-4 px-2 bg-blue-500">
        <li>
          <a href="#" class="block text-white font-semibold hover:text-blue-200">Home</a>
        </li>
        <li>
          <a href="#" class="block text-white font-semibold hover:text-blue-200">About</a>
        </li>
        <li>
          <a href="#" class="block text-white font-semibold hover:text-blue-200">Services</a>
        </li>
        <li>
          <a href="#" class="block text-white font-semibold hover:text-blue-200">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Add your page content here -->

  <script>
    // JavaScript to toggle the mobile menu
    const mobileMenuButton = document.querySelector(".mobile-menu-button");
    const mobileMenu = document.getElementById("mobile-menu");

    mobileMenuButton.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });
  </script>
  
  <div class="container">
      @yield('content')
  </div>
</body>

</html>
