<x-layout>
    <x-page-header>Accounts</x-page-header>

    <div class="flex flex-col gap-3">

        <div class="flex flex-row w-full justify-between items-center">
            <form class="flex w-full gap-6 items-center">

                <div class="flex gap-2 items-center">
                    <label class="text-sm" for="search">Search</label>
                    <div
                        class="flex items-center border border-table-even focus-within:border-project-blue rounded-md overflow-hidden gap-2 px-1 bg-white transition-all duration-300 ease-in-out">
                        <input class="w-full outline-none px-1 text-sm py-1" type="text" name="search" id="search" value="{{ request()->query()['search'] ?? null }}">
                        <button class="w-fit h-fit aspect-square flex items-center justify-center"><i class='bx bx-search'></i></button>
                    </div>
                </div>

            </form>
        </div>

        <table id="main-table" class="display main-table w-full">
            <thead>
                <tr>
                    <th class="w-2/12">
                        <p>Name</p>
                    </th>
                    <th class="w-2/12">
                        <p>Username</p>
                    </th>
                    <th class="w-3/12">
                        <p>Barangay</p>
                    </th>
                    <th class="w-1/12">
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
                @empty($accounts)
                    <tr>
                        <td colspan="100%" class="text-center">There are no data.</td>
                    </tr>
                @else
                    @foreach ($accounts as $account)
                        <tr>
                            <td>{{$account->first_name}} {{$account->last_name}}</td>
                            <td>{{$account->username}}</td>
                            <td>{{$account->barangays[0]->name}}</td>
                            <td>{{$account->contact_number}}</td>
                            <td>{{$account->email}}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    @if ($account->verified_at)
                                        <p class="w-fit bg-emerald-100 text-center rounded-full text-emerald-600 px-4 py-1">Verified</p>
                                    @else
                                        <p class="bg-rose-100 text-center rounded-full text-rose-600 p-1">Unverified</p>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="flex flex-row gap-3">
                                    <button data-id="{{$account->id}}" class="verify-btn {{$account->verified_at ? 'btn-gray cursor-not-allowed' : 'btn-filled'}}" {{$account->verified_at ? 'disabled' : ''}}>Verify</button>
                                    <a href="{{ route('admin.accounts.edit', $account->id) }}" class="btn-tinted" >Edit</a>
                                    <button class="btn-tinted danger">Delete</button>
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

<div id="confirm_modal" class="pl-16 absolute hidden flex inset-0 items-center justify-center min-h-[calc(100%)] min-w-[calc(100%)] flex-col bg-black/20 text-project-blue ">
    <div class="flex flex-col w-3/4 min-h-10 bg-white rounded-md p-5 gap-7">

        <div class="flex justify-between">
            <p class="text-lg font-bold">Confirm Verification</p>
            <i id="close_modal" class='bx bx-sm bxs-x-circle self-end cursor-pointer'></i>
        </div>

        <div class="flex gap-5 items-center">
            <p>Are you sure you want to verify this account?</p>
        </div>

        <button id="confirm_verify" class="btn-filled">Verify Account</button>
    </div>
</div>

@vite('resources/js/accounts.js')