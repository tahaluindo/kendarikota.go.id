<?php $this->load->view('anoalinux/page/v_header') ?>
<!--Sub Header Start-->
<section class="wf100 subheader">
    <div class="container">
        <h2>Detail Pejabat</h2>
        <ul>
            <li> <a href="<?= site_url() ?>">Home</a> </li>
            <li> <a href="#">Page</a> </li>
            <li> Pejabat </li>
        </ul>
    </div>
</section>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content p80">
    <!-- Team Detials Start -->
    <div class="team-details">
        <div class="container">
            <div class="row">
                <div class="team-details-txt m90">
                    <div class="col-md-5">
                        <div class="team-img"> <img src="<?= base_url('assets/img/pejabat/') . $pejabat['foto'] ?>" alt=""> </div>
                    </div>
                    <div class="col-md-7">
                        <div class="team-detail">
                            <h2><?= $pejabat['nama'] ?></h2>
                            <strong class="advisor"><?= $pejabat['jabatan'] ?></strong>

                            <a class="contact-team" href="#">Contact</a>
                            <ul class="member-social">
                                <li> Get Connect: </li>
                                <li> <a class="fb" href="<?= $pejabat['facebook'] ?>"><i class="fab fa-facebook-f"></i></a> <a class="tw" href="<?= $pejabat['twitter'] ?>"><i class="fab fa-twitter"></i></a> <a class="insta" href="<?= $pejabat['instagram'] ?>"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="team-details-txt m40">
                        <h3 class="stitle">Biodata Lengkap</h3>
                        <?= $pejabat['keterangan'] ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Team Detials End -->
    <!--Main Content End-->
    <!--News Details Page End-->
</div>
<!--Main Content End-->
<?php $this->load->view('anoalinux/v_footer'); ?>