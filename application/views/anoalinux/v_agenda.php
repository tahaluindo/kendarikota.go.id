<?php $this->load->view('anoalinux/page/v_header') ?>
<!--Sub Header Start-->
<section class="wf100 subheader">
    <div class="container">
        <h2>Agenda Kota</h2>
        <ul>
            <li> <a href="index.html">Home</a> </li>
            <li> <a href="#"> Agenda</a> </li>
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
                <div class="col-md-8">
                    <!--Event List Box Start-->
                    <?php foreach ($agenda as $a) : ?>
                        <div class="event-list-box">
                            <ul>

                                <li class="edate"><strong><?= date('d M, Y', strtotime($a['tgl_mulai'])); ?></strong> 09:00 pm</li>

                                <li class="event-title">
                                    <h6> <a href="#"><?= $a['nama']; ?></a> </h6>
                                    <p><i class="fas fa-map-marker-alt"></i> <?= $a['lokasi']; ?></p>
                                </li>
                                <li> <a href="#" class="join-now">Join Now</a> </li>
                            </ul>
                        </div>
                    <?php endforeach ?>
                    <!--Event List Box End-->
                    <div class="site-pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li class="active"><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li> <a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <?php $this->load->view('anoalinux/sidebar_left') ?>
            </div>
        </div>
    </div>
    <!--Events End-->
</div>
<!--Main Content End-->
<?php $this->load->view('anoalinux/v_footer') ?>