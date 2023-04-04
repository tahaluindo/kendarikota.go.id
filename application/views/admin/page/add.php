<div class="container-fluid">

    <!-- Page Heading -->
    <!--<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1> -->

    <div class="row">

        <div class="col-lg-8">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= $this->session->flashdata('message'); ?>
                    <?= form_open_multipart('admin/page/add'); ?>

                    <div class="form-group">
                        <label for="title">Judul Halaman</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Isi Halaman</label>
                        <textarea class="form-control" id="body" name="isi" rows="10"></textarea>
                    </div>
                    <div class=" form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="aktif" name="aktif" value="1" checked>
                            <label class="custom-control-label" for="aktif">Active</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('admin/page') ?>" class="btn btn-secondary">Close</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->