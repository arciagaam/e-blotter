<nav
    class="absolute top-0 left-0 max-w-[4rem]  z-50 flex flex-col min-h-screen h-screen bg-project-blue-dark text-white transition-all duration-500 ease-in-out drop-shadow-lg pb-10 pt-5 gap-12 pr-5"
    data-open="false"
    >

    <button id="burger" class="flex items-center self-end pl-5 w-fit">
        <box-icon type="regular" name='menu' size="sm"></box-icon>
    </button>

    <div id="links-container" class="flex flex-col gap-10 whitespace-nowrap h-full overflow-hidden">

        <a href="#" class="flex flex-col items-center gap-5 pl-5 relative" id="logo-container">
            <img class="object-fit w-full max-w-[5rem] aspect-square" id="logo"
                src="{{ asset('assets/logos/municipality_of_pila.png') ?? asset('assets/no-image.webp') }}"
                alt="">
            <p id="barangay-label" class="opacity-0 hidden transition-opacity duration-100 max-w-[10rem] break-words whitespace-normal">ABC Officer</p>
        </a>

        <div class="flex flex-col gap-5 h-full">
            <a href="{{ url('/admin/dashboard') }}"
                class="pl-5 flex items-center gap-5 transition-all duration-300 {{ request()->is('admin/dashboard*') ? 'text-project-yellow-default' : 'hover:text-project-yellow-default' }}">
                <box-icon type="{{ request()->is('admin/dashboard*') ? 'solid' : 'regular' }}"
                    color="{{ request()->is('admin/dashboard*') ? '#FBAD26' : 'white' }}" name='home'
                    size="1.5em"></box-icon>
                <p class="text-sm font-normal">Dashboard</p>
            </a>

            <a href="{{ url('/admin/records') }}"
                class="pl-5 flex items-center gap-5 transition-all duration-300 {{ request()->is('admin/records*') ? 'text-project-yellow-default' : 'hover:text-project-yellow-default' }}">
                <box-icon type="{{ request()->is('admin/records*') ? 'solid' : 'regular' }}"
                    color="{{ request()->is('admin/records*') ? '#FBAD26' : 'white' }}" name='folder'
                    size="1.5em"></box-icon>
                <p class="text-sm font-normal">Blotter Records</p>
            </a>

            <a href="{{ url('/admin/kp-forms') }}"
                class="pl-5 flex items-center gap-5 transition-all duration-300 {{ request()->is('admin/kp-forms*') ? 'text-project-yellow-default' : 'hover:text-project-yellow-default' }}">
                <box-icon type="{{ request()->is('admin/kp-forms*') ? 'solid' : 'regular' }}"
                    color="{{ request()->is('admin/kp-forms*') ? '#FBAD26' : 'white' }}" name='file'
                    size="1.5em"></box-icon>
                <p class="text-sm font-normal">KP Forms</p>
            </a>

            <a href="{{ url('/admin/accounts') }}"
                class="pl-5 flex items-center gap-5 transition-all duration-300 {{ request()->is('admin/accounts*') ? 'text-project-yellow-default' : 'hover:text-project-yellow-default' }}">
                <box-icon type="{{ request()->is('admin/accounts*') ? 'solid' : 'regular' }}"
                    color="{{ request()->is('admin/accounts*') ? '#FBAD26' : 'white' }}" name='group'
                    size="1.5em"></box-icon>
                <p class="text-sm font-normal">Accounts</p>
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
