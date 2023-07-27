<x-layout>
    <div class="w-full h-full flex justify-center items-center">
        <div class="flex flex-col items-center gap-4">
            <box-icon size="8rem" name='badge-check' type='solid' color='#34D399'></box-icon>
            <p class="font-bold text-2xl text-emerald-400">KP Form Issued</p>
            <a class="btn-plain" href="{{ route('records.show', ['record' => $record_id]) }}">Return to Record</a>
        </div>
    </div>
</x-layout>