<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahfileModal">Tambah Perda</a>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No. Perda</th>
                        <th scope="col">Tentang</th>
                        <th scope="col">Tgl Upload</th>
                        <th scope="col">Data</th>
                        <th scope="col">Aksi</th>
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
                        <td><?= $p['data_file']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editfileModal<?= $p['id_perda']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusperdaModal<?= $p['id_perda']; ?>">Delete</a>
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
            <form action="<?= base_url('admin/perda'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="no"><strong>Nomor Perda</strong></label>
                        <input type="text" class="form-control" id="no_perda" name="no_perda" placeholder="No.Perda">
                    </div>
                    <div class="form-group">
                        <label for="tentang"><strong>Tentang</strong></label>
                        <input type="text" class="form-control" id="tentang" name="tentang" placeholder="Tentang / Judul">
                    </div>
                    <div class="form-group">
                        <label for="file"><strong>File Perda</strong> (Upload File ke Google Drive)</label>
                        <input type="text" class="form-control" id="file" name="file" placeholder="File Perda">
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
<?php foreach ($perda as $p) : ?>

<div class="modal fade" id="editfileModal<?= $p['id_perda']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Edit Perda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/perda/edit_file/'); ?><?= $p['id_perda'] ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="no"><strong>Nomor Perda</strong></label>
                        <input type="text" class="form-control" id="no_perda" name="no_perda" placeholder="No. Perda" value="<?= $p['no_perda']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tentang"><strong>Tentang</strong></label>
                        <input type="text" class="form-control" id="tentang" name="tentang" placeholder="Tentang / judul" value="<?= $p['tentang']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="file"><strong>File Perda</strong> (Upload File ke Google Drive)</label>
                        <input type="text" class="form-control" id="file" name="file" placeholder="Data File" value="<?= $p['data_file']; ?>">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal hapus Pejabat-->
<?php foreach ($perda as $p) : ?>

<div class="modal fade" id="hapusperdaModal<?= $p['id_perda']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Hapus Perda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/perda/delete/' . $p['id_perda']); ?>

            <div class="modal-body">
                <p>Anda yakin mau menghapus <b><?= $p['tentang']; ?></b></p>
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