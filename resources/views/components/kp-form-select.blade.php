{{-- 

    1 - Recommended (Green)
    2 - Issued (Blue)
    
    Selected (Yellow)

--}}

@props(['label', 'state', 'name', 'value', 'id'])

{{$state}}
<div aria-selected="false" @class([
    'group relative flex flex-row w-full min-w-[16rem] border border-slate-400 rounded-md transition-all aria-selected:border-project-yellow-default aria-selected:bg-yellow-50 aria-selected:text-project-yellow-default',
    'bg-gray-200' => !isset($state),
    'border-emerald-500 bg-emerald-50 text-emerald-500' => isset($state) && $state == 1,
    'border-blue-500 bg-blue-50 text-blue-500' => isset($state) && $state == 2,
])>
    <input class="cursor-pointer appearance-none" type="radio" name="{{ $name }}" value="{{ $value }}"
        id="{{ $id }}">
    <label class="flex flex-col gap-2 cursor-pointer p-4 w-full" for="{{ $id }}">
        <span class="font-bold flex flex-row justify-between">{{ $label }}
            <span @class([
                'w-4 h-4 border ring-1 ring-slate-400 rounded-full group-aria-selected:ring-project-yellow-default group-aria-selected:bg-project-yellow-default',
                'ring-emerald-500' => isset($state) && $state == 1,
                'ring-blue-500' => isset($state) && $state == 2,
                ])>
                </span>
        </span>
        {{ $slot }}
    </label>
</div>
