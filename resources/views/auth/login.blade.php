<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TRIDAYAMAS APP | </title>

    <!-- Bootstrap -->
    <link href="../vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendor/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
              <h1>Login Form</h1>
              <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror  
            </div>
              <div>
                <button class="btn btn-clear" type="submit">Log In</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> TRIDAYAMAS APP!</h1>
                  <p>©2022 All Rights Reserved. TRISYSTEM! is a Administration APP. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <h1>Create Account</h1>
              <div>
                <input type="text"  class="form-control form-control @error('name') is-invalid @enderror form-control-lg " value="{{ old('name') }}" placeholder="Username" required="" />
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              <div>
                <input type="email"  class="form-control  @error('email') is-invalid @enderror form-control-lg" value="{{ old('email') }}" placeholder="Email" required="" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                     </span>
                  @enderror
              </div>
              <div>
                <input type="password" class="form-control  form-control-lg @error('password') is-invalid @enderror" placeholder="Password" required="" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                     </span>
                @enderror
              </div>
              <div>
                <input type="password" class="form-control form-control-lg" placeholder=" Confirm Password" name="password_confirmation"  required autocomplete="new-password" required="" />
              </div>
              <div>
                <button class="btn btn-clear" type="submit">Submit</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> TRIDAYAMAS APP!!</h1>
                  <p>©2022 All Rights Reserved. TRISYSTEM! is a Administration APP. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        
      </div>
    </div>
  </body>
</html>
