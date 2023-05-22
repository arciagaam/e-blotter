<x-layout>
    <x-page-header>Login Trail</x-page-header>


    <div class="flex flex-col gap-3">
        {{-- TABLE ACTIONS --}}
        <div class="flex flex-row w-full justify-between items-center">
            {{-- <form class="flex w-full gap-6 items-center justify-between">
                @csrf

                <div class="form-input-container flex-row gap-5">
                    <div class="flex flex-row justify-center items-center">
                        <label for="user" class="flex gap-2 items-center">Search</label>
                    </div>

                    <input class="form-input" type="text" name="user" id="user">
                </div>
            </form> --}}
        </div>

        <table id="main-table" class="main-table w-full">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Login Time</th>
                </tr>
            </thead>
            <tbody>
                @empty($loginTrails)
                    <tr>
                        <td colspan="100%" class="text-center">There are no data.</td>
                    </tr>
                @else
                    @foreach ($loginTrails as $loginTrail)
                        <tr>
                            <td>{{$loginTrail->users->username}}</td>
                            <td>{{$loginTrail->users->first_name}} {{$loginTrail->users->last_name}}</td>
                            <td>{{$loginTrail->loginroles->name}}</td>
                            <td>{{$loginTrail->created_at}}</td>
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
