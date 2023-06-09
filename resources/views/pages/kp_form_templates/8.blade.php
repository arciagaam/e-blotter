<div class="flex flex-col">
    <form action="{{route('records.kp-forms.post.step-two')}}" method="POST">
        @csrf
        <div class="flex flex-col">
            <label for="appear">You are hereby required to appear before me on</label>
            <input type="datetime-local" name="hearing">
            <label for="appear">for the hearing of your complaint.</label>
        </div>
        <button>Submit</button>
    </form>
</div>