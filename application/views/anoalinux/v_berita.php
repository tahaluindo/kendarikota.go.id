<?php $this->load->view('anoalinux/page/v_header'); ?>
<!--Sub Header Start-->
<section class="wf100 subheader">
   <div class="container">
      <h2>Updated News & Articles</h2>
      <ul>
         <li> <a href="index.html">Home</a> </li>
         <li> <a href="#"> News </a> </li>
         <li>Berita Kendari</li>
      </ul>
   </div>
</section>
<!--Sub Header End-->
<!--Main Content Start-->
<div class="main-content p80">
   <!--Events Start-->
   <div class="news-wrapper news-grid">
      <div class="container">
         <div class="row">
            <!--News Box Start-->
            <?php foreach ($allnews as $n) : ?>
               <div class="col-md-4 col-sm-6">
                  <div class="news-post image-post">
                     <div class="thumb"><img src="<?= $n['better_featured_image']['source_url'] ?>" alt=""></div>
                     <div class="news-post-txt">
                        <span class="ecat c1">Berita Kendari</span>
                        <!--Share Start-->
                        <div class="btn-group share-post">
                           <button type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-share-alt"></i> Share </button>
                           <ul class="dropdown-menu">
                              <li><a href="#" class="fb"><i class="fab fa-facebook-f"></i></a></li>
                              <li><a href="#" class="tw"><i class="fab fa-twitter"></i></a></li>
                              <li><a href="#" class="insta"><i class="fab fa-instagram"></i></a></li>
                              <li><a href="#" class="linken"><i class="fab fa-linkedin-in"></i></a></li>
                              <li><a href="#" class="yt"><i class="fab fa-youtube"></i></a></li>
                           </ul>
                        </div>
                        <!--Share End-->
                        <h5><a href="<?= $n['link'] ?>"><?= $n['title']['rendered'] ?></a>
                        </h5>
                        <ul class="news-meta">
                           <li class="post-user"> <img src="http://1.bp.blogspot.com/_Tyh0rGz0fkQ/S48M-7tUu4I/AAAAAAAAABU/_0JiKvyP7Ts/s400/logokotakendari.gif" alt=""> Diskominfo Kendari </li>
                           <li><i class="far fa-calendar-alt"></i> <?= date_indo('Y-m-d', $n['date']) ?></li>
                        </ul>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
            <!--News Box End-->
         </div>
         <div class="row">
            <div class="site-pagination">
               <nav aria-label="Page navigation">
                  <ul class="pagination">
                     <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
                     <li><a href="#">1</a></li>
                     <li><a href="#">2</a></li>
                     <li class="active"><a href="#">3</a></li>
                     <li><a href="#">4</a></li>
                     <li><a href="#">5</a></li>
                     <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <!--Events End-->
</div>
<!--Main Content End-->
<?php $this->load->view('anoalinux/v_footer') ?>