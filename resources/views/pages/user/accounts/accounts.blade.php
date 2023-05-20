<x-layout>
    <x-page-header>Accounts</x-page-header>


    <div class="flex flex-col gap-3">
        {{-- TABLE ACTIONS --}}
        <div class="flex flex-row w-full justify-between items-center">
            <form class="flex w-full gap-6 items-center justify-between">
                @csrf

                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-center items-center">
                        <label for="user" class="flex gap-2 items-center">Search</label>
                    </div>

                    <input class="form-input" type="text" name="user" id="user">
                </div>
            </form>
        </div>

        <table id="main-table" class="main-table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Contact No.</th>
                    <th>Email</th>
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
