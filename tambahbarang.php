<?php
		include"koneksi.php";
		$no_barang = $_POST['no_barang'];
		$no = $_POST['nama'];
		$barang = $_POST['barang'];
		$jenis = $_POST['jenis'];
		$jumlah = $_POST['jumlah'];
		$keterangan = $_POST['keterangan'];
		
		$que = mysql_query("INSERT INTO barang (no_barang, no_pemasok, barang, jenis, jumlah, keterangan) VALUES ('$no_barang','$no','$barang','$jenis','$jumlah','$keterangan')") ;
		header('location:databarang.php');
		?>
	
		
	