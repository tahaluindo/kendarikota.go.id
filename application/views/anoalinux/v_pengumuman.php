<?php $this->load->view('anoalinux/page/v_header') ?>
<!--Sub Header Start-->
<section class="wf100 subheader">
    <div class="container">
        <h2>Pengumuman</h2>
        <ul>
            <li> <a href="index.html">Home</a> </li>
            <li> <a href="#"> Pengumuman</a> </li>
        </ul>
    </div>
</section>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content">
    <!--Events Start-->
    <div class="events-wrapper events-listing">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Sumber</th>
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>

                            <?php foreach ($pengumuman as $p) : ?>

                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['judul']; ?></td>
                                <td><?= $p['isi']; ?></td>
                                <td><?= $p['sumber']; ?></td>
                                <td>
                                    <a href="<?= base_url('pengumuman/' . $p['slug']) ?>" class="badge badge-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-flag"></i>
                                        </span>
                                        <span class="text">Lihat</span>
                                    </a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
                <?php $this->load->view('anoalinux/sidebar_left') ?>
            </div>
        </div>
    </div>
    <!--Events End-->
</div>
<!--Main Content End-->
<?php $this->load->view('anoalinux/v_footer') ?>