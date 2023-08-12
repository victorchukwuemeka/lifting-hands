
@extends('layouts.app')


@section('sidebar')
    @parent

@endsection

@section('content')
<header class="bg-blue-500 text-center  p-4 text-white">
    <h1 class="text-2xl font-semibold">Your Support through Referrers</h1>
</header>
    @foreach( $viewData['users']  as $user)
    <main class="container mx-auto mt-4 p-4 grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <!-- Sample person item -->
    <div class="bg-white p-4 rounded-lg shadow-md">
      <img src="{{ asset('/img/white.jpeg') }}" alt="Person" class="w-full h-40 object-cover mb-4 rounded-md">
      <h2 class="text-xl font-semibold">{{ __('BONUS PERCENTAGE')}}  : {{ __('%10')}} </h2>
    </div>

    <!-- Add more people items here -->

    </main>
    @endforeach
<footer class="bg-gray-300 p-4 text-center mt-4">
    <p>&copy; 2023 Your Company. All rights reserved.</p>
</footer>
@endsection

