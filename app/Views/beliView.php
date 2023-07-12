<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="\css\style_user.css" type="text/css" />
    <script src="https://kit.fontawesome.com/0159fc987f.js" crossorigin="anonymous"></script>
    <title>LAPSHOP | Beli Page</title>
</head>

<body>
    <div class="container my-5 savemoney py-2 px-3">
        <div class="row align-items-center justify-content-left">
            <div class="col">
                <img src="/img/save-money.png">
            </div>
            <div class="col">
                <h2 class="text-white font-weight-bold text-right">Hemat Uang Anda Sampai 50% Dengan Belanja Disini</h2>
            </div>
        </div>
    </div>
    <div class="maincontent">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col border border-secondary rounded" style="height: fit-content;">
                <form action="/Search/searchBar" method="post">
                    <?php if (!empty(session()->getFlashdata('range'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                            <?php echo session()->getFlashdata('range'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="input-group mb-3 my-4">
                        <input type="text" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                        <button class="btn btn-outline-success" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
                <div class="tampilHasil py-1 align-items-center justify-content-left my-3">
                    <p class="mx-2 my-1">Menampilkan <?= $count; ?> dari hasil pencarian</p>
                </div>
                <div class="info-laptop">
                    <?php foreach ($laptop as $lp) : ?>
                        <?php $hargaFormat = number_format($lp['harga'], 0, ',', '.'); ?>
                        <div class="row m-4">
                            <div class="col border">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="/img/<?= $lp['gambar']; ?>" alt="">
                                    </div>
                                    <div class="col">
                                        <h4 class="my-2"><a href="/<?= $lp['slug']; ?>"><?= $lp['nama']; ?></a></h4>
                                        <p>Merek : <?= $lp['merek']; ?></p>
                                        <p><?= $lp['jenis']; ?> Laptop</p>
                                        <p>Rating 5.0 <i class="fa-solid fa-star" style="color: gold;"></i></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 border">
                                <h5 class="my-3">Rp. <?= $hargaFormat; ?></h5>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <a href="https://id.pngtree.com/so/bisnis"></a>
</body>

</html>