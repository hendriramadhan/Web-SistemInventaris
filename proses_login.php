<?php
	session_start();
	include"koneksi.php";
	$type = $_POST['login_type'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$status = $_POST['status'];
if ($type== 'admin') {
	$query = mysql_query("SELECT * FROM admin WHERE username = '$username'");
	$cek = mysql_num_rows($query);
	$hasil = mysql_fetch_array($query);
	if ($cek==0) {
		echo"<script>window.alert('Username Tidak Terdaftar');
		window.location=('index.php')</script>";
	}
	else {
		if ($hasil['password'] <> $pass) {
			echo"<script>window.alert('Password Salah');
		window.location=('index.php')</script>";
		}
		else{
			$_SESSION['admin'] = $hasil['username'];
			header("location:index.php");
		}
	}
}
else{
	if ($type=='pemasok') {
		$query = mysql_query("SELECT * FROM pemasok WHERE username = '$username'");
	$cek = mysql_num_rows($query);
	$hasil = mysql_fetch_array($query);
	if ($cek==0) {
		echo"<script>window.alert('Username Tidak Terdaftar');
		window.location=('index.php')</script>";
	}
	else {
		if ($hasil['password'] <> $pass) {
			echo"<script>window.alert('Password Salah');
		window.location=('index.php')</script>";
		}
		else{
			$_SESSION['pemasok'] = $hasil['username'];
			header("location:index.php");
		}
	}
} 
}
?>
