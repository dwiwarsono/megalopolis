<?php 
session_start();
$koneksi = new mysqli("localhost", "root", "", "megalopolisdb");

 ?>

<?php include ('header.php'); ?>

<div class="login">
	<div class="container">
		<div class="row">
			<div class="page-title">
			<h2>LOGIN OR CREATE AN ACCOUNT</h2>
			</div>
			<div class="col-md-4">
				<form method="post">
					<div class="form-group" class="form-login">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" id="" placeholder="Email" name="email">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="" placeholder="Password" name="password">
					</div>
					
					<div class="checkbox">
						<a href="#">Forgot your password</a>
					</div>
					<button type="submit" class="btn btn-default" name="simpan">Submit</button>
				</form>
			</div>



				<div class="col-md-4">
				<h3>percobaan</h3>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, iste! Aliquam culpa atque cumque sunt a asperiores porro natus quod debitis earum. Mollitia deserunt possimus ipsam dignissimos placeat. Voluptate, aspernatur.
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>



<!-- 
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Login Pelanggan</h3>
						</div>
						<div class="panel-body">
							<form method="post">
								<div class="form-group">
									<label>Email :</label>
									<input type="email" class="form-control" name="email">
								</div>
								<div class="form-group">
									<label>Password :</label>
									<input type="password" class="form-control" name="password">
								</div>
								<button class="btn btn-primary" name="simpan">Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> -->


	
<?php 
// jika tombol simpan ditekan

if (isset($_POST['simpan'])) 
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	// maka lakukan query cek akun pelanggan di database tabel pelanggan
	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

	// hitung akun yang terambil
	$akunyangcocok = $ambil->num_rows;

	// jika 1 akun yang cocok, maka diloginkan
	if ($akunyangcocok==1) 
	{
		// anda sukses login
		// mendapatkan akun dalam bentuk array
		$akun = $ambil->fetch_assoc();
		// simpan di Session pelanggan
		$_SESSION['pelanggan'] = $akun;

		// anda gagal login
		echo "<script>alert('Anda berhasil login');</script>";
		// redirect ke login.php kembali
		echo "<script>location='checkout.php';</script>";
	}
	// selain itu
	else 
	{
		// anda gagal login
		echo "<script>alert('Anda gagal login, periksa akun Anda');</script>";
		// redirect ke login.php kembali
		echo "<script>location='login.php';</script>";
	}

}
 ?>

<?php include ('footer.php'); ?>
	