@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">{{$data->title}} <div style='float:right'>{{$data->user->name}}</div></div>
        <div class="card-body">
          <img width="600" src="{{ asset($data->image) }}" alt="{{$data->title}}">
          <br><br>

          {{$data->body}}

          <br><br>
          Created at: {{$data->created_at->diffForHumans()}}
          Updated at: {{$data->updated_at->diffForHumans()}}

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
