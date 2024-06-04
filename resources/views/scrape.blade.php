@extends('layouts.app')

@section('content')
    <h2>Upload Text File</h2>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">{{ __('') }}</h4>                   
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('scrape.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Choose Text File</label>
                    <input type="file" class="form-control" id="file" name="file" accept=".txt" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
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