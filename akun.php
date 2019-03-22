<?php
	include"koneksi.php";
	include"menu.php";
	if (isset($_SESSION['pemasok'])) {
			$kode  = $_SESSION['pemasok'];
			$query = mysql_query("SELECT * FROM pemasok where username = '$kode' ");
				$tampil = mysql_fetch_array($query);
				
				?><head><title>judul</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>	


				<div class="badan">
<div class="content">
<div id="utama">
<center>
			<table>
			<tr><th colspan="3"><h3>Data Anda</h3></th></tr>
		<tr>
			<tr><td><div align="left">Nama</div></td><td><div align="left">:  <?php echo "$tampil[nama]"; ?></div></td></tr>
			<tr><td><div align="left">Alamat</div></td><td><div align="left">:  <?php echo "$tampil[alamat]"; ?></div></td></tr>
			<tr><td><div align="left">Status Aktif</div></td><td><div align="left">:  <?php echo "$tampil[status]"; ?></div></td></tr>
			<tr><td><div align="left">Username</div></td><td><div align="left">:  <?php echo "$tampil[username]"; ?></div></td></tr>
		</tr>
		</td></tr>
		<tr><th><a href="?page=akun&aksi=editakun&kode=<?php echo "$tampil[no_pemasok]"; ?>#edit">Edit Akun</a></th></tr>
	</table>
	<?php
		if ($_GET['aksi']=='editakun') {
			$kodead = $_GET['kode'];
			$admini = mysql_query("SELECT * FROM pemasok where no_pemasok = '$kodead'");
				$adminina = mysql_fetch_array($admini);
				if ($adminina['status'] == "Aktif")
   {
       $option1 = "<input type=\"radio\" name=\"status\" value=\"Aktif\" checked>";
       $option2 = "<input type=\"radio\" name=\"status\" value=\"Tidak Aktif\">";
   }
   else if ($adminina['status'] == "Tidak Aktif")
        {
        $option1 = "<input type=\"radio\" name=\"status\" value=\"Aktif\">";
        $option2 = "<input type=\"radio\" name=\"status\" value=\"Tidak Aktif\" checked>";
        }

	?>
		<div id="edit">
			<form action="editakun.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><th colspan="2"><h3>Edit Akun Pemasok </h3></th></tr>
					<tr><td>Nama</td><td><input type="text" name="nama" value="<?php echo "$adminina[nama]"; ?>"></td></tr>
					<tr><td>Alamat</td><td><input type="text" name="alamat" value="<?php echo "$adminina[alamat]"; ?>"></td></tr>
					<tr>
    							<td valign="top">Status Aktif</td>
    							<?php echo "<td> ".$option1." Aktif ".$option2." Tidak Aktif </td>"; ?>
				  </tr>
					<tr><td>username</td><td><input type="text" name="username" value="<?php echo "$adminina[username]"; ?>"></td></tr>
					<tr><td>password</td><td><input type="password" name="password" value="<?php echo "$adminina[password]"; ?>"></td></tr>
					<input type="hidden" name="no" value="<?php echo "$adminina[no_pemasok]"; ?>">
					<tr><td colspan="2"><input type="submit" value="Ubah"></td></tr>
					<tr><td align="right" colspan="2"><a href="?page=akun" class="batal">Batal</a></td></tr>
				</table>				
			</form>	
		</div>
		<?php

			} }
		?>
		
  </center>
	</div>
	<?php
	include"footer.php"
	?>