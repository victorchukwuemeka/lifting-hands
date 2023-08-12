@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

           <h1 class="text-center font-sans text-xl text-gray-700 font-bold">
             {{ __('Create Your Bank Details ')}}
           </h1>

    <div class="container mx-auto  w-full max-w-xs">
      <form action="{{ url('/store_bank_details') }}" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="bank_name">
              {{ __('Bank Name')}}
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
            leading-tight focus:outline-none focus:shadow-outline" id="bank_name"
            type="text" name="bank_name" placeholder="BankName">
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2"  for="first_name">
              {{ __('FirstName')}}
            </label>
            <input class="shadow appearance-none border border-white-500 rounded
            w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            id="first_name" name="first_name" type="text" placeholder="FirstName">
          </div>

          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
              {{ __('LastName')}}
            </label>
            <input class="shadow appearance-none border border-white-500 rounded
            w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            id="last_name" type="text" name="last_name" placeholder="LastName">
          </div>

          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
              {{ __('Account Number')}}
            </label>
            <input class="shadow appearance-none border border-white-500 rounded
            w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            id="account_number" type="number" name="account_number" placeholder="Account Number">
          </div>

          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4
             rounded focus:outline-none focus:shadow-outline"
                type="submit">
              {{ __('Summit Details')}}
            </button>
          </div>
        </form>
       </div>
@endsection
