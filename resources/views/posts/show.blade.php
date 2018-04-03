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

          <br><br>
          <h1>Leave Comment</h1>
          {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}
          <input type="hidden" name="post_id" value="{{$data->id}}">
          <textarea rows="2" cols="80" name="comment_body"></textarea>
          <div class="form-group row mb-0">
            <div class="col-md-8">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          {!! Form::close() !!}
          <br><br>

          @if (count($comments) > 0)
          <h3>Comments</h3>

          @foreach ($comments as $comment)
          <div>{{$comment->author}}: {{$comment->created_at->diffForHumans()}}</div>

          {{$comment->body}}

          @if (count($comment->replies) > 0)

          @foreach ($comment->replies as $reply)
          <div style="margin-left:20px;">{{$reply->author}}: {{$reply->created_at->diffForHumans()}}
            <br>
          {{$reply->body}}
          </div>

          @endforeach
          @endif


          {!! Form::open(['method'=>'POST','action'=>'CommentsRepliesController@store']) !!}

          <div class="form-group row mb-0">
            <div class="col-md-8">
              <input type="hidden" name="comment_id" value="{{$comment->id}}">
              <textarea rows="1" cols="70" name="comment_body"></textarea>
              <button type="submit" class="btn btn-primary">Reply</button>
            </div>
          </div>
          {!! Form::close() !!}
          <br>

          @endforeach

          @else   <h1>No Comments</h1>
          @endif

          <!--@if (Session::has('comment message'))
          <p style="color:#007bff">{{Session('comment message')}}</p>
          @endif-->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
