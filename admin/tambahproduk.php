<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" class="form-control" name="berat">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class=" form-control" name="deskripsi"  rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" class="form-control" name="foto1">
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" class="form-control" name="foto2">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
if (isset($_POST['save']))
 {
	$nama = $_FILES['foto']['name'];
	$nama1 = $_FILES['foto1']['name'];
	$nama2 = $_FILES['foto2']['name'];
	$lokasi = $_FILES ['foto']['tmp_name'];
	$lokasi1 = $_FILES ['foto1']['tmp_name'];
	$lokasi2 = $_FILES ['foto2']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
		move_uploaded_file($lokasi1, "../foto_produk/".$nama1);
			move_uploaded_file($lokasi2, "../foto_produk/".$nama2);
	$koneksi->query("INSERT INTO produk 
		(nama_produk,harga_produk,berat_produk,foto_produk,foto_produk1,foto_produk2,deskripsi_produk)
		VALUES ('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$nama1','$nama2','$_POST[deskripsi]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
 echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
 ?>

