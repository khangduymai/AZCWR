@extends('layouts.admin_layout')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <h1 class="display-3" style="color:blue; margin-bottom:50px">Check out</h1>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Login at</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @foreach($users as $index => $user)

              @php
              $dateTime = new \DateTime();
              $dateTime->setTimestamp($user->time_in); // Convert epoch
              $dateTime->setTimeZone(new \DateTimeZone('MST'));
              $loginTime = $dateTime->format('M d, Y H:i:s');
              @endphp

              <tr>
                <th scope="row">{{ $index +1 }}</th>
                <td>{{ $user->first_name}}</td>
                <td>{{ $user->last_name}}</td>
                <td>{{ $loginTime }}</td>
                <td>
                  <form method="POST" action="/azcwr/guest/time-out/{{ $user->id }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                      Time Out
                    </button>
                  </form>
                </td>
              </tr>

              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection