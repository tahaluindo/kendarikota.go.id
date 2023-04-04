<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahaplikasiModal">Tambah Aplikasi</a>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Aplikasi</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($aplikasi as $a) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $a['nama_aplikasi']; ?></td>
                        <td><?= $a['icon']; ?></td>
                        
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editaplikasiModal<?= $a['id_aplikasi']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusaplikasiModal<?= $a['id_aplikasi']; ?>">Delete</a>
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
<div class="modal fade" id="tambahaplikasiModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Aplikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/aplikasi'); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama"><strong>Nama Aplikasi</strong></label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Aplikasi">
                </div>

                <div class="form-group">
                    <label for="icon"><strong>Icon</strong> (Wajib Ukuran 256x256px)</label>
                    <input type="file" class="form-control" id="icon" name="icon">
                </div>
                <div class="form-group">
                    <label for="link"><strong>Link Aplikasi</strong></label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Link Aplikasi">
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

<!-- Modal edit Aplikasi-->
<?php foreach ($aplikasi as $a) : ?>

<div class="modal fade" id="editaplikasiModal<?= $a['id_aplikasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Edit Aplikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/aplikasi/edit_aplikasi/' . $a['id_aplikasi']); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama"><strong>Nama Aplikasi</strong></label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Aplikasi" value="<?= $a['nama_aplikasi']; ?>">
                </div>

                <div class="form-group">
                    <label for="icon"><strong>Icon</strong> (Wajib Ukuran 256x256px)</label>
                    <input type="file" class="form-control" id="userfile" name="icon">
                </div>
                <div class="form-group">
                    <label for="link"><strong>Link Aplikasi</strong></label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Link Aplikasi" value="<?= $a['link_aplikasi']; ?>">
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

<!-- Modal hapus Aplikasi-->
<?php foreach ($aplikasi as $a) : ?>

<div class="modal fade" id="hapusaplikasiModal<?= $a['id_aplikasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Hapus Aplikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/aplikasi/delete/' . $a['id_aplikasi']); ?>

            <div class="modal-body">
                <p>Anda yakin mau menghapus <b><?= $a['nama_aplikasi']; ?></b></p>
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