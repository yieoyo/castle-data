@extends('layouts.app')

@push('script')
<style>
.direction {
    white-space: nowrap;
}
select.acstatus.form-control {
    width: 100px;
    text-align: center;
}
</style>
@endpush
@section('content')    
<div class="card">
    <div class="card-body table-responsive">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Cuit</th>
                    {{-- <th scope="col">Actividad</th> --}}
                    <th scope="col">Company</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Localidad</th>
                    <th scope="col">Actividad Description</th>
                    <th scope="col">Priority</th>
                    <th scope="col-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $activity)
                    <tr> 
                        <td>{{ $activity->company->cuit }}</td>
                        {{-- <td>{{ $activity->actividad->fiscal_id }}</td> --}}
                        <td>{{ $activity->company->razon_social }}</td>
                        <td class="direction">{{ $activity->company->direccion }}</td>
                        <td>{{ $activity->company->provincia }}</td>
                        <td>{{ $activity->company->localidad }}</td>
                        <td>{{ $activity->actividad->description }}</td>
                        <td>{{ $activity->prioridad }}</td>
                        @if(auth()->user()->role == 'admin')
                        <td>
                            <select class="acstatus form-control" data-activityid="{{ $activity->id }}">
                                <option value="Active" {{ $activity->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ $activity->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="Processing" {{ $activity->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                            </select>
                        </td>
                        @else
                        <td>{{ $activity->status }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form id="statusform" method="POST" class="d-none">
            @csrf
            <input type="hidden" name="status" id="acst" />
        </form>
    </div>
</div>
@endsection
@push('script')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
        $(document).on('change','.acstatus',function() {
            $('#acst').val($(this).val());
            $('#acvtid').val($(this).attr('data-activityid'));
            var formActionUrl = 'updatestatus/' + $(this).attr('data-activityid'); // Laravel blade syntax for route
            $('#statusform').attr('action', formActionUrl);
            document.getElementById('statusform').submit();
        });
    </script>
@endpush