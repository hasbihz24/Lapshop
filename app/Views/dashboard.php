<!DOCTYPE html>
<html style="height: 100%;">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="/css/dashboard.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Lapshop</title>
</head>

<body style="height: 100%;">
  <nav class="navbar navbar- bg-success">
    <a href="#" class="navbar-brand h3 mx-auto text-white">Selamat Datang di Aplikasi Lapshop</a>
  </nav>
  <div class="mainadmin" style="height: 100%;">
    <div class="bg-success-subtle row" style="height: 100%;">
      <div class="col-md-2 d-flex flex-column flex-shrink-0 p-3 bg-light" style="height: 100%">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <img src="/img/img.png" width="100" height="100" alt="">
          <span class="fs-4">Admin Lapshop</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item mx-2 my-2">
            <i class="fa-solid fa-house"></i>
            <a href="#" class="nav-link link-dark d-inline" aria-current="page">
              Laptop
            </a>
          </li>
          <li class="nav-item mx-2 my-2">
            <i class="fa-solid fa-house"></i>
            <a href="/Admin/transaksi" class="nav-link link-dark d-inline" aria-current="page">
              Transaksi
            </a>
          </li>
        </ul>
        <hr>
      </div>
      <div class="col">
        <div class="container">
          <h1 class="mt-4 mb-4">Admin LapShop</h1>
          <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <?php echo session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>
          <table class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Gambar</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Merek</th>
                  <th scope="col">Jenis</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($laptop as $lp) : ?>
                  <tr>
                    <td><img src="/img/<?= $lp['gambar']; ?>" alt="" style="width: 50px;"></td>
                    <td><?= $lp['nama']; ?></td>
                    <td><?= $lp['merek']; ?></td>
                    <td><?= $lp['jenis']; ?></td>
                    <td><?= $lp['jumlah']; ?></td>
                    <td><?= $lp['harga']; ?></td>
                    <td>
                      <a href="/Edit/<?= $lp['slug']; ?>" class="btn btn-primary">Edit</a>
                      <a href="/Hapus/<?= $lp['slug']; ?>" class="btn btn-danger delete-btn">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </table>
          <a href="/Admin/tambah" class="btn btn-success">Tambah Data</a>
        </div>
      </div>
    </div>
  </div>
  <script>
    var deleteLinks = document.querySelectorAll('.delete-btn');

    deleteLinks.forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault();

        var confirmDelete = confirm('Apakah Anda yakin ingin menghapus data ini?');

        if (confirmDelete) {
          window.location.href = link.href;
        }
      });
    });
  </script>
</body>

</html>