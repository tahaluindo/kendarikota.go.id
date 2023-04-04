<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahfileModal">Tambah OPD</a>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama OPD</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Struktur</th>
                        <th scope="col">Tupoksi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($opd as $o) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $o['nama_opd']; ?></td>
                        <td><?= $o['kategori']; ?></td>
                        <td><a href="https://drive.google.com/open?id=<?= $o['struktur']; ?>" class="btn btn-primary btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text"> Lihat</span>
                            </a></td>
                        <td><a href="https://drive.google.com/open?id=<?= $o['tupoksi']; ?>" class="btn btn-primary btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text"> Lihat</span>
                            </a></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editopdModal<?= $o['id_opd']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusopdModal<?= $o['id_opd']; ?>">Delete</a>
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
                <h5 class="modal-title" id="newMenuModalLabel">Tambah OPD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/opd'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Nama OPD</strong></label>
                        <input type="text" class="form-control" id="nama_opd" name="nama_opd" placeholder="Nama OPD">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Struktur</strong> (Upload Struktur digoogle Drive)</label>
                        <input type="text" class="form-control" id="struktur" name="struktur" placeholder="Struktur OPD">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Tupoksi</strong> (Upload Tupoksi digoogle Drive)</label>
                        <input type="text" class="form-control" id="tupoksi" name="tupoksi" placeholder="Tupoksi">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Kategori</strong></label>
                        <select class="form-control" name="kategori">
                            <option>Pilih Kategori</option>
                            <?php foreach ($kategori as $kat) : ?>
                            <option><?= $kat ?></option>
                            <?php endforeach; ?>
                        </select>
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
<?php foreach ($opd as $o) : ?>

<div class="modal fade" id="editopdModal<?= $o['id_opd']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Edit OPD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/opd/edit_opd/'); ?><?= $o['id_opd'] ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Nama OPD</strong></label>
                        <input type="text" class="form-control" id="nama_opd" name="nama_opd" placeholder="Nama OPD" value="<?= $o['nama_opd']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Struktur</strong> (Upload Struktur digoogle Drive)</label>
                        <input type="text" class="form-control" id="struktur" name="struktur" placeholder="Struktur OPD" value="<?= $o['struktur']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"><strong>Tupoksi</strong> (Upload Tupoksi digoogle Drive)</label>
                        <input type="text" class="form-control" id="tupoksi" name="tupoksi" placeholder="Tupoksi" value="<?= $o['tupoksi']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama"><strong>Kategori</strong></label>
                        <select class="form-control" name="kategori">
                            <option>-Pilih Kategori-</option>
                            <?php foreach ($kategori as $kat) {
                                    $k = $kat;
                                    if ($o['kategori'] == $k)
                                        echo "<option value='$k' selected>$k</option>";
                                    else
                                        echo "<option value='$k'>$k</option>";
                                };
                                ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal hapus Download-->
<?php foreach ($opd as $o) : ?>

<div class="modal fade" id="hapusopdModal<?= $o['id_opd']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Hapus OPD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/opd/delete/' . $o['id_opd']); ?>

            <div class="modal-body">
                <p>Anda yakin mau menghapus <b><?= $o['nama_opd']; ?></b></p>
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