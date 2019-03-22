<?php
		include"koneksi.php";
		$no_barang = $_POST['no_barang'];
		$no = $_POST['nama'];
		$barang = $_POST['barang'];
		$jenis = $_POST['jenis'];
		$jumlah = $_POST['jumlah'];
		$keterangan = $_POST['keterangan'];
		
		$que = mysql_query("UPDATE barang SET no_pemasok = '$no',
		 barang = '$barang', 
		 jenis = '$jenis', 
		 jumlah ='$jumlah', 
		 keterangan = '$keterangan' where no_barang = '$no_barang'") ;
		if ($que) {
			echo"<script>window.alert('Perubahan Disimpan');
		window.location=('databarang.php')</script>";
		}
		else{
			echo"<script>window.alert('Perubahan Buku $_POST[judul] Gagal !!!!');
		window.location=('databarang.php')</script>";
		}
	?>