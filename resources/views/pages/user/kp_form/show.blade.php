<x-layout>
    <x-page-header>KP Form # {{$id}}</x-page-header>

    <div class="flex lg:justify-center lg:items-center">
        <div class="flex flex-col gap-4">
            <div class="bg-white w-fit p-8 border border-slate-400 rounded-md min-w-fit">
                @include("kp_forms.preview.$id")
            </div>
            <button class="btn-outline w-fit h-fit self-start lg:self-end" id="print">Print</button>
        </div>
    </div>
</x-layout>

<script>
    window.addEventListener('load', () => {
        const printBtn = document.querySelector('#print');
        
        printBtn.addEventListener('click', () => {
            window.print();
        });
    });
</script>