<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <!-- ===================== META VIEWPORT ===================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - UniPortal</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="login-wrapper">

  <div class="login-card">
    <!-- ===================== LOGO ===================== -->
    <div class="logo">
      <h1>UniPortal</h1>
      <p>Personal Study Planner</p>
    </div>

    <!-- ===================== JUDUL LOGIN ===================== -->
    <h2>Masuk ke Akun</h2>
    <p class="subtitle">Silakan login untuk melanjutkan</p>

    <form id="loginForm">

      <!-- ===================== FORM INPUT ===================== -->
      <div class="form-group">
        <label>NIM atau Email</label>
        <!-- ===================== VALIDASI ERROR ===================== -->
        <small id="nimError" class="error-message"></small>
        <input type="text" id="nim" placeholder="Masukkan NIM atau Email">
      </div>

      <div class="form-group">
        <label>Password</label>
        <small id="passwordError" class="error-message"></small>
        <input type="password" id="password" placeholder="Masukkan Password">
      </div>

      <!-- ===================== TOMBOL LOGIN ===================== -->
      <button type="submit">Login</button>

    </form>
  </div>

</div>

<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>