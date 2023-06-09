<x-layout>
    <x-page-header>Issued Certificates</x-page-header>

    <div class="flex flex-col gap-3">

        <div class="flex flex-row gap-4">
            <x-nav-button url="{{ route('records.show', ['record' => $record]) }}">Details</x-nav-button>
            <x-nav-button url="{{ route('records.kp-forms.index', ['record' => $record]) }}">Issued Certificate
            </x-nav-button>
        </div>
        {{-- TABLE ACTIONS --}}
        {{-- <div class="flex flex-row w-full justify-between items-center">
                <form class="flex flex-col w-full gap-2">
                    @csrf

                    <div class="flex flex-row">
                        <a class="ml-auto btn-filled" href="{{ route('records.create') }}">New Record</a>
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
            </div> --}}

        <table id="main-table" class="main-table w-full">
            <thead>
                <tr>
                    <th class="w-2/12">
                        <p>Form Number</p>
                    </th>
                    <th>
                        <p>Form Name</p>
                    </th>
                    <th class="w-4/12">
                        <p class="text-center">Actions</p>
                    </th>
                </tr>
            </thead>

            <tbody>
                @empty($issuedKpForms)
                    <tr>
                        <td colspan="100%" class="text-center">There are no data.</td>
                    </tr>
                @else
                    @foreach ($issuedKpForms as $key => $form)
                        <tr>
                            <td>
                                <p>{{ $form->kpForm->number }}</p>
                            </td>
                            <td>
                                <p>{{ $form->kpForm->name }}</p>
                            </td>
                            <td>
                                <div class="flex w-full h-full justify-center items-center gap-2">
                                    {{-- <a href="{{ route('records.show', ['record' => $record->id]) }}"
                                        class="btn-tinted">Preview</a>
                                    <a href="{{ route('records.edit', ['record' => $record->id]) }}"
                                        class="btn-tinted">Edit</a> --}}
                                    <button class="btn-tinted" type="button">Print</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endempty
            </tbody>
        </table>

        {{-- <div class="w-full flex">
                {{$records->links()}}
            </div> --}}
    </div>

</x-layout>
