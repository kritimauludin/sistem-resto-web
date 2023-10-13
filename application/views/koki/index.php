<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php elseif ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" onclick="<?php unset($_SESSION['message']); ?>" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php else : ?>
            <?php endif; ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark d-inline"><?= $title; ?></h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nomer Pemesanan</th>
                                    <th scope="col">Nama Makanan</th>
                                    <th scope="col">jumlah</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($transaksi as $t) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?> </th>
                                        <th scope="row">psn<?= $t['id'] ?> </th>
                                        <th scope="row"><?= $t['nama_makanan'] ?> </th>
                                        <th scope="row"><?= $t['jumlah'] ?> </th>
                                        <th scope="row">
                                            <?php if ($t['status_bayar'] == 3) {
                                                echo '<span class="badge badge-warning">Menunggu</span>';
                                            } else {
                                                echo '<span class="badge badge-success">Selesai</span>';
                                            }
                                            ?>
                                        </th>
                                        <th scope="row"><?= $t['tanggal'] ?> </th>
                                        <th scope="row">
                                            <?php if ($t['status_bayar'] == 3) : ?>
                                                <a href="" class="badge badge-success form-send-order" data-id="<?= $t['id']; ?>">Kirim</a>
                                            <?php endif; ?>
                                            <!-- <a href="<?= base_url(); ?>transaksi/updateTransaksi/<?= $t['id']; ?> " class="badge badge-info">Detail</a> -->
                                        </th>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->