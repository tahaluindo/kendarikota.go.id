<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">

            <div class="card shadow mb-4 border-bottom-danger ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Setting</h6>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Other Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Promosi</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active mb-5" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <?= form_open_multipart('admin/setting/simpan'); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="title">Logo</label>
                                        <img src="<?= base_url('assets/img/') . $setting['site_logo'] ?>" alt="" width="100">
                                    </div>
                                    <div class="col-lg">
                                        <input type="file" class="form-control" id="site_logo" name="site_logo" placeholder="Site Logo">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="labelfavicon">Favicon</label>
                                        <img src="<?= base_url('assets/img/') . $setting['site_favicon'] ?>" alt="" width="100">
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="file" class="form-control" id="site_favicon" name="site_favicon" placeholder="favicon">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Site Name</label>
                                <input type="text" class="form-control" id="site_name" name="site_name" placeholder="Site Name" value="<?= $setting['site_name'] ?>">
                            </div>
                            <div class=" form-group">
                                <label for="title">Site Description</label>
                                <input type="text" class="form-control" id="site_desc" name="site_desc" placeholder="Site Desc" value="<?= $setting['site_description'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="title">Site Email</label>
                                <input type="email" class="form-control" id="site_email" name="site_email" placeholder="Site email" value="<?= $setting['site_email'] ?>">
                            </div>
                            <div class=" form-group">
                                <label for="title">Copyright</label>
                                <input type="text" class="form-control" id="site_copyright" name="site_copyright" placeholder="Copyright" value="<?= $setting['site_copyright'] ?>">
                            </div>
                            <div class=" form-group">
                                <button type="submit" class="btn btn-facebook float-right">Save</button>
                            </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="form-group">
                                <label for="labelheader">Header Code</label>
                                <textarea class="form-control" id="header" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="labelfooter">Footer Code</label>
                                <textarea class="form-control" id="footer" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <?= form_open_multipart('admin/setting/simpan_banner'); ?>
                            <div class="form-group">
                                <label for="title">Banner Promosi</label>
                                <input type="file" class="form-control mb-3" id="site_ads" name="site_ads" placeholder="Site Ads">
                                <img src="<?= base_url('assets/img/banner/') . $setting['site_ads'] ?>" alt="" width="100">
                            </div>
                            <div class=" form-group">
                                <button type="submit" class="btn btn-facebook float-right">Save</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>