@extends('layouts.app')

@section('viewData', $viewData['title'])

@section('sidebar')
    @parent

@endsection

@section('content')

<body class="bg-gray-100 flex items-center  ">
  <header class="bg-blue-600 text-white p-4 py-4 px-8">
    <h1 class="text-3xl font-semibold">LiftingHands </h1>
  </header>

  <main class="container mx-auto py-8 px-4">
    <div class="bg-white shadow rounded-lg p-8">
      <h2 class="text-2xl font-semibold mb-4">About Us</h2>
      <div class="flex items-center mb-6">
        <img src="{{ asset('/img/white.jpeg') }}" alt="Company Image" class="h-20 w-20 rounded-full mr-4">
        <p class="text-gray-700">Welcome to LiftingHands! We are a passionate team dedicated to providing aids
          through a healthy community of people with a common goal.</p>
      </div>
      <p class="text-gray-700 mb-6">This is a community where you provide a helping hand,  and get helped in return .
        we pride our selfs in creating a world where people thrive, as result of there social capital.</p>
      <p class="text-gray-700">We envision a world where financial barriers no longer hinder people
        from achieving their dreams and overcoming life's challenges.
        By connecting those who can give with those who need support,
        we aim to empower communities and promote positive social change.
            .</p>
    </div>
  </main>

  <footer class="bg-gray-300 text-gray text-center py-4 px-8">
    <p>&copy; 2023 LiftingHands. All rights reserved.</p>
  </footer>
</body>



@endsection
