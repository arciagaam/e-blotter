@props(['url'])

<a href="{{ $url ?? '#' }}" @class(['btn-gray relative', 'active' => url()->current() == $url])>
    {{ $slot }}
</a>