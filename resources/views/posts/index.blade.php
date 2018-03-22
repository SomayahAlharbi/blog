@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">


      <!--<div class="card-header">Post Title</div>

      <div class="card-body">
      Post Content
    </div>
  -->

  @foreach($posts as $key => $data)
  <div class="card">
    <div class="card-header">{{$data->title}} <div style='float:right'>{{$data->user->name}}</div></div>
    <div class="card-body">
      {{$data->body}}

      <br><br>
      Created at: {{$data->created_at}}
      Updated at: {{$data->updated_at}}

    </div>
  </div>
  <br><br>
  @endforeach

</div>
</div>
</div>
@endsection
