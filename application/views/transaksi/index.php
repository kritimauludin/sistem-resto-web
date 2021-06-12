<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover" id="tableTransaksi">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nomer Pemesanan</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama Makanan</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">jumlah</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status Bayar</th>
                        <th scope="col">uang Bayar</th>
                        <th scope="col">Kembalian</th>
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
                            <th scope="row"><?= $t['email'] ?> </th>
                            <th scope="row"><?= $t['nama_makanan'] ?> </th>
                            <th scope="row"><?= $t['harga_satuan'] ?> </th>
                            <th scope="row"><?= $t['jumlah'] ?> </th>
                            <th scope="row"><?= $t['total'] ?> </th>
                            <th scope="row"><?= $t['status_bayar'] ?> </th>
                            <th scope="row"><?= $t['uang_bayar'] ?> </th>
                            <th scope="row"><?= $t['kembalian'] ?> </th>
                            <th scope="row"><?= $t['tanggal'] ?> </th>
                            <th scope="row">
                                <a href="<?= base_url(); ?>transaksi/updateTransaksi/<?= $t['id']; ?> " class="badge badge-success">edit</a>
                                <a class="badge badge-danger" href="<?= base_url(); ?>transaksi/deletedata/<?= $t['id']; ?> ">delete</a>
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