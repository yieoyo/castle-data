@extends('layouts.app')
@section('content')
        <!-- User DataTable -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">{{ __('Users List') }}</h4>
                            <!-- Link to return to main users index -->
                            <a class="btn btn-sm btn-dark" href="{{ route('users.index') }}"><span
                                    class="bi bi-arrow-return-left"></span> {{ __('Go back') }}</a>
                       
                </div>
            </div>
            <div class="card-body">
                <!-- Display User DataTable -->
                {{-- {{ $dataTable->table() }} --}}

                <table id="myTable" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('users.show', $item->id) }}" class="btn btn-sm btn-dark" title="{{ __('Show') }}">
                                        <span class="bi bi-eye"></span> <!-- Bootstrap eye icon -->
                                    </a>
                                    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-sm btn-warning" title="{{ __('eEit') }}">
                                        <span class="bi bi-pencil"></span> <!-- Bootstrap pencil icon -->
                                    </a>
                            
                                    <a onclick="event.preventDefault();document.getElementById('delete-form').submit();" href="{{ route('users.destroy', $item->id) }}" class="btn btn-sm btn-danger" title="{{ __('Delete') }}">
                                        <span class="bi bi-trash"></span> <!-- Bootstrap arrow-return-left icon -->
                                    </a>
                                    <form id="delete-form" action="{{ route('users.destroy', $item->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection

@push('scripts')
    <!-- Push DataTable scripts -->
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}

        {{-- @include('components.sweetAlert2') --}}

@endpush
@push('script')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endpush