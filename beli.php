<?php 
session_start();
// mendapatkan id_produk dari url
$id_produk = $_GET['id'];

// jika sudah ada produk di keranjang, maka produk jumlahnya di + 1 
// bacanya, jika itu if, isset itu ada, di session keranjang, id_produk itu


if(isset($_SESSION['keranjang'][$id_produk])) 
{
	// maka
	$_SESSION['keranjang'][$id_produk] +=1;
}


// selain itu (belum ada di keranjang), maka produk dianggap di beli 1
else
{
	$_SESSION['keranjang'][$id_produk] = 1;

}



// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";


//link kan ke halaman keranjang

echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";


?>