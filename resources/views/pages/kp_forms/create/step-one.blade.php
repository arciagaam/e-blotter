<x-layout>
    <form action="{{route('records.kp-forms.post.step-one')}}" method="POST">
        @csrf
        <select name="kp_form_id" id="kp_form_id">
            @foreach ($kpForms as $kpForm)
                <option value="{{$kpForm->id}}">KP FORM #{{$kpForm->number}}: {{$kpForm->name}}</option>
            @endforeach
        </select>

        <input type="hidden" name="record_id" value="{{$recordId}}">

        <button>Next</button>
    </form>
</x-layout>