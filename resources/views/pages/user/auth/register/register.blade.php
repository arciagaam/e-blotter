<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Blotter System</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- <div class="grid grid-cols-1 lg:grid-cols-2 w-screen overflow-hidden h-screen !bg-cover !bg-no-repeat bg-project-blue-default" style="background: url({{asset('assets/images/full-bg-plain.png')}})"> --}}
    <form method="POST" action="{{ url('/register') }}" class="grid grid-cols-1 lg:grid-cols-2 w-full" enctype="multipart/form-data">
        @csrf

        <div class="flex px-8 relative">
            {{-- <div
                class="h-fit self-center rounded-lg flex flex-col justify-center items-center lg:col-start-2 gap-5 py-10 px-6"> --}}

            <div class="flex py-8 flex-col gap-10 w-full h-fit sticky inset-0">
                <div>
                    <p class="lg:hidden text-4xl font-bold">E-Blotter</p>
                    <p class="italic lg:text-2xl lg:font-bold lg:not-italic">Barangay Officer Register</p>
                </div>

                <div class="flex flex-col gap-4">
                    <div class="form-input-container">
                        <label for="name">Barangay<span class="form-input-required">*</span></label>
                        <input class="form-input" type="text" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-xs text-red-500 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="opacity-50 italic">Barangay Captain Information</p>
                        <div class="flex flex-row gap-2">
                            <div class="form-input-container flex-1">
                                <label for="captain_first_name">First Name <span class="form-input-required">*</span></label>
                                <input class="form-input" type="text" name="captain_first_name" id="captain_first_name" value="{{ old('captain_first_name') }}">
                                @error('captain_first_name')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-input-container flex-1">
                                <label for="captain_last_name">Last Name <span class="form-input-required">*</span></label>
                                <input class="form-input" type="text" name="captain_last_name" id="captain_last_name" value="{{ old('captain_last_name') }}">
                                @error('captain_last_name')
                                <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <p class="opacity-50 italic">Barangay Secretary Information</p>
                        <div class="flex flex-col gap-2">
                            <div class="flex flex-row gap-2">
                                <div class="form-input-container flex-1">
                                    <label for="first_name">First Name <span class="form-input-required">*</span></label>
                                    <input class="form-input" type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-input-container flex-1">
                                    <label for="last_name">Last Name <span class="form-input-required">*</span></label>
                                    <input class="form-input" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-row gap-2">
                                <div class="form-input-container flex-1">
                                    <label for="password">Password <span class="form-input-required">*</span></label>
                                    <input class="form-input" type="password" name="password" id="password">
                                    @error('password')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-input-container flex-1">
                                    <label for="confirm_password">Confirm Password <span class="form-input-required">*</span></label>
                                    <input class="form-input" type="password" name="confirm_password" id="confirm_password">
                                    @error('confirm_password')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-row gap-2">
                                <div class="form-input-container flex-1">
                                    <label for="username">Userame <span class="form-input-required">*</span></label>
                                    <input class="form-input" type="text" name="username" id="username" value="{{ old('username') }}">
                                    @error('email')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-input-container flex-1">
                                    <label for="email">Email <span class="form-input-required">*</span></label>
                                    <input class="form-input" type="email" name="email" id="email" value="{{ old('email') }}">
                                    @error('email')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-input-container flex-1">
                                    <div class="flex flex-row">
                                        <label for="contact_number" class="flex gap-2 items-center">Contact Number:</label>
                                    </div>

                                    <div class="group flex items-center gap-2 border overflow-clip border-project-gray-default/30 rounded-md text-sm transition-all duration-300 ease-in-out font-normal focus-within:border-project-blue-default bg-white">
                                        <span class="group-focus-within:border-project-blue-default bg-gray-100 py-1 px-2 border-r border-r-project-gray-default/30">+63</span>
                                        <input class="w-full focus-visible:outline-none" type="text" max="10" name="contact_number" id="contact_number" value="{{ old('contact_number') }}">
                                    </div>

                                    @error('contact_number')
                                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-input-container">
                        <label for="username">Username <span class="form-input-required">*</span></label>
                        <input class="form-input" type="text" name="username" id="username"
                            value="{{ old('username') }}">
                    @error('username')
                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div> --}}


                <div class="form-input-container">
                    <label for="logo">Logo<span class="form-input-required">*</span></label>
                    <input type="file" name="logo" id="logo" class="w-fit file:mr-4 file:py-2 file:px-4 file:rounded-full file:text-sm file:font-semibold file:btn-outline file:cursor-pointer">
                    @error('logo')
                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <hr>

            <div class="flex flex-col gap-5">
                <div class="form-input-container">
                    <label for="purok_count">Purok Count<span class="form-input-required">*</span></label>
                    <select class="form-input" name="purok_count" id="purok_count">
                        @for ($i = 0; $i < 15; $i++) <option value="{{ $i + 1 }}">{{ $i + 1 }}</option>
                            @endfor
                    </select>
                    {{-- <input class="form-input" type="text" name="purok_count" id="purok_count"
                            value="{{ old('purok_count') }}"> --}}
                    @error('purok_count')
                    <p class="text-xs text-red-500 italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <p class="font-bold">Purok List</p>
                    <div class="flex flex-col" id="purok_container">
                    </div>
                </div>

            </div>

            <div class="flex w-full flex-col gap-2">
                <a class="underline" href="{{ url('/login') }}">Already registered your Barangay?</a>
            </div>

            <button class="btn-filled">REGISTER</button>
        </div>

        {{-- </div> --}}
        </div>
    </form>
    <div id="template" class="hidden form-input-container">
        <label data-template-type="label">Purok <span data-template-type="count"></span></label>
        <input class="form-input" type="text" name="purok[]" data-template-type="input">
    </div>
</body>

<script>
    window.addEventListener('load', () => {
        const container = document.querySelector("#purok_container");
        const countInput = document.querySelector("#purok_count");
        const base = document.querySelector("#template");
        const contactNumberInputs = document.querySelectorAll("input[name*='contact_number']");

        if (contactNumberInputs.length > 0) {
            contactNumberInputs.forEach((input) => {
                input.addEventListener('input', (e) => {
                    if (e.target.value.length > 10) {
                        e.target.value = e.target.value.substring(0, 10);
                    }
                });
            });
        }

        countInput.addEventListener("input", (e) => {
            const count = parseInt(e.target.value);
            generateFields(count);
        })

        generateFields(1);

        function generateFields(count) {
            if (isNaN(count)) {
                return;
            }

            removeChild(container);
            for (let i = 1; i <= count; i++) {
                const baseClone = base.cloneNode(true);
                baseClone.classList.remove("hidden");

                const elementInput = Object.assign(baseClone.querySelector(
                    "[data-template-type='input']"), {
                    id: `purok_${i}`,
                    name: `purok[${i}]`
                });

                const elementCount = Object.assign(baseClone.querySelector(
                    "[data-template-type='count']"), {
                    textContent: i
                });

                const elementLabel = Object.assign(baseClone.querySelector(
                    "[data-template-type='label']"), {
                    htmlFor: `purok_${i}`
                });

                container.appendChild(baseClone);
            }
        }

        function removeChild(parent) {
            while (parent.lastChild) {
                parent.removeChild(parent.lastChild);
            }
        }
    })
</script>

</html>
