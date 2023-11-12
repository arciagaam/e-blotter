<x-layout>
    <x-page-header>Blotter Records</x-page-header>

    <div class="flex flex-col h-full justify-between">

        <div class="flex flex-col gap-3">
            {{-- TABLE ACTIONS --}}
            <div class="flex flex-col w-full justify-between items-center">
                <div class="flex flex-row self-end gap-2">
                    <a class="btn-outline danger" href="{{ route('records.archived') }}">Archived Blotter Cases</a>
                    <a class="ml-auto btn-filled" href="{{ route('records.create') }}">New Record</a>
                </div>

                <form class="flex flex-col w-full gap-2">
                    <div class="flex flex-col lg:flex-row gap-4 justify-between">
                        <div class="flex flex-col lg:flex-row gap-4">
                            {{-- <div class="form-input-container">
                                <label for="search">Search</label>
                                <input class="form-input" value="{{ request()->query()['search'] ?? null }}"
                                    type="text" name="search" id="search">
                            </div> --}}
                            <div class="form-input-container">
                                <label for="search">Search</label>
                                <select class="form-input" name="search" id="search">
                                    <option value="">-- SELECT PUROK --</option>
                                    @foreach ($purokList as $purok)
                                        <option value="{{ $purok }}" @selected(array_key_exists('search', request()->query()) && $purok == request()->query()['search'])>
                                            {{ $purok }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-row gap-2">
                                <div class="form-input-container">
                                    <label for="from">From</label>
                                    <input class="form-input" value="{{ request()->query()['from'] ?? null }}"
                                        type="date" name="from" id="from">
                                </div>
                                <div class="form-input-container">
                                    <label for="to">To</label>
                                    <input class="form-input" value="{{ request()->query()['to'] ?? null }}"
                                        type="date" name="to" id="to">
                                </div>

                                <button class="btn-filled h-fit flex justify-center self-end">Search</button>
                            </div>
                        </div>

                        <div class="flex gap-2 items-center self-start lg:self-end">
                            <label class="text-sm" for="rows">Rows per page</label>
                            <input class="form-input w-10" type="text" name="rows" id="rows"
                                value={{ request()->query()['rows'] ?? 10 }}>
                        </div>
                    </div>
                </form>
            </div>

            <table id="main-table" class="main-table w-full">
                <thead>
                    <tr>
                        <th class="w-1/12">
                            <p>Blotter No.</p>
                        </th>
                        <th>
                            <p>Purok</p>
                        </th>
                        <th>
                            <p>Accusation</p>
                        </th>
                        <th>
                            <p>Complainant/s Name</p>
                        </th>
                        <th class="w-2/12">
                            <p>Date of Complaint</p>
                        </th>
                        <th class="w-1/12">
                            <p class="text-center">Blotter Status</p>
                        </th>
                        <th class="w-2/12">
                            <p class="text-center">Actions</p>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @empty($records)
                        <tr>
                            <td colspan="100%" class="text-center">There are no data.</td>
                        </tr>
                    @else
                        @foreach ($records as $key => $record)
                            <tr>
                                <td>
                                    <p>{{ $record->barangay_blotter_number }}</p>
                                </td>
                                <td>
                                    <p>{{ $record->purok }}</p>
                                </td>
                                <td>
                                    <p>{{ $record->case }}</p>
                                </td>
                                <td>
                                    <p>{{ formatName($record->victim->first_name ?? '', $record->victim->middle_name ?? null, $record->victim->last_name ?? '') }}
                                    </p>
                                </td>
                                <td>
                                    <p>{{ date_format($record->created_at, 'F j, Y') }}</p>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center whitespace-nowrap">
                                        <x-blotter-status id="{{ $record->blotterStatus->id }}"
                                            text="{{ $record->blotterStatus->name }}" />
                                    </div>
                                </td>
                                <td>
                                    <div class="flex w-full h-full justify-center items-center gap-2">
                                        <a class="btn-outline success flex justify-center items-center" target="_blank"
                                            href="{{ route('records.print', ['record' => $record->id]) }}">
                                            <box-icon class="text-xs" name='printer'></box-icon>
                                        </a>
                                        <a href="{{ route('records.show', ['record' => $record->id]) }}"
                                            class="btn-outline flex justify-center items-center">
                                            <box-icon class="text-xs" name='file'></box-icon>
                                        </a>
                                        {{-- <a href="{{ route('records.edit', ['record' => $record->id]) }}"
                                            class="btn-outline flex justify-center items-center">
                                            <box-icon class="text-xs" name='edit-alt'></box-icon>
                                        </a> --}}
                                        <button data-target="#delete" data-form-id="{{ $record->id }}"
                                            class="btn-outline danger flex justify-center items-center">
                                            <box-icon class="text-xs pointer-events-none" name='trash-alt'></box-icon>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endempty
                </tbody>
            </table>

            <div class="w-full flex">
                {{ $records->links() }}
            </div>
        </div>

    </div>

</x-layout>

<x-modal id="delete">
    <x-slot:heading>
        Archive Record
    </x-slot:heading>

    <form action="#" method="POST" id="delete-record-form"
        data-action="{{ route('records.destroy', ['record' => ':id']) }}">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to archive this record?</p>
    </form>

    <x-slot:footer>
        <button class="btn-filled danger" form="delete-record-form">Archive</button>
    </x-slot:footer>
</x-modal>
