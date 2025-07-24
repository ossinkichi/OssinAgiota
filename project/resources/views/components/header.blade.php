<header>
    @include('partials.logo')

    <div class="{{$class ?? ''}}">
        {{ $slot }}
    </div>
</header>
