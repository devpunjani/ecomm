@extends('layout.app')

@section('subtitle')
Edit Category
@endsection

@section('open-main')
nav-item menu-open
@endsection

@section('open-edit')
nav-link active
@endsection

@section('content')
<form method="post" action="{{ route('category.update') }}">
    @csrf
    <input type="hidden" name="categoryId" value="{{ $category->categoryId }}"/>
    <div class="row" >
        <div class="col-12 form-group" align="center">
            <label class="form-label"> Name </label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" style="width:500px;"/>
        </div>
        <div class="col-12 form-group" align="center">
            <label class="form-label"> Description </label>
            <textarea typr="text" name="description" rows="4" style="width:500px;" class="form-control">
                {{ $category->description }}
            </textarea>
        </div>
        <div class="col-12 form-group" align="center">
            <label for="exampleInputFile">Image</label>
            <div class="input-group" style="width: 500px;">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile"/>
                <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
              </div>
            </div>
        </div>
        <br>&nbsp;
        <div class="col-12 form-group" align="center">
            <input type="submit" value="Update" class="btn btn-success" style="font-size: 20px;width:100px;border-radius:30px;"/>
        </div>

</form>
@endsection

