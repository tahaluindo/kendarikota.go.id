<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Walikota</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Wakil Walikota</a>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-lg-4">

                    <!-- Circle Buttons -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                        </div>
                        <div class="card-body">
                            <img src="<?= base_url('assets/img/pejabat/') . $walikota['foto'] ?>" width="100%">
                        </div>
                    </div>
                    <!-- Brand Buttons -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ganti Foto</h6>
                        </div>
                        <div class="card-body">


                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Profil Walikota</h6>
                        </div>
                        <div class="card-body">
                            <div class="my-2"></div>
                            <?php echo form_open_multipart('admin/kepaladaerah/edit_kepaladaerah/1'); ?>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama"><strong>Nama Lengkap</strong></label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $walikota['nama'] ?>" placeholder="cth : Adi Supriadi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"><strong>Biodata Lengkap</strong></label>
                                    <textarea class="form-control" id="body" name="profil" rows="100" value="<?= $walikota['profil'] ?>"><?= $walikota['profil'] ?></textarea>
                                </div>
                                <div class=" form-group">
                                    <label for="instansi"><strong>Foto</strong>
                                        <h6></h6>
                                    </label>
                                    <input type="file" class="form-control" id="userfile" name="foto">
                                </div>
                                <button type="submit" class="btn btn-info btn-icon-split btn-lg">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-lg-4">

                    <!-- Circle Buttons -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Foto</h6>
                        </div>
                        <div class="card-body">
                            <img src="<?= base_url('assets/img/pejabat/') . $wakil['foto'] ?>" width="100%">
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Profil Wakil Walikota</h6>
                        </div>
                        <div class="card-body">
                            <div class="my-2"></div>
                            <?php echo form_open_multipart('admin/kepaladaerah/edit_kepaladaerah/2'); ?>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama"><strong>Nama Lengkap</strong></label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $wakil['nama'] ?>" placeholder="cth : Adi Supriadi">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"><strong>Biodata Lengkap</strong></label>
                                    <textarea class="form-control" id="body1" name="profil" rows="100"><?= $wakil['profil'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="instansi"><strong>Foto</strong>
                                        <h6></h6>
                                    </label>
                                    <input type="file" class="form-control" id="userfile" name="foto">
                                </div>
                                <button type="submit" class="btn btn-info btn-icon-split btn-lg">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">Simpan</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->



<script>
    ClassicEditor
        .create(document.querySelector('#body1'), {

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