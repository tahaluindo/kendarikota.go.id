<div class="col-md-4">
    <div class="sidebar">
        <!--Widget Start-->
        <?php if ($this->uri->segment(2) == 'peta') { ?>
            <div class="widget">
                <h4>Direktori</h4>
                <div class="recent-posts inner">
                    <ul>
                        <?php foreach ($menu as $m) : ?>
                            <li>
                                <img src="<?= base_url('assets/img/icon/') . $m['icon'] ?>.png" class="img-thumbnail" alt="">
                                <h6> <a href="<?= base_url('direktori/peta/') . $m['id'] ?>"><?= $m['nama'] ?> </a> </h6>
                            </li>
                        <?php endforeach ?>
                        <li>

                            <h6> <a class="btn btn-danger" href="<?= base_url('direktori/peta/') ?>">Lihat Semua</a> </h6>
                        </li>

                    </ul>
                </div>
            </div>
        <?php } ?>
        <!--Widget End-->

    </div>
</div>