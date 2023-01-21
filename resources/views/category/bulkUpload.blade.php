@extends('layout.app');

@section('subtitle')
Bulk Upload
@endsection

@section('content')

<div class="card-body">
    <form method="post" action="{{ route('category.bulkUploadAttempt') }}" enctype="multipart/form-data">
        {{-- Csrf used for tokens --}}
        @csrf
        <div class="row">
            <div class="col-12 form-group">
                <label class="custom-file-label"> File </label>
                <input type="file" name="csvFile" class="custom-file-input" id="exampleInputFile" value="{{ old('csvFile') }}"/>
            </div>

            <div class="col-4 form-group">
                <input type="submit" value="Upload Data" class="btn btn-success"/>
            </div>
        </div>
    </form>
</div>
@endsection

@section('open-main')
nav-item menu-open
@endsection

@section('open-bulk')
nav-link active
@endsection


