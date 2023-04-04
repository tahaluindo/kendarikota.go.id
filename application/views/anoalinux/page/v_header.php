<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | <?= site_name(); ?></title>
    <!-- CSS Files -->
    <link href="<?= base_url('assets/anoalinux/') ?>css/custom.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/responsive.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/color.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/all.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/prettyPhoto.css" rel="stylesheet">

    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/') ?><?= site_favicon(); ?>" type="image/png">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body>
    <!--Wrapper Start-->
    <div class="wrapper">
        <!--Header Start-->
        <header class="wf100 header">
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <ul class="left-links">
                                <li> <a href="#">Sejarah</a> </li>
                                <li> <a href="#">Profil Wali kota</a> </li>
                                <li> <a href="#">Profil Wakil Wali kota</a> </li>

                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul class="right-links">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="logo-nav-row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                    <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/anoalinux/') ?>images/logo_kendarikotakecil.png" alt=""></a>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="<?= site_url('') ?>">Beranda</a></li>

                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kendari Kita<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($menupage as $m) : ?>
                                                <li><a href="<?= site_url('page/detail/' . $m['slug']) ?>"><?= $m['judul'] ?></a></li>
                                                <?php endforeach; ?>
                                                <li><a href="<?= site_url('page/profilwalikota') ?>">Profil Walikota</a></li>
                                                <li><a href="<?= site_url('page/profilwakilwalikota') ?>">Profil Wakil Walikota</a></li>
                                                
                                                <li><a href="<?= site_url('laman/pejabat') ?>">Pejabat Pemerintah</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perangkat Daerah<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?= site_url('home/opd/sekretariat') ?>">Sekretariat Daerah</a></li>
                                                <li><a href="<?= site_url('home/opd/inspektorat') ?>">Inspektorat</a></li>
                                                <li><a href="<?= site_url('home/opd/Badan') ?>">Badan-badan</a></li>
                                                <li><a href="<?= site_url('home/opd/dinas') ?>">Dinas</a></li>
                                                <li><a href="<?= site_url('home/opd/Bagian') ?>">Bagian-bagian</a></li>
                                                <li><a href="<?= site_url('home/opd/camat') ?>">Kecamatan</a></li>
                                                <li><a href="<?= site_url('home/opd/bumd') ?>">BUMD</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?= site_url('berita') ?>">Berita</a></li>
                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?= site_url('agenda') ?>">Agenda</a></li>
                                                <li><a href="<?= site_url('pengumuman') ?>">Pengumuman</a></li>

                                            </ul>
                                        </li>
                                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Direktori<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($menu as $m) : ?>
                                                    <li><a href="<?= site_url('direktori/view/') ?><?= $m['id'] ?>"><?= $m['nama'] ?></a></li>
                                                <?php endforeach ?>
                                            </ul>
                                        </li>

                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="search-btn"><a class="search-icon" href="#search"> <i class="fas fa-search"></i> </a></li>
                                        <li class="bars-btn"><a href="#"><img src="<?= base_url('assets/anoalinux/') ?>images/bars.png" alt=""></a></li>
                                    </ul>
                                    <div id="search">
                                        <button type="button" class="close">×</button>
                                        <form class="search-overlay-form">
                                            <input type="search" value="" placeholder="type keyword(s) here" />
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Header End-->