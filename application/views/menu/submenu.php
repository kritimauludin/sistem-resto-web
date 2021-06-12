<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu </a>
            <table class="table table-hover" id="tableSubMenu">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i ?> </th>
                            <th scope="row"><?= $sm['title'] ?> </th>
                            <th scope="row"><?= $sm['menu'] ?> </th>
                            <th scope="row"><?= $sm['url'] ?> </th>
                            <th scope="row"><?= $sm['icon'] ?> </th>
                            <th scope="row"><?= $sm['is_active'] ?> </th>
                            <th scope="row">
                                <a href="" data-toggle="modal" data-target="#updateSubMenuModal<?= $sm['id']; ?>" class="badge badge-success">edit</a>
                                <a class="badge badge-danger" href="<?= base_url(); ?>menu/deletesubmenu/<?= $sm['id']; ?> ">delete</a>
                            </th>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form active <?= base_url('menu/submenu'); ?> method="POST">
                    <div class=" form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class=" form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
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

<?php $i = 0; ?>
<?php foreach ($subMenu as $sm) : $i++ ?>
    <div class="modal fade" id="updateSubMenuModal<?= $sm['id']; ?>" tabindex="-1" aria-labelledby="updateSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateSubMenuModalLabel">Edit Sub Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('menu/updatesub'); ?>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $sm['id']; ?>" hidden>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="updatetitle" name="updatetitle" value="<?= $sm['title']; ?>">
                    </div>
                    <div class=" form-group">
                        <select name="updatemenu_id" id="updatemenu_id" class="form-control">
                            <option value="<?= $m['id'] ?>"><?= $sm['menu']; ?></option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="updateurl" name="updateurl" value="<?= $sm['url']; ?>">
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="updateicon" name="updateicon" value="<?= $sm['icon']; ?>">
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
<?php endforeach ?>