<div class="row">
    <!--Icon Box Start-->
    <?php foreach ($datayoutube['items'] as $title) : ?>
        <div class="col-md-4 col-sm-4">

            <h6> Channel : <a href="https://www.youtube.com/watch?v=<?= $title['id']['videoId'] ?>"> <?= $title['snippet']['title'] ?></a> </h6>

            <h6> Foto : <img src="<?= $title['snippet']['thumbnails']['default']['url'] ?>"> </h6>

        </div>
    </div>
<?php endforeach; ?>
<!--Icon Box End-->