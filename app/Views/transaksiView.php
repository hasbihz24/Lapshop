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
                        <a href="/Admin/index" class="nav-link link-dark d-inline" aria-current="page">
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
            </div>
            <div class="col">
                <div class="container">
                    <h1 class="mt-4 mb-4">Admin LapShop</h1>
                    <table class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID Pesan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">No Pembayaran</th>
                                    <th scope="col">Pembeli </th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesan as $p) : ?>
                                    <tr>
                                        <?php $JsonDecode = json_decode($p['daftar_laptop'], true);
                                        ?>
                                        <td><?= $p['id_pesan']; ?></td>
                                        <td><?= $p['tgl_beli']; ?></td>
                                        <td><?= $p['total']; ?></td>
                                        <td><?= $p['no_pembayaran']; ?></td>
                                        <td><?= $p['username']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $p['username']; ?>">
                                                Detail
                                            </button>
                                            <a href="/Kirim/<?= $p['username']; ?>" class="btn btn-success delete-btn">Kirim</a>
                                        </td>
                                        <div class="modal fade" id="<?= $p['username']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $p['id_pesan']; ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body bodyModal">
                                                        <?php foreach ($JsonDecode as $item) : ?>
                                                            <?php foreach ($item as $ker) : ?>
                                                                <?php $hargaFormat = number_format($ker['harga'], 0, ',', '.'); ?>
                                                                <div class="row border my-4">
                                                                    <div class="col-sm-5">
                                                                        <img src="/img/<?= $ker['gambar']; ?>" alt="" style="width: 80px;">
                                                                    </div>
                                                                    <div class="col my-2">
                                                                        <h5> <a href="/<?= $ker['slug']; ?>"><?= $ker['nama']; ?></a></h4>
                                                                            <p><?= $hargaFormat; ?></p>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>