@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
<header class="bg-blue-500 p-4 text-white">
  <h1 class="text-2xl font-semibold">
    {{__("Reciever's")}}
  </h1>
</header>

    <main class="container mx-auto mt-4 p-4">
      <div class="bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">{{__("Reciever's Account  Information")}}</h2>
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">{{__("Reciever's Last Name:")}}</label>
          <p class="text-gray-800">{{ $viewData['last_name'] }} </p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">{{__("Reciever's  First Name:")}}</label>
          <p class="text-gray-800">{{ $viewData['first_name'] }} </p>
        </div>

        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">{{__("Reciever's Account Number:")}}</label>
          <p class="text-gray-800"> {{ $viewData['account_number']}} </p>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold"> {{__("Reciever's Bank Name:")}} </label>
          <p class="text-gray-800">{{ $viewData['bank_name'] }} </p>
        </div>

        {{ __('Your Are Donating ')}} {{ $viewData['amount'] }}  {{ __('Only')}}
      </div>
</main>
     @php
     $url = $viewData["url"];
     @endphp
     <div class="flex justify-center items-center ">
   <form class="" action="{{url($url)}}" method="post" enctype="multipart/form-data">
      @csrf
        <input type="hidden" id="user_in_session" name="user_id_in_session" value="{{ $viewData['user_id_in_session']}}">
        <input type="hidden" id="receiver_id" name="receiver_id" value="{{ $viewData['receiver_id'] }}">
        <input type="hidden" id="amount" name="amount" value="{{ $viewData['amount'] }}">
        <input type="file" id="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2  file:px-4 file:rounded-full
        file:border-0 file:text-sm  file:font-semibold  file:bg-violet-50 file:text-voilet-700  hover:file:bg-violet-100" name="image" accept="image/*"  multiple>
        <div class="py-2">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded md:w-auto">
              Upload 
        </button>
        </div>
        
    </form>

   </div>
   
    
@endsection
