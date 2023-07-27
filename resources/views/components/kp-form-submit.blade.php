<div class="flex flex-col">
    <form action="{{ session()->has('editing_kp_form') ? route('records.kp-forms.update', ['recordId' => session('edit.record_id'), 'issuedKpFormId' => session('edit.issued_kp_form_id')]) : route('records.kp-forms.post.step-two') }}" method="POST">
        @csrf
        @if (session()->has('editing_kp_form'))
            @method('PUT')
        @endif

        {{ $slot }}

        <div class="flex flex-row items-center gap-4 p-4">
            @if (session()->has('editing_kp_form'))
                <a class="btn-plain" href="{{ route('records.kp-forms.index', ['record' => session('edit.record_id')]) }}">Back</a>
            @else
                <a class="btn-plain" href="{{ session()->has('issued_kp_form') ? route('records.kp-forms.get.step-one', ['id' => session('issued_kp_form')->record_id]) : url()->previous() }}">Back</a>
            @endif
            <button class="btn-filled">Submit</button>
        </div>
    </form>
</div>
