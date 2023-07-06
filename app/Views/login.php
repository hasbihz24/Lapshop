<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
  <link rel="stylesheet" href="\css\style.css" />
  <title>LAPSHOP</title>
</head>

<body class="">
  <div class="container">
    <img class="img" src="/img/img.png" />
    <h2 class="text-light-title">LAPSHOP</h2>
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('error'); ?>
      </div>
    <?php endif; ?>
    <form class="form text-light" action="/aksiLogin" method="post">
      <div class="form-login text-light">
        <i class="uil uil-user"></i>
        <label for="username">Username</label><br />
        <input type="text" id="username" name="username" /><br />
      </div>
      <div class="form-login text-light">
        <i class="uil uil-lock"></i>
        <label for="password">Password</label><br />
        <input type="password" id="password" name="password" />
        <!-- <i class="uil uil-eye-slash"></i> -->
      </div>
      <div class="remember"><input type="checkbox" /> Remember me</div>
      <div class="button text-light">
        <button>LOGIN</button>
      </div>
      <div class="reg">
        Belum mempunyai akun ?
        <a href="Login/login.html">Register</a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>