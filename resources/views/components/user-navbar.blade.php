<nav
    class="absolute top-0 left-0 max-w-[4rem]  z-50 flex flex-col min-h-screen h-screen bg-project-blue-dark text-white transition-all duration-500 ease-in-out drop-shadow-lg pb-10 pt-5 gap-12 pr-5">

    <button id="burger" class="flex items-center self-end pl-5 w-fit">
        <box-icon type="regular" name='menu' size="sm"></box-icon>
    </button>

    <div id="links-container" class="flex flex-col gap-10 whitespace-nowrap h-full overflow-hidden">

        {{-- <a href="#" class="flex items-center gap-5 px-5">
                <img class="object-fit w-full max-w-[5rem]" src="{{$barangayInformation->logo ? url($barangayInformation->logo) : url('images/no_image.png')}}" alt="">
                <p>Barangay {{$barangayInformation->name}}</p>
            </a> --}}

        <div class="flex flex-col gap-5 h-full">
            <a href="{{ url('/dashboard') }}"
                class="pl-5 flex items-center gap-5 transition-all duration-300 {{ request()->is('dashboard*') ? 'text-project-yellow-default' : 'hover:text-project-yellow-default' }}">
                <box-icon type="{{request()->is('dashboard*') ? 'solid' : 'regular'}}" color="{{request()->is('dashboard*') ? '#FBAD26' : 'white'}}" name='home' size="1.5em"></box-icon>
                <p class="text-sm font-normal">Dashboard</p>
            </a>

            <a href="{{ route('records.index') }}"
                class="pl-5 flex items-center gap-5 transition-all duration-300 {{ request()->is('records*') ? 'text-project-yellow-default' : 'hover:text-project-yellow-default' }}">
                <box-icon type="{{request()->is('records*') ? 'solid' : 'regular'}}" color="{{request()->is('records*') ? '#FBAD26' : 'white'}}" name='folder' size="1.5em"></box-icon>
                <p class="text-sm font-normal">Blotter Records</p>
            </a>

            <a href="{{ url('/kp-forms') }}"
                class="pl-5 flex items-center gap-5 transition-all duration-300 {{ request()->is('kp-forms*') ? 'text-project-yellow-default' : 'hover:text-project-yellow-default' }}">
                <box-icon type="{{request()->is('kp-forms*') ? 'solid' : 'regular'}}" color="{{request()->is('kp-forms*') ? '#FBAD26' : 'white'}}" name='file' size="1.5em"></box-icon>
                <p class="text-sm font-normal">KP Forms</p>
            </a>

            <a href="{{ url('/audit-trail') }}"
                class="pl-5 flex items-center gap-5 transition-all duration-300 {{ request()->is('audit-trail*') ? 'text-project-yellow-default' : 'hover:text-project-yellow-default' }}">
                <box-icon type="{{request()->is('audit-trail*') ? 'solid' : 'regular'}}" color="{{request()->is('audit-trail*') ? '#FBAD26' : 'white'}}" name='group' size="1.5em"></box-icon>
                <p class="text-sm font-normal">Account</p>
            </a>

            <a href="{{ url('/logout') }}"
                class="pl-5 flex items-center gap-5 mt-auto hover:text-red-500 hover:fill-red-500">
                <box-icon type="regular" name='log-out' size="1.5em"></box-icon>
                <p class="text-sm font-normal">Logout</p>
            </a>

        </div>

    </div>

</nav>

@vite('resources/js/nav.js')
