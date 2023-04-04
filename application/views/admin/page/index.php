<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url('admin/page/add') ?>" class="btn btn-primary mb-3">Tambah Halaman</a>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul Halaman</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Aktif</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Update Date</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($page as $p) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $p['judul']; ?></td>
                        <td><?= substr($p['isi'], 0, 100); ?></td>
                        <td class="text-center">
                            <?php if ($p['aktif'] == 1) { ?>
                            <span class="btn btn-success btn-circle">
                                <i class="fas fa-check"></i>
                            </span>
                            <?php } else { ?>
                            <span class="btn btn-danger btn-circle">
                                <i class="fas fa-window-close"></i>
                            </span>
                            <?php } ?>
                        </td>
                        <td><?= date('d M Y', $p['date_created']); ?></td>
                        <td><?= date('d M Y', $p['update_date']); ?></td>
                        <td>
                            <a href="<?= base_url('admin/page/edit/' . $p['id_halaman']) ?>" class="badge badge-success">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapuspageModal<?= $p['id_halaman']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal hapus Halaman-->
<?php foreach ($page as $p) : ?>

<div class="modal fade" id="hapuspageModal<?= $p['id_halaman']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Hapus Halaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/page/delete/' . $p['id_halaman']); ?>

            <div class="modal-body">
                <p>Anda yakin mau menghapus <b><?= $p['judul']; ?></b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>