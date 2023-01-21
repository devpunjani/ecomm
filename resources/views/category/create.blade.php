@extends('layout.app')

@section('subtitle')
Add Category
@endsection

@section('open-main')
nav-item menu-open
@endsection

@section('open-create')
nav-link active
@endsection

@section('content')
<form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row" >
        <div class="col-12 form-group" align="center">
            <label class="form-label"> Name </label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" style="width:500px;"/>
        </div>
        <div class="col-12 form-group" align="center">
            <label class="form-label"> Description </label>
            <textarea typr="text" name="description" rows="4" style="width:500px;" class="form-control">
                {{ old('description') }}
            </textarea>
        </div>
        <div class="col-12 form-group" align="center">
            <label for="exampleInputFile">Image</label>
            <div class="input-group" style="width: 500px;">
              <div class="custom-file">
                <input type="file" name="imagePath" class="custom-file-input" value="{{ old('imagePath') }}" id="exampleInputFile"/>
                <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
              </div>
            </div>
        </div>

        <br>&nbsp;
        <div class="col-12 form-group" align="center">
            <input type="submit" value="Add" class="btn btn-success" style="font-size: 20px;width:100px;border-radius:30px;"/>
        </div>

</form>
@endsection

