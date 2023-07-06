<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ======== BOX ICONS ======== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

    <!-- ======= CSS ======= -->
    <link rel="stylesheet" href="<?= BASEURL;?>/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?= BASEURL;?>/css/virtual-select.min.css">
    

    <title>Sistem Perpuastakaan | <?= $data['judul']; ?></title>
  </head>
  <body>
    <!-- ======= HEADER ======= -->
    <header class="header">
      <div class="header__container">
        <div class="header__logo-judul">
          <i class="bx bxs-copyright header__logo-icon"></i>
          <span class="header__logo-name">SIPUS</span>
        </div>
        <a href="#" class="header__logo">SISTEM PERPUSTAKAAN</a>

        <div class="header__toggle">
          <i class="bx bx-menu" id="header-toggle"></i>
        </div>
      </div>
    </header>

    <!-- ======= NAV ======= -->
    <div class="nav" id="navbar">
      <nav class="nav__container">
        <div>
          <a href="<?= BASEURL;?>" class="nav__link nav_logo">
            <i class="bx bxs-component nav__icon"></i>
            <span class="nav__logo-name">SIPUS</span>
          </a>

          <div class="nav__list">
            <div class="nav__items">
              <h3 class="nav__subtitle nav__profile">Menu</h3>

              <a href="<?= BASEURL;?>/about" class="nav__link">
                <i class="bx bx-home-smile nav__icon"></i>
                <span class="nav__name">About</span>
              </a>
            </div>

            <div class="nav__items">
              <h3 class="nav__subtitle">Kelola Data</h3>
              <a href="<?=BASEURL;?>/member" class="nav__link">
              <i class='bx bx-user-circle nav__icon'></i>
                <span class="nav__name">Member</span>
              </a>
              <a href="<?=BASEURL;?>/petugas" class="nav__link">
                <i class='bx bx-support nav__icon' ></i>
                <span class="nav__name">Petugas</span>
              </a>
              <a href="<?=BASEURL;?>/buku" class="nav__link">
                <i class='bx bx-book nav__icon'></i>
                <span class="nav__name">Buku</span>
              </a>
              <a href="<?=BASEURL;?>/penulis" class="nav__link">
                <i class='bx bx-book-reader nav__icon'></i>
                <span class="nav__name">Penulis</span>
              </a>
              <a href="<?=BASEURL;?>/peminjaman" class="nav__link">
                <i class='bx bx-upload nav__icon'></i>
                <span class="nav__name">Peminjaman</span>
              </a>
              <a href="<?=BASEURL;?>/pengembalian" class="nav__link">
                <i class='bx bx-download nav__icon'></i>
                <span class="nav__name">Pengembalian</span>
              </a>
            </div>

            <div class="nav__items">
              <h3 class="nav__subtitle">Rekap Data</h3>
              <a href="<?=BASEURL;?>/rekap" class="nav__link">
                <i class='bx bx-transfer nav__icon' ></i>
                <span class="nav__name">Data Transaksi</span>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <!-- ======= MAIN CONTENT ======= -->
    <main class="main">