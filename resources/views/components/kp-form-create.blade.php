<div class="flex flex-col">
    <form action="{{ route('records.kp-forms.post.step-two') }}" method="POST">
        @csrf

        {{ $slot }}

        <div class="flex flex-row items-center gap-4 p-4">
            <a class="btn-plain" href="{{ url()->previous() }}">Back</a>
            <button class="btn-filled">Submit</button>
        </div>
    </form>
</div>
