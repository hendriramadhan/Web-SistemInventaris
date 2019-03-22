<?php
	include"koneksi.php";
	$query = mysql_query("SELECT * FROM pemasok order by nama asc");
		$cek = mysql_num_rows($query);
	include"menu.php";
?><head><title>judul</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>	

<div class="badan">
<div class="content">
<div id="utama">
<center>
  <table border="1">
    <tr><th colspan="6">Data Pemasok</th></tr>
    <tr>
      <th>No</th>
      <th>Nama Pemasok</th>
      <th>Alamat</th>
      <th>Status Pemasok</th>
	  <?php
		if (isset($_SESSION['admin'])) {
			?>
      <th colspan="2">Aksi</th>
      <th ><a href="?page=pemasok&aksi=tambah#tambah"><img src="image/btn_add.png" width="23" height="23" title="Tambah Pemasok" /> </a></th>
	  <?php } ?>
    </tr>
    <?php
			while ($tampil = mysql_fetch_array($query)) {
				$no++;?>
    <?php 
		echo" <tr";  
			if ($no%2==0){
				$warna = '#ffffff';
			}
			else{ 
				$warna = '#ffffff';
			} 
			echo" bgcolor='$warna'>"; ?>
  <td><?php echo "$no"; ?></td>
    <td><?php echo "$tampil[nama]"; ?></td>
    <td><?php echo "$tampil[alamat]"; ?></td>
    <td><?php echo "$tampil[status]"; ?></td>
	<?php
		if (isset($_SESSION['admin'])) {
			?>
    <td><a href="?page=pemasok&aksi=edit&kode=<?php echo "$tampil[no_pemasok]"; ?>#edit"><img src="image/ico/edit.png"  title="Edit <?php echo "$tampil[nama]"; ?>" /></a></td>
	<?php } ?>
	<?php
		if (isset($_SESSION['admin'])) {
			?>
    <td><a href="hapuspemasok.php?no=<?php echo "$tampil[no_pemasok]"; ?>"><img src="image/ico/hapus.png" title="Hapus <?php echo "$tampil[nama]"; ?>" /></a></td>
  </tr>
  <?php
			}
		?>
  <?php
			}
		?>
  <tr>
    <th colspan="<?php if (isset($_SESSION['admin'])) {
			echo "6";
		}else{ echo "6";} ?>" align="left">Jumlah : <?php echo "$cek"; ?> Pemasok</th>
		<?php
							if (isset($_SESSION['admin'])) {
							?>
		  <th><a href="printpemasok.php"><img src="image/b_print.png" title="Print PDF" /></a></th>
		  <?php } else if (isset($_SESSION['pemasok'])) {   ?>
		  <th><a href="printpemasok.php"><img src="image/b_print.png" title="Print PDF" /></a></th>
		  <?php } ?>
  </tr>
  
  </table>
  <p>
    <!-- TAMBAH -->
    <?php
		if ($_GET['aksi'] == 'tambah') {
			?>
</p>
  <p>&nbsp;</p>
  <p>&nbsp;  </p>
  <div id="tambah">
			<form action="tambahpemasok.php" method="post">
				<table>
					<tr>
					  <th colspan="2">Form Tambah Pemasok</th>
					</tr>
					<tr><td>Nama Pemasok</td><td><input type="text" name="nama" placeholder='Nama Pemasok'  required></td></tr>
					<tr><td>Alamat</td><td><input type="text" name="alamat" placeholder='Alamat'  required></td></tr>
					<tr><td>Status Aktif</td>
    					<td><input type="radio" name="status" value="Aktif" checked>Aktif</input>
						<input type="radio" name="status" value="Tidak Aktif">Tidak Aktif</input></td>
					</tr>
					<tr><td>username</td><td><input type="text" name="username" placeholder='Username'  required></td></tr>
					<tr><td>password</td><td><input type="password" name="password" placeholder='Password'  required></td></tr>
					<tr><td align="right" colspan="2"><input type="submit" value="Tambah">
					</td></tr>
					<tr><td align="right" colspan="2"><a href="datapemasok.php" class="batal">Batal</a></td></tr>
				</table>
			</form>
	</div>
			<p>
			  <?php
		}else{
	if ($_GET['aksi']== 'edit') {
		$get = $_GET['kode'];
		$qw = mysql_query("select * from pemasok where no_pemasok = '$get'");
		$tmpl = mysql_fetch_array($qw);
		 if ($tmpl['status'] == "Aktif")
   {
       $option1 = "<input type=\"radio\" name=\"status\" value=\"Aktif\" checked>";
       $option2 = "<input type=\"radio\" name=\"status\" value=\"Tidak Aktif\">";
   }
   else if ($tmpl['status'] == "Tidak Aktif")
        {
        $option1 = "<input type=\"radio\" name=\"status\" value=\"Aktif\">";
        $option2 = "<input type=\"radio\" name=\"status\" value=\"Tidak Aktif\" checked>";
        }

		?>
	</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp; </p>
			<div id="edit">
						<form action="ubahpemasok.php" method="post">
						<table>
							<tr><th colspan="2">Form Ubah Pemasok</th></tr>
							<tr><td>Nama Pemasok</td><td><input type="text" name="nama" value="<?php echo"$tmpl[nama]"; ?>" 		required></td></tr>
							<tr><td>Alamat</td><td><input type="text" name="alamat" value="<?php echo"$tmpl[alamat]"; ?>" 		required></td></tr>
							<tr>
								<td>Status Aktif</td>
								<?php echo "<td> ".$option1." Aktif ".$option2." Tidak Aktif </td>"; ?>
							</tr>
							<tr><td>username</td><td><input type="text" name="username" value="<?php echo"$tmpl[username]"; ?>" 		required></td></tr>
							<tr><td>Password</td><td><input type="password" name="password" value="<?php echo"$tmpl[password]"; ?>" 		required></td></tr>
							<tr><td colspan="2"><input type="submit" value="Ubah"></td></tr>
							<tr><td colspan="2" align="right"><a href="datapemasok.php"  class="batal">Batal</a></td></tr>
						</table>
						<input type="hidden" value="<?php echo "$tmpl[no_pemasok]"; ?>" name="no">
						</form>
	</div>
			<?php
			}
		}

	?>



  </center>
</div>
<?php
include"footer.php"
?>