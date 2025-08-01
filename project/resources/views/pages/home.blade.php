@extends('layouts.app')

@section('title', 'Ossin Agiota')

@section('header')
    <x-header style-header="border-b-2 border-[#E5E8EB] pl-9 pr-9">
        <div class="search">
            <x-input></x-input>
        </div>
    </x-header>
@endsection

{{-- @section('content')
    <h3>Bem-vindo(a) {{ $user.name }}</h3>
@endsection --}}
