@php $ctr = 1; @endphp

<x-kp-form-preview-layout office="OFFICE OF THE PUNONG BARANGAY">

    <div class="self-end">
        <p>________________________</p>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">NOTICE TO CONSTITUTE THE LUPON</p>
    </div>

    <div class="flex flex-col gap-4">
        <p>To All Barangay Members and All Other Persons Concerned:</p>
    
        <p>In compliance with Section 1(a), Chapter 7, Title One, Book III, Local
            Government Code of 1991 (Republic Act No. 7160), of the
            Katarungang Pambarangay Law, notice is hereby given to constitute
            the Lupong Tagapamayapa of this Barangay. The persons I am
            considering for appointment are the following:</p>

        <ol class="grid grid-rows-[repeat(13,_minmax(0,_1fr))] grid-flow-col list-decimal list-inside gap-y-2">
            @while ($ctr <= 25)
                <li>
                    <p class="inline-block border-b border-black flex-1 w-5/6"></p>
                </li>
                @php $ctr += 1; @endphp
            @endwhile
        </ol>
    
        <p>
            They have been chosen on the basis of their suitability for the task of
            conciliation considering their integrity, impartiality, independence of
            mind, sense of fairness and reputation for probity in view of their age,
            social standing in the community, tact, patience, resourcefulness,
            flexibility, open mindedness and other relevant factors. The law
            provides that only those actually residing or working in the barangay
            who are not expressly disqualified by law are qualified to be appointed
            as Lupon members.
        </p>
    
        <p>
            All persons are hereby enjoined to immediately inform me and of their
            opposition to or endorsement of any or all the proposed members or recommend to me other persons not
            included in the list but not later than the ________ day of _______, ____ (the last day for posting this
            notice).
        </p>
    
        <div class="flex flex-col w-max">
            <p class="w-full h-6 border-b border-0 border-black"></p>
            <p class="self-start" for="">Punong Barangay</p>
        </div>
    
        <div>
            <p>IMPORTANT: This notice is required to be posted in three (3)
                conspicuous places in the barangay for at least three (3) weeks.
            </p>
            <p>WARNING: Tearing or defacing this notice shall be subject to
                punishment according to law.
            </p>
        </div>
    </div>


</x-kp-form-preview-layout>
