<?php
	include 'koneksi.php';
	$no = $_GET['no'];
	$myhap = mysql_query("delete from pesan where no_pesan = '$no'");
	header('location:pesanmasuk.php');
?>			