<?php 
session_start();


// echo "<pre>";
// echo print_r($_SESSION['keranjang']);
// echo "</pre>";


$koneksi = new mysqli("localhost", "root", "", "megalopolisdb");

if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang']))
{
	echo "<script>alert('Keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='index.php';</script>";
}

 ?>
 <!DOCTYPE html>
 <html>
 	<head>
 		<title>Keranjang Belanja</title>
 		<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 	</head>

 	<body>

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
 						<th>Aksi</th>
 					</tr>
 				</thead>
 				<tbody>
 				
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
 						<td>
 							<a href="hapuskeranjang.php?id=<?= $id_produk ?>" class="btn btn-danger btn-xs">Hapus</a>
 						</td>
 					</tr>
 			
 				<?php endforeach ?>
 				</tbody>
 			</table>

 			<a href="index.php" class="btn btn-default">Lanjutkan belanja</a>
 			<a href="checkout.php" class="btn btn-primary">Checkout</a>
 			</div>
 			</div>
 			</div>
 		</section>


 		<div class="container">
			<div class="row-cart">
				<div class="col-md-4 col-md-offset-2 col-lg-3 col-lg-offset-5 col-sm-12 col-xs-12">
					<div class="cart-totals">

						<table id="shopping-cart-totals-table">
							<colgroup>
								<col>
								<col width="1">
							</colgroup>
							<tfoot>
								<tr>
									<td style class="a-right" colspan="1">
										<strong>Grand Total</strong>
									</td>
										<td style class="a-right">
										<strong>
											<span class="price">Rp4576</span>
										 </strong>
									</td>
								</tr>
							</tfoot>
						</table>

					</div>
				</div>

				<div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">
					
					<div class="cart-totals">

						<table id="shopping-cart-totals-table">
							<colgroup>
								<col>
								<col width="1">
							</colgroup>
							<tfoot>
								<tr>
									<td style class="a-right" colspan="1">
										<strong>Grand Total</strong>
									</td>
										<td style class="a-right">
										<strong>
											<span class="price">Rp4576</span>
										 </strong>
									</td>
								</tr>
							</tfoot>
						</table>

					</div>
				</div>
			</div>
		</div>


  <div class="clearfix"></div>
              </div>
            </div>
            <div class="clearfix"></div>

 		<?php include ('footer.php'); ?>
 	</body>
 </html>