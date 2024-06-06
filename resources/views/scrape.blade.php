@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('Run uploaded File') }}</h4>                   
                </div>
            </div>
            <div class="card-body">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>data.txt</td>
                      <td>
                        <button class="">run</button>
                      </td>
                    </tr>
                    <tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ __('Upload Text File') }}</h4>                   
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