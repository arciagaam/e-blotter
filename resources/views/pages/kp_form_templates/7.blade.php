<div class="flex flex-col">
    <form action="{{route('records.kp-forms.post.step-two')}}" method="POST">
        @csrf
        <div class="flex flex-col">
            <label for="complain">I/WE hereby complain against above named respondent/s for violating my/our
                rights and interests in the following manner:
            </label>
            <input type="text" name="complain">
        </div>

        <div class="flex flex-col">
            <label for="relief">THEREFORE, I/WE pray that the following relief/s be granted to me/us in
                accordance with law and/or equity:
            </label>
            <input type="text" name="relief">
        </div>

        <div class="flex flex-row items-center gap-4 p-4">
            <a class="btn-plain" href="{{ url()->previous() }}">Back</a>
            <button class="btn-filled">Submit</button>
        </div>
    </form>
</div>