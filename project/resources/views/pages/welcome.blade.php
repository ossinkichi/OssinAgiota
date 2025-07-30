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
    </div>

@endsection

@vite(['resources/js/request-login.js'])
