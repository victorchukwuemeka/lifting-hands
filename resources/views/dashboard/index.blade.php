@extends('layouts.app')

@section('title', 'Page Title')


@section('content')
<body class="bg-gray-100">

<!-- Header -->
<header class="bg-blue-500 p-4 item-center text-white">
  <h1 class="text-2xl font-semibold">
    {{ __('Welcome To LightingHands')}}
  </h1>
</header>

<!-- Main Content -->


<!--<img src="{{ asset('/img/money.jpg') }}" alt="Landing Image"
swiper-container w-full h-full max-w-screen-lg mx-auto

 class="w-full rounded-lg shadow-md mb-4">--> 
 <main class="container mx-auto mt-4 sm:mt-8 p-4">


 <div class="swiper-container w-full h-64 p-2 sm:h-96 sm:w-full max-w-screen-lg mx-auto">
   
     <div class="swiper-wrapper ">
      <!-- Slide 1 -->
      <div class="swiper-slide">
        <img src="{{ asset('/img/teamwork.jpg') }}" alt="Image 1" class="h-64 sm:h-96 w-full object-cover">
      </div>
      <!-- Slide 2 -->
      <div class="swiper-slide">
        <img src="{{ asset('/img/growth.jpg') }}" alt="Image 2" class="h-64 sm:h-96 w-full object-cover">
      </div>
      <!-- Slide 3 -->
      <div class="swiper-slide">
        <img src="{{ asset('/img/biz.jpg') }}" alt="Image 3" class="h-64 sm:h-96 w-full object-cover">
      </div>
    </div>
    <!-- Add navigation arrows -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  
 </div>
 

<br>
  
    <section class="bg-white   p-4 rounded-lg shadow-md mb-4"> 
      <img src="{{ asset('/img/seed.jpg') }}" alt="Image description" class="rounded-lg shadow-md mb-4">

      <!-- Display latest news here -->
      <h2 class="text-3xl font-bold mb-4">
        {{ __('5k')}} :
      </h2>
      <p class="text-gray-600">
      By Generously Contributing Your Donation of Five Thousand Units, You Shall Be Eligible to Receive an Impressive Return of 
      Seven Thousand and Two Hundred Units – A Generous Reward Awaits!
      </p>
      <a href="{{ url('/five')}}">

      <button class="bg-blue-600 text-white py-2 px-4 rounded mt-4">{{  __('DONATE')}}</button>

      </a>

    </section>


<section class="bg-white p-4 rounded-lg shadow-md mb-4">
  <!-- Add your image here -->
  <img src="{{ asset('/img/save.jpg') }}" alt="Image description" class="rounded-lg shadow-md mb-4">

  <!-- Display latest news here -->
  <h2 class="text-3xl font-bold mb-4">
    {{ __('10k')}} :
  </h2>
  <p class="text-gray-600">
  By Generously Contributing Your Donation of Ten Thousand Units, You Shall Be Eligible to Receive an Impressive Return of 
      Fifteen Thousand  Units – A Generous Reward Awaits!
  </p>
  <a href="{{ url('/ten')}}">
    <button class="bg-blue-600 text-white py-2 px-4 rounded mt-4">{{  __('DONATE')}}</button>
  </a>
</section>

   


    <section class="bg-white p-4 rounded-lg shadow-md mb-4">
    <img src="{{ asset('/img/money1.jpg') }}" alt="Image description" class="rounded-lg shadow-md mb-4">
      <!-- Display latest news here -->
      <h2 class="text-3xl font-bold mb-4">
        {{ __('20k')}} :
      </h2>
      <p class="text-gray-600">
      By Generously Contributing Your Donation of Tweenty Thousand Units, You Shall Be Eligible to Receive an Impressive Return of 
      Thirty Thousand  Units – A Generous Reward Awaits!
      </p>
      <a href="{{ url('/tweenty')}}">

      <button class="bg-blue-600 text-white py-2 px-4 rounded mt-4">{{  __('DONATE')}}</button>

      </a>

    </section>

    <section class="bg-white p-4 rounded-lg shadow-md mb-4">
     <img src="{{ asset('/img/money2.jpg') }}" alt="Image description" class="rounded-lg shadow-md mb-4">  
      <!-- Display latest news here -->
      <h2 class="text-3xl font-bold mb-4">
        {{ __('50k')}} :
      </h2>
      <p class="text-gray-600">
      By Generously Contributing Your Donation of Fifty Thousand Units, You Shall Be Eligible to Receive an Impressive Return of 
      Seventy Five  Thousand  Units – A Generous Reward Awaits!
      </p>
      <a href="{{ url('/fifty')}}">

      <button class="bg-blue-600 text-white py-2 px-4 rounded mt-4">{{  __('DONATE')}}</button>

      </a>

    </section>


    <section class="bg-white p-4 rounded-lg shadow-md mb-4"> 
      <img src="{{ asset('/img/money.jpg') }}" alt="Image description" class="rounded-lg shadow-md mb-4">
       
      <!-- Display latest news here -->
      <h2 class="text-3xl font-bold mb-4">
        {{ __('100k')}} :
      </h2>
      <p class="text-gray-600">
      By Generously Contributing Your Donation of Hundred Thousand Units, You Shall Be Eligible to Receive an Impressive Return of 
      Hundred and Fifty Thousand  Units – A Generous Reward Awaits!
      </p>
      <a href="{{ url('/hundred')}}">

      <button class="bg-blue-600 text-white py-2 px-4 rounded mt-4">{{  __('DONATE')}}</button>

      </a>

    </section>

    <section class="bg-white p-4 rounded-lg shadow-md mb-4"> 
      <img src="{{ asset('/img/success.jpg') }}" alt="Image description" class="rounded-lg shadow-md mb-4">

      <!-- Display latest news here -->
      <h2 class="text-3xl font-bold mb-4">
        {{ __('200k')}} :
      </h2>
      <p class="text-gray-600">
      By Generously Contributing Your Donation of Two Hundred Thousand Units, You Shall Be Eligible to Receive an Impressive Return of 
      Three Hundred  Thousand  Units – A Generous Reward Awaits!
      </p>
      <a href="{{ url('/two_hundred')}}">

      <button class="bg-blue-600 text-white py-2 px-4 rounded mt-4">{{  __('DONATE')}}</button>

      </a>

    </section>



  </main>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 30,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>



<!-- Footer -->
<footer class="bg-gray-300 p-4 text-center">
    <p>&copy; 2023 Your Organization. All rights reserved.</p>
  </footer>


</body>



@endsection
<!--<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <title>Carousel with Tailwind CSS</title>
</head>-->
