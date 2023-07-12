<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="\css\style_user.css" type="text/css" />
    <script src="https://kit.fontawesome.com/0159fc987f.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row h-100 w-100">
            <div class="col-sm-3 h-100">

            </div>
            <div class="col mt-5">
                <div class="row">
                    <div class="col">
                        <h3>Akun Ku</h3>
                        <p><?= $user['nama']; ?></p>
                        <p><?= $user['username']; ?></p>
                    </div>
                    <div class="col">
                        <h3>Detail</h3>
                        <p><?= $user['no_telp']; ?></p>
                        <p><?= $user['alamat']; ?></p>
                    </div>
                    <div class="align-items-center justify-content-left my-5">
                        <a href="/Home/login" class="btn btn-primary btn-md" tabindex="-1" role="button" aria-disabled="false">Logout</a>
                    </div>
                </div>
                <div class="detailPesanan">
                    <h4>DETAIL PESANAN</h4>
                    <div class="isiPesan border mt-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5><?= $pesan['id_pesan']; ?></h5>
                            </li>
                            <li class="list-group-item">
                                <p><?= $pesan['total']; ?></p>
                                <p><?= $user['alamat']; ?></p>
                                <p><?= $user['no_telp']; ?> </p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Detail Pesanan
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">No Pesanan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bodyModal">
                                                <?php foreach ($daftar as $item) : ?>
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
                                                <div class="row border">
                                                    <div class="col-sm-5">
                                                        <img src="/img/laptop.jpg" alt="" style="width: 80px;">
                                                    </div>
                                                    <div class="col my-2">
                                                        <h5> <a href="">Laptop TUF</a></h4>
                                                            <p>Rp. 12.000.000</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>