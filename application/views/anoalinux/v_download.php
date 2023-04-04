<?php $this->load->view('anoalinux/page/v_header') ?>
<!--Sub Header Start-->
<section class="wf100 subheader">
    <div class="container">
        <h2>Statistik</h2>
        <ul>
            <li> <a href="index.html">Home</a> </li>
            <li> <a href="#"> Statistik</a> </li>
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
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Tanggal Upload</th>
                                <th scope="col">Data</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>

                            <?php foreach ($download as $d) : ?>

                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $d['judul_file']; ?></td>
                                    <td><?= $d['deskripsi_file']; ?></td>
                                    <td><?= $d['tgl']; ?></td>
                                    <td>
                                        <a href="https://drive.google.com/uc?authuser=0&id=<?= $d['data_file']; ?>&export=download" class="badge badge-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text">Unduh</span>
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