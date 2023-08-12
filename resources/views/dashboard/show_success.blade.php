
@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
<body class="bg-gray-100">


<!-- Header -->

<main class="">
<section class="bg-white   p-4 rounded-lg shadow-md mb-4"> 
      
      <!-- Display latest news here -->
      <h2 class="text-3xl font-bold mb-4">
        {{ __('Donation Made')}} :
      </h2>
      <p class="text-gray-600">
        You Have made your Donation Now wait for your reward 
      </p>
      
    </section>

</main>






<footer class="bg-gray-300 p-4 text-center">
    <p>&copy; 2023 Your Organization. All rights reserved.</p>
</footer>
</body>
@endsection
