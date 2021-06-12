<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="modal-body">
                <form active <?= base_url('pesanan'); ?> id="FormTransaksi" method="POST">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $transaksi['id']; ?>" hidden>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $transaksi['email']; ?>" readonly>
                    </div>
                    <div class=" form-group">
                        <input type="number" class="form-control" id="total" name="total" value="<?= $transaksi['total']; ?>" readonly>
                    </div>
                    <div class=" form-group">
                        <select name="status_bayar" id="status_bayar" class="form-control">
                            <option value="">Status</option>
                            <option value="0">Belum Dibayar (Silahkan Hampiri Kasir)</option>
                            <option value="1">Sudah Dibayar</option>
                        </select>
                    </div>
                    <div class=" form-group">
                        <input type="number" class="form-control" id="uang_bayar" name="uang_bayar" onkeyup="HitungAkhir()" placeholder="Masukan Uang Bayar">
                    </div>
                    <div class=" form-group">
                        <input type="number" class="form-control" id="kembalian" name="kembalian" placeholder="Kembalian" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url(); ?>transaksi"><button type="button" class="btn btn-secondary"> Close</button></a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>