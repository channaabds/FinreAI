<h3>Dashboard</h3>
<br />
<?php
$sql = " select * from barang where stok <= 3";
$row = $config->prepare($sql);
$row->execute();
$r = $row->rowCount();
if ($r > 0) {
?>
<?php
    echo "
		<div class='alert alert-warning'>
			<span class='glyphicon glyphicon-info-sign'></span> Ada <span style='color:red'>$r</span> barang yang Stok tersisa sudah kurang dari 3 items. silahkan pesan lagi !!
			<span class='pull-right'><a href='index.php?page=barang&stok=yes'>Tabel Barang <i class='fa fa-angle-double-right'></i></a></span>
		</div>
		";
}
?>
<?php $hasil_barang = $lihat->barang_row(); ?>
<?php $hasil_kategori = $lihat->kategori_row(); ?>
<?php $stok = $lihat->barang_stok_row(); ?>
<?php $jual = $lihat->jual_row(); ?>
<div class="row">
    <!-- STATUS CARD -->
    <div class="col-md-3 mb-3">
        <div class="card shadow border-0">
            <div class="card-header text-white" style="background: linear-gradient(45deg, #007bff, #0056b3);">
                <h6 class="pt-2"><i class="fas fa-cubes"></i> Nama Barang</h6>
            </div>
            <div class="card-body text-center">
                <h1 style="font-size: 2.5rem; color: #343a40;"><?php echo number_format($hasil_barang); ?></h1>
            </div>
            <div class="card-footer bg-light">
                <a href='index.php?page=barang' class="text-primary font-weight-bold">
                    Tabel Barang <i class='fa fa-angle-double-right'></i>
                </a>
            </div>
        </div>
    </div>
    <!-- STATUS CARD -->
    <div class="col-md-3 mb-3">
        <div class="card shadow border-0">
            <div class="card-header text-white" style="background: linear-gradient(45deg, #28a745, #218838);">
                <h6 class="pt-2"><i class="fas fa-chart-bar"></i> Stok Barang</h6>
            </div>
            <div class="card-body text-center">
                <h1 style="font-size: 2.5rem; color: #343a40;"><?php echo number_format($stok['jml']); ?></h1>
            </div>
            <div class="card-footer bg-light">
                <a href='index.php?page=barang' class="text-success font-weight-bold">
                    Tabel Barang <i class='fa fa-angle-double-right'></i>
                </a>
            </div>
        </div>
    </div>
    <!-- STATUS CARD -->
    <div class="col-md-3 mb-3">
        <div class="card shadow border-0">
            <div class="card-header text-white" style="background: linear-gradient(45deg, #ffc107, #e0a800);">
                <h6 class="pt-2"><i class="fas fa-upload"></i> Telah Terjual</h6>
            </div>
            <div class="card-body text-center">
                <h1 style="font-size: 2.5rem; color: #343a40;"><?php echo number_format($jual['stok']); ?></h1>
            </div>
            <div class="card-footer bg-light">
                <a href='index.php?page=laporan' class="text-warning font-weight-bold">
                    Tabel Laporan <i class='fa fa-angle-double-right'></i>
                </a>
            </div>
        </div>
    </div>
    <!-- STATUS CARD -->
    <div class="col-md-3 mb-3">
        <div class="card shadow border-0">
            <div class="card-header text-white" style="background: linear-gradient(45deg, #17a2b8, #138496);">
                <h6 class="pt-2"><i class="fa fa-bookmark"></i> Kategori Barang</h6>
            </div>
            <div class="card-body text-center">
                <h1 style="font-size: 2.5rem; color: #343a40;"><?php echo number_format($hasil_kategori); ?></h1>
            </div>
            <div class="card-footer bg-light">
                <a href='index.php?page=kategori' class="text-info font-weight-bold">
                    Tabel Kategori <i class='fa fa-angle-double-right'></i>
                </a>
            </div>
        </div>
    </div>
    <!-- STATUS CARD -->
    <div class="col-md-3 mb-3">
        <div class="card shadow border-0">
            <div class="card-header text-white" style="background: linear-gradient(45deg, #dc3545, #bd2130);">
                <h6 class="pt-2"><i class="fas fa-money-bill-wave"></i> Transaksi</h6>
            </div>
            <div class="card-body text-center">
                <h1 style="font-size: 2.5rem; color: #343a40;">Transaksi</h1>
            </div>
            <div class="card-footer bg-light">
                <a href='index.php?page=jual' class="text-danger font-weight-bold">
                    Lihat Transaksi <i class='fa fa-angle-double-right'></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Laporan penjualan card -->
    <div class="col-md-3 mb-3">
        <div class="card shadow border-0">
            <div class="card-header text-white" style="background: linear-gradient(45deg, #6f42c1, #5a32a3);">
                <h6 class="pt-2"><i class="fas fa-chart-line"></i> Laporan Penjualan</h6>
            </div>
            <div class="card-body text-center">
                <h1 style="font-size: 2.5rem; color: #343a40;">Laporan</h1>
            </div>
            <div class="card-footer bg-light">
                <a href='index.php?page=laporan' class="text-primary font-weight-bold">
                    Lihat Laporan <i class='fa fa-angle-double-right'></i>
                </a>
            </div>
        </div>
    </div>

</div>