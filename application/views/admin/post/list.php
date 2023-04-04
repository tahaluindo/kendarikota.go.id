<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
            <p class="mb-3 align-left">
                <a href="<?= base_url('admin/post/add') ?>" class="btn btn-primary   ">Add New Post</a>
            </p>
            <?= $this->session->flashdata('message'); ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php $i = 1;
                                foreach ($news as $n) : ?>

                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><img src="<?= base_url('assets/img/news/') ?><?= $n['foto'] ?>" width="60" height="60"></td>
                                        <td><?= $n['title'] ?></td>
                                        <td><?= $n['category'] ?></td>
                                        <td class="text-center">
                                            <?php if ($n['status'] == 1) { ?>
                                                <span class="btn btn-success btn-circle">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                            <?php } else { ?>
                                                <span class="btn btn-danger btn-circle">
                                                    <i class="fas fa-window-close"></i>
                                                </span>
                                            <?php } ?>
                                        </td>
                                        <td><?= $n['name'] ?></td>
                                        <td><?= date("d-m-y", $n['date_created']); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu">
                                                    <?php if ($n['status'] == 1) { ?>
                                                        <a class="dropdown-item" href="<?= base_url("admin/post/set_publish/") ?><?= $n['id'] ?>"><i class="fas fa-window-close mr-2"></i>Unpublish</a>
                                                    <?php } else { ?>
                                                        <a class="dropdown-item" href="<?= base_url("admin/post/set_publish/") ?><?= $n['id'] ?>"><i class="fas fa-check mr-2"></i>publish</a>
                                                    <?php } ?>

                                                    <?php if ($n['headline'] == 'yes') { ?>
                                                        <a class="dropdown-item" href="<?= base_url("admin/post/set_headline/") ?><?= $n['id'] ?>"><i class="fas fa-window-close mr-2"></i>Unset As Headline</a>
                                                    <?php } else { ?>
                                                        <a class="dropdown-item" href="<?= base_url("admin/post/set_headline/") ?><?= $n['id'] ?>"><i class="fas fa-check mr-2"></i>Set Headline</a>
                                                    <?php } ?>

                                                    <a class="dropdown-item" href="<?= base_url("admin/post/edit/") ?><?= $n['id'] ?>"><i class="fas fa-edit mr-2"></i>Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="<?= base_url("admin/post/delete/") ?><?= $n['id'] ?>"><i class="fas fa-trash mr-2"></i>Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <?php $i++;
                                endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->


<!-- End of Main Content -->