@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
<body class="bg-gray-100">

<!-- Header -->
<header class="bg-blue-500 p-4 text-white">
  <h1 class="text-2xl font-semibold">
    {{ __('Welcome To LightingHands')}}
  </h1>
</header>

<!-- Main Content -->
{{ __('Nobody Yet')}}
<!-- Footer -->
<footer class="bg-gray-300 p-4 text-center">
    <p>&copy; 2023 Your Organization. All rights reserved.</p>
  </footer>


</body>



@endsection
