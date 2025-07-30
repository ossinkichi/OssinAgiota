@extends('layouts.app')

@section('title', 'Bem vindo a Ossin Agiota')

@section('header')
    <x-header style-header="border-b-2 border-[#E5E8EB] pl-9 pr-9"></x-header>
@endsection

@section('content')

    <div class="flex flex-col items-center justify-center gap-10 mt-16">
        <div class="flex flex-col items-center justify-center">
            <h3 class="text-2xl font-bold">Seja bem vindo(a) ao Ossin agiota!</h3>
        </div>

        @include('partials.formLogin')

        <span id="alert" class="text-gray-200 bg-red-500 p-2 rounded text-center hidden"></span>
    </div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection

@vite(['resources/js/request-login.js'])
