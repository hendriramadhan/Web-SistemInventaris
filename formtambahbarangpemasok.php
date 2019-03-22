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
				
					<tr><td colspan="2" ><input type="submit" value="Tambah"></td></tr>
					<tr><td colspan="2" align="right"><a href="?page=databarang" class="batal" >Batal</a></td></tr>
				</table>
				<input type="hidden" name="nama"  value="<?php echo "$tampil[no_pemasok]"; ?>">
			</form>
			</div>
			<?php } ?>
</center>
</div>
<?php
include"footer.php"
?>