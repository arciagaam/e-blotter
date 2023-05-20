<x-layout>
    <x-page-header>Accounts</x-page-header>

    <div class="flex flex-col gap-3">
    
        <div class="flex flex-row w-full justify-between items-center">
            <form class="flex w-full gap-6 items-center">

                <div class="flex gap-2 items-center">
                    <label class="text-sm" for="search">Search</label>
                    <div class="flex items-center border border-table-even focus-within:border-project-blue rounded-md overflow-hidden gap-2 px-1 bg-white transition-all duration-300 ease-in-out">
                        <input class="w-full outline-none px-1 text-sm py-1" type="text" name="search" id="search" value="{{ request()->query()['search'] ?? null }}">
                        <button class="w-fit h-fit aspect-square flex items-center justify-center"><i class='bx bx-search'></i></button>
                    </div>
                </div>

            </form>
        </div>

        <table id="main-table" class="display main-table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Barangay</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Actions</th>
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
                            <td>Name {{$key}}</td>
                            <td>Username</td>
                            <td>Barangay {{$key}}</td>
                            <td>Contact Number{{$key}}</td>
                            <td>Email{{$key}}</td>
                            <td>
                                <div class="flex gap-3">
                                    <button>Verify</button>
                                    <button>Edit</button>
                                    <button>Delete</button>
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

</x-layout>

@vite('resources/js/table.js')