@props(['heading', 'footer', 'id'])

<div data-modal-part="backdrop" data-is-open='false' class="absolute left-0 top-0 flex justify-center items-center w-full h-full z-50 bg-neutral-500/50 hidden">
    <div data-modal-part="body" id="{{ $id }}" class="bg-white w-2/4 h-auto flex flex-col rounded-lg overflow-hidden">
        <div class="flex flex-row items-center justify-between h-16 py-2 px-8 border-b-[1px] border-neutral-200">
            <h1 class="font-bold text-lg">
                {{ $heading }}
            </h1>
            <box-icon class="cursor-pointer" data-modal-action="dismiss" name='x-circle'></box-icon>
        </div>

        <div class="h-full py-4 px-8">
            {{ $slot }}
        </div>

        <div class="flex flex-row items-center justify-end gap-4 bg-neutral-200 h-16 py-2 px-8">
            <button data-modal-action="dismiss">Cancel</button>
            {{ $footer }}
        </div>
    </div>
</div>