@extends('layouts.app')

@section('title', 'Ossin Agiota')

@section('header')
    <x-header>
        <nav>
            <ul class="flex space-x-4">
                <li><a href="{{ route('home') }}" class="text-white">Inicio</a></li>
                <li><a href="{{ route('users.index') }}" class="text-white">Clientes</a></li>
                <li><a href="{{ route('loans.index') }}" class="text-white">Despesas</a></li>
            </ul>
        </nav>
    </x-header>
@endsection

@section('content')
    <h3>Bem-vindo(a) {{ $user.name }}</h3>
@endsection
