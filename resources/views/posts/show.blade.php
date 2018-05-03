@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card">
        <div class="card-header">{{$data->title}} <div style='float:right'>{{$data->user->name}}</div></div>
        <div class="card-body">
          @if (File::exists($data->image))
          <img width="600" src="{{ asset($data->image) }}" alt="{{$data->title}}">
          <br><br>
          @endif

          {{$data->body}}

          <br><br>
          Created at: {{$data->created_at->diffForHumans()}}
          Updated at: {{$data->updated_at->diffForHumans()}}

          <br><br>
          <h2>Leave Comment</h2>
          <form method="post" action="{{ route('comments.store') }}">
            {{ csrf_field() }}
            <!--{!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store']) !!}-->
            <div class="form-group row mb-0">
              <div class="col-md-8">
                <input type="hidden" name="post_id" value="{{$data->id}}">
                <textarea rows="2" cols="80" name="comment" id="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}"></textarea>

                @if ($errors->has('comment'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('comment') }}</strong>
                </span>
                @endif

              </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
            <!--{!! Form::close() !!}-->
          </form>
          <br><br>

          @if (count($comments) > 0)
          <h3>Comments</h3>

          @foreach ($comments as $comment)
          <div>{{$comment->author}}: {{$comment->created_at->diffForHumans()}}</div>

          {{$comment->body}}

          @if (count($comment->replies) > 0)
          <div style="margin-left:20px;">
            @foreach ($comment->replies as $reply)
            <div>{{$reply->author}}: {{$reply->created_at->diffForHumans()}}</div>
            {{$reply->body}}


            @endforeach
            @endif

            <!--{!! Form::open(['method'=>'POST','action'=>'CommentsRepliesController@store']) !!}-->
            <form method="post" action="{{ route('replies.store') }}">
              {{ csrf_field() }}
              <div class="form-group row mb-0">
                <div class="col-md-8">
                  <input type="hidden" name="comment_id" value="{{$comment->id}}">
                  <textarea rows="1" cols="70" name="reply" id="reply" class="form-control{{ $errors->has('reply') ? ' is-invalid' : '' }}"></textarea>

                  @if ($errors->has('reply'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('reply') }}</strong>
                  </span>
                  @endif

                </div>
                <button type="submit" class="btn btn-primary">Reply</button>
              </div>
              <!--{!! Form::close() !!}-->
            </form>
            <br>
          @endforeach
</div>
          @else   <h3>No Comments</h3>
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
