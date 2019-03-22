<?php
	include 'koneksi.php';
	$no = $_GET['no'];
	$myhap = mysql_query("delete from pemasok where no_pemasok = '$no'");
	header('location:pemasokaktif.php');
?>			