<?php $this->load->view('anoalinux/page/v_header') ?>
<!--Sub Header Start-->
<section class="wf100 subheader">
    <div class="container">
        <h2><?= $title ?></h2>
        <ul>
            <li> <a href="index.html">Home</a> </li>
            <li> <a href="#"> OPD</a> </li>
        </ul>
    </div>
</section>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content">
    <!--Events Start-->
    <div class="departments p80 dpage-bg">
        <div class="container">
            <div class="row">
                <!--Department Box Start-->
                <?php foreach ($opd as $o) : ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="community-box mb30">
                            <h6><?= $o['nama_opd'] ?></h6>
                            <ul>
                                <li><a data-toggle="modal" data-target="#strukturModalCenter<?= $o['id_opd']; ?>" href="#"><i class="fas fa-circle"></i> Struktur </a></li>
                                <li><a data-toggle="modal" data-target="#tupoksiModalCenter<?= $o['id_opd']; ?>" href=" #"><i class="fas fa-circle"></i> Tupoksi</a></li>

                            </ul>
                            <a class="see-more" href="#">See More</a> <span><img src="<?= base_url('assets/anoalinux/'); ?>images/ccc-icon3.png" alt=""></span>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!--Department Box End-->
            </div>
        </div>
    </div>
    <!--Events End-->
</div>
<!--Main Content End-->
<?php $this->load->view('anoalinux/v_footer') ?>

<!-- Modal -->
<?php foreach ($opd as $o) : ?>
    <div class="modal fade" id="strukturModalCenter<?= $o['id_opd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Struktur <?= $o['nama_opd']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="https://docs.google.com/viewer?srcid=<?= $o['struktur']; ?>&pid=explorer&efh=false&a=v&chrome=false&embedded=true" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="https://drive.google.com/uc?authuser=0&id=<?= $o['struktur']; ?>&export=download" class="btn btn-success">Download</a>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal -->
<?php foreach ($opd as $o) : ?>
    <div class="modal fade" id="tupoksiModalCenter<?= $o['id_opd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tupoksi <?= $o['nama_opd']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <iframe src="https://docs.google.com/viewer?srcid=<?= $o['tupoksi']; ?>&pid=explorer&efh=false&a=v&chrome=false&embedded=true" width="100%" height="400px"></iframe>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="https://drive.google.com/uc?authuser=0&id=<?= $o['tupoksi']; ?>&export=download" class="btn btn-success">Download</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>