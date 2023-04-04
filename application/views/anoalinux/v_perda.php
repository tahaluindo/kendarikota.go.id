<?php $this->load->view('anoalinux/page/v_header') ?>
<!--Sub Header Start-->
<section class="wf100 subheader">
    <div class="container">
        <h2>Peraturan Daerah Kota Kendari</h2>
        <ul>
            <li> <a href="index.html">Home</a> </li>
            <li> <a href="#"> Perda</a> </li>
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
                                <th scope="col">Peraturan</th>
                                <th scope="col">Tentang</th>
                                <th scope="col">Tanggal Upload</th>
                                <th scope="col">Lihat</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>

                            <?php foreach ($perda as $p) : ?>

                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $p['no_perda']; ?></td>
                                    <td><?= $p['tentang']; ?></td>
                                    <td><?= longdate_indo(date('Y-m-d', $p['tgl'])) ?></td>
                                    <td>
                                        <a href="https://drive.google.com/uc?authuser=0&id=<?= $p['data_file']; ?>&export=download" class="btn btn-primary btn-icon-split btn-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text"> Download</span>
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