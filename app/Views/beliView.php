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
                <form>
                    <div class="input-group mb-3 my-4">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                        <button class="btn btn-outline-success" type="button" id="button-addon2">Search</button>
                    </div>
                </form>
                <div>
                    <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Filter
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Filter Search</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="nama_laptop" class="form-label">Nama Laptop</label>
                                            <input type="text" class="form-control" id="nama_laptop" aria-describedby="emailHelp" name="nama_laptop" placeholder="Nama Laptop">
                                        </div>
                                        <select class="form-select my-1" aria-label="Default select example">
                                            <option selected>Merek Laptop</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                        <div class="form-check mx-3 mt-3">
                                            <input class="form-check-input" type="checkbox" value="" id="L_gaming" name="L_gaming">
                                            <label class="form-check-label" for="L_gaming">
                                                Gaming Laptop
                                            </label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="L_normal" name="L_normal">
                                            <label class="form-check-label" for="L_normal">
                                                Normal Laptop
                                            </label>
                                        </div>
                                        <label for="customRange1" class="form-label mb-1 mt-3">Minimal Harga</label>
                                        <input type="range" class="form-range mb-1" id="customRange1" min="1000000" max="30000000" name="range_Min">
                                        <input type="text" class="form-control mb-3" id="harga_laptop" aria-describedby="emailHelp" name="hargamin_laptop" placeholder="Harga">
                                        <label for="customRange1" class="form-label mb-1">Maximal Harga</label>
                                        <input type="range" class="form-range mb-1" id="customRange1" min="1000000" max="30000000" name="range_Max">
                                        <input type="text" class="form-control mb-1" id="harga_laptop" aria-describedby="emailHelp" name="hargamax_laptop" placeholder="Harga">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tampilHasil py-1 align-items-center justify-content-left my-3">
                    <p class="mx-2 my-1">Menampilkan 1000 dari hasil pencarian</p>
                </div>
                <div class="info-laptop">
                    <?php foreach ($laptop as $lp) : ?>
                        <?php $hargaFormat = number_format($lp['harga'],0,',','.'); ?>
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
                    <div class="row m-4">
                        <div class="col border">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="/img/laptop.jpg" alt="">
                                </div>
                                <div class="col">
                                    <h4 class="my-2"><a href="">Laptop Asus TUF</a></h4>
                                    <p>Merek : ASUS</p>
                                    <p>Gaming Laptop</p>
                                    <p>Rating 5.0 <i class="fa-solid fa-star" style="color: gold;"></i></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 border">
                            <h5 class="my-3">Rp. 12.000.000</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <a href="https://id.pngtree.com/so/bisnis"></a>
</body>

</html>