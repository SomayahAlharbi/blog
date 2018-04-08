@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1>Categories</h1>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add New Category</div>

        <div class="card-body">
          <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">Category Name</label>
              <div class="col-md-6">
                <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">

                @if ($errors->has('name'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif

              </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
