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
            <div class="col-sm-4 h-100">
                <img src="/img/<?= $laptop['gambar']; ?>" alt="" style="width: 360px;" class="my-5">
            </div>
            <div class="col ms-5 mt-5 h-100" style="width: 60%;">
                <h2><?= $laptop['nama']; ?></h2>
                <?php if (!empty(session()->getFlashdata('sudah_ada'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo session()->getFlashdata('sudah_ada'); ?>
                    </div>
                <?php endif; ?>
                <?php $hargaFormat = number_format($laptop['harga'], 0, ',', '.'); ?>
                <p>Terjual : 20 | Rating 4.9 <i class="fa-solid fa-star" style="color: gold;"></i></p>
                <h1 class="my-4"><?= $hargaFormat; ?></h1>
                <?= $laptop['deskripsi']; ?>
                <p><?= $laptop['jenis']; ?> Laptop</p>
                <div class="align-items-center justify-content-left my-5 ms-5 px-5">
                    <?php if (session()->get('logged_in') == false) {
                        $LpathK = '/Home/login';
                    } else {
                        $LpathK = '/Pesan/aksikeranjang';
                    } ?>

                    <a href="<?= $LpathK; ?>" class="btn btn-primary btn-lg" tabindex="-1" role="button" aria-disabled="false">Tambahkan ke Keranjang</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>