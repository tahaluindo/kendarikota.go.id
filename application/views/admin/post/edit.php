<div class="container-fluid">

    <!-- Page Heading -->
    <!--<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

    <div class="row">

        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_open_multipart('admin/post/edit/' . $news['id']) ?>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $news['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Body</label>
                        <textarea class="form-control" id="body" name="body" rows="10" value="<?= $news['text'] ?>"><?= $news['text'] ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="div col-lg-4">

            <div class="card shadow mb-2">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">News Category</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">

                        <div class="form-group">
                            <select class="form-control" name="category">
                                <option>-Select Category-</option>
                                <?php foreach ($category as $ct) {
                                    $cat_id = $ct['id'];
                                    $cat_nama = $ct['category'];
                                    if ($news['id_category'] == $cat_id)
                                        echo "<option value='$cat_id' selected>$cat_nama</option>";
                                    else
                                        echo "<option value='$cat_id'>$cat_nama</option>";
                                };
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                    <h6 class="m-0 font-weight-bold text-primary">Feature Image</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample1">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" class="form-control" id="caption" name="caption" value="<?= $news['caption'] ?>">
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    <center><img src="<?= base_url('assets/img/news/') . $news['foto']; ?>" alt="" width="300" height="auto"></center>

                </div>
            </div>

        </div>
        </form>
    </div>

</div>
<!-- /.container-fluid -->