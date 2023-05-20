<x-layout>
    <x-page-header>Blotter Records</x-page-header>

    <div class="flex flex-col h-full justify-between">

        <div class="flex flex-col gap-3">
            {{-- TABLE ACTIONS --}}
            <div class="flex flex-row w-full justify-between items-center">
                <form class="flex flex-col w-full gap-2">
                    @csrf

                    <div class="flex flex-row justify-between">
                        <div class="form-input-container flex-row gap-5">
                            <div class="flex flex-row justify-center items-center">
                                <label for="purok_id" class="flex gap-2 items-center">Select Purok</label>
                            </div>

                            <select class="form-input" name="purok_id" id="purok_id">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>

                        <a class="primary-btn" href="{{ route('records.create') }}">New Record</a>
                    </div>

                    <div class="flex flex-row justify-between">
                        <div class="flex gap-2 items-center">
                            <label class="text-sm" for="search">Search</label>
                            <div
                                class="flex items-center border border-table-even focus-within:border-project-blue rounded-md overflow-hidden gap-2 px-1 bg-white transition-all duration-300 ease-in-out">
                                <input class="w-full outline-none px-1 text-sm py-1" type="text" name="search"
                                    id="search" value="{{ request()->query()['search'] ?? null }}">
                                <button class="w-fit h-fit aspect-square flex items-center justify-center"><i
                                        class='bx bx-search'></i></button>
                            </div>
                        </div>

                        <div class="flex gap-2 items-center">
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
                        <th>
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
                        <th>
                            <p>Date of Complaint</p>
                        </th>
                        <th>
                            <p>Blotter Status</p>
                        </th>
                        <th>
                            <p class="text-center">Change Status</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $residents = [['number' => '1', 'barangay' => 'bgy', 'accusation' => 'accusation 1', 'complainant' => 'yesser', 'date' => 'now', 'status' => 'omsim'], ['number' => '1', 'barangay' => 'bgy', 'accusation' => 'accusation 1', 'complainant' => 'yesser', 'date' => 'now', 'status' => 'omsim']];
                    @endphp

                    @empty($residents)
                        <tr>
                            <td colspan="100%" class="text-center">There are no data.</td>
                        </tr>
                    @else
                        @foreach ($residents as $key => $resident)
                            <tr>
                                <td>asd{{ $key }}</td>
                                <td>1</td>
                                <td>kghkhg{{ $key }}</td>
                                <td>vbnvbnbv{{ $key }}</td>
                                <td>sdgsdg{{ $key }}</td>
                                <td>fgjfgj</td>
                                <td>
                                    <div class="flex w-full h-full justify-center items-center gap-2">
                                        <button class="secondary-btn" type="button">Preview</button>
                                        <button class="secondary-btn" type="button">Edit</button>
                                        <button class="secondary-btn" type="button">Print</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endempty
                </tbody>
            </table>

            <div class="w-full flex">
                {{-- {{$residents->links()}} --}}
            </div>
        </div>

    </div>

</x-layout>

