@props(['id', 'text'])

<p
@class([
    'w-fit text-center rounded-full px-4 p-1',
    'bg-emerald-100 text-emerald-600' => $id == 1,
    'bg-neutral-100 text-neutral-600' => $id == 2,
    'bg-orange-100 text-orange-400' => $id == 3,
    'bg-blue-100 text-blue-400' => $id == 4,
    'bg-yellow-100 text-yellow-600' => $id == 5,
    'bg-rose-100 text-rose-600' => $id == 6,
    ])
>
    {{ ucfirst($text) }}
</p>