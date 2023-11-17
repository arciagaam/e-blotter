<x-layout>
    <x-page-header>Audit Trail</x-page-header>


    <div class="flex flex-col gap-3">
        
        <table id="main-table" class="main-table w-full">
            <thead>
                <tr>
                    {{-- <th>Role</th> --}}
                    <th>Action</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @empty($auditTrails)
                    <tr>
                        <td colspan="100%" class="text-center">There are no data.</td>
                    </tr>
                @else
                    @foreach ($auditTrails as $auditTrail)
                        <tr>
                            {{-- <td>{{$auditTrail->loginroles->name}}</td> --}}
                            <td>{{$auditTrail->action}}</td>
                            <td>{{$auditTrail->created_at}}</td>
                        </tr>
                    @endforeach
                @endempty
            </tbody>
        </table>
    </div>

</x-layout>
