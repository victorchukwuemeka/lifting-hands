<!-- resources/views/child.blade.php -->

@extends('layouts.nav')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@endsection

@section('content')
    <p>This is my body content.</p>
@endsection
