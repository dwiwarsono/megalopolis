<?php 
session_start();

$koneksi = new mysqli("localhost", "root", "", "megalopolisdb");



// jika tidak ada session pelanggan (belum login)
// maka di redirect ke login.php

if (!isset($_SESSION['pelanggan']))
{
	echo "<script>alert('Silahkan login');</script>";
	echo "<script>location='login.php';</script>";
}

 ?>

<?php include ('header.php'); ?>


 		<section class="konten">
 			<div class="container">
 				<div class="content-wrapper">
 					<div class="page-title">
 			<h1>SHOPPING CART</h1>
 			<hr>
 			<table class="table table-bordered">
 				<thead>
 					<tr>
 						<th></th>
 						<th>Product</th>
 						<th>Price</th>
 						<th>Qty</th>
 						<th>Subtotal</th>
 						
 					</tr>
 				</thead>
 				<tbody>
 					<?php $totalbelanja = 0; ?>
 					<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
 						<!-- Menampilkan produk yang sudah di foreach(perulangan) berdasarkan id_produk -->
 						<?php
 						$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
 						// pecah ke array
 					$pecah = $ambil->fetch_assoc();
 					$subharga = $pecah["harga_produk"]*$jumlah;


 						 ?>
 						
 					<tr>
 					
 						<td>
							<img src="foto_produk/<?= $pecah ['foto_produk']; ?>" width="100px">
						</td>
 						<td><?= $pecah['nama_produk']; ?></td>
 						<td>Rp<?= number_format($pecah['harga_produk']); ?></td>
 						<td><?= $jumlah; ?></td>
 						<td>Rp<?= number_format($subharga); ?></td>
 						
 					</tr>
 				<?php $totalbelanja+=$subharga ?>
 				<?php endforeach ?>
 				</tbody>
 				<tfoot>
 					<tr>
 						<th colspan="4">Total Belanja</th>
 						<th>Rp. <?= number_format($totalbelanja) ?> </th>
 					</tr>
 				</tfoot>
 			</table>

 			<form method="post">
 				<div class="row">
 				<div class="col-md-4">
 					<div class="form-group">
 					<input type="text" readonly value="<?= $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
 				</div>
 			</div>
 				<div class="col-md-4">
 					<div class="form-group">
 					<input type="text" readonly value="<?= $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
 				</div>
 			</div>
 				<div class="col-md-4">
 					<select class="form-control" name="id_ongkir">
 						<option value="">Pilih Ongkos Kirim</option>
 						<?php 
 							$ambil = $koneksi -> query ("SELECT * FROM ongkir");
 							while ($perongkir = $ambil -> fetch_assoc()) { ?>
 						<option value="<?= $perongkir['id_ongkir'] ?>">
 							<?= $perongkir['nama_kota'] ?> -
 							Rp. <?= number_format($perongkir ['tarif']) ?>
 						</option>
 						<?php } ?>
 					</select>
 				</div>
 				</div>
 				<br>
 				<button class="btn btn-primary" name="checkout">Checkout</button>
 			</form>

 			<?php 
 			// Jika tombol checkout di tekan
 			if (isset($_POST["checkout"]))
 			 { 
 			 	// maka
 			 	$id_pelanggan = $_SESSION ["pelanggan"]["id_pelanggan"];
 			 	$id_ongkir = $_POST["id_ongkir"];
 				$tanggal_pembelian = date("Y-m-d");

 				$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
 				$arrayongkir = $ambil->fetch_assoc();
 				$tarif = $arrayongkir['tarif'];

 				$total_pembelian = $totalbelanja + $tarif;

 				// 1. menyimoan data ke tabel pembelian
 				$koneksi->query("INSERT INTO pembelian (
 					id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian)
 					VALUES ('$id_pelanggan', '$id_ongkir','$tanggal_pembelian','$total_pembelian')"
 				);

 				// 2. mendapatkan id_pembelian barusan terjadi
 				$id_pembelian_barusan = $koneksi->insert_id;

 				foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
 				{
 					$koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah)
 						VALUES ('$id_pembelian_barusan', 'id_produk', '$jumlah')");
 				}

 				// 3. kosongkan keranjang belanja
 				unset($_SESSION["keranjang"]);

 				// 4. tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
 				echo "<script>alert('pembelian sukses');</script>";
 				echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
 			}

 			 ?>

<!-- MASIH ADA YANG ERROR SAAT TOMBOL CHECKOUT DI TEKAN -->
 			</div>
 			</div>
 			</div>
 		</section>
<pre><?php print_r($_SESSION['pelanggan']) ?></pre>
<pre><?php print_r($_SESSION['keranjang']) ?></pre>
 		<?php include ('footer.php'); ?>
</body>
</html>