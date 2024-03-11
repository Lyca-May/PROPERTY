<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://www.bfar.da.gov.ph/wp-content/uploads/2023/01/Bfar-Banner-2023.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        body {

            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            width: 550px;
        }
    </style>
</head>

<body>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">Administrator Login</h3>
            <form method="post" action="{{ route('login') }}">
                @csrf <!-- CSRF protection -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value="{{ old('username') }}">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
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
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <div class="text-center mt-3">
                    <a href="{{ url('/forgot-pass') }}">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
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
