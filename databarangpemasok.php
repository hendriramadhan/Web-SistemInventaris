<?php
	include"koneksi.php";
	include"menu.php";
	if (isset($_SESSION['pemasok'])) {
			$kode  = $_SESSION['pemasok'];
	$query = mysql_query("SELECT * FROM barang WHERE no_pemasok LIKE '13%' order by no_barang asc");
		$cek = mysql_num_rows($query);
	
?><head><title>judul</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>	


<div class="badan">
<div class="content">
<div id="utama">
<center>
	 <table border="1">
  <tr>
	<th>No</th>
	<th>Nama Barang</th>
	<th>Jenis Barang</th>
	<th>Jumlah</th>
	<th>keterangan barang</th>
	<th>Nama Pemasok</th>
	
				<th colspan="2">Pilihan</th><th><a href="?page=barang&aksi=tambah#tambah">Tambah Barang</a></th>
				
					
				
			</tr>
		<?php
			while ($tampil = mysql_fetch_array($query)) {
				$no++;
					$query2 = mysql_query("SELECT * FROM pemasok where no_pemasok = '$tampil[no_pemasok]'");
						$kat = mysql_fetch_array($query2);
				?><?php 
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
						
					<td><a href="?page=pegawai&aksi=edit&kode=<?php echo "$tampil[no_barang]"; ?>#edit"><img src="image/ico/edit.png"  title="Edit <?php echo "$tampil[barang]"; ?>"></a></td>
		
					
					<td><a href="hapusbarang.php?kode=<?php echo "$tampil[no_barang]"; ?>"><img src="image/ico/hapus.png" title="Hapus <?php echo "$tampil[barang]"; ?>"></a></td>
				
							<?php
						}
					?>
					</tr>
				
		<tr><th colspan="10" align="left">Jumlah : <?php echo "$cek"; ?> Barang</th></tr>
	</table>



	<!-- TAMBAH -->
	<?php
		if ($_GET['aksi'] == 'tambah') {
			?>
			<div id="tambah">
			<form action="tambahbarangpemasok.php" method="post" enctype="multipart/form-data">
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
			<form action="ubahbarangpemasok.php" method="post" enctype="multipart/form-data">
				<table>
					<tr><th colspan="2">Form Ubah Data Barang</th></tr>
					<tr><td>Nama Barang</td><td><input type="text" name="barang" required value="<?php echo "$tp[barang]"; ?>"></td></tr>
					<tr><td>Jenis Barang</td><td><input type="text" name="jenis" required value="<?php echo "$tp[jenis]"; ?>"></td></tr>
					<tr><td>Jumlah Barang</td><td><input type="number" name="jumlah" required value="<?php echo "$tp[jumlah]"; ?>"></td></tr>
					<tr><td>Keterangan Barang</td><td><input type="text" name="keterangan" required value="<?php echo "$tp[keterangan]"; ?>"></td></tr>
									
					<tr><td colspan="2"><input type="submit" value="Ubah"></td><td></td></tr>
					<tr><td colspan="2" align="right"><a href="?page=barang" class="batal">Batal</a></td></tr>
				</table>
				<input type="hidden" name="no_barang"  value="<?php echo "$tp[no_barang]"; ?>">
				<select type="hidden" name="nama">
								<?php
									include"koneksi.php";

									$aqq = mysql_query("select * from pemasok order by nama asc");
									$aqq2 = mysql_query("select * from pemasok where no_pemasok = '$tp[no_Pemasok]'");
									$asf = mysql_fetch_array($aqq2);
										echo "<option value='$tp[no_pemasok]'>$asf[nama]</option>";
									while ($qqq = mysql_fetch_array($aqq)) {
										echo "<option value='$qqq[no_pemasok]'>$qqq[nama]</option>";
									}
								?>
							</select>
			</form>
		</div>
		<?php
		}
		} }
?>



  </center>
</div>
<?php
include"footer.php"
?>