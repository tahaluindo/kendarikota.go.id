<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahfileModal">Tambah File</a>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Data</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($download as $d) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $d['judul_file']; ?></td>
                        <td><?= $d['deskripsi_file']; ?></td>
                        <td><?= $d['data_file']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editfileModal<?= $d['id_file']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusfileModal<?= $d['id_file']; ?>">Delete</a>
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

<!-- Modal -->

<!-- Modal tambah agenda-->
<div class="modal fade" id="tambahfileModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/download'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul"><strong>Judul File</strong></label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul File">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi"><strong>Deskripsi File</strong></label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi File">
                    </div>
                    <div class="form-group">
                        <label for="data"><strong>Data File</strong> (Upload File di Google Drive)</label>
                        <input type="text" class="form-control" id="file" name="file" placeholder="data File">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit agenda-->
<?php foreach ($download as $d) : ?>

<div class="modal fade" id="editfileModal<?= $d['id_file']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Edit File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/download/edit_file/'); ?><?= $d['id_file'] ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul"><strong>Judul File</strong></label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul File" value="<?= $d['judul_file']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi"><strong>Deskripsi File</strong></label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi File" value="<?= $d['deskripsi_file']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="data"><strong>Data File</strong> (Upload File di Google Drive)</label>
                        <input type="text" class="form-control" id="file" name="file" placeholder="Data File" value="<?= $d['data_file']; ?>">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal hapus Download-->
<?php foreach ($download as $d) : ?>

<div class="modal fade" id="hapusfileModal<?= $d['id_file']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Hapus Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/download/delete/' . $d['id_file']); ?>

            <div class="modal-body">
                <p>Anda yakin mau menghapus <b><?= $d['judul_file']; ?></b></p>
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