<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="asset-login/style.css" />
  <title>Login SPP</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="proses-login-siswa.php" method="post" class="sign-in-form">
          <h2 class="title">LOGIN SISWA</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="number" name="nisn" required placeholder="NISN" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="number" name="nis" placeholder="NIS" />
          </div>
          <input type="submit" value="Login" class="btn solid" />
        </form>
        <form action="proses_login_petugas.php" method="post" class="sign-up-form">
          <h2 class="title">LOGIN PETUGAS/ADMIN</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="username" required placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="password" name="password" placeholder="Password" />
          </div>

          <input type="submit" class="btn" value="LOGIN" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Login Untuk Guru / Petugas</h3>
          <p>
            Jika Anda seorang guru ataupun petugas SPP, silahkan klik login di sini.
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Klik di Sini
          </button>
        </div>
        <img src="asset-login/img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Seorang Siswa?</h3>
          <p>
            Klik di sini untuk login sebagai siswa
          </p>
          <button class="btn transparent" id="sign-in-btn">
            KLIK DI SINI
          </button>
        </div>
        <img src="asset-login/img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="asset-login/app.js"></script>
</body>

</html>