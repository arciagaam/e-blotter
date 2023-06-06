<x-layout>
    <x-page-header>Accounts</x-page-header>

    <div class="flex flex-col gap-3">

        <div class="flex flex-row w-full justify-between items-center">
            <form class="flex w-full gap-6 items-center">

                <div class="flex gap-2 items-center">
                    <label class="text-sm" for="search">Search</label>
                    <div
                        class="flex items-center border border-table-even focus-within:border-project-blue rounded-md overflow-hidden gap-2 px-1 bg-white transition-all duration-300 ease-in-out">
                        <input class="w-full outline-none px-1 text-sm py-1" type="text" name="search" id="search"
                            value="{{ request()->query()['search'] ?? null }}">
                        <button class="w-fit h-fit aspect-square flex items-center justify-center"><i
                                class='bx bx-search'></i></button>
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
                            <td>{{ $account->first_name }} {{ $account->last_name }}</td>
                            <td>{{ $account->username }}</td>
                            <td>{{ $account->barangays[0]->name }}</td>
                            <td>{{ $account->contact_number }}</td>
                            <td>{{ $account->email }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    @if ($account->verified_at)
                                        <p class="w-fit bg-emerald-100 text-center rounded-full text-emerald-600 px-4 py-1">
                                            Verified</p>
                                    @else
                                        <p class="bg-rose-100 text-center rounded-full text-rose-600 p-1">Unverified</p>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="flex flex-row gap-3">
                                    <button data-target="#verify" data-form-id="{{ $account->id }}"
                                        class="verify-btn {{ $account->verified_at ? 'btn-gray cursor-not-allowed' : 'btn-filled' }}"
                                        {{ $account->verified_at ? 'disabled' : '' }}>Verify</button>
                                    <button data-target="#edit" data-form-id="{{ $account->id }}" class="btn-tinted">Edit</button>
                                    <button data-target="#delete" class="btn-tinted danger">Delete</button>
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

<x-modal id="edit">
    <x-slot:heading>
        Edit User
    </x-slot:heading>

    <form action="#" method="POST" id="edit-user-form" data-action="{{ route('admin.accounts.update', ['account' => ':id']) }}">
        @method('PUT')

        <div class="form-input-container">
            <label for="first_name">First Name</label>
            <input class="form-input" type="text" name="first_name" id="first_name"
                value="">
        </div>

        <div class="form-input-container">
            <label for="last_name">Last Name</label>
            <input class="form-input" type="text" name="last_name" id="last_name" value="">
        </div>

        <div class="form-input-container">
            <label for="username">Username</label>
            <input class="form-input" type="text" name="username" id="username" value="">
        </div>

        <div class="form-input-container">
            <label for="barangays">Barangay</label>
            <input class="form-input" type="text" name="barangays" id="barangays"
                value="">
        </div>

        <div class="form-input-container">
            <label for="contact_number">Contact Number</label>
            <input class="form-input" type="text" name="contact_number" id="contact_number"
                value="">
        </div>

        <div class="form-input-container">
            <label for="email">Email</label>
            <input class="form-input" type="text" name="email" id="email" value="">
        </div>
    </form>

    <x-slot:footer>
        <button class="btn-filled" form="edit-user-form">Submit</button>
    </x-slot:footer>
</x-modal>

<x-modal id="verify">

    <x-slot:heading>
        Confirm Verification
    </x-slot:heading>

    <form action="#" method="POST" id="verify-user-form" data-action="{{ route('admin.accounts.verify') }}">
        <input type="hidden" name="id" value="">
        <p>Are you sure you want to verify this account?</p>
    </form>

    <x-slot:footer>
        <button class="btn-filled" form="verify-user-form">Verify</button>
    </x-slot:footer>
</x-modal>

<x-modal id="delete">
    <x-slot:heading>
        Delete Account
    </x-slot:heading>

    <form action="#" method="POST" id="delete-user-form" data-action="{{ route('admin.accounts.verify') }}">
        <p>Are you sure you want to delete this account?</p>
    </form>

    <x-slot:footer>
        <button class="btn-filled danger" form="delete-user-form">Delete</button>
    </x-slot:footer>
</x-modal>


{{-- @vite('resources/js/accounts.js') --}}
