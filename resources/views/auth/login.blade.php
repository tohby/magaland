
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Magaland | Login</title>

    <link rel="Stylesheet" href="CSS/app.css" />
    <link rel="Stylesheet" href="CSS/floating-labels.css" />

    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <form class="form-signin" method="POST" action="{{ route('login') }}">
      @csrf
  <div class="text-center mb-4">
    <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Magaland</h1>
    <p>Login to access your portal</p>
  </div>

  <div class="form-label-group">
    <input type="email" id="inputEmail" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email address" required autofocus>
    <label for="inputEmail">Email address</label>
    @if ($errors->has('email'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('email') }}</strong>
      </span>
    @endif
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" required>
    <label for="inputPassword">Password</label>
    @if ($errors->has('password'))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('password') }}</strong>
      </span>
    @endif
  </div>

  <div class="row mb-3">
    <div class="col-md-6">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
    </div>
    <div class="col-md-6">
        <div>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a> 
                @endif
        </div>
    </div>
</div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p>
</form>
</body>
</html>
