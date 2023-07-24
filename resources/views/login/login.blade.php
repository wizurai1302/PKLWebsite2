<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="index.css">
  <title>LOGIN</title>
</head>
<body>
      <div class="col-mb-4">
      @if (session()->has('success'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if (session()->has('LoginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('LoginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

  <section>
    <div class="form-box m-auto">
      <div class="form-value">
        <form action="/login" method="post">
          @csrf
          <h2>Login</h2>
          <div class="inputbox">
            <i class="bi bi-envelope"></i>
            <input type="email" name="email"  @error('email') is-invalid @enderror id="email" autofocus required value="{{ old('email' )}}">
            <label for="">Email</label>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="inputbox">
            <i class="bi bi-lock"></i>
            <input type="password" name="password" class="form-control" id="password" required>
            <label for="">Password</label>
          </div>
          <button type="submit">Login</button>
        </form>
        <div class="register">
             <p>Belum Punya Akun? <a href="/register">Buat Akun Sekarang</a></p>
        </div>
      </div>
    </div>
  </section>
</body>
</html>