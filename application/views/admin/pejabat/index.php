<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahpejabatModal">Tambah Data Pejabat</a>
            <table class="table table-hover" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pejabat</th>
                        <th scope="col">Instansi</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    <?php foreach ($pejabat as $p) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $p['nama']; ?></td>
                        <td><?= $p['nama_opd']; ?></td>
                        <td><?= $p['jabatan']; ?></td>
                        <td><img class="img-thumbnail" width="60px" src="<?= base_url('assets/img/pejabat/') ?><?= $p['foto']; ?>"> </td>
                        <td>
                            <a href="" class="badge badge-success" data-toggle="modal" data-target="#editfileModal<?= $p['id_pejabat']; ?>">Edit</a>
                            <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapuspejabatModal<?= $p['id_pejabat']; ?>">Delete</a>
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
<div class="modal fade" id="tambahpejabatModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Pejabat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('admin/pejabat/'); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama"><strong>Nama Lengkap</strong></label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="cth : Adi Supriadi">
                </div>

                <div class="form-group">
                    <label for="instansi"><strong>Instansi</strong></label>
                    <select class="form-control" name="instansi">
                        <option>Pilih OPD</option>
                        <?php foreach ($opd as $o) : ?>
                        <option value="<?= $o['id_opd'] ?>"><?= $o['nama_opd'] ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><strong>Jabatan</strong></label>
                    <select class="form-control" name="jabatan">
                        <option>Pilih Jabatan</option>
                        <?php foreach ($jabatan as $j) : ?>
                        <option value="<?= $j['id_jabatan'] ?>"><?= $j['jabatan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Keterangan</label>
                    <textarea class="form-control" id="body" name="body" rows="100"></textarea>
                </div>
                <div class="form-group">
                    <label for="instansi"><strong>Foto</strong>
                        <h6>(526x420px)</h6>
                    </label>
                    <input type="file" class="form-control" id="userfile" name="foto">
                </div>
                <div class="form-group">
                    <label for="facebook"><strong>Facebook</strong></label>
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="cth : facebook.com/adi">
                </div>
                <div class="form-group">
                    <label for="twitter"><strong>Twitter</strong></label>
                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="cth : twitter.com/adi">
                </div>
                <div class="form-group">
                    <label for="instagram"><strong>Instagram</strong></label>
                    <input type="instagram" class="form-control" id="instagram" name="instagram" placeholder="cth : instagram.com/adi">
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

<!-- Modal edit pejabat-->
<?php foreach ($pejabat as $p) : ?>

<div class="modal fade" id="editfileModal<?= $p['id_pejabat']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Edit Pejabat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php echo form_open_multipart('admin/pejabat/edit_pejabat/' . $p['id_pejabat']) ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama"><strong>Nama Lengkap</strong></label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="cth : Adi Supriadi" value="<?= $p['nama']; ?>">
                </div>

                <div class="form-group">
                    <label for="nama"><strong>Instansi</strong></label>
                    <select class="form-control" name="instansi">
                        <option>-Pilih OPD-</option>
                        <?php foreach ($opd as $o) {
                                $id = $o['id_opd'];
                                $nama = $o['nama_opd'];
                                if ($p['id_opd'] == $id)
                                    echo "<option value='$id' selected>$nama</option>";
                                else
                                    echo "<option value='$id'>$nama</option>";
                            };
                            ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama"><strong>Jabatan</strong></label>
                    <select class="form-control" name="jabatan">
                        <option>-Pilih Jabatan-</option>
                        <?php foreach ($jabatan as $j) {
                                $id = $j['id_jabatan'];
                                $jab = $j['jabatan'];

                                if ($p['id_jabatan'] == $id)
                                    echo "<option value='$id' selected>$jab</option>";
                                else
                                    echo "<option value='$id'>$jab</option>";
                            };
                            ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama"><strong>Biodata Singkat</strong></label>
                    <textarea class="form-control" id="body<?= $p['id_pejabat']; ?>" name="body1" rows="20"><?= $p['keterangan']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="instansi"><strong>Foto</strong> (Ukuran 526x420px)</label>
                    <input type="file" class="form-control" id="userfile" name="foto">
                </div>
                <div class="form-group">
                    <label for="facebook"><strong>Facebook</strong></label>
                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="cth : facebook.com/adi" value="<?= $p['facebook']; ?>">
                </div>
                <div class="form-group">
                    <label for="twitter"><strong>Twitter</strong></label>
                    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="cth : twitter.com/adi" value="<?= $p['twitter']; ?>">
                </div>
                <div class="form-group">
                    <label for="instagram"><strong>Instagram</strong></label>
                    <input type="instagram" class="form-control" id="instagram" name="instagram" placeholder="cth : instagram.com/adi" value="<?= $p['instagram']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#body<?= $p['id_pejabat']; ?>'), {

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
<?php foreach ($pejabat as $p) : ?>

<div class="modal fade" id="hapuspejabatModal<?= $p['id_pejabat']; ?>" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Hapus Pejabat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/pejabat/delete/' . $p['id_pejabat']); ?>

            <div class="modal-body">
                <p>Anda yakin mau menghapus <b><?= $p['nama']; ?></b></p>
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