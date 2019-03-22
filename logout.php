<?php
	session_start();
	include"koneksi.php";
?>
<?php
if (isset($_SESSION['admin'])) {
	session_start('admin');
	unset($_SESSION['admin']);
}else{
	if (isset($_SESSION['pemasok'])) {
		session_start('pemasok');
		unset($_SESSION['pemasok']);
	}
}
		echo"<script>;
		window.location=('index.php')</script>";
?>