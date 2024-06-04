@extends('layouts.app')

@section('content')    
<div class="card">
    <div class="card-body">
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company</th>
                    <th scope="col">Fiscal</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $activity)
                    <tr> 
                        <td>{{ $activity->id }}</td>
                        <td>{{ $activity->company->razon_social }}</td>
                        <td>{{ $activity->actividad->description }}</td>
                        <td>{{ $activity->prioridad }}</td>
                        <td>{{ $activity->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('script')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endpush