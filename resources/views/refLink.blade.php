@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')


<!-- copy_button.blade.php -->



<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container mx-auto my-8 p-8 bg-white rounded-lg shadow-lg max-w-md w-full">
        <h1 class="text-2xl font-semibold text-center mb-6">Copy Your Referral Code</h1>
        <div class="flex flex-col items-center justify-center mb-6">
            <input type="text" id="textToCopy" value="{{ $viewData['referrerCode'] }}" class="border border-gray-300 p-4 rounded-lg w-full text-center text-lg font-semibold focus:outline-none">
            <button type="button" id="copyButton" class="mt-4 px-6 py-4 bg-blue-600 text-white rounded-lg focus:outline-none hover:bg-blue-70">Copy</button>
        </div>
        <p class="text-gray-600 text-center text-sm">Share this code with your friends and family so they can use it during their registration process.</p>
    </div>

    <script>
        const copyButton = document.getElementById('copyButton');
        const textToCopy = document.getElementById('textToCopy');

        copyButton.addEventListener('click', () => {
            textToCopy.select();
            document.execCommand('copy');
            alert('Text copied to clipboard!');
        });
    </script>
</body>








@endsection
<!--<body class="bg-gray-100">
  <div class="container mx-auto py-8 px-4">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
      <h1 class="text-2xl font-semibold mb-4">Your Referrer Code</h1>
      <p class="text-gray-600 mb-6">Share this code with your friends and family so they can use it during their
        registration process.</p>-->


      <!--<div class="bg-blue-100 text-blue-700 border border-blue-200 rounded-md py-4 px-6">-->
      <!--  <p class="text-3xl font-semibold mb-2">{{ $viewData['referrerCode'] }}</p>-->

    <!--  <input type="text" id="textToCopy" value="" class="text-3xl font-semibold mb-2">
      <button type="button" id="copyButton" class="bg-blue-600 text-white px-4 py-2 rounded-lg ml-4">Copy Text</button>
      </div>
    </div>
  </div>

  <script>
      const copyButton = document.getElementById('copyButton');
      const textToCopy = document.getElementById('textToCopy');

      copyButton.addEventListener('click', () => {
          textToCopy.select();
          document.execCommand('copy');
          alert('Text copied to clipboard!');
      });
  </script>

</body>-->
