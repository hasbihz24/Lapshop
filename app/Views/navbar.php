<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light bg-success sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#" style="font-weight: bolder;">LAPSHOP</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse list-nav" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="/Landing/index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/Landing/pageBeli">Product</a>
                </li>
            </ul>
            <div class="icon">
                <?php if (session()->get('logged_in') == false) {
                    $Lpath = '/Home/login';
                    $Lpath2 = '/Home/login';
                }else{
                    $Lpath2 = '/Landing/keranjang';
                    $Lpath = '/Landing/akun';
                } ?>
                <a href=" <?= $Lpath; ?>" class="p-0 mx-2 px-1">
                    <i class="fa-solid fa-user"></i> <?= session()->get('username'); ?>
                </a>
                <a href="<?= $Lpath2; ?>" class="p-0 mx-2">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>
    </div>
</nav>