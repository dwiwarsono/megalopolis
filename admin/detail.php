<h2>Detail Pembelian</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<pre><?php print_r($detail); ?></pre>

<strong><?= $detail ['nama_pelanggan'];?></strong>
<br>
<p>
	<?= $detail['telepon_pelanggan']; ?>
	<br>
<?= $detail['email_pelanggan']; ?>
</p>
<br>
<p>
	Tanggal :<?= $detail ['tanggal_pembelian']; ?>
	<br>
	Total Pembelian : Rp.<?= $detail ['total_pembelian']; ?>
</p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON 
			pembelian_produk.id_produk=produk.id_produk 
		WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) : ?>
		<tr>
			<td><?= $nomor; ?></td>
			<td><?= $pecah['nama_produk']; ?></td>
			<td><?= $pecah['harga_produk']; ?></td>
			<td><?= $pecah['jumlah']; ?></td>
			<td>
				<?= $pecah ['harga_produk']* $pecah['jumlah']; ?>
			</td>
		</tr>
		<?php $nomor++; ?>
	<?php endwhile; ?>
	</tbody>
</table>

