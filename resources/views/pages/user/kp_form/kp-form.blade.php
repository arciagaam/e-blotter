<x-layout>
    <x-page-header>KP Forms</x-page-header>

    <div class="flex flex-col h-full justify-between">

        <div class="flex flex-col gap-3">
            {{-- TABLE ACTIONS --}}
            <div class="flex flex-row w-full justify-between items-center">
                <div class="flex flex-row w-full justify-between items-center">
                    <form class="flex w-full gap-6 items-center justify-between">
                        @csrf

                        <div class="form-input-container flex-row gap-5">
                            <div class="flex flex-row justify-center items-center">
                                <label for="kp_form_id" class="flex gap-2 items-center">Search Form No.</label>
                            </div>

                            <input class="form-input" type="text" name="kp_form_id" id="kp_form_id">
                        </div>
                    </form>
                </div>
            </div>

            <table id="main-table" class="main-table w-full">
                <thead>
                    <tr>
                        <th class="w-1/4">
                            <p>Form No.</p>
                        </th>
                        <th class="w-full">
                            <p>Form Title</p>
                        </th>
                        <th class="w-auto">
                            <p class="text-center">Action</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $kpForms = ['NOTICE TO CONSTITUTE THE LUPON', 'APPOINTMENT LETTER', 'NOTICE OF APPOINTMENT', 'LIST OF APPOINTED LUPON MEMBERS', 'LUPON MEMBER OATH STATEMENT', 'WITHDRAWAL OF APPOINTMENT', 'COMPLAINANT’S FORM'];
                    @endphp

                    @empty($kpForms)
                        <tr>
                            <td colspan="100%" class="text-center">There are no data.</td>
                        </tr>
                    @else
                        @foreach ($kpForms as $key => $value)
                            <tr>
                                <td><p>KP FORM NO # {{ $key + 1 }}</p></td>
                                <td><p>{{ $value }}</p></td>
                                <td>
                                    <div class="flex w-full h-full justify-center items-center gap-2">
                                        <button class="btn-tinted" type="button">Preview</button>
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
