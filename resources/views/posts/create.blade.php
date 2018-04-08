@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add New Post</div>

        <div class="card-body">

          <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!--{!! Form::open(['method'=>'POST','action'=>'PostsController@store', 'files' => true]) !!}-->
            <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Post Title</label>
            <div class="col-md-6">
              <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">

              @if ($errors->has('title'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('title') }}</strong>
              </span>
              @endif

            </div>
          </div>

          <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Post Category</label>
            <div class="col-md-6">
              <select name="category" id="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}">
                <option value=""></option>

                // list of all current categories
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

              </select>
            @if ($errors->has('category'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('category') }}</strong>
            </span>
            @endif

          </div>
        </div>

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">Post Content</label>
              <div class="col-md-6">
              <textarea rows="5" cols="50" name="body" id="body" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}"></textarea>

              @if ($errors->has('body'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('body') }}</strong>
              </span>
              @endif

            </div>
          </div>
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">Post image</label>
              <div class="col-md-6">
              <input type="file" name="image">
            </div>
            </div>
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            <!--{!! Form::close() !!}-->
          </form>

          <!-- Errors Disply
          @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>

          @endif
        -->

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
