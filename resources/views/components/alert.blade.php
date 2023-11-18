{{--

    Orientations
    tm = top-middle
    tl = top-left
    tr = top-right

    bm = bottom-middle
    bl = bottom-left
    br = bottom-right

    Types
    information = blue
    warning = yellow
    danger = red
    success = green

--}}

@props(['title', 'description', 'type' => 'information', 'orientation' => 'tr'])

<div id="alert" @class([
    'w-full flex flex-row justify-end animate-fade',
    'justify-start' => $orientation === 'tl',
    'justify-center' => $orientation === 'tm',
    'self-end justify-end' => $orientation === 'br',
    'self-end justify-start' => $orientation === 'bl',
    'self-end justify-center' => $orientation === 'bm',
])>
    <div class='flex flex-row gap-4 p-4 max-w-xs lg:max-w-sm w-fit h-fit rounded-md border bg-white border-slate-400'>
        <div class="relative">
            @switch($type)
                @case('warning')
                    <box-icon name='error-circle' class="fill-project-yellow-default"></box-icon>
                    <box-icon name='circle' class="fill-project-yellow-default absolute left-0 animate-ping"></box-icon>
                @break

                @case('danger')
                    <box-icon name='x-circle' class="fill-rose-400"></box-icon>
                    <box-icon name='circle' class="fill-rolse-400 absolute left-0 animate-ping"></box-icon>
                @break

                @case('success')
                    <box-icon name='check-circle' class="fill-emerald-400"></box-icon>
                    <box-icon name='circle' class="fill-emerald-400 absolute left-0 animate-ping"></box-icon>
                @break

                @default
                    <box-icon name='info-circle' class="fill-blue-400 "></box-icon>
                    <box-icon name='circle' class="fill-blue-400 absolute left-0 animate-ping"></box-icon>
            @endswitch
        </div>
        <div class="flex flex-col">
            <p @class([
                'font-bold',
                'text-project-yellow-default' => $type === 'warning',
                'text-rose-400' => $type === 'danger',
                'text-emerald-400' => $type === 'success',
                'text-blue-400' => $type === 'information',
            ])>{{ $title }}</p>
            <p>{{ $description }}</p>
        </div>
        <div>
            <box-icon name='x' id="alert-close" class="pointer-events-auto cursor-pointer"></box-icon>
        </div>
    </div>
</div>
