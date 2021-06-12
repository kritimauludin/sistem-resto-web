<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMakananModal">Add New Food</a>
            <table class="table table-hover" id="tableMenu">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Makanan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($makanan as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i ?> </th>
                            <th scope="row"><?= $m['nama_makanan'] ?> </th>
                            <th scope="row"><?= $m['harga'] ?> </th>
                            <th scope="row"><?= $m['status'] ?> </th>
                            <th scope="row">
                                <a href="" data-toggle="modal" data-target="#updateMakananModal<?= $m['id']; ?>" class="badge badge-success">edit</a>
                                <a class="badge badge-danger" href="<?= base_url(); ?>makanan/deletedata/<?= $m['id']; ?> ">delete</a>
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
<div class="modal fade" id="newMakananModal" tabindex="-1" aria-labelledby="newMakananModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMakananModalLabel">Add New food</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form active <?= base_url('makanan'); ?> method="POST">
                    <div class=" form-group">
                        <input type="text" class="form-control" id="namamakanan" name="namamakanan" placeholder="Nama Makanan">
                    </div>
                    <div class=" form-group">
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Makanan">
                    </div>
                    <div class=" form-group">
                        <select name="status" id="status" class="form-control">
                            <option value="">Status</option>
                            <option value="Habis">Habis</option>
                            <option value="Tersedia">Tersedia</option>
                        </select>
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
<?php foreach ($makanan as $m) : $i++ ?>
    <div class="modal fade" id="updateMakananModal<?= $m['id']; ?>" tabindex="-1" aria-labelledby="updateMakananModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateMakananModalLabel">Edit Makanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('makanan/updatemakanan'); ?>
                    <input type="text" class="form-control" id="id" name="id" value="<?= $m['id']; ?>" hidden>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="updatenama" name="updatenama" value="<?= $m['nama_makanan']; ?>">
                    </div>
                    <div class=" form-group">
                        <input type="number" class="form-control" id="updateharga" name="updateharga" value="<?= $m['harga']; ?>">
                    </div>
                    <div class=" form-group">
                        <select name="updatestatus" id="updatestatus" class="form-control">
                            <option value="">Status</option>
                            <option value="Habis">Habis</option>
                            <option value="Tersedia">Tersedia</option>
                        </select>
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