<?php
		include"koneksi.php";
		date_default_timezone_set('Asia/Jakarta'); 
		$name = $_POST['nama'];
		$comment = $_POST['pesan'];
		$date = date("Y-m-d, H:i:s");

		$query = "insert into diskusi (no_diskusi,no_pemasok,pesan,time) values ('$no','$name','$comment','$date'); ";
		$res = mysql_query($query);
		header("location: diskusi.php");
	?>