<?php $this->load->view('anoalinux/page/v_header') ?>
<!--Sub Header Start-->
<section class="wf100 subheader">
    <div class="container">
        <h2><?= $title ?></h2>
        <ul>
            <li> <a href="index.html">Home</a> </li>
            <li> <a href="#"> Pejabat</a> </li>
        </ul>
    </div>
</section>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content pagebg p80">
    <!--Events Start-->
    <div class="team-grid official-members">
        <div class="container">
            <div class="row">
                <!--Team Box Start-->
                <?php foreach ($pejabat as $p) : ?>
                <div class="col-md-3 col-sm-6">
                    <div class="team-box">
                        <div class="team-thumb"> <a href="<?= base_url('pejabat/detail/') . $p['id_pejabat'] ?>"><i class="fas fa-link"></i></a> <img src="<?= base_url('assets/img/pejabat/') . $p['foto'] ?>" alt=""></div>
                        <div class="team-txt">
                            <h5><?= $p['nama'] ?></h5>
                            <strong class="dep"><?= $p['jabatan'] ?></strong>
                            <p><?= $p['nama_opd'] ?></p>
                            <ul class="team-social">
                                <li><em>Connect:</em></li>
                                <li><a href="<?= $p['twitter'] ?>"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="<?= $p['facebook'] ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="<?= $p['instagram'] ?>"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <!--Team Box End-->
            </div>
            <div class="row">
                <div class="site-pagination">
                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
        <!--Team End-->
    </div>
</div>
<!--Main Content End-->
<?php $this->load->view('anoalinux/v_footer') ?>