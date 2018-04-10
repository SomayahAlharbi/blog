@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Search the Blog</div>
        <div class="card-body">
          <form method="get" action="{{ route('posts.search') }}" enctype="multipart/form-data">
            <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Search Keyword</label>
            <div class="col-md-6">
              <input type="text" name="keyword" id="keyword" class="form-control{{ $errors->has('keyword') ? ' is-invalid' : '' }}">
              @if ($errors->has('keyword'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('keyword') }}</strong>
              </span>
              @endif
            </div>
          </div>
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      @if (isset($searchResults))
      <br><br>
      <h4>Search Result for "{{$search}}"..</h4>
      @foreach($searchResults as $result)
      <div class="card">
        <div class="card-header"><a href="{{route('posts.show',$result->id)}}">{{$result->title}}</a><div style='float:right'>{{$result->user->name}}</div></div>
        <div class="card-body">
          <img width="200" src="{{$result->image}}" alt="">
          {{$result->body}}

          <br><br>
          Created at: {{$result->created_at}}
          Updated at: {{$result->updated_at}}

        </div>
      </div>
      <br><br>
      @endforeach

      <div class="row justify-content-center">
          {!! $searchResults->appends(['keyword' => $search])->links()
             !!}
        </div>

      @endif
    </div>

  </div>
</div>
@endsection
