<x-layout>
    <x-page-header>KP Forms</x-page-header>

    <div class="flex flex-col gap-3">
        <div class="flex flex-row w-full justify-between items-center">
            <form class="flex w-full gap-6 items-center">

                <div class="flex gap-2 items-center">
                    <label class="text-sm" for="search">Search KP Forms</label>
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
                @empty($kpForms)
                    <tr>
                        <td colspan="100%" class="text-center">There are no data.</td>
                    </tr>
                @else
                    @foreach ($kpForms as $kpForm)
                        <tr>
                            <td>
                                <p>KP FORM NO # {{ $kpForm->number }}</p>
                            </td>
                            <td>
                                <p>{{ $kpForm->name }}</p>
                            </td>
                            <td>
                                <div class="flex w-full h-full justify-center items-center gap-2">
                                    <a href="{{ route('admin.kp-forms.show', ['kp_form' => $kpForm->id]) }}" class="btn-outline flex justify-center items-center"
                                        type="button">
                                        <box-icon class="text-xs" name='search' ></box-icon>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endempty
            </tbody>
        </table>
    </div>
</x-layout>
