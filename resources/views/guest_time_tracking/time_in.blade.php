@extends('guest_timetracking_layouts.base')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Time In') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('time-in') }}">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <div class="form-group row">
              <label for="first-name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

              <div class="col-md-6">
                <input id="first-name" type="text" class="form-control @error('first-name') is-invalid @enderror" name="first-name" value="{{ old('first-name') }}" autocomplete="first-name">

                @error('first-name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="last-name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

              <div class="col-md-6">
                <input id="last-name" type="text" class="form-control @error('last-name') is-invalid @enderror" name="last-name" value="{{ old('last-name') }}" autocomplete="last-name">

                @error('last-name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Time In') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection