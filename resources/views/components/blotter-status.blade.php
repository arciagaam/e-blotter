@props(['id', 'text'])

<p
@class([
    'w-fit text-center rounded-full px-4 p-1',
    'bg-emerald-100 text-emerald-600' => $id == 1,
    'bg-neutral-100 text-neutral-600' => $id == 2,
    'bg-rose-100 text-rose-600' => $id == 3,
    'bg-yellow-100 text-yellow-600' => $id == 4,
    ])
>
    {{ ucfirst($text) }}
</p>