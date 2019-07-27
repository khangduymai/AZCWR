<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Welcome</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Styles -->
  <style>
    html,
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }
  </style>
</head>

<body>
  <div class="flex-center position-ref full-height">
    <div class="content">
      <div class="card">
        <div class="card-header">
          Good Bye
        </div>

        @php
        $dateTimeIn = new \DateTime();
        $dateTimeIn->setTimestamp($user->time_in); // Convert epoch
        $dateTimeIn->setTimeZone(new \DateTimeZone('MST'));
        $loginTime = $dateTimeIn->format('M d, Y H:i:s');

        $dateTimeOut = new \DateTime();
        $dateTimeOut->setTimestamp($user->time_out);// Convert epoch
        $dateTimeOut->setTimeZone(new \DateTimeZone('MST'));
        $logoutTime = $dateTimeOut->format('M d, Y H:i:s');

        @endphp

        <div class="card-body">
          <h5 class="card-title">Thank you {{ $user->first_name . ' ' . $user->last_name }} for visiting AZCWR</h5>
          <p class="card-text">Login at: {{ $loginTime }}</p>
          <p class="card-text">Logout at: {{ $logoutTime }}</p>
          <a href="/azcwr/guest/time-in" class="btn btn-primary">Done</a>
        </div>
      </div>

    </div>
  </div>
</body>

</html>