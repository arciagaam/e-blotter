<x-layout>
    <x-page-header>Blotter Records</x-page-header>

    <div class="flex flex-col gap-3">
        {{-- TABLE ACTIONS --}}
        <div class="flex flex-row w-full justify-between items-center">
            <form class="flex w-full gap-6 items-center">

                <div class="flex gap-2 items-center">
                    <label class="text-sm" for="search">Select Barangay</label>
                    <select class="form-input" name="search" id="search">
                        <option value="1">Barangay 1</option>
                        <option value="2">Barangay 2</option>
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
                @php
                    $residents = [
                        ['number' => '1', 'barangay' => 'bgy', 'accusation' => "accusation 1", 'complainant' => 'yesser', 'date' => 'now', 'status' => 'omsim'],
                        ['number' => '1', 'barangay' => 'bgy', 'accusation' => "accusation 1", 'complainant' => 'yesser', 'date' => 'now', 'status' => 'omsim'],
                    ];
                @endphp

                @empty($residents)
                    <tr>
                        <td colspan="100%" class="text-center">There are no data.</td>
                    </tr>
                @else
                    @foreach ($residents as $key => $resident)
                        <tr>
                            <td>asd{{$key}}</td>
                            <td>shfdh</td>
                            <td>kghkhg{{$key}}</td>
                            <td>vbnvbnbv{{$key}}</td>
                            <td>sdgsdg{{$key}}</td>
                            <td>fgjfgj</td>
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