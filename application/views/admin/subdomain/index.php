<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahsubdomainModal">Tambah Sub Domain</a>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sub Domain</th>
                        <th scope="col">Link</th>
                        <th scope="col">Aksi</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($subdomain as $s) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $s['nama']; ?></td>
                        <td><?= $s['link']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editsubdomainModal<?= $s['id']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapussubdomainModal<?= $s['id']; ?>">Delete</a>

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
<div class="modal fade" id="tambahsubdomainModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah subdomain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/subdomain'); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama"><strong>Nama subdomain</strong></label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama subdomain">
                </div>

                <div class="form-group">
                    <label for="link"><strong>Link subdomain</strong></label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Link subdomain">
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
<?php foreach ($subdomain as $s) : ?>

<div class="modal fade" id="editsubdomainModal<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Edit Subdomain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/subdomain/edit_subdomain/' . $s['id']); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama"><strong>Nama Subdomain</strong></label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Sub Domain" value="<?= $s['nama']; ?>">
                </div>


                <div class="form-group">
                    <label for="link"><strong>Link Subdomain</strong></label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Link subdomain" value="<?= $s['link']; ?>">
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

<!-- Modal hapus Pejabat-->
<?php foreach ($subdomain as $s) : ?>

<div class="modal fade" id="hapussubdomainModal<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Hapus Sub Domain</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/subdomain/delete/' . $s['id']); ?>

            <div class="modal-body">
                <p>Anda yakin mau menghapus <b><?= $s['nama']; ?></b></p>
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