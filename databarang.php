<?php
	include"koneksi.php";
	$query = mysql_query("SELECT * FROM barang order by barang asc");
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
	 <tr><th colspan="9">Data Barang</th></tr>
  <tr>
	<th>No</th>
	<th>Nama Barang</th>
	<th>Jenis Barang</th>
	<th>Jumlah</th>
	<th>Keterangan barang</th>
	<th>Nama Pemasok</th>
	<?php
		if (isset($_SESSION['admin'])) {
			?>
	<th colspan="2">Pilihan</th>
	<th>Status</th>
	<th><a href="?page=barang&aksi=tambah#tambah"><img src="image/btn_add_data.png" width="23" height="23" title="Tambah Barang" /></a></th>
				<?php } ?>
				<?php
		if (isset($_SESSION['pemasok'])) {
			?>
	<th>Status</th>
				<?php } ?>
					
				
	   </tr>
		<?php
			while ($tampil = mysql_fetch_array($query)) {
				$no++;
					$query2 = mysql_query("SELECT * FROM pemasok where no_pemasok = '$tampil[no_pemasok]'");
					   $kat = mysql_fetch_array($query2);
				?>
				
				
				<?php if (isset($_SESSION['admin'])) {   ?>
				<?php 
		echo" <tr";  
			if ($no%2==0){
				$warna = '';
			}
			else{ 
				$warna = '';
			} 
			echo" bgcolor='$warna'>"; ?>
					<td><?php echo "$no"; ?></td>
					<td><?php echo "$tampil[barang]"; ?></td>
					<td><?php echo "$tampil[jenis]"; ?></td>
					<td><?php echo "$tampil[jumlah]"; ?></td>
					<td><?php echo "$tampil[keterangan]"; ?></td>
					<td><?php echo "$kat[nama]"; ?></td>
						<?php
							if (isset($_SESSION['admin'])) {
							?>
					<td><a href="?page=pegawai&aksi=edit&kode=<?php echo "$tampil[no_barang]"; ?>#edit"><img src="image/ico/edit.png"  title="Edit <?php echo "$tampil[barang]"; ?>"></a></td>
					<td><a href="hapusbarang.php?kode=<?php echo "$tampil[no_barang]"; ?>"><img src="image/ico/hapus.png" title="Hapus <?php echo "$tampil[barang]"; ?>"></a></td>
					<?php } ?>
					<?php
							if (isset($_SESSION['admin'])) {
							?>
								<?php
				if (isset($_SESSION['admin'])) {
				?>
				<td align="center">
				<?php
					if ($tampil['status'] == 0) {
						?>
							<form action="konfirmasi.php" method="post">
							<input type="hidden" name="status" value="1">
							<input type="hidden" name="kode" value="<?php echo "$tampil[no_barang]"; ?>">
							<input type="submit" value="Konfirmasi">
							</form>
						<?php
					}
					else{
						if ($tampil['status'] == 1) {
								echo'<img src="image/ico/cek.png" title="Data dikonfirmasi">';
							
						}
					}
					?>
					</td>
					<?php
				}
			?>	
					<?php } ?>
					
					
					<?php } else if (isset($_SESSION['pemasok'])) {   ?>
					<?php 
		echo" <tr";  
			if ($no%2==0){
				$warna = '';
			}
			else{ 
				$warna = '';
			} 
			echo" bgcolor='$warna'>"; ?>
					<td><?php echo "$no"; ?></td>
					<td><?php echo "$tampil[barang]"; ?></td>
					<td><?php echo "$tampil[jenis]"; ?></td>
					<td><?php echo "$tampil[jumlah]"; ?></td>
					<td><?php echo "$tampil[keterangan]"; ?></td>
					<td><?php echo "$kat[nama]"; ?></td>
							
								
				<td align="center">
				<?php
					if ($tampil['status'] == 0) {
								echo'<img src="image/ico/loading.gif" title="Menunggu Konfirmasi Admin">';
					}
					else{
						if ($tampil['status'] == 1) {
								echo'<img src="image/ico/cek.png" title="Data dikonfirmasi">';
							
						}
					}
					?>
					</td>
						
					
					
					
					<?php } else{ ?>
					<?php
						if ($tampil['status'] == 1) {
								?>
					<?php 
		echo" <tr";  
			if ($no%2==0){
				$warna = '';
			}
			else{ 
				$warna = '';
			} 
			echo" bgcolor='$warna'>"; ?>
					<td><?php echo "$no"; ?></td>
					<td><?php echo "$tampil[barang]"; ?></td>
					<td><?php echo "$tampil[jenis]"; ?></td>
					<td><?php echo "$tampil[jumlah]"; ?></td>
					<td><?php echo "$tampil[keterangan]"; ?></td>
					<td><?php echo "$kat[nama]"; ?></td>
					
					<?php } ?>
					<?php }  ?>
					<?php } ?>
					</tr>
				
		<tr>
		  <th colspan="9" align="left">Jumlah : <?php echo "$cek"; ?> Data Barang </th>
		  <?php
							if (isset($_SESSION['admin'])) {
							?>
		  <th><a href="printdatabarang.php"><img src="image/b_print.png" title="Print PDF" /></a></th>
		  <?php } else if (isset($_SESSION['pemasok'])) {   ?>
		  <th><a href="printdatabarang.php"><img src="image/b_print.png" title="Print PDF" /></a></th>
		  <?php } ?>
		</tr>
	</table>



	<!-- TAMBAH -->
	<?php
		if ($_GET['aksi'] == 'tambah') {
			?>
			<div id="tambah">
			<form action="tambahbarang.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><th colspan="2">Form Tambah Barang</th></tr>
					<tr><td>Nama Barang</td><td><input type="text" name="barang" required placeholder='Nama Barang'></td></tr>
					<tr><td>Jenis Barang</td><td><input type="text" name="jenis" required placeholder='Jenis Barang'></td></tr>
					<tr><td>Jumlah Barang</td><td><input type="number" name="jumlah" required placeholder='Jumlah Barang'></td></tr>
					<tr><td valign="top">Keterangan Barang</td>
    					<td valign="top"> 
      						<select name="keterangan">
								<option value="Bagus">Bagus</option>
								<option value="Perbaikan">Perbaikan</option>
								<option value="Rusak">Rusak</option>
							</select></td></tr>
					<tr>
						<td>Nama Pemasok</td>
						<td>
							<select name="nama">
								<?php
									include"koneksi.php";
									$aqq = mysql_query("select * from pemasok order by nama asc");
									$aqq2 = mysql_query("select * from pemasok where no_pemasok = '$tp[no_pemasok]'");
									$asf =mysql_fetch_array($aqq2);
										echo "<option value='$tp[no_pemasok]'>$asf[nama]</option>";
									while ($qqq = mysql_fetch_array($aqq)) {
										echo "<option value='$qqq[no_pemasok]'>$qqq[nama]</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr><td colspan="2" ><input type="submit" value="Tambah"></td></tr>
					<tr><td colspan="2" align="right"><a href="?page=databarang" class="batal" >Batal</a></td></tr>
				</table>
			</form>
			</div>
			<?php
		}else{
	
	if ($_GET['aksi'] == 'edit') {
			$get = $_GET['kode'];
			$qw = mysql_query("SELECT * FROM barang where no_barang = '$get'");
			$tp = mysql_fetch_array($qw);
		?>
		<div id="edit">
			<form action="ubahbarang.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><th colspan="2">Form Ubah Data Barang</th></tr>
					<tr><td>Nama Barang</td><td><input type="text" name="barang" required value="<?php echo "$tp[barang]"; ?>"></td></tr>
					<tr><td>Jenis Barang</td><td><input type="text" name="jenis" required value="<?php echo "$tp[jenis]"; ?>"></td></tr>
					<tr><td>Jumlah Barang</td><td><input type="number" name="jumlah" required value="<?php echo "$tp[jumlah]"; ?>"></td></tr>
					<tr>
						<td>Keterangan Barang</td>
						<td>
							<select name="keterangan">
								<?php
									include"koneksi.php";

									$aqq = mysql_query("select * from keterangan order by keterangan asc");
									$aqq2 = mysql_query("select * from keterangan where keterangan = '$tp[keterangan]'");
									$asf = mysql_fetch_array($aqq2);
										echo "<option value='$tp[keterangan]'>$asf[keterangan]</option>";
									while ($qqq = mysql_fetch_array($aqq)) {
										echo "<option value='$qqq[keterangan]'>$qqq[keterangan]</option>";
									}
								?>
							</select>
						</td>
					</tr>	
					<tr>
						<td>Nama Pemasok</td>
						<td>
							<select name="nama">
								<?php
									include"koneksi.php";

									$aqq = mysql_query("select * from pemasok order by nama asc");
									$aqq2 = mysql_query("select * from pemasok where no_pemasok = '$tp[no_pemasok]'");
									$asf = mysql_fetch_array($aqq2);
										echo "<option value='$tp[no_pemasok]'>$asf[nama]</option>";
									while ($qqq = mysql_fetch_array($aqq)) {
										echo "<option value='$qqq[no_pemasok]'>$qqq[nama]</option>";
									}
								?>
							</select>
						</td>
					</tr>					
					<tr><td colspan="2"><input type="submit" value="Ubah"></td><td></td></tr>
					<tr><td colspan="2" align="right"><a href="?page=barang" class="batal">Batal</a></td></tr>
				</table>
				<input type="hidden" name="no_barang"  value="<?php echo "$tp[no_barang]"; ?>">
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