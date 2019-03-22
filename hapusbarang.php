<?php
	include 'koneksi.php';
	$kode = $_GET['kode'];
	$myhap = mysql_query("delete from barang where no_barang = '$kode'");
	header('location:databarang.php');
?>			