@extends('layouts.app')


@section('sidebar')
    @parent

@endsection

@section('content')
<body class="bg-gray-100">

<header class="text-center  p-4 text-gray-500 ">
    <h1 class="text-2xl font-semibold">Your Support through Referrers</h1>
</header>

@foreach( $viewData['users']  as $user)
  <!--<main class="container mx-auto mt-4 px-4 md:px-0 max-w-screen-md flex justify-center">

    <div class="bg-white p-4 rounded-lg shadow-md">

      <h2 class="text-xl font-semibold"></h2>
    </div>



  </main>-->

  <ul role="list" class="bg-white p-6 divide-y divide-slate-200">
    <li class="flex py-4 first:pt-0 last:pb-0">
      <img src="{{ asset('/img/white.jpeg') }}" alt="Person" class="w-10 h-10  rounded-full">
       <div class="ml-3  overflow-hidden">
         <p class="text-sm font-medium  text-slate-900">{{ $user->get_name() }}</p>
         <p class="text-sm text-slate-500 truncate"> {{ __('I registered through your link')}}</p>
       </div>
    </li>
  </ul>
@endforeach
