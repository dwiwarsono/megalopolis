<h2>Ubah Produk</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

echo "<pre>";

print_r($pecah);
echo "</pre>";

 ?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?= $pecah['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" value="<?= $pecah['harga_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat" value="<?= $pecah['berat_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class=" form-control" name="deskripsi"  rows="10">
			<?= $pecah['deskripsi_produk']; ?>
			</textarea>
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?= $pecah['foto_produk']; ?>" width="200px">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
	<div class="form-group">
		<img src="../foto_produk/<?= $pecah['foto_produk1']; ?>" width="200px">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto1" class="form-control">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
	<div class="form-group">
		<img src="../foto_produk/<?= $pecah['foto_produk2']; ?>" width="200px">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto2" class="form-control">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>



<!-- UNTUK FOTO_PRODUK1 dan FOTO_PRODUK2 BELUM BISA DI UBAH -->


<?php 
if (isset($_POST['ubah'])) 
{
 	$nama = $_FILES['foto']['name'];
 	$lokasi = $_FILES['foto']['tmp_name'];
 	// jika foto dirubah
 	if (!empty($lokasi)) 
 	{
 		move_uploaded_file($lokasi, "../foto_produk/$nama");

 		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
 			harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',
 			deskripsi_produk='$_POST[deskripsi]',foto_produk='$nama'
 			WHERE id_produk ='$_GET[id]'");
 	}
 	else 
 	{
 		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
 			harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',
 			deskripsi_produk='$_POST[deskripsi]' WHERE id_produk ='$_GET[id]'");
 	}
 	echo "<script>alert('Data Produk telah di Ubah');</script>";
 	echo "<script>location='index.php?halaman=produk';</script>";
 } 
 ?>