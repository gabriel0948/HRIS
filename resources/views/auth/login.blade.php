<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow mt-5">
          <div class="bg-secondary pb-1"></div>
          <div class="card-header">
            <h4 class="text-center">Login</h4>
          </div>

          <div class="card-body">
            <form action="{{ route('login-user') }}" method="post">
              @csrf
              <div class="row justify-content-center">
                <div class="col-md-8">
                  @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                  @endif
                  @if (session()->has('fail'))
                    <div class="alert alert-danger">{{ session()->get('fail') }}</div>
                  @endif

                  <span class="text-danger">
                    @error('username')
                      {{ $message }}
                    @enderror
                  </span>
                  <div class="input-group mb-3">
                    <div class="input-group-text">Username</div>
                    <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                  </div>

                  <span class="text-danger">
                    @error('password')
                      {{ $message }}
                    @enderror
                  </span>
                  <div class="input-group mb-3">
                    <div class="input-group-text">Password</div>
                    <input type="password" class="form-control" name="password" value="">
                  </div>
                </div>
              </div>

              <div class="form-group text-center">
                <button class="btn btn-primary col-md-3" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
