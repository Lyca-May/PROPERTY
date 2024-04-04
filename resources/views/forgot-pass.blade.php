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
              <div class="card-header" style="text-align: center"><h6>FORGET ACCOUNT</h6></div>

              <div class="card-body">
                <form method="POST" action="{{ route('password.reset') }}">
                    @csrf <!-- CSRF protection -->
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1"  placeholder="Enter username" value="{{ old('username') }}">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">New Password
                    </label>
                    <input  type="password" class="form-control" name="new_password" tabindex="2" id="new_password"  placeholder="Enter new password">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">Confirm Password
                    </label>
                    <input  type="password" class="form-control" name="confirm_password" tabindex="2" id="confirm_password"  placeholder="Enter password">
                    @error('confirm_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>

               
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">
                      Change Password
                    </button>
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


  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        // Example of using SweetAlert with a shade of blue
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        @endif

        @if(session('failed'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('failed') }}',
                customClass: {
                    confirmButton: 'btn btn-primary'
                }
            });
        @endif
    </script>

</body>
</html>

