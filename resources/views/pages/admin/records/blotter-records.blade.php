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
                    <th>Blotter No.</th>
                    <th>Barangay</th>
                    <th>Accusation</th>
                    <th>Complainant/s Name</th>
                    <th>Date of Complaint</th>
                    <th>Blotter Status</th>
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
                            <td>{{$record->id}}</td>
                            <td>{{$record->barangay_id}}</td>
                            <td>{{$record->case}}</td>
                            <td>\\Complainant Name</td>
                            <td>{{$record->created_at}}</td>
                            <td>{{$record->blotter_status_id}}</td>
                        </tr>
                    @endforeach
                @endempty
            </tbody>
        </table>

        <div class="w-full flex">
            {{-- {{$residents->links()}} --}}
        </div>   
    </div>

</x-layout>

@vite('resources/js/table.js')