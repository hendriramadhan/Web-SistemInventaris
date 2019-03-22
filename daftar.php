<?php
include"menu.php";
?>
<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
		
		  <div class="content">
<div id="utama">
<center>
<div class="log2">
  <h3>Daftar Pemasok</h3>

	<form action="prosesdaftar.php" method="post" enctype="multipart/form-data">
	<table>
	<tr><td>Nama</td><td><input type="text" name="nama" placeholder="Masukan Nama Anda" required></td></tr>
	<tr><td>Alamat</td><td><input type="text" name="alamat" required placeholder="Masukan Alamat Anda"></td></tr>		
	<tr><td>Username</td><td><input type="text" name="username" required placeholder="Masukan Username Anda"></td></tr>
	<tr><td>Password</td><td><input type="password" name="password" required placeholder="Masukan Password Anda"></td></tr>
	<tr><td>Ulangi Password</td><td><input type="password" name="password2" required placeholder="Ulangi Password"></td></tr>	
	<tr><td colspan="2"><label align='left'><input type="checkbox" name="cek" required>Saya bertanggung jawab atas data yang saya buat ini
		</label><strong><input type="submit" value="Daftar"></strong></td></tr>
	</table>
	<input type="hidden" name="status" value='Aktif'>
	</form>
</div>
</center>
</div>
</div>
</div>
<?php
include"footer.php";
?>