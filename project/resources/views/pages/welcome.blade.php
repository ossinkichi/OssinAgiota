@extends('layouts.app')

@section('title', 'Bem vindo a Ossin Agiota')

@section('header')
    <x-header></x-header>
@endsection

@section('content')
    <h3 class="text-red-100">Seja bem vindo(a) ao Ossin agiota.</h3>
    <p>Uma aplicação que visa ajudar você a ter melhor gerenciamento de suas cobranças.</p>

    <a class="no-underline" href="{{ url('#') }}">Entrar</a>
@endsection
