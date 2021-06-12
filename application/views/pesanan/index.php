<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h2 class="h3 mb-4 text-gray-800"><?= $title; ?></h2>

    <div class="row">
        <div class="col-lg-8">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMakananModal">Pesan Sekarang</a>

            <h5>History Pemesanan</h5>
            <?php $i = 1; ?>
            <?php foreach ($pesanan as $p) : ?>
                <div class="card col-md-10 border-info mb-3">
                    <div class="card-header">
                        <?php if ($p['status_bayar'] > 0) {
                            $status = "Sudah Dibayar";
                        } else {
                            $status = "Belum Dibayar (Silahkan Hampiri Kasir)";
                        }
                        ?>
                        <h5 class="card-title">Nomer Pesanan - (psn<?= $p['id']; ?>)</h5>
                        </a>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            Pemesan : <?= $p['email']; ?><br>
                            Nama Makanan : <?= $p['nama_makanan']; ?> x <?= $p['jumlah']; ?> <br>
                            Total Bayar: Rp <?= $p['total']; ?><br>
                            Uang Bayar: Rp <?= $p['uang_bayar']; ?><br>
                            Kembali : Rp <?= $p['kembalian']; ?><br>
                        </p>
                    </div>
                    <div class="card-footer">
                        <?= $status ?>
                        <p class="card-text"><small class="text-muted">Dipesan Pada Tanggal : <?= $p['tanggal']; ?></small></p>
                    </div>
                </div>
                <?php $i++ ?>
            <?php endforeach ?>
        </div>
    </div>
    <!-- End of Main Content -->
    <!-- Modal -->
    <div class="modal fade" id="newMakananModal" tabindex="-1" aria-labelledby="newMakananModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMakananModalLabel">Pesan Makanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form active <?= base_url('pesanan'); ?> id="FormTambah" method="POST">
                        <div class=" form-group">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                        </div>
                        <div class="form-group row">
                            <div class="col-10">
                                <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" placeholder="Pilih Makanan" readonly>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#ModalMakanan">Cari</button>
                            </div>
                        </div>
                        <div class="form-group ">
                            <input type="text" class="form-control " id="tgl" name="tgl" readonly value="<?= date('d M Y') ?>">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control datepicker" id="harga_satuan" name="harga_satuan" placeholder="Harga Satuan" readonly>

                        </div>
                        <div class="form-group ">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" onkeyup="Hitung()" placeholder="Masukan banyak pesananan">
                        </div>
                        <div class="form-group ">
                            <input type="number" class="form-control" id="total_bayar" name="total_bayar" placeholder="Total Bayar" readonly>
                        </div>
                        <div class="form-group ">
                            <input type="text" class="form-control" id="uang_bayar" name="uang_bayar" placeholder="Silahkan hampiri kasir untuk membayar" readonly>
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

    <div class="modal fade" id="ModalMakanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Daftar Makanan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <table id="TableModalMember" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama Makanan</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($makanan as $m) : ?>
                                <tr class="PilihMakanan" data-makanan="<?php echo $m['nama_makanan']; ?>" data-harga="<?php echo $m['harga']; ?>">
                                    <td><?php echo $m["nama_makanan"]; ?></td>
                                    <td><?php echo $m["harga"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>