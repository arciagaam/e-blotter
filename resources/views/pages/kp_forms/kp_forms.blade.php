<x-layout>
    <x-page-header>Issued Certificates</x-page-header>

    <div class="flex flex-col gap-3">

        <div class="flex flex-row gap-4">
            <x-nav-button url="{{ route('records.show', ['record' => $record]) }}">Details</x-nav-button>
            <x-nav-button url="{{ route('records.kp-forms.index', ['record' => $record]) }}">Issued Certificate
            </x-nav-button>
        </div>

        <div class="flex flex-col-reverse lg:flex-row gap-4">
            <table id="main-table" class="main-table w-full lg:w-3/4">
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
                                        <a class="btn-outline" target="_blank"
                                            href="{{ route('records.kp-forms.show', ['recordId' => $record, 'issuedKpFormId' => $form->id]) }}">Print</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endempty
                </tbody>
            </table>

            <div class="flex flex-col w-full lg:w-1/4 h-fit border border-slate-400 bg-white rounded-md">
                <div class="flex flex-col border-b border-slate-400 p-4">
                    <p class="font-bold">Message</p>
                    <div class="flex flex-col">
                        <p>{{ $message['message'] ?? 'No message at the moment.' }}</p>
                    </div>
                </div>
                <div class="flex flex-col p-4">
                    <p class="font-bold">Recommendations</p>
                    <div class="flex flex-col">
                        <p>{{ $message['recommendations'] ?? 'No recommendations at the moment.' }}</p>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="w-full flex">
                {{$records->links()}}
            </div> --}}
    </div>

</x-layout>
