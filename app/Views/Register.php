<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="\css\style.css" />
  <title>LAPSHOP</title>
</head>

<body class="">
  <div class="container container-Register bg-success">
    <img class="img" src="\img\img.png">
    <h2 class="text-light-title"><a href="/">LAPSHOP</a></h2>
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('error'); ?>
      </div>
    <?php endif; ?>
    <form class="row g-3 text-light" action="/Home/register" method="post">
      <div class="col-md-6">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username">
      </div>
      <div class="col-md-6">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="col-12">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" placeholder="Johhny Elton" name="nama">
      </div>
      <div class="col-12">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" placeholder="Apartment, studio, or floor" name="alamat">
      </div>
      <div class="col-md-12">
        <label for="no_telp" class="form-label">No.Telp</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp">
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-light">Register</button>
      </div>
      <div class="reg" method="POST">
        Sudah mempunyai akun ?
        <a href="\Home\login">Kembali</a>
      </div>
    </form>
  </div>
</body>

</html>