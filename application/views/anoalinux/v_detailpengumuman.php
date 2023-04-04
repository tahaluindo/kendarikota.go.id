<?php $this->load->view('anoalinux/page/v_header') ?>
<!--Sub Header Start-->
<section class="wf100 subheader">
    <div class="container">
        <h2><?= $pengumuman['judul'] ?></h2>
        <ul>
            <li> <a href="<?= site_url() ?>">Home</a> </li>
            <li> <a href="#">Page</a> </li>
            <li> Pengumuman </li>
        </ul>
    </div>
</section>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content p80">
    <!--News Details Page Start-->
    <div class="news-details">
        <div class="container">
            <div class="row">
                <!--Content Col Start-->
                <div class="col-md-12">
                    <div class="news-box">
                        <div class="new-thumb"> <a href="#"><i class="fas fa-link"></i></a> <span class="cat c4">Kendarikota.go.id</span> <img src="<?= base_url('assets/anoalinux/images/') ?>telukkendari_slide2.jpg" alt=""> </div>
                        <div class="new-txt">
                            <ul class="news-meta">
                                <li>tanggal</li>
                            </ul>
                            <h4><?= $pengumuman['judul'] ?></h4>
                            <p><?= $pengumuman['isi'] ?></p>


                        </div>
                    </div>
                </div>
                <!--Content Col End-->

            </div>
        </div>
    </div>
    <!--News Details Page End-->
</div>
<!--Main Content End-->
<?php $this->load->view('anoalinux/v_footer'); ?>