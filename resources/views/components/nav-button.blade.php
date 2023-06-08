@props(['url'])

<a href="{{ $url ?? '#' }}" @class(['btn-gray', 'active' => url()->current() == $url])>
    {{ $slot }}
</a>