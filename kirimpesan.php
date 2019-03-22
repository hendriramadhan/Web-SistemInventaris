<?php
include('koneksi.php');
$n=$_POST['nama'];
$e=$_POST['email'];
$p=$_POST['pesan'];
mysql_query("insert into pesan (nama,email,pesan) values ('$n','$e','$p')");
?>
	<script type="text/javascript">
		alert("Pesan Terkirim...!!!");
	</script>
<?php
	echo "<meta http-equiv='refresh' content='0; url=pesan.php'>";
?>