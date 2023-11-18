<x-layout>
    <x-page-header>Blotter Records</x-page-header>

    <div class="flex flex-col gap-3">
        {{-- TABLE ACTIONS --}}
        <div class="flex flex-row w-full justify-between items-center">
            <form class="flex w-full gap-6 items-center">
                <div class="flex gap-2 items-center">
                    <label class="text-sm" for="search">Select Barangay</label>
                    <select class="form-input" name="search" id="search" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach ($barangays as $barangay)
                            <option value="{{ $barangay->id }}" @selected(request()->query('search') == $barangay->id)>
                                {{ Str::ucfirst($barangay->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-2 items-center">
                    <label class="text-sm" for="type">Select Remarks</label>
                    <select class="form-input" name="type" id="type" onchange="this.form.submit()">
                        <option value="">All</option>
                        @foreach ($blotterStatus as $status)
                            <option value="{{ $status->id }}" @selected(request()->query('type') == $status->id)>
                                {{ Str::ucfirst($status->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>

        <table id="main-table" class="main-table w-full">
            <thead>
                <tr>
                    <th class="cursor-pointer w-[10%]">
                        <p>Blotter No.</p>
                    </th>
                    <th class="cursor-pointer">
                        <p>Barangay</p>
                    </th>
                    <th class="cursor-pointer">
                        <p>Accusation</p>
                    </th>
                    <th class="cursor-pointer">
                        <p>Complainant/s Name</p>
                    </th>
                    <th class="cursor-pointer w-2/12">
                        <p>Date of Complaint</p>
                    </th>
                    <th class="cursor-pointer w-1/12">
                        <p class="text-center">Blotter Status</p>
                    </th>
                    <th class="w-2/12">
                        <p class="text-center">Actions</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(!count($records))
                    <tr>
                        <td colspan="100%" class="text-center">No Records.</td>
                    </tr>
                @else
                    @foreach ($records as $record)
                        <tr>
                            <td>
                                <div class="flex flex-row gap-2 items-center">
                                    <p>{{ $record->barangay_blotter_number }}</p>
                                    @isset($record->deleted_at)
                                        <p class="bg-rose-100 text-center rounded-full text-rose-600 px-4 py-1">Deleted</p>
                                    @endisset
                                </div>
                            </td>
                            <td>
                                <p>{{ $record->barangays->name }}</p>
                            </td>
                            <td>
                                <p>{{ $record->case }}</p>
                            </td>
                            <td>
                                <p>{{ formatName($record->victim->first_name ?? "", $record->victim->middle_name ?? null, $record->victim->last_name ?? "") }}
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
                                    <a href="{{ route('admin.records.show', ['record' => $record->id]) }}"
                                        class="btn-outline flex justify-center items-center">
                                        <box-icon class="text-xs" name='search' ></box-icon>
                                    </a>
                                    {{-- <a class="btn-outline" target="_blank" href="{{ route('admin.records.print', ['record' => $record->id]) }}">Print</a> --}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div class="w-full flex">
            {{ $records->links() }}
        </div>
    </div>

</x-layout>

{{-- @vite('resources/js/table.js') --}}
