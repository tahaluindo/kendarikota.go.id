<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newagendaModal">Tambah Agenda</a>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Agenda</th>
                        <th scope="col">Tgl</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($agenda as $a) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $a['nama']; ?></td>
                        <td><?= date('d M Y', strtotime($a['tgl_mulai'])); ?></td>
                        <td><?= $a['lokasi']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editagendaModal<?= $a['id_agenda']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusagendaModal<?= $a['id_agenda']; ?>">Delete</a>
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
<div class="modal fade" id="newagendaModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/agenda'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Agenda">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Agenda"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="tgl" class="form-control" id="tgl" placeholder="Tgl" aria-label="Username" aria-describedby="addon-wrapping" data-provide="datepicker" data-date-format="yyyy-mm-dd">
                        </div>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi">
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
<?php foreach ($agenda as $a) : ?>

<div class="modal fade" id="editagendaModal<?= $a['id_agenda']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Edit Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/agenda/edit_agenda/'); ?><?= $a['id_agenda'] ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Agenda" value="<?= $a['nama']; ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Agenda"><?= $a['deskripsi']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" name="tgl" class="form-control" id="tgl" placeholder="Tgl" data-provide="datepicker" data-date-format="yyyy-mm-dd" aria-label="Username" aria-describedby="addon-wrapping" value="<?= $a['tgl_mulai']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi" value="<?= $a['lokasi']; ?>">
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

<!-- Modal hapus agenda-->
<?php foreach ($agenda as $a) : ?>

<div class="modal fade" id="hapusagendaModal<?= $a['id_agenda']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Hapus Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/agenda/delete/' . $a['id_agenda']); ?>

            <div class="modal-body">
                <p>Anda yakin mau menghapus <b><?= $a['nama']; ?></b></p>
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
<script>
    $('.datepicker').datepicker({

        startDate: '-3d'
    });
</script>