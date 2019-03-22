<?php
		include"koneksi.php";
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$status = $_POST['status'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$no = $_POST['no'];


		$que = mysql_query("UPDATE pemasok SET nama = '$nama',
		 alamat = '$alamat', 
		 status ='$status', 
		 username = '$username', 
		 password = '$password' where no_pemasok = '$no'") ;
		if ($que) {
			echo"<script>window.alert('Perubahan Disimpan');
		window.location=('datapemasok.php')</script>";
		}
		else{
			echo"<script>window.alert('Perubahan Buku $_POST[judul] Gagal !!!!');
		window.location=('datapemasok.php')</script>";
		}
	?>