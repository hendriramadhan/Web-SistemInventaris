<?php
	include"koneksi.php";
	include"menu.php";
?><head><title>judul</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>	

<div class="badan">
<div class="content">
<div id="utama">
<center>
<form action="kirimpesan.php" method="post">
				<table>
					<tr>
					  <th colspan="2">Form Pesan</th>
					</tr>
					<tr><td>Nama</td><td><input type="text" name="nama" placeholder='Nama'  required></td></tr>
					<tr><td>Email</td><td><input type="text" name="email" placeholder='Email'  required></td></tr>
					<tr><td>Pesan</td><td><textarea style="background:#3787BE" name="pesan" placeholder='Pesan'  required></textarea></td></tr>
					<tr><td align="right" colspan="2"><input type="submit" value="Kirim">
					</td></tr>
					<tr><td align="right" colspan="2"><a href="pesan.php" class="batal">Batal</a></td></tr>
				</table>
	</form>
</div>
			


</div>
<?php
include"footer.php"
?>