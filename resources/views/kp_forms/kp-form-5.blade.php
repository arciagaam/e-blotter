<x-kp-form-layout office="OFFICE OF THE PUNONG BARANGAY">
    <div class="self-end">
        <p class="underline underline-offset-4">{{ date('F j, Y', strtotime($issuedForm->created_at)) }}</p>
    </div>

    <div class="flex flex-col items-center">
        <p class="font-bold tracking-[0.35rem]">OATH OF OFFICE</p>
    </div>

    <div class="flex flex-col gap-4">

        <p>Pursuant to Chapter 7, Title One, Book II, Local Government Code of
            1991 (Republic Act No. 7160), I <span class="underline">{{ $tagIds['name_of_lupon'] }}</span>, being duly
            qualified and having been duly appointed MEMBER of the Lupong
            Tagapamayapa of this Barangay, do hereby solemnly swear (or affirm)
            that I will faithfully and conscientiously discharge to the best of my
            ability, my duties and functions as such member and as member of the
            Pangkat ng Tagapagkasundo in which I may be chosen to serve; that I
            will bear true faith and allegiance to the Republic of the Philippines;
            that I will support and defend its Constitution and obey the laws, legal
            orders and decrees promulgated by its duly constituted authorities; and
            that I voluntarily impose upon myself this obligation without any
            mental reservation or purpose of evasion.</p>

        <p>SO HELP ME GOD. (In case of affirmation the last sentence will be
            omitted.)</p>

        <div class="flex flex-col w-max">
            <p class="w-full border-b border-0 border-black"></p>
            <p class="self-start">Member</p>
        </div>

        <p>SUBSCRIBED AND SWORN to (or AFFIRMED) before me this
            <span class="underline">{{date('jS', strtotime($tagIds['subscribed']))}}</span> day of <span class="underline">{{date('F', strtotime($tagIds['subscribed']))}}</span>, <span class="underline">{{date('Y', strtotime($tagIds['subscribed']))}}</span>.</p>

        <div class="flex flex-col w-max self-end mt-4">
            <p class="w-full border-b border-0 border-black"></p>
            <p class="self-center">Punong Barangay</p>
        </div>
    </div>


</x-kp-form-layout>
