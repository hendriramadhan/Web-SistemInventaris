<?php
		include"koneksi.php";
		$no = $_POST['no'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$status = $_POST['status'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$que = mysql_query("INSERT INTO pemasok (no_pemasok, nama, alamat, status, username, password) VALUES ('$no','$nama','$alamat','$status','$username','$password')") ;
		header('location:datapemasok.php');
	?>