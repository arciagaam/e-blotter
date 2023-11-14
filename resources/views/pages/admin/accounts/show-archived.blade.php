<x-layout>
    <x-page-header>Archived Accounts</x-page-header>

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
                    <th class="w-3/12">
                        <p>Barangay Captain</p>
                    </th>
                    <th class="w-3/12">
                        <p>Barangay</p>
                    </th>
                    <th class="w-2/12">
                        <p>Contact Number</p>
                    </th>
                    <th class="w-2/12">
                        <p>Email</p>
                    </th>
                    <th class="w-1/12">
                        <p class="text-center">Status</p>
                    </th>
                    <th>
                        <p class="text-center">Actions</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if(count($accounts) == 0)
                <tr>
                    <td colspan="100%" class="text-center">There are no data.</td>
                </tr>
                @else
                @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->first_name }} {{ $account->last_name }}</td>
                    <td>{{ $account->barangays[0]->name }}</td>
                    <td>{{ $account->contact_number }}</td>
                    <td>{{ $account->email }}</td>
                    <td>
                        <div class="flex justify-center items-center">
                            @if ($account->verified_at)
                            <p class="w-fit bg-emerald-100 text-center rounded-full text-emerald-600 px-4 py-1">
                                Verified</p>
                            @else
                            <p class="bg-rose-100 text-center rounded-full text-rose-600 px-4 py-1">Unverified
                            </p>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="flex flex-row gap-3">
                            {{-- <a class="btn-outline success flex justify-center items-center" href="{{ route('records.restore', ['record' => $record->id]) }}"> --}}
                            <a class="btn-outline success flex justify-center items-center" href="{{ route('admin.accounts.restore', ['account' => $account->id]) }}">
                                <box-icon class="text-xs" name='undo'></box-icon>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

        <div class="w-full flex">
            {{-- {{$residents->links()}} --}}
        </div>
    </div>
</x-layout>
