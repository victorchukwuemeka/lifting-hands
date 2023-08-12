@extends('layouts.app')


@section('content')

<body class="bg-gray-100">
  <div class="container mx-auto">
    <header class="bg-blue-500 p-4 text-white">
        <h1 class="text-2xl font-semibold">Bank Details</h1>
    </header>

    <a href="{{ url('/bank_create')}}" class=" ">
      <div class="flex justify-center items-center  px-2 p-4">

      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
         {{__('Bank Details')}}
      </button>
      </div>
    </a>







      @foreach( $viewData['bank_details'] as $bank_detail)

      @if( $bank_detail->get_user_id() ===  $viewData['user_id_in_session'])
      <main class="container mx-auto mt-4 p-4">
        <div class="bg-white p-8 rounded-lg shadow-md">
          <h2 class="text-xl font-semibold mb-4">{{__('Account Holder Information')}}</h2>
          <div class="mb-4">
          <label class="block text-gray-700 font-semibold">{{__('Account Holder Name:')}}</label>
            <p class="text-gray-800">{{  $bank_detail->get_first_name()}} </p>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-semibold">{{__('Account Holder Name:')}}</label>
            <p class="text-gray-800">{{  $bank_detail->get_last_name()}} </p>
          </div>

          <div class="mb-4">
            <label class="block text-gray-700 font-semibold">{{__('Account Number:')}}</label>
            <p class="text-gray-800"> {{ $bank_detail->get_account_number() }} </p>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-semibold">{{__('Bank Name:')}} </label>
            <p class="text-gray-800">{{ $bank_detail->get_bank_name() }} </p>
          </div>

        </div>
      </main>
      @endif


      @endforeach
      <footer class="bg-gray-300 p-4 text-center mt-4">
        <p>&copy; 2023 LiftingHands. All rights reserved.</p>
      </footer>
  </div>

</body>




@endsection
