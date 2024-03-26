<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title> Login | Property and Supplies System </title>

  <link rel="stylesheet" href="{{ asset ('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('assets/modules/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset ('assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

  <link rel="stylesheet" href="{{ asset ('assets/css/demo.css') }}">
  <link rel="stylesheet" href="{{ asset ('assets/css/style.css') }}">

   <style>
        body {
            background-image: url('/assets/img/bg_bfar.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

    </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 ">
            <div class="card card-primary">
                <div class="login-brand">
                    <img style="width:100px; height:70px" alt="image" src="{{ asset('assets/img/BFAR_LOGO.png') }}">
                </div>
              <div class="card-header" style="text-align: center"><h6>LOGIN TO YOUR ACCOUNT</h6></div>

              <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf <!-- CSRF protection -->
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1"  placeholder="Enter username" value="{{ old('username') }}">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">Password

                    </label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" id="password" name="password" placeholder="Enter password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role">
                        <option value="PROPERTY">PROPERTY DIVISION</option>
                        <option value="ACCOUNTING">ACCOUNTING DIVISION</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  <div style="text-align: center">
                    <a href="{{ url('/forgot-pass') }}">
                      Forgot Password?
                    </a>
                  </div>
                </form>
              </div>
            </div>

            <div class="simple-footer" style="color: rgb(60, 11, 96)">
            <b>  Copyright &copy; Property Unit System 2024 </b>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="{{ asset ('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset ('assets/modules/popper.js') }}"></script>
  <script src="{{ asset ('assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset ('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset ('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset ('assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset ('assets/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
  <script src="{{ asset ('assets/js/sa-functions.js') }}"></script>

  <script src="{{ asset ('assets/js/scripts.js') }}"></script>
  <script src="{{ asset ('assets/js/custom.js') }}"></script>
  {{-- <script src="{{ asset ('assets/js/demo.js') }}"></script> --}}
</body>
</html>
