@extends('layouts.app')

@section('title', 'Ossin Agiota')

@section('header')
    <x-header style-header="border-b-2 border-[#E5E8EB] pl-9 pr-9">
        <div class="flex justify-end items-center gap-6">
            <x-search></x-search>
            @include('partials.notify')
            @include('partials.config')
            @include('partials.logout')
        </div>
    </x-header>
@endsection

@section('content')
    <div class="h-auto w-full border-2 border-[#E5E8EB] rounded-lg p-6 flex justify-center">
        <x-search search-class="bg-[#363636] flex justify-center w-full rounded-md p-3"></x-search>
    </div>
@endsection
