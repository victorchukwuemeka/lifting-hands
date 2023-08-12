@extends('layouts.app')



@section('sidebar')
    @parent

@endsection

@section('content')

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-2xl font-semibold text-center mb-6">{{ __("You Don't Have Any Bonus Yet")}}</h1>

        <p class="text-gray-600 text-center text-sm">{{ __('For you to have a bonus you must share your link while inviting others ')}}.</p>
    </div>


</body>


@endsection
