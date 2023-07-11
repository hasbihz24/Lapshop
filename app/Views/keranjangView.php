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
        <form action="/Pesan/index" method="post">
            <div class="row mt-5">
                <div class="col mt-2">
                    <h1 class="mb-5">Keranjang <?= session()->get('username'); ?></h1>
                    <?php $i = 0;
                    $harga = array();
                    ?>
                    <?php foreach ($keranjang as $item) : ?>
                        <?php foreach ($item as $ker) : ?>
                            <?php $hargaFormat = number_format($ker['harga'], 0, ',', '.'); ?>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="<?= $ker['slug']; ?>" id="item-<?= $i; ?>" name="laptop-<?= $i; ?>">
                                <label class="form-check-label border w-100" for="item-<?= $i; ?>">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <img src="/img/<?= $ker['gambar']; ?>" alt="" style="width: 80px;">
                                        </div>
                                        <div class="col">
                                            <h5><?= $ker['nama']; ?></h4>
                                                <p>Rp. <?= $hargaFormat; ?></p>
                                                <?php $harga[$i] = $ker['harga'] ?>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
                <div class="col-sm-5 my-5 py-5 ms-5">
                    <div class="card my-5 hargaCard" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5>Harga : </h5>
                                <?php $hargatotal = 0 ?>
                                <?php foreach ($harga as $harganya) : ?>
                                    <?php $hargaFormat = number_format($harganya, 0, ',', '.'); ?>
                                    <p><?= $hargaFormat; ?></p>
                                    <?php $hargatotal += $harganya ?>
                                <?php endforeach; ?>
                            </li>
                            <li class="list-group-item">
                                <h5>Total</h5>
                                <?php $hargaFormat = number_format($hargatotal, 0, ',', '.'); ?>
                                <p><?= $hargaFormat; ?></p>
                                <div class="align-items-center justify-content-left mt-3 d-grid gap-2">
                                    <button href="#" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="false">Beli</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>