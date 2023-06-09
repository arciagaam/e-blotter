<x-layout>

    <x-page-header>Issue KP Form</x-page-header>

    <form class="w-full h-full flex flex-col justify-center items-center"
        action="{{ route('records.kp-forms.post.step-one') }}" method="POST">
        @csrf
        <select class="form-input" name="kp_form_id" id="kp_form_id">
            @foreach ($kpForms as $kpForm)
                <option value="{{ $kpForm->id }}">KP FORM #{{ $kpForm->number }}: {{ $kpForm->name }}</option>
            @endforeach
        </select>

        <input type="hidden" name="record_id" value="{{ $recordId }}">

        <div class="flex flex-row justify-center items-center gap-4 p-4">
            <a class="btn-plain" href="{{ route('records.show', ['record' => $recordId]) }}">Cancel</a>
            <button class="btn-filled">Next</button>
        </div>
    </form>
</x-layout>
