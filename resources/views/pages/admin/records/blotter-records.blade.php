<x-layout>
    <x-page-header>Blotter Records</x-page-header>

    <div class="flex flex-col gap-3">
        {{-- TABLE ACTIONS --}}
        <div class="flex flex-row w-full justify-between items-center">
            <form class="flex w-full gap-6 items-center">

                <div class="flex gap-2 items-center">
                    <label class="text-sm" for="search">Select Barangay</label>
                    <select class="form-input" name="search" id="search">
                        <option value="1">Test Barangay 1</option>
                        <option value="2">Test Barangay 2</option>
                    </select>

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
                        <p>Barangay</p>
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
                    @foreach ($records as $record)
                    <tr>
                        <td><p>{{ $record->id }}</p></td>
                        <td><p>{{ $record->barangays->name }}</p></td>
                        <td><p>{{ $record->case }}</p></td>
                        <td><p>{{ $record->victim->name }}</p></td>
                        <td><p>{{ date_format($record->created_at, 'F j, Y') }}</p></td>
                        <td>
                            <div class="flex justify-center items-center">
                                <x-blotter-status id="{{ $record->blotterStatus->id }}" text="{{ $record->blotterStatus->name }}" />
                            </div>
                        </td>
                        <td>
                            <div class="flex w-full h-full justify-center items-center gap-2">
                                <a href="{{ route('admin.records.show', ['record' => $record->id]) }}" class="btn-tinted" >Preview</a>
                                <button class="btn-tinted" type="button">Print</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                @endempty
            </tbody>
        </table>

        <div class="w-full flex">
            {{-- {{$records->links()}} --}}
        </div>   
    </div>

</x-layout>

@vite('resources/js/table.js')