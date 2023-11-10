<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generated Reports</title>
    @vite('resources/css/app.css')
    <style>
        * {
            font-family: 'Times New Roman', Times, serif;
            text-decoration-skip-ink: none;
        }

        @page {
            height: 842pt;
            width: 595pt;
        }

        html,
        body {
            width: 595pt;
            height: 100%;
        }
    </style>
</head>

@props(['body' => true, 'office' => 'OFFICE OF THE LUPONG TAGAPAMAYAPA'])

<body>
    <div id="main" class="flex flex-col gap-8 h-full">
        @empty(!auth()->user()->barangays[0]->logo)
            <img class="absolute inset-2 object-fit w-full max-w-[5rem] aspect-square" id="logo"
                src="{{ asset('assets/' . auth()->user()->barangays[0]->logo) }}">
        @endempty

        @if ($body)
            <div class="flex flex-col gap-2">
                <div class="flex flex-col items-center">
                    <p>Republic of The Philippines</p>
                    <p>Province Of Laguna</p>
                    <p>Municipality Of Pila</p>
                    <p>Barangay {{ auth()->user()->barangays[0]->name ?? '____________' }}</p>
                </div>

                <p class="self-center">{{ strtoupper($office) }}</p>
                <p class="self-center text-blue-400 font-bold">{{ strtoupper("OFFICE OF THE PUNONG BARANGAY") }}</p>
            </div>
        @endif

        <p class="self-end pl-1">{{ date('F j, Y') }}</p>

        <div class="flex flex-col items-center">
            <p class="tracking-[0.35rem]">MONTHLY TRANSMITTAL OF FINAL REPORTS</p>
        </div>

        <div class="flex flex-row gap-1">
            <p>To: </p>
            <div>
                <p class="font-bold">{{ $addressee['addressee_to'] }}</p>
                <p>{{ $addressee['addressee_company'] }}</p>
                <p>{{ $addressee['addressee_address'] }}</p>
            </div>
        </div>

        <p>Enclosed herewith are the final reports of settlement of disputes and arbitration awards made by the Punong
            Barangay / Pangkat taga-pagkasundo in the following cases.</p>

        <table class="w-full table">
            <thead>
                <tr>
                    <th class="border border-black">
                        <p class="font-normal text-center">Barangay Case No.</p>
                    </th>
                    <th class="border border-black">
                        <div class="font-normal text-center">
                            <p>TITLE</p>
                            <p>(Complainant, et al vs Respondent, et al)</p>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($results))
                    @foreach ($results as $result)
                        <tr class="odd:bg-gray-200 break-inside-avoid">
                            <td class="border border-black">
                                <p class="text-center">
                                    {{ date('Y-m-d', strtotime($result->created_at)) . '-' . str_pad($result->barangay_blotter_number, 3, '0', STR_PAD_LEFT) }}
                                </p>
                            </td>
                            <td class="border border-black">
                                <p class="text-center">
                                    <span>{{ formatName($result->victim->first_name ?? '', $result->victim->middle_name ?? null, $result->victim->last_name ?? '') }}</span>
                                    <span>vs</span>
                                    <span>{{ formatName($result->suspect->first_name ?? '', $result->suspect->middle_name ?? null, $result->suspect->last_name ?? '') }}</span>
                                </p>
                            </td>
                            {{-- @if (in_array('complainant', $selections['contents']))
                                <td class="border border-black">
                                    <p class="text-center">
                                        {{ formatName($result->victim->first_name ?? '', $result->victim->middle_name ?? null, $result->victim->last_name ?? '') }}
                                    </p>
                                </td>
                            @endif
                            @if (in_array('respondent', $selections['contents']))
                                <td class="border border-black">
                                    <p class="text-center">
                                        {{ formatName($result->suspect->first_name ?? '', $result->suspect->middle_name ?? null, $result->suspect->last_name ?? '') }}
                                    </p>
                                </td>
                            @endif
                            <td class="border border-black">
                                <p class="text-center">{{ date('F j, Y', strtotime($result->created_at)) }}</p>
                            </td> --}}
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="100%" class="border border-black text-center">There are no data generated.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="flex flex-col self-end break-inside-avoid gap-12">
            <div class="flex flex-col text-center self-end">
                <p class="underline underline-offset-4 font-bold">
                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</p>
                <p>Lupon Secretary</p>
            </div>
            <p><strong class="font-bold">IMPORTANT:</strong> Lupon/Pangkat Secretary shall transmit not later than the
                first five days of each month the final reports for preceding month.</p>
        </div>

        {{-- <table>
            <tr>
                <td class="w-40">
                    <p class="pl-1 font-bold">Date Generated</p>
                </td>
                <td>
                    <p class="pl-1">{{ date('F j, Y') }}</p>
                </td>
            </tr>
            <tr>
                <td class="w-40">
                    <p class="pl-1 font-bold">Date Range</p>
                </td>
                <td>
                    <p class="pl-1">{{ date('F j, Y', strtotime($selections->from)) }} -
                        {{ date('F j, Y', strtotime($selections->to)) }}</p>
                </td>
            </tr>
            <tr>
                <td class="w-40">
                    <p class="pl-1 font-bold">Record Count</p>
                </td>
                <td>
                    <p class="pl-1">{{ count($results) }}</p>
                </td>
            </tr>
        </table> --}}

        {{-- <table class="w-full table">
            <thead>
                <tr>
                    <th class="border border-black">
                        <p class="text-center">Blotter No.</p>
                    </th>
                    <th class="border border-black">
                        <p class="text-center">Status</p>
                    </th>
                    @if (in_array('complainant', $selections['contents']))
                        <th class="border border-black">
                            <p class="text-center">Complainant</p>
                        </th>
                    @endif
                    @if (in_array('respondent', $selections['contents']))
                        <th class="border border-black">
                            <p class="text-center">Respondent</p>
                        </th>
                    @endif
                    <th class="border border-black">
                        <p class="text-center">Date Issued</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($results))
                    @foreach ($results as $result)
                        <tr class="odd:bg-gray-200 break-inside-avoid">
                            <td class="border border-black">
                                <p class="text-center">{{ $result->barangay_blotter_number }}</p>
                            </td>
                            <td class="border border-black">
                                <p class="text-center">{{ ucfirst($result->blotterStatus->name) }}</p>
                            </td>
                            @if (in_array('complainant', $selections['contents']))
                                <td class="border border-black">
                                    <p class="text-center">
                                        {{ formatName($result->victim->first_name ?? '', $result->victim->middle_name ?? null, $result->victim->last_name ?? '') }}
                                    </p>
                                </td>
                            @endif
                            @if (in_array('respondent', $selections['contents']))
                                <td class="border border-black">
                                    <p class="text-center">
                                        {{ formatName($result->suspect->first_name ?? '', $result->suspect->middle_name ?? null, $result->suspect->last_name ?? '') }}
                                    </p>
                                </td>
                            @endif
                            <td class="border border-black">
                                <p class="text-center">{{ date('F j, Y', strtotime($result->created_at)) }}</p>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="100%" class="border border-black text-center">There are no data generated.</td>
                    </tr>
                @endif
            </tbody>
        </table> --}}

    </div>
</body>

</html>

{{-- @vite('resources/js/print_window.js') --}}
