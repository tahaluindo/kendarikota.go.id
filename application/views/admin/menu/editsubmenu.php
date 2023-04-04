<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <form action="<?= base_url('menu/editsubmenu/' . $submenuid['id']); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="SubMenu Title" value="<?= $submenuid['title'] ?>">
                    </div>

                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="<?= $submenuid['menu_id'] ?>"> <?= $submenuid['menu'] ?></option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu Url" value="<?= $submenuid['url'] ?>">
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu Icon" value="<?= $submenuid['icon'] ?>">
                    </div>
                    <div class=" form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked>
                            <label class="custom-control-label" for="is_active">Active</label>
                        </div>
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
<!-- /.container-fluid -->