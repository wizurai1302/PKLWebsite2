<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="register.css">
  <title>Register</title>
</head>
<body>
  <section>
    <div class="responsive">
    <div class="form-box">
      <div class="form-value">
        <form action="/register" method="post">
          @csrf
          <h2>Register</h2>
          <div class="inputbox">
            <i class="bi bi-person"></i>
            <input type="text" name="name"  @error('name') is-invalid @enderror" id="name" autofocus required value="{{ old('name' )}}">
            <label for="">Nama</label>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="inputbox">
            <i class="bi bi-file-person"></i>
            <input type="text" name="username"  @error('username') is-invalid @enderror" id="username" autofocus required value="{{ old('username' )}}">
            <label for="">Username</label>
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="inputbox">
            <i class="bi bi-envelope"></i>
            <input type="email" name="email"  @error('email') is-invalid @enderror" id="email" autofocus required value="{{ old('email' )}}">
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
          <button type="submit">Buat akun</button>
        </form>
        <div class="register">
             <p>Sudah punya akun... <a href="/login">Login disini</a></p>
        </div>
      </div>
    </div>
  </div>
  </section>
</body>
</html>