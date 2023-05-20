<x-layout>
    <x-page-header>KP Forms</x-page-header>

    <div class="flex flex-col gap-3">
        {{-- TABLE ACTIONS --}}
        <div class="flex flex-row w-full justify-between items-center">
            <form class="flex w-full gap-6 items-center">

                <div class="flex gap-2 items-center">
                    <label class="text-sm" for="search">Search Form Number</label>
                    <div class="flex items-center border border-table-even focus-within:border-project-blue rounded-md overflow-hidden gap-2 px-1 bg-white transition-all duration-300 ease-in-out">
                        <input class="w-full outline-none px-1 text-sm py-1" type="text" name="search" id="search" value="{{ request()->query()['search'] ?? null }}">
                        <button class="w-fit h-fit aspect-square flex items-center justify-center"><i class='bx bx-search'></i></button>
                    </div>
                </div>

            </form>
        </div>

        <table id="main-table" class="main-table w-full">
            <thead>
                <tr>
                    <th class="w-1/4">Form Number</th>
                    <th class="w-full">Form Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $kpforms = [
                        ['number' => '1', 'title' => 'NOTICE TO CONSTITUTE THE LUPON'],
                        ['number' => '2', 'title' => 'APPOINTMENT LETTER'],
                        ['number' => '3', 'title' => 'NOTICE OF APPOINTMENT'],
                        ['number' => '4', 'title' => 'LIST OF APPOINTED LUPON MEMBERS'],
                        ['number' => '5', 'title' => 'LUPON MEMBER OATH STATEMENT'],
                        ['number' => '6', 'title' => 'WITHDRAWAL OF APPOINTMENT'],
                        ['number' => '7', 'title' => 'COMPLAINANT’S FORM'],
                    ];
                @endphp

                @empty($kpforms)
                    <tr>
                        <td colspan="100%" class="text-center">There are no data.</td>
                    </tr>
                @else
                    @foreach ($kpforms as $key => $kpform)
                        <tr>
                            <td>KP FORM # {{$kpform['number']}}</td>
                            <td>{{$kpform['title']}}</td>
                            <td>
                                <div class="flex gap-3 justify-center items-center w-full">
                                    <button class="secondary-btn">View</button>
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