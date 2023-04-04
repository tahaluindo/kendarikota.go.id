<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= site_name(); ?> | <?= site_description() ?></title>
    <!-- CSS Files -->
    <link href="<?= base_url('assets/anoalinux/') ?>css/custom.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/responsive.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/color.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/all.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/bootstrap.min.css?version=13" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= base_url('assets/anoalinux/') ?>css/slick.css" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/img/') ?><?= site_favicon(); ?>" type="image/png">
    <!--Rev Slider Start-->
    <link rel="stylesheet" href="<?= base_url('assets/anoalinux/') ?>js/rev-slider/css/settings.css" type='text/css'
          media='all'/>
    <link rel="stylesheet" href="<?= base_url('assets/anoalinux/') ?>js/rev-slider/css/layers.css" type='text/css'
          media='all'/>
    <link rel="stylesheet" href="<?= base_url('assets/anoalinux/') ?>js/rev-slider/css/navigation.css" type='text/css'
          media='all'/>
    <!--Rev Slider End-->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>

<!--Wrapper Start-->
<div class="wrapper">
    <!--Header Start-->
    <header class="wf100 header-two">
        <div id="closetopbar" class="topbar wf100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <p>Portal Resmi <a href="#">Pemerintah</a> Kota Kendari <a href="#"></a></p>
                    </div>
                    <div class="col-md-6 col-sm-5"><a id="closebtn" href="#" class="cross-btn"><i
                                    class="fas fa-times"></i></a> <a href="#" class="become-vol">Login</a></div>
                </div>
            </div>
        </div>
        <div class="h3-logo-row wf100">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <ul class="quick-links">

                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="h3-logo"><a href="<?= base_url(); ?>"><img
                                        src="<?= base_url('assets/img/') ?><?= site_logo(); ?>" width=70% alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">

                    </div>
                </div>
            </div>
        </div>
        <div class="h3-navbar wf100">
            <div class="container">
                <nav class="navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= site_url('') ?>">Beranda</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                    role="button" aria-haspopup="true" aria-expanded="false">Kendari
                                    Kita<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($menupage as $m) : ?>
                                        <li>
                                            <a href="<?= site_url('page/detail/' . $m['slug']) ?>"><?= $m['judul'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                    <li><a href="<?= site_url('page/profilwalikota') ?>">Profil Walikota</a></li>
                                    <li><a href="<?= site_url('page/profilwakilwalikota') ?>">Profil Wakil Walikota</a>
                                    </li>

                                    <li><a href="<?= site_url('pejabat') ?>">Pejabat Pemerintah</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                    role="button" aria-haspopup="true" aria-expanded="false">Perangkat
                                    Daerah<span class="caret"></span></a>
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

                            <li><a href="<?= site_url('/berita') ?>">Berita</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                    role="button" aria-haspopup="true" aria-expanded="false">Events
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= site_url('agenda') ?>">Agenda</a></li>
                                    <li><a href="<?= site_url('pengumuman') ?>">Pengumuman</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                    role="button" aria-haspopup="true"
                                                    aria-expanded="false">Direktori<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($menu as $m) : ?>
                                        <li>
                                            <a href="<?= site_url('direktori/view/') ?><?= $m['id'] ?>"><?= $m['nama'] ?></a>
                                        </li>
                                    <?php endforeach ?>

                                </ul>
                            </li>
                            <li><a href="<?= site_url('perda') ?>">Perda</a></li>
                            <li><a href="<?= site_url('download') ?>">Statistik</a></li>
                            <li><a href="/berita/category/info-covid-19">Info Covid-19</a></li>
                            </li>
                        </ul>
                        <ul class="navbar-right">
                            <li class="search-form">
                                <form class="navbar-form">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </li>
                            <!-- <li class="donate-btn"><a href="#">Donate</a></li> -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!--Header End-->
    <!--Slider Start-->
    <div class="main-slider wf100">
        <div class="home2-slider rev_slider_wrapper">

            <!-- START REVOLUTION SLIDER -->
            <div class="rev_slider_wrapper fullwidthbanner-container">
                <div id="rev-slider2" class="rev_slider fullwidthabanner">
                    <ul>
                        <li data-transition="fade"><img
                                    src="<?= base_url('assets/anoalinux/') ?>images/telukkendari_slide.jpg" alt=""
                                    width="1920" height="685" data-bgposition="top center" data-bgfit="cover"
                                    data-bgrepeat="no-repeat" data-bgparallax="1">
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="175" data-transform_idle="o:1;"
                                 data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box">
                                    <h1>KOTA KENDARI<br>
                                        <strong>LIVABLE CITY</strong></h1>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="345" data-transform_idle="o:1;"
                                 data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box">
                                    <p>Mewujudkan Kota Kendari, Kota layak huni yang Berbasis Ekologi, Informasi dan
                                        Teknologi<br>
                                        livable cities based on ecology, information and technology</p>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="450" data-transform_idle="o:1;"
                                 data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box"><a href="#" class="con">Lihat</a></div>
                            </div>
                        </li>
                        <li data-transition="slidehorizontal"><img
                                    src="<?= base_url('assets/anoalinux/') ?>images/telukkendari_slide2.jpg" alt=""
                                    width="1920" height="685" data-bgposition="top center" data-bgfit="cover"
                                    data-bgrepeat="no-repeat" data-bgparallax="1">
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="175" data-transform_idle="o:1;"
                                 data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box">
                                    <h1>KENDARI<br>
                                        <strong>LIVABLE CITY</strong></h1>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="345" data-transform_idle="o:1;"
                                 data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box">
                                    <p>Meningkatkan Kualitas Pelayanan Masyarakat<br>
                                        Pembangunan Infrastruktur, Menata Wajah Kota Kendari</p>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="450" data-transform_idle="o:1;"
                                 data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box"><a href="#" class="con">Lihat</a></div>
                            </div>
                        </li>
                        <li data-transition="slidevertical"><img
                                    src="<?= base_url('assets/anoalinux/') ?>images/smartcity.jpg" alt="" width="1920"
                                    height="685" data-bgposition="top center" data-bgfit="cover"
                                    data-bgrepeat="no-repeat" data-bgparallax="1">
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="175" data-transform_idle="o:1;"
                                 data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box">
                                    <h1>KENDARI<br>
                                        <strong>LIVABLE CITY</strong></h1>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="345" data-transform_idle="o:1;"
                                 data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box">
                                    <p> - Good Government - <br>
                                        Demi Mewujudkan Tata laksana pemerintahan yang baik</p>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="455" data-transform_idle="o:1;"
                                 data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box"><a href="#" class="con">Lihat</a></div>
                            </div>
                        </li>
                        <li data-transition="fade"><img
                                    src="<?= base_url('assets/anoalinux/') ?>images/kebunrayakendari.jpg" alt=""
                                    width="1920" height="685" data-bgposition="top center" data-bgfit="cover"
                                    data-bgrepeat="no-repeat" data-bgparallax="1">
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="175" data-transform_idle="o:1;"
                                 data-transform_in="x:[-75%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box">
                                    <h1>KENDARI Menuju<br>
                                        <strong> KOTA LAYAK HUNI</strong></h1>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="345" data-transform_idle="o:1;"
                                 data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box">
                                    <p>Kota layak huni Berbasis Ekologi, Informasi dan Teknologi<br>
                                        livable cities based on ecology, information and technology</p>
                                </div>
                            </div>
                            <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="400" data-y="top"
                                 data-voffset="450" data-transform_idle="o:1;"
                                 data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                                 data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                 data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                                 data-splitout="none" data-start="700">
                                <div class="slide-content-box"><a href="#" class="con">Lihat</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END REVOLUTION SLIDER -->

        </div>
    </div>
    <!--Slider End-->
    <!--Main Content Start-->
    <div class="main-content">
        <!--Mayor Msg with Video Start-->
        <section class="Mayor-video-msg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <!--Mayor Msg Start-->
                        <div class="city-tour gallery"><strong>Walikota Kendari</strong> <a
                                    href="https://www.youtube.com/watch?v=8pI6ZIFiNhY" title="City Tour"><img
                                        src="<?= base_url('assets/anoalinux/') ?>images/playicon.png" alt=""></a> <img
                                    src="<?= base_url('assets/anoalinux/') ?>images/walikotafoto.jpg" width=360px
                                    height=293px alt=""></div>
                        <!--Mayor Msg End-->
                    </div>
                    <div class="col-md-8 col-sm-7">
                        <div class="Mayor-welcome">
                            <h5>Selamat datang di Kota Kendari</h5>
                            <p>Kami siap mengabdi untuk Melayani Masyarakat demi terwujudnya kendari kota layak huni
                                yang berbasis Ekologi, Informasi & Teknologi .</p>
                            <h6>H.Sulkarnain K, SE, ME</h6>
                            <strong>Wali Kota Kendari</strong>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Mayor Msg with Video End-->
        <!--City News Start-->
        <section class="wf100 city-news p75">
            <div class="container">
                <div class="title-style-3">
                    <h3>Kendari Kini</h3>
                    <p>Baca Pembaruan Berita dan Artikel tentang Pemerintah Kota Kendari </p>
                </div>
                <div class="row">
                    <!--News Box Start-->
                    <?php foreach (array_slice($allnews, 0, 4) as $berita) : ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="news-box mb-2">
                                <div class="new-thumb"><span class="cat c1">Kendarikini</span> <img
                                            src="<?= $berita['better_featured_image']['source_url'] ?>" height=200px
                                            alt=""></div>
                                <div class="new-txt">
                                    <ul class="news-meta">
                                        <li><?= date('d M Y', strtotime($berita['date'])) ?></li>
                                        <!--<li>176 Comments</li>-->
                                    </ul>
                                    <h6><a href="<?= $berita['link'] ?>"
                                           target="_blank"><?= $berita['title']['rendered'] ?></a></h6>

                                </div>
                                <?php if ($berita['author'] == 104) { ?>
                                    <div class="news-box-f"><img
                                                src="https://1.bp.blogspot.com/_Tyh0rGz0fkQ/S48M-7tUu4I/AAAAAAAAABU/_0JiKvyP7Ts/s400/logokotakendari.gif"
                                                widht=55px alt=""> HumasPro <a href="#"><i
                                                    class="fas fa-arrow-right"></i></a></div>
                                <?php } else { ?>
                                    <div class="news-box-f"><img
                                                src="https://1.bp.blogspot.com/_Tyh0rGz0fkQ/S48M-7tUu4I/AAAAAAAAABU/_0JiKvyP7Ts/s400/logokotakendari.gif"
                                                widht=55px alt=""> Diskominfo Kendari <a href="#"><i
                                                    class="fas fa-arrow-right"></i></a></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!--News Box End-->
                </div>
            </div>
        </section>
        <!--City News End-->
        <!--Departments & Information Desk Start-->
        <section class="wf100 p75-50  depart-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="title-style-3">
                            <h3>Aplikasi</h3>
                            <p>Aplikasi Kota Kendari, Menuju Kendari Kota Layak Huni </p>
                        </div>
                        <div class="row">
                            <!--Icon Box Start-->
                            <?php foreach ($aplikasi as $p) : ?>
                                <div class="col-md-4 col-sm-4">
                                    <div class="deprt-icon-box"><img
                                                src="<?= base_url('assets/anoalinux/images/') . $p['icon'] ?>" alt="">
                                        <h6><a href="<?= $p['link_aplikasi'] ?>"
                                               target="_blank"><?= $p['nama_aplikasi'] ?></a></h6>
                                        <a class="rm" href="<?= $p['link_aplikasi'] ?>">Detail</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!--Icon Box End-->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="emergency-info">
                            <h5>Layanan Bantuan & Darurat </h5>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <!--Panel Start-->
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h6><a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> SAR
                                                Kendari </a></h6>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fas fa-user-tie"></i> Kantor SAR Kendari</li>
                                                <li><i class="far fa-building"></i> Jl. Pierre Tendean, Kel. Baruga,
                                                    Kec. Baruga, Kota Kendari.
                                                </li>
                                                <li><i class="fas fa-phone"></i> 0401 3196 557</li>
                                                <li><i class="fas fa-phone"></i> 0853 9720 0078</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Panel End-->
                                <!--Panel Start-->
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="heading2">
                                        <h6><a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse2" aria-expanded="true" aria-controls="collapse2"> Pemadam
                                                Kebakaran </a></h6>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="heading2">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fas fa-user-tie"></i> Pemadam Kebakaran Kendari</li>
                                                <li><i class="far fa-building"></i> Jl. Balai Kota III, Lrg. Kadia No.1
                                                    Kel. Pondambea, Kec. Kadia, Kota Kendari.
                                                </li>
                                                <li><i class="fas fa-phone"></i> 0401 3122 113</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Panel End-->
                                <!--Panel Start-->
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="heading3">
                                        <h6><a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse3" aria-expanded="true" aria-controls="collapse3"> Polres
                                                Kendari </a></h6>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="heading3">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fas fa-user-tie"></i></li>
                                                <li><i class="far fa-building"></i></li>
                                                <li><i class="fas fa-phone"></i></li>
                                                <li><i class="fas fa-fax"></i></li>
                                                <li><i class="far fa-envelope"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Panel End-->
                                <!--Panel Start-->
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="heading4">
                                        <h6><a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse4" aria-expanded="true" aria-controls="collapse4"> RSUD
                                                Kendari </a></h6>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="heading4">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fas fa-user-tie"></i> RSUD Kendari</li>
                                                <li><i class="far fa-building"></i> Jl. Z. A. Sugianto No. 39, Kec.
                                                    Kambu, Kota Kendari.
                                                </li>
                                                <li><i class="fas fa-phone"></i> 0401 335 9171</li>
                                                <li><i class="fas fa-phone"></i> 0822 9253 6768</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Panel End-->
                                <!--Panel Start-->
                                <div class="panel">
                                    <div class="panel-heading" role="tab" id="heading5">
                                        <h6><a role="button" data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse5" aria-expanded="true" aria-controls="collapse5"> PLN
                                                Kendari </a></h6>
                                    </div>
                                    <div id="collapse5" class="panel-collapse collapse" role="tabpanel"
                                         aria-labelledby="heading5">
                                        <div class="panel-body">
                                            <ul>
                                                <li><i class="fas fa-user-tie"></i> Gangguan PLN Kendari</li>
                                                <li><i class="far fa-building"></i> Jl.Ahmad Yani No.1, Kec.Wua-Wua,
                                                    Kota Kendari.
                                                </li>
                                                <li><i class="fas fa-phone"></i> 0401 3190 444</li>
                                                <li><i class="fas fa-fax"></i> 0401 123</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Panel End-->
                            </div>
                        </div>
                        <a href="#" class="jobs-link">Pengumuman</a>
                        <ul class="reports">
                            <?php foreach ($pengumuman as $p) : ?>
                                <li><a href="<?= base_url('pengumuman/' . $p['slug']) ?>"><i
                                                class="fas fa-file-alt"></i> <?= $p['judul'] ?></a></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--Departments & Information Desk End-->

        <!--Recent Events Start-->
        <section class="wf100 p75 recent-events">
            <div class="container">
                <div class="row">
                    <?php if (!$youtube == NULL) { ?>
                        <div class="col-md-6">
                            <h3>Kendarikota TV</h3>

                            <div class="recent-event-block">
                                <!--Slider Big Slider Start-->
                                <div class="recent-event-slider">
                                    <?php foreach ($youtube['items'] as $yt) : ?>
                                        <div class="event-big">
                                            <div class="event-cap">
                                                <h5>
                                                    <a href="https://www.youtube.com/watch?v=<?= $yt['id']['videoId'] ?>"
                                                       target="_blank"><?= $yt['snippet']['title'] ?></a></h5>
                                                <ul>
                                                    <li>
                                                        <i class="fas fa-calendar"></i> <?= date('d M Y', strtotime($yt['snippet']['publishedAt'])) ?>
                                                    </li>
                                                    <li><i class="fas fa-play-circle"></i> 16 Videos</li>
                                                </ul>
                                                <p> <?= $yt['snippet']['description'] ?> </p>
                                            </div>
                                            <img src="<?= $yt['snippet']['thumbnails']['high']['url'] ?>"
                                                 alt="<?= $yt['snippet']['title'] ?>">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <!--Slider Big Slider End-->
                                <!--Slider Big Slider Nav-->
                                <div class="recent-event-slider-nav">
                                    <?php foreach ($youtube['items'] as $yt) : ?>
                                        <div><img src="<?= $yt['snippet']['thumbnails']['high']['url'] ?>" alt=""></div>
                                    <?php endforeach; ?>
                                </div>
                                <!--Slider Big Slider Nav-->
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-6">

                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Events" aria-controls="Events" role="tab"
                                                                      data-toggle="tab">Infografis</a></li>
                            <li role="presentation"><a href="#Meetings" aria-controls="Meetings" role="tab"
                                                       data-toggle="tab">Agenda</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="Events">
                                <!--Event List Start-->
                                <?= site_ads() ?>
                                <!--Event List End-->

                            </div>
                            <div role="tabpanel" class="tab-pane" id="Meetings">
                                <!--Event List Start-->
                                <?php foreach (array_slice($agenda, 0, 4) as $a) : ?>
                                    <ul class="event-list">
                                        <li>
                                            <strong class="edate"><?= date("d M, Y", strtotime($a['tgl_mulai'])) ?></strong>
                                            <strong class="etime">09:00 pm</strong></li>
                                        <li><img src="<?= base_url('assets/anoalinux/') ?>images/upce-1.jpg" alt="">
                                        </li>
                                        <li class="el-title">
                                            <h6><a href="#"><?= $a['nama'] ?></a></h6>
                                            <p><i class="fas fa-map-marker-alt"></i> <?= $a['lokasi'] ?></p>
                                        </li>
                                        <li><a href="#" class="joinnow">Lihat</a></li>
                                    </ul>
                                <?php endforeach ?>
                                <!--Event List End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Recent Events End-->
        <!-- Explore Community Start-->
        <section class="wf100 p80 explore-community">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Direktori</h3>
                        <ul class="community-links-style-two">
                            <li><a href="<?= base_url('direktori/view/1') ?>"> <img
                                            src="<?= base_url('assets/anoalinux/') ?>images/excomm-icon1.png" alt="">
                                    Wisata </a></li>
                            <li><a href="<?= base_url('direktori/view/4') ?>"> <img
                                            src="<?= base_url('assets/anoalinux/') ?>images/excomm-icon2.png" alt="">
                                    Institusi Pendidikan </a></li>
                            <li><a href="<?= base_url('direktori/view/2') ?>"> <img
                                            src="<?= base_url('assets/anoalinux/') ?>images/excomm-icon3.png" alt="">
                                    Rumah Ibadah </a></li>
                            <li><a href="<?= base_url('direktori/view/2') ?>"> <img
                                            src="<?= base_url('assets/anoalinux/') ?>images/excomm-icon4.png" alt="">
                                    Hotel & Penginapan </a></li>
                            <li><a href="<?= base_url('direktori/view/3') ?>"> <img
                                            src="<?= base_url('assets/anoalinux/') ?>images/excomm-icon5.png" alt="">
                                    Rumah Sakit </a></li>
                            <li><a href="<?= base_url('direktori/view/9') ?>"> <img
                                            src="<?= base_url('assets/anoalinux/') ?>images/excomm-icon6.png" alt="">
                                    Transportasi </a></li>
                            <li><a href="<?= base_url('direktori/view/6') ?>"> <img
                                            src="<?= base_url('assets/anoalinux/') ?>images/excomm-icon7.png" alt="">
                                    Hiburan </a></li>
                            <li><a href="<?= base_url('direktori/view/8') ?>"> <img
                                            src="<?= base_url('assets/anoalinux/') ?>images/excomm-icon8.png" alt="">
                                    Olahraga </a></li>
                            <li><a href="<?= base_url('direktori/view/7') ?>"> <img
                                            src="<?= base_url('assets/anoalinux/') ?>images/excomm-icon9.png" alt="">
                                    Kelurahan & Kecamatan </a></li>
                            <li><a href="<?= base_url('direktori/view/5') ?>"> <img
                                            src="<?= base_url('assets/anoalinux/') ?>images/excomm-icon15.png" alt="">
                                    Pusat Perbelanjaan </a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h3>Pejabat Pemerintah</h3>
                        <!--Team Slider Start-->
                        <div id="h3team-slider" class="owl-carousel owl-theme">
                            <!--Team Box Start-->
                            <?php foreach ($pejabat as $p) : ?>
                                <div class="item">
                                    <div class="h3-team-box">
                                        <div class="team-info">
                                            <h6><a class="" href="<?= base_url('pejabat/detail/') . $p['id_pejabat'] ?>"
                                                   target="_blank"><?= $p['nama'] ?></a></h6>
                                            <strong><?= $p['jabatan'] ?></strong>
                                            <p> <?= $p['nama_opd'] ?> </p>
                                            <ul>
                                                <li><strong>Connect:</strong></li>
                                                <li><a href="<?= $p['facebook'] ?>"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="<?= $p['twitter'] ?>"><i class="fab fa-twitter"></i></a>
                                                </li>
                                                <li><a href="<?= $p['instagram'] ?>"><i
                                                                class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                        <img src="<?= base_url('assets/img/') ?>pejabat/<?= $p['foto'] ?>" alt="">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!--Team Box Start-->
                        </div>
                        <!--Team Slider End-->
                    </div>
                </div>
            </div>
        </section>
        <!-- Explore Community End-->
        <section class="wf100 home3 emergency-numbers">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="wf100 department-links p40">
                            <h3>SUB DOMAIN</h3>
                            <ul>
                                <?php $i = 0;
                                foreach ($subdomain as $s) : ?>
                                    <li><a class="c<?= $i ?>" href="<?= $s['link'] ?>"
                                           target="_blank"><span><?= $s['nama'] ?></span></a></li>
                                    <?php $i++;
                                endforeach; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--    <div class="modal fade bd-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">-->
    <!--      <div class="modal-dialog modal-dialog-centered" role="document">-->
    <!--        <div class="modal-content">-->
    <!--          <div class="modal-header">-->
    <!--            <h5 class="modal-title" id="exampleModalCenterTitle">Kendarikota.go.id</h5>-->
    <!--            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--              <span aria-hidden="true">&times;</span>-->
    <!--            </button>-->
    <!--          </div>-->
    <!--          <div class="modal-body">-->
    <!--            <strong></strong>-->
    <!--            <img src="--><? //= base_url('assets/img/uploads/17agustus.jpg') ?><!--" width="100%">-->
    <!--            <a href="https://www.kendarikota.go.id">Info Selengkapnya Klik Disini</a>-->
    <!--          </div>-->
    <!--          <div class="modal-footer">-->
    <!--            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
    <!---->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <div class="modal fade bd-example-modal-sm" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-sm-10">
                            <h2 class="modal-title" id="exampleModalCenterTitle">Info Grafis Persebaran Covid-19 Kota
                                Kendari</h2>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times; Close</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <strong></strong>
                    <iframe style="width: 100%; height: 680px" src="https://covid19.aertech-group.co.id/"></iframe>
                </div>
<!--                <div class="modal-footer">-->
<!--                    <a class="btn btn-primary" data-dismiss="modal" href="http://bit.ly/mediacenter2">Info Selengkapnya Klik Disini</a>-->
<!--                </div>-->
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" id="myModalmobileversion" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="height: 56vh">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-xs-10 col-sm-11">
                            <span style="font-size: 3vh;color: #000;" class="modal-title" id="exampleModalCenterTitle"><b>Info Grafis Persebaran Covid-19 Kota
                                    Kendari</b></span>
                        </div>
                        <div class="col-xs-2 col-sm-1">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <strong></strong>
                    <iframe class="iframe"
                            scrolling="no" src="https://covid19.aertech-group.co.id/"></iframe>
                </div>
                <div class="modal-footer" style="position: absolute;top: 44vh;right: 0px;">
                    <a class="btn btn-primary" href="https://bit.ly/mediacenter4">Info Selengkapnya                     </a>
                </div>
            </div>
        </div>
    </div>
    <!--Main Content End-->
    <!--Footer Start-->
    <footer class="home3 main-footer wf100">
        <div class="container">
            <div class="row">
                <!--Footer Widget Start-->
                <div class="col-md-4 col-sm-6">
                    <div class="textwidget"><img
                                src="<?= base_url('assets/anoalinux/') ?>images/logo kendarikotaputih.png" width=90%
                                alt="">
                        <address>
                            <ul>
                                <li><i class="fas fa-university"></i> <strong>Alamat Redaksi:</strong> Jln. Balaikota II
                                    No. 65 A Kota Kendari
                                </li>
                                <li><i class="fas fa-envelope"></i> <strong>Email:</strong> kominfokendarikota@gmail.com<br>
                                    dinaskominfo@kendarikota.go.id
                                </li>
                                <li><i class="fas fa-phone"></i> <strong>Call us:</strong> 08114057119</li>
                            </ul>
                        </address>
                    </div>
                </div>
                <!--Footer Widget End-->
                <!--Footer Widget Start-->
                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget">
                        <h6>Tautan</h6>
                        <ul>
                            <li><a href="http://www.indonesia.go.id//"><i class="fas fa-star"></i> indonesia.go.id</a>
                            </li>
                            <li><a href="http://www.gprtv.id///"><i class="fas fa-star"></i> Kominfo RI</a></li>
                            <li><a href="http://www.kemendagri.go.id/"><i class="fas fa-star"></i> Kemendagri</a></li>
                            <li><a href="http://www.sultraprov.go.id/"><i class="fas fa-star"></i> Provinsi Sultra</a>
                            </li>


                        </ul>
                    </div>
                </div>
                <!--Footer Widget End-->
                <!--Footer Widget Start-->
                <div class="col-md-5 col-sm-6">
                    <div class="footer-widget">
                        <h6>Peta Kendari</h6>
                        <iframe class="img-thumb"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127365.52488016781!2d122.46700416776142!3d-3.984875478766203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d98ecde0b6b7183%3A0x1397347f9e562fc7!2sKendari%2C+Kota+Kendari%2C+Sulawesi+Tenggara!5e0!3m2!1sid!2sid!4v1565187677016!5m2!1sid!2sid"
                                width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                <!--Footer Widget End-->

                <!--Footer Widget Start-->
                <div class="col-md-4 col-sm-6">
                    <div class="twitter-widget">
                        <div class="tw-txt">
                            <h6>@diskominfokendari</h6>
                            <a href="#" class="reply-tw"><i class="fas fa-reply"></i></a>
                            <p></p>
                        </div>
                        <div class="tw-footer"> @Kendarikota.go.id <strong></strong> <i class="fab fa-twitter"></i>
                        </div>
                    </div>
                </div>
                <!--Footer Widget End-->
            </div>
        </div>
    </footer>
    <!--Footer Start-->
    <!--Footer Start-->
    <footer class="home3 footer wf100">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <p class="copyr"><strong><?= site_copyright() ?> Developed By <a href="https://facebook.com/idulk">Anoalinux</a></strong>
                    </p>
                </div>
                <div class="col-md-5 col-sm-5">
                    <ul class="footer-social">
                        <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="insta"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#" class="yt"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>
    <!--Footer End-->
</div>
<!--Wrapper End-->

<nav id="sidebar">
    <div id="dismiss"><i class="fas fa-arrow-right"></i></div>
    <div class="sidebar-header"><img src="<?= base_url('assets/anoalinux/') ?>images/logo_kendarikotaputih.png" alt="">
    </div>
    <ul class="list-unstyled components">
        <li class="active"><a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li><a href="index.html">Default Home Page</a></li>
                <li><a href="home-two.html">Home Page Two</a></li>
                <li><a href="home-three.html">Home Page Three</a></li>
            </ul>
        </li>
        <li><a href="aboutus.html">About Us</a></li>
        <li><a href="departments.html">Departments</a></li>
        <li><a href="news-full.html">News</a></li>
        <li><a href="event.html">Events</a></li>
        <li><a href="explore-city.html">Explore City</a></li>
        <li><a href="services.html">Services</a></li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
</nav>
<div class="overlay"></div>

<!-- JS -->
<script src="<?= base_url('assets/anoalinux/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('assets/anoalinux/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/anoalinux/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/anoalinux/') ?>js/jquery.prettyPhoto.js"></script>
<script src="<?= base_url('assets/anoalinux/') ?>js/slick.min.js"></script>
<script src="<?= base_url('assets/anoalinux/') ?>js/custom.js"></script>
<!--Rev Slider Start-->
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/anoalinux/') ?>js/rev-slider.js"></script>
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript"
        src="<?= base_url('assets/anoalinux/') ?>js/rev-slider/js/extensions/revolution.extension.video.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mobile-detect/1.4.4/mobile-detect.min.js"></script>
<script>
    var md = new MobileDetect(window.navigator.userAgent);
    // ... see below
    if(md.mobile() != null || md.phone() != null || md.tablet() != null){
        $(document).ready(function () {
            $("#myModalmobileversion").modal('show');
        });
    }else{
        $(document).ready(function () {
            $("#myModal").modal('show');
        });
    }
</script>
</body>

</html>