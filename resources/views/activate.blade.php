<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>MyMathKings</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <style>
  html, body {
    background-color: #fff;

    color: white;
    font-family: 'Raleway', sans-serif;
    font-weight: 100;
    height: 100vh;
    margin: 0;
    background-image: url({{asset('home/img/about-bg.jpg')}});
    background-repeat: no-repeat;
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

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .content {
    text-align: center;
  }

  .title {
    font-size: 84px;
  }

  .links > a {
    color: white;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }

  .m-b-md {
    margin-bottom: 30px;
  }
  #name{
    color: green;
  }
  </style>
</head>
<body>
  <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
      <div class="top-right links">
      </div>
    @endif
    @include('errors')
    <div class="content">
      <div class="title m-b-md">
        Thanks <span id="name"></span> for signing up.
      </div>
      <div class="m-b-d">
        Check your email for the activation link we sent.
      </div>
      <br /><br />
      <div class="m-b-md">
        <p>
          If you do not receive the confirmation email in 10 minutes, Resend the confirm email code.
        </p>
        <form id="form_id" class="" action="index.html" method="post">

          <a class="btn btn-primary" href="#">Resend Email Confirmation</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
