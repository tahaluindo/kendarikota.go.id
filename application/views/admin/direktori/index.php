<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newdirektoriModal">Tambah Direktori</a>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telpon</th>
                        <th scope="col">latitude</th>
                        <th scope="col">longitude</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($lokasi as $l) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $l['nama_lokasi']; ?></td>
                        <td><?= $l['alamat']; ?></td>
                        <td><?= $l['telp']; ?></td>
                        <td><?= $l['latitude']; ?></td>
                        <td><?= $l['longitude']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editdirektoriModal<?= $l['id_lokasi']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusdirektoriModal<?= $l['id_lokasi']; ?>">Delete</a>
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
<div class="modal fade" id="newdirektoriModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Direktori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/direktori'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lokasi">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="telp" name="telp" placeholder="No.Telpon">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude">
                    </div>
                    <div class="form-group">
                        <select name="id_direktori" id="id_direktori" class="form-control">
                            <option value="">Pilih Direktori</option>
                            <?php foreach ($direktori as $d) : ?>
                            <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
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

<!-- Modal edit agenda-->
<?php foreach ($lokasi as $l) : ?>

<div class="modal fade" id="editdirektoriModal<?= $l['id_lokasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Edit Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/direktori/edit_lokasi/'); ?><?= $l['id_lokasi'] ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lokasi" value="<?= $l['nama_lokasi']; ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"><?= $l['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="telp" name="telp" placeholder="No. Telpon" value="<?= $l['telp']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" value="<?= $l['latitude']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" value="<?= $l['longitude']; ?>">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="id_direktori">
                            <option>-Pilih Direktori-</option>
                            <?php foreach ($direktori as $d) {
                                    $cat_id = $d['id'];
                                    $cat_nama = $d['nama'];
                                    if ($l['id_direktori'] == $cat_id)
                                        echo "<option value='$cat_id' selected>$cat_nama</option>";
                                    else
                                        echo "<option value='$cat_id'>$cat_nama</option>";
                                };
                                ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal hapus lokasi-->
<?php foreach ($lokasi as $l) : ?>

<div class="modal fade" id="hapusdirektoriModal<?= $l['id_lokasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Hapus Direktori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/direktori/delete/' . $l['id_lokasi']); ?>

            <div class="modal-body">
                <p>Anda yakin mau menghapus <b><?= $l['nama_lokasi']; ?></b></p>
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