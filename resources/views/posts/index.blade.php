@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      @foreach($posts as $key => $data)
      <div class="card">
        <div class="card-header"><a href="{{route('posts.show',$data->id)}}">{{$data->title}}</a><div style='float:right'>{{$data->user->name}}</div></div>
        <div class="card-body">
          <!--<img width="600" src="{{$data->image}}" alt="{{$data->title}}">-->
          {{$data->body}}

          <br><br>
          Created at: {{$data->created_at->diffForHumans()}}
          Updated at: {{$data->updated_at->diffForHumans()}}

        </div>
      </div>
      <br><br>
      @endforeach

    </div>
  </div>
</div>
@endsection
