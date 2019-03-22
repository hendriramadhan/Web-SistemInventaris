<?php
		session_start();
		include"koneksi.php";
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$status = $_POST['status'];
		$username = $_POST['username'];
		$ps = $_POST['password'];
		$ps2 = $_POST['password2'];

		if ($ps <> $ps2) {
			echo "<script>window.alert('password tidak sama');
			window.location=('index.php')</script>";
		}
		else{
		$que = mysql_query("INSERT INTO pemasok (nama, alamat, status, username, password) VALUES ('$nama','$alamat','$status','$username','$ps')") ;
			
			if ($que) {
			$quey = mysql_query("SELECT * FROM pemasok where username = '$username'");
				$tp = mysql_fetch_array($quey);
			$_SESSION['pemasok'] = $tp['username'];
					
			echo"<script>window.alert('Pendaftaran Sukses Anda Langsung Login');
			window.location=('index.php')</script>";
		}
		else{
			echo"<script>window.alert('Pendaftaran gagal');
			window.location=('index.php')</script>";
		}	

		}
		
	?>