<x-layout>

    @if (count($message))
        <div class="flex flex-row gap-2 w-full h-fit border border-project-yellow-default bg-yellow-50 fill-project-yellow-default text-project-yellow-default p-4 rounded-md">
            <box-icon name='error'></box-icon>
            <p class="font-bold">{{ $message['title'] }}</p>
            <p>{{ $message['description'] }}</p>
        </div>
    @endif

    @include("pages.kp_form_templates.$issuedForm->kp_form_id")
</x-layout>