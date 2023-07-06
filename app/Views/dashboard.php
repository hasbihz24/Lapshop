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
    <div class="bg-success-subtle" style="height: 100%;">
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: 100%">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <img src="/img/img.png" width="100" height="100" alt="">
          <span class="fs-4">Admin Lapshop</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item mx-2 my-2 active p-1">
            <i class="fa-solid fa-house"></i>
            <a href="#" class="nav-link link-dark d-inline" aria-current="page">
              Dashboard
            </a>
          </li>
          <li class="nav-item mx-2 my-2">
            <i class="fa-solid fa-house"></i>
            <a href="#" class="nav-link link-dark d-inline" aria-current="page">
              Laptop
            </a>
          </li>
          <li class="nav-item mx-2 my-2">
            <i class="fa-solid fa-house"></i>
            <a href="#" class="nav-link link-dark d-inline" aria-current="page">
              Transaksi
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
          </a>
          <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>


    </div>
  </div>
</body>

</html>