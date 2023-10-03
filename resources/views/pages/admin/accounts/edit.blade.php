<x-layout>
    <div class="form-input-container">
        <label for="first_name">First Name</label>
        <input class="form-input" type="text" name="first_name" id="first_name" value="{{ $account->first_name }}">
        @error('first_name')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-input-container">
        <label for="last_name">Last Name</label>
        <input class="form-input" type="text" name="last_name" id="last_name" value="{{ $account->last_name }}">
        @error('last_name')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-input-container">
        <label for="username">Username</label>
        <input class="form-input" type="text" name="username" id="username" value="{{ $account->username }}">
        @error('username')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-input-container">
        <label for="barangay_id">Barangay</label>
        <input class="form-input" type="text" name="barangay_id" id="barangay_id"
            value="{{ $account->barangays[0]->name }}">
        @error('barangay_id')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-input-container">
        <label for="contact_number">Contact Number</label>
        <input class="form-input" type="text" name="contact_number" id="contact_number"
            value="{{ $account->contact_number }}">
        @error('contact_number')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-input-container">
        <label for="email">Email</label>
        <input class="form-input" type="text" name="email" id="email" value="{{ $account->email }}">
        @error('email')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-input-container">
        <label for="logo">Logo<span class="form-input-required">*</span></label>
        <input type="file" name="logo" id="logo"
            class="w-fit file:mr-4 file:py-2 file:px-4 file:rounded-full file:text-sm file:font-semibold file:btn-outline file:cursor-pointer">
        @error('logo')
            <p class="text-xs text-red-500 italic">{{ $message }}</p>
        @enderror
    </div>
</x-layout>
