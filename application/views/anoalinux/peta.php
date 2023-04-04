<?php $this->load->view('anoalinux/page/v_header') ?>
<!--Sub Header Start-->
<section class="wf100 subheader">
    <div class="container">
        <h2>Direktori Kota Kendari</h2>
        <ul>
            <li> <a href="index.html">Home</a> </li>
            <li> <a href="#"> GIS Kendari</a> </li>
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
                    <?php echo $map['js'] ?>
                    <div class="map-view"><?php echo $map['html'] ?></div>
                </div>
                <?php $this->load->view('anoalinux/sidebar_left') ?>
            </div>
        </div>
    </div>
    <!--Events End-->
</div>
<!--Main Content End-->
<?php $this->load->view('anoalinux/v_footer') ?>