<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahpengumumanModal">Tambah Pengumuman</a>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Isi</th>
                        <th scope="col">Sumber</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($pengumuman as $p) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $p['judul']; ?></td>
                        <td><?= $p['isi']; ?></td>
                        <td><?= $p['sumber']; ?></td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editpengumumanModal<?= $p['id']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapuspengumumanModal<?= $p['id']; ?>">Delete</a>
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
<div class="modal fade" id="tambahpengumumanModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/pengumuman'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul"><strong>Judul</strong></label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Pengumuman">
                    </div>
                    <div class="form-group">
                        <label for="isi"><strong>Isi Pengumuman</strong></label>
                        <textarea class="form-control" id="body" name="isi" placeholder="Isi Pengumuman" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sumber"><strong>Sumber</strong></label>
                        <input type="text" class="form-control" id="sumber" name="sumber" placeholder="Sumber">
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
<?php foreach ($pengumuman as $p) : ?>

<div class="modal fade" id="editpengumumanModal<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Edit Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/pengumuman/edit_pengumuman/'); ?><?= $p['id'] ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul"><strong>Judul</strong></label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Pengumuman" value="<?= $p['judul']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="isi"><strong>Isi Pengumuman</strong></label>
                        <textarea class="form-control" id="body<?= $p['id'] ?>" name="isi" placeholder="Isi Pengumuman" rows="10"><?= $p['isi']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sumber"><strong>Sumber</strong></label>
                        <input type="text" class="form-control" id="sumber" name="sumber" placeholder="Sumber Pengumuman" value="<?= $p['sumber']; ?>">
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

<script>
    ClassicEditor
        .create(document.querySelector('#body<?= $p['id'] ?>'), {

            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    }
                ]
            }
        })
        .catch(error => {
            console.log(error);
        });
</script>
<?php endforeach; ?>

<!-- Modal hapus Pejabat-->
<?php foreach ($pengumuman as $p) : ?>

<div class="modal fade" id="hapuspengumumanModal<?= $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Hapus Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/pengumuman/delete' . $p['id']); ?>

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