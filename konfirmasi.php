<?php
	include"koneksi.php";
	$status = $_POST['status'];
	$kode = $_POST['kode'];


	$proses = mysql_query("UPDATE barang set status='$status' where no_barang = '$kode'");
	echo "<script>window.location=('databarang.php')</script>";
?>