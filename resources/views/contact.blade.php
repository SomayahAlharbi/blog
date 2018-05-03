@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Contact Ms</div>
          <div class="card-body">
            <form method="post" action="{{ route('contact.store') }}">
              {{ csrf_field() }}
              <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">Name</label>
              <div class="col-md-6">
                <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
                @if ($errors->has('name'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Email</label>
            <div class="col-md-6">
              <input type="text" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
              @if ($errors->has('email'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Message</label>
            <div class="col-md-6">
            <textarea rows="5" cols="50" name="emailBody" id="emailBody" class="form-control{{ $errors->has('emailBody') ? ' is-invalid' : '' }}"></textarea>

            @if ($errors->has('emailBody'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('emailBody') }}</strong>
            </span>
            @endif

          </div>
        </div>
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
